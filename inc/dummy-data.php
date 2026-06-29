<?php
/**
 * Dummy Data Seeding on Theme Activation
 */

function axiis_seed_dummy_data() {
    // 1. Create Homepage if it doesn't exist
    $homepage_title = 'الرئيسية';
    $homepage_check = get_page_by_title( $homepage_title );
    
    $homepage_id = 0;
    if ( ! isset( $homepage_check->ID ) ) {
        $homepage_id = wp_insert_post( array(
            'post_title'   => $homepage_title,
            'post_type'    => 'page',
            'post_status'  => 'publish',
            'post_author'  => 1,
        ) );
    } else {
        $homepage_id = $homepage_check->ID;
    }

    // Set as front page
    if ( $homepage_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $homepage_id );
        
        // Setup ACF Dummy Data for Homepage if ACF is active
        if( function_exists('update_field') ) {
            update_field('hero_title', 'حلول متكاملة للألمنيوم والحديد<br>والديكورات الداخلية والخارجية', $homepage_id);
            update_field('hero_subtitle', 'نصمم وننفذ أعمال الألمنيوم والحديد والديكورات الخشبية والمطابخ<br>والخزائن بأعلى معايير الجودة والدقة', $homepage_id);
            update_field('cta_text', 'هل أنت جاهز لتحويل فكرتك إلى واقع؟', $homepage_id);
            update_field('process_title', 'كيف ننفذ مشروعك؟', $homepage_id);
            update_field('step_1_title', 'المعاينة والاستشارة', $homepage_id);
            update_field('step_2_title', 'التصميم واختيار الخامات', $homepage_id);
            update_field('step_3_title', 'التصنيع والتنفيذ', $homepage_id);
            update_field('step_4_title', 'التركيب والتسليم', $homepage_id);
        }
    }

    // 2. Seed Services
    $services = array(
        array('title' => 'أعمال الألمنيوم', 'excerpt' => 'نوافذ، أبواب، واجهات زجاجية (ستركشر)، وتكسيات خارجية', 'icon' => 'assets/icon1.png'),
        array('title' => 'أعمال الحديد', 'excerpt' => 'أبواب رئيسية، درابزين، مظلات، وأعمال الهياكل المعدنية', 'icon' => 'assets/icon2.png'),
        array('title' => 'الديكورات الخشبية', 'excerpt' => 'أبواب داخلية، تكسيات جدارية، ديكورات أسقف، وقواطع خشبية', 'icon' => 'assets/icon3.png'),
        array('title' => 'خزائن الملابس', 'excerpt' => 'تصميم وتنفيذ غرف الملابس (Dressing Rooms) والخزائن المدمجة', 'icon' => 'assets/icon4.png'),
        array('title' => 'المطابخ', 'excerpt' => 'مطابخ ألمنيوم، خشب، وأكريليك بتصاميم عصرية وعملية', 'icon' => 'assets/icon5.png'),
        array('title' => 'تصميم ثري دي', 'excerpt' => 'خدمة التصميم الداخلي وتوزيع المساحات قبل التنفيذ', 'icon' => 'assets/icon6.png'),
    );

    foreach ( $services as $service ) {
        if ( ! get_page_by_title( $service['title'], OBJECT, 'service' ) ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $service['title'],
                'post_excerpt' => $service['excerpt'],
                'post_type'    => 'service',
                'post_status'  => 'publish',
            ) );
            if($post_id && function_exists('update_field')) {
                // Assuming we make an ACF field for icon URL or attachment
                update_field('service_icon_url', get_template_directory_uri() . '/' . $service['icon'], $post_id);
            }
        }
    }

    // 3. Seed Portfolio
    $works = array(
        'مشروع 1' => 'assets/ourWork1.png',
        'مشروع 2' => 'assets/ourWork2.png',
        'مشروع 3' => 'assets/ourWork3.png',
        'مشروع 4' => 'assets/ourWork1.png',
        'مشروع 5' => 'assets/ourWork2.png',
        'مشروع 6' => 'assets/ourWork3.png',
    );

    foreach ( $works as $title => $img ) {
        if ( ! get_page_by_title( $title, OBJECT, 'portfolio' ) ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $title,
                'post_type'    => 'portfolio',
                'post_status'  => 'publish',
            ) );
            if($post_id && function_exists('update_field')) {
                update_field('portfolio_image_url', get_template_directory_uri() . '/' . $img, $post_id);
            }
        }
    }

    // 4. Seed Testimonials
    $testimonials = array(
        array('name' => 'خالد السبيعي', 'text' => 'نفذوا لنا أعمال الخزائن والديكورات الخشبية باحترافية عالية، وكانت النتيجة أفضل مما توقعنا من حيث الجودة والتشطيب.'),
        array('name' => 'أحمد العتيبي', 'text' => 'دقة في المواعيد وجودة في التنفيذ. تعامل راقي جداً من جميع الطاقم.'),
        array('name' => 'محمد الراجحي', 'text' => 'تم تنفيذ واجهة الفيلا بالكامل ستركشر وتكسيات ألمنيوم.. عمل متقن ويستحقون التقييم الكامل.'),
    );

    foreach ( $testimonials as $test ) {
        if ( ! get_page_by_title( $test['name'], OBJECT, 'testimonial' ) ) {
            wp_insert_post( array(
                'post_title'   => $test['name'],
                'post_content' => $test['text'],
                'post_type'    => 'testimonial',
                'post_status'  => 'publish',
            ) );
        }
    }
}
add_action( 'after_switch_theme', 'axiis_seed_dummy_data' );
