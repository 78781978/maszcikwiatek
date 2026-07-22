<?php
/**
 * Fallback for any Page that isn't assigned one of the specific
 * templates (front page / o-nas / usługi / portfolio / kontakt /
 * polityka-prywatności) - e.g. a brand new page an editor just added.
 */
get_header();
?>

<section class="hero" style="min-height:36vh; padding-top:calc(150px + var(--hero-lift)); padding-bottom:50px;">
	<div class="container hero-inner">
		<h1><?php the_title(); ?></h1>
	</div>
</section>

<section>
	<div class="container legal">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</section>

<?php get_footer(); ?>
