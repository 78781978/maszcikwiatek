<?php
/**
 * Template Name: Polityka prywatności
 */
get_header();
?>

<section class="hero" style="min-height:36vh; padding-top:calc(150px + var(--hero-lift)); padding-bottom:50px;">
	<div class="hero-media" aria-hidden="true">
		<video class="hero-video" autoplay muted loop playsinline preload="auto" poster="<?php echo esc_url( get_template_directory_uri() . '/assets/img/kwiat-poster.jpg' ); ?>">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.webm' ); ?>" type="video/webm">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.mp4' ); ?>" type="video/mp4">
		</video>
	</div>
	<div class="hero-flourish" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/flower-tall.jpg' ); ?>" alt=""></div>
	<div class="container hero-inner">
		<div class="eyebrow"><?php echo esc_html( mck_field( 'hero_eyebrow' ) ); ?></div>
		<h1><?php mck_hero_heading( mck_field( 'hero_heading' ), mck_field( 'hero_heading_accent' ) ); ?></h1>
	</div>
</section>

<section>
	<div class="container legal">
		<?php $updated = mck_field( 'ostatnia_aktualizacja' ); if ( $updated ) : ?>
			<p class="updated"><?php echo esc_html( sprintf( __( 'Ostatnia aktualizacja: %s', 'mck' ), $updated ) ); ?></p>
		<?php endif; ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</section>

<?php get_footer(); ?>
