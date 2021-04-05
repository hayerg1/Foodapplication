<?php
// Start the session
session_start();
?>
@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dish') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table" style="height: auto; width: auto">
                        <thead>
                        <tr>
                            <th scope="col">Dish Name</th>
                            <th scope="col">Images</th>
                            <th scope="col">Time to make</th>
                            <th scope="col">List of Ingredients</th>
                            <th scope="col">Directions</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{$dish->name}}</td>
                                <td><img src="data:image/jpeg;base64, {{$dish->images}} " width="100" height="100"/></td>
                                <td>{{$dish->time}}</td>
                                <td>{{$dish->ingredients}}</td>
                                <td>{{$dish->directions}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
