@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Search') }}</div>

                <div class="card-body">
                        @if($recipes->count()==0)
                            Your search did not match any recipes
                        @else
                    <table class="table" style="height: auto; width: auto">
                        <tbody>
                        @foreach($recipes as $b)
                            <tr>
                                <td><img src="data:image/jpeg;base64, {{$b->images}} " width="200" height="200"/></td>
                                <td><a href="{{route('recipe.dishView',$b->id)}}">
                                        {{$b->name}}</a><br/>
                                    Time to make (in minutes):{{$b->time}}<br/>
                                Difficulty :{{$b->difficulty}}</td>


                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


