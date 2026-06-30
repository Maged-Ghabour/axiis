<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

    <!-- Single Post Hero Section -->
    <section class="single-post-hero" style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : get_template_directory_uri() . '/assets/landing.png'; ?>');">
        <div class="overlay"></div>
        <div class="container">
            <div class="single-post-meta-top">
                <span class="post-category">
                    <?php 
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo esc_html( $categories[0]->name );
                    }
                    ?>
                </span>
                <span class="post-date"><i class="fa-regular fa-calendar"></i> <?php echo get_the_date(); ?></span>
            </div>
            <h1 class="single-post-title"><?php the_title(); ?></h1>
            <div class="single-post-author">
                بواسطة: <strong><?php the_author(); ?></strong>
            </div>
        </div>
    </section>

    <!-- Single Post Content -->
    <main id="primary" class="site-main single-post-main">
        <div class="container">
            <div class="single-post-content-wrapper">
                <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-article'); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>

                <div class="single-post-footer">
                    <div class="post-tags">
                        <?php the_tags('<span class="tag-title">الوسوم:</span> ', ' ', ''); ?>
                    </div>
                    
                    <!-- Author Box -->
                    <div class="author-box">
                        <div class="author-avatar">
                            <?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
                        </div>
                        <div class="author-info">
                            <h4><?php the_author(); ?></h4>
                            <p><?php the_author_meta('description'); ?></p>
                        </div>
                    </div>
                    
                    <!-- Post Navigation -->
                    <div class="post-navigation">
                        <div class="nav-prev">
                            <?php previous_post_link('%link', '<i class="fa-solid fa-arrow-right"></i> %title'); ?>
                        </div>
                        <div class="nav-next">
                            <?php next_post_link('%link', '%title <i class="fa-solid fa-arrow-left"></i>'); ?>
                        </div>
                    </div>

                    <!-- Comments -->
                    <?php
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </main>

<?php endwhile; ?>

<?php get_footer(); ?>
