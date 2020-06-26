<?php
/*
 * Template Name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<!-- SPLASH -->
<section id="splash" class="splash">
    <div class="splash--partners">
        
        <img src="<?php echo wp_get_attachment_image_url( 130, 'large' ) ?>">
    </div>
    <div class="splash--seekers">

        <img src="<?php echo wp_get_attachment_image_url( 131, 'large' ) ?>">
    </div>
    
    <div class="splash--links">
        <h1 class="splash--title">Improving health and well being for our community</h1>
        <div>
            <a class="left white-link" href="#">Grant Seekers</a>
            <a class="right white-link" href="#">Grant Partners</a>
        </div>
        
    </div>
</section>


<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content' );
			}

			// Previous/next page navigation.
			twentynineteen_the_posts_navigation();

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->






<?php
get_footer();