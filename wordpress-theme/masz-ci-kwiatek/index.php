<?php
/**
 * Ultimate fallback template (blog index, search results, 404, …).
 * This theme is built for the six static pages, not a blog, so this
 * just needs to not fatal-error if WordPress ever falls through here.
 */
get_header();
?>

<section class="hero" style="min-height:36vh; padding-top:calc(150px + var(--hero-lift)); padding-bottom:50px;">
	<div class="container hero-inner">
		<h1><?php is_404() ? esc_html_e( 'Nie znaleziono strony', 'mck' ) : esc_html_e( 'Wpisy', 'mck' ); ?></h1>
	</div>
</section>

<section>
	<div class="container legal">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div><?php the_excerpt(); ?></div>
			<?php endwhile; ?>
		<?php else : ?>
			<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Wróć na stronę główną', 'mck' ); ?></a></p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
