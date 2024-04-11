<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        // return view pages.home

        return "PageController > home";
    }


    public function about(){
        return "PageController > about";
    }


    public function foreignRights(){
        return "PageController > foreignRights";
    }


    public function contact(){
        return "PageController > contact";
    }
}
