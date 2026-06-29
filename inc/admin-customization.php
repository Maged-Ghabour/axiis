<?php
/**
 * Admin & Login Customization
 */

// Custom Login Logo and Styles
function axiis_custom_login_style() {
    echo '<style type="text/css">
        @import url("https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap");
        body.login {
            background-color: #0c1821; /* Dark primary color */
            font-family: "Tajawal", sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        body.login h1 a {
            background-image: url(' . get_template_directory_uri() . '/assets/logo.png) !important;
            background-size: contain !important;
            width: 250px !important;
            height: 100px !important;
        }
        .login form {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(223, 177, 58, 0.2) !important; /* Gold border */
            border-radius: 15px !important;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5) !important;
            backdrop-filter: blur(10px);
        }
        .login label {
            color: #ffffff !important;
        }
        .login input[type="text"], .login input[type="password"] {
            background: rgba(255, 255, 255, 0.1) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            color: #ffffff !important;
            border-radius: 8px !important;
        }
        .login input[type="text"]:focus, .login input[type="password"]:focus {
            border-color: #dfb13a !important;
            box-shadow: 0 0 5px rgba(223, 177, 58, 0.5) !important;
        }
        .login .button-primary {
            background-color: #dfb13a !important;
            border-color: #dfb13a !important;
            color: #0c1821 !important;
            font-weight: bold !important;
            border-radius: 30px !important;
            padding: 5px 20px !important;
            text-shadow: none !important;
            box-shadow: none !important;
            transition: all 0.3s ease !important;
        }
        .login .button-primary:hover {
            background-color: #e5be55 !important;
            transform: translateY(-2px);
        }
        .login #backtoblog a, .login #nav a {
            color: #dfb13a !important;
        }
        .login #backtoblog a:hover, .login #nav a:hover {
            color: #ffffff !important;
        }
        .wp-core-ui .button-primary {
            text-shadow: none;
        }
    </style>';
}
add_action('login_enqueue_scripts', 'axiis_custom_login_style');

// Change Login Logo URL
function axiis_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'axiis_login_logo_url' );

// Custom Admin Font and Styles
function axiis_admin_style() {
    echo '<style type="text/css">
        @import url("https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap");
        
        /* Apply custom font to entire admin */
        body, #wpadminbar, #adminmenu, .wp-core-ui, .media-frame, .wrap h1, .wrap h2 {
            font-family: "Tajawal", sans-serif !important;
        }
        
        /* Custom Colors matching Theme */
        #adminmenuback, #adminmenuwrap, #adminmenu {
            background-color: #0c1821 !important;
        }
        #adminmenu a {
            color: #cccccc !important;
        }
        #adminmenu a:hover, #adminmenu li.menu-top:hover, #adminmenu li.opensub > a.menu-top, #adminmenu li > a.menu-top:focus {
            color: #dfb13a !important;
            background-color: #0a141b !important;
        }
        #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, #adminmenu li.current a.menu-top, .folded #adminmenu li.wp-has-current-submenu, .folded #adminmenu li.current.menu-top {
            background: #dfb13a !important;
            color: #0c1821 !important;
        }
        #adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .createsub {
            background-color: #0a141b !important;
        }
        
        /* Custom welcome panel */
        .axiis-welcome-panel {
            background: #0c1821;
            color: #fff;
            padding: 30px;
            border-radius: 10px;
            margin-top: 20px;
            border-right: 5px solid #dfb13a;
        }
        .axiis-welcome-panel h2 {
            color: #dfb13a !important;
            font-size: 24px !important;
            margin-top: 0;
        }
        .axiis-welcome-panel p {
            font-size: 16px;
        }
    </style>';
}
add_action('admin_enqueue_scripts', 'axiis_admin_style');

// Add Custom Dashboard Widget
function axiis_add_dashboard_widgets() {
    wp_add_dashboard_widget(
        'axiis_welcome_widget',
        'مرحباً بك في لوحة تحكم أكسس ديزاين',
        'axiis_welcome_widget_content'
    );
}
add_action('wp_dashboard_setup', 'axiis_add_dashboard_widgets');

function axiis_welcome_widget_content() {
    echo '<div class="axiis-welcome-panel">';
    echo '<h2>✨ أكسس ديزاين - لوحة التحكم الذكية</h2>';
    echo '<p>مرحباً بك! من هنا يمكنك التحكم الكامل في جميع أقسام الموقع بسهولة.</p>';
    echo '<ul>';
    echo '<li><a href="edit.php?post_type=service" style="color:#dfb13a;">إدارة الخدمات</a></li>';
    echo '<li><a href="edit.php?post_type=portfolio" style="color:#dfb13a;">معرض الأعمال</a></li>';
    echo '<li><a href="edit.php?post_type=testimonial" style="color:#dfb13a;">آراء العملاء</a></li>';
    echo '<li><a href="post.php?post=' . get_option('page_on_front') . '&action=edit" style="color:#dfb13a;">تعديل نصوص الصفحة الرئيسية</a></li>';
    echo '</ul>';
    echo '</div>';
}
