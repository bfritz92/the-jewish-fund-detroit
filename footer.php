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

<!-- Menu subnavs -->       
<script>
	const toggle = document.querySelector(".menu-toggle");
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
  if (this.classList.contains("show")) {
    this.classList.remove("show");
  } else if (menu.querySelector(".show")) {
    menu.querySelector(".show").classList.remove("show");
    this.classList.add("show");
  } else {
    this.classList.add("show");
  }
  if (document.documentElement.clientWidth < 960) {
  for (let item of items) {
      if (item.querySelector(".sub-menu")) {
        item.addEventListener("click", toggleItem, false);
    	}     
  	}
	}
}

/* Close Submenu From Anywhere */
function closeSubmenu(e) {
  let isClickInside = menu.contains(e.target);

  if (!isClickInside && menu.querySelector(".show")) {
    menu.querySelector(".show").classList.remove("show");
  }
}
/* Event Listeners */
toggle.addEventListener("click", toggleMenu, false);
for (let item of items) {
  if (item.querySelector(".sub-menu")) {
    item.addEventListener("click", toggleItem, false);
  }
  item.addEventListener("keypress", toggleItem, false);
}
document.addEventListener("click", closeSubmenu, false);

</script>

<!-- Sticky Nav -->
<!-- <script>
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
</script> -->


<script>
window.addEventListener("load", () => {
 // Retrieve all help sections
 const sections = Array.from(document.querySelectorAll(".sticky-nav--item"));

 // Once a scrolling event is detected, iterate all elements
 // whose visibility changed and highlight their navigation entry
 const scrollHandler = entries =>
  entries.forEach(entry => {
   const section = entry.target;
   const sectionId = section.id;
   const sectionLink = document.querySelector(`a[href="#${sectionId}"]`);

   if (entry.intersectionRatio > 0) {
    section.classList.add("active");
    sectionLink.parentElement.classList.add("active");
	let ratio = entry.intersectionRatio;
	sectionLink.parentElement.style.opacity = ratio;
   } else {
    section.classList.remove("active");
    sectionLink.parentElement.classList.remove("active");
   }
  });

 // Creates a new scroll observer
 const observer = new IntersectionObserver(scrollHandler);

 //noinspection JSCheckFunctionSignatures
 sections.forEach(section => observer.observe(section));
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
