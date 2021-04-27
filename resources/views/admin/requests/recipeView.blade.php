@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-12">
                <div class="card col-12" style="width: auto; height: auto">
                    <div class="card-header" style="width: auto; height: auto">Pending Recipes</div>

                    <div class="card-body" style="width:auto; height: auto" >


                            <table class="table" style="height: auto; width: auto">

                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Dish Name</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Video</th>
                                    <th scope="col">Time to make</th>
                                    <th scope="col">List of Ingredients</th>
                                    <th scope="col-12">Directions</th>
                                    <th scope="col">Difficulty</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>


                                <tr>
                                    <th scope="row">{{$dish->id}}</th>
                                    <td>{{$dish->name}}</td>
                                    <td><img src="data:image/jpeg;base64, {{$recipe->images}} " width="100" height="100"/></td>
                                    <td><iframe src="{{$dish->video}}" ></iframe></td>
                                    <td>{{$dish->time}}</td>
                                    <td>{{$dish->ingredients}}</td>
                                    <div style="width: auto" {{$dish->directions}} ></div>
                                    <td>{{$dish->difficulty}}</td>
                                    <td>
                                        <form action="{{route('admin.requests.approve', ->id)}}" method="POST" class="float-left">
                                            @csrf
                                            {{method_field('POST')}}

                                            <button type="submit" class="btn btn-primary float-left">Approve</button>
                                        </form>
                                        <form action="{{route('admin.requests.destroy', $recipe->id)}}" method="POST" class="float-left">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-warning">Delete</button>
                                        </form>

                                    </td>


                                </tr>


                                </tbody>
                            </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

