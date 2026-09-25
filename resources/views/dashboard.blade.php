@extends('layouts.basic')

@section('content')
<section class="dashboard-welcome py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4 p-md-5">
            <p class="text-uppercase text-muted mb-2">Panel de trabajo</p>
            <h1 class="mb-3">Bienvenido, {{ Auth::user()->name }}</h1>
            <p class="lead mb-4">
              Este es tu espacio de trabajo en RecuperaT. Desde aquí puedes acceder
              rápidamente a las herramientas disponibles para tu cuenta.
            </p>

            <div class="row">
              <div class="col-md-6 mb-3">
                <a class="dashboard-action d-flex align-items-center h-100" href="{{ route('pacientes.index') }}">
                  <i class="fas fa-user-injured fa-2x mr-3" aria-hidden="true"></i>
                  <span>
                    <strong class="d-block">Consulta</strong>
                    <small>Accede a la atención y seguimiento de pacientes.</small>
                  </span>
                </a>
              </div>
              <div class="col-md-6 mb-3">
                <a class="dashboard-action d-flex align-items-center h-100" href="#nav-admin">
                  <i class="fas fa-cogs fa-2x mr-3" aria-hidden="true"></i>
                  <span>
                    <strong class="d-block">Configuraciones</strong>
                    <small>Administra las opciones disponibles para tu perfil.</small>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('partial_css')
.dashboard-welcome {
  min-height: 70vh;
  background: #f6f9fe;
}
.dashboard-action {
  min-height: 96px;
  padding: 1.25rem;
  border: 1px solid #e5ebf5;
  border-radius: .5rem;
  color: #2d405f;
  background: #fff;
  text-decoration: none !important;
  transition: box-shadow .2s ease, transform .2s ease;
}
.dashboard-action:hover {
  color: #1977cc;
  box-shadow: 0 .35rem 1rem rgba(25, 119, 204, .12);
  transform: translateY(-2px);
}
.dashboard-action small {
  color: #6c757d;
}
@endsection
