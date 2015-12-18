<?php

namespace App\Http\Middleware;

use Closure;

class Demo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /* Be careful not to set such a condition that it may result in loop */
        
        // $request->is('article/create');// Check for URL pattern
        // $request->has('published_at');// Check for input presence
        // $request->input('published_at');// Check for input value string
        // $request->user();// Check for user making the request (i.e authenticated user)
        // $request->route();// Check for route handling the request
        // $request->segment();// Check for specific segment of URI
        
        //if($request->is('articles/create') && $request->has('foo')){ // In case you want to check it at every request, good for form requests
        if($request->has('foo')){ // In case you want to check it at particular route
            return redirect('articles');
        }
        
        return $next($request);
    }
}
