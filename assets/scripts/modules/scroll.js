/**
 * Scroll event handler
 */

let lastScrollY = 0;
let ticking = false;

// Scroll event callback - stores last known scroll position
function onScroll() {
  lastScrollY = window.pageYOffset;
  requestTick();
}

// Calls rAF if it's not already been done already
function requestTick() {
  if (!ticking) {
    requestAnimationFrame(scrollUpdate);
    ticking = true;
  }
}

// Scroll updates
function scrollUpdate() {

  // Fix position of project menu
  projectMenuFixPos();

  // Allow other rAFs to be called
  ticking = false;
}

// Add scroll event listener
window.addEventListener('scroll', onScroll, false);
