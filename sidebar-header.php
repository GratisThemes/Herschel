<?php
/**
 * Template for displaying a widget area in the header
 *
 * @package Herschel
 * @since   Herschel 1.0
 */

?>

<?php if ( is_active_sidebar( 'header-widget-area' ) ) : ?>

  <div class="widget-area widget-area-header" role="complementary">
    <?php dynamic_sidebar( 'header-widget-area' ); ?>
  </div>

<?php endif; ?>
