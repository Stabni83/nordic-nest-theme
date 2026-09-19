<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <?php the_custom_logo(); ?>

    <?php get_search_form(); ?>

    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="header-cart-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <path d="M16 10a4 4 0 0 1-8 0"></path>
        </svg>
        <span><?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?></span>
    </a>

    <nav class="bottom-nav-wrapper">
        <?php wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'menu_class'     => 'primary-menu',
            'container'      => false,
        )); ?>
    </nav>
</header>