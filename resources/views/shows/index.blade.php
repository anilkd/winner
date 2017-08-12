@extends('layouts.app')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item">{!!link_to('/shows', 'Shows')!!}</li>
    </ul>



    <div class="container">
        <legend>Shows</legend>
            {!!link_to('shows/create', 'Add Show', $attributes = array('class' =>'btn btn-link'))!!}
        @if(isset($shows)&& count($shows)>0)
            <table class="table table-striped table-hover ">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Show Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th></th>
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
            @include('pagination', ['collection' => $shows])
    </div>

    @else
        {{--<p class="text-warning">No Shows yet</p>--}}
    @endif

@stop
