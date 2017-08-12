@extends('layouts.app')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item">{!!link_to('/shows', 'Shows')!!}</li>
        <li class=" breadcrumb-item active">{{$show->show_name}}</li>
    </ul>


    <div class="container">
        <div class="col-lg-12">
            <legend>{{$show->show_name}} - Live Contests</legend>

            <div class="panel-body">
                @if(isset($contests)&& count($contests)>0)
                    <table class="table table-striped table-hover ">
                        <thead class="thead-inverse">
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
@endsection