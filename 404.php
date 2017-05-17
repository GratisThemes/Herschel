<?php
/**
 * Template for displaying 404 pages (not found)
 *
 * @package Herschel
 * @since Herschel 1.0
 */
get_header(); ?>

<main>
	<?php get_sidebar('content-above')?>
	<?php get_template_part('template-parts/content_header'); ?>
	
	<p><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'herschel' ); ?></p>
	<p><?php _e( 'It looks like nothing was found at this location.', 'herschel' ); ?></p>
</main>

<?php
	get_sidebar();
	get_footer();
?>