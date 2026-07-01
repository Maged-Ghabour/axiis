<?php
/**
 * The template for displaying all single pages
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

    <!-- Page Hero Section -->
    <section class="single-post-hero" style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : get_template_directory_uri() . '/assets/landing.png'; ?>');">
        <div class="overlay"></div>
        <div class="container">
            <h1 class="single-post-title"><?php the_title(); ?></h1>
        </div>
    </section>

    <!-- Page Content -->
    <main id="primary" class="site-main single-post-main">
        <div class="container">
            <div class="single-post-content-wrapper">
                <article id="post-<?php the_ID(); ?>" <?php post_class('page-article'); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            </div>
        </div>
    </main>

<?php endwhile; ?>

<?php get_footer(); ?>
