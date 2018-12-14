<?php
/**
 * Template for displaying video content
 *
 * @package Herschel
 * @since 1.5.0
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php get_template_part( 'template-parts/entry', 'header' ); ?>

  <?php if (
    get_the_post_thumbnail() !== '' &&
    (
      ( ( is_home() || is_archive() ) && get_theme_mod( 'thumbnail_index', true ) ) ||
      ( is_single() && get_theme_mod( 'thumbnail_content', true ) )
    )
  ): ?>
    <a class="post-thumbnail" href="<?php the_permalink() ?>">
      <?php the_post_thumbnail( 'herschel-featured-image' ); ?>
    </a><!-- .post-thumbnail -->
  <?php endif; ?>

  <article class="entry-content">
    <?php 
    $herschel_video_content = apply_filters( 'the_content', get_the_content() );
    $herschel_video = false;

    // Only get video from the content if a playlist isn't present.
    if ( false === strpos( $herschel_video_content, 'wp-playlist-script' ) ) {
      $herschel_video = get_media_embedded_in_content( $herschel_video_content, array( 'video', 'object', 'embed', 'iframe' ) );
    }
    
    if ( !is_single() && !empty( $herschel_video ) ) {
      
      foreach ( $herschel_video as $herschel_video_html ) {
        echo $herschel_video_html;
      }

    } else {
      
      the_content();

      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'herschel' ),
        'after' => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after' => '</span>',
      ) );
    }
    ?>
  </article><!-- .entry-content -->

  <?php
  if ( is_single() ) {
    get_template_part('template-parts/entry', 'footer');
  } ?>
</section>