<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name',array('class' => 'col-lg-2 control-label')) !!}
    <div class="col-lg-10">
        {!! Form::text('name', Input::old('name'),array('class' => 'form-control')) !!}
    </div>
</div>



<div class="form-group {{ $errors->has('grat_id') ? ' has-error' : '' }}">
    {!! Form::label('grat_id', 'Gratification',array('class' => 'col-lg-2 control-label')) !!}
    <div class="col-lg-10"><!--,'onchange' => 'displayQuantity(this)'-->
        {!! Form::select('grat_id', $gratifications,Input::old('grat_id'), array('class' => 'form-control')) !!}
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
{{--<div>{!! Form::text('shows', Input::old('shows'),array('class' => 'form-control')) !!}</div>--}}
@if(isset($contestShows)&& count($contestShows)>0)
    @foreach($contestShows as $key=>$show)
        <div class="form-group {{ $errors->has('shows.'.$key.'.winner_count') ? 'has-error' : '' }}">
            {!! Form::label($show->show_name, $show->show_name,array('class' => 'col-lg-2 control-label')) !!}
            <div class="col-lg-10">
                {!! Form::hidden('shows['.$key.'][show_id]',$show->id) !!}
                {!! Form::number('shows['.$key.'][winner_count]', isset($contest)&& count($contest->shows)>$key ?$contest->shows[$key]->pivot->winner_count:0,array('class' => 'form-control')) !!}
            </div>
        </div>
    @endforeach
@endif

<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>