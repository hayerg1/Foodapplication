@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width: auto; height: auto">
                    <div class="card-header" style="width: auto; height: auto">Pending Recipes</div>

                    <div class="card-body" style="width:auto; height: auto" >
                        @if($recipes->count()==0)
                            No recipes waiting for approval
                        @else
                            <table class="table" style="height: auto; width: auto">

                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Dish Name</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Time to make</th>
                                    <th scope="col">List of Ingredients</th>
                                    <th scope="col">Directions</th>
                                    <th scope="col">Difficulty</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recipes as $recipe)

                                <tr>
                                    <th scope="row">{{$recipe->id}}</th>
                                    <td>{{$recipe->name}}</td>
                                    <td><img src="data:image/jpeg;base64, {{$recipe->images}} " width="100" height="100"/></td>
                                    <td>{{$recipe->time}}</td>
                                    <td>{{$recipe->ingredients}}</td>
                                    <td>{{$recipe->directions}}</td>
                                    <td>{{$recipe->difficulty}}</td>
                                    <td>
                                        <form action="{{route('admin.requests.approve', $recipe->id)}}" method="POST" class="float-left">
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
                                @endforeach

                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
