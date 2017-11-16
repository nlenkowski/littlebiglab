import snapsvg from "snapsvg-cjs";
import svgxuse from "svgxuse";
import Logo from "./modules/logo";
import Tabs from "./modules/tabs"

// Initialize logo animation
const logoDesktop = new Logo('logo-desktop', -1100, -185, 10, '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg', 'project');
const logoMobile = new Logo('logo-mobile', -1425, -240, 0, '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg', 'project');

//
// Window scroll handling
//

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

//
// Window resize handling
//

function resizeUpdate() {
  setProjectMenuOffset();
  setProjectMenuHeight();
}
window.onresize = resizeUpdate;

/**
 * Project page scripts
 */

let projectTabs = null,
  projectMenu = null,
  projectMenuOffset = null,
  projectMenuHeight = null,
  projectMenuWrapper = null,
  projectMoreInfo = null,
  projectMoreButton = null,
  moreInfoVisible = null;

// Initialize menu tabs
projectTabs = new Tabs();

// Initialize menu height and offset
projectMenu = document.querySelector('.project-details-menu');
projectMenuWrapper = document.querySelector('.project-details-menu-wrapper');
setProjectMenuHeight();
setProjectMenuOffset();

// Initialize project more info button
projectMoreButton = document.querySelector('.project-more-button');
projectMoreInfo = document.querySelector('.project-more-info');
moreInfoVisible = false;

if (projectMoreButton) {

  projectMoreButton.addEventListener('click', function (e) {
    e.preventDefault();

    if (moreInfoVisible === false) {
      showMoreInfo();
      moreInfoVisible = true;
    } else {
      hideMoreInfo();
      moreInfoVisible = false;
    }

    // Update project menu top offset
    setProjectMenuOffset();

  }, false);
}

// Show more project info content
function showMoreInfo() {
  projectMoreInfo.classList.add('visible');
  projectMoreButton.classList.add('active');
}

// Hide more project info content
function hideMoreInfo() {
  projectMoreInfo.classList.remove('visible');
  projectMoreButton.classList.remove('active');
}

// Set the project menu top offset
function setProjectMenuOffset() {
  projectMenuOffset = projectMenu.offsetTop;
}

// Set menu wrapper height to match computed menu height
// This avoids the scroll jump when the menu position is set to fixed
function setProjectMenuHeight() {
  let projectMenuHeight = window.getComputedStyle(projectMenu).getPropertyValue('height');
  projectMenuWrapper.style.height = projectMenuHeight;
}

// Fix position of project menu
function projectMenuFixPos() {
  if (projectMenuOffset < lastScrollY) {
    projectMenu.classList.add('fixed');
  } else {
    projectMenu.classList.remove('fixed');
  }
}
