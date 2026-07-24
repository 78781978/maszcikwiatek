<?php
/**
 * "Chrome" text that isn't page content - nav labels that aren't in a
 * WP menu, button labels, the cookie banner, the WCAG panel. These are
 * registered with Polylang so a translator can translate them from
 * Language → Translations → Strings in wp-admin, without touching PHP.
 *
 * If Polylang isn't active, mck_str() just returns the Polish text -
 * the theme still works, it just isn't bilingual yet.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function mck_ui_strings() {
	return array(
		'order_flowers'      => 'Zamów kwiaty',
		'menu_open'          => 'Otwórz menu',
		'menu_close'         => 'Zamknij menu',
		'call_us_aria'       => 'Zadzwoń',
		'call_now_aria'      => 'Zadzwoń teraz',
		'lang_switch_aria'   => 'Język strony',

		'cookie_text'        => 'Używamy plików cookie, aby zapewnić najlepsze działanie strony oraz do celów statystycznych. Możesz zaakceptować wszystkie pliki cookie lub odrzucić te niekonieczne. Więcej informacji znajdziesz w polityce cookies.',
		'cookie_accept'      => 'Akceptuję wszystkie',
		'cookie_reject'      => 'Tylko niezbędne',
		'cookie_settings'    => 'Dostosuj',
		'cookie_reopen'      => 'Ustawienia cookies',
		'cookie_modal_title' => 'Ustawienia prywatności',
		'cookie_modal_text'  => 'Wybierz, na jakie pliki cookie się zgadzasz. Niezbędne pliki są zawsze aktywne, ponieważ zapewniają podstawowe działanie strony.',
		'cookie_necessary'   => 'Niezbędne',
		'cookie_necessary_d' => 'Wymagane do działania strony (np. zapamiętanie Twojego wyboru).',
		'cookie_analytics'   => 'Statystyczne',
		'cookie_analytics_d' => 'Pomagają nam analizować ruch na stronie.',
		'cookie_marketing'   => 'Marketingowe',
		'cookie_marketing_d' => 'Pozwalają wyświetlać spersonalizowane treści i reklamy.',
		'cookie_save'        => 'Zapisz wybór',
		'cookie_accept_all'  => 'Zaakceptuj wszystkie',
		'cookie_close_aria'  => 'Zamknij okno ustawień cookies',

		'a11y_aria'          => 'Opcje dostępności (WCAG)',
		'a11y_title'         => 'Dostępność (WCAG)',
		'a11y_font_size'     => 'Rozmiar czcionki',
		'a11y_font_dec'      => 'Zmniejsz czcionkę',
		'a11y_font_inc'      => 'Zwiększ czcionkę',
		'a11y_contrast'      => 'Wysoki kontrast',
		'a11y_underline'     => 'Podkreśl linki',
		'a11y_readable'      => 'Czytelna czcionka',
		'a11y_reset'         => 'Przywróć domyślne',

		'read_more_reviews'  => 'Zobacz więcej opinii w Google',
		'contact_form_link'  => 'Formularz kontaktowy',
		'directions'         => 'Wyznacz trasę w Google Maps',
		'rights_reserved'    => 'Wszelkie prawa zastrzeżone.',
		'nav_heading'        => 'Nawigacja',
		'info_heading'       => 'Informacje',
		'contact_heading'    => 'Kontakt',
		'privacy_policy'     => 'Polityka prywatności',
		'cookie_policy'      => 'Polityka cookies',
		'getting_here'       => 'Jak dojechać',
	);
}

function mck_register_strings() {
	if ( ! function_exists( 'pll_register_string' ) ) {
		return;
	}
	foreach ( mck_ui_strings() as $key => $value ) {
		pll_register_string( $key, $value, 'Masz Ci Kwiatek - elementy stałe', false );
	}
}
add_action( 'init', 'mck_register_strings', 5 );

/**
 * Echo/return a UI string, translated by Polylang if active.
 */
function mck_str( $key ) {
	$strings = mck_ui_strings();
	$value   = isset( $strings[ $key ] ) ? $strings[ $key ] : $key;

	if ( function_exists( 'pll__' ) ) {
		return pll__( $value );
	}
	return $value;
}

function mck_e( $key ) {
	echo esc_html( mck_str( $key ) );
}
