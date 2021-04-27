<?php

namespace App\Http\Controllers;

use App\Models\favourite;
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
    public function favourite($recipe_id){
        if(favourite::where('user_id', auth()->user()->id)->first()==null){
            favourite::create([
                'user_id'=>auth()->user()->id,
                'recipe_id'=>$recipe_id
            ]);
        }else{
            $kb =favourite::where('user_id', auth()->user()->id)->first();
            $kb->recipe_id=$recipe_id;
            $kb->save();

        }

        $favourites= favourite::where('user_id', auth()->user()->id)->get()->pluck('recipe_id');
        $dishes=upload::whereIn('id',$favourites)->get();
        return view('favourite', ['favourites'=>$dishes]);
    }

    public function viewAllFavourite(){
        $favourites= favourite::where('user_id', auth()->user()->id)->get()->pluck('recipe_id');
        $dishes=upload::whereIn('id',$favourites)->get();
        return view('favourite', ['favourites'=>$dishes]);

    }
    public function search(Request $request){
        $search_text = $request->get('search');
        $dishes = upload::where('name','LIKE','%'.$search_text.'%')->get();
        return view('search',['recipes'=>$dishes]);
    }
    public function showRecipes(){
        $recipes = upload::all();
        return view('search',['recipes'=>$recipes]);
    }
//    public function recipeView($recipe_id){
//        $dish = upload::find($recipe_id);
//        return view('admin/requests/recipeView',['dish'=>$dish]);
//    }
}
