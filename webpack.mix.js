const mix = require('laravel-mix');


mix.scripts('resources/js/*.js', 'public/js/app.js')
    .scripts('resources/vendor/jquery/*.js', 'public/js/jquery.js')
    .scripts('resources/vendor/jquery-easing/*.js', 'public/js/jquery-easing.js')
    .scripts('resources/vendor/bootstrap/js/*.js', 'public/js/bootstrap.bundle.js')
    .styles('resources/css/*.css', 'public/css/style.css')

