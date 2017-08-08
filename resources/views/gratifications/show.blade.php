<!DOCTYPE html>
<html>
<head>
    <title>Winner {{ $winner->id }}</title>
</head>
<body>
<h1>Winner {{ $winner->id }}</h1>
<ul>
    <li>Make: {{ $winner->make }}</li>
    <li>Model: {{ $winner->model }}</li>
    <li>Produced on: {{ $winner->produced_on }}</li>
</ul>
</body>
</html>