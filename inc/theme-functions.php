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
  * @version 1.7.0 [Added more social media icons]
  */
$herschel_social_icons = array(
  'Amazon'        =>  'fa-amazon',
  'Behance'       =>  'fa-behance',
  'BitBucket'     =>  'fa-bitbucket',
  'Bitcoin'       =>  'fa-bitcoin',
  'Discord'       =>  'fa-discord',
  'Etsy'          =>  'fa-etsy',
  'Facebook'      =>  'fa-facebook',
  'Flickr'        =>  'fa-flickr',
  'GitHub'        =>  'fa-github',
  'Google+'       =>  'fa-google-plus',
  'Instagram'     =>  'fa-instagram',
  'LastFM'        =>  'fa-lastfm',
  'LinkedIn'      =>  'fa-linkedin',
  'MixCloud'      =>  'fa-mixcloud',
  'Pinterest'     =>  'fa-pinterest',
  'PlayStation'   =>  'fa-playstation',
  'Reddit'        =>  'fa-reddit-alien',
  'SnapChat'      =>  'fa-snapchat-ghost',
  'Soundcloud'    =>  'fa-soundcloud',
  'Spotify'       =>  'fa-spotify',
  'Steam'         =>  'fa-steam',
  'Teamspeak'     =>  'fa-teamspeak',
  'Tumblr'        =>  'fa-tumblr',
  'Twitch'        =>  'fa-twitch',
  'Twitter'       =>  'fa-twitter',
  'Vimeo'         =>  'fa-vimeo',
  'Vine'          =>  'fa-vine',
  'Xbox'          =>  'fa-xbox',
  'YouTube'       =>  'fa-youtube',
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
