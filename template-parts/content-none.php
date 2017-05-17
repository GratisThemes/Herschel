<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package Herschel
 * @since Herschel 1.0
 */
?>
<h1><?php _e( 'Nothing Found', 'herschel' ); ?></h1>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p>
		<?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'herschel' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
	</p>

<?php elseif ( is_search() ) : ?>
	<p>
		<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'herschel' ); ?>
	</p>

<?php else : ?>
	<p>
		<?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'herschel' ); ?>
	</p>
	
	<?php get_search_form(); ?>

<?php endif; ?>
