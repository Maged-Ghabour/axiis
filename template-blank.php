<?php
/**
 * Template Name: صفحة فارغة (Blank Canvas)
 * Template Post Type: page
 * 
 * قالب فارغ تماماً - لا يحتوي على أي تدخلات من الووردبريس (بدون wp_head أو wp_footer).
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <?php 
    while ( have_posts() ) : 
        the_post();
        the_content();
    endwhile; 
    ?>
</body>
</html>
