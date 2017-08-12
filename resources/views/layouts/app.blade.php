<!DOCTYPE html>
<html lang="en">
<head>
    <title>FM Winners</title>
    {{--<link href="{{ URL::asset('css/theme.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ URL::asset('css/theme.css') }}" rel="stylesheet">--}}
    <script src="{{ URL::asset('https://code.jquery.com/jquery-1.10.2.min.js') }}"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
    {{--<script src="{{ URL::asset('js/booty.js') }}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
            integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    {{--<a href="#" class="navbar-brand">FM Radio</a>--}}
    {{--<a href="#" class="pull-left"><img  src="img/fever-94.3-fm.jpg"></a>--}}
    {{--<a href="#" class="navbar-brand">Fm Radio</a>--}}

        <a class="navbar-brand" href="/winner">
            <img src="img/rsz_fever.jpg" width="50" height="50" alt="">
        </a>
    {{--<a href="#" class="navbar-brand"><img style="max-width:200px;  max-height:50px; margin-top: -7px;" src="img/logo-half-vertical.png"></a>--}}

    @if (Auth::check())
        <div class="collapse navbar-collapse" id="navbarColor01">

            <ul class="navbar-nav mr-auto">
                <li {{ Request::is('contests*') ? 'class=active' : 'class=nav-item' }}>
                    {{--                    <li class=" nav-item {{  Request::is('contests*') ?active:" }}>--}}
                    {!!link_to('/contests', 'Contests', $attributes = array('class'=>'nav-link'))!!}
                </li>
                <li {{ Request::is('winners*') ? 'class=active' : 'class=nav-item' }} >
                    {!!link_to('/winners', 'Winners', $attributes = array('class'=>'nav-link'))!!}
                </li>
                <li {{ Request::is('gratifications*')  ? 'class=active' : 'class=nav-item' }}>
                    {!!link_to('/gratifications', 'Gratifications', $attributes = array('class'=>'nav-link'))!!}
                </li>
                <li {{ Request::is('shows*')  ? 'class=active' : 'class=nav-item'}}>
                    {!!link_to('/shows', 'Shows', $attributes = array('class'=>'nav-link'))!!}
                </li>

            </ul>
            <ul class="navbar-nav mr-sm-0">
                <li>
                    <a class="nav-link">{!! Auth::user()->name !!}</a>

                </li>
                <li>
                    {!!link_to('auth/logout', 'Logout', $attributes = array('class'=>'nav-link'))!!}

                </li>
            </ul>
        </div>

    @else
        <ul class="navbar-nav mr-sm-0">
            <li>{!!link_to('auth/login', 'Login', $attributes = array('class'=>'nav-link'))!!}</li>
            <li>{!!link_to('auth/register', 'Register', $attributes = array('class'=>'nav-link'))!!}</li>
        </ul>
    @endif
</nav>
    @yield('content')

</body>
</html>