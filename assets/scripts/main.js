/**
 * Main scripts
 */

const Main = (function() {

    // Picture element HTML5 shiv for legacy browsers
    document.createElement('picture');

    // Page detection
    let isHome    = function() { if ( document.querySelector('.home') ) return true; };
    let isProject = function() { if (document.querySelector('.single-project') ) return true };

    // Initialize logo animations
    let logoDesktop;
    let logoMobile;

    if ( isHome() ) {
        logoDesktop = new Logo('logo-desktop', -1100, -185, 3500, '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg', 'home');
        logoMobile = new Logo('logo-mobile', -1425, -240, 3500, '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg', 'home');
    } else {
        logoDesktop = new Logo('logo-desktop', -1100, -185, 10, '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg', 'project');
        logoMobile = new Logo('logo-mobile', -1425, -240, 0, '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg', 'project');
    }

    /**
     * Scroll handling
     */

    let lastScrollY = 0
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

    // Scroll position DOM updates
    function scrollUpdate() {

        // Set project menu position
        if ( isProject() ) {
            projectMenuFixPos();
        }

        // Allow other rAFs to be called
        ticking = false;
    }

    // Add scroll event listener
    window.addEventListener('scroll', onScroll, false);

    /**
     * Windows resize handling
     */

    function resizeUpdate() {

        if ( isProject() ) {
            setProjectMenuOffset();
            setProjectMenuHeight();
        }
    }
    window.onresize = resizeUpdate;

    /**
     * Project page scripts
     */

    let projectTabs        = null,
        projectMenu        = null,
        projectMenuOffset  = null,
        projectMenuHeight  = null,
        projectMenuWrapper = null,
        projectMoreInfo    = null,
        projectMoreButton  = null,
        moreInfoVisible    = null;

    if ( isProject() ) {

        // Initialize menu tabs
        projectTabs = new Tabs();

        // Initialize menu height and offset
        projectMenu = document.querySelector('.project-details-menu');
        projectMenuWrapper = document.querySelector('.project-details-menu-wrapper');
        setProjectMenuHeight();
        setProjectMenuOffset();

        // Initialize project more info button
        projectMoreButton = document.querySelector('.project-button');
        projectMoreInfo   = document.querySelector('.project-more-info');
        moreInfoVisible   = false;

        projectMoreButton.addEventListener('click', function(e) {
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

    // Public
    return {
        lastScrollY: lastScrollY
    }

})();
