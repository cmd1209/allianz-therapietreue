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

function allianz_therapietreue_assets() {
    wp_enqueue_style(
        'allianz-therapietreue',
        get_theme_file_uri( 'assets/css/theme.css' ),
        array(),
        (string) filemtime( get_theme_file_path( 'assets/css/theme.css' ) )
    );
}
add_action( 'wp_enqueue_scripts', 'allianz_therapietreue_assets' );

function allianz_therapietreue_patterns() {
    register_block_pattern_category( 'allianz-therapietreue', array( 'label' => __( 'Allianz Therapietreue', 'allianz-therapietreue' ) ) );
    register_block_style( 'core/button', array( 'name' => 'text-link', 'label' => __( 'Textlink mit Pfeil', 'allianz-therapietreue' ) ) );
    register_block_style( 'core/group', array( 'name' => 'download-card', 'label' => __( 'Material-Karte', 'allianz-therapietreue' ) ) );
    register_block_style( 'core/paragraph', array( 'name' => 'eyebrow', 'label' => __( 'Rubrik', 'allianz-therapietreue' ) ) );
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
        $block['innerHTML']    = '';
        $block['innerContent'] = array_fill( 0, count( $block['innerBlocks'] ), null );
        return $block;
    }
    return $block;
}
add_filter( 'render_block_data', 'allianz_therapietreue_menu_blocks' );
