<?php
/**
 * The wp_head hook
 *
 * @package Herschel
 * @since   Herschel 2.0
 */

/**
 * The wp_head hook
 */
function herschel_wp_head() {
  // Pingback.
  if ( is_singular() && pings_open() ) {
    echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
  }
}
add_action( 'wp_head', 'herschel_wp_head' );
