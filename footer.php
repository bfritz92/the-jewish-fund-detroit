<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		
		<div class="site-info">
			<?php $blog_info = get_bloginfo( 'name' ); ?>
			<?php if ( ! empty( $blog_info ) ) : ?>
				<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="wp-content/uploads/2020/07/jewish-fund-logo-white.svg"></a>
			<?php endif; ?>
			<address>
			<p class="white mt0 mb0">6735 Telegraph Road, </p>
			<p class="white mt0 mb0">Bloomfield Hills, MI 48301</p>
			<p class="white mt0 mb0">phone <a href="tel:+2488332434">(248) 833-2434</a></p>
			</address>
			
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentynineteen' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu',
							'depth'          => 1,
						)
					);
					?>
				</nav><!-- .footer-navigation -->
			<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
        <script src="/wp-content/themes/twentynineteen/js/tabby.min.js"></script>

        <script>
	var tabs = new Tabby('[data-tabs]');
</script>
<script >
	//menu functions
	//grabbing constants
	const menuToggle = document.querySelectorAll('.menu-toggle');
	const hasSubMenu = document.querySelectorAll('.menu-item-has-children');
	const navList = document.querySelectorAll('#navList');
	
	function handleMenuClick(event) {
		const button = event.target;
		navList[0].classList.toggle('show');
	};
	menuToggle[0].addEventListener('click', handleMenuClick);

  	const dropDown = document.querySelectorAll('.menu-item-has-children');
  	for(i=0;i<dropDown.length;i++)
	dropDown[i].onclick=doSomething;

	function doSomething() {
 	const current = event.currentTarget;
 	current.querySelector("ul").classList.toggle("show");

	}

</script>

</body>
</html>
