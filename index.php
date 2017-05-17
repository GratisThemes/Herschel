<?php
/**
 * Template for displaying landing page (home)
 *
 * @package Herschel
 * @since Herschel 1.0
 */
get_header(); ?>

<main <?php herschel_main_class(); ?>>
	<?php get_sidebar('content-above')?>
	
	<?php get_template_part('template-parts/loop'); ?>
</main>

<?php
	get_sidebar();
	get_footer();
?>