<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package sverigestamfagelforening
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sverigestamfagelforening_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'sverigestamfagelforening_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function sverigestamfagelforening_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'sverigestamfagelforening_pingback_header' );

// Custom admin CSS
add_action('admin_head', 'stf_custom_fonts');

function stf_custom_fonts() {
	echo '
	<style>
		body {
			font-family: "Averia Sans Libre";
			font-size: 12px;
		}
		.menu-icon-meets img {
			opacity: 1 !important;
		}
	</style>';
}

// Register Google API
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyCas882K6W9VfSaxZZ_m4JwfwIajyqWtlY');
}

add_action('acf/init', 'my_acf_init');

// Custom excerpt length
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );