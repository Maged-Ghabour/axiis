<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @package axiis-theme
 */

get_header();
?>

<main id="primary" class="site-main" style="padding: 100px 20px; min-height: 60vh;">
	<div class="container" style="max-width: 1200px; margin: 0 auto;">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 40px;">
					<header class="entry-header" style="margin-bottom: 20px;">
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title" style="font-size: 2.5rem; margin-bottom: 1rem;">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title" style="font-size: 2rem; margin-bottom: 1rem;"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" style="color: inherit; text-decoration: none;">', '</a></h2>' );
						endif;
						?>
					</header>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
				<?php
			endwhile;

			the_posts_navigation();

		else :
			?>
			<section class="no-results not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'axiis-theme' ); ?></h1>
				</header>
				<div class="page-content">
					<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'axiis-theme' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</section>
			<?php
		endif;
		?>
	</div>
</main>

<?php
get_footer();
