@extends('layouts.app')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item">{!!link_to('/shows', 'Shows')!!}</li>
        <li class=" breadcrumb-item active">Edit</li>
    </ul>

    <div class="container">
        <legend> Edit Show</legend>

        <div class="col-lg-6">

            @include('errors.error-display')

            {!! Form::model($show, ['method' => 'PATCH', 'action' => ['ShowController@update',$show->id],'class' => 'form-horizontal']) !!}
            @include('shows.radio-show', ['submitButtonText' => 'Update Show'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection