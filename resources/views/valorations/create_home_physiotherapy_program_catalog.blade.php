@php
$count=-1;
@endphp
@extends("layouts.basic")
@section("content")
<script type="text/javascript" src="/js/valorations/create.js">
</script>
<div id="app">
    <home-physiotherapy-program-component :id={{!empty($O_model) ? $O_model->id : 'false'}}></home-physiotherapy-program-component>
</div>
</div>
@endsection