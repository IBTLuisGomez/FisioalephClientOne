@extends('layouts.basic')
@section('content')
    <style>
        table,
        table tr,
        table tr th {
            page-break-inside: avoid;
            break-inside: avoid
        }
        .col-lg-12,.col-md-12,.row,.container {
            display:block;
            float:none;
        }
    </style>
    <div id="app">
        <decision-component :hpp-id = {{$hppId}} :decision="{{$decision}}"></decision-component>
    </div>
@endsection