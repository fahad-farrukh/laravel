var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //mix.sass('app.scss').coffee('module.coffee').scripts(); // merge multiple scripts into one
    //mix.sass('app.scss').coffee('module.coffee').styles(); // merge multiple style sheets into one
    /*mix.sass('app.scss').coffee('module.coffee');*/
    //mix.sass('app.scss');
    
    /*
    // merge multiple style sheets into one
    mix.styles([
        'vendor/normalize.css',
        'app.css'
    ], 
    'public/output/final.css', // Path to dedicated output file in which all the combined css will reside
    'public/css'); // By default laravel looks into "resources/css" we have overridden it to look into "public/css"
    */
    
    /*
    // merge multiple scripts into one
    mix.scripts([
        'vendor/jquery.js',
        'main.js',
        'coupon.js'
    ], 
    'public/output/final.js', // Path to dedicated output file in which all the combined scripts will reside
    'public/js'); // By default laravel looks into "resources/js" we have overridden it to look into "public/js"
    */
    
    // triggering tests
    //mix.phpUnit().phpSpec();// All features for phpUnit are true for "phpSpec" as well
    //mix.phpUnit();
    
    //mix.sass('app.scss');
    
    mix.sass('app.scss', 'resources/css');
    
    mix.styles([
        'libs/bootstrap.min.css',
        'app.css',
        'libs/select2.min.css'
    ],
    null,
    'resources/css');
    
    mix.scripts([
        'libs/jquery.js',
        'libs/select2.min.js',
        'libs/bootstrap.min.js'
    ],
    null,
    'resources/js');
    
    
    /*mix.styles([
        'vendor/normalize.css',
        'app.css'
    ], 
    null,
    'public/css');*/
    
    mix.version('public/css/all.css');
    
});
