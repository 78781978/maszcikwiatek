<?php
/**
 * Template Name: Usługi
 */
get_header();
?>

<section class="hero" style="min-height:55vh; padding-top:calc(160px + var(--hero-lift)); padding-bottom:70px;">
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
	<div class="container">
		<div class="grid grid-2" style="gap:28px;">
			<?php
			$services = new WP_Query( array(
				'post_type'      => 'usluga',
				'posts_per_page' => -1,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'no_found_rows'  => true,
			) );
			while ( $services->have_posts() ) : $services->the_post();
				?>
				<div class="card reveal">
					<div class="ico"><?php mck_icon( mck_field( 'ikona', 'bukiety' ) ); ?></div>
					<h3><?php the_title(); ?></h3>
					<p><?php echo esc_html( wp_strip_all_tags( get_the_content() ) ); ?></p>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>

<!-- FLOWER MACHINE details -->
<section class="section-alt" id="kwiatomat">
	<div class="section-alt-bg" aria-hidden="true">
		<video autoplay muted loop playsinline preload="none" poster="<?php echo esc_url( get_template_directory_uri() . '/assets/img/kwiat-poster.jpg' ); ?>">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.webm' ); ?>" type="video/webm">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.mp4' ); ?>" type="video/mp4">
		</video>
	</div>
	<div class="container">
		<div class="kwiatomat reveal">
			<div>
				<span class="badge-24"><?php echo esc_html( mck_field( 'kwiatomat_badge' ) ); ?></span>
				<h2><?php echo esc_html( mck_field( 'kwiatomat_heading' ) ); ?></h2>
				<p style="max-width:520px;"><?php echo esc_html( mck_field( 'kwiatomat_text' ) ); ?></p>
				<ul style="color:var(--gray); padding-left:1.2em; list-style:disc; margin-top:16px;">
					<?php foreach ( array( 'kwiatomat_bullet_1', 'kwiatomat_bullet_2', 'kwiatomat_bullet_3' ) as $bullet ) : ?>
						<?php if ( mck_field( $bullet ) ) : ?>
							<li><?php echo esc_html( mck_field( $bullet ) ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
				<a href="<?php echo esc_url( mck_url_kontakt() . '#mapa' ); ?>" class="btn btn-outline" style="margin-top:24px;"><?php esc_html_e( 'Zobacz lokalizację', 'mck' ); ?></a>
			</div>
			<div class="kwiatomat-right">
				<div class="kwiatomat-photo">
					<?php $foto = mck_setting( 'kwiatomat_zdjecie' ); if ( $foto ) : ?>
						<img src="<?php echo esc_url( $foto ); ?>" alt="Kwiatomat">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="section-head center reveal">
			<div class="eyebrow"><?php echo esc_html( mck_field( 'hours_eyebrow' ) ); ?></div>
			<h2><?php echo esc_html( mck_field( 'hours_heading' ) ); ?></h2>
		</div>
		<div class="form-card reveal" style="max-width:480px; margin:0 auto;">
			<table class="hours-table">
				<tr><td><?php esc_html_e( 'Poniedziałek – Czwartek', 'mck' ); ?></td><td><?php echo esc_html( mck_setting( 'godziny_pn_czw' ) ); ?></td></tr>
				<tr><td><?php esc_html_e( 'Piątek', 'mck' ); ?></td><td><?php echo esc_html( mck_setting( 'godziny_piatek' ) ); ?></td></tr>
				<tr><td><?php esc_html_e( 'Sobota', 'mck' ); ?></td><td><?php echo esc_html( mck_setting( 'godziny_sobota' ) ); ?></td></tr>
				<tr><td><?php esc_html_e( 'Niedziela', 'mck' ); ?></td><td><?php echo esc_html( mck_setting( 'godziny_niedziela' ) ); ?></td></tr>
				<tr><td><?php esc_html_e( 'Kwiatomat', 'mck' ); ?></td><td><?php echo esc_html( mck_setting( 'godziny_kwiatomat' ) ); ?></td></tr>
			</table>
			<?php if ( mck_setting( 'godziny_uwaga' ) ) : ?>
				<p style="font-size:.82rem; margin-top:16px;"><?php echo esc_html( mck_setting( 'godziny_uwaga' ) ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="cta-band">
	<div class="container reveal">
		<h2><?php echo esc_html( mck_field( 'cta_heading' ) ); ?></h2>
		<p style="max-width:520px; margin:0 auto 10px;"><?php echo esc_html( mck_field( 'cta_text' ) ); ?></p>
		<a href="<?php echo esc_url( mck_tel_href() ); ?>" class="btn btn-primary">
			<?php get_template_part( 'template-parts/icon-phone' ); ?> <?php echo esc_html( mck_setting( 'telefon' ) ); ?>
		</a>
		<a href="<?php echo esc_url( mck_url_kontakt() ); ?>" class="btn btn-outline" style="margin-left:14px;"><?php mck_e( 'contact_form_link' ); ?></a>
	</div>
</section>

<?php get_footer(); ?>
