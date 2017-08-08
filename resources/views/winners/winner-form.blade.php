<div class="form-group {{ $errors->has('winner_name') ? ' has-error' : '' }}">
    {!! Form::label('winner_name', 'Name',array('class' => 'col-lg-2 control-label')) !!}
    <div class="col-lg-10">
        {!! Form::text('winner_name', Input::old('winner_name'),array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group {{ $errors->has('show_name') ? ' has-error' : '' }}">
    {!! Form::label('show_name', 'Show',array('class' => 'col-lg-2 control-label')) !!}
    <div class="col-lg-10">
        {!! Form::select('show_id', $shows,isset($winner-> show_name)?Input::old('show_name'):'Please Select', array('class' => 'form-control')) !!}

    </div>
</div>

<div class="form-group {{ $errors->has('rj_name') ? ' has-error' : '' }}">
    {!! Form::label('rj_name', 'RJ',array('class' => 'col-lg-2 control-label')) !!}
    <div class="col-lg-10">
        {!! Form::text('rj_name', isset($winner->rj_name)?Input::old('rj_name'): Auth::user()->name,array('class' => 'form-control')) !!}
    </div>
</div>


<div class="form-group {{ $errors->has('contest_id') ? ' has-error' : '' }}">
    {!! Form::label('contest_id', 'Contest',array('class' => 'col-lg-2 control-label')) !!}
    <div class="col-lg-10">
        {!! Form::select('contest_id', $contests,isset($winner-> contest_id)?Input::old('contest_id'):'Please Select', array('class' => 'form-control')) !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email',array('class' => 'col-lg-2 control-label')) !!}
    <div class="col-lg-10">
        {!! Form::text('email', Input::old('email'),array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone_no') ? ' has-error' : '' }}">
    {!! Form::label('phone_no', 'Phone',array('class' => 'col-lg-2 control-label')) !!}
    <div class="col-lg-10">
        {!! Form::text('phone_no', Input::old('phone_no'),array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group {{ $errors->has('area_name') ? ' has-error' : '' }}">
    {!! Form::label('area_name', 'Area',array('class' => 'col-lg-2 control-label')) !!}
    <div class="col-lg-10">
        {!! Form::text('area_name',  Input::old('area_name'),array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gift_issued_date') ? ' has-error' : '' }}">
    {!! Form::label('gift_issued_date', 'Issued Date',array('class' => 'col-lg-2 control-label')) !!}
    <div class="col-lg-10">
        {!! Form::date('gift_issued_date', Input::old('gift_issued_date'),array('class' => 'form-control')) !!}
    </div>
</div>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

{{--{!!Form::submit('Add Winner', array('class' => 'btn btn-primary')) !!}--}}