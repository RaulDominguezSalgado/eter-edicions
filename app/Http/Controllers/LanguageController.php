<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function langSwitch(Request $request){
        $lang = $request->input('lang');
        // dump($lang);

        session(['language'=>$lang]);

        // dd(session('language'));

        return redirect()->back()->with(['lang_switched' => $lang]);
    }
}
