@extends('layouts.app')
    @section('content')
        <style>
            *{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            .banner-area{
                width: 100%;
                height: 100vh;
                background: yellow;
            }
        </style>
    <div class="banner-area" style="background: lightblue ; width: 100%; height: 50vh;" >
        <div class="content-area" style="height: 100%;display: flex;justify-content: center;align-items: center; color: white">
            <img src="{{asset('webpagebg.jpg')}}" class="img-fluid" width="auto" height="auto" >
            <div class="content" style="text-align: center">
                <h1>Welcome</h1>
                <p></p>
            </div>
        </div>
    </div>
@endsection
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


</html>

