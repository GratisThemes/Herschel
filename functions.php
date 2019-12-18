<?php
/**
 * Theme functions and definitions
 *
 * @package Herschel
 */

if ( !function_exists( 'herschel_setup' ) ) {
  /**
   * Set up theme defaults and registers support for various WordPress features
   *
   * @since   1.0.0
   * @version 1.5.0 [Removed font being added to editor style]
   * @version 1.7.0 [Added support for alignwide and alignfull styles]
   * @version 1.7.0 [Added support for responsive embeds]
   * @version 1.7.0 [Added support for block styles]
   */
  function herschel_setup() {
    // Support for translation files
    // https://codex.wordpress.org/Function_Reference/load_theme_textdomain
    load_theme_textdomain( 'herschel', get_template_directory() . '/languages' );

    // Main content width
    // https://codex.wordpress.org/Content_Width
    if ( ! isset( $content_width ) ) $content_width = 1200;

    /* 
     * Register support for various WordPress features
     */
    
    // https://codex.wordpress.org/Automatic_Feed_Links
    add_theme_support( 'automatic-feed-links' );
    
    // https://codex.wordpress.org/Title_Tag
    add_theme_support( 'title-tag' );
    
    // https://codex.wordpress.org/Theme_Logo
    add_theme_support( 'custom-logo' );

    // https://codex.wordpress.org/Post_Thumbnails
    add_theme_support( 'post-thumbnails' );

    // https://codex.wordpress.org/Custom_Backgrounds
    add_theme_support( 'custom-background', array(
      'default-color'          => 'FFFFFF',
      'default-image'          => '',
    ) );

    // https://codex.wordpress.org/Theme_Markup
    add_theme_support( 'html5', array(
      'search-form', 
      'comment-form',
      'comment-list',
      'gallery', 
      'caption'
    ) );

    // https://codex.wordpress.org/Post_Formats
    add_theme_support( 'post-formats', array(
      'aside',
      'gallery',
      'link',
      'image',
      'quote',
      'status',
      'video',
      'audio',
      'chat',
    ) );

    // https://codex.wordpress.org/Custom_Headers
    add_theme_support( 'custom-header', array(
      'default-image'      => '',
      'random-default'     => false,
      'width'              => 1200,
      'height'             => 120,
      'flex-height'        => false,
      'flex-width'         => false,
      'header-text'        => false,
      'uploads'            => true,
    ) );

    // Add support for full and wide align images.
    add_theme_support( "align-wide" );

    // Add support for responsive embedded content.
    add_theme_support( "responsive-embeds" );

    // Add support for Block Styles.
    add_theme_support( "wp-block-styles" );

    // Editor styles for TinyMCE and Gutenberg
    add_theme_support( 'editor-styles' );
    add_editor_style( 'editor-style.css' );

    // Navigation
    register_nav_menus( array(
      'header' => __( 'Header Menu', 'herschel' ),
      'footer' => __( 'Footer Menu', 'herschel' )
    ));

  }
  add_action( 'after_setup_theme', 'herschel_setup' );

}

// Scripts and styles
require_once get_template_directory() . '/inc/scripts.php';

// Widgets areas
require_once get_template_directory() . '/inc/widget-areas.php';

// Filters
require_once get_template_directory() . '/inc/filters.php';

// WP Customizer settings
require_once get_template_directory() . '/inc/customizer.php';

// Theme specific functions
require_once get_template_directory() . '/inc/theme-functions.php';