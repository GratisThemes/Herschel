<?php
/**
 * Template for displaying post header, content and footer
 *
 * @package Herschel
 * @since   Herschel 2.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">
    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
    <?php herschel_entry_meta(); ?>
    <?php edit_post_link(); ?>
  </header>

  <?php the_post_thumbnail(); ?>

  <section class="entry-content">
    <?php
    if ( 'full' === get_theme_mod( 'layout', 'wide' ) ) {
      the_content();
    } else {
      the_excerpt();
    }
    ?>
  </section><!-- .entry-content -->

</article>
