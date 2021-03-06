<?php
/**
 * Scripts, styles and fonts
 *
 * @package Herschel
 * @since   1.0.0
 * @version 1.5.0 [Removed jQuery from theme js file]
 * @version 1.5.0 [Modified custom CSS options]
 * @version 1.5.1 [Added version paramater to stylesheet URL]
 * @version 1.7.0 [Updated Font Awesome from 4.6.3 to 5.11.2]
 * @version 1.7.0 [Added support for the Gutenberg editor]
 */
function herschel_scripts() {

  // Fonts from google
  wp_enqueue_style(
    'herschel-fonts',
    'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i',
    array(),
    null
  );

  // Font Awesome
  wp_enqueue_style(
    "font-awesome",
    get_template_directory_uri() . "/assets/icons/font-awesome/css/all.min.css",
    array(),
    "5.11.2"
  );

  // Theme stylesheet
  wp_enqueue_style( 'herschel-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );

  // Theme JavaScript
  wp_enqueue_script( 'herschel-script', get_template_directory_uri() . '/assets/js/functions.js', false, wp_get_theme()->get('Version'), true );

  // Comment-reply script
  if ( !is_admin() && is_singular() && comments_open() && get_option('thread_comments') ) {
    wp_enqueue_script( 'comment-reply' );
  }

  // Custom styles
  $options = [
    '#' . get_background_color(),
    get_theme_mod( 'color_scheme', '#e00000' ),
    get_theme_mod( 'text_color',   '#000000' ),
    esc_url( get_header_image() )
  ];

  $css = '
    :root {
      --color-bg: %1$s; 
      --color-scheme: %2$s;
      --color-text: %3$s;
    }
  ';

  if( has_header_image() ){
    $css .= '
      #site-header{
        background: url( %4$s );
        background-size: cover;
      }
    ';
  }
  
  wp_add_inline_style( 'herschel-style', vsprintf( $css, $options ) );

}
add_action( 'wp_enqueue_scripts', 'herschel_scripts' );

/** 
 * Block editor styles
 *
 * @package Herschel
 * @since   1.7.0
 */
function herschel_block_editor_style() {
  wp_enqueue_style(
    'herschel_block_editor_style',
    get_theme_file_uri( '/block-editor-style.css' ),
    false,
    wp_get_theme()->get('Version'),
    'all'
  );

  // Custom options
  $options = [
    get_theme_mod( 'color_scheme', '#e00000' )
  ];

  $css = '
    .editor-styles-wrapper {
      --color-scheme: %1$s !important;
    }
  ';
  
  wp_add_inline_style( 'herschel_block_editor_style', vsprintf( $css, $options ) );

}
add_action( 'enqueue_block_editor_assets', 'herschel_block_editor_style' );