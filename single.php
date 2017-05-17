<?php
/**
 * Template for displaying posts
 *
 * @package Herschel
 * @since Herschel 1.0
 */
get_header(); ?>

<main>
	<?php get_sidebar('content-above')?>

	<?php get_template_part('template-parts/content'); ?>

	<?php if( comments_open() || get_comments_number() ) comments_template(); ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>