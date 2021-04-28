@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Advanced') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table" style="height: auto; width: auto">
                        <tbody>
                        @foreach($advanced as $b)
                            <tr>
                                <td><img src="data:image/jpeg;base64, {{$b->images}} " width="300" height="200"/></td>
                                <td><a href="{{route('recipe.dishView',$b->id)}}">
                                        {{$b->name}}</a><br/>
                                    Time to make (in minutes):{{$b->time}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$advanced->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
