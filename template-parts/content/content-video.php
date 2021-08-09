<?php
/**
 * Template for displaying video content
 *
 * @package Herschel
 * @since   Herschel 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">
    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
    <?php herschel_entry_meta(); ?>
    <?php edit_post_link(); ?>
  </header>

  <section class="entry-content">
    <?php
    $herschel_video_content = apply_filters( 'the_content', get_the_content() );
    $herschel_video         = null;

    // Only get video from the content if a playlist isn't present.
    if ( false === strpos( $herschel_video_content, 'wp-playlist-script' ) ) {
      $herschel_video = get_media_embedded_in_content( $herschel_video_content, array( 'video', 'object', 'embed', 'iframe' ) );
    }

    if ( ! empty( $herschel_video ) ) {
      foreach ( $herschel_video as $herschel_video_html ) {
        echo $herschel_video_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      }
    }
    ?>
  </section><!-- .entry-content -->

</article>
