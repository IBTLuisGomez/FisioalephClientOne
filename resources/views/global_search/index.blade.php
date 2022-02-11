@extends('layouts.basic')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-responsive">
          <th>Nombre</th>
          <th>Tipo</th>
          <th>Acción</th>
          @foreach($resultsArray as $type => $resultRows)
          @if(!$resultRows)
            @continue
          @endif
            @foreach($resultRows as $row)
              <tr>
                <td>{{$row['name']}}</td>
                <td>{{$type}}</td>
              </tr>
            @endforeach
          @endforeach
        </table>
      </div>
    </div>
  </div>
@endsection