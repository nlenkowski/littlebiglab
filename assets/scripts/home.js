import './modules/polyfills';
import Logo from './modules/logo';

/**
 * Logo
 * Initialize logo animations
 */
const desktopLogo = new Logo(
  'logo-desktop',
  -1100,
  -185,
  3500,
  '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg',
  'home',
);

const mobileLogo = new Logo(
  'logo-mobile',
  -1425,
  -240,
  3500,
  '/wp-content/themes/littlebiglab/dist/images/elfuerte-logo.jpg',
  'home',
);

