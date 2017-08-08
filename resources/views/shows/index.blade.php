@extends('layouts.app')

@section('content')
    <br>
    <br>
    <br>
    <div class="col-lg-12 container">

        <ul class="breadcrumb">
            <li><a href="/winner/public">Home</a></li>
            <li class="active">Shows</li>
        </ul>
    </div>
    <h1>Shows</h1>
    <div>
        <div>
            {!!link_to('shows/create', 'Add Show', $attributes = array('class' =>'btn btn-link'))!!}
        </div>
        @if(isset($shows)&& count($shows)>0)
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Show Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
                </thead>
                <tbody>

                @foreach($shows as $show)

                    <tr>
                        <td>{{$show->id}}</td>
                        <td>{!!link_to('shows/'.$show->id, $show->show_name, $attributes = array())!!}</td>
                        <td>{{$show->show_start_time}}</td>
                        <td>{{$show->show_end_time}}</td>
                        <td>{!! link_to_action('ShowController@edit', 'Edit', array($show->id)) !!} </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $shows->render() !!}
    </div>

    @else
        <p class="text-warning">No Shows yet</p>
    @endif

@stop
