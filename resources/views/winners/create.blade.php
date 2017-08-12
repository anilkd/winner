@extends('layouts.app')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item">{!!link_to('/winners', 'Winners')!!}</li>
        <li class=" breadcrumb-item active">Create</li>
    </ul>

    <div class="container">
        <legend>Add Winner</legend>
        <div class=" col-lg-6">
            @include('errors.error-display')
            {!! Form::open(array('url' => 'winners','class' => 'form-horizontal')) !!}
            @include('winners.winner-form', ['submitButtonText' => 'Add Winner'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection