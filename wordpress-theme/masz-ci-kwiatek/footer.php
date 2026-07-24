	<!-- FOOTER -->
	<footer class="site-footer" id="footer">
		<div class="footer-flourish left" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/flower-accent-2.jpg' ); ?>" alt=""></div>
		<div class="footer-flourish right" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/flower-accent-1.jpg' ); ?>" alt=""></div>
		<div class="container">
			<div class="footer-grid">
				<div class="footer-about">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand" style="margin-bottom:16px;">
						<?php $logo = mck_setting( 'logo' ); if ( $logo ) : ?>
							<img src="<?php echo esc_url( $logo ); ?>" alt="Logo">
						<?php endif; ?>
					</a>
					<div class="footer-social">
						<?php if ( mck_setting( 'fb_url' ) ) : ?>
							<a href="<?php echo esc_url( mck_setting( 'fb_url' ) ); ?>" target="_blank" rel="noopener" class="icon-link" aria-label="Facebook">f</a>
						<?php endif; ?>
						<?php if ( mck_setting( 'tiktok_url' ) ) : ?>
							<a href="<?php echo esc_url( mck_setting( 'tiktok_url' ) ); ?>" target="_blank" rel="noopener" class="icon-link" aria-label="TikTok">♪</a>
						<?php endif; ?>
					</div>
				</div>

				<div>
					<h4><?php mck_e( 'nav_heading' ); ?></h4>
					<ul>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'container'      => false,
							'items_wrap'     => '%3$s',
							'fallback_cb'    => false,
						) );
						?>
					</ul>
				</div>

				<div>
					<h4><?php mck_e( 'info_heading' ); ?></h4>
					<ul>
						<li><a href="<?php echo esc_url( mck_url_polityka() ); ?>"><?php mck_e( 'privacy_policy' ); ?></a></li>
						<li><a href="<?php echo esc_url( mck_url_polityka() . '#cookies' ); ?>"><?php mck_e( 'cookie_policy' ); ?></a></li>
						<li><a href="#" data-cookie="reopen"><?php mck_e( 'cookie_reopen' ); ?></a></li>
						<li><a href="<?php echo esc_url( mck_url_kontakt() . '#mapa' ); ?>"><?php mck_e( 'getting_here' ); ?></a></li>
					</ul>
				</div>

				<div>
					<h4><?php mck_e( 'contact_heading' ); ?></h4>
					<ul>
						<li>
							<a href="<?php echo esc_url( mck_tel_href() ); ?>" class="footer-phone">
								<?php get_template_part( 'template-parts/icon-phone' ); ?> <?php echo esc_html( mck_setting( 'telefon' ) ); ?>
							</a>
						</li>
						<?php if ( mck_setting( 'email' ) ) : ?>
							<li><a href="mailto:<?php echo esc_attr( mck_setting( 'email' ) ); ?>">✉ <?php echo esc_html( mck_setting( 'email' ) ); ?></a></li>
						<?php endif; ?>
						<li>
							<a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode( mck_setting( 'adres_ulica' ) . ' ' . mck_setting( 'adres_kod_miasto' ) ); ?>" target="_blank" rel="noopener" class="footer-pin">
								<svg viewBox="0 0 24 24" width="1em" height="1em" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s7-6.3 7-11.5a7 7 0 0 0-14 0C5 14.7 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.4"/></svg>
								<?php echo esc_html( mck_setting( 'adres_ulica' ) . ', ' . mck_setting( 'adres_kod_miasto' ) ); ?>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="footer-bottom">
				<span>© <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php mck_e( 'rights_reserved' ); ?></span>
				<span><a href="<?php echo esc_url( mck_url_polityka() ); ?>"><?php mck_e( 'privacy_policy' ); ?></a></span>
			</div>
		</div>
	</footer>

	<?php get_template_part( 'template-parts/cookie-consent' ); ?>

	<a href="<?php echo esc_url( mck_tel_href() ); ?>" class="float-call" aria-label="<?php echo esc_attr( mck_str( 'call_now_aria' ) ); ?>">
		<?php get_template_part( 'template-parts/icon-phone' ); ?>
	</a>

	<?php get_template_part( 'template-parts/a11y-widget' ); ?>

<?php wp_footer(); ?>
</body>
</html>
