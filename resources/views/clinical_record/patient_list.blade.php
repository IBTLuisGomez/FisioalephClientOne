@extends("layouts.basic")
@section("content")
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<?php foreach($patients as $patient): ?>
			<?php endforeach; ?>		
		</div>
	</div>
</div>
@endsection