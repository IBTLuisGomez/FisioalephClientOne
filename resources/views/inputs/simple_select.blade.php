<label>{{$value['label']}}</label>
<select class="form-control" name = '{{$value['key']}}'>
	@foreach($options as $key => $option)
		<option value='{{$key}}'>{{$option}}</option>
	@endforeach
</select>