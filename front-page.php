<?php
/**
 * The front page template file
 */

get_header(); 

// ACF Fallbacks
$hero_title = function_exists('get_field') && get_field('hero_title') ? get_field('hero_title') : 'حلول متكاملة للألمنيوم والحديد<br>والديكورات الداخلية والخارجية';
$hero_subtitle = function_exists('get_field') && get_field('hero_subtitle') ? get_field('hero_subtitle') : 'نصمم وننفذ أعمال الألمنيوم والحديد والديكورات الخشبية والمطابخ<br>والخزائن بأعلى معايير الجودة والدقة';
$cta_text = function_exists('get_field') && get_field('cta_text') ? get_field('cta_text') : 'جاهز لتنفيذ مشروعك؟';
$process_title = function_exists('get_field') && get_field('process_title') ? get_field('process_title') : 'كيف ننفذ مشروعك؟';

// Options
$whatsapp = function_exists('get_field') && get_field('whatsapp_number', get_option('page_on_front')) ? get_field('whatsapp_number', get_option('page_on_front')) : '';
$whatsapp_url = $whatsapp ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $whatsapp) : '#';

// Process Steps
$step_1 = function_exists('get_field') && get_field('step_1_title') ? get_field('step_1_title') : 'المعاينة والاستشارة';
$step_2 = function_exists('get_field') && get_field('step_2_title') ? get_field('step_2_title') : 'التصميم واختيار الخامات';
$step_3 = function_exists('get_field') && get_field('step_3_title') ? get_field('step_3_title') : 'التصنيع والتنفيذ';
$step_4 = function_exists('get_field') && get_field('step_4_title') ? get_field('step_4_title') : 'التركيب والتسليم';

?>

    <!-- Hero Content -->
            <div class="hero-content">
                <h1><?php echo wp_kses_post( $hero_title ); ?></h1>
                <p><?php echo wp_kses_post( $hero_subtitle ); ?></p>
                
                <div class="cta-group">
                    <button class="primary-btn">اطلب عرض سعر</button>
                    <a href="<?php echo esc_url($whatsapp_url); ?>" class="outline-btn" style="text-decoration:none; display:inline-flex; align-items:center;" target="_blank">
                        <i class="fa-brands fa-whatsapp"></i>
                        تواصل معنا الآن
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main id="main" class="site-main">
    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <span class="badge">كيف نساعدك؟</span>
                <h2>كل ما تحتاجه للتشطيب والتنفيذ في مكان واحد</h2>
            </div>
            
            <div class="services-grid">
                <?php
                $services_query = new WP_Query( array(
                    'post_type'      => 'service',
                    'posts_per_page' => -1,
                    'order'          => 'ASC'
                ) );

                if ( $services_query->have_posts() ) :
                    $count = 0;
                    while ( $services_query->have_posts() ) : $services_query->the_post();
                        $count++;
                        $wide_class = ( $count % 4 == 1 ) ? 'wide-card' : '';
                        if ( has_post_thumbnail() ) {
                            $icon_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                        } else {
                            $icon_url = function_exists('get_field') && get_field('service_icon_url') ? get_field('service_icon_url') : get_template_directory_uri() . '/assets/icon' . $count . '.png';
                        }
                        ?>
                        <div class="service-card <?php echo esc_attr($wide_class); ?>">
                            <img loading="lazy" src="<?php echo esc_url($icon_url); ?>" alt="<?php the_title_attribute(); ?>">
                            <div class="service-content">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>لا توجد خدمات حالياً.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="features-section">
        <div class="container">
            <div class="section-header">
                <span class="badge outline-badge">لماذا تختارنا؟</span>
                <h2>نحن لا نبني فقط، نحن نصنع جودة تدوم</h2>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/icon1.png" alt="خبرة طويلة">
                    </div>
                    <h3>خبرة طويلة</h3>
                    <p>فريق فني متخصص ذو كفاءة عالية</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/icon2.png" alt="جودة المواد">
                    </div>
                    <h3>جودة المواد</h3>
                    <p>نستخدم أفضل الخامات المستوردة والمحلية</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/icon3.png" alt="دقة في المواعيد">
                    </div>
                    <h3>دقة في المواعيد</h3>
                    <p>التزام كامل بجدول التنفيذ والتسليم</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/icon4.png" alt="إشراف احترافي">
                    </div>
                    <h3>إشراف احترافي</h3>
                    <p>متابعة دقيقة لجميع مراحل العمل</p>
                </div>
            </div>
            
            <div class="section-footer">
                <button class="gold-btn">
                    <i class="fa-brands fa-whatsapp"></i>
                    تواصل معنا
                </button>
            </div>
        </div>
    </section>

    <!-- Our Works Section -->
    <section class="our-works-section">
        <div class="container">
            <div class="section-header">
                <span class="badge outline-badge">معرض الأعمال</span>
                <h2>نماذج من مشاريعنا المنفذة</h2>
            </div>
            
            <div class="swiper works-swiper" dir="rtl">
                <div class="swiper-wrapper">
                    <?php
                    $works_query = new WP_Query( array(
                        'post_type'      => 'portfolio',
                        'posts_per_page' => 10,
                        'order'          => 'ASC'
                    ) );

                    if ( $works_query->have_posts() ) :
                        while ( $works_query->have_posts() ) : $works_query->the_post();
                            $img_url = function_exists('get_field') && get_field('portfolio_image_url') ? get_field('portfolio_image_url') : get_template_directory_uri() . '/assets/ourWork1.png';
                            // If has featured image, use it instead
                            if ( has_post_thumbnail() ) {
                                $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            }
                            ?>
                            <div class="swiper-slide">
                                <img loading="lazy" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>">
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
            
            <div class="section-footer" style="margin-top: 40px;">
                <button class="gold-btn">
                    <i class="fa-brands fa-whatsapp"></i>
                    تواصل معنا
                </button>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section">
        <div class="container">
            <div class="section-header">
                <span class="badge outline-badge">مراحل العمل</span>
                <h2><?php echo esc_html($process_title); ?></h2>
            </div>
            
            <div class="timeline-container">
                <div class="timeline-line"></div>
                
                <div class="timeline-steps">
                    <!-- Step 1 -->
                    <div class="timeline-step step-up">
                        <div class="step-content-top">
                            <h3 class="step-number">01</h3>
                        </div>
                        <div class="step-point"></div>
                        <div class="step-content-bottom">
                            <p class="step-title"><?php echo esc_html($step_1); ?></p>
                        </div>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="timeline-step step-down">
                        <div class="step-content-top">
                            <p class="step-title"><?php echo esc_html($step_2); ?></p>
                        </div>
                        <div class="step-point"></div>
                        <div class="step-content-bottom">
                            <h3 class="step-number">02</h3>
                        </div>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="timeline-step step-up">
                        <div class="step-content-top">
                            <h3 class="step-number">03</h3>
                        </div>
                        <div class="step-point"></div>
                        <div class="step-content-bottom">
                            <p class="step-title"><?php echo esc_html($step_3); ?></p>
                        </div>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="timeline-step step-down">
                        <div class="step-content-top">
                            <p class="step-title"><?php echo esc_html($step_4); ?></p>
                        </div>
                        <div class="step-point"></div>
                        <div class="step-content-bottom">
                            <h3 class="step-number">04</h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="section-footer">
                <button class="gold-btn">
                    <i class="fa-brands fa-whatsapp"></i>
                    تواصل معنا
                </button>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <span class="badge outline-badge">آراء العملاء</span>
                <h2>ماذا يقول عملاؤنا؟</h2>
            </div>
            
            <div class="swiper testimonials-swiper" dir="rtl">
                <div class="swiper-wrapper">
                    <?php
                    $test_query = new WP_Query( array(
                        'post_type'      => 'testimonial',
                        'posts_per_page' => 10,
                        'order'          => 'DESC'
                    ) );

                    if ( $test_query->have_posts() ) :
                        while ( $test_query->have_posts() ) : $test_query->the_post();
                            ?>
                            <div class="swiper-slide">
                                <div class="testimonial-card">
                                    <div class="testimonial-header">
                                        <div class="stars">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <div class="user-info">
                                            <h3 class="user-name"><?php the_title(); ?></h3>
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/avatar.png" alt="<?php the_title_attribute(); ?>" class="avatar">
                                        </div>
                                    </div>
                                    <div class="testimonial-body">
                                        <?php the_content(); ?>
                                    </div>
                                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/testimonials_shape.png" alt="Quote" class="quote-shape">
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Banner Section -->
    <section class="cta-banner-section">
        <div class="container">
            <div class="cta-banner-container">
                <?php $cta_bg = function_exists('get_field') && get_field('cta_background') ? get_field('cta_background') : get_template_directory_uri() . '/assets/banner1.png'; ?>
                <img loading="lazy" src="<?php echo esc_url($cta_bg); ?>" alt="<?php echo esc_attr($cta_text); ?>" class="cta-bg-img">
                <div class="cta-content">
                    <h2><?php echo esc_html($cta_text); ?></h2>
                    <p>احصل على استشارة مجانية وعرض سعر مخصص حسب احتياجاتك.</p>
                    <button class="gold-btn">اطلب عرض سعر الآن</button>
                </div>
            </div>
        </div>
    </section>
    </main>

<?php get_footer(); ?>
