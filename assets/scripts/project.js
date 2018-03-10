import './modules/polyfills';
import Logo from './modules/logo';
import Tabs from './modules/tabs';

/**
 * Logo
 * Initialize logo animations
 */
const desktopLogo = new Logo(
  'logo-desktop',
  -1100,
  -185,
  10,
  '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg',
  'project',
);

const mobileLogo = new Logo(
  'logo-mobile',
  -1425,
  -240,
  0,
  '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg',
  'project',
);

/**
 * Menu bar and tabs
 * Initialize the menu bar tabs and positioning
 */
const menuBar = document.querySelector('.project-details-menu');
const menuBarWrapper = document.querySelector('.project-details-menu-wrapper');
let menuBarHeight = 0;
let menuBarOffsetTop = 0;
let windowScrollY = 0;

// Initialize menu bar tabs
const menuBarTabs = new Tabs(); // eslint-disable-line no-unused-vars

// Set menu bar wrapper height to the menu bar computed height to avoid a scroll jump
function setMenuBarWrapperHeight() {
  menuBarHeight = window.getComputedStyle(menuBar).getPropertyValue('height');
  menuBarWrapper.style.height = menuBarHeight;
}

// Get the menu bar top offset
function setMenuBarOffsetTop() {
  menuBarOffsetTop = menuBar.offsetTop;
}

// Set the menu bar position to fixed if use has scrolled past the menu bar
function menuBarFixPosition() {
  if (menuBarOffsetTop < windowScrollY) {
    menuBar.classList.add('fixed');
  } else {
    menuBar.classList.remove('fixed');
  }
}

// Set initial menu bar height and offset values
setMenuBarWrapperHeight();
setMenuBarOffsetTop();

/**
 * Project details
 * Enable project details button and project details section visibility
 */
const projectDetails = document.querySelector('.project-more-info');
const projectDetailsButton = document.querySelector('.project-more-button');
let projectDetailsVisible = false;

// Show project details
function showProjectDetailsButton() {
  projectDetails.classList.add('visible');
  projectDetailsButton.classList.add('active');
}

// Hide project details
function hideProjectDetailsButton() {
  projectDetails.classList.remove('visible');
  projectDetailsButton.classList.remove('active');
}

// Enable project details button
if (projectDetailsButton) {
  projectDetailsButton.addEventListener(
    'click',
    (e) => {
      e.preventDefault();

      if (projectDetailsVisible === false) {
        showProjectDetailsButton();
        projectDetailsVisible = true;
      } else {
        hideProjectDetailsButton();
        projectDetailsVisible = false;
      }

      setMenuBarOffsetTop();
    },
    false,
  );
}

/**
 * Window scroll
 * Set fixed menu bar position when window is scrolled
 */
function onScroll() {
  windowScrollY = window.pageYOffset;
  requestAnimationFrame(menuBarFixPosition);
}
window.addEventListener('scroll', onScroll, false);

/**
 * Window resize
 * Set fixed menu bar position when window is resized
 */
function resizeUpdate() {
  onScroll();
}
window.onresize = resizeUpdate;
