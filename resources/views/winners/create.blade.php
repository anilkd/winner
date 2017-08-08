@extends('layouts.app')

@section('content')

    <br>
    <br>
    <br>
    <div class="container">

        <ul class="breadcrumb">
            <li><a href="/winner/public">Home</a></li>
            <li><a href="/winner/public/winners">Winners</a></li>
            <li class="active">Create</li>
        </ul>
    </div>

    <div class="container">
        <div class="col-lg-6">
            @include('errors.error-display')

            {!! Form::open(array('url' => 'winners','class' => 'form-horizontal')) !!}

            @include('winners.winner-form', ['submitButtonText' => 'Add Winner'])


            {!! Form::close() !!}
        </div>
    </div>
@endsection