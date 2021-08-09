<?php
/**
 * Template for displaying a widget area below the content
 *
 * @package Herschel
 * @since   Herschel 1.0
 */

?>

<?php if ( is_active_sidebar( 'content-below-widget-area' ) ) : ?>

  <div class="widget-area widget-area-below-content" role="complementary">
    <?php dynamic_sidebar( 'content-below-widget-area' ); ?>
  </div><!-- .widget-area-below -->

<?php endif; ?>
