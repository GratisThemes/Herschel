<?php
/**
 * Template for displaying a widget area above the content
 *
 * @package Herschel
 * @since 1.0.0
 * @version 1.5.0 [Added container to help with the social bar]
 */
?>

<?php if ( is_active_sidebar( 'content-above-widget-area' ) ): ?>

  <div id="widget-area-above-container">
    <div id="widget-area-above" class="widget-area" role="complementary">

    <?php dynamic_sidebar( 'content-above-widget-area' ); ?>

    </div><!-- #widget-area-above -->
  </div><!-- #widget-area-above-container -->

<?php endif; ?>