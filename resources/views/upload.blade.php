<?php
// Start the session
session_start();
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Upload') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name Of Dish') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>

                                <div class="col-md-6">
                                    <input type="file" id="myFile" name="images" class="@error('images') is-invalid @enderror">

                                    @error('images')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('Video link (Embedded URL)') }}</label>

                                <div class="col-md-6">
                                    <input  id="video"  class="form-control @error('video') is-invalid @enderror" name="video" value="{{ old('video') }}"  autocomplete="video" autofocus>
                                    @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Time to make') }}</label>

                                <div class="col-md-6">
                                    <input id="time" type="text" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}"  autocomplete="time" autofocus>

                                    @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="ingredients" class="col-md-4 col-form-label text-md-right">{{ __('List Of Ingredients') }}</label>

                                <div class="col-md-6">
                                    <textarea id="ingredients"  class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" value="{{ old('ingredients') }}"  autocomplete="ingredients" autofocus>
                                    </textarea>
                                @error('ingredients')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group row">

                            <label for="directions" class="col-md-4 col-form-label text-md-right">{{ __('Directions') }}</label>

                                <div class="col-md-6">
                                    <textarea id="directions"  class="form-control @error('directions') is-invalid @enderror" name="directions" value="{{ old('directions') }}"  autocomplete="directions" autofocus>
                                    </textarea>
                                    @error('directions')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="difficulty" class="col-md-4 col-form-label text-md-right">{{ __('Difficulty of Dish') }}</label>

                                <div class="col-md-6">
                                    <select name="difficulty" id="difficulty">
                                        <option value="beginner">Beginner</option>
                                        <option value="intermediate">Intermediate</option>
                                        <option value="advanced">Advanced</option>
                                    </select>
                                    @error('difficulty')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
