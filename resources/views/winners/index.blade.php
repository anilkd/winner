@extends('layouts.app')

@section('content')
    <br>
    <br>
    <br>
    <div class="col-lg-12 container">

        <ul class="breadcrumb">
            <li><a href="/winner/public">Home</a></li>
            <li class="active">Winners</li>
        </ul>
    </div>
        <h1>Winners</h1>
    <div >
        <div>
            {!!link_to('winners/create', 'Add Winner', $attributes = array('class' =>'btn btn-link'))!!}

        </div>
        @if(isset($winners))
            <table class="table table-striped table-hover ">
                <thead>
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
            {!! $winners->render() !!}
    </div>

    @else
        <p class="text-warning">No Winners yet</p>
    @endif

@stop
