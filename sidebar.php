<?php
/**
 * Template for displaying the sidebar widget area
 *
 * @package Herschel
 * @since   Herschel 1.0
 */

?>

<?php if ( is_active_sidebar( 'sidebar-widget-area' ) ) : ?>

  <aside class="widget-area widget-area-sidebar">
    <?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
  </aside>

<?php endif; ?>
