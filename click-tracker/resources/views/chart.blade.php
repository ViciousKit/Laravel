@extends('layouts.stats')
@section('title')
    График
@endsection
@section('content')
    <div class="chart">
        {!! $chart->container() !!}

        {!! $chart->script() !!}
    </div>


@endsection('content')
