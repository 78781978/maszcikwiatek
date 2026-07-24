<?php
/**
 * Template Name: Portfolio
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
		<div class="portfolio-grid">
			<?php
			$portfolio = new WP_Query( array(
				'post_type'      => 'realizacja',
				'posts_per_page' => -1,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'no_found_rows'  => true,
			) );
			while ( $portfolio->have_posts() ) : $portfolio->the_post();
				$link     = mck_field( 'link_url' );
				$is_video = mck_field( 'jest_wideo' );
				$tag      = $link ? 'a' : 'div';
				$classes  = 'portfolio-tile reveal' . ( $is_video ? ' tile-video' : '' );
				?>
				<<?php echo $tag; ?> class="<?php echo esc_attr( $classes ); ?>" <?php if ( $link ) : ?>href="<?php echo esc_url( $link ); ?>" target="_blank" rel="noopener"<?php endif; ?>>
					<?php if ( $is_video ) : ?>
						<div class="tile-play" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M9 7.5v9l7-4.5-7-4.5Z"/></svg></div>
					<?php endif; ?>
					<div class="tile-ico"><?php mck_icon( mck_field( 'ikona', 'kwiat-petla' ) ); ?></div>
					<div class="tile-label"><strong><?php the_title(); ?></strong><span><?php echo esc_html( mck_field( 'etykieta' ) ); ?></span></div>
				</<?php echo $tag; ?>>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>

		<div class="form-card reveal" style="margin-top:56px; text-align:center;">
			<h3 style="margin-bottom:10px;"><?php echo esc_html( mck_field( 'gallery_heading' ) ); ?></h3>
			<p><?php echo esc_html( mck_field( 'gallery_text' ) ); ?></p>
			<div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap; margin-top:10px;">
				<?php if ( mck_setting( 'fb_url' ) ) : ?>
					<a href="<?php echo esc_url( mck_setting( 'fb_url' ) ); ?>" target="_blank" rel="noopener" class="btn btn-primary">Facebook</a>
				<?php endif; ?>
				<?php if ( mck_setting( 'tiktok_url' ) ) : ?>
					<a href="<?php echo esc_url( mck_setting( 'tiktok_url' ) ); ?>" target="_blank" rel="noopener" class="btn btn-outline">TikTok</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<section class="cta-band">
	<div class="container reveal">
		<h2><?php echo esc_html( mck_field( 'cta_heading' ) ); ?></h2>
		<p style="max-width:520px; margin:0 auto 10px;"><?php echo esc_html( mck_field( 'cta_text' ) ); ?></p>
		<a href="<?php echo esc_url( mck_url_kontakt() ); ?>" class="btn btn-primary"><?php esc_html_e( 'Napisz do nas', 'mck' ); ?></a>
	</div>
</section>

<?php get_footer(); ?>
