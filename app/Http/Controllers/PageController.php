<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome'); // Returns the welcome.blade.php view
    }

    public function goodbye(string $name, string $gender)
    {
        return view('goodbye', ['name' => $name, 'gender' => $gender]); // Returns the goodbye.blade.php view
    }

    public function try()
    {
        return view('try'); // Returns the try.blade.php view
    }

    public function login()
    {
        return view('login'); // Returns the login.blade.php view
    }

    public function signup()
    {
        return view('signup'); // Returns the signup.blade.php view
    }

    
}

