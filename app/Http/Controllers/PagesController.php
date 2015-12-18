<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about() {
        /*$name = '<i>Fahad Farrukh</i>';
        //return view('pages.about')->with('name',$name);
        return view('pages/about')->with('name',$name);*/
        
        /*return view('pages/about')->with([
            'first' => 'Fahad',
            'last' => 'Farrukh',
            'name' => $name
        ]);*/
        
        /*$data = [];
        $data['first'] = 'First';
        $data['last'] = 'Last';
        $data['name'] = 'Fahad Farrukh';
        return view('pages/about')->with($data);*/

        $first = 'First';
        $last = 'Last';
        $name = 'Fahad Farrukh';
        $people = ['Azeem', 'Faheem', 'Hafeez'];
        //$people = [];
        return view('pages/about', compact('first','last','name', 'people'));        
    }
    
    public function contact() {
        return view('pages/contact');
    }
}
