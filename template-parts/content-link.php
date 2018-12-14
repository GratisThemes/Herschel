<?php
/**
 * Template for displaying link content
 *
 * @package Herschel
 * @since 1.5.0
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php
  if ( is_single() ) {
    get_template_part( 'template-parts/entry', 'header' );
  }
  ?>

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
    $herschel_anchor_content = apply_filters( 'the_content', get_the_content() );
    $herschel_anchor = false;

    // Only get video from the content if a playlist isn't present.
    $anchor = get_media_embedded_in_content( $herschel_anchor_content, array( 'a' ) );
    
    if ( !empty( $herschel_anchor ) ) {

      foreach ( $herschel_anchor as $herschel_anchor_html ) {
        echo $herschel_anchor_html;
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