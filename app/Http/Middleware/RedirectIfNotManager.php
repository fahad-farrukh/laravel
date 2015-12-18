<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotManager
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
        //$request->user() // For global middleware (that runs on every request) it may not run, because user is not authenticated yet
        /*
         * Process to follow for global middleware (that runs on every request) to access $request->user()
        $response = return $next($request);
        $request->user()
        return $response;
        */
        
        if(!$request->user()->isATeamManager()){
            return redirect('articles');
        }
        
        return $next($request);
    }
}
