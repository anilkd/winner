@extends('layouts.app')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item"> {!!link_to('/contests', 'Contests')!!}</li>
        <li class=" breadcrumb-item active">Create</li>
    </ul>


    <div class="container">
    <legend>New Contest</legend>

        <div class="col-lg-6">

            @include('errors.error-display')

            {!! Form::open(array('url' => 'contests','class' => 'form-horizontal')) !!}

            @include('contests.contest-form', ['submitButtonText' => 'Add Contest'])

            {!! Form::close() !!}
        </div>
    </div>
@stop