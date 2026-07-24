<?php
/**
 * Template Name: Strona główna
 * The home page. Services/reviews/portfolio previews pull from their
 * post types; everything else comes from ACF fields on this page.
 */
get_header();
?>

<!-- HERO -->
<section class="hero">
	<div class="hero-media" aria-hidden="true">
		<video class="hero-video" autoplay muted loop playsinline preload="auto" poster="<?php echo esc_url( get_template_directory_uri() . '/assets/img/kwiat-poster.jpg' ); ?>">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.webm' ); ?>" type="video/webm">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.mp4' ); ?>" type="video/mp4">
		</video>
	</div>
	<div class="hero-flourish" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/flower-tall.jpg' ); ?>" alt=""></div>
	<div class="hero-stack">
		<div class="container hero-inner">
			<div class="eyebrow"><?php echo esc_html( mck_field( 'hero_eyebrow' ) ); ?></div>
			<h1><?php mck_hero_heading( mck_field( 'hero_heading' ), mck_field( 'hero_heading_accent' ) ); ?></h1>
			<p class="lead"><?php echo esc_html( mck_field( 'hero_lead' ) ); ?></p>
			<div class="hero-cta">
				<a href="<?php echo esc_url( mck_tel_href() ); ?>" class="btn btn-primary">
					<?php get_template_part( 'template-parts/icon-phone' ); ?> <?php echo esc_html( sprintf( __( 'Zadzwoń: %s', 'mck' ), mck_setting( 'telefon' ) ) ); ?>
				</a>
				<a href="<?php echo esc_url( mck_url_uslugi() ); ?>" class="btn btn-outline"><?php esc_html_e( 'Zobacz ofertę', 'mck' ); ?></a>
			</div>
			<div class="hero-badges">
				<div><strong><?php echo esc_html( mck_field( 'badge_1_value' ) ); ?></strong><span><?php echo esc_html( mck_field( 'badge_1_label' ) ); ?></span></div>
				<div><strong><?php echo esc_html( mck_field( 'badge_2_value' ) ); ?></strong><span><?php echo esc_html( mck_field( 'badge_2_label' ) ); ?></span></div>
				<div><strong><?php echo esc_html( mck_field( 'badge_3_value' ) ); ?></strong><span><?php echo esc_html( mck_field( 'badge_3_label' ) ); ?></span></div>
				<div><strong><?php echo esc_html( mck_field( 'badge_4_value' ) ); ?></strong><span><?php echo esc_html( mck_field( 'badge_4_label' ) ); ?></span></div>
			</div>
		</div>
	</div>
</section>

<!-- USP BAR -->
<div class="usp-bar">
	<div class="container">
		<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
			<div class="usp-item">
				<div class="ico"><?php mck_icon( mck_field( "usp_{$i}_icon", 'bukiety' ) ); ?></div>
				<div><strong><?php echo esc_html( mck_field( "usp_{$i}_title" ) ); ?></strong><span><?php echo esc_html( mck_field( "usp_{$i}_desc" ) ); ?></span></div>
			</div>
		<?php endfor; ?>
	</div>
</div>

<!-- ABOUT teaser -->
<section>
	<div class="container split">
		<div class="reveal">
			<div class="eyebrow"><?php echo esc_html( mck_field( 'about_eyebrow' ) ); ?></div>
			<h2><?php echo esc_html( mck_field( 'about_heading' ) ); ?></h2>
			<p><?php echo esc_html( mck_field( 'about_par_1' ) ); ?></p>
			<p><?php echo esc_html( mck_field( 'about_par_2' ) ); ?></p>
			<div class="stat-row">
				<div><strong><?php echo esc_html( mck_field( 'stat_1_number' ) ); ?></strong><span><?php echo esc_html( mck_field( 'stat_1_label' ) ); ?></span></div>
				<div><strong><?php echo esc_html( mck_field( 'stat_2_number' ) ); ?></strong><span><?php echo esc_html( mck_field( 'stat_2_label' ) ); ?></span></div>
				<div><strong><?php echo esc_html( mck_field( 'stat_3_number' ) ); ?></strong><span><?php echo esc_html( mck_field( 'stat_3_label' ) ); ?></span></div>
			</div>
			<a href="<?php echo esc_url( mck_url_o_nas() ); ?>" class="btn btn-outline" style="margin-top:32px;"><?php esc_html_e( 'Poznaj naszą historię', 'mck' ); ?></a>
		</div>
		<div class="reveal">
			<div class="brand-panel">
				<?php $logo = mck_setting( 'logo' ); if ( $logo ) : ?>
					<img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<!-- SERVICES teaser -->
<section class="section-alt">
	<div class="section-alt-bg" aria-hidden="true">
		<video autoplay muted loop playsinline preload="none" poster="<?php echo esc_url( get_template_directory_uri() . '/assets/img/kwiat-poster.jpg' ); ?>">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.webm' ); ?>" type="video/webm">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.mp4' ); ?>" type="video/mp4">
		</video>
	</div>
	<div class="container">
		<div class="section-head center reveal">
			<div class="eyebrow"><?php echo esc_html( mck_field( 'services_eyebrow' ) ); ?></div>
			<h2><?php echo esc_html( mck_field( 'services_heading' ) ); ?></h2>
			<p><?php echo esc_html( mck_field( 'services_text' ) ); ?></p>
		</div>
		<div class="grid grid-5">
			<?php
			$services = new WP_Query( array(
				'post_type'      => 'usluga',
				'posts_per_page' => 5,
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
		<div style="text-align:center; margin-top:44px;">
			<a href="<?php echo esc_url( mck_url_uslugi() ); ?>" class="btn btn-primary"><?php esc_html_e( 'Zobacz pełną ofertę', 'mck' ); ?></a>
		</div>
	</div>
</section>

<!-- REVIEWS -->
<section>
	<div class="container">
		<div class="section-head center reveal">
			<div class="eyebrow"><?php echo esc_html( mck_field( 'reviews_eyebrow' ) ); ?></div>
			<h2><?php echo esc_html( mck_field( 'reviews_heading' ) ); ?></h2>
			<p><?php echo esc_html( mck_field( 'reviews_text' ) ); ?></p>
		</div>
		<div class="grid grid-4">
			<?php
			$reviews = new WP_Query( array(
				'post_type'      => 'opinia',
				'posts_per_page' => 8,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'no_found_rows'  => true,
			) );
			while ( $reviews->have_posts() ) : $reviews->the_post();
				$stars = (int) mck_field( 'gwiazdki', 5 );
				?>
				<div class="review-card reveal">
					<div class="stars"><?php echo esc_html( str_repeat( '★', max( 1, min( 5, $stars ) ) ) ); ?></div>
					<p class="review-text"><?php echo esc_html( wp_strip_all_tags( get_the_content() ) ); ?></p>
					<div class="review-author"><strong><?php the_title(); ?></strong><span><?php echo esc_html( mck_field( 'zrodlo' ) ); ?></span></div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		<div style="text-align:center; margin-top:44px;">
			<a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode( mck_setting( 'adres_ulica' ) . ' ' . mck_setting( 'adres_kod_miasto' ) ); ?>" target="_blank" rel="noopener" class="btn btn-outline"><?php mck_e( 'read_more_reviews' ); ?></a>
		</div>
	</div>
</section>

<!-- FLOWER MACHINE teaser -->
<section>
	<div class="container">
		<div class="kwiatomat reveal">
			<div>
				<span class="badge-24"><?php echo esc_html( mck_field( 'kwiatomat_badge' ) ); ?></span>
				<h2><?php echo esc_html( mck_field( 'kwiatomat_heading' ) ); ?></h2>
				<p style="max-width:480px;"><?php echo esc_html( mck_field( 'kwiatomat_text' ) ); ?></p>
				<a href="<?php echo esc_url( mck_url_uslugi() . '#kwiatomat' ); ?>" class="btn btn-outline" style="margin-top:24px;"><?php esc_html_e( 'Dowiedz się więcej', 'mck' ); ?></a>
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

<!-- PORTFOLIO teaser -->
<section class="section-alt">
	<div class="section-alt-bg" aria-hidden="true">
		<video autoplay muted loop playsinline preload="none" poster="<?php echo esc_url( get_template_directory_uri() . '/assets/img/kwiat-poster.jpg' ); ?>">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.webm' ); ?>" type="video/webm">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.mp4' ); ?>" type="video/mp4">
		</video>
	</div>
	<div class="container">
		<div class="section-head center reveal">
			<div class="eyebrow"><?php echo esc_html( mck_field( 'portfolio_eyebrow' ) ); ?></div>
			<h2><?php echo esc_html( mck_field( 'portfolio_heading' ) ); ?></h2>
		</div>
		<div class="portfolio-grid">
			<?php
			$portfolio = new WP_Query( array(
				'post_type'      => 'realizacja',
				'posts_per_page' => 3,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'no_found_rows'  => true,
			) );
			while ( $portfolio->have_posts() ) : $portfolio->the_post();
				$link = mck_field( 'link_url' );
				$tag  = $link ? 'a' : 'div';
				?>
				<<?php echo $tag; ?> class="portfolio-tile reveal" <?php if ( $link ) : ?>href="<?php echo esc_url( $link ); ?>" target="_blank" rel="noopener"<?php endif; ?>>
					<div class="tile-ico"><?php mck_icon( mck_field( 'ikona', 'kwiat-petla' ) ); ?></div>
					<div class="tile-label"><strong><?php the_title(); ?></strong><span><?php echo esc_html( mck_field( 'etykieta' ) ); ?></span></div>
				</<?php echo $tag; ?>>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		<div style="text-align:center; margin-top:44px;">
			<a href="<?php echo esc_url( mck_url_portfolio() ); ?>" class="btn btn-primary"><?php esc_html_e( 'Pełne portfolio', 'mck' ); ?></a>
		</div>
	</div>
</section>

<!-- CTA -->
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
