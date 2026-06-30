<?php
/**
 * The main template file / Blog Archive
 */

get_header();
?>

<!-- Blog Hero Section -->
<section class="blog-hero">
    <div class="overlay"></div>
    <div class="container">
        <h1 class="blog-page-title">
            <?php 
            if ( is_home() && ! is_front_page() ) {
                single_post_title();
            } elseif ( is_archive() ) {
                the_archive_title();
            } elseif ( is_search() ) {
                printf( esc_html__( 'نتائج البحث: %s', 'axiis-theme' ), '<span>' . get_search_query() . '</span>' );
            } else {
                echo 'المدونة';
            }
            ?>
        </h1>
        <?php if ( is_archive() ) : ?>
            <div class="blog-page-desc"><?php the_archive_description(); ?></div>
        <?php else : ?>
            <p class="blog-page-desc">أحدث المقالات والأخبار من فريقنا</p>
        <?php endif; ?>
    </div>
</section>

<!-- Blog Content -->
<main id="primary" class="site-main blog-main">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <div class="blog-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <div class="post-card-img">
                            <a href="<?php echo esc_url( get_permalink() ); ?>">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'large' ); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/placeholder.jpg" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </a>
                            <div class="post-category">
                                <?php 
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo esc_html( $categories[0]->name );
                                }
                                ?>
                            </div>
                        </div>
                        <div class="post-card-content">
                            <div class="post-meta">
                                <span class="post-date"><i class="fa-regular fa-calendar"></i> <?php echo get_the_date(); ?></span>
                            </div>
                            <h2 class="post-title">
                                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="post-excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?>
                            </div>
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more-btn">
                                اقرأ المزيد <i class="fa-solid fa-arrow-left"></i>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="blog-pagination">
                <?php 
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '<i class="fa-solid fa-angle-right"></i> السابق',
                    'next_text' => 'التالي <i class="fa-solid fa-angle-left"></i>',
                ) );
                ?>
            </div>

        <?php else : ?>
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title">لا توجد مقالات</h1>
                </header>
                <div class="page-content">
                    <p>عذراً، لم نتمكن من العثور على ما تبحث عنه. جرب البحث مرة أخرى.</p>
                    <?php get_search_form(); ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
