/**
 * Logo
 * - Animate SVG pattern image with Snap.svg
 * - Toggle full bleed background image visibility
 */
class Logo {

    /**
     * // Initialize logo
     * @param {number} xPos - Destination x position
     * @param {number} yPos - Destination y position
     * @param {number} duration - Animation duration
     * @param {string} imageSrc - Full path to background image
     */
    constructor(xPos, yPos, duration, imageSrc) {
        this.xPos     = xPos;
        this.yPos     = yPos;
        this.duration = duration;
        this.imageSrc = imageSrc;

        // Init
        this.cacheDom();
        this.bindEvents();
        this.animateLogo();
    }

    /**
     * Cache DOM elements and initialize pattern image Snap object
     */
    cacheDom() {
        this.logo                 = document.querySelector('#logo');
        this.backgroundImage      = document.querySelector('#logo-background-image');
        this.patternImage         = Snap.select('#logo-pattern-image');
        this.patternImageInitXPos = this.patternImage.attr('x');
        this.patternImageInitYPos = this.patternImage.attr('y');
    }

    /**
     * Bind event listeners for logo and background image
     */
    bindEvents() {
        this.logo.addEventListener('click', e => this.showBackgroundImage(e));
        this.backgroundImage.addEventListener('click', e => this.hideBackgroundImage(e));
    }

    /**
     * Animate logo when background image is loaded
     */
    animateLogo() {
        const imageLoad  = new Image();
        imageLoad.src    = this.imageSrc;
        imageLoad.onload = this.animatePatternImage();
    }

    /**
     * Animate pattern image
     */
    animatePatternImage() {
        this.patternImage.animate({
            x: this.xPos,
            y: this.yPos
        }, this.duration, mina.easeinout);
    }

    /**
     * Reset pattern image
     */
    resetPatternImage() {
        this.patternImage.animate({
            x: this.patternImageInitXPos,
            y: this.patternImageInitYPos
        }, 0);
    }

    /**
     * Show background image
     */
    showBackgroundImage() {
        this.backgroundImage.classList.add('visible');
        this.logo.classList.add('overlay');
    }

    /**
     * Hide background image
     */
    hideBackgroundImage() {
        this.backgroundImage.classList.remove('visible');
        this.logo.classList.remove('overlay');
    }
}
