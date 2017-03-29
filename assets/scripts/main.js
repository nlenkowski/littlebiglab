/**
 * Main scripts
 */

const Main = (function(){

    // Picture element HTML5 shiv
    document.createElement('picture');

    // Initialize logo animations
    let logoDesktop;
    let logoMobile;

    if ( document.querySelector('.home') ) {
        logoDesktop = new Logo('logo-desktop', -1100, -185, 3500, '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg', 'home');
        logoMobile = new Logo('logo-mobile', -1425, -240, 3500, '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg', 'home');
    } else {
        logoDesktop = new Logo('logo-desktop', -1100, -185, 10, '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg', 'project');
        logoMobile = new Logo('logo-mobile', -1425, -240, 0, '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg', 'project');
    }

    // Initialize project navigation
    if ( document.querySelector('.single-project') ) {
        let projectTabs = new Tabs();
    }

    /**
     * Scroll event handling
     */

    let lastScrollY = 0,
        ticking = false;

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

    // Listen for scroll events
    window.addEventListener('scroll', onScroll, false);

    // Scroll position DOM updates
    function scrollUpdate() {

        // Updates
        projectMenuFixPos();

        // Allow other rAFs to be called
        ticking = false;
    }

    /**
     * Fix position of project menu
     */

    // Cache DOM
    let projectMenu        = document.querySelector(".project-details-menu");
    let projectMenuOffset  = projectMenu.offsetTop;
    let projectMenuWrapper = document.querySelector('.project-details-menu-wrapper');

    // Set menu wrapper height to match computed menu height
    // This avoids the scroll jump when the menu position is set to fixed
    let projectMenuHeight = window.getComputedStyle(projectMenu).getPropertyValue('height');
    projectMenuWrapper.style.height = projectMenuHeight;

    // Set menu to fixed position when user scrolls
    function projectMenuFixPos() {

        if (projectMenuOffset < lastScrollY) {
            projectMenu.classList.add('fixed');
        } else {
            projectMenu.classList.remove('fixed');
        }
    }

    // Public
    return {
        logoDesktop: logoDesktop,
        logoMobile: logoMobile
    }

})();
