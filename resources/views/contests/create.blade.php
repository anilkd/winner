@extends('layouts.app')

@section('content')

    <br>
    <br>
    <br>
    <ul class="breadcrumb">
        <li>{!!link_to('/', 'Home')!!}</li>
        <li> {!!link_to('/contests', 'Contests')!!}</li>
        <li class="active">Create</li>
    </ul>
    <div>

    </div>

    <h1>New Contest</h1>
    <div class="container">

        <div class="col-lg-6">

            @include('errors.error-display')

            {!! Form::open(array('url' => 'contests','class' => 'form-horizontal')) !!}

            @include('contests.contest-form', ['submitButtonText' => 'Add Contest'])

            {!! Form::close() !!}
        </div>
    </div>
@endsection