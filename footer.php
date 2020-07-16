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
				<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>,
			<?php endif; ?>
	
			<?php
			if ( function_exists( 'the_privacy_policy_link' ) ) {
				the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			}
			?>
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

<script >
	//grabbing constants
	const menuToggle = document.querySelectorAll('.menu-toggle');
	console.log('grabbed the menu toggle');
	const hasSubMenu = document.querySelectorAll('.menu-item-has-children');
	console.log('grabbed the submenus');
	const navList = document.querySelectorAll('#navList');
	
	function handleMenuClick(event) {
		console.log('clicked!');
		const button = event.target;
		//this part! pay attention, Git!
		navList[0].classList.toggle('show');
	};
	menuToggle[0].addEventListener('click', handleMenuClick);

	hasSubMenu.forEach(item => {
  		item.addEventListener('click', event => {
			console.log('clicked it');
			
			const subMenu = hasSubMenu.querySelectorAll('.sub-menu')[0];
			subMenu.classList.toggle('show');
  		})
	})

</script>

</script>
</body>
</html>
