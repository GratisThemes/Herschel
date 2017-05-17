<?php
/**
 * Template for displaying a widget area below the content
 *
 * @package Herschel
 * @since Herschel 1.0
 */

if ( is_active_sidebar( 'content-below-widget-area' )  ) : ?>
	<div id="content-below-widget-area" class="sidebar widget-area wrapper" role="complementary">
		<?php dynamic_sidebar( 'content-below-widget-area' ); ?>
	</div><!-- #content-below-widget-area .sidebar .widget-area -->
<?php endif; ?>