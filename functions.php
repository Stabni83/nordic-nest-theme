<?php
function addMyScript() {
    wp_enqueue_style(
        'nordic-nest-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@400;500;600&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'nordic-nest',
        get_stylesheet_uri(),
        array('nordic-nest-fonts'),
        '5.1'
    );
}
add_action('wp_enqueue_scripts', 'addMyScript');

function nordic_nest_setup() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'nordic-nest'),
    ));
    add_theme_support('woocommerce');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'nordic_nest_setup');

function nordic_nest_customize_register($wp_customize) {

    // ===== Hero Section =====
    $wp_customize->add_section('nordic_nest_hero', array(
        'title'    => __('Hero Section', 'nordic-nest'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label'    => __('Hero Background Image', 'nordic-nest'),
        'section'  => 'nordic_nest_hero',
        'settings' => 'hero_image',
    )));

    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Find calm in every corner',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'nordic-nest'),
        'section' => 'nordic_nest_hero',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_description', array(
        'default'           => 'Soft forms. Natural materials. Timeless pieces for modern living.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_description', array(
        'label'   => __('Hero Description', 'nordic-nest'),
        'section' => 'nordic_nest_hero',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('hero_button_text', array(
        'default'           => 'Shop Collection',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button_text', array(
        'label'   => __('Hero Button Text', 'nordic-nest'),
        'section' => 'nordic_nest_hero',
        'type'    => 'text',
    ));

    // ===== Footer =====
    $wp_customize->add_section('nordic_nest_footer', array(
        'title'    => __('Footer', 'nordic-nest'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('footer_about', array(
        'default'           => 'Nordic Nest brings calm, minimal design into everyday living.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_about', array(
        'label'   => __('Footer About Text', 'nordic-nest'),
        'section' => 'nordic_nest_footer',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('footer_address', array(
        'default'           => '123 Design Street, Stockholm, Sweden',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_address', array(
        'label'   => __('Footer Address', 'nordic-nest'),
        'section' => 'nordic_nest_footer',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('footer_contact', array(
        'default'           => 'Email: hello@nordicnest.com | Phone: +46 123 456 789',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_contact', array(
        'label'   => __('Footer Contact Info', 'nordic-nest'),
        'section' => 'nordic_nest_footer',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('footer_copyright', array(
        'default'           => '© 2026 Nordic Nest. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_copyright', array(
        'label'   => __('Footer Copyright', 'nordic-nest'),
        'section' => 'nordic_nest_footer',
        'type'    => 'text',
    ));
    $wp_customize->add_setting( 'hero_button_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'hero_button_link', array(
        'label'   => __( 'Hero Button Link', 'nordic-nest' ),
        'section' => 'nordic_nest_hero',
        'type'    => 'url',
    ) );
}
add_action('customize_register', 'nordic_nest_customize_register');

add_filter('get_search_form', function ($form) {
    $form = '<form role="search" method="get" class="search-form" action="' . home_url('/') . '">
        <input type="search" class="search-field" placeholder="Search..." value="' . get_search_query() . '" name="s" />
        <button type="submit" class="search-submit" aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </button>
    </form>';
    return $form;
});