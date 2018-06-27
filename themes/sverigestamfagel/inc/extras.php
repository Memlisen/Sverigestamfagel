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

// Register Google API
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyCas882K6W9VfSaxZZ_m4JwfwIajyqWtlY');
}

add_action('acf/init', 'my_acf_init');

// Custom excerpt length
function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;

	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

function custom_post_type_archive( $query ) {

	$post_types = 
	get_post_types( array(
		'public' => true
	) );
	unset($post_types['attachment'], $post_types['page']);

	if( $query->is_main_query()  && is_home() ) {
		$query->set( 'post_type', $post_types );
	}
	else {
		if( !$query->is_main_query() ) {
			return;
		}
		elseif( is_category() ) {
			$query->set( 'post_type', $post_types );
		}
		elseif( is_date() ) {

			// Prevent default date filtering
			unset($query->query_vars['year']);
			unset($query->query_vars['monthnum']);
			unset($query->query_vars['day']);

			// Query date posts
			if( !empty($query->query['monthnum']) && !empty($query->query['day']) ) {
				$queryDate = date( 'Ymd', mktime(0, 0, 0, $query->query['monthnum'], $query->query['day'], $query->query['year']) );

				$query->set( 'meta_query', array(
					array(
						'key' => 'date',
						'value' => $queryDate,
						'compare' => '=',
						'type' => 'DATE'
					)
				) );
			}
			else {

				// Query month posts
				if( !empty($query->query['monthnum']) ) {
					$queryDate = mktime(0, 0, 0, $query->query['monthnum']+1, 0, $query->query['year']);
					
					$start_date = date('Y'.$query->query['monthnum'].'01'); // First day of the month
					$end_date = date('Y'.$query->query['monthnum'].'t'); // 't' gets the last day of the month
				}
				else {
					$queryDate = mktime(0, 0, 0, 0, 0, $query->query['year']);
					
					$start_date = date($query->query['year'].'0101'); // First day of the month
					$end_date = date($query->query['year'].'12t'); // 't' gets the last day of the month
				}

				$query->set( 'meta_query', array(
					array(
						'key'       => 'date',
						'value'     => array($start_date, $end_date),
						'compare'   => 'BETWEEN',
						'type'      => 'DATE'
					)
				) );
			}
			
			$query->set( 'posts_per_page', 5 );
			$query->set( 'post_type', $post_types );

			// echo '<pre>' . print_r($query, true) . '</pre>';
		}
	}
}
add_action( 'pre_get_posts', 'custom_post_type_archive' );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');