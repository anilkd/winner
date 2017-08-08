@extends('layouts.app')

@section('content')
<h1>Winner {{ $winner->id }}</h1>
<ul>
    <li>Make: {{ $winner->show_name }}</li>
    <li>Model: {{ $winner->rj_name }}</li>
</ul>
@endsection