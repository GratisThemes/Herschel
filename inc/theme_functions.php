<?php
/**
 * Custom theme functions
 *
 * @package Herschel
 * @since Herschel 1.0
 */


/**
	* Social media icons
	*
	* @since Herschel 1.3.1
	*/
$herschel_social_media_icons = array(
	'Twitter'				=>	'fa-twitter',
	'Facebook'			=>	'fa-facebook',
	'Instagram'			=>	'fa-instagram',
	'Vine'					=>	'fa-vine',
	'LinkedIn'			=>	'fa-linkedin',
	'Google+'				=>	'fa-google-plus',
	'YouTube'				=>	'fa-youtube',
	'Twitch'				=>	'fa-twitch',
	'Vimeo'					=>	'fa-vimeo',
	'Pinterest'			=>	'fa-pinterest',
	'Reddit'				=>	'fa-reddit-alien',
	'Steam'					=>	'fa-steam',
	'Flickr'				=>	'fa-flickr',
	'Tumblr'				=>	'fa-tumblr',
	'Spotify'				=>	'fa-spotify',
	'Soundcloud'		=>	'fa-soundcloud',
	'MixCloud'			=>	'fa-mixcloud',
	'GitHub'				=>	'fa-github',
	'BitBucket'			=>	'fa-bitbucket',
	'Behance'				=>	'fa-behance',
	'LastFM'				=>	'fa-lastfm',
);

function herschel_any_social_icons(){
	global $herschel_social_media_icons;

	if(get_theme_mod( 'social_media_rss' )) return true;

	foreach( $herschel_social_media_icons as $service => $icon ){
		if( get_theme_mod( 'social_media_'.strtolower($service) ) ) return true;
	}

	return false;
}

function herschel_social_media(){
	global $herschel_social_media_icons; ?>

	<ul id="herschel-social-media-links">
		<li>
			<i id="menu-toggle"class="fa fa-bars"></i>
		</li>

		<?php if(get_theme_mod( 'social_media_rss' )): ?>
			<li>
				<a title="<?php esc_attr( bloginfo('rss2_url') ); ?>" href="<?php esc_url( bloginfo('rss2_url') ); ?>" target="_blank">
					<i class="fa fa-rss"></i>
				</a>
			</li>
		<?php endif;

		foreach( $herschel_social_media_icons as $service => $icon ):
			if( get_theme_mod( 'social_media_'.strtolower($service) ) ): ?>
				<li>
					<a title="<?php echo esc_attr($service); ?>" href="<?php echo esc_url( get_theme_mod( 'social_media_'.strtolower($service) ) ); ?>" target="_blank">
						<i class="fa <?php echo esc_attr($icon); ?>"></i>
					</a>
				</li>
			<?php endif;
		endforeach; ?>
	</ul>
<?php }

/**
	* Breadcrumbs
	*
	* @since Herschel 1.2.0
	*/

function herschel_breadcrumbs(){
	if( get_theme_mod('breadcrumbs', false) ): ?>
		<div class="herschel-breadcrumbs">
			<?php // Home
				printf( '<span><a href="%1$s">%2$s</a></span>',
					esc_url( home_url( '/' ) ),
					get_bloginfo('name')
				);
			?>

			<?php // Category
				if( is_singular() && has_category() ){ ?>
					<span><?php the_category(', '); ?></span>
				<?php }elseif( is_archive() ){
					the_archive_title('<span>', '</span>');
				}
			?>

			<?php // Page hirearchy
				if( is_page() ){
					$ancestors = get_post_ancestors($post);

					if($ancestors){
						$ancestors = array_reverse($ancestors);

						foreach ($ancestors as $crumb) {
							printf( '<span><a href="%1$s">%2$s</a></span>',
								esc_url( get_permalink($crumb) ),
								get_the_title($crumb)
							);
						}
					}
				}
			?>

			<?php // Singular
				if( is_singular() ){
					the_title('<span>', '</span>');
				}
			?>
		</div>
	<?php endif;
}