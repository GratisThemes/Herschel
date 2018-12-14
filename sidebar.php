<?php
/**
 * Template for displaying the sidebar widget area
 *
 * @package Herschel
 * @since 1.0.0
 * @version 1.5.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-widget-area' ) ): ?>

  <aside id="widget-area-sidebar" class="widget-area">

    <?php dynamic_sidebar( 'sidebar-widget-area' ); ?>

  </aside>

<?php endif; ?>