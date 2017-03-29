<?php
/**
 * Displays the header
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="logo-background-image" style="background-image: url('<?php echo DISTDIR; ?>/images/elfuerte-background.jpg');"></div>

    <header class="site-header">

        <div class="logo-container" id="logo-desktop-container">

            <svg id="logo-desktop" class="logo" width="100%" height="100%" viewBox="0 0 1140 186" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <pattern id="logo-pattern-desktop" class="logo-pattern" patternUnits="userSpaceOnUse" width="2400" height="400">
                        <image xlink:href="<?php echo DISTDIR; ?>/images/elfuerte-logo.jpg" x="-800" y="0" width="2400" height="400" class="logo-pattern-image"></image>
                    </pattern>
                </defs>
                <path class="logo-path" fill="url(#logo-pattern-desktop)" d="M13.2118512,129.529865 C13.2118512,139.212414 17.2486783,143.246809 26.9370636,143.246809 L90.1134092,143.246809 C99.8017945,143.246809 103.838622,139.212414 103.838622,129.529865 L103.838622,107.74413 L79.8194999,107.74413 L79.8194999,116.41808 C79.8194999,119.242156 78.204769,120.855915 75.37899,120.855915 L44.0935792,120.855915 C41.2678002,120.855915 39.6530693,119.242156 39.6530693,116.41808 L39.6530693,13.742717 C39.6530693,4.26188782 35.6162421,0.0257726593 25.9278568,0.0257726593 L0.0921627648,0.0257726593 L0.0921627648,22.4166671 L8.77134124,22.4166671 C11.5971203,22.4166671 13.2118512,24.0304252 13.2118512,26.854502 L13.2118512,129.529865 Z M124.628282,23.6269857 L146.830831,23.6269857 L146.830831,0.0257726593 L124.628282,0.0257726593 L124.628282,23.6269857 Z M123.417234,129.529865 C123.417234,139.212414 127.454061,143.246809 136.940605,143.246809 L161.363409,143.246809 L161.363409,121.662794 L153.289755,121.662794 C150.463976,121.662794 148.849245,120.049036 148.849245,117.224959 L148.849245,54.0866709 C148.849245,44.6058417 144.812418,40.3697266 135.325874,40.3697266 L110.903069,40.3697266 L110.903069,62.1554617 L118.976724,62.1554617 C121.802503,62.1554617 123.417234,63.5675 123.417234,66.5932966 L123.417234,129.529865 Z M183.364117,105.525212 C183.364117,140.019293 211.823749,144.255408 226.154486,144.255408 C230.796837,144.255408 234.026299,143.650249 234.026299,143.650249 L234.026299,121.259354 C234.026299,121.259354 232.209727,121.662794 229.383947,121.662794 C222.3195,121.662794 208.99797,119.242156 208.99797,102.297696 L208.99797,60.7434233 L232.411568,60.7434233 L232.411568,40.3697266 L208.99797,40.3697266 L208.99797,12.3306786 L183.969642,12.3306786 L183.969642,40.3697266 L170.042588,40.3697266 L170.042588,60.7434233 L183.364117,60.7434233 L183.364117,105.525212 Z M258.045421,105.525212 C258.045421,140.019293 286.505052,144.255408 300.835789,144.255408 C305.47814,144.255408 308.707602,143.650249 308.707602,143.650249 L308.707602,121.259354 C308.707602,121.259354 306.89103,121.662794 304.065251,121.662794 C297.000803,121.662794 283.679273,119.242156 283.679273,102.297696 L283.679273,60.7434233 L307.092871,60.7434233 L307.092871,40.3697266 L283.679273,40.3697266 L283.679273,12.3306786 L258.650945,12.3306786 L258.650945,40.3697266 L244.723891,40.3697266 L244.723891,60.7434233 L258.045421,60.7434233 L258.045421,105.525212 Z M330.506469,129.529865 C330.506469,139.212414 334.543296,143.246809 344.231681,143.246809 L368.452644,143.246809 L368.452644,121.662794 L360.580831,121.662794 C357.755052,121.662794 356.140321,120.049036 356.140321,117.224959 L356.140321,13.742717 C356.140321,4.26188782 351.901653,0.0257726593 342.415109,0.0257726593 L317.992304,0.0257726593 L317.992304,21.8115078 L326.065959,21.8115078 C328.891738,21.8115078 330.506469,23.2235461 330.506469,26.2493427 L330.506469,129.529865 Z M379.553919,91.8082678 C379.553919,121.057634 400.747262,145.667446 434.858452,145.667446 C460.492304,145.667446 476.23593,130.135024 476.23593,130.135024 L465.538338,112.383684 C465.538338,112.383684 453.226015,123.881711 436.675024,123.881711 C421.133239,123.881711 407.81171,114.400882 405.793296,96.2461027 L476.841455,96.2461027 C476.841455,96.2461027 477.446979,89.7910701 477.446979,86.7652735 C477.446979,59.5331047 461.29967,37.9490893 431.830831,37.9490893 C400.949103,37.9490893 379.553919,60.138264 379.553919,91.8082678 L379.553919,91.8082678 Z M406.600661,78.494763 C409.42644,65.5846977 418.711143,57.7176267 431.830831,57.7176267 C442.326582,57.7176267 450.803919,66.189857 451.207602,78.494763 L406.600661,78.494763 Z M505.301086,129.529865 C505.301086,139.212414 509.539755,143.246809 519.026299,143.246809 L554.752219,143.246809 C581.395279,143.246809 604.203353,130.336744 604.203353,101.692536 C604.203353,87.1687131 596.735222,72.6448897 581.193438,68.005335 L581.193438,67.6018954 C589.872616,63.1640605 598.551794,52.8763523 598.551794,36.9404905 C598.551794,13.3392774 579.982389,0.0257726593 554.146695,0.0257726593 L492.181398,0.0257726593 L492.181398,22.4166671 L505.301086,22.4166671 L505.301086,129.529865 Z M531.742304,58.5245058 L531.742304,22.4166671 L553.944854,22.4166671 C565.651653,22.4166671 571.706894,29.8802985 571.706894,40.1680068 C571.706894,50.455715 565.449811,58.5245058 554.348537,58.5245058 L531.742304,58.5245058 Z M531.742304,116.41808 L531.742304,79.5033618 L556.770633,79.5033618 C569.486639,79.5033618 576.954769,88.1773119 576.954769,100.078778 C576.954769,112.181964 569.68848,120.855915 556.770633,120.855915 L536.182814,120.855915 C533.357035,120.855915 531.742304,119.242156 531.742304,116.41808 L531.742304,116.41808 Z M631.250095,23.6269857 L653.452644,23.6269857 L653.452644,0.0257726593 L631.250095,0.0257726593 L631.250095,23.6269857 Z M630.039047,129.529865 C630.039047,139.212414 634.075874,143.246809 643.562418,143.246809 L667.985222,143.246809 L667.985222,121.662794 L659.911568,121.662794 C657.085789,121.662794 655.471058,120.049036 655.471058,117.224959 L655.471058,54.0866709 C655.471058,44.6058417 651.434231,40.3697266 641.947687,40.3697266 L617.524882,40.3697266 L617.524882,62.1554617 L625.598537,62.1554617 C628.424316,62.1554617 630.039047,63.5675 630.039047,66.5932966 L630.039047,129.529865 Z M679.288338,89.1859108 C679.288338,117.426678 696.041171,141.229611 725.51001,141.229611 C739.235222,141.229611 748.116242,136.590057 754.171483,127.916107 L754.575166,127.916107 C754.575166,127.916107 754.373324,130.941903 754.373324,133.36254 L754.373324,138.203815 C754.373324,156.762034 740.849953,163.418786 725.308168,163.418786 C709.564542,163.418786 696.848537,156.560314 696.848537,156.560314 L688.976724,176.732291 C698.86695,181.977005 712.592163,185.607961 725.51001,185.607961 C752.354911,185.607961 779.805336,172.294456 779.805336,136.993496 L779.805336,66.189857 C779.805336,63.5675 781.621908,62.1554617 784.245845,62.1554617 L792.117659,62.1554617 L792.117659,40.3697266 L768.300378,40.3697266 C760.226724,40.3697266 756.997262,45.211001 756.997262,49.8505557 L756.997262,52.4729127 L756.593579,52.4729127 C756.593579,52.4729127 748.721766,37.9490893 724.904486,37.9490893 C695.233806,37.9490893 679.288338,60.945143 679.288338,89.1859108 L679.288338,89.1859108 Z M730.959727,119.645596 C714.408735,119.645596 705.325874,106.332091 705.325874,88.3790317 C705.325874,71.0311315 713.803211,59.7348244 729.344996,59.7348244 C743.272049,59.7348244 754.978848,65.9881373 754.978848,89.3876305 C754.978848,112.585404 743.272049,119.645596 730.959727,119.645596 L730.959727,119.645596 Z M816.338622,129.529865 C816.338622,139.212414 820.375449,143.246809 830.063834,143.246809 L893.24018,143.246809 C902.928565,143.246809 906.965392,139.212414 906.965392,129.529865 L906.965392,107.74413 L882.94627,107.74413 L882.94627,116.41808 C882.94627,119.242156 881.33154,120.855915 878.50576,120.855915 L847.22035,120.855915 C844.394571,120.855915 842.77984,119.242156 842.77984,116.41808 L842.77984,13.742717 C842.77984,4.26188782 838.743013,0.0257726593 829.054627,0.0257726593 L803.218933,0.0257726593 L803.218933,22.4166671 L811.898112,22.4166671 C814.723891,22.4166671 816.338622,24.0304252 816.338622,26.854502 L816.338622,129.529865 Z M915.644571,113.594003 C915.644571,134.169419 932.397404,145.667446 950.764967,145.667446 C973.976724,145.667446 981.848537,127.512667 981.848537,127.512667 L982.252219,127.512667 C982.252219,127.512667 982.050378,129.328145 982.050378,131.950502 C982.050378,138.002095 985.683523,143.246809 995.170066,143.246809 L1018.17998,143.246809 L1018.17998,121.662794 L1010.10633,121.662794 C1007.28055,121.662794 1005.66582,120.049036 1005.66582,117.224959 L1005.66582,78.8982025 C1005.66582,55.9021488 995.573749,37.9490893 961.260718,37.9490893 C950.563126,37.9490893 923.516384,39.966287 923.516384,59.1296651 L923.516384,70.0225327 L947.333664,70.0225327 L947.333664,64.5760989 C947.333664,58.9279453 956.416525,57.7176267 961.058877,57.7176267 C974.178565,57.7176267 980.031964,63.1640605 980.031964,77.8896037 L980.031964,78.6964828 L976.802503,78.6964828 C960.04967,78.6964828 915.644571,81.3188398 915.644571,113.594003 L915.644571,113.594003 Z M941.480265,112.383684 C941.480265,98.0615806 962.673608,96.2461027 975.995137,96.2461027 L980.435647,96.2461027 L980.435647,98.6667399 C980.435647,111.173366 970.747262,125.697189 957.022049,125.697189 C946.526299,125.697189 941.480265,119.242156 941.480265,112.383684 L941.480265,112.383684 Z M1037.96043,143.246809 L1062.1814,143.246809 L1062.1814,138.002095 C1062.1814,133.9677 1061.77772,131.143623 1061.77772,131.143623 L1062.1814,131.143623 C1062.1814,131.143623 1071.4661,145.667446 1092.86128,145.667446 C1120.10987,145.667446 1140.09216,124.48687 1140.09216,91.8082678 C1140.09216,59.9365442 1122.33012,37.9490893 1094.47602,37.9490893 C1072.67715,37.9490893 1063.59429,52.271193 1063.59429,52.271193 L1063.1906,52.271193 C1063.1906,52.271193 1063.59429,48.6402371 1063.59429,43.5972429 L1063.59429,13.742717 C1063.59429,4.26188782 1059.35562,0.0257726593 1049.86907,0.0257726593 L1025.44627,0.0257726593 L1025.44627,21.8115078 L1033.51992,21.8115078 C1036.3457,21.8115078 1037.96043,23.2235461 1037.96043,26.2493427 L1037.96043,143.246809 Z M1062.78692,92.4134271 C1062.78692,69.6190931 1075.30109,59.9365442 1088.62262,59.9365442 C1103.76072,59.9365442 1114.25647,72.6448897 1114.25647,92.2117073 C1114.25647,112.585404 1102.34783,124.083431 1088.42077,124.083431 C1071.26426,124.083431 1062.78692,108.349289 1062.78692,92.4134271 L1062.78692,92.4134271 Z">
                </path>
            </svg>

        </div>

        <div class="logo-container" id="logo-mobile-container">

            <svg id="logo-mobile" class="logo" width="300" height="128" viewBox="0 0 300 128" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <pattern id="logo-pattern-mobile" class="logo-pattern" patternUnits="userSpaceOnUse" width="2400" height="400">
                        <image xlink:href="<?php echo DISTDIR; ?>/images/elfuerte-logo.jpg" x="-1100" y="-125" width="2400" height="400" class="logo-pattern-image"></image>
                    </pattern>
                </defs>
                <path class="logo-path" fill="url(#logo-pattern-mobile)" d="M11.6448062,115.526032 C11.6448062,124.163492 15.2278234,127.762434 23.8270649,127.762434 L79.9012853,127.762434 C88.5005268,127.762434 92.083544,124.163492 92.083544,115.526032 L92.083544,96.091746 L70.7645912,96.091746 L70.7645912,103.829471 C70.7645912,106.34873 69.3313843,107.788307 66.8232722,107.788307 L39.0548883,107.788307 C36.5467762,107.788307 35.1135693,106.34873 35.1135693,103.829471 L35.1135693,12.2364021 C35.1135693,3.77888889 31.530552,0 22.9313106,0 L1.00604957e-13,0 L1.00604957e-13,19.974127 L7.70348715,19.974127 C10.2115992,19.974127 11.6448062,21.4137037 11.6448062,23.932963 L11.6448062,115.526032 Z M105.878161,115.526032 C105.878161,124.163492 109.640329,127.762434 118.060419,127.762434 L149.770122,127.762434 C173.418036,127.762434 193.662084,116.24582 193.662084,90.6933333 C193.662084,77.7371429 187.033502,64.7809524 173.238885,60.6421693 L173.238885,60.2822751 C180.942373,56.3234392 188.64586,47.1461376 188.64586,32.9303175 C188.64586,11.8765079 172.16398,0 149.23267,0 L94.2333544,0 L94.2333544,19.974127 L105.878161,19.974127 L105.878161,115.526032 Z M129.346924,52.1846561 L129.346924,19.974127 L149.053519,19.974127 C159.444269,19.974127 164.818795,26.6321693 164.818795,35.8094709 C164.818795,44.9867725 159.265118,52.1846561 149.41182,52.1846561 L129.346924,52.1846561 Z M129.346924,103.829471 L129.346924,70.8991534 L151.561631,70.8991534 C162.848135,70.8991534 169.476717,78.6368783 169.476717,89.2537566 C169.476717,100.050582 163.027286,107.788307 151.561631,107.788307 L133.288243,107.788307 C130.780131,107.788307 129.346924,106.34873 129.346924,103.829471 L129.346924,103.829471 Z M218.743205,115.526032 C218.743205,124.163492 222.326222,127.762434 230.925464,127.762434 L286.999684,127.762434 C295.598925,127.762434 299.181943,124.163492 299.181943,115.526032 L299.181943,96.091746 L277.86299,96.091746 L277.86299,103.829471 C277.86299,106.34873 276.429783,107.788307 273.921671,107.788307 L246.153287,107.788307 C243.645175,107.788307 242.211968,106.34873 242.211968,103.829471 L242.211968,12.2364021 C242.211968,3.77888889 238.628951,0 230.029709,0 L207.098399,0 L207.098399,19.974127 L214.801886,19.974127 C217.309998,19.974127 218.743205,21.4137037 218.743205,23.932963 L218.743205,115.526032 Z">
                </path>
            </svg>

        </div>

    </header>

    <section class="site-content">
