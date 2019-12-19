<?php
/**
 * Template for displaying entry footers
 *
 * @package Herschel
 * @since   1.5.0
 * @version 1.7.0 [Improved post tags styles]
 */
?>
<footer class="entry-footer">
  <?php if ( get_theme_mod( 'author_bio', true ) ): ?>
    <div class="author-bio">
      <?php echo get_avatar( get_the_author_meta( 'user_email' ), '50' ); ?>

      <div>
        <h5><?php _e( 'Author', 'herschel' ); ?></h5>

        <?php
        printf(
          '<a href="%2$s">%1$s</a>',
          get_the_author(),
          esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
        );
        ?>

        <p><?php the_author_meta( 'description' ); ?></p>
      </div>
    </div><!-- .author-bio -->
  <?php endif; ?>
    
  <?php
  if ( has_tag() && get_theme_mod( 'entry_meta_tags', true ) ): ?>
    <div class="post-tags">
      <?php the_tags('', ''); ?>
      <span class="screen-reader-text"><?php _e( 'tags', 'herschel'); ?></span>
    </div><!-- .post-tags -->
  <?php endif; ?>

  <?php
  the_post_navigation( array(
    'prev_text' => 
      '<span class="screen-reader-text">' . __( 'Previous post', 'herschel' ) . '</span>
       <span>%title</span>',
    'next_text' => 
      '<span class="screen-reader-text">' . __( 'Next post', 'herschel' ) . '</span>
       <span>%title</span>',
  ) );
  ?>
</footer><!-- .entry-footer -->