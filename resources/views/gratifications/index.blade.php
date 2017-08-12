@extends('layouts.app')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item active">Gratifications</li>
    </ul>
    <div class="container">

        <legend>Gratifications</legend>
        <div>
            {!!link_to('gratifications/create', 'Add Gratification', $attributes = array('class' =>'btn btn-link'))!!}

        </div>
        @if(isset($gratifications)&& count($gratifications)>0)
            <table class="table table-striped table-hover ">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Quantity</th>
                    <th>Expire Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($gratifications as $gratification)

                    <tr>
                        <td>{{$gratification->id}}</td>
                        <td>{{$gratification->grat_name}}</td>
                        <td>{{$gratification->grat_value}}</td>
                        <td>{{$gratification->quantity}}</td>
                        <td>{{$gratification->expire_date}}</td>
                        <td>{!! link_to_action('GratificationController@edit', 'Edit', array($gratification->id)) !!} </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            @include('pagination', ['collection' => $gratifications])
        @else
            <p class="text-warning">No Gratifications yet</p>
        @endif
    </div>

@stop
