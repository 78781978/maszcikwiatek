<?php
/**
 * Custom post types for the content that editors add to over time:
 * services, reviews and portfolio items. Each behaves like writing a
 * normal post - title + content + a couple of extra fields - so no
 * developer is needed to add a new one later.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function mck_register_post_types() {

	register_post_type( 'usluga', array(
		'labels' => array(
			'name'               => __( 'Usługi', 'mck' ),
			'singular_name'      => __( 'Usługa', 'mck' ),
			'add_new_item'       => __( 'Dodaj usługę', 'mck' ),
			'edit_item'          => __( 'Edytuj usługę', 'mck' ),
			'all_items'          => __( 'Wszystkie usługi', 'mck' ),
		),
		'public'             => true,
		'has_archive'        => false,
		'rewrite'            => array( 'slug' => 'uslugi-wpis' ),
		'menu_icon'          => 'dashicons-art',
		'supports'           => array( 'title', 'editor', 'page-attributes' ),
		'show_in_rest'       => true,
	) );

	register_post_type( 'opinia', array(
		'labels' => array(
			'name'               => __( 'Opinie', 'mck' ),
			'singular_name'      => __( 'Opinia', 'mck' ),
			'add_new_item'       => __( 'Dodaj opinię', 'mck' ),
			'edit_item'          => __( 'Edytuj opinię', 'mck' ),
			'all_items'          => __( 'Wszystkie opinie', 'mck' ),
		),
		'public'             => true,
		'has_archive'        => false,
		'rewrite'            => array( 'slug' => 'opinia' ),
		'menu_icon'          => 'dashicons-testimonial',
		'supports'           => array( 'title', 'editor', 'page-attributes' ),
		'show_in_rest'       => true,
	) );

	register_post_type( 'realizacja', array(
		'labels' => array(
			'name'               => __( 'Portfolio', 'mck' ),
			'singular_name'      => __( 'Realizacja', 'mck' ),
			'add_new_item'       => __( 'Dodaj realizację', 'mck' ),
			'edit_item'          => __( 'Edytuj realizację', 'mck' ),
			'all_items'          => __( 'Wszystkie realizacje', 'mck' ),
		),
		'public'             => true,
		'has_archive'        => false,
		'rewrite'            => array( 'slug' => 'realizacja' ),
		'menu_icon'          => 'dashicons-format-gallery',
		'supports'           => array( 'title', 'thumbnail', 'page-attributes' ),
		'show_in_rest'       => true,
	) );
}
add_action( 'init', 'mck_register_post_types' );
