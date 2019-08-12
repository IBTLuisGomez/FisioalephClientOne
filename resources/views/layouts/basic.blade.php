<!DOCTYPE html>
<html">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src="https://use.fontawesome.com/62e662feb2.js"></script>
  <!-- FontAwesome -->
    <link 
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  @yield("partial_js")
  <title>RehabilitaT</title>
  <style type="text/css">
    .pagination{
      text-align: center;
    }
    .container>span, img{
      cursor:pointer;
      height: 200px;
      width: 200px;
      margin-bottom: 10px;
    }
    i, span{
      cursor:pointer;
      margin-bottom: 10px;
    }
    .carousel-item>img{
      height: 100vh;
      width: 100vw;
    }
    .justify_text{
      text-align: justify;
      text-justify: inter-word;
    }
    .footer-copyright{
      background-color: #375740;
    }
    .page-footer{
      background-color: #a9f086;
    }
    .navbar-dark{
      background-color: #6dc785;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-dark fixed-top navbar-expand-lg">
    <a class="navbar-brand" href="/">RehabilitaT(LOGO)</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Servicios
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Rehabilitación</a>
            <a class="dropdown-item" href="#">Terapia Física</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Otros</a>
          </div>
        </li>
        <li class="nav-item nav-right">
          <a class="nav-link" href="/tienda">Tienda</a>
        </li> 
        <li class="nav-item nav-right">
          <a class="nav-link" href="#">Contacto</a>
        </li> 
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="/checkout" class="nav-link">
            <i class="fa fa-shopping-cart"></i><div style="display: inline;" id="div_cart_size">({{sizeof((
              (session()->get("IDs_cart_products"))?session()->get("IDs_cart_products"):[]
            ))}})</div>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Registro</a>
        </li>
      </ul>
    </div>
  </nav>
        @yield("content")
        @include('layouts.footer')
</body>
</html>
