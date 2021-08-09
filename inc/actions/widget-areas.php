<?php
/**
 * Widget areas
 *
 * @package Herschel
 * @since  1.0.0
 */

/**
 * The widgets_init action
 */
function herschel_widgets_init() {

  register_sidebar(
    array(
      'name'          => __( 'Header', 'herschel' ),
      'id'            => 'header-widget-area',
      'description'   => __( 'Widget area in the header with room for one widget, good for an ad banner or similar', 'herschel' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name'          => __( 'Above the content', 'herschel' ),
      'id'            => 'content-above-widget-area',
      'description'   => __( 'Horizontal widget area above the content with room for 3 widgets', 'herschel' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name'          => __( 'Below the content', 'herschel' ),
      'id'            => 'content-below-widget-area',
      'description'   => __( 'Horizontal widget area below the content with room for 3 widgets', 'herschel' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name'          => __( 'Sidebar', 'herschel' ),
      'id'            => 'sidebar-widget-area',
      'description'   => __( 'Widget area aside the side of the content', 'herschel' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name'          => __( 'Footer (top row)', 'herschel' ),
      'id'            => 'footer-widget-area-one',
      'description'   => __( 'Horizontal widget area at the top of the footer with room for 3 widgets', 'herschel' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name'          => __( 'Footer (bottom row)', 'herschel' ),
      'id'            => 'footer-widget-area-two',
      'description'   => __( 'Horizontal widget area at the bottom of the footer with room for 3 widgets', 'herschel' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

}
add_action( 'widgets_init', 'herschel_widgets_init' );
