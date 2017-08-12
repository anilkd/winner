@extends('layouts.app')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item">{!!link_to('/gratifications', 'Gratifications')!!}</li>
        <li class="breadcrumb-item active">Edit</li>
    </ul>
    <div class="container">
        <div class="col-lg-6">
            @include('errors.error-display')

            {!! Form::model($gratification, ['method' => 'PATCH', 'action' => ['GratificationController@update',$gratification->id],'class' => 'form-horizontal']) !!}
            @include('gratifications.gratification', ['submitButtonText' => 'Update Gratification'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection