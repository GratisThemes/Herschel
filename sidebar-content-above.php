<?php
/**
 * Template for displaying a widget area above the content
 *
 * @package Herschel
 * @since Herschel 1.0
 */

if ( is_active_sidebar( 'content-above-widget-area' )  ) : ?>
	<div id="content-above-widget-area" class="sidebar widget-area wrapper" role="complementary">
		<?php dynamic_sidebar( 'content-above-widget-area' ); ?>
	</div><!-- #content-above-widget-area .sidebar .widget-area -->
<?php endif; ?>