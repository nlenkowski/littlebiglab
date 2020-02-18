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
  10,
  "/wp-content/themes/littlebiglab/dist/images/logo-background.jpg",
  "page"
);

const mobileLogo = new Logo(
  "logo-mobile",
  -1425,
  -240,
  0,
  "/wp-content/themes/littlebiglab/dist/images/logo-background.jpg",
  "page"
);
