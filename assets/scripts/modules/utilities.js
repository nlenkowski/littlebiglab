/**
 * getCssProp
 * Get a CSS property value for an element
 * @param {*} element
 * @param {*} property
 */
export function getCssProp(element, property) {
  return window.getComputedStyle(element).getPropertyValue(property);
}

/**
 * setDocumentScrollTop
 * Set the document scrollTop position in a cross-platform way
 * @param {*} newScrollTop
 */
export function setDocumentScrollTop(newScrollTop) {
  document.documentElement.scrollTop = newScrollTop; // Chrome and Firefox
  document.body.scrollTop = newScrollTop; // IE and Safari
}
