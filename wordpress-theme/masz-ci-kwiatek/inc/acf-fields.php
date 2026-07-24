<?php
/**
 * ACF field group registrations (local PHP, not JSON, so the whole
 * theme is portable in one file). Requires the free "Advanced Custom
 * Fields" plugin. Nothing here runs if ACF isn't active, so the theme
 * still loads (with a plain, unstyled "Custom Fields" box instead).
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'acf/init', 'mck_register_acf_fields' );

function mck_register_acf_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	$icon_choices = function_exists( 'mck_icon_choices' ) ? mck_icon_choices() : array();

	/* ---------------------------------------------------------------
	 * 1. SITE SETTINGS - one editable Page (slug: ustawienia-strony)
	 *    holds everything used site-wide: phone, email, socials,
	 *    address, opening hours, logo, kwiatomat photo.
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_mck_site_settings',
		'title'    => 'Ustawienia strony (dane kontaktowe, godziny, zdjęcia)',
		'fields'   => array(
			array( 'key' => 'field_mck_telefon', 'label' => 'Telefon', 'name' => 'telefon', 'type' => 'text', 'default_value' => '573 377 330' ),
			array( 'key' => 'field_mck_email', 'label' => 'E-mail', 'name' => 'email', 'type' => 'email', 'default_value' => 'kontakt@maszcikwiatek.pl' ),
			array( 'key' => 'field_mck_fb_url', 'label' => 'Link do Facebooka', 'name' => 'fb_url', 'type' => 'url' ),
			array( 'key' => 'field_mck_tiktok_url', 'label' => 'Link do TikToka', 'name' => 'tiktok_url', 'type' => 'url' ),
			array( 'key' => 'field_mck_whatsapp', 'label' => 'Numer WhatsApp (same cyfry, z kodem kraju)', 'name' => 'whatsapp', 'type' => 'text', 'default_value' => '48573377330' ),
			array( 'key' => 'field_mck_ulica', 'label' => 'Ulica i numer', 'name' => 'adres_ulica', 'type' => 'text', 'default_value' => 'ul. Krakowska 150' ),
			array( 'key' => 'field_mck_miasto', 'label' => 'Kod pocztowy i miasto', 'name' => 'adres_kod_miasto', 'type' => 'text', 'default_value' => '32-091 Michałowice' ),
			array( 'key' => 'field_mck_nip', 'label' => 'NIP (do polityki prywatności)', 'name' => 'nip', 'type' => 'text' ),
			array( 'key' => 'field_mck_logo', 'label' => 'Logo', 'name' => 'logo', 'type' => 'image', 'return_format' => 'url', 'preview_size' => 'thumbnail' ),
			array( 'key' => 'field_mck_kwiatomat_zdjecie', 'label' => 'Zdjęcie Kwiatomatu', 'name' => 'kwiatomat_zdjecie', 'type' => 'image', 'return_format' => 'url', 'preview_size' => 'medium' ),
			array(
				'key' => 'field_mck_godziny_tab', 'label' => 'Godziny otwarcia', 'name' => '', 'type' => 'tab',
			),
			array( 'key' => 'field_mck_godz_pn_czw', 'label' => 'Poniedziałek – Czwartek', 'name' => 'godziny_pn_czw', 'type' => 'text', 'default_value' => '11:00 – 16:00' ),
			array( 'key' => 'field_mck_godz_piatek', 'label' => 'Piątek', 'name' => 'godziny_piatek', 'type' => 'text', 'default_value' => '11:00 – 19:00' ),
			array( 'key' => 'field_mck_godz_sobota', 'label' => 'Sobota', 'name' => 'godziny_sobota', 'type' => 'text', 'default_value' => 'Odbiory zamówień*' ),
			array( 'key' => 'field_mck_godz_niedziela', 'label' => 'Niedziela', 'name' => 'godziny_niedziela', 'type' => 'text', 'default_value' => 'Kwiaciarnia nieczynna' ),
			array( 'key' => 'field_mck_godz_kwiatomat', 'label' => 'Kwiatomat', 'name' => 'godziny_kwiatomat', 'type' => 'text', 'default_value' => 'Czynny 24h / 7 dni' ),
			array( 'key' => 'field_mck_godz_uwaga', 'label' => 'Dopisek pod tabelą (gwiazdka *)', 'name' => 'godziny_uwaga', 'type' => 'textarea', 'rows' => 3 ),
		),
		'location' => array( array( array(
			'param' => 'page', 'operator' => '==', 'value' => 'ustawienia-strony',
		) ) ),
	) );

	/* ---------------------------------------------------------------
	 * 2. HERO - eyebrow/heading/lead, attached to every page template.
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_mck_hero',
		'title'    => 'Nagłówek strony (hero)',
		'fields'   => array(
			array( 'key' => 'field_mck_hero_eyebrow', 'label' => 'Mały napis nad tytułem', 'name' => 'hero_eyebrow', 'type' => 'text' ),
			array( 'key' => 'field_mck_hero_heading', 'label' => 'Tytuł - część zwykła', 'name' => 'hero_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_hero_heading_accent', 'label' => 'Tytuł - część różowa/kursywa', 'name' => 'hero_heading_accent', 'type' => 'text' ),
			array( 'key' => 'field_mck_hero_lead', 'label' => 'Zdanie pod tytułem', 'name' => 'hero_lead', 'type' => 'textarea', 'rows' => 2 ),
		),
		'location' => array(
			array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php' ) ),
			array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-o-nas.php' ) ),
			array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-uslugi.php' ) ),
			array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-portfolio.php' ) ),
			array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-kontakt.php' ) ),
			array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-polityka-prywatnosci.php' ) ),
		),
	) );

	/* ---------------------------------------------------------------
	 * 3. FRONT PAGE sections
	 * ------------------------------------------------------------- */
	$usp_fields = array();
	for ( $i = 1; $i <= 4; $i++ ) {
		$usp_fields[] = array( 'key' => "field_mck_usp_{$i}_tab", 'label' => "USP {$i}", 'name' => '', 'type' => 'tab' );
		$usp_fields[] = array( 'key' => "field_mck_usp_{$i}_icon", 'label' => 'Ikona', 'name' => "usp_{$i}_icon", 'type' => 'select', 'choices' => $icon_choices );
		$usp_fields[] = array( 'key' => "field_mck_usp_{$i}_title", 'label' => 'Tytuł', 'name' => "usp_{$i}_title", 'type' => 'text' );
		$usp_fields[] = array( 'key' => "field_mck_usp_{$i}_desc", 'label' => 'Opis', 'name' => "usp_{$i}_desc", 'type' => 'text' );
	}

	acf_add_local_field_group( array(
		'key'      => 'group_mck_front_page',
		'title'    => 'Strona główna - treści',
		'fields'   => array_merge( array(
			array( 'key' => 'field_mck_fp_tab_badges', 'label' => 'Odznaki pod przyciskami (hero)', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_badge_1_value', 'label' => 'Odznaka 1 - wartość', 'name' => 'badge_1_value', 'type' => 'text', 'default_value' => '5,0 ★' ),
			array( 'key' => 'field_mck_badge_1_label', 'label' => 'Odznaka 1 - opis', 'name' => 'badge_1_label', 'type' => 'text', 'default_value' => 'Google (33 opinie)' ),
			array( 'key' => 'field_mck_badge_2_value', 'label' => 'Odznaka 2 - wartość', 'name' => 'badge_2_value', 'type' => 'text', 'default_value' => '100%' ),
			array( 'key' => 'field_mck_badge_2_label', 'label' => 'Odznaka 2 - opis', 'name' => 'badge_2_label', 'type' => 'text', 'default_value' => 'poleca na Facebooku' ),
			array( 'key' => 'field_mck_badge_3_value', 'label' => 'Odznaka 3 - wartość', 'name' => 'badge_3_value', 'type' => 'text', 'default_value' => '24h' ),
			array( 'key' => 'field_mck_badge_3_label', 'label' => 'Odznaka 3 - opis', 'name' => 'badge_3_label', 'type' => 'text', 'default_value' => 'Kwiatomat na miejscu' ),
			array( 'key' => 'field_mck_badge_4_value', 'label' => 'Odznaka 4 - wartość', 'name' => 'badge_4_value', 'type' => 'text', 'default_value' => 'PL · EN' ),
			array( 'key' => 'field_mck_badge_4_label', 'label' => 'Odznaka 4 - opis', 'name' => 'badge_4_label', 'type' => 'text', 'default_value' => 'obsługa klienta' ),

			array( 'key' => 'field_mck_fp_tab_usp', 'label' => 'Pasek 4 atutów (USP)', 'name' => '', 'type' => 'tab' ),
		), $usp_fields, array(
			array( 'key' => 'field_mck_fp_tab_about', 'label' => 'Sekcja "Poznaj nas"', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_about_eyebrow', 'label' => 'Mały napis', 'name' => 'about_eyebrow', 'type' => 'text', 'default_value' => 'Poznaj nas' ),
			array( 'key' => 'field_mck_about_heading', 'label' => 'Nagłówek', 'name' => 'about_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_about_par_1', 'label' => 'Akapit 1', 'name' => 'about_par_1', 'type' => 'textarea', 'rows' => 3 ),
			array( 'key' => 'field_mck_about_par_2', 'label' => 'Akapit 2', 'name' => 'about_par_2', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_mck_stat_1_num', 'label' => 'Statystyka 1 - liczba', 'name' => 'stat_1_number', 'type' => 'text' ),
			array( 'key' => 'field_mck_stat_1_label', 'label' => 'Statystyka 1 - opis', 'name' => 'stat_1_label', 'type' => 'text' ),
			array( 'key' => 'field_mck_stat_2_num', 'label' => 'Statystyka 2 - liczba', 'name' => 'stat_2_number', 'type' => 'text' ),
			array( 'key' => 'field_mck_stat_2_label', 'label' => 'Statystyka 2 - opis', 'name' => 'stat_2_label', 'type' => 'text' ),
			array( 'key' => 'field_mck_stat_3_num', 'label' => 'Statystyka 3 - liczba', 'name' => 'stat_3_number', 'type' => 'text' ),
			array( 'key' => 'field_mck_stat_3_label', 'label' => 'Statystyka 3 - opis', 'name' => 'stat_3_label', 'type' => 'text' ),

			array( 'key' => 'field_mck_fp_tab_services', 'label' => 'Sekcja "Usługi kwiaciarni"', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_services_eyebrow', 'label' => 'Mały napis', 'name' => 'services_eyebrow', 'type' => 'text', 'default_value' => 'Nasza oferta' ),
			array( 'key' => 'field_mck_services_heading', 'label' => 'Nagłówek', 'name' => 'services_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_services_text', 'label' => 'Zdanie pod nagłówkiem', 'name' => 'services_text', 'type' => 'textarea', 'rows' => 2 ),

			array( 'key' => 'field_mck_fp_tab_reviews', 'label' => 'Sekcja "Opinie klientów"', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_reviews_eyebrow', 'label' => 'Mały napis', 'name' => 'reviews_eyebrow', 'type' => 'text', 'default_value' => 'Opinie klientów' ),
			array( 'key' => 'field_mck_reviews_heading', 'label' => 'Nagłówek', 'name' => 'reviews_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_reviews_text', 'label' => 'Zdanie pod nagłówkiem', 'name' => 'reviews_text', 'type' => 'text' ),

			array( 'key' => 'field_mck_fp_tab_kwiatomat', 'label' => 'Sekcja Kwiatomatu', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_kwiatomat_badge', 'label' => 'Etykieta (np. CZYNNE 24H)', 'name' => 'kwiatomat_badge', 'type' => 'text', 'default_value' => 'CZYNNE 24H / 7 DNI' ),
			array( 'key' => 'field_mck_kwiatomat_heading', 'label' => 'Nagłówek', 'name' => 'kwiatomat_heading', 'type' => 'text', 'default_value' => 'Kwiatomat „Masz Ci Kwiatek”' ),
			array( 'key' => 'field_mck_kwiatomat_text', 'label' => 'Opis', 'name' => 'kwiatomat_text', 'type' => 'textarea', 'rows' => 3 ),

			array( 'key' => 'field_mck_fp_tab_portfolio', 'label' => 'Sekcja "Zobacz nasze prace"', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_portfolio_eyebrow', 'label' => 'Mały napis', 'name' => 'portfolio_eyebrow', 'type' => 'text', 'default_value' => 'Realizacje' ),
			array( 'key' => 'field_mck_portfolio_heading', 'label' => 'Nagłówek', 'name' => 'portfolio_heading', 'type' => 'text' ),

			array( 'key' => 'field_mck_fp_tab_cta', 'label' => 'Pasek CTA na dole', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_fp_cta_heading', 'label' => 'Nagłówek', 'name' => 'cta_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_fp_cta_text', 'label' => 'Opis', 'name' => 'cta_text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * 4. ABOUT PAGE ("O nas")
	 * ------------------------------------------------------------- */
	$value_fields = array();
	for ( $i = 1; $i <= 3; $i++ ) {
		$value_fields[] = array( 'key' => "field_mck_wartosc_{$i}_tab", 'label' => "Wartość {$i}", 'name' => '', 'type' => 'tab' );
		$value_fields[] = array( 'key' => "field_mck_wartosc_{$i}_icon", 'label' => 'Ikona', 'name' => "wartosc_{$i}_icon", 'type' => 'select', 'choices' => $icon_choices );
		$value_fields[] = array( 'key' => "field_mck_wartosc_{$i}_tytul", 'label' => 'Tytuł', 'name' => "wartosc_{$i}_tytul", 'type' => 'text' );
		$value_fields[] = array( 'key' => "field_mck_wartosc_{$i}_opis", 'label' => 'Opis', 'name' => "wartosc_{$i}_opis", 'type' => 'textarea', 'rows' => 2 );
	}

	acf_add_local_field_group( array(
		'key'      => 'group_mck_about_page',
		'title'    => 'O nas - treści',
		'fields'   => array_merge( array(
			array( 'key' => 'field_mck_about_tab_story', 'label' => 'Nasza historia', 'name' => '', 'type' => 'tab' ),
			array(
				'key' => 'field_mck_about_story_note', 'label' => '', 'name' => '', 'type' => 'message',
				'message' => 'Treść "Naszej historii" (akapity pod zdjęciem loga) edytujesz w głównym edytorze strony powyżej, nie tutaj.',
			),
			array( 'key' => 'field_mck_about_tab_values', 'label' => 'Sekcja "Nasze wartości"', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_wartosci_eyebrow', 'label' => 'Mały napis', 'name' => 'wartosci_eyebrow', 'type' => 'text', 'default_value' => 'Nasze wartości' ),
			array( 'key' => 'field_mck_wartosci_heading', 'label' => 'Nagłówek', 'name' => 'wartosci_heading', 'type' => 'text' ),
		), $value_fields, array(
			array( 'key' => 'field_mck_about_tab_rating', 'label' => 'Pasek oceny', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_rating_title', 'label' => 'Nagłówek oceny', 'name' => 'rating_title', 'type' => 'text', 'default_value' => '5,0 / 5 w Google Maps' ),
			array( 'key' => 'field_mck_rating_text', 'label' => 'Podpis pod oceną', 'name' => 'rating_text', 'type' => 'text' ),
			array( 'key' => 'field_mck_about_tab_cta', 'label' => 'Pasek CTA na dole', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_about_cta_heading', 'label' => 'Nagłówek', 'name' => 'cta_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_about_cta_text', 'label' => 'Opis', 'name' => 'cta_text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-o-nas.php' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * 5. SERVICES PAGE ("Usługi")
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_mck_services_page',
		'title'    => 'Usługi - treści',
		'fields'   => array(
			array( 'key' => 'field_mck_sp_tab_kwiatomat', 'label' => 'Sekcja Kwiatomatu', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_sp_kwiatomat_badge', 'label' => 'Etykieta', 'name' => 'kwiatomat_badge', 'type' => 'text', 'default_value' => 'CZYNNE 24H / 7 DNI W TYGODNIU' ),
			array( 'key' => 'field_mck_sp_kwiatomat_heading', 'label' => 'Nagłówek', 'name' => 'kwiatomat_heading', 'type' => 'text', 'default_value' => 'Kwiatomat „Masz Ci Kwiatek”' ),
			array( 'key' => 'field_mck_sp_kwiatomat_text', 'label' => 'Opis', 'name' => 'kwiatomat_text', 'type' => 'textarea', 'rows' => 3 ),
			array( 'key' => 'field_mck_sp_kwiatomat_b1', 'label' => 'Punkt listy 1', 'name' => 'kwiatomat_bullet_1', 'type' => 'text' ),
			array( 'key' => 'field_mck_sp_kwiatomat_b2', 'label' => 'Punkt listy 2', 'name' => 'kwiatomat_bullet_2', 'type' => 'text' ),
			array( 'key' => 'field_mck_sp_kwiatomat_b3', 'label' => 'Punkt listy 3', 'name' => 'kwiatomat_bullet_3', 'type' => 'text' ),
			array( 'key' => 'field_mck_sp_tab_hours', 'label' => 'Sekcja godzin', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_sp_hours_eyebrow', 'label' => 'Mały napis', 'name' => 'hours_eyebrow', 'type' => 'text', 'default_value' => 'Godziny otwarcia' ),
			array( 'key' => 'field_mck_sp_hours_heading', 'label' => 'Nagłówek', 'name' => 'hours_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_sp_tab_cta', 'label' => 'Pasek CTA na dole', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_sp_cta_heading', 'label' => 'Nagłówek', 'name' => 'cta_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_sp_cta_text', 'label' => 'Opis', 'name' => 'cta_text', 'type' => 'textarea', 'rows' => 2 ),
		),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-uslugi.php' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * 6. PORTFOLIO PAGE
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_mck_portfolio_page',
		'title'    => 'Portfolio - treści',
		'fields'   => array(
			array( 'key' => 'field_mck_pp_gallery_heading', 'label' => 'Nagłówek "Pełna galeria"', 'name' => 'gallery_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_pp_gallery_text', 'label' => 'Opis', 'name' => 'gallery_text', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_mck_pp_tab_cta', 'label' => 'Pasek CTA na dole', 'name' => '', 'type' => 'tab' ),
			array( 'key' => 'field_mck_pp_cta_heading', 'label' => 'Nagłówek', 'name' => 'cta_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_pp_cta_text', 'label' => 'Opis', 'name' => 'cta_text', 'type' => 'textarea', 'rows' => 2 ),
		),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-portfolio.php' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * 7. CONTACT PAGE
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_mck_contact_page',
		'title'    => 'Kontakt - treści',
		'fields'   => array(
			array( 'key' => 'field_mck_cp_contact_eyebrow', 'label' => 'Mały napis nad danymi kontaktowymi', 'name' => 'contact_eyebrow', 'type' => 'text', 'default_value' => 'Dane kontaktowe' ),
			array( 'key' => 'field_mck_cp_contact_heading', 'label' => 'Nagłówek nad danymi kontaktowymi', 'name' => 'contact_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_cp_form_eyebrow', 'label' => 'Mały napis nad formularzem', 'name' => 'form_eyebrow', 'type' => 'text', 'default_value' => 'Formularz' ),
			array( 'key' => 'field_mck_cp_form_heading', 'label' => 'Nagłówek nad formularzem', 'name' => 'form_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_cp_map_eyebrow', 'label' => 'Mały napis nad mapą', 'name' => 'map_eyebrow', 'type' => 'text', 'default_value' => 'Jak dojechać' ),
			array( 'key' => 'field_mck_cp_map_heading', 'label' => 'Nagłówek nad mapą', 'name' => 'map_heading', 'type' => 'text' ),
			array( 'key' => 'field_mck_cp_form_endpoint', 'label' => 'Adres wysyłki formularza (FormSubmit)', 'name' => 'form_endpoint', 'type' => 'text', 'default_value' => 'https://formsubmit.co/ajax/kontakt@maszcikwiatek.pl' ),
		),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-kontakt.php' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * 8. PRIVACY POLICY PAGE
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_mck_privacy_page',
		'title'    => 'Polityka prywatności - data aktualizacji',
		'fields'   => array(
			array( 'key' => 'field_mck_privacy_updated', 'label' => 'Data ostatniej aktualizacji', 'name' => 'ostatnia_aktualizacja', 'type' => 'date_picker', 'display_format' => 'd.m.Y', 'return_format' => 'd.m.Y' ),
			array(
				'key' => 'field_mck_privacy_note', 'label' => '', 'name' => '', 'type' => 'message',
				'message' => 'Sama treść polityki (paragrafy) edytujesz w głównym edytorze strony powyżej.',
			),
		),
		'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-polityka-prywatnosci.php' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * 9. SERVICE ITEM (CPT: usluga)
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_mck_usluga',
		'title'    => 'Szczegóły usługi',
		'fields'   => array(
			array( 'key' => 'field_mck_usluga_ikona', 'label' => 'Ikona', 'name' => 'ikona', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'bukiety' ),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'usluga' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * 10. REVIEW ITEM (CPT: opinia)
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_mck_opinia',
		'title'    => 'Szczegóły opinii',
		'fields'   => array(
			array( 'key' => 'field_mck_opinia_gwiazdki', 'label' => 'Liczba gwiazdek', 'name' => 'gwiazdki', 'type' => 'number', 'default_value' => 5, 'min' => 1, 'max' => 5 ),
			array( 'key' => 'field_mck_opinia_zrodlo', 'label' => 'Źródło (np. "Google · 5 opinii")', 'name' => 'zrodlo', 'type' => 'text' ),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'opinia' ) ) ),
	) );

	/* ---------------------------------------------------------------
	 * 11. PORTFOLIO ITEM (CPT: realizacja)
	 * ------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_mck_realizacja',
		'title'    => 'Szczegóły realizacji',
		'fields'   => array(
			array( 'key' => 'field_mck_realizacja_ikona', 'label' => 'Ikona', 'name' => 'ikona', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'kwiat-petla' ),
			array( 'key' => 'field_mck_realizacja_etykieta', 'label' => 'Podpis (np. "Zobacz na Facebooku")', 'name' => 'etykieta', 'type' => 'text' ),
			array( 'key' => 'field_mck_realizacja_link', 'label' => 'Link (Facebook/TikTok/inny, opcjonalnie)', 'name' => 'link_url', 'type' => 'url' ),
			array( 'key' => 'field_mck_realizacja_wideo', 'label' => 'To kafelek wideo (ikona play)', 'name' => 'jest_wideo', 'type' => 'true_false', 'ui' => 1 ),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'realizacja' ) ) ),
	) );
}
