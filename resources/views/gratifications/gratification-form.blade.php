
<div class="container">
    <div class="col-lg-6">

        {!! Form::open(array('url' => 'gratifications','class' => 'form-horizontal')) !!}

        <div class="form-group {{ $errors->has('grant_name') ? ' has-error' : '' }}">
            {!! Form::label('grant_name', 'Name',array('class' => 'col-lg-2 control-label')) !!}
            <div class="col-lg-10">
                {!! Form::text('grant_name', Input::old('grant_name'),array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('grant_name') ? ' has-error' : '' }}">
            {!! Form::label('grant_value', 'Grant Value',array('class' => 'col-lg-2 control-label')) !!}
            <div class="col-lg-10">
                {!! Form::text('grant_value', Input::old('grant_value'),array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
            {!! Form::label('start_date', 'Start Date',array('class' => 'col-lg-2 control-label')) !!}
            <div class="col-lg-10">
                {!! Form::date('start_date', Input::old('start_date'),array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('end_date') ? ' has-error' : '' }}">
            {!! Form::label('end_date', 'End Date',array('class' => 'col-lg-2 control-label')) !!}
            <div class="col-lg-10">
                {!! Form::date('end_date', Input::old('end_date'),array('class' => 'form-control')) !!}
            </div>
        </div>


        {!!Form::submit('Add Gratification', array('class' => 'btn btn-primary')) !!}

        {!! Form::close() !!}
    </div>
</div>