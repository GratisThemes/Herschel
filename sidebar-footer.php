<?php
/**
 * Template for displaying a widget area in the footer
 *
 * @package Herschel
 * @since Herschel 1.0
 */
if( !is_active_sidebar( 'footer-widget-area-one' ) &&
		!is_active_sidebar( 'footer-widget-area-two' ) 
){
	return;
}

if ( is_active_sidebar( 'footer-widget-area-one' )  ) : ?>
	<div id="footer-widget-area-one" class="footer-widget-area sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'footer-widget-area-one' ); ?>
	</div><!-- #footer-widget-area-one .footer-widget-area .sidebar .widget-area -->
<?php endif;

if ( is_active_sidebar( 'footer-widget-area-two' )  ) : ?>
	<div id="footer-widget-area-two" class="footer-widget-area sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'footer-widget-area-two' ); ?>
	</div><!-- #footer-widget-area-two .footer-widget-area .sidebar .widget-area -->
<?php endif; ?>