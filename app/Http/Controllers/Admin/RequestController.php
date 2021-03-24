<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RequestController extends Controller
{
    //
    public function index()
    {
        $recipes = upload::where('approved', '0')->get();
        return view('admin.requests.index')->with('recipes', $recipes);
    }

    public function store(){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $recipe_id
     * @return \Illuminate\Http\Response
     */
    public function approve($recipe_id)
    {
        $recipe = upload::find($recipe_id);
        $recipe -> approved ='1';
        $recipe->save();
        return redirect()->route('admin.requests.index');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $recipe_id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $recipe_id)
    {
//        if (Gate::denies('delete-users')){
//            return redirect(route('admin.users.index'));
//        }
        $recipe = upload::find($recipe_id);
        $recipe->delete();

        return redirect()->route('admin.requests.index');
    }
}
