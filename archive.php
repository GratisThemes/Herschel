<?php
/**
 * Template for displaying archives
 *
 * @package Herschel
 * @since Herschel 1.0
 */
get_header(); ?>

<main>
	<?php get_sidebar('content-above'); ?>
	<?php get_template_part('template-parts/content_header'); ?>
	<?php get_template_part('template-parts/loop'); ?>
</main>

<?php
	get_sidebar();
	get_footer();
?>