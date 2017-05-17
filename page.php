<?php
/**
 * Template for displaying pages
 *
 * @package Herschel
 * @since Herschel 1.0
 */
get_header(); ?>

<main>
	<?php get_sidebar('content-above'); ?>
	
	<?php
		get_template_part('template-parts/content');

		if( comments_open() || get_comments_number() ):
			comments_template();
		endif;
	?>
</main>

<?php
	get_sidebar();
	get_footer();
?>