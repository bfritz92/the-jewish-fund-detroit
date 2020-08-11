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
				<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="../wp-content/uploads/2020/07/jewish-fund-logo-white.svg"></a>
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

<!-- Menu subnavs -->       
<!-- <script >
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

</script> -->
<script>
	const toggle = document.querySelector(".site-header");
const menu = document.querySelector(".nav-list");
const items = document.querySelectorAll(".menu-item");

/* Toggle mobile menu */
function toggleMenu() {
  if (menu.classList.contains("show")) {
    menu.classList.remove("show");
    toggle.querySelector("a").innerHTML = "<i class='fas fa-bars'></i>";
  } else {
    menu.classList.add("show");
    toggle.querySelector("a").innerHTML = "<i class='fas fa-times'></i>";
  }
}

/* Activate Submenu */
function toggleItem() {
  if (this.classList.contains("submenu-active")) {
    this.classList.remove("submenu-active");
  } else if (menu.querySelector(".submenu-active")) {
    menu.querySelector(".submenu-active").classList.remove("submenu-active");
    this.classList.add("submenu-active");
  } else {
    this.classList.add("submenu-active");
  }
}

/* Close Submenu From Anywhere */
function closeSubmenu(e) {
  let isClickInside = menu.contains(e.target);

  if (!isClickInside && menu.querySelector(".submenu-active")) {
    menu.querySelector(".submenu-active").classList.remove("submenu-active");
  }
}
/* Event Listeners */
toggle.addEventListener("click", toggleMenu, false);
for (let item of items) {
  if (item.querySelector(".submenu")) {
    item.addEventListener("click", toggleItem, false);
  }
  item.addEventListener("keypress", toggleItem, false);
}
document.addEventListener("click", closeSubmenu, false);

</script>

<!-- Sticky Nav -->
<script>
	let mainNavLinks = document.querySelectorAll("ul.sticky-nav--nav li a");
	let mainSections = document.querySelectorAll(".sticky-nav--item");
	console.log("got the vars");
let lastId;
let cur = [];

window.addEventListener("scroll", event => {
  let fromTop = window.scrollY;

  mainNavLinks.forEach(link => {
    let section = document.querySelector(link.hash);

    if (
      section.offsetTop <= fromTop &&
      section.offsetTop + section.offsetHeight > fromTop
    ) {
	  link.classList.add("active");
	  console.log("added the class!");
    } else {
	  link.classList.remove("active");
	  console.log("removed the class!");
    }
  });
});
</script>

<!-- Fade-in script -->
<script>

const faders = document.querySelectorAll(".fade-in");
const sliders = document.querySelectorAll(".slide-in");


const appearOptions = {
  threshold: 0,
  rootMargin: "0px 0px -250px 0px"
};

const appearOnScroll = new IntersectionObserver(function(
  entries,
  appearOnScroll
) {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      return;
    } else {
      entry.target.classList.add("appear");
      appearOnScroll.unobserve(entry.target);
    }
  });
},
appearOptions);

faders.forEach(fader => {
  appearOnScroll.observe(fader);
});

sliders.forEach(slider => {
  appearOnScroll.observe(slider);
});
</script>
</body>
</html>
