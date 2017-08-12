@extends('layouts.app')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item active">Winners</li>
    </ul>

    <div class="container">
        <legend>Winners</legend>

        {!!link_to('winners/create', 'Add Winner', $attributes = array('class' =>'btn btn-link'))!!}

        @if(isset($winners)&& count($winners)>0)
            <table class="table table-striped table-hover ">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Show</th>
                    <th>Rj</th>
                    <th>Contest</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Area</th>
                    <th>Issued</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($winners as $winner)

                    <tr>
                        <td>{{$winner->id}}</td>
                        <td>{{$winner->winner_name}}</td>
                        <td>{{$winner->show()->show_name}}</td>
                        <td>{{$winner->rj_name}}</td>
                        <td>{{$winner->contest()->name}}</td>
                        <td>{{$winner->phone_no}}</td>
                        <td>{{$winner->email}}</td>
                        <td>{{$winner->area_name}}</td>
                        <td>{{$winner->gift_issued_date}}</td>
                        <td>{!! link_to_action('WinnerController@edit', 'Edit', array($winner->id)) !!} </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            @include('pagination', ['collection' => $winners])
        @else
            {{--<p class="text-warning">No Winners yet</p>--}}
        @endif

    </div>

@stop
