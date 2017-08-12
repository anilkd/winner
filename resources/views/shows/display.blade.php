@extends('layouts.app')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">{!!link_to('/', 'Home')!!}</li>
        <li class="breadcrumb-item">{!!link_to('/shows', 'Shows')!!}</li>
        <li class=" breadcrumb-item active">Create</li>
    </ul>

    <div class="container">

        <ul class="breadcrumb">
            <li><a href="/winner/public">Home</a></li>
            <li><a href="/winner/public/shows">Shows</a></li>
            <li class="active">{{$show->id}}</li>
        </ul>
    </div>
    <div class="container">
        <div class="col-lg-6">

        </div>
    </div>
@endsection