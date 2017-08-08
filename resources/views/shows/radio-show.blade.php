<fieldset>
    <div class="form-group {{ $errors->has('show_name') ? ' has-error' : '' }}">
        {!! Form::label('show_name', 'Show Name',array('class' => 'col-lg-2 control-label')) !!}
        <div class="col-lg-10">
            {!! Form::text('show_name', Input::old('show_name'),array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('show_start_time') ? ' has-error' : '' }}">
        {!! Form::label('show_start_time', 'Show Start Time',array('class' => 'col-lg-2 control-label')) !!}
        <div class="col-lg-10">
            {!! Form::time('show_start_time', Input::old('show_start_time'),array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('show_end_time') ? ' has-error' : '' }}">
        {!! Form::label('show_end_time', 'Show End Time',array('class' => 'col-lg-2 control-label')) !!}
        <div class="col-lg-10">
            {!! Form::time('show_end_time', Input::old('show_end_time'),array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</fieldset>

