<?php
/** Theme setup. @package AllianzTherapietreue */
defined( 'ABSPATH' ) || exit;

function allianz_therapietreue_setup() {
    load_theme_textdomain( 'allianz-therapietreue', get_template_directory() . '/languages' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/theme.css' );
    add_theme_support( 'responsive-embeds' );
    register_nav_menus( array(
        'primary'      => __( 'Hauptnavigation', 'allianz-therapietreue' ),
        'footer-links' => __( 'Fußzeile · Themen', 'allianz-therapietreue' ),
        'footer-legal' => __( 'Fußzeile · Weitere Links', 'allianz-therapietreue' ),
    ) );
}
add_action( 'after_setup_theme', 'allianz_therapietreue_setup' );

/** Current copyright year, using the site's configured timezone. */
function allianz_therapietreue_year_shortcode() {
    return esc_html( wp_date( 'Y' ) );
}
add_shortcode( 'allianz_year', 'allianz_therapietreue_year_shortcode' );

function allianz_therapietreue_assets() {
    wp_enqueue_style(
        'allianz-therapietreue',
        get_theme_file_uri( 'assets/css/theme.css' ),
        array(),
        (string) filemtime( get_theme_file_path( 'assets/css/theme.css' ) )
    );
    wp_enqueue_script(
        'allianz-therapietreue-reveal',
        get_theme_file_uri( 'assets/js/reveal.js' ),
        array(),
        (string) filemtime( get_theme_file_path( 'assets/js/reveal.js' ) ),
        array( 'strategy' => 'defer', 'in_footer' => true )
    );
}
add_action( 'wp_enqueue_scripts', 'allianz_therapietreue_assets' );

function allianz_therapietreue_patterns() {
    register_block_pattern_category( 'allianz-therapietreue', array( 'label' => __( 'Allianz Therapietreue', 'allianz-therapietreue' ) ) );
    register_block_style( 'core/button', array( 'name' => 'text-link', 'label' => __( 'Textlink mit Pfeil', 'allianz-therapietreue' ) ) );
    register_block_style( 'core/group', array( 'name' => 'download-card', 'label' => __( 'Material-Karte', 'allianz-therapietreue' ) ) );
    register_block_style( 'core/paragraph', array( 'name' => 'eyebrow', 'label' => __( 'Rubrik', 'allianz-therapietreue' ) ) );
    foreach ( array( 'core/group', 'core/columns', 'core/column', 'core/image', 'core/heading', 'core/paragraph', 'core/cover' ) as $block ) {
        register_block_style( $block, array( 'name' => 'reveal', 'label' => __( 'Beim Scrollen einblenden', 'allianz-therapietreue' ) ) );
    }
}
add_action( 'init', 'allianz_therapietreue_patterns' );

/** Render assigned classic menus through core's accessible Navigation block. */
function allianz_therapietreue_menu_blocks( $block ) {
    if ( 'core/navigation' !== $block['blockName'] ) {
        return $block;
    }
    $classes   = explode( ' ', $block['attrs']['className'] ?? '' );
    $locations = get_nav_menu_locations();
    foreach ( array( 'primary', 'footer-links', 'footer-legal' ) as $location ) {
        if ( ! in_array( 'at-menu-' . $location, $classes, true ) || empty( $locations[ $location ] ) ) {
            continue;
        }
        $menu = wp_get_nav_menu_object( $locations[ $location ] );
        if ( ! $menu ) {
            return $block;
        }
        $markup = WP_Classic_To_Block_Menu_Converter::convert( $menu );
        if ( is_wp_error( $markup ) ) {
            return $block;
        }
        // A deliberately empty assigned menu must not fall back to every page.
        if ( '' === $markup ) {
            return array( 'blockName' => null, 'attrs' => array(), 'innerBlocks' => array(), 'innerHTML' => '', 'innerContent' => array() );
        }
        unset( $block['attrs']['ref'] );
        $block['innerBlocks']  = parse_blocks( $markup );
        if ( 'primary' === $location ) {
            foreach ( $block['innerBlocks'] as &$item ) {
                if ( 'core/navigation-link' !== $item['blockName'] ) {
                    continue;
                }
                $label    = trim( wp_strip_all_tags( $item['attrs']['label'] ?? '' ) );
                $fragment = wp_parse_url( $item['attrs']['url'] ?? '', PHP_URL_FRAGMENT );
                if ( 'kontakt' === strtolower( $label ) || 'kontakt' === $fragment ) {
                    $item['attrs']['className'] = trim( ( $item['attrs']['className'] ?? '' ) . ' at-menu-contact' );
                }
            }
            unset( $item );
        }
        $block['innerHTML']    = '';
        $block['innerContent'] = array_fill( 0, count( $block['innerBlocks'] ), null );
        return $block;
    }
    return $block;
}
add_filter( 'render_block_data', 'allianz_therapietreue_menu_blocks' );
