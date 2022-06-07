@if(!empty($patient))
    <div class="col">
        <div class="row">
            <div class="col-6" style="text-align: left">
                <strong>Nombre: </strong>{{$patient->full_name}}
            </div>
            <div class="col-6" style="text-align: left">
                <strong>Fecha de emisión: </strong>{{date('d-m-Y')}}
            </div>
            <div class="col-lg-6" style="text-align: left">
                <strong>Tratante: </strong>{{Auth::user()->name}}
            </div>
            <div class="col-lg-6" style="text-align: left">
                <strong>Cédula profesional:</strong> {{Auth::user()->license}}
            </div>
        </div>
    </div>
    <br>
@endif