<?php

namespace App\Http\Controllers;

use App\Models\Torstr;
use Illuminate\Http\Request;

class ToasterController extends Controller
{
    public function index(){
        return view('index');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'description' => 'required',

        ]);
        Torstr::create($request->all());
        return back()->with('message', 'Post Created Successfully');
    }
}
