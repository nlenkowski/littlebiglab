/**
 * Logo
 * - Animate SVG pattern image with snap.svg
 * - Toggle background image
 */
export default class Logo {

  /**
   * Init
   * @param {string} svgId - Logo svg id
   * @param {number} xPos - Destination x position
   * @param {number} yPos - Destination y position
   * @param {number} duration - Animation duration
   * @param {string} imageSrc - Full path to background image
   * @param {string} page - Calling page
   */
  constructor(svgId, xPos, yPos, duration, imageSrc, page) {

    // Get parameters
    this.svgId = '#' + svgId;
    this.xPos = xPos;
    this.yPos = yPos;
    this.duration = duration;
    this.imageSrc = imageSrc;
    this.page = page;

    // Init
    this.cacheDom();
    this.bindEvents();
    this.animateLogo();
  }

  /**
   * Cache DOM elements and initialize pattern image Snap object
   */
  cacheDom() {
    this.logo = document.querySelector(this.svgId + '-container');
    this.pattern = Snap.select(this.svgId + ' .logo-pattern-image');
    this.patternInitXPos = this.pattern.attr('x');
    this.patternInitYPos = this.pattern.attr('y');
    this.background = document.querySelector('.logo-background-image');
  }

  /**
   * Bind event listeners for logo and background image
   */
  bindEvents() {

    // Events for the home page
    if (this.page === 'home') {

      this.logo.addEventListener('click',
        e => this.showBackground(e)
      );

      this.background.addEventListener('click',
        e => this.hideBackground(e)
      );

      // Scroll events
      window.addEventListener('scroll',
        e => this.hideBackground(e)
      );

    } else { // Events for other pages

      this.logo.addEventListener('click',
        e => this.goHome(e)
      );
    }
  }

  /**
   * Animate logo when pattern image is loaded
   */
  animateLogo() {
    const imageLoad = new Image();
    imageLoad.src = this.imageSrc;
    imageLoad.onload = this.animatePattern();
  }

  /**
   * Animate pattern image
   */
  animatePattern() {
    this.pattern.animate({
      x: this.xPos,
      y: this.yPos
    }, this.duration, mina.easeinout);
  }

  /**
   * Reset pattern image
   */
  resetPattern() {
    this.pattern.animate({
      x: this.patternInitXPos,
      y: this.patternInitYPos
    }, 0);
  }

  /**
   * Show background image
   */
  showBackground() {
    this.background.classList.add('visible');
    this.logo.classList.add('overlay');
  }

  /**
   * Hide background image
   */
  hideBackground() {
    this.background.classList.remove('visible');
    this.logo.classList.remove('overlay');
  }

  /**
   * Load home page
   */
  goHome() {
    window.location = '/';
  }
}
