/**
 * Tabs
 * - Toggle tab and content display
 * - Detect url hash and load appropriate tab
 */
class Tabs {

    /**
     * Init
     * @param {string} tabsClass
     * @param {string} tabsAttribute
     * @param {string} contentClass
     */
    constructor(tabsAttribute = 'data-tab', tabsClass = 'tab', tabsContainer = 'tabs-container', contentClass = 'content', contentContainer = 'content-container') {

        // Parameters
        this.tabsAttribute    = tabsAttribute;
        this.tabsClass        = tabsClass;
        this.tabsContainer    = tabsContainer;
        this.contentClass     = contentClass;
        this.contentContainer = contentContainer;

        // State
        this.activeTabAttribute = null;

        // Init
        this.cacheDom();
        this.bindEvents();
        this.checkUrlHash();
    }

    cacheDom() {

        // Get nodelists for tabs and content
        this.tabs     = document.querySelectorAll('.' + this.tabsClass);
        this.contents = document.querySelectorAll('.' + this.contentClass);
    }

    bindEvents() {

        // Bind tab element click events
        for (let tab of this.tabs) {

            let tabsAttribute = tab.getAttribute(this.tabsAttribute);

            tab.addEventListener('click',
                e => this.toggleTabs(e, tabsAttribute)
            );
        }
    }

    /*
     * Tab methods
     */

    toggleTabs(e, tabsAttribute) {

        // Store active tab attribute state
        this.activeTabAttribute = tabsAttribute;

        // Display tab element and content and set url hash
        this.toggleTab();
        this.toggleContent();
        this.setUrlHash();

        // Override default action if called from a click event
        if (e) {
            e.preventDefault();
        }
    }

    toggleTab() {
        this.resetAllTabs();
        this.showTab();
    }

    resetAllTabs() {
        for (let tab of this.tabs) {
            tab.classList.remove('active');
        }
    }

    showTab() {
        let tab = document.querySelector('[' + this.tabsAttribute + '=' + this.activeTabAttribute + ']');
        tab.classList.add('active');
    }

    /*
     * Content methods
     */

    toggleContent() {
        this.hideAllContents();
        this.showContent();
    }

    hideAllContents() {
        for (let content of this.contents) {
            content.classList.remove('active');
        }
    }

    showContent() {
        let content = document.querySelector('.' + this.activeTabAttribute);
        content.classList.add('active');

        this.scrollToContent();
    }

    scrollToContent() {

        // Get current tab
        let tabsContainer    = document.querySelector('.' + this.tabsContainer);
        let contentContainer = document.querySelector('.' + this.contentContainer);

        // Calculate new scroll position
        let menuHeight   = parseInt( window.getComputedStyle(tabsContainer).getPropertyValue('height') );
        let contentYPos  = contentContainer.getBoundingClientRect().top;
        let newScrollPos = contentYPos + window.pageYOffset - menuHeight;

        // Scroll content if menu is fixed
        if ( window.getComputedStyle(tabsContainer).getPropertyValue('position') === 'fixed' ) {
            document.documentElement.scrollTop = document.body.scrollTop = newScrollPos;
        }
    }

    /*
     * Url methods
     */

    checkUrlHash() {

        // Get the url hash
        let urlHash   = this.getUrlHash();
        let validHash = null;

        if (urlHash) {

            // Make sure the hash exists as a data attribute in the dom
            var node = document.querySelector('[' + this.tabsAttribute + '=' + urlHash + ']');
            let validHash = document.body.contains(node);

            // Set tab if valid
            if (validHash) {
                this.toggleTabs(null, urlHash);
            }

        } else { // Show first tab

            let firstTab = this.tabs[0].getAttribute(this.tabsAttribute);
            this.toggleTabs(null, firstTab);
        }
    }

    getUrlHash() {
        return window.location.hash.substr(1);
    }

    setUrlHash() {
        window.location.hash = this.activeTabAttribute;
    }
}
