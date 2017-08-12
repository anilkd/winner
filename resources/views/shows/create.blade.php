@extends('layouts.app')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item">{!!link_to('/shows', 'Shows')!!}</li>
        <li class=" breadcrumb-item active">Create</li>
    </ul>

    <div class="container">
        <legend> Add Show</legend>
        <div class="col-lg-6">
            @include('errors.error-display')

            {!! Form::open(['action' => 'ShowController@store','class' => 'form-horizontal']) !!}
            @include('shows.radio-show', ['submitButtonText' => 'Add Show'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection