import snapsvg from "snapsvg-cjs";
import svgxuse from "svgxuse";
import Logo from "./modules/logo";

// Initialize logo animation
const logoDesktop = new Logo('logo-desktop', -1100, -185, 3500, '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg', 'home');
const logoMobile  = new Logo('logo-mobile', -1425, -240, 3500, '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg', 'home');
