@if(!empty($patient))
    <div class="col">
        <div class="row">
            <div class="col">
                <strong>Nombre: </strong>{{$patient->full_name}}
            </div>
            <div class="col">
                <strong>Fecha: </strong>{{date('d-m-Y')}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                <strong>Tratante: </strong>{{Auth::user()->name}}
            </div>
        </div>
    </div>
@endif