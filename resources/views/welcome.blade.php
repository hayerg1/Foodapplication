@extends('layouts.app')
    @section('content')

        <div class="row">
            <div class="col-6" >

                <img src="{{asset('webpagebg.jpg')}}" id="center" class="img-fluid" width="1100vh" height="100vh"  style="align-items: center; justify-content: center;">
            </div>
        </div>


    <div class="banner-area" style="background: lightblue ; width: 100%; height: 50vh;" >
        <div class="content-area" style="height: 100%;display: flex;justify-content: center;align-items: center; color: white">
            <img src="{{asset('webpagebg.jpg')}}" class="img-fluid" width="auto" height="auto"  >
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
<style>
    #center{
        display: block;
        margin-left: 300px;
        margin-right: 100px;
        width: 100%
    }
</style>
