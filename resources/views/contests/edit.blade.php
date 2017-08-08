@extends('layouts.app')

@section('content')

    <br>
    <br>
    <br>
    <ul class="breadcrumb">
        <li>{!!link_to('/', 'Home')!!}</li>
        <li> {!!link_to('/contests', 'Contests')!!}</li>
        <li class="active">Edit</li>
    </ul>
    <div>

    </div>

    <h1>Edit Contest</h1>
    <div class="container">

        <div class="col-lg-6">

            @include('errors.error-display')

            {!! Form::model($contest, ['method' => 'PATCH', 'action' => ['ContestController@update',$contest->id],'class' => 'form-horizontal']) !!}

            @include('contests.contest-form', ['submitButtonText' => 'Update Contest'])

            {!! Form::close() !!}
        </div>
    </div>
@endsection