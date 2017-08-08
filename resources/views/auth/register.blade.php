@extends('layouts.app')

@section('content')


    <h1 id="navbar">Register</h1>

    <div class="container">
        @include('errors.error-display')

            {!! Form::open(['action' => 'Auth\AuthController@postRegister','class' => 'form-horizontal']) !!}
            <fieldset>
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Name',array('class' => 'col-lg-2 control-label')) !!}
                    <div class="col-lg-10">
                        {!! Form::text('name', Input::old('name'),array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', 'Email',array('class' => 'col-lg-2 control-label')) !!}
                    <div class="col-lg-10">
                        {!! Form::text('email', Input::old('email'),array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', 'Password',array('class' => 'col-lg-2 control-label')) !!}
                    <div class="col-lg-10">

                        {!! Form::password('password',array('placeholder'=>'Password', 'class'=>'form-control' ) ) !!}
                    </div>
                </div>


                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    {!! Form::label ('password_confirmation', 'Confirm Password',array('class' => 'col-lg-2 control-label')) !!}
                    <div class="col-lg-10">
                        {!! Form::password('password_confirmation',array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </fieldset>

            {!! Form::close() !!}
        </div>
    </div>
@endsection