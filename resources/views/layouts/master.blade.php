<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Walasak</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
    
    {!! Html::style('/css/style.css') !!}
    {!! Html::style('/css/head.css') !!}
    {!! html::script('/js/jquery.js')!!}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav>
      <div class="navArea">
        <div class="container clearFix">
          <h1 class="heading"><a href="#">{!! Html::image('/images/906503.gif') !!}</a></h1>
          <p class="navMobileClick"><a href="#"><i class="fa fa-bars"></a></i></p>
          <ul class="navBar">
            <li><a href="{{ URL::to('crud/') }}">Home</a></li>
            {!! Form::open() !!}
            {!! Form::close() !!}
          </ul>
        </div>
      </div>
    </nav>
    <main>
      @yield('content')
    </main>

    {!! html::script('/js/script.js')!!}
  </body>
</html>