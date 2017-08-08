@extends('layouts.app')

@section('content')

    <br>
    <br>
    <br>
    <div class="container">

        <ul class="breadcrumb">
            <li><a href="/winner/public">Home</a></li>
            <li><a href="/winner/public/shows">Shows</a></li>
            <li class="active">{{$show->show_name}}</li>
        </ul>
    </div>
    <div class="container">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$show->show_name}} - Live Contests</div>

                <div class="panel-body">
                    @if(isset($contests)&& count($contests)>0)
                        <table class="table table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Gratification</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Available Gifts</th>
                                <th>Current winners</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($contests as $contest)

                                <tr>
{{--                                    <td>{{$contest-gratification()}}</td>--}}
                                    <td>{{$contest->id}}</td>
                                    <td>{{$contest->name}}</td>
                                    <td>{{$contest->grat_id}}</td>
                                    <td>{{$contest->start_date}}</td>
                                    <td>{{$contest->end_date}}</td>
                                    <td>{{$contest->pivot->winner_count}}</td>
                                    <td>{{count($contest->winners)}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{--{!! $contests->render() !!}--}}
                    @else
                        <p class="text-warning">No Contests yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection