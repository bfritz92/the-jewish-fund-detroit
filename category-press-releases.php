<?php
/**
 * Template Name: Press Release Category Page
 * Template Post Type: Press Release
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! twentynineteen_can_show_post_thumbnail() ) : ?>
	<header class="entry-header show limit-900">
		<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
	</header>
	<?php endif; ?>

	<div class="entry-content limit-900">
		<?php the_title( '<h1 class="entry-title pt2 dark-blue">', '</h1>' ); ?>
		
		<?php
			$args = array(
				'category_name'  	=> 'Press Release', 
				'orderby'			=> 'post_date',
				'order'				=> 'ASC',
				/*
				'order'			=> 'ASC',
				'orderby'		=> 'episode_number',*/									
				'posts_per_page'=> 15,
			);		
			$main_posts = new WP_Query( $args );
			$count = 0;
			if( $main_posts->have_posts() ):
				while( $main_posts->have_posts() ) : $main_posts->the_post(); ?>
					<article class="press-release--item">
						<a class="press-release--title" href="<?php the_permalink(); ?>" ><h3 class="dark-blue"><?php the_title(); ?></h3></a>
						<p class="press-release--excerpt mt1"><?php the_excerpt(); ?></p>
					</article>
				<?php endwhile; ?>			
			<?php endif;  ?>
		<?php wp_reset_query();?>	
			</div>

		<?php // if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author', 'bio' ); ?>
	<?php // endif; ?>

	<footer class="entry-footer">
		<?php twentynineteen_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	

</article><!-- #post-<?php the_ID(); ?> -->
