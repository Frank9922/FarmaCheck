<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmaco;
class indexController extends Controller
{
    public function index(){
        return view('alta');
    }
    public function store(Request $request)
    {
        $user = Farmaco::create($request->all());
        return view('alta');
    }
    
}
