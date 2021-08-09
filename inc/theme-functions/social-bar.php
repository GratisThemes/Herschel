<?php
/**
 * Social media links
 *
 * @package Herschel
 * @since   Herschel 2.0
 */

/**
 * Social media icons
 */
$herschel_social_icons = array(
  'Amazon'      => 'fa-amazon',
  'Behance'     => 'fa-behance',
  'BitBucket'   => 'fa-bitbucket',
  'Bitcoin'     => 'fa-bitcoin',
  'Discord'     => 'fa-discord',
  'Etsy'        => 'fa-etsy',
  'Facebook'    => 'fa-facebook',
  'Flickr'      => 'fa-flickr',
  'GitHub'      => 'fa-github',
  'Google+'     => 'fa-google-plus',
  'Instagram'   => 'fa-instagram',
  'LastFM'      => 'fa-lastfm',
  'LinkedIn'    => 'fa-linkedin',
  'MixCloud'    => 'fa-mixcloud',
  'Pinterest'   => 'fa-pinterest',
  'PlayStation' => 'fa-playstation',
  'Reddit'      => 'fa-reddit-alien',
  'SnapChat'    => 'fa-snapchat-ghost',
  'Soundcloud'  => 'fa-soundcloud',
  'Spotify'     => 'fa-spotify',
  'Steam'       => 'fa-steam',
  'Teamspeak'   => 'fa-teamspeak',
  'Tumblr'      => 'fa-tumblr',
  'Twitch'      => 'fa-twitch',
  'Twitter'     => 'fa-twitter',
  'Vimeo'       => 'fa-vimeo',
  'Vine'        => 'fa-vine',
  'Xbox'        => 'fa-xbox',
  'YouTube'     => 'fa-youtube',
);

/**
 * Formated social media elements
 */
function herschel_social_bar() {
  global $herschel_social_icons;

  if ( ! herschel_has_social_bar() ) {
    return;
  }

  ?>
  <div class="social-bar">
    <?php if ( get_theme_mod( 'social_media_rss' ) ) : ?>
      <a class="social-links__rss" title="<?php esc_attr( bloginfo( 'rss2_url' ) ); ?>" aria-label="<?php esc_attr_e( 'RSS feed', 'herschel' ); ?>" href="<?php esc_url( bloginfo( 'rss2_url' ) ); ?>" target="_blank">
        <i class="fa fa-rss"></i>
      </a>
    <?php endif; ?>

    <?php
    foreach ( $herschel_social_icons as $service => $icon ) :
      $service_slug = strtolower( $service );
      ?>
      <?php if ( get_theme_mod( 'social_media_' . $service_slug ) ) : ?>
        <a class="<?php echo esc_attr( 'social-links__' . $service_slug ); ?>"
          title="<?php echo esc_attr( $service ); ?>"
          aria-label="<?php echo esc_attr( $service ); ?>"
          href="<?php echo esc_url( get_theme_mod( 'social_media_' . $service_slug ) ); ?>"
          target="_blank"
        >
          <i class="fab <?php echo esc_attr( $icon ); ?>"></i>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
  </div><!-- .social-links -->
  <?php
}
