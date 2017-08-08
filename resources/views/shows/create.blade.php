@extends('layouts.app')

@section('content')

    <br>
    <br>
    <br>
    <div class="container">

        <ul class="breadcrumb">
            <li><a href="/winner/public">Home</a></li>
            <li><a href="/winner/public/shows">Shows</a></li>
            <li class="active">Create</li>
        </ul>
    </div>
    <div class="container">
        <div class="col-lg-6">
            @include('errors.error-display')

            {!! Form::open(['action' => 'ShowController@store','class' => 'form-horizontal']) !!}
            @include('shows.radio-show', ['submitButtonText' => 'Add Show'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection