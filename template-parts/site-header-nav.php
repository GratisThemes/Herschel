<?php
/**
 * Template for displaying the site's main navigation
 *
 * @package Herschel
 * @since   Herschel 2.0
 */

?>

<nav class="site-header-nav">

  <?php if ( has_nav_menu( 'header' ) ) : ?>
    <input type="checkbox" id="header-nav-toggle" />

    <label for="header-nav-toggle" class="header-nav-toggle-label">
      <i class="fas fa-bars header-nav-toggle-label__open-icon"></i>
      <i class="fas fa-times header-nav-toggle-label__close-icon"></i>
      <span class="screen-reader-text"><?php esc_html_e( 'Toggle menu', 'herschel' ); ?></span>
    </label><!-- .header-nav-toggle-label -->

    <?php
    wp_nav_menu(
      array(
        'theme_location' => 'header',
        'menu_class'     => 'header-nav',
        'container'      => false,
      )
    );
    ?>
  <?php endif; ?>

  <?php herschel_social_bar(); ?>

</nav>
