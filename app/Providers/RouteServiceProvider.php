<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
        
        //$router->model('articles', 'App\Article');// Binding wildcard articles key to instance of 'App\Article'
        
        $router->bind('articles', function($id){
            return \App\Article::published()->findOrFail($id);
        });
        
        /*
         * Incase we need to override default logic for route-model binding
         * such as incase we need to have different "WHERE" calluses on items in addition to "id".
         * 
         * $router->bind('articles', function($id){
            return \App\Article::published()->findOrFail($id);
        });*/
                
        $router->bind('tags', function($name){
            return \App\Tag::where('name', $name)->firstOrFail();
        });
        
        //$router->model('tags', 'App\Tag');// it would search for key, we need to search for name like above using "$router->bind"
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
