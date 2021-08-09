<?php
/**
 * Template for displaying a widget area above the content
 *
 * @package Herschel
 * @since   Herschel 1.0
 */

?>

<?php if ( is_active_sidebar( 'content-above-widget-area' ) ) : ?>

  <div class="widget-area widget-area-above-content" role="complementary">
    <?php dynamic_sidebar( 'content-above-widget-area' ); ?>
  </div><!-- .widget-area-above -->

<?php endif; ?>
