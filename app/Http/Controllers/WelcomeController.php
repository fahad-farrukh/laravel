<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {
        return 'hello world';
    }
    
    public function contact()
    {
        return view('pages/contact');
    }
}
