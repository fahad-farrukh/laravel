<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

class NavigationComposer
{
    /*public function __construct(ArticlesRepository $articles) { // Any dependencies needed can be defined in constructor such as repositories
        
    }*/
    
    public function compose(View $view) {
        $view->with('latest', \App\Article::latest()->first());
        //$view->with('latest', $this->articles->ofSomeType());// Sample use of repositories 
        //$view->with('latest', \App\Article::with()->join()->where()->first()); // Use repositories (like the line above) when things get complicated and you may need to combine use of with() or join() or where()
    }
}
