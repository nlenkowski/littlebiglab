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

    // Public
    return {
        logoDesktop: logoDesktop,
        logoMobile: logoMobile
    }

})();
