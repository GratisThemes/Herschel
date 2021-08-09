<?php
/**
 * Detect if the site has any social media links
 *
 * @package Herschel
 * @since   Herschel 1.0
 */

/**
 * Social bar checker
 *
 * @return boolean [true if the site has any social links, false if not].
 */
function herschel_has_social_bar() {
  global $herschel_social_icons;

  if ( get_theme_mod( 'social_media_rss' ) ) {
    return true;
  }

  foreach ( $herschel_social_icons as $service => $icon ) {
    if ( get_theme_mod( 'social_media_' . strtolower( $service ) ) ) {
      return true;
    }
  }

  return false;
}
