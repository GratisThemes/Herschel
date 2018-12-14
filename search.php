<?php
/**
 * Template for displaying search results
 *
 * @package Herschel
 * @since 1.0.0
 * @version 1.5.0
 */
?>

<?php get_header(); ?>

<div id="main-content-container">

  <main id="site-main" role="main">
    
    <header class="page-header">
      <?php
      if ( have_posts() ) {
        printf(
          '<h1>' . __( 'Search results for: %s', 'herschel' ) . '</h1>',
          '<span>' . esc_html( get_search_query() ) . '</span>'
        );
      } else {
        printf(
          '<h1>' . __( 'Nothing found', 'herschel' ) . '</h1>'
        );
      }
      ?>
    </header>

    <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        get_template_part( 'template-parts/content', 'excerpt');
      }

      the_posts_pagination( array(
        'prev_text' => __( 'Prev', 'herschel' ) . '<span class="screen-reader-text">' . __( 'Previous page', 'herschel' ) . '</span>',
        'next_text' => __( 'Next', 'herschel' ) . '<span class="screen-reader-text">' . __( 'Next page', 'herschel' ) . '</span>',
        'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'herschel' ) . '</span>'
      ) );
    
    } else {
      
      get_template_part( 'template-parts/content', 'none');
    
    }
    ?>
  </main><!-- #site-main -->

  <?php get_sidebar(); ?>
</div><!-- #main-content-container -->

<?php get_footer(); ?>