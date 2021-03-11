<?php

namespace App\Http\Controllers\upload;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('upload');
    }

    public function store(){

    }
}
