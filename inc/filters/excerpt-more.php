<?php
/**
 * Filters for escerpt_more().
 *
 * @package Herschel
 * @since   Herschel 2.0
 */

/**
 * Adds custom "Read more" element
 *
 * @param string $more_string Read more string.
 *
 * @return string
 */
function herschel_excerpt_more( $more_string ) {
  if ( is_admin() ) {
    return $more_string;
  }

  if ( ! get_theme_mod( 'read_more', true ) ) {
    return '...';
  }

  return sprintf(
    '...<a class="read-more-link button" href="%1$s">%2$s</a>',
    esc_url( get_permalink( get_the_ID() ) ),
    esc_html__( 'Read more', 'herschel' )
  );
}
add_filter( 'excerpt_more', 'herschel_excerpt_more' );
