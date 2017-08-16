@extends('layouts.app')

@section('content')

    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item active">Contests</li>
    </ul>
    <div class="container">
        <legend>Contests</legend>
        <div>
            {!!link_to('contests/create', 'New Contest', $attributes = array('class' =>'btn btn-link'))!!}

        </div>
        @if(isset($contests)&& count($contests)>0)
            <table class="table table-striped table-hover">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Gratification</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($contests as $contest)

                    <tr>
                        <td>{{$contest->id}}</td>
                        <td>{!!link_to('contests/'.$contest->id, $contest->name, $attributes = array())!!}</td>
                        <td>{{$contest->gratification()->grat_name}}</td>
                        <td>{{$contest->start_date}}</td>
                        <td>{{$contest->end_date}}</td>
                        <td>{!! link_to_action('ContestController@edit', 'Edit', array($contest->id)) !!} </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            @include('pagination', ['collection' => $contests])

        @else
            <p class="text-warning">No Contests yet</p>
        @endif
    </div>

@stop
