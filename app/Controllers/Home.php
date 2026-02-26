<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index_v');
    }
    public function contact() 
    { 
        return view('contact_v'); 
    }
    public function cart() 
    { 
        return view('cart_v'); 
    }
}
