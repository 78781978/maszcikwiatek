<?php
/**
 * Template Name: O nas
 */
get_header();
?>

<section class="hero" style="min-height:60vh; padding-top:calc(160px + var(--hero-lift)); padding-bottom:70px;">
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
		<p class="lead"><?php echo esc_html( mck_field( 'hero_lead' ) ); ?></p>
	</div>
</section>

<section>
	<div class="container split">
		<div class="reveal">
			<div class="brand-panel">
				<?php $logo = mck_setting( 'logo' ); if ( $logo ) : ?>
					<img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<?php endif; ?>
			</div>
		</div>
		<div class="reveal">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	</div>
</section>

<section class="section-alt">
	<div class="section-alt-bg" aria-hidden="true">
		<video autoplay muted loop playsinline preload="none" poster="<?php echo esc_url( get_template_directory_uri() . '/assets/img/kwiat-poster.jpg' ); ?>">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.webm' ); ?>" type="video/webm">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.mp4' ); ?>" type="video/mp4">
		</video>
	</div>
	<div class="container">
		<div class="section-head center reveal">
			<div class="eyebrow"><?php echo esc_html( mck_field( 'wartosci_eyebrow' ) ); ?></div>
			<h2><?php echo esc_html( mck_field( 'wartosci_heading' ) ); ?></h2>
		</div>
		<div class="grid grid-3">
			<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
				<div class="card reveal">
					<div class="ico"><?php mck_icon( mck_field( "wartosc_{$i}_icon", 'liscie' ) ); ?></div>
					<h3><?php echo esc_html( mck_field( "wartosc_{$i}_tytul" ) ); ?></h3>
					<p><?php echo esc_html( mck_field( "wartosc_{$i}_opis" ) ); ?></p>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="rating-card reveal" style="max-width:640px; margin:0 auto;">
			<div class="stars">★★★★★</div>
			<div>
				<strong style="display:block; font-family:var(--ff-head); font-size:1.2rem;"><?php echo esc_html( mck_field( 'rating_title' ) ); ?></strong>
				<span style="color:var(--gray); font-size:.9rem;"><?php echo esc_html( mck_field( 'rating_text' ) ); ?></span>
			</div>
		</div>
	</div>
</section>

<section class="cta-band">
	<div class="container reveal">
		<h2><?php echo esc_html( mck_field( 'cta_heading' ) ); ?></h2>
		<p style="max-width:520px; margin:0 auto 10px;"><?php echo esc_html( mck_field( 'cta_text' ) ); ?></p>
		<a href="<?php echo esc_url( mck_url_kontakt() ); ?>" class="btn btn-primary"><?php esc_html_e( 'Zobacz kontakt i mapę', 'mck' ); ?></a>
	</div>
</section>

<?php get_footer(); ?>
