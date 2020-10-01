import "./modules/polyfills";
import Logo from "./modules/logo";

/**
 * Logo
 * Initialize logo animations
 */
const desktopLogo = new Logo(
  "logo-desktop",
  -1100,
  -185,
  3500,
  "/wp-content/themes/littlebiglab/dist/images/logo-background.jpg",
  "page"
);

const mobileLogo = new Logo(
  "logo-mobile",
  -1425,
  -240,
  3500,
  "/wp-content/themes/littlebiglab/dist/images/logo-background.jpg",
  "page"
);

/**
 * Maintenance Page
 * Enable multiple currency support
 */

if (document.querySelector(".page-wordpress-maintenance")) {
  // Get the page currency
  const urlParams = new URLSearchParams(window.location.search);
  const pageCurrency = urlParams.get("currency");

  // Ge the currency symbol elements
  const currencySymbols = document.querySelectorAll(".currency-symbol");

  // Set the correct currency symbol for each element
  currencySymbols.forEach(currencySymbol => {
    if (pageCurrency === "EUR") {
      currencySymbol.innerHTML = "€";
    } else {
      currencySymbol.innerHTML = "$";
    }
    currencySymbol.style.display = "initial";
  });
}
