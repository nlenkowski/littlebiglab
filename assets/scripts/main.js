/**
 * Main scripts
 */

const Main = (function() {

    // Picture element HTML5 shiv
    document.createElement('picture');

    // Initialize desktop and mobile logo animations
    let logoDesktop = new Logo('logo-desktop', -1100, -185, 3500, './wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg');

    let logoMobile = new Logo('logo-mobile', -1425, -240, 3500, './wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg');

    // Public
    return {
        logoDesktop: logoDesktop,
        logoMobile: logoMobile
    }

})();
