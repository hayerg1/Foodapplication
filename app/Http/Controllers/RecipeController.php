<?php

namespace App\Http\Controllers;

use App\Models\upload;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    //
    public function beginner(){

        $beginner= upload::where('difficulty','beginner')->where('approved','1')->get();
        return view('beginner',['beginner'=>$beginner]);
    }

    public function intermediate(){
        $intermediate= upload::where('difficulty','intermediate')->where('approved','1')->get();
        return view('intermediate', ['intermediate'=>$intermediate]);
    }

    public function advanced(){
        $advanced= upload::where('difficulty','advanced')->where('approved','1')->get();
        return view('advanced', ['advanced'=>$advanced]);
    }
    public function dishView($recipe_id){
        $dish = upload::find($recipe_id);
        return view('dish',['dish'=>$dish]);
    }
}
