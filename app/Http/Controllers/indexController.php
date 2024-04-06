<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        return view('alta');
    }
    public function post(Request $request){
        return view('alta',['request'=>$request]);
    }
    
}
