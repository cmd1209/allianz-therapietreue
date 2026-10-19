<?php
/**
 * Create missing prototype pages in this theme's local WordPress installation.
 * Run from the theme directory; never runs on activation or on the public site.
 * php -d mysqli.default_socket=/path/to/mysql.sock scripts/setup-local.php
 */
if ( PHP_SAPI !== 'cli' ) {
    exit( 'CLI only.' );
}
require_once dirname( __DIR__, 4 ) . '/wp-load.php';
if ( 'local' !== wp_get_environment_type() ) {
    fwrite( STDERR, "This script only runs in a local WordPress environment.\n" );
    exit( 1 );
}
if ( wp_normalize_path( get_theme_root() . '/allianz-therapietreue' ) !== wp_normalize_path( dirname( __DIR__ ) ) ) {
    fwrite( STDERR, "The local theme directory does not match.\n" );
    exit( 1 );
}
switch_theme( 'allianz-therapietreue' );
$pages = array(
    'startseite'       => array( 'Startseite', 'home' ),
    'allianz'          => array( 'Allianz', 'allianz' ),
    'therapietreue'    => array( 'Therapietreue', 'therapietreue' ),
    'info-materialien' => array( 'Info-Materialien', 'info-materialien' ),
    'award'           => array( 'Award', 'award' ),
    'impressum'       => array( 'Impressum', 'impressum' ),
    'datenschutz'     => array( 'Datenschutz', 'datenschutz' ),
);
foreach ( $pages as $slug => $definition ) {
    $existing = get_page_by_path( $slug );
    if ( $existing && ( 'startseite' !== $slug || '' !== trim( $existing->post_content ) ) ) {
        echo "Kept existing page: {$slug}\n";
        continue;
    }
    $content = '';
    if ( $definition[1] ) {
        $pattern = WP_Block_Patterns_Registry::get_instance()->get_registered( 'allianz-therapietreue/' . $definition[1] );
        if ( ! $pattern ) {
            fwrite( STDERR, "Missing pattern: {$definition[1]}\n" );
            exit( 1 );
        }
        $content = serialize_blocks( resolve_pattern_blocks( parse_blocks( $pattern['content'] ) ) );
    }
    $page_data = array(
        'post_type'    => 'page',
        'post_status'  => 'publish',
        'post_name'    => $slug,
        'post_title'   => $definition[0],
        'post_content' => wp_slash( $content ),
    );
    if ( $existing ) {
        $page_data['ID'] = $existing->ID;
        $id = wp_update_post( $page_data, true );
    } else {
        $id = wp_insert_post( $page_data, true );
    }
    if ( is_wp_error( $id ) ) {
        fwrite( STDERR, $id->get_error_message() . "\n" );
        exit( 1 );
    }
    if ( 'startseite' !== $slug ) {
        update_post_meta( $id, '_wp_page_template', 'page-canvas' );
    }
    echo ( $existing ? 'Filled empty page: ' : 'Created page: ' ) . "{$slug} ({$id})\n";
}
$locations = get_nav_menu_locations();
$menus = array(
    'primary'      => array( 'Hauptnavigation', array( 'allianz' => 'Allianz', 'therapietreue' => 'Therapietreue', 'info-materialien' => 'Info-Materialien', 'award' => 'Award' ) ),
    'footer-links' => array( 'Fußzeile · Themen', array( 'allianz' => 'Über die Allianz', 'therapietreue' => 'Therapietreue', 'info-materialien' => 'Info-Materialien' ) ),
    'footer-legal' => array( 'Fußzeile · Weitere Links', array( 'award' => 'Award', 'impressum' => 'Impressum', 'datenschutz' => 'Datenschutz' ) ),
);
foreach ( $menus as $location => $definition ) {
    if ( ! empty( $locations[ $location ] ) ) {
        continue;
    }
    $menu = wp_get_nav_menu_object( $definition[0] );
    $menu_id = $menu ? $menu->term_id : wp_create_nav_menu( $definition[0] );
    if ( is_wp_error( $menu_id ) ) {
        fwrite( STDERR, $menu_id->get_error_message() . "\n" );
        exit( 1 );
    }
    if ( ! $menu ) {
        foreach ( $definition[1] as $slug => $label ) {
            $page = get_page_by_path( $slug );
            $item_id = wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'     => $label,
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $page->ID,
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
            ) );
            if ( is_wp_error( $item_id ) ) {
                fwrite( STDERR, $item_id->get_error_message() . "\n" );
                exit( 1 );
            }
        }
    }
    $locations[ $location ] = $menu_id;
    echo "Assigned menu: {$location}\n";
}
set_theme_mod( 'nav_menu_locations', $locations );
$home = get_page_by_path( 'startseite' );
update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $home->ID );
update_option( 'blogname', 'Allianz Therapietreue Deutschland' );
update_option( 'blogdescription', 'Therapie gelingt gemeinsam.' );
// Keep existing posts and sample content; do not invent news for the initiative.
flush_rewrite_rules( false );
echo "Prototype ready: " . home_url( '/' ) . "\n";
