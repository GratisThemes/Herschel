<?php
/**
 * Content loop
 *
 * @package Herschel
 * @since Herschel 1.0
 */
if( have_posts() ):
	while( have_posts() ): the_post(); ?>
		<article <?php post_class(); ?>>
			<header class="archive-entry-header">
				<h3 class="entry-title entry-title-archive">
					<?php if ( is_sticky() && is_home() && ! is_paged() ): ?>
						<i class="fa fa-sticky-note-o"></i>
					<?php endif;

					if( get_the_title() != '' ){
						the_title('<a href="'.esc_url( get_permalink() ).'">','</a>');
					}else{
						printf('<a href="%1$s">%2$s</a>',
							esc_url( get_permalink() ),
							__('Untitled post', 'herschel')
						);
					} ?>
				</h3>

				<?php get_template_part('template-parts/entry_meta'); ?>
			</header>

			<?php if( has_post_thumbnail() && get_theme_mod('thumbnail_index', true) ): ?>
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
				</a>
			<?php endif; ?>

			<?php if( get_theme_mod( 'layout', 'wide' ) == 'full' ):
				the_content( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'herschel' ),
					get_the_title()
				) );
			else:
				the_excerpt(); ?>

				<?php if( get_theme_mod('read_more', true) ): ?>
					<a class="read-more button" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
						<?php _e( 'Read more', 'herschel' ); ?>
					</a>
				<?php endif; ?>
			<?php endif; ?>

			<div style="clear: both; height: 0px;">&nbsp;</div>
		</article>
	<?php endwhile; ?>

	<div style="clear: both; height: 0px;">&nbsp;</div>

	<?php the_posts_pagination( array(
		'prev_text'          => __( 'Previous page', 'herschel' ),
		'next_text'          => __( 'Next page', 'herschel' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'herschel' ) . ' </span>',
	) );
?>

<?php else: get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>
