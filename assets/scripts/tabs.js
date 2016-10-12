/**
 * Tabs
 * - Toggle tab and content display
 * - Detect url hash and load appropriate tab
 */
class Tabs {

    /**
     * Init
     * @param {string} tabClass
     * @param {string} tabAttribute
     * @param {string} contentClass
     */
    constructor(tabClass = 'tab', tabAttribute = 'data-tab', contentClass = 'content') {

        // Parameters
        this.tabAttribute = tabAttribute;
        this.tabClass     = tabClass;
        this.contentClass = contentClass;

        // State
        this.activeTabAttribute = null;

        // Init
        this.cacheDom();
        this.bindEvents();
        this.checkUrlHash();
        this.toggleVisibility();
    }

    cacheDom() {

        // Get nodelists for tabs and content
        this.tabs = document.querySelectorAll('.' + this.tabClass);
        this.contents = document.querySelectorAll('.' + this.contentClass);
    }

    bindEvents() {

        // Bind tab element click events
        for (let tab of this.tabs) {

            let tabAttribute = tab.getAttribute(this.tabAttribute);

            tab.addEventListener('click',
                e => this.toggleTabs(e, tabAttribute)
            );
        }
    }

    toggleVisibility() {

        // Show tabs
        for (let tab of this.tabs) {
            tab.style.visibility = 'visible';
        }

        // Show contents
        for (let content of this.contents) {
            content.style.visibility = 'visible';
        }
    }

    /*
     * Tab methods
     */

    toggleTabs(e, tabAttribute) {

        // Store active tab attribute state
        this.activeTabAttribute = tabAttribute;

        // Display tab element and content and set url hash
        this.toggleTab();
        this.toggleContent();
        this.setUrlHash();

        // Override default action if called from a click event
        if (e) {
            e.preventDefault();
        }
    }

    /*
     * Tab methods
     */

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
        let tab = document.querySelector('[' + this.tabAttribute + '=' + this.activeTabAttribute + ']');
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
            var node = document.querySelector('[' + this.tabAttribute + '=' + urlHash + ']');
            let validHash = document.body.contains(node);

            // Set tab if valid
            if (validHash) {
                this.toggleTabs(null, urlHash);
            }
        }
    }

    getUrlHash() {
        return window.location.hash.substr(1);
    }

    setUrlHash() {
        window.location.hash = this.activeTabAttribute;
    }
}
