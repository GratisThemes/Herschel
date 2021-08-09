<?php
/**
 * Theme customizer file
 *
 * @package Herschel
 * @since   Herschel 1.0
 */

/**
 * Customize register
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function herschel_curtomize_register( $wp_customize ) {

  /* Toggle site title */
  $wp_customize->add_setting(
    'display_site_title',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'display_site_title',
    array(
      'label'   => __( 'Display Site Title', 'herschel' ),
      'section' => 'title_tagline',
      'type'    => 'checkbox',
    )
  );

  /* Toggle site description */
  $wp_customize->add_setting(
    'display_tagline',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'display_tagline',
    array(
      'label'   => __( 'Display Tagline', 'herschel' ),
      'section' => 'title_tagline',
      'type'    => 'checkbox',
    )
  );

  /* Color scheme */
  $wp_customize->add_setting(
    'color_scheme',
    array(
      'default'           => '#e00000',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'color_scheme',
      array(
        'label'    => __( 'Color Scheme', 'herschel' ),
        'section'  => 'colors',
        'settings' => 'color_scheme',
      )
    )
  );

  /* Text color */
  $wp_customize->add_setting(
    'text_color',
    array(
      'default'           => '#000000',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'text_color',
      array(
        'label'    => __( 'Text Color', 'herschel' ),
        'section'  => 'colors',
        'settings' => 'text_color',
      )
    )
  );

  /* Entry meta section */
  $wp_customize->add_section(
    'entry_meta',
    array(
      'title'    => __( 'Entry Metadata', 'herschel' ),
      'priority' => 80,
    )
  );

  /* Entry meta author link */
  $wp_customize->add_setting(
    'entry_meta_author',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'entry_meta_author',
    array(
      'label'   => __( 'Display author', 'herschel' ),
      'section' => 'entry_meta',
      'type'    => 'checkbox',
    )
  );

  /* Entry meta date */
  $wp_customize->add_setting(
    'entry_meta_date',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'entry_meta_date',
    array(
      'label'   => __( 'Display date posted', 'herschel' ),
      'section' => 'entry_meta',
      'type'    => 'checkbox',
    )
  );

  /* Entry meta comment count */
  $wp_customize->add_setting(
    'entry_meta_comments',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'entry_meta_comments',
    array(
      'label'   => __( 'Display comment count', 'herschel' ),
      'section' => 'entry_meta',
      'type'    => 'checkbox',
    )
  );

  /* Entry meta categories */
  $wp_customize->add_setting(
    'entry_meta_categories',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'entry_meta_categories',
    array(
      'label'   => __( 'Display Categories', 'herschel' ),
      'section' => 'entry_meta',
      'type'    => 'checkbox',
    )
  );

  /* Entry meta tags */
  $wp_customize->add_setting(
    'entry_meta_tags',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'entry_meta_tags',
    array(
      'label'   => __( 'Display Tags', 'herschel' ),
      'section' => 'entry_meta',
      'type'    => 'checkbox',
    )
  );

  /* Author bio */
  $wp_customize->add_setting(
    'author_bio',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'author_bio',
    array(
      'label'   => __( 'Display Author Bio', 'herschel' ),
      'section' => 'entry_meta',
      'type'    => 'checkbox',
    )
  );

  /* Design options section */
  $wp_customize->add_section(
    'design_options',
    array(
      'title'    => __( 'Design Options', 'herschel' ),
      'priority' => 90,
    )
  );

  /* Theme layout */
  $wp_customize->add_setting(
    'layout',
    array(
      'default'           => 'wide',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'herschel_sanitize_layout',
    )
  );

  $wp_customize->add_control(
    'layout',
    array(
      'type'    => 'radio',
      'label'   => __( 'Change the layout of the site', 'herschel' ),
      'section' => 'design_options',
      'choices' => array(
        'wide'      => __( 'Wide', 'herschel' ),
        'condensed' => __( 'Condensed', 'herschel' ),
        'full'      => __( 'Full Content', 'herschel' ),
      ),
    )
  );

  /* Display thumbnails on index pages */
  $wp_customize->add_setting(
    'thumbnail_index',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'thumbnail_index',
    array(
      'label'   => __( 'Display thumbnails on archive pages', 'herschel' ),
      'section' => 'design_options',
      'type'    => 'checkbox',
    )
  );

  /* Display thumbnails on content pages */
  $wp_customize->add_setting(
    'thumbnail_content',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'thumbnail_content',
    array(
      'label'   => __( 'Display thumbnails on singular pages', 'herschel' ),
      'section' => 'design_options',
      'type'    => 'checkbox',
    )
  );

  /* Display read more button */
  $wp_customize->add_setting(
    'read_more',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'read_more',
    array(
      'label'   => __( 'Display "read more" button', 'herschel' ),
      'section' => 'design_options',
      'type'    => 'checkbox',
    )
  );

  /* Social media icons section */
  $wp_customize->add_section(
    'social_icons',
    array(
      'title'    => __( 'Social bar', 'herschel' ),
      'priority' => 50,
    )
  );

  /* RSS link */
  $wp_customize->add_setting(
    'social_media_rss',
    array(
      'default'           => false,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'social_media_rss',
    array(
      'label'   => __( 'RSS Link', 'herschel' ),
      'section' => 'social_icons',
      'type'    => 'checkbox',
    )
  );

  /* Social icons */
  global $herschel_social_icons;

  foreach ( $herschel_social_icons as $service => $icon ) {
    $wp_customize->add_setting(
      'social_media_' . strtolower( $service ),
      array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
      )
    );

    $wp_customize->add_control(
      'social_media_' . strtolower( $service ),
      array(
        'label'   => $service . ' URL',
        'section' => 'social_icons',
        'type'    => 'text',
      )
    );
  }

  /* Footer section */
  $wp_customize->add_section(
    'footer',
    array(
      'title'    => __( 'Footer', 'herschel' ),
      'priority' => 120,
    )
  );

  /* Change copyright text */
  $wp_customize->add_setting(
    'footer_text',
    array(
      'default'           => esc_attr( get_bloginfo( 'name' ) ),
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'footer_text',
    array(
      'label'   => __( 'Footer text', 'herschel' ),
      'section' => 'footer',
      'type'    => 'text',
    )
  );

  /* Toggle copyright icon */
  $wp_customize->add_setting(
    'footer_copyright',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'footer_copyright',
    array(
      'label'   => __( 'Display Copyright Icon', 'herschel' ),
      'section' => 'footer',
      'type'    => 'checkbox',
    )
  );

  /* Toggle current year */
  $wp_customize->add_setting(
    'footer_year',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'footer_year',
    array(
      'label'   => __( 'Display Current Year', 'herschel' ),
      'section' => 'footer',
      'type'    => 'checkbox',
    )
  );

  /* Advertise theme author */
  $wp_customize->add_setting(
    'footer_advert',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'footer_advert',
    array(
      'label'   => __( 'Advertise Theme', 'herschel' ),
      'section' => 'footer',
      'type'    => 'checkbox',
    )
  );

  /* Scroll to top icon */
  $wp_customize->add_setting(
    'scrolltotop',
    array(
      'default'           => true,
      'sanitize_callback' => 'herschel_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'scrolltotop',
    array(
      'label'   => __( 'Display "Scroll-to-top" button', 'herschel' ),
      'section' => 'footer',
      'type'    => 'checkbox',
    )
  );
}
add_action( 'customize_register', 'herschel_curtomize_register' );

/**
 * Sanitize checkbox elements
 *
 * @param boolean $input Checkbox status.
 */
function herschel_sanitize_checkbox( $input ) {
  /* Boolean check */
  return ( true === $input && isset( $input ) ? true : false );
}

/**
 * Sanitize layout radio buttons
 *
 * @param string $input Layout option.
 */
function herschel_sanitize_layout( $input ) {
  /* Ensure input is a slug */
  $input = sanitize_key( $input );

  $valid = array(
    'wide'      => __( 'Wide', 'herschel' ),
    'condensed' => __( 'Condensed', 'herschel' ),
    'full'      => __( 'Full Content', 'herschel' ),
  );

  return array_key_exists( $input, $valid ) ? $input : '';
}
