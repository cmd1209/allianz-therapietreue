<?php
/** Read-only local smoke checks against WordPress core. */
if ( PHP_SAPI !== 'cli' ) {
    exit( 'CLI only.' );
}
require_once dirname( __DIR__, 4 ) . '/wp-load.php';
$errors = array();
if ( ! wp_is_block_theme() ) {
    $errors[] = 'The active theme is not a block theme.';
}
if ( wp_get_theme()->errors() ) {
    $errors[] = wp_get_theme()->errors()->get_error_message();
}
$json = json_decode( file_get_contents( get_theme_file_path( 'theme.json' ) ), true, 512, JSON_THROW_ON_ERROR );
if ( 3 !== $json['version'] ) {
    $errors[] = 'Unexpected theme.json version.';
}
$front_page = file_get_contents( get_theme_file_path( 'templates/front-page.html' ) );
if ( ! has_block( 'core/post-content', $front_page ) ) {
    $errors[] = 'The front page must render normal editable page content.';
}
foreach ( array( 'primary', 'footer-links', 'footer-legal' ) as $location ) {
    if ( ! isset( get_registered_nav_menus()[ $location ] ) ) {
        $errors[] = 'Missing standard menu location: ' . $location;
    }
}
$walk = function ( $blocks, $source ) use ( &$walk, &$errors ) {
    foreach ( $blocks as $block ) {
        if ( ! empty( $block['blockName'] ) && ! WP_Block_Type_Registry::get_instance()->is_registered( $block['blockName'] ) ) {
            $errors[] = $source . ': unregistered block ' . $block['blockName'];
        }
        if ( 'core/pattern' === $block['blockName'] && ! WP_Block_Patterns_Registry::get_instance()->is_registered( $block['attrs']['slug'] ) ) {
            $errors[] = $source . ': unresolved pattern';
        }
        $walk( $block['innerBlocks'], $source );
    }
};
foreach ( glob( get_theme_file_path( 'templates/*.html' ) ) as $file ) {
    $walk( parse_blocks( file_get_contents( $file ) ), basename( $file ) );
}
$count = 0;
foreach ( WP_Block_Patterns_Registry::get_instance()->get_all_registered() as $pattern ) {
    if ( ! str_starts_with( $pattern['name'], 'allianz-therapietreue/' ) ) {
        continue;
    }
    $walk( parse_blocks( $pattern['content'] ), $pattern['name'] );
    if ( str_contains( do_blocks( $pattern['content'] ), '<?php' ) ) {
        $errors[] = $pattern['name'] . ': unprocessed PHP';
    }
    ++$count;
}
foreach ( array( 'project', 'service_page', 'team_member' ) as $type ) {
    if ( post_type_exists( $type ) ) {
        $errors[] = 'Legacy post type still registered: ' . $type;
    }
}
if ( $errors ) {
    fwrite( STDERR, implode( "\n", $errors ) . "\n" );
    exit( 1 );
}
echo "PASS: block theme, theme.json, templates, {$count} patterns, core block registrations, legacy post types.\n";
