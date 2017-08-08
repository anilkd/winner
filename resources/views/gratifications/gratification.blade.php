<fieldset>
    <div class="form-group {{ $errors->has('grat_name') ? ' has-error' : '' }}">
        {!! Form::label('grat_name', 'Name',array('class' => 'col-lg-2 control-label')) !!}
        <div class="col-lg-10">
            {!! Form::text('grat_name', Input::old('grat_name'),array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('grat_value') ? ' has-error' : '' }}">
        {!! Form::label('grat_value', 'Value',array('class' => 'col-lg-2 control-label')) !!}
        <div class="col-lg-10">
            {!! Form::text('grat_value', Input::old('grat_value'),array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('quantity') ? ' has-error' : '' }}">
        {!! Form::label('quantity', 'Quantity',array('class' => 'col-lg-2 control-label')) !!}
        <div class="col-lg-10">
            {!! Form::number('quantity', Input::old('quantity'),array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('end_date') ? ' has-error' : '' }}">
        {!! Form::label('expire_date', 'Expire Date',array('class' => 'col-lg-2 control-label')) !!}
        <div class="col-lg-10">
            {!! Form::date('expire_date', Input::old('expire_date'),array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</fieldset>

