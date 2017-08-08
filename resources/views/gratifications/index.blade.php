@extends('layouts.app')

@section('content')
    <br>
    <br>
    <br>
    <div class="col-lg-12 container">

        <ul class="breadcrumb">
            <li><a href="/winner/public">Home</a></li>
            <li class="active">Gratifications</li>
        </ul>
    </div>
    <h1>Gratifications</h1>
    <div>
        <div>
            {!!link_to('gratifications/create', 'Add Gratification', $attributes = array('class' =>'btn btn-link'))!!}

        </div>
         @if(isset($gratifications)&& count($gratifications)>0)
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Quantity</th>
                    <th>Expire Date</th>
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
            {!! $gratifications->render() !!}
    </div>

    @else
        <p class="text-warning">No Gratifications yet</p>
    @endif

@stop
