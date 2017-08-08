@extends('layouts.app')

@section('content')
    <br>
    <br>
    <br>
    <div class="col-lg-12 container">

        <ul class="breadcrumb">
            <li><a href="/winner/public">Home</a></li>
            <li class="active">Contests</li>
        </ul>
    </div>
    <h1>Contests</h1>
    <div class="container">
        <div>
            {!!link_to('contests/create', 'New Contest', $attributes = array('class' =>'btn btn-link'))!!}

        </div>
        @if(isset($contests)&& count($contests)>0)
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Gratification</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
                </thead>
                <tbody>

                @foreach($contests as $contest)

                    <tr>
                        <td>{{$contest->id}}</td>
                        <td>{{$contest->name}}</td>
                        <td>{{$contest->gratification()->grat_name}}</td>
                        <td>{{$contest->start_date}}</td>
                        <td>{{$contest->end_date}}</td>
                        <td>{!! link_to_action('ContestController@edit', 'Edit', array($contest->id)) !!} </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $contests->render() !!}
        @else
            <p class="text-warning">No Contests yet</p>
        @endif
    </div>

@stop
