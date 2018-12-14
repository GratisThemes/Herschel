<?php
/**
 * Template for displaying a widget area below the content
 *
 * @package Herschel
 * @since 1.0.0
 * @version 1.5.0 [Added container to help with the social bar]
 */
?>

<?php if ( is_active_sidebar( 'content-below-widget-area' ) ): ?>

  <div id="widget-area-below-container">
    <div id="widget-area-below" class="widget-area" role="complementary">

    <?php dynamic_sidebar( 'content-below-widget-area' ); ?>

    </div><!-- #widget-area-below -->
  </div><!-- #widget-area-below-container -->

<?php endif; ?>