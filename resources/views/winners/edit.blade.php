@extends('layouts.app')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item">{!!link_to('/winners', 'Winners')!!}</li>
        <li class=" breadcrumb-item active">Edit</li>
    </ul>

    <div class="container">
        <legend> Edit Winner</legend>
        <div class="col-lg-6">
            @include('errors.error-display')

            {!! Form::model($winner, ['method' => 'PATCH', 'action' => ['WinnerController@update',$winner->id],'class' => 'form-horizontal']) !!}
            @include('winners.winner-form', ['submitButtonText' => 'Update Winner'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection