<?php
/**
 * Template for displaying entry headers
 *
 * @package Herschel
 * @since 1.5.0
 */
?>
<header class="entry-header">
  <?php
  if ( is_single() ) {
    printf(
      '<h1>%s</h1>',
      get_the_title() === '' ? __( 'Untitled post', 'herschel' ) : get_the_title()
    );
  } else {
    printf(
      '<h3><a href="%2$s">%1$s</a></h3>',
      get_the_title() === '' ? __( 'Untitled post', 'herschel' ) : get_the_title(), 
      esc_url( get_permalink() )
    );
  }
  ?>

  <div class="entry-meta">
    <?php
    if ( get_theme_mod( 'entry_meta_date', true) ) {
      printf(
        '<span class="entry-meta-date"><a href="%1$s">%2$s</a></span>',
        esc_url( get_permalink() ),
        get_the_date()
      );
    }
    ?>

    <?php
    if ( get_theme_mod( 'entry_meta_author', true) ) {
      printf(
        '<span class="entry-meta-author"><a href="%2$s">%1$s</a></span>',
        get_the_author(),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
      );
    }
    ?>

    <?php
    if ( get_theme_mod( 'entry_meta_comments', true) ) {
      $herschel_comment_count = get_comments_number();
      if ( $herschel_comment_count && comments_open() ) {
        printf(
          '<span class="entry-meta-comments"><a href="%2$s#comments">%1$s</a></span>',
          $herschel_comment_count,
          esc_url( get_permalink() )
        );
      }
    }
    ?>

    <?php
    if ( !is_single() ) {
      $herschel_post_format = get_post_format();
      if ( $herschel_post_format ) {
        printf(
          '<span class="entry-meta-post-format"><a href="%1$s">%2$s</a></span>',
          esc_url( get_post_format_link(  $herschel_post_format ) ),
          get_post_format_string( $herschel_post_format )
        );
      }
    }
    ?>

    <?php
    if ( get_theme_mod( 'entry_meta_categories', true) ) {
      $herschel_categories_list = get_the_category_list( ', ' );
      if ( $herschel_categories_list ) {
        printf(
          '<span class="entry-meta-categories">%s</span>',
          $herschel_categories_list
        );
      }
    }
    ?>

    <?php
    edit_post_link(
      sprintf(
        '%1$s<span class="screen-reader-text">%1$s "%2$s"</span>',
        __( 'Edit', 'herschel' ),
        get_the_title()
      )
    );
    ?>
  </div><!-- .entry-meta -->
</header><!-- .entry-header -->