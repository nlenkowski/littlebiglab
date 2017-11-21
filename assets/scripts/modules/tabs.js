import { getCssProp, setDocumentScrollTop } from './utilities';

/**
 * Tabs
 * Toggle tab and content display
 * Detect url hash and load appropriate tab
 */
export default class Tabs {
  /**
   * Params
   * @param {string} tabsAttribute - Tabs data attribute
   * @param {string} tabsClass - Tabs class
   * @param {string} tabsContainer - Tabs container
   * @param {string} contentClass - Tabs content class
   * @param {string} contentContainer - Tabs content container
   */
  constructor(tabsAttribute = 'data-tab', tabsClass = 'tab', tabsContainer = 'tabs-container', contentClass = 'content', contentContainer = 'content-container') {
    this.tabsAttribute = tabsAttribute;
    this.tabsClass = tabsClass;
    this.tabsContainer = tabsContainer;
    this.contentClass = contentClass;
    this.contentContainer = contentContainer;

    // Init
    this.cacheDom();
    this.bindEvents();
    this.checkUrlHash();
  }

  cacheDom() {
    // Get tabs and content
    this.tabs = document.querySelectorAll(`.${this.tabsClass}`);
    this.contents = document.querySelectorAll(`.${this.contentClass}`);
  }

  bindEvents() {
    // Bind tab events
    this.tabs.forEach((tab) => {
      const tabsAttribute = tab.getAttribute(this.tabsAttribute);
      tab.addEventListener('click', e =>
        this.toggleTabs(e, tabsAttribute));
    });
  }

  /**
   * Tab methods
   */

  toggleTabs(e, tabsAttribute) {
    // Store active tab attribute state
    this.activeTabAttribute = tabsAttribute;

    // Get tab
    const tab = document.querySelector(`[${this.tabsAttribute}=${this.activeTabAttribute}]`);

    if (tab) {
      // Display tab element and content and set url hash
      this.resetTabs();
      this.showTab();
      this.toggleContent();
      this.setUrlHash();

      // Prevent default action if called from a click event
      if (e) {
        e.preventDefault();
      }
    }
  }

  resetTabs() {
    this.tabs.forEach((tab) => {
      tab.classList.remove('active');
    });
  }

  showTab() {
    const tab = document.querySelector(`[${this.tabsAttribute}=${this.activeTabAttribute}]`);
    if (tab) {
      tab.classList.add('active');
    }
  }

  /**
   * Content methods
   */

  toggleContent() {
    this.hideAllContents();
    this.showContent();
  }

  hideAllContents() {
    this.contents.forEach((content) => {
      content.classList.remove('active');
    });
  }

  showContent() {
    const content = document.querySelector(`.${this.activeTabAttribute}`);
    if (content) {
      content.classList.add('active');
      this.scrollToContent();
    }
  }

  scrollToContent() {
    // Get current tab
    const tabsContainer = document.querySelector(`.${this.tabsContainer}`);
    const contentContainer = document.querySelector(`.${this.contentContainer}`);

    // Calculate new scroll position
    const menuHeight = parseInt(window.getComputedStyle(tabsContainer).getPropertyValue('height'), 10);
    const contentYPos = contentContainer.getBoundingClientRect().top;
    const newScrollPos = (contentYPos + window.pageYOffset) - menuHeight;

    // Scroll project content area to top if menu is fixed
    if (getCssProp(tabsContainer, 'position') === 'fixed') {
      setDocumentScrollTop(newScrollPos);
    }
  }

  /**
   * Url methods
   */

  checkUrlHash() {
    // Get the url hash
    const urlHash = this.getUrlHash();

    if (urlHash) {
      // Make sure the hash exists as a data attribute in the dom
      const node = document.querySelector(`[${this.tabsAttribute}=${urlHash}]`);
      const validHash = document.body.contains(node);

      // Set tab if valid
      if (validHash) {
        this.toggleTabs(null, urlHash);
      }
    }
  }

  getUrlHash() {
    this.urlHash = window.location.hash.substr(1);
    return this.urlHash;
  }

  setUrlHash() {
    window.location.hash = this.activeTabAttribute;
  }
}
