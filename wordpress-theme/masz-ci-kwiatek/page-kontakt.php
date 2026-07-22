<?php
/**
 * Template Name: Kontakt
 */
get_header();

$adres_query = urlencode( mck_setting( 'adres_ulica' ) . ' ' . mck_setting( 'adres_kod_miasto' ) );
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
	<div class="container contact-grid">

		<div class="reveal">
			<div class="section-head">
				<div class="eyebrow"><?php echo esc_html( mck_field( 'contact_eyebrow' ) ); ?></div>
				<h2><?php echo esc_html( mck_field( 'contact_heading' ) ); ?></h2>
			</div>

			<div class="contact-cards">
				<a href="<?php echo esc_url( mck_tel_href() ); ?>" class="contact-card">
					<div class="ico"><?php mck_icon( 'telefon' ); ?></div>
					<div><strong><?php esc_html_e( 'Zadzwoń do nas', 'mck' ); ?></strong><span><?php echo esc_html( mck_setting( 'telefon' ) ); ?></span></div>
				</a>
				<a href="<?php echo esc_url( mck_whatsapp_href() ); ?>" target="_blank" rel="noopener" class="contact-card">
					<div class="ico"><?php mck_icon( 'whatsapp' ); ?></div>
					<div><strong>WhatsApp</strong><span><?php echo esc_html( mck_setting( 'telefon' ) ); ?></span></div>
				</a>
				<?php if ( mck_setting( 'email' ) ) : ?>
					<a href="mailto:<?php echo esc_attr( mck_setting( 'email' ) ); ?>" class="contact-card">
						<div class="ico"><?php mck_icon( 'koperta' ); ?></div>
						<div><strong><?php esc_html_e( 'Napisz e-mail', 'mck' ); ?></strong><span><?php echo esc_html( mck_setting( 'email' ) ); ?></span></div>
					</a>
				<?php endif; ?>
				<a href="https://www.google.com/maps/search/?api=1&query=<?php echo $adres_query; ?>" target="_blank" rel="noopener" class="contact-card">
					<div class="ico"><?php mck_icon( 'lokalizacja' ); ?></div>
					<div><strong><?php echo esc_html( mck_setting( 'adres_ulica' ) ); ?></strong><span><?php echo esc_html( mck_setting( 'adres_kod_miasto' ) ); ?></span></div>
				</a>
				<?php if ( mck_setting( 'fb_url' ) ) : ?>
					<a href="<?php echo esc_url( mck_setting( 'fb_url' ) ); ?>" target="_blank" rel="noopener" class="contact-card">
						<div class="ico">f</div>
						<div><strong>Facebook</strong><span><?php bloginfo( 'name' ); ?></span></div>
					</a>
				<?php endif; ?>
				<?php if ( mck_setting( 'tiktok_url' ) ) : ?>
					<a href="<?php echo esc_url( mck_setting( 'tiktok_url' ) ); ?>" target="_blank" rel="noopener" class="contact-card">
						<div class="ico"><?php mck_icon( 'wideo' ); ?></div>
						<div><strong>TikTok</strong><span><?php echo esc_html( ltrim( (string) wp_parse_url( mck_setting( 'tiktok_url' ), PHP_URL_PATH ), '/' ) ); ?></span></div>
					</a>
				<?php endif; ?>
			</div>

			<div class="form-card" style="margin-top:24px;">
				<h3 style="margin-bottom:12px;"><?php esc_html_e( 'Godziny otwarcia', 'mck' ); ?></h3>
				<table class="hours-table">
					<tr><td><?php esc_html_e( 'Poniedziałek – Czwartek', 'mck' ); ?></td><td><?php echo esc_html( mck_setting( 'godziny_pn_czw' ) ); ?></td></tr>
					<tr><td><?php esc_html_e( 'Piątek', 'mck' ); ?></td><td><?php echo esc_html( mck_setting( 'godziny_piatek' ) ); ?></td></tr>
					<tr><td><?php esc_html_e( 'Sobota', 'mck' ); ?></td><td><?php echo esc_html( mck_setting( 'godziny_sobota' ) ); ?></td></tr>
					<tr><td><?php esc_html_e( 'Niedziela', 'mck' ); ?></td><td><?php echo esc_html( mck_setting( 'godziny_niedziela' ) ); ?></td></tr>
					<tr><td><?php esc_html_e( 'Kwiatomat', 'mck' ); ?></td><td><?php echo esc_html( mck_setting( 'godziny_kwiatomat' ) ); ?></td></tr>
				</table>
				<?php if ( mck_setting( 'godziny_uwaga' ) ) : ?>
					<p style="font-size:.78rem; color:var(--gray-dim); margin-top:12px;"><?php echo esc_html( mck_setting( 'godziny_uwaga' ) ); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<div class="reveal">
			<div class="section-head">
				<div class="eyebrow"><?php echo esc_html( mck_field( 'form_eyebrow' ) ); ?></div>
				<h2><?php echo esc_html( mck_field( 'form_heading' ) ); ?></h2>
			</div>
			<div class="form-card">
				<form id="contact-form" data-endpoint="<?php echo esc_url( mck_field( 'form_endpoint', 'https://formsubmit.co/ajax/' . mck_setting( 'email' ) ) ); ?>">
					<input type="hidden" name="_subject" value="<?php echo esc_attr( sprintf( __( 'Nowa wiadomość ze strony - %s', 'mck' ), get_bloginfo( 'name' ) ) ); ?>">
					<input type="hidden" name="_template" value="table">
					<input type="text" name="_honey" class="honeypot" tabindex="-1" autocomplete="off">

					<div class="form-row">
						<div class="field">
							<label for="name"><?php esc_html_e( 'Imię i nazwisko *', 'mck' ); ?></label>
							<input type="text" id="name" name="name" required>
						</div>
						<div class="field">
							<label for="phone"><?php esc_html_e( 'Telefon *', 'mck' ); ?></label>
							<input type="tel" id="phone" name="phone" required>
						</div>
					</div>

					<div class="form-row">
						<div class="field">
							<label for="email"><?php esc_html_e( 'E-mail *', 'mck' ); ?></label>
							<input type="email" id="email" name="email" required>
						</div>
						<div class="field">
							<label for="temat"><?php esc_html_e( 'Temat', 'mck' ); ?></label>
							<select id="temat" name="temat">
								<option><?php esc_html_e( 'Zapytanie ogólne', 'mck' ); ?></option>
								<option><?php esc_html_e( 'Zamówienie bukietu', 'mck' ); ?></option>
								<option><?php esc_html_e( 'Ślub i uroczystość', 'mck' ); ?></option>
								<option><?php esc_html_e( 'Dekoracja eventu', 'mck' ); ?></option>
								<option><?php esc_html_e( 'Współpraca', 'mck' ); ?></option>
							</select>
						</div>
					</div>

					<div class="field">
						<label for="message"><?php esc_html_e( 'Wiadomość *', 'mck' ); ?></label>
						<textarea id="message" name="message" required placeholder="<?php esc_attr_e( 'Napisz, na jaką okazję szukasz kwiatów, jaki masz budżet lub termin realizacji…', 'mck' ); ?>"></textarea>
					</div>

					<div class="consent">
						<input type="checkbox" id="consent" required>
						<label for="consent"><?php echo wp_kses_post( sprintf(
							/* translators: %s: link to privacy policy */
							__( 'Wyrażam zgodę na przetwarzanie moich danych osobowych przez %1$s w celu udzielenia odpowiedzi na przesłane zapytanie, zgodnie z %2$s. *', 'mck' ),
							esc_html( get_bloginfo( 'name' ) ),
							'<a href="' . esc_url( mck_url_polityka() ) . '" target="_blank">' . esc_html( mck_str( 'privacy_policy' ) ) . '</a>'
						) ); ?></label>
					</div>

					<button type="submit" class="btn btn-primary btn-block"><?php esc_html_e( 'Wyślij wiadomość', 'mck' ); ?></button>
					<div id="form-msg" class="form-msg"></div>
				</form>
			</div>
		</div>

	</div>
</section>

<section class="section-alt" id="mapa">
	<div class="section-alt-bg" aria-hidden="true">
		<video autoplay muted loop playsinline preload="none" poster="<?php echo esc_url( get_template_directory_uri() . '/assets/img/kwiat-poster.jpg' ); ?>">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.webm' ); ?>" type="video/webm">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/kwiat-otwiera-sie.mp4' ); ?>" type="video/mp4">
		</video>
	</div>
	<div class="container">
		<div class="section-head center reveal">
			<div class="eyebrow"><?php echo esc_html( mck_field( 'map_eyebrow' ) ); ?></div>
			<h2><?php echo esc_html( mck_field( 'map_heading' ) ); ?></h2>
			<p><?php echo esc_html( mck_setting( 'adres_ulica' ) . ', ' . mck_setting( 'adres_kod_miasto' ) ); ?></p>
		</div>
		<div class="map-frame reveal">
			<iframe
				src="https://www.google.com/maps?q=<?php echo $adres_query; ?>&output=embed"
				allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
				title="<?php echo esc_attr( sprintf( __( 'Mapa dojazdu do %s', 'mck' ), get_bloginfo( 'name' ) ) ); ?>"></iframe>
		</div>
		<div style="text-align:center; margin-top:28px;">
			<a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $adres_query; ?>" target="_blank" rel="noopener" class="btn btn-primary"><?php mck_e( 'directions' ); ?></a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
