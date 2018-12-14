<?php
/**
 * Various changes to wordpress functions
 *
 * @package Herschel
 * @since 1.5.0
 */

/**
 * Custom excerpt more
 *
 * @since 1.0.0
 * @version 1.5.0 [Improved logic and layout]
 * @return String
 */
function herschel_excerpt_more( $more ) {
  if ( is_admin() ) return $more;

  if ( !get_theme_mod( 'read_more' , true) ) return '...';

  return sprintf(
    '...<a class="read-more-link" href="%1$s">%2$s<span class="screen-reader-text">%2$s</span></a>',
    esc_url( get_permalink( get_the_ID() ) ),
    __( 'Read more', 'herschel' )
  );


}
add_filter('excerpt_more', 'herschel_excerpt_more');

/**
 * Add classes to the body depending on customize settings
 *
 * @since 1.0.0
 * @version 1.5.0 [Simplified class names]
 * @return Array [Class names]
 */
function herschel_body_class( $classes ) {

  if ( ( is_home() || is_archive() || is_search() || is_singular() ) && is_active_sidebar( 'sidebar-widget-area' ) ) {
    $classes[] = 'has-sidebar';
  }

  if ( herschel_has_social_icons() ) {
    $classes[] = 'has-social-icons';
  }

  if ( is_home() ) {
    $classes[] = 'layout-' . get_theme_mod( 'layout' ,  'wide' );
  }

  if ( is_active_sidebar( 'header-widget-area' ) ) {
    $classes[] = 'has-header-widgets';
  }
  
  return $classes;

}
add_filter( 'body_class', 'herschel_body_class' );
?>