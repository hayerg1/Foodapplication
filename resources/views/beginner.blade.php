@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Beginner') }}</div>

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

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($beginner as $b)
                                <tr>

                                    <td><a href="{{route('recipe.dishView',$b->id)}}">
                                            {{$b->name}}</a></td>
                                    <td><img src="data:image/jpeg;base64, {{$b->images}} " width="100" height="100"/></td>
                                    <td>{{$b->time}}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
