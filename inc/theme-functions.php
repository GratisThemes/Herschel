<?php
/**
 * Custom theme functions
 *
 * @package Herschel
 * @since 1.0.0
 * @version 1.5.0 [Removed herschel_breadcrumbs()]
 */

/**
  * Social media icons
  *
  * @since 1.0.0
  * @version 1.5.0 [Renamed variable]
  */
$herschel_social_icons = array(
  'Twitter'       =>  'fa-twitter',
  'Facebook'      =>  'fa-facebook',
  'Instagram'     =>  'fa-instagram',
  'Vine'          =>  'fa-vine',
  'LinkedIn'      =>  'fa-linkedin',
  'Google+'       =>  'fa-google-plus',
  'YouTube'       =>  'fa-youtube',
  'Twitch'        =>  'fa-twitch',
  'Vimeo'         =>  'fa-vimeo',
  'Pinterest'     =>  'fa-pinterest',
  'Reddit'        =>  'fa-reddit-alien',
  'Steam'         =>  'fa-steam',
  'Flickr'        =>  'fa-flickr',
  'Tumblr'        =>  'fa-tumblr',
  'Spotify'       =>  'fa-spotify',
  'Soundcloud'    =>  'fa-soundcloud',
  'MixCloud'      =>  'fa-mixcloud',
  'GitHub'        =>  'fa-github',
  'BitBucket'     =>  'fa-bitbucket',
  'Behance'       =>  'fa-behance',
  'LastFM'        =>  'fa-lastfm',
);

/**
 * Detect if the site has any social media links
 *
 * @since  1.0.0
 * @version 1.5.0 [Renamed function]
 * @return boolean [true if the site has any social links, false if not]
 */
function herschel_has_social_icons() {
  global $herschel_social_icons;
  
  if ( get_theme_mod( 'social_media_rss' ) ) return true;
  
  foreach( $herschel_social_icons as $service => $icon ){
    if( get_theme_mod( 'social_media_'.strtolower($service) ) ) return true;
  }

  return false;
}

/**
 * Formated social media elements
 * 
 * @since 1.0.0
 * @version 1.5.0 [Renamed function and cleaned up markup]
 * @return Element [div#social-links]
 */
function herschel_social_links() {
  global $herschel_social_icons;

  ?>
  <div id="social-links">
    <?php if ( get_theme_mod( 'social_media_rss' ) ): ?>
      <a title="<?php esc_attr( bloginfo( 'rss2_url' ) ); ?>" href="<?php esc_url( bloginfo('rss2_url') ); ?>" target="_blank">
        <i class="fas fa-rss"></i>
      </a>
    <?php endif; ?>

    <?php foreach( $herschel_social_icons as $service => $icon ): ?>
      <?php if ( get_theme_mod( 'social_media_'.strtolower( $service ) ) ): ?>
        <a title="<?php echo esc_attr( $service ); ?>" href="<?php echo esc_url( get_theme_mod( 'social_media_'.strtolower( $service ) ) ); ?>" target="_blank">
          <i class="fab <?php echo esc_attr( $icon ); ?>"></i>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
  </div><!-- #social-links -->
<?php
}
?>
