<?php

namespace App\Repositories;

class FooRepository
{
    public function get() {
        return ['array', 'of', 'items'];// or results of some database query
        //return Post::all();// or some thing you are using eloquent for
    }
}
