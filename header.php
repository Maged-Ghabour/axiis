<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
$site_logo = function_exists('get_field') && get_field('site_logo', 'option') ? get_field('site_logo', 'option') : get_template_directory_uri() . '/assets/logo.png';
$whatsapp = function_exists('get_field') && get_field('whatsapp_number', 'option') ? get_field('whatsapp_number', 'option') : '';
$whatsapp_url = $whatsapp ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $whatsapp) : '#';
?>
    <!-- PREMIUM FEATURES START (HTML) -->
    <div id="preloader">
        <img src="<?php echo esc_url($site_logo); ?>" alt="<?php bloginfo('name'); ?> Loading" class="loader-logo">
    </div>
    <div id="progress-bar"></div>
    <div id="cursor-dot"></div>
    <div id="cursor-outline"></div>
    <a href="<?php echo esc_url($whatsapp_url); ?>" class="floating-whatsapp" target="_blank">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    <!-- PREMIUM FEATURES END (HTML) -->

    <?php 
    $hero_bg = function_exists('get_field') && get_field('hero_background', get_option('page_on_front')) ? get_field('hero_background', get_option('page_on_front')) : '';
    $hero_style = $hero_bg ? 'style="background-image: url(' . esc_url($hero_bg) . ');"' : '';
    ?>
    <header class="hero-section" <?php echo $hero_style; ?>>
        <div class="overlay"></div>
        <div class="container">
            <!-- Navbar -->
            <nav class="navbar">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo esc_url($site_logo); ?>" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>
                
                <div class="menu-toggle" id="mobile-menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
                
                <div class="nav-menu" id="nav-menu">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'nav-links',
                        'fallback_cb'    => function() {
                            // Fallback if no menu is set
                            echo '<ul class="nav-links">';
                            echo '<li><a href="'.home_url('/').'" class="active">الرئيسية</a></li>';
                            echo '<li><a href="#">للمدونة</a></li>';
                            echo '<li><a href="#">اتصل بنا</a></li>';
                            echo '</ul>';
                        }
                    ) );
                    ?>
                    
                    <div class="nav-actions">
                        <button class="icon-btn" aria-label="بحث">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <button class="primary-btn sm-btn">اطلب استشارة</button>
                    </div>
                </div>
            </nav>
