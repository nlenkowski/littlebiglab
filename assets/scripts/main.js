/**
 * Main scripts
 */

const Main = (function() {

    // Picture element HTML5 shiv
    document.createElement('picture');

    // Initialize logo animation
    let logo = new Logo(-1100, -185, 3500, './wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg');

    // Expose public methods
    return {
        logo: logo
    }

})();
