<?php
// Start the session
session_start();
?>
@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-4">
            <div class="card">
                <div class="card-header"><h2>{{$dish->name}}</h2>
                    @if(auth()->user())
                    <form action="{{route('recipe.favourite',$dish->id)}}" method="post">
                        @csrf
                    <button  class="btn-primary" type="submit" style="width: 100px; height:25px; display: inline-flex; float: right; background: grey;  "> Favourite Dish</button>
                    </form>
                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-responsive"  >
                        <thead>
                        <tr>
                            <th scope="col">Images</th>
{{--                            <th scope="col">Time to make</th>--}}
                            <th scope="col">List of Ingredients</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="data:image/jpeg;base64, {{$dish->images}} " width="200" height="200"/>
                                    <br/><h5>Time to make: {{$dish->time}} Minutes</h5></td>
                                <td>{{$dish->ingredients}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Video</th>
                                <th scope="col">Directions</th>
                            </tr>
                        <tr>
                            <td><iframe src="{{$dish->video}}" width="400vh" height="250vh" allowfullscreen></iframe></td>
                            <td>{{$dish->directions}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
