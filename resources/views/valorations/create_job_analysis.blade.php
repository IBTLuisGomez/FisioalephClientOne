@php
$count=-1;
@endphp
@extends("layouts.basic")
@section("content")
<div id="app">
    <job-analysis-component :id={{!empty($O_model) ? $O_model->id : 'false'}}></job-analysis-component>
</div>
</div>
@endsection