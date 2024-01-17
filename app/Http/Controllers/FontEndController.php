<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FontEndController extends Controller
{
    public function index(Request $request){
        return view('selectSeller');
    }
}
