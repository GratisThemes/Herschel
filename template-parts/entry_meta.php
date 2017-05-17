<?php
/**
 * The template part for displaying post meta data
 *
 * @package Herschel
 * @since Herschel 1.0
 */
?>
<div class="entry-meta">
	<?php if( get_theme_mod( 'entry_meta_date', true ) ){ // posted date
		printf( '<span><i class="fa fa-calendar"></i> <a href="%1$s">%2$s</a></span>',
			esc_url( get_permalink() ),
			esc_html( get_the_date() )
		);
	} ?>

	<?php if( get_theme_mod( 'entry_meta_author', true ) ){ // author link
		printf( '<span><i class="fa fa-user"></i> <a href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
			);
	} ?>

	<?php // comments
	$herschel_comments_count = get_comments_number();
	if( get_theme_mod( 'entry_meta_comments', true ) && $herschel_comments_count > 0 && comments_open() ){

		printf( '<span><i class="fa fa-comment-o"></i> <a href="%1$s/#comments">%2$s</a></span>',
			esc_url( get_permalink() ),
			$herschel_comments_count
		);
	} ?>

	<?php // post format
	$herschel_format = get_post_format();
	if ( get_theme_mod( 'entry_meta_post_format', true ) && current_theme_supports( 'post-formats', $herschel_format ) ):

		switch($herschel_format){
			case 'gallery':
			case 'image':
				$herschel_class = 'fa-image';
				break;

			case 'video':
				$herschel_class = 'fa-video-camera';
				break;

			case 'quote':
				$herschel_class = 'fa-quote-right';
				break;

			case 'link':
				$herschel_class = 'fa-link';
				break;

			case 'status':
				$herschel_class = 'fa-exclamation';
				break;

			case 'audio':
				$herschel_class = 'fa-music';
				break;

			case 'chat':
				$herschel_class = 'fa-comments';
				break;

			default:
				$herschel_class = 'fa-file-o';
				break;
		}

		printf( '<span class="entry-format"><i class="fa ' . $herschel_class . '"></i> %1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'herschel' ) ),
			esc_url( get_post_format_link( $herschel_format ) ),
			get_post_format_string( $herschel_format )
		); ?>
	<?php endif; ?>

	<?php if( get_theme_mod( 'entry_meta_categories', true ) && has_category() ): ?>
		<span>
			<i class="fa fa-folder-o"></i>
			<?php the_category(', '); // categories ?>
		</span>
	<?php endif; ?>

	<?php if( wp_attachment_is_image() ){ // attachment image dimentions 
		$metadata = wp_get_attachment_metadata();

		printf( '<span><i class="fa fa-camera"></i> %1$s x %2$s</span>',
			absint( $metadata['width'] ),
			absint( $metadata['height'] )
		);
	} ?>

	<?php if( is_user_logged_in() ): ?>
		<span>
			<i class="fa fa-pencil"></i>
			<?php edit_post_link( __('Edit', 'herschel') ); // edit link ?>
		</span>
	<?php endif; ?>
</div>
