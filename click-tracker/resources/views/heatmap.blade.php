@extends('layouts.stats')
@section('title')
    Heatmap
@endsection
@section('content')

<canvas id="canvas" width="1903" height="1413"></canvas>
<div id="unclickable">
        <iframe id= "frame" src="http://tasklist/tasks" allow="fullscreen" frameborder="no" sandbox="allow-forms-no" scrolling="no">
        </iframe>
</div>
<link rel="stylesheet" href="{{ asset("assets/css/heat.css") }}">
<script src="{{ asset('assets/js/simpleheat.js') }}"></script>

<script>
    let data = {!! json_encode($coords) !!};
</script>
<script src="{{ asset('assets/js/customheat.js') }}"></script>







@endsection('content')
