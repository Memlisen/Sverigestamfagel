<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package stf
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php 	if( have_rows('headline') ):
						while ( have_rows('headline') ) : the_row(); ?>
					<h2><?php the_field(); ?></h2>

					<?php endwhile; endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
