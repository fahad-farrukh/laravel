<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//interface BarInterface {}

//class Baz {}

//$bar = new Bar(new Baz);// Manual way of instantiating class "Bar"
//class Bar implements BarInterface {
//class Bar {
    /*public $baz;
    
    public function __construct(Baz $baz) {
        $this->baz = $baz;
    }*/
//}

//class SecondBar implements BarInterface {}

// Manual way of binding instantiated objects to service/ioc container, 
// so that we don't have to do instantiation again and again
// suitable when automatic instantiation and binding is not possible 
// due to specific way required to create an object or information required such as API key

//App::bind('BarInterface', 'SecondBar'); 
//app()->bind('BarInterface', 'Bar'); // Alternative syntax for line below
//App::bind('BarInterface', 'Bar'); // Alternative syntax for line below
/*App::bind('BarInterface', function(){ // "BarInterface" in App::bind() is just the key in the container 
//App::bind('Bar', function(){
    return new Bar; 
    //return new Bar(new Baz); 
});*/
// OR
//app()->bind// Alternative syntax App::bind()


// Automatic instantiation and binding of object "Bar", 
// suitable when classes can resolved through service/ioc container, 
// (automatic instantiation and binding is possible)
/*Route::get('bar', function (BarInterface $bar) { 
//Route::get('bar', function (Bar $bar) { 
    dd($bar);
    //dd($bar->baz);// Accessing object item
});*/
/*
Route::get('bar', function () {
    $bar = app('BarInterface'); // Alternative syntax for line below
    $bar = app()['BarInterface']; // Alternative syntax for line below
    $bar = app()->make('BarInterface'); // Alternative syntax for line below
    //$bar = App::make('BarInterface'); // Just as "App::bind()" binds class/interface, "App::make()" resolves them. Alternative to "Route::get('bar', function (BarInterface $bar)" approach 
    dd($bar);
});
*/



Route::get('foo', 'FooController@foo');

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/', 'WelcomeController@index');

// Route::get('contact','WelcomeController@contact');

/*Route::get('about',['middleware' => 'auth', function(){ // Alternative syntax for attaching middleware at route level
    return 'this page will only show if the user is signed in';
}]);*/
//Route::get('about',['middleware' => 'auth', 'uses' => 'PagesController@about']);// Attaching middleware at route level
Route::get('about','PagesController@about');
Route::get('contact','PagesController@contact');


//Route::get('articles','ArticlesController@index');
//Route::get('articles/create','ArticlesController@create');
//Route::get('articles/{id}','ArticlesController@show');
//Route::post('articles','ArticlesController@store');
//Route::get('articles/{id}/edit','ArticlesController@edit');

// Alternative to commented routes mentioned above for articles, 
// use "php artisan route:list" to view generated routes
Route::resource('articles','ArticlesController');

/*Route::get('foo', function (){
   return 'Bar'; 
});*/

/*Route::get('foo', ['middleware' => 'manager', function (){
   return 'this page may only be viewed by managers'; 
}]);*/

Route::get('tags/{tags}','TagsController@show');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);