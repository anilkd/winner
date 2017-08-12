@extends('layouts.app')

@section('content')

    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item"> {!!link_to('/contests', 'Contests')!!}</li>
        <li class=" breadcrumb-item active">Edit</li>
    </ul>


    <div class="container">
    <legend>Edit Contest</legend>

        <div class="col-lg-6">

            @include('errors.error-display')

            {!! Form::model($contest, ['method' => 'PATCH', 'action' => ['ContestController@update',$contest->id],'class' => 'form-horizontal']) !!}

            @include('contests.contest-form', ['submitButtonText' => 'Update Contest'])

            {!! Form::close() !!}
        </div>
    </div>
@endsection