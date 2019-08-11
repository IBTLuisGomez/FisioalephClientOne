@extends('layouts.basic')

@section('content')
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-bottom: 20vh;">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images/15651582085167007535d4a6b4023939.jpeg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/156515640619201075545d4a643676a4c.jpeg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/156515818011155854425d4a6b2445322.jpeg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="container">
    <div class="row">
        <div style="width:100vw; text-align: center;">
            <h2>HOLA</h2>
        </div>
        <div class="justify_text">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras rhoncus ex vel mauris tincidunt commodo. Quisque commodo sed felis in luctus. Mauris interdum gravida rhoncus. Quisque mollis mi at eros congue, sit amet convallis enim venenatis. Nullam eu hendrerit felis, mattis ullamcorper augue. Sed viverra dolor sed diam sollicitudin, sed ultrices nunc fermentum. Cras eget lacus ac massa cursus aliquam. Aenean rutrum velit ligula, quis tincidunt risus facilisis eget. Nullam quis pharetra est. Donec blandit interdum consequat. Nam et maximus ante. Donec convallis, neque vel luctus sodales, quam tortor consequat dui, ut ultrices ante neque in erat.
          <br/>
          <br/>
          <img src="images/correct.png"/>
          Aliquam euismod justo velit, sit amet vehicula turpis lobortis id. Phasellus sollicitudin, nisi quis pulvinar viverra, mauris augue tempor lectus, suscipit ultrices est quam sed quam. Morbi eget risus odio. Praesent malesuada vitae lectus non varius. Integer consectetur, augue eget volutpat faucibus, dui tellus commodo nisl, ac fermentum dui eros sed nunc. Quisque varius ex id ante dapibus luctus. Mauris suscipit ultrices nisi at fermentum. Pellentesque laoreet accumsan ultricies.
          <br/>
          <br/>
          Suspendisse vitae efficitur lectus. Nunc tincidunt leo ante, dictum tempor lectus dignissim quis. Curabitur hendrerit dignissim elementum. Ut blandit tincidunt ipsum a sagittis. Mauris nec nibh nulla. Sed dictum odio odio, eget semper sem hendrerit et. Suspendisse dui erat, scelerisque ornare urna in, aliquet eleifend nisi. Cras commodo vitae elit eu sagittis.
          <br/>
          <br/>
          Sed sit amet efficitur augue, quis tincidunt neque. Sed vitae blandit diam. Quisque auctor ligula vel augue egestas, et luctus nisl malesuada. Aliquam dignissim elementum orci, sit amet consectetur dolor interdum at. Quisque et orci non lacus tristique semper et eu lorem. Sed laoreet auctor dapibus. In aliquet, erat ut imperdiet congue, arcu nisi aliquet risus, vel semper metus nisl ac augue. Cras justo neque, lobortis vitae hendrerit ut, mattis sed libero. Integer porttitor orci nec sapien ultricies vulputate eu ultrices nisi. Nullam arcu ex, efficitur ultricies erat et, tincidunt dictum dolor. Pellentesque laoreet tempus sem, vel venenatis libero finibus eu. Suspendisse non lorem ipsum. Vivamus pellentesque vulputate tellus volutpat interdum.<br/>
          Aenean lacinia, elit gravida finibus feugiat, justo sem luctus ipsum, ut tempor tortor nibh feugiat augue. Sed scelerisque nisl a nunc pretium mattis. Aenean diam dolor, suscipit ut metus et, dignissim accumsan dolor. Nunc molestie eu lectus et finibus. Aenean faucibus laoreet magna, ut bibendum velit iaculis a. Curabitur fringilla vel erat nec pulvinar. Vivamus congue dolor non consectetur rhoncus. Sed sed velit est. Mauris a imperdiet felis. Ut vehicula eleifend fringilla. Maecenas suscipit orci orci, eu vehicula velit finibus ac. Sed facilisis turpis vitae lorem porttitor sagittis. 
        </div>
    </div>
  </div>
@endsection
