<!DOCTYPE html>
<html lang="en">
<head>
    <title>FM Winners</title>
    <head>
        <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('https://code.jquery.com/jquery-1.10.2.min.js') }}"></script>
        <script src="{{ URL::asset('js/booty.js') }}"></script>
    </head>
</head>

<body>


<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">FM Radio</a>
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