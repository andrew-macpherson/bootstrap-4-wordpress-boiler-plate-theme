<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">

			
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php
						the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					?>
				</header>

				<?php if (get_the_post_thumbnail() != '') : ?>
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					</div>
				<?php endif; ?>

				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div>

				<a href="<?php echo get_permalink(); ?>" class="btn btn-primary">Read More</a>


			</article>

			<?php endwhile; ?>
			<?php endif; ?>
			
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>