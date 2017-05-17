<?php
/**
 * Template for displaying the footer
 *
 * @package Herschel
 * @since Herschel 1.2.1
 */
?>
</div><!-- #site-content -->

<?php get_sidebar('content-below')?>

<footer id="site-footer">
	<div class="wrapper footer-wrapper">
		<?php get_sidebar('footer'); ?>

		<?php if ( has_nav_menu( 'footer' ) ):
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'menu_class'     => 'footer-menu',
				'depth'					 =>	'1',
				'container_id'	 => 'footer-menu-container'
			) );
		endif; ?>

		<div id="footer-information">
			<span>
				<?php echo esc_html( get_theme_mod( 'footer_text', get_bloginfo('name') ) ); ?>
				<?php if( get_theme_mod( 'footer_copyright', true ) ): ?>&copy;<?php endif; ?>
				<?php if( get_theme_mod( 'footer_year', true) ): echo date("Y"); endif; ?>
			</span>

			<?php if( get_theme_mod( 'footer_advert', true) ): ?>
				<span>
					<?php
						$herschel_theme_data = wp_get_theme();

						printf( __( 'Theme: %1$s by %2$s', 'herschel' ),
							$herschel_theme_data['Name'],
							$herschel_theme_data['Author']
						);
					?>
				</span>
			<?php endif; ?>
		</div>

		<?php if ( get_theme_mod( 'scrolltotop', true ) ): ?>
			<a id="scroll-to-top" href="#"><i class="fa fa-angle-up"></i></a>
		<?php endif; ?>

	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
