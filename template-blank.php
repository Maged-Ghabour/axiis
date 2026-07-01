<?php
/**
 * Template Name: صفحة فارغة (Blank Canvas)
 * Template Post Type: page
 * 
 * قالب فارغ تماماً لتصميم صفحات مخصصة بـ HTML/CSS/JS دون أي تدخل من تصميم القالب الأساسي.
 */

// إزالة ملفات CSS الخاصة بالقالب لضمان عدم تعارضها مع تصميمك المستقل
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'axiis-main-style' );
    wp_deregister_style( 'axiis-main-style' );
}, 20 );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    
    <?php 
    // هذه الدالة ضرورية لعمل إضافات الووردبريس (مثل إضافات الـ SEO)
    wp_head(); 
    ?>
    
    <style>
        /* التنسيقات الأساسية لتصفير الهوامش (CSS Reset) */
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            background-color: #ffffff;
        }
        
        /* يمكنك كتابة أكواد CSS الخاصة بك من المحرر أو وضعها هنا */
    </style>
</head>
<body <?php body_class(); ?>>

    <main>
        <?php 
        // عرض المحتوى الذي ستكتبه في محرر الووردبريس (HTML الخاص بك)
        while ( have_posts() ) : 
            the_post();
            the_content();
        endwhile; 
        ?>
    </main>

    <?php 
    // هذه الدالة ضرورية لعمل إضافات الووردبريس التي تعتمد على الجافاسكريبت
    wp_footer(); 
    ?>
    
    <script>
        // يمكنك كتابة أكواد Javascript الخاصة بك هنا
    </script>
</body>
</html>
