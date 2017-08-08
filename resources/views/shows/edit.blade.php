@extends('layouts.app')

@section('content')

    <br>
    <br>
    <br>
    <div class="container">

        <ul class="breadcrumb">
            <li><a href="/winner/public">Home</a></li>
            <li><a href="/winner/public/shows">Shows</a></li>
            <li class="active">Edit - {{$show->show_name}}</li>
        </ul>
    </div>
    <div class="container">
        <div class="col-lg-6">

            @include('errors.error-display')

            {!! Form::model($show, ['method' => 'PATCH', 'action' => ['ShowController@update',$show->id],'class' => 'form-horizontal']) !!}
            @include('shows.radio-show', ['submitButtonText' => 'Update Show'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection