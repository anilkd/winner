@extends('layouts.app')

@section('content')
    <br>
    <br>
    <br>
    @if(isset($gratifications)&& count($gratifications)>0)
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                @foreach($gratifications as $key=> $gratification)
                    <li data-target="#myCarousel" data-slide-to={{$key}} class="{{$key==0?'active':''}}"></li>

                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($gratifications as $key=> $gratification)
                    <div class="item {{$key==0?'active':''}}">
                        <div class="jumbotron">
                            <h3>{{$gratification->grat_name }}</h3>
                            <h4>{{$gratification->expire_date}}</h4>
                        </div>
                    </div>

                @endforeach
            </div>


            <!-- Left and right controls -->

            <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
    @endif
@endsection
