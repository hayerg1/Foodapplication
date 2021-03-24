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
        upload::create([
            'name'=>$request->name,
            'images'=>base64_encode(file_get_contents($request->file('images'))),
            'time'=>$request->time,
            'ingredients'=>$request->ingredients,
            'directions'=>$request->directions,
            'difficulty'=>$request->difficulty,
            'approved'=>'0',
        ]);
        return view('home');
    }
}
