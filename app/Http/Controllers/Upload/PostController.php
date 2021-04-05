<?php

namespace App\Http\Controllers\upload;

use App\Http\Controllers\Controller;
use App\Models\upload;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $recipes = upload::all();
        return view('upload')->with('recipes', $recipes);
    }

    public function store(Request $request){
         $request->validate([
            'name' => 'required|unique:recipe|max:255',
            'images' => 'required|mimes:png,jpeg,bmp',
             'time'=> 'required|numeric',
             'ingredients'=> 'required',
             'directions'=> 'required'

        ]);
        upload::create([
            'name'=>$request->name,
            'images'=>base64_encode(file_get_contents($request->file('images'))),
            'time'=>$request->time,
            'ingredients'=>$request->ingredients,
            'directions'=>$request->directions,
            'difficulty'=>$request->difficulty,
            'approved'=>'0',
        ]);
        $request->session()->flash('success', 'Recipe has been posted for approval ');

        return view('home');
    }
}
