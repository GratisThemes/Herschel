<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Herschel
 * @since Herschel 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="site-header">
		<div class="wrapper">
			<div id="social-bar">
				<?php herschel_social_media(); ?>
			</div>

			<div id="site-header-inner">
				<div id="site-information">
					<?php if( function_exists( 'the_custom_logo' ) ) the_custom_logo(); ?>

					<?php if( get_theme_mod('display_site_title', true) ): ?>
						<h1 id="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						</h1>
					<?php endif; ?>

					<?php if( get_theme_mod('display_tagline', true) ):?>
						<p id="site-tagline"><?php bloginfo( 'description' ) ?></p>
					<?php endif; ?>
				</div>

				<?php get_sidebar('header'); ?>
			</div>

		</div>
	</header>

	<?php if ( has_nav_menu( 'header' )):
		wp_nav_menu( array(
			'theme_location' => 'header',
			'menu_class'     => 'header-menu',
			'container_id'	 => 'header-menu-container'
		) );
	endif; ?>

	<div id="site-content" class="wrapper">
