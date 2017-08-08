@extends('layouts.app')

@section('content')

    <br>
    <br>
    <br>
    <h1>Login</h1>

    <div class="container">

        <div class="col-lg-6">
            @include('errors.error-display')
            {!! Form::open(['action' => 'Auth\AuthController@postLogin','class' => 'form-horizontal']) !!}
            <fieldset>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', 'Email',array('class' => 'col-lg-2 control-label')) !!}
                    <div class="col-lg-10">
                        {!! Form::text('email', Input::old('email'),array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', 'Password',array('class' => 'col-lg-2 control-label')) !!}
                    <div class="col-lg-10">
                        {!! Form::password('password',array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('remember') ? ' has-error' : '' }}">
                    {!! Form::label('remember', 'remember',array('class' => 'col-lg-2 control-label')) !!}
                    <div class="col-lg-10">
                        {!! Form::checkbox('remember', Input::old('remember'),array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </fieldset>

            {!! Form::close() !!}
        </div>
    </div>
@endsection