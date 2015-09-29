var elixir = require('laravel-elixir');

elixir(function(mix) {

    mix.sass([
        'main.scss'
    ], 'resources/assets/css/main.css');

    mix.styles([
        'main.css'
    ], 'public/lib/css/main.css');

    mix.scripts([
        '/../../../node_modules/angular/angular.min.js',
        '/../../../node_modules/angular-route/angular-route.min.js',
        '/../../../node_modules/angular-resource/angular-resource.min.js',
        '/../../../public/customers/customers.js',
        'main.js'
    ], 'public/lib/js/main.min.js');

    mix.copy('resources/assets/fonts', 'app/lib/fonts');

});
