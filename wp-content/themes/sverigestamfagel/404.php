<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package stf
 */

get_header(); ?> 

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Ojdå, Har du flugit vilse?', 'stf' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'Det verkar som att ingenting hittades på denna plats. Kanske prova göra en sökning eller använda länkarna i menyn?', 'stf' ); ?></p>
					<Img src='<?= get_stylesheet_directory() . "/dist/img/birb.jpg" ?>' />
					<?php 
						get_search_form();
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
