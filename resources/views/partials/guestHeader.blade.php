<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>@yield('title')</title>
     {{-- <link rel="stylesheet" href="style.css?t=777444448"> --}}
{{-- <link rel="icon" href="logo.png" /> --}}
<script src='https://kit.fontawesome.com/f0841bede9.js' crossorigin='anonymous'></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
     @vite(['resources/css/app.css','resources/js/app.js'])
 </head>
 <body style=" background-color:#F8F8F8;    background: #1F3EA3;" class="">
<header>
    <div class="row navbaruser">
        <div class="col-1"></div>
      <a href="/" style="font-size: 40px;text-decoration:none; font-family:cursive; font-weight: 900;
      background: -webkit-linear-gradient(#ff3c00, rgb(204 204 253));
      -webkit-background-clip: text;-webkit-text-fill-color: transparent;
        " class="col-md-2 mt-2 col-12 text-center">WORFAC</a>
      <a href="/#fonc" class="col-md-2 col-12 mt-md-4  mt-2  text-center" style="color: #1f3ea3;">Fonctionnalités</a>
      <a href="/#prix" class="col-md-1 col-12 mt-md-4 mt-2  text-center" style="color: #1f3ea3;">Prix</a>
      <a href="/#avant" class="col-md-1 col-12 mt-md-4 mt-2  text-center" style="color: #1f3ea3;">Avantages</a>
      <a href="{{route('contact')}}" class="col-md-1 col-12 mt-md-4  mt-2  text-center"style="color: #1f3ea3;">Contact</a>
      <a href="{{route('inscription')}}" class="col-md-2 col-12 mt-md-3 mt-2 text-center ins " style="" ><i  class="far fa-check-square rounded-pill"> <div style='    display: block;
   float: left;
   float: right;
   background: none;
   margin-left:2px;'> Inscription</div></i> </a>
      <a href="{{route('connexion')}}" class="col-md-2 col-12 mt-md-3 mt-2text-left  logSel" style=""><i class="rounded-pill fas fa-random fa-4x"> <div style='    display: block;
   float: left;
   float: right;
   background: none;'> Connexion</div></i></i><div>
      
      </div></a>
    </div>
   </header>
   @yield('content')