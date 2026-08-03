<?php
/**
 * Theme setup.
 *
 * Rename the function prefix `starter_theme_` for every new project.
 *
 * @package Starter_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function australian_stars_setup(): void {
    load_theme_textdomain( 'australian-stars', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', [
        'height'      => 100,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption', 
        'style',
        'script',
    ] );

    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/style.css' );

    register_nav_menus( [
        'primary' => __( 'Primary Menu', 'australian-stars' ),
        'footer'  => __( 'Footer Menu', 'australian-stars' ),
    ] );
}
add_action( 'after_setup_theme', 'australian_stars_setup' );