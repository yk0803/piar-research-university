<?php
/**
 * PIAR Research University theme functions.
 *
 * Demonstrates production-style WordPress setup:
 * - theme supports
 * - asset enqueueing
 * - SEO-friendly document titles
 * - accessible menus
 * - custom post types for Research Projects and Faculty
 */

if (!defined('ABSPATH')) {
    exit;
}

function piar_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height' => 120,
        'width' => 120,
        'flex-height' => true,
        'flex-width' => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'piar-research-university'),
        'footer' => __('Footer Menu', 'piar-research-university'),
    ));
}
add_action('after_setup_theme', 'piar_setup');

function piar_enqueue_assets() {
    wp_enqueue_style('piar-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap', array(), null);
    wp_enqueue_style('piar-style', get_stylesheet_uri(), array('piar-fonts'), wp_get_theme()->get('Version'));
    wp_enqueue_script('piar-main', get_template_directory_uri() . '/assets/js/main.js', array(), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'piar_enqueue_assets');

function piar_register_research_cpt() {
    register_post_type('research_project', array(
        'labels' => array(
            'name' => __('Research Projects', 'piar-research-university'),
            'singular_name' => __('Research Project', 'piar-research-university'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'research'),
        'show_in_rest' => true,
    ));

    register_post_type('faculty', array(
        'labels' => array(
            'name' => __('Faculty', 'piar-research-university'),
            'singular_name' => __('Faculty Member', 'piar-research-university'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'faculty'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'piar_register_research_cpt');

function piar_schema_json_ld() {
    if (!is_front_page()) {
        return;
    }

    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'CollegeOrUniversity',
        'name' => 'Pak Institute of Advanced Research',
        'alternateName' => 'PIAR',
        'url' => home_url('/'),
        'description' => 'A fictional Pakistani research university demo website built for a WordPress developer portfolio.',
        'address' => array(
            '@type' => 'PostalAddress',
            'addressLocality' => 'Islamabad',
            'addressCountry' => 'PK'
        ),
        'sameAs' => array(
            'https://github.com/yourusername/piar-research-university'
        )
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}
add_action('wp_head', 'piar_schema_json_ld');

function piar_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'piar_excerpt_more');
