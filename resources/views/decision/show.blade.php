@extends('layouts.basic')
@section('content')
    <div id="app">
        <decision-component :hpp-id = {{$hppId}}></decision-component>
    </div>
@endsection