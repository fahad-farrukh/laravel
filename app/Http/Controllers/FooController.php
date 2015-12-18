<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\FooRepository;

class FooController extends Controller
{
    /* Constructor Injection:
     * More suitable where repository is required in more than one method of controller
     * 
    private $repository;
    
    public function __construct(FooRepository $repository) {
        $this->repository = $repository;
    }*/
    
    public function foo(FooRepository $repository) {// Example of Method Injection: suitable where repository is required in only one method of controller, defing it on controller won't be efficient
    //public function foo() {
        // Below mentioned code line with "new" not a good way to access Repository methods, 
        // use "new" only when dealing with things like entities or value objects
        // beaware of "new" its difficult to test, difficult to review dependencies for the class "FooRepository"
        // There are two way around this 
        // either use constructor injection or method injection.
        //$repository = new \App\Repositories\FooRepository();
        //return $repository->get();
        //return 'foo';
        
        
        return $repository->get(); // Method Injection: Not available on all user defined methods, only available in specific components such as controller methods, command handlers, queue jobs, event listeners
        
        //return $this->repository->get(); // Constructor Injection
    }
}
