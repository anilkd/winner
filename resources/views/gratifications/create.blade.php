@extends('layouts.app')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item">{!!link_to('/gratifications', 'Gratifications')!!}</li>
        <li class="breadcrumb-item active">Create</li>
    </ul>
    <div class="container">
        <legend>New Gratification</legend>
        <div class="col-lg-6">
            @include('errors.error-display')

            {!! Form::open(['action' => 'GratificationController@store','class' => 'form-horizontal']) !!}
            @include('gratifications.gratification', ['submitButtonText' => 'Add Gratification'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection