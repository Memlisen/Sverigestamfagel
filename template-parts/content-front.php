<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sverigestamfagelforening
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sverigestamfagelforening' ),
				'after'  => '</div>',
			) ); ?>

			<div class="top-info">
				<div class="stf-slider">
					<ul>

						<?php
						if( have_rows('slider') ):
							while ( have_rows('slider') ) : the_row(); ?>

								<div class="slide">
									<img src="<?php the_sub_field('bild'); ?>" alt="Parrot image">
									<div>

										<?php 
										if( get_sub_field('headline') ) : ?>

											<h4><?php the_sub_field('headline'); ?></h4>

										<?php
										endif;

										if( get_sub_field('text') ) : ?>

											<p><?php the_sub_field('text'); ?></p>

										<?php
										endif;

										if( get_sub_field('button') ) : ?>

											<a href="<?php if( get_sub_field('link') ) : the_sub_field('link'); else: echo '#'; endif; ?>"><?php the_sub_field('button'); ?></a>

										<?php
										endif; ?>

									</div>
								</div>

							<?php
							endwhile;
						else : ?>

							<img src="<?php echo get_stylesheet_directory_uri() . '/dist/img/parrot.png'?>" alt="Parrot image">

						<?php
						endif; ?>

					</ul>
					<button class="previous"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
					<button class="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
				</div>
				<div class="container">
					<?php
					$top_info = get_field('top_info'); ?>

					<div>
						<h2><?php if( $top_info ) : echo $top_info['top']['headline']; endif; ?></h2>
						<p><?php if( $top_info ) : echo $top_info['top']['text']; endif; ?></p>
					</div>
					<div>
						<h2><?php if( $top_info ) : echo $top_info['bottom']['headline']; endif; ?></h2>
						<p><?php if( $top_info ) : echo $top_info['bottom']['text']; endif; ?></p>
					</div>
				</div>
			</div>
			<div class="page-content">
			<h1><span class="fa fa-calendar"></span> Aktuellt</h1>

				<div class="main-post">
					<a href="#">
						<img class="main-post-img" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/image.png' ?>" alt="">
						<div class="main-post-text">
							<span class="publiced-date">November 19, 2017   </span>
							<span class="category">FÅGELTRÄFFAR </span>	
								<h4>Nya styrelsen</h4>
								<p>
									Lo-fi cray kinfolk readymade pug quinoa actually small batch narwhal celiac slow-carb vexillologist.
									Hell of etsy hashtag kale chips sriracha occupy jianbing vape...
								</p>							
						</div>
					</a>
				</div>
				<div class="basic-post">
					<a href="#">
							<img class="post-img" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/image.png' ?>" alt="">
							<div class="post-text">
								<span class="publiced-date">November 19, 2017   </span>
								<span class="category">FÅGELTRÄFFAR </span>	
									<div class="post-content">
									<h4>Nya styrelsen</h4>
									<p>
										Lo-fi cray kinfolk readymade pug quinoa actually small batch narwhal celiac slow-carb vexillologist.
										Hell of etsy hashtag kale chips sriracha occupy jianbing vape...
									</p>	
									</div>						
							</div>
					</a>
				</div>
				<div class="basic-post">
					<a href="#">
							<img class="post-img" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/image.png' ?>" alt="">
							<div class="post-text">
								<span class="publiced-date">November 19, 2017   </span>
								<span class="category">FÅGELTRÄFFAR </span>	
									<div class="post-content">
									<h4>Nya styrelsen</h4>
									<p>
										Lo-fi cray kinfolk readymade pug quinoa actually small batch narwhal celiac slow-carb vexillologist.
										Hell of etsy hashtag kale chips sriracha occupy jianbing vape...
									</p>	
									</div>						
							</div>
					</a>
				</div>
				<button class="more-post">Visa fler</button>
				<div class="instagram-feed">

					<?php
					$instaResult = file_get_contents('https://www.instagram.com/sverigestamfagelforening/?__a=1');
					$insta = json_decode($instaResult, true);
					$media = $insta['user']['media']['nodes'];

					foreach( $media as $image ) : ?>
						<img src="<?php echo $image['thumbnail_src']; ?>" alt="">
					<?php
					endforeach; ?>

				</div>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<span>Senast ändrad <?php the_modified_date(); ?></span>

			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Redigera %s', 'sverigestamfagelforening' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			); ?>

		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->