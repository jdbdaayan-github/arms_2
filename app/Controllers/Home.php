<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        
        return view('pages/dashboard');
    }

    public function create()
    {
        return view('pages/users/usercreate');
    }
}
