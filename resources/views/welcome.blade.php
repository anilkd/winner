@extends('layouts.app')

@section('content')
    <style>
        .wrapper { float: left; clear: left; display: table; table-layout: fixed; }
        img.img-responsive { display: table-cell; max-width: 100%; }
        .carousel img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: 500px;
        }
    </style>

    @if(isset($gratifications)&& count($gratifications)>0)
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                @foreach($gratifications as $key=> $gratification)
                    <li data-target="#myCarousel" data-slide-to={{$key}} class="{{$key==0?'active':''}}"></li>

                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach($gratifications as $key=> $gratification)
                    <div class="carousel-item {{$key==0?'active':''}}">
                        <div class="img-responsive jumbotron col-lg-12">
                            <img  class="img-responsive" src="https://appharbor.com/assets/images/stackoverflow-logo1.png" onerror="this.src='http://www.nextflowers.co.uk/assets/images/md/no-image.png'" />

                            {{--<object data="http://www.nextflowers.co.uk/assets/images/md/no-image.png" type="image/png">--}}
                                {{--<img class="img-responsive" src="https://appharbor.com/assets/images/stackoverflow-logo.png"/>--}}
                            {{--</object>--}}
                            <div class="carousel-caption d-none d-md-block">
                                <h3 align="center">{{$gratification->grat_name }}</h3>
                                <h4 align="center">{{$gratification->expire_date}}</h4>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>


            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @endif

    <script>
        $(function () {
            $('.carousel').carousel({
                interval: 2000
            });
        });
    </script>
@endsection
