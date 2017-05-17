<?php
/**
 * Template for displaying a widget area in the header
 *
 * @package Herschel
 * @since Herschel 1.0
 */

if ( is_active_sidebar( 'header-widget-area' )  ) : ?>
	<div id="header-widget-area" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'header-widget-area' ); ?>
	</div><!-- #header-widget-area .sidebar .widget-area -->
<?php endif; ?>