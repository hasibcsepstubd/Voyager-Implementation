let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js([
    'resources/assets/js/app.js',

    'public/asset/js/jquery.js',
    'public/asset/js/modernizr.js',
    'public/asset/js/bootstrap.min.js',
    'public/asset/js/jquery.easing.1.3.js',
    'public/asset/js/skrollr.min.js',
    'public/asset/js/smooth-scroll.js',
    'public/asset/js/jquery.appear.js',
    'public/asset/js/bootsnav.js',
    'public/asset/js/jquery.nav.js',
    'public/asset/js/wow.min.js',
    'public/asset/js/page-scroll.js',
    'public/asset/js/swiper.min.js',
    'public/asset/js/jquery.count-to.js',
    'public/asset/js/jquery.stellar.js',
    'public/asset/js/jquery.magnific-popup.min.js',
    'public/asset/js/isotope.pkgd.min.js',
    'public/asset/js/imagesloaded.pkgd.min.js',
    'public/asset/js/classie.js',
    'public/asset/js/hamburger-menu.js',
    'public/asset/js/counter.js',
    'public/asset/js/jquery.fitvids.js',
    'public/asset/js/equalize.min.js',
    'public/asset/js/skill.bars.jquery.js',
    'public/asset/js/justified-gallery.min.js',
    'public/asset/js/jquery.easypiechart.min.js',
    'public/asset/js/instafeed.min.js',
    'public/asset/js/retina.min.js',
    'public/asset/revolution/js/jquery.themepunch.tools.min.js',
    'public/asset/revolution/js/jquery.themepunch.revolution.min.js',
    'public/asset/js/main.js',
    'public/asset/js/scrolling-nav.js',
    'public/asset/js/toastr.min.js'


], 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

       .combine([
        'public/asset/css/animate.css',
        'public/asset/css/bootstrap.min.css',
        'public/asset/css/et-line-icons.css',
        'public/asset/css/font-awesome.css',
        'public/asset/css/themify-icons.css',
        'public/asset/css/swiper.css',
        'public/asset/css/justified-gallery.css',
        'public/asset/css/magnific-popup.css',

        'public/asset/revolution/css/settings.css',
        'public/asset/revolution/css/layers.css',
        'public/asset/revolution/css/navigation.css',

        'public/asset/css/bootsnav.css',
        'public/asset/css/style.css',
        'public/asset/css/responsive.css'

    ], 'public/css/all.css');
