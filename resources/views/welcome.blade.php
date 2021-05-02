@extends('layouts.app')
    @section('content')

{{--        <div class="row">--}}
{{--            <div class="col-6" >--}}

{{--                <img src="{{asset('webpagebg.jpg')}}" id="center">--}}
{{--                <div class="banner-area" style="background: lightblue ; width: 100%; height: 50vh;" >--}}
{{--                    <div class="content-area" style="height: 100%;display: flex;justify-content: center;align-items: center; color: white">--}}
{{--                        <div class="content" style="text-align: center">--}}
{{--                            <h1>Welcome</h1>--}}
{{--                            <p></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}

        <div class="row">
         <div class="col-6 col-8 col-12 col-4 col-2" >
    <div class="banner-area" style="background: lightblue ; width: 100%; height: 50vh;" >
        <div class="content-area" style="height: 100%;display: flex;justify-content: center;align-items: center; color: white">
            <img src="{{asset('webpagebg.jpg')}}" id="center" class="img-fluid" width="auto" height="auto"  >
            <div class=" col-sm-4" style="text-align: center">
                <h1 style="color: #1a1a1a">Welcome</h1>
                <p></p>
                <h3> A tantalising site <p></p>
                    to cater your needs<p></p>
                and share the dishes<p></p>
                    you make for everyone <p></p>to savour
                </h3>
            </div>
        </div>
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
        /*margin-left: 100px;*/
        margin-right: 100px;
        width: 500px;
        height:50vh;
    }
</style>
