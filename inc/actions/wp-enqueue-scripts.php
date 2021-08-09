<?php
/**
 * The wp_enqueue_scripts hook.
 *
 * @package Herschel
 * @since   Herschel 2.0
 */

/**
 * Enqueue scripts, styles and fonts
 */
function herschel_wp_enqueue_scripts() {

  $theme_version = wp_get_theme()->get( 'Version' );

  // Fonts from google.
  wp_enqueue_style(
    'herschel-fonts',
    'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i',
    false,
    $theme_version
  );

  // Enqueue Font Awesome (icon set).
  wp_enqueue_style(
    'font-awesome',
    get_template_directory_uri() . '/assets/icons/fontawesome-free-5.15.3-web/css/all.min.css',
    false,
    '5.15.3'
  );

  // Theme stylesheet.
  wp_enqueue_style(
    'herschel-style',
    get_stylesheet_uri(),
    false,
    $theme_version
  );

  // Replace the stylesheet with a RTL one if needed.
  wp_style_add_data( 'herschel-style', 'rtl', 'replace' );

  // Theme JavaScript.
  wp_enqueue_script(
    'herschel-script',
    get_template_directory_uri() . '/assets/js/functions.js',
    false,
    $theme_version,
    true
  );

  // Comment-reply script.
  if ( ! is_admin() && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  // Custom styles.
  $options = array(
    '#' . get_background_color(),
    get_theme_mod( 'color_scheme', '#e00000' ),
    get_theme_mod( 'text_color', '#000000' ),
    esc_url( get_header_image() ),
  );

  $css = '
    :root {
      --background-color: %1$s;
      --scheme-color:     %2$s;
      --text-color:       %3$s;
    }
  ';

  if ( has_header_image() ) {
    $css .= '
      .site-header{
        background: url( %4$s );
        background-size: cover;
      }
    ';
  }

  wp_add_inline_style( 'herschel-style', vsprintf( $css, $options ) );

}
add_action( 'wp_enqueue_scripts', 'herschel_wp_enqueue_scripts' );
