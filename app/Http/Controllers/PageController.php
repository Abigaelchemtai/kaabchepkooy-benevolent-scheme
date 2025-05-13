<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() 
    {
         return view('pages.home'); 
    }
    public function about() 
    { 
        return view('pages.about'); 
    }
    public function values() 
    { 
        return view('pages.values'); 
    }
    public function faqs() 
    { 
        return view('pages.faqs'); 
    }
    public function downloads() 
    { 
        return view('pages.downloads'); 
    }
    public function media() 
    { 
        return view('pages.media'); 
    }
    public function scheme() 
    { 
        return view('pages.scheme'); 
    }
    public function burial() 
    { 
        return view('pages.burial'); 
    }
}

