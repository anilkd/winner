@extends('layouts.app')

@section('content')
<ul class="breadcrumb">
    <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
    <li class="breadcrumb-item"> {!!link_to('/contests', 'Contests')!!}</li>
    <li class=" breadcrumb-item active">{{$contest->name}}</li>
</ul>

<div class="container">
    {!! link_to_action('ContestController@exportPDF', 'Export',  $attributes = array($contest->id)) !!}

    <div class="card card-inverse card-info text-xs-center">
        <div class="card-block">
            <blockquote class="card-blockquote">
                <ul>
                    <li>{{$contest->name}}</li>
                </ul>
            </blockquote>
        </div>
    </div>
    @foreach($contest->shows as $show)
    <div class="card card-inverse card-primary text-xs-center">
        <div class="card-block">
            <blockquote class="card-blockquote">
                <ul>
                    <li>{{$show->show_name}}</li>
                </ul>
            </blockquote>
        </div>
    </div>
    @endforeach
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
            <td>{!! link_to_action('WinnerController@edit', 'Edit', array($winner->id)) !!}</td>

        </tr>
        @endforeach

        </tbody>
    </table>
    <!--    @include('pagination', ['collection' => $winners])-->
    @endif
</div>
@endsection