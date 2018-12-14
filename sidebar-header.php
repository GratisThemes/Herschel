<?php
/**
 * Template for displaying a widget area in the header
 *
 * @package Herschel
 * @since 1.0.0
 * @version 1.5.0 [Changed class names]
 */
?>

<?php if ( is_active_sidebar( 'header-widget-area' ) ): ?>

  <div id="widget-area-header" class="widget-area" role="complementary">

    <?php dynamic_sidebar( 'header-widget-area' ); ?>

  </div>

<?php endif; ?>