<!DOCTYPE html>
<html lang="en">
<head>
    <title>FM Winners</title>
{{--        <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">--}}
        <link href="{{ URL::asset('css/theme.css') }}" rel="stylesheet">
        {{--<link href="{{ URL::asset('css/theme.css') }}" rel="stylesheet">--}}
        <script src="{{ URL::asset('https://code.jquery.com/jquery-1.10.2.min.js') }}"></script>
        <script src="{{ URL::asset('js/booty.js') }}"></script>
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
        {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

</head>

<body>


<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            {{--<a href="#" class="navbar-brand">FM Radio</a>--}}
            {{--<a href="#" class="pull-left"><img  src="img/fever-94.3-fm.jpg"></a>--}}
            <a href="#" class="pull-left"><img style="max-width:100px;height:50px;" src="img/rsz_fever.jpg"></a>
            {{--<a href="#" class="navbar-brand"><img style="max-width:200px;  max-height:50px; margin-top: -7px;" src="img/logo-half-vertical.png"></a>--}}


            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        @if (Auth::check())
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li {{ Request::is('contests*') ? 'class=active' : '' }}>
                        {!!link_to('/contests', 'Contests', $attributes = array())!!}
                    </li>
                    <li {{ Request::is('winners*') ? 'class=active' : '' }}>
                        {!!link_to('/winners', 'Winners', $attributes = array())!!}
                    </li>
                    <li {{ Request::is('gratifications*') ? 'class=active' : '' }}>
                        {!!link_to('/gratifications', 'Gratifications', $attributes = array())!!}
                    </li>
                    <li {{ Request::is('shows*') ? 'class=active' : '' }}>
                        {!!link_to('/shows', 'Shows', $attributes = array())!!}
                    </li>
                    <form action="search.php" class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a>{!! Auth::user()->name !!}</a></li>
                    <li>{!!link_to('auth/logout', 'Logout', $attributes = array())!!}</li>
                </ul>
            </div>

        @else
            <ul class="nav navbar-nav navbar-right">
                <li>{!!link_to('auth/login', 'Login', $attributes = array())!!}</li>
                <li>{!!link_to('auth/register', 'Register', $attributes = array())!!}</li>
            </ul>
        @endif
    </div>
</div>

<div class="container">
    @yield('content')

</div>
</body>
</html>