<?php
/**
 * Template for displaying landing and archive pages
 *
 * @package Herschel
 * @since   Herschel 1.0
 */

$herschel_archive_title       = '';
$herschel_archive_description = '';

if ( is_search() ) {
  $herschel_archive_title = sprintf(
    /* translators: %s: search term */
    __( 'Search results for: "%s"', 'herschel' ),
    '<span>' . get_search_query() . '</span>'
  );

} elseif ( is_archive() && ! have_posts() ) {
  $herschel_archive_title = __( 'Nothing Found', 'herschel' );

} elseif ( ! is_home() ) {
  $herschel_archive_title       = get_the_archive_title();
  $herschel_archive_description = get_the_archive_description();
}
?>

<?php get_header(); ?>

<?php get_sidebar( 'above' ); ?>

<main class="site-main" role="main">

  <section class="content-container">

    <?php if ( $herschel_archive_title || $herschel_archive_description ) : ?>
      <header class="archive-header">
        <?php if ( $herschel_archive_title ) : ?>
          <h1><?php echo wp_kses_post( $herschel_archive_title ); ?></h1>
        <?php endif; ?>

        <?php if ( $herschel_archive_description ) : ?>
          <?php echo wp_kses_post( wpautop( $herschel_archive_description ) ); ?>
        <?php endif; ?>
      </header>
    <?php endif; ?>

    <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        get_template_part( 'template-parts/content/content', get_post_format() );
      }

      the_posts_pagination(
        array(
          'prev_text'          => __( 'Prev', 'herschel' ) . '<span class="screen-reader-text">' . __( 'Previous page', 'herschel' ) . '</span>',
          'next_text'          => __( 'Next', 'herschel' ) . '<span class="screen-reader-text">' . __( 'Next page', 'herschel' ) . '</span>',
          'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'herschel' ) . '</span>',
        )
      );

    } else {
      get_template_part( 'template-parts/content/content', 'none' );
    }
    ?>

  </section><!-- .contant-container -->

  <?php get_sidebar(); ?>

</main><!-- .site-main -->

<?php get_sidebar( 'below' ); ?>

<?php get_footer(); ?>
