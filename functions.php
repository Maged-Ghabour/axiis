<?php
/**
 * Axiis Design Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// 1. Theme Setup & Enqueue Scripts
function axiis_theme_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );
    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
    // Register Navigation Menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'axiis-theme' ),
        'footer'  => esc_html__( 'Footer Menu', 'axiis-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'axiis_theme_setup' );

function axiis_enqueue_scripts() {
    // Font Awesome
    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
    // Swiper CSS
    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), '10.0' );
    // Main Theme CSS
    wp_enqueue_style( 'axiis-main-style', get_template_directory_uri() . '/main.css', array(), wp_get_theme()->get('Version') );

    // GSAP
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true );
    wp_enqueue_script( 'scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), '3.12.2', true );
    // Swiper JS
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), '10.0', true );
}
add_action( 'wp_enqueue_scripts', 'axiis_enqueue_scripts' );

// 2. Custom Post Types Registration
function axiis_register_cpts() {
    // Services CPT
    $services_labels = array(
        'name'               => 'الخدمات',
        'singular_name'      => 'خدمة',
        'menu_name'          => 'الخدمات',
        'add_new'            => 'إضافة خدمة',
        'add_new_item'       => 'إضافة خدمة جديدة',
        'edit_item'          => 'تعديل الخدمة',
        'new_item'           => 'خدمة جديدة',
        'view_item'          => 'عرض الخدمة',
        'search_items'       => 'البحث في الخدمات',
        'not_found'          => 'لا توجد خدمات',
        'not_found_in_trash' => 'لا توجد خدمات في سلة المهملات',
    );
    $services_args = array(
        'labels'              => $services_labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'service' ),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-hammer',
    );
    register_post_type( 'service', $services_args );

    // Portfolio (Our Works) CPT
    $portfolio_labels = array(
        'name'               => 'معرض الأعمال',
        'singular_name'      => 'عمل',
        'menu_name'          => 'معرض الأعمال',
        'add_new'            => 'إضافة عمل',
        'add_new_item'       => 'إضافة عمل جديد',
    );
    $portfolio_args = array(
        'labels'              => $portfolio_labels,
        'public'              => true,
        'has_archive'         => true,
        'supports'            => array( 'title', 'thumbnail' ),
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-portfolio',
    );
    register_post_type( 'portfolio', $portfolio_args );

    // Testimonials CPT
    $testimonials_labels = array(
        'name'               => 'آراء العملاء',
        'singular_name'      => 'رأي عميل',
        'menu_name'          => 'آراء العملاء',
        'add_new'            => 'إضافة رأي',
        'add_new_item'       => 'إضافة رأي جديد',
    );
    $testimonials_args = array(
        'labels'              => $testimonials_labels,
        'public'              => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-testimonial',
    );
    register_post_type( 'testimonial', $testimonials_args );
}
add_action( 'init', 'axiis_register_cpts' );

// Include Custom Admin & Login Styles
require_once get_template_directory() . '/inc/admin-customization.php';
require_once get_template_directory() . '/inc/dummy-data.php';

// Include ACF Fields configuration if ACF is active
if( class_exists('ACF') ) {
    require_once get_template_directory() . '/inc/acf-fields.php';
}

// Defer scripts for better performance
function axiis_defer_scripts( $tag, $handle, $src ) {
    $defer_scripts = array( 'gsap', 'scrolltrigger', 'swiper-js' );
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . esc_url( $src ) . '" defer="defer"></script>' . "\n";
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'axiis_defer_scripts', 10, 3 );


// Disable WordPress Emojis for Performance
function axiis_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'axiis_disable_emojis' );


// Apply IBM Plex Sans Arabic font to WordPress Dashboard
function axiis_admin_custom_font() {
    echo '
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body, #wpadminbar *:not([class="ab-icon"]), .wp-core-ui, .media-menu, .media-frame *, .wp-admin, .wp-admin p, .wp-admin h1, .wp-admin h2, .wp-admin h3, .wp-admin h4, .wp-admin h5, .wp-admin h6, .acf-field {
            font-family: "IBM Plex Sans Arabic", sans-serif !important;
        }
    </style>
    ';
}
add_action('admin_head', 'axiis_admin_custom_font');


// Optimize CSS Delivery
function axiis_async_styles( $html, $handle ) {
    if ( is_admin() || empty($handle) || !is_string($handle) ) return $html;
    $async_styles = array( 'fontawesome', 'swiper-css' );
    if ( in_array( $handle, $async_styles ) || strpos($handle, 'subscription') !== false ) {
        $html = str_replace( "media='all'", "media='print' onload=\"this.media='all'\"", $html );
        $html = str_replace( 'media="all"', 'media="print" onload="this.media=\'all\'"', $html );
    }
    return $html;
}
add_filter( 'style_loader_tag', 'axiis_async_styles', 10, 2 );

// Defer non-critical JS
function axiis_defer_extra_scripts( $tag, $handle, $src = '' ) {
    if ( is_admin() || empty($handle) || !is_string($handle) ) return $tag;
    if ( strpos($handle, 'subscription') !== false || strpos($handle, 'gsap') !== false || strpos($handle, 'swiper') !== false ) {
        if ( false === strpos( $tag, 'defer' ) ) {
            $tag = str_replace( ' src', ' defer="defer" src', $tag );
        }
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'axiis_defer_extra_scripts', 10, 3 );

