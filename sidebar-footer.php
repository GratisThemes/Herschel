<?php
/**
 * Template for displaying a widget area in the footer
 *
 * @package Herschel
 * @since   Herschel 1.0
 */

if ( ! is_active_sidebar( 'footer-widget-area-one' ) &&
    ! is_active_sidebar( 'footer-widget-area-two' )
) {
  return;
}?>

<?php if ( is_active_sidebar( 'footer-widget-area-one' ) ) : ?>
  <div class="widget-area widget-area-footer-top" role="complementary">
    <?php dynamic_sidebar( 'footer-widget-area-one' ); ?>
  </div><!-- .widget-area-footer-top -->
  <?php
endif;

if ( is_active_sidebar( 'footer-widget-area-two' ) ) :
  ?>
  <div class="widget-area widget-area-footer-bottom" role="complementary">
    <?php dynamic_sidebar( 'footer-widget-area-two' ); ?>
  </div><!-- .widget-area-footer-bottom -->
<?php endif; ?>
