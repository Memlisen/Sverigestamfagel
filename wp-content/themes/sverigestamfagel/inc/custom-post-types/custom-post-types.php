<?php
function custom_post_type() {

	require 'articles.php';
	require 'meets.php';

}
add_action( 'init', 'custom_post_type', 0 );
