<?php
/**
 * Template for displaying landing page (home)
 *
 * @package Herschel
 * @since 1.0.0
 * @version 1.5.0
 */
?>

<?php get_header(); ?>

<?php get_sidebar( 'above' ); ?>

<div id="main-content-container">

  <main id="site-main" role="main">

    <?php
    if ( have_posts() ) {
      
      while ( have_posts() ) {
      
        the_post();

        $herschel_post_format = get_post_format();
        
        if ( get_theme_mod( 'layout', 'wide' ) == 'full' ) {
          
          get_template_part( 'template-parts/content', $herschel_post_format );
      
        } else {

          get_template_part( 'template-parts/content', $herschel_post_format ? $herschel_post_format : 'excerpt' );

        }
      }
      
      the_posts_pagination( array(
        'prev_text' => __( 'Prev', 'herschel' ) . '<span class="screen-reader-text">' . __( 'Previous page', 'herschel' ) . '</span>',
        'next_text' => __( 'Next', 'herschel' ) . '<span class="screen-reader-text">' . __( 'Next page', 'herschel' ) . '</span>',
        'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'herschel' ) . '</span>'
      ) );
      
    } else {
      
      get_template_part( 'template-parts/content', 'none' );

    }
    ?>
    
  </main><!-- #site-main -->

  <?php get_sidebar(); ?>

</div><!-- #main-content-container -->

<?php get_sidebar( 'below' ); ?>

<?php get_footer(); ?>