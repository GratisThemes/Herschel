<?php
/**
 * Filters for body_class().
 *
 * @package Herschel
 * @since   Herschel 2.0
 */

/**
 * Add classes to the body depending on customize settings.
 *
 * @param  array $classes Body class names.
 *
 * @return array $classes Body class names.
 */
function herschel_body_class( $classes ) {

  if ( ( is_home() || is_archive() || is_search() || is_singular() ) && is_active_sidebar( 'sidebar-widget-area' ) ) {
    $classes[] = 'has-sidebar';
  }

  if ( herschel_has_social_bar() ) {
    $classes[] = 'has-social-bar';
  }

  if ( is_home() ) {
    $classes[] = 'layout-' . get_theme_mod( 'layout', 'wide' );
  }

  return $classes;

}
add_filter( 'body_class', 'herschel_body_class' );
