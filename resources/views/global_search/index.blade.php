@extends('layouts.basic')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-responsive">
          <th>Nombre</th>
          @foreach($resultsArray as $type => $resultRow)
            <tr>
              <td><a target="_blank" href="https://biblioteca.fisioaleph.com/xmlui/{{$resultRow->handle}}">{{$resultRow->name}}</a></td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
@endsection