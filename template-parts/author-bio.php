<?php
/**
 * Template for displaying the author's information below posts
 *
 * @package Herschel
 * @since   Herschel 1.0
 */

// Quit early if there is no information about the author to be displayed.
if ( ! (bool) get_the_author_meta( 'description' ) || ! post_type_supports( get_post_type(), 'author' ) || ! get_theme_mod( 'author_bio', true ) ) {
  return;
}
?>
<div class="author-bio">

  <?php echo get_avatar( get_the_author_meta( 'ID' ), '60' ); ?>

  <?php
  $herschel_post_author = get_the_author();

  printf(
    /* translators: %s Post author */
    '<h6 class="author-bio__title">' . esc_html__( 'Author', 'herschel' ) . '</h6>%s',
    sprintf(
      '<a href="%1$s" aria-label="%3$s" class="author-bio__author-link">%2$s</a>',
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      $herschel_post_author, // phpcs:ignore WordPress.Security.EscapeOutput
      /* translators: %s Post author */
      sprintf( esc_attr__( 'Author: %s', 'herschel' ), $herschel_post_author ) // phpcs:ignore WordPress.Security.EscapeOutput
    )
  );
  ?>

  <p class="author-bio__description"><?php the_author_meta( 'description' ); ?></p>

</div><!-- .author-bio -->
