<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \File;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
}
