<?php
/**
 * Widget areas
 *
 * @package Herschel
 * @since  1.0.0
 */

function herschel_widgets_init() {

  register_sidebar( array(
    'name'          => __('Header', 'herschel'),
    'id'            => 'header-widget-area',
    'description'   => __('Widget area in the header', 'herschel'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Above the content', 'herschel'),
    'id'            => 'content-above-widget-area',
    'description'   => __('Widget area above the content', 'herschel'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Below the content', 'herschel'),
    'id'            => 'content-below-widget-area',
    'description'   => __('Widget area below the content', 'herschel'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Sidebar', 'herschel'),
    'id'            => 'sidebar-widget-area',
    'description'   => __('Widget area at the side of the content', 'herschel'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Footer (top)', 'herschel'),
    'id'            => 'footer-widget-area-one',
    'description'   => __('Widget area at the top of the footer', 'herschel'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Footer (bottom)', 'herschel'),
    'id'            => 'footer-widget-area-two',
    'description'   => __('Widget area at the bottom of the footer', 'herschel'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'herschel_widgets_init' );