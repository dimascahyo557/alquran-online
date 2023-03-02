<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutAppController extends Controller
{
    public function aboutApp()
    {
        return view('about_app');
    }
}
