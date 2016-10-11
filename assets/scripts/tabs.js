/**
 * Tabs
 */
class Tabs {

    /**
     * Parameters
     * @param {string} dataAttribute
     */
    constructor(dataAttribute = 'data-tab') {

        // Get parameters
        this.dataAttribute = dataAttribute;

        // Init
        this.cacheDom();
        this.bindEvents();
    }

    cacheDom() {

        // Get nodelist of nav elements
        this.navElements = document.querySelectorAll('[' + this.dataAttribute + ']');
    }

    bindEvents() {

        // Bind click events for each nav element
        for (let navElement of this.navElements) {

            let navAttribute = navElement.getAttribute(this.dataAttribute);

            navElement.addEventListener('click',
                e => this.toggleNav(e, navElement, navAttribute)
            );
        }
    }

    toggleNav(e, navElement, navAttribute) {
        e.preventDefault();

        this.toggleNavElement(navElement, navAttribute);
        this.toggleContent(navElement, navAttribute);
        this.updateUrlHash(navElement, navAttribute);
    }

    toggleNavElement(navElement, navAttribute) {

        // Reset all nav elements state
        for (let navElement of this.navElements) {
            navElement.classList.remove('active');
        }

        // Set active nav element state
        navElement.classList.add('active');
    }

    toggleContent(navElement, navAttribute) {

        // Hide all content
        for (let navElement of this.navElements) {
            let attribute = this.getNavAttribute(navElement);
            let content   = document.querySelector('.' + attribute);
            content.classList.remove('active');
        }

        // Set active content
        let activeContent = document.querySelector('.' + navAttribute);
        activeContent.classList.add('active');
    }

    updateUrlHash(navElement, navAttribute) {

        // Add hash to url
        window.location.hash = navAttribute;
    }

    getNavAttribute(navElement) {
        return navElement.getAttribute(this.dataAttribute);
    }
}
