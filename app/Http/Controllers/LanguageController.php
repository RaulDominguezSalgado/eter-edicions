<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function langSwitch(Request $request){
        $lang = $request->input('lang');

        session(['language'=>$lang]);

        return redirect()->back()->with(['lang_switched' => $lang]);
    }
}
