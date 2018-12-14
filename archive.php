<?php
/**
 * Template for displaying archives
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
      <?php the_archive_title( '<h1>', '</h1>' ); ?>
      <?php the_archive_description(); ?>
    </header>

    <?php if ( have_posts() ): ?>
    
      <?php while ( have_posts() ): the_post(); ?>
    
        <?php get_template_part( 'template-parts/content', 'excerpt' ); ?>

      <?php endwhile; ?>

      <?php
      the_posts_pagination( array(
        'prev_text' => __( 'Prev', 'herschel' ) . '<span class="screen-reader-text">' . __( 'Previous page', 'herschel' ) . '</span>',
        'next_text' => __( 'Next', 'herschel' ) . '<span class="screen-reader-text">' . __( 'Next page', 'herschel' ) . '</span>',
        'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'herschel' ) . '</span>'
      ) );
      ?>

    <?php else: ?>
      
      <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif;?>
    
  </main><!-- #site-main -->

  <?php get_sidebar(); ?>

</div><!-- #main-content-container -->

<?php get_footer(); ?>