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

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'description' => 'required',

        ]);
        $tst = new Torstr();
        $tst->name = $request->name;
        $tst->email = $request->email;
        $tst->description = $request->description;
        $tst->options = json_encode($request->options);
        $tst->save();
        return back()->with('message', 'Post Created Successfully');
    }
}
