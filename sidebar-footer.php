<?php
/**
 * Template for displaying a widget area in the footer
 *
 * @package Herschel
 * @since Herschel 1.0.0
 */
if( !is_active_sidebar( 'footer-widget-area-one' ) &&
    !is_active_sidebar( 'footer-widget-area-two' ) 
){
  return;
}?>

<div id="widget-areas-footer-container">

  <?php if ( is_active_sidebar( 'footer-widget-area-one' )  ) : ?>
    <div id="widget-area-footer-one" class="widget-area" role="complementary">
      <?php dynamic_sidebar( 'footer-widget-area-one' ); ?>
    </div><!-- #widget-area-footer-one -->
  <?php endif;

  if ( is_active_sidebar( 'footer-widget-area-two' )  ) : ?>
    <div id="widget-area-footer-two" class="widget-area" role="complementary">
      <?php dynamic_sidebar( 'footer-widget-area-two' ); ?>
    </div><!-- #widget-area-footer-two -->
  <?php endif; ?>

</div><!-- #widget-areas-footer-container -->