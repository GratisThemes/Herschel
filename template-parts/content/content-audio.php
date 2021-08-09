<?php
/**
 * Template for displaying audio content
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

  <?php the_post_thumbnail(); ?>

  <section class="entry-content">
    <?php
    $herschel_audio_content = apply_filters( 'the_content', get_the_content() );
    $herschel_audio         = null;

    // Only get video from the content if a playlist isn't present.
    if ( false === strpos( $herschel_audio_content, 'wp-playlist-script' ) ) {
      $herschel_audio = get_media_embedded_in_content( $herschel_audio_content, array( 'audio' ) );
    }

    if ( ! empty( $herschel_audio ) ) {
      foreach ( $herschel_audio as $herschel_audio_html ) {
        echo $herschel_audio_html;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      }
    } else {
      the_content();
    }
    ?>
  </section><!-- .entry-content -->

</article>
