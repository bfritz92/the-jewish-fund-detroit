<!-- Menu subnavs -->       
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



/* Sticky Nav */

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

   if (entry.intersectionRatio > 0.003) {
    section.classList.add("active");
    sectionLink.parentElement.classList.add("active");
    console.log(entry.intersectionRatio);
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


/* Fade-in script */

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

/* Navbar Scroll-hide */


$(document).ready(function () {
  
  'use strict';
  
   var c, currentScrollTop = 0,
       navbar = $('#masthead');

   $(window).scroll(function () {
      var a = $(window).scrollTop();
      var b = navbar.height();
     
      currentScrollTop = a;
     
      if (c < currentScrollTop && a > b + b) {
        navbar.addClass("scrollyhide");
      } else if (c > currentScrollTop && !(a <= b)) {
        navbar.removeClass("scrollyhide");
      }
      c = currentScrollTop;
  });
  
});

