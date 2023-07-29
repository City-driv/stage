<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>@yield('title')</title>
     <link rel="icon" href="{{asset('/imgs/logo.png')}}" />
    <script src='https://kit.fontawesome.com/f0841bede9.js' crossorigin='anonymous'></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
     @vite(['resources/css/app.css','resources/js/app.js'])
 </head>
 <body style=" background-color:#F8F8F8;    background: #1F3EA3;" class="">
    @auth
        <div class="row">
        <div class="col-11" style="font-family: system-ui;text-align:right;">
           <a href="{{route('logout')}}"><button class="bg-danger" name="deco" type="submit" style="font-family: system-ui;margin-top:10px;padding:5px;border-radius:5px;color:white;border:white;"><i style="background: transparent; margin-bottom:-3px" class="fas fa-sign-out-alt"></i>se déconnecter</button></a>
        </div></div>
    @endauth
    @guest
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
        @if (session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif    
    @endguest



   @yield('content')


   <div style="width: 109%;max-width: 104%;" class="row">
    <div class="col-md-3 col-12 pt-5 footer text-white">
        <div class="row">
        <div class="col-12 h4"style=""><a>Mode paiement</a></div>   
                    <div class="col-12" style="padding-left: 15px;font-size: 25px;"><a href="{{route('payement')}}">
                    <img src="imgs/paiement.png" style="width:100%;height:18vh;background-color:#1F3EA3;" alt="" srcset="">
                </a></div>
        </div>
    </div>
    <div class="col-md-3 col-12 pt-5 footer ">
        <div class="row">
             <div class="col-12 h3"style=""><a>Accès rapide</a></div>
             <a style="font-weight: bolder;font-family: cursive;" href="/" class="col-12"><i class="fas fa-chevron-right" style="background-color: #1F3EA3;"></i> Acceuil</a>
             <a style="font-weight: bolder;font-family: cursive;" href="{{route('factureGratuit')}}" class="col-12"><i class="fas fa-chevron-right" style="background-color: #1F3EA3;"></i> Facture en Ligne Gratuit</a> 
             <a style="font-weight: bolder;font-family: cursive;" href="/#fonc" class="col-12"><i class="fas fa-chevron-right" style="background-color: #1F3EA3;"></i>  Comment ça marche ?</a>
             <a style="font-weight: bolder;font-family: cursive;" href="{{route('inscription')}}" class="col-12"><i class="fas fa-chevron-right" style="background-color: #1F3EA3;"></i>  S'inscrire</a>
             <a style="font-weight: bolder;font-family: cursive;" href="{{route('connexion')}}" class="col-12"><i class="fas fa-chevron-right" style="background-color: #1F3EA3;"></i>  Se connecter</a>
        </div>              
    </div>
    <div class="col-md-3 col-12 pt-5 footer">
        <div class="col-12 h2" style="">
            Notre Bureau
        </div>
        <div style="font-weight: bolder;font-family: cursive;" class="col-12"><i class="fas fa-map-marker" style="background-color: #1F3EA3;"></i> <a>59 Boulevard Zerktouni Résidence Les Fleurs 7eme étage App N° 20 CASABLANCA.</a>  </div>            <div style="    font-weight: bolder;font-family: cursive;" class="col-12"><i class="fas fa-envelope-open" style="background-color: #1F3EA3;"></i> <a href="mailto:support@worfac.com"> support@worfac.com</a>  </div>            <div style="    font-weight: bolder;font-family: cursive;" class="col-12"><i class="fas fa-phone-square-alt fa-lg"  style="background-color: #1F3EA3;"></i> <a href="tel:0606098827">+212606098827</a></div>
    </div>
    <div class="col-md-3 col-12 pt-5 footer">
        <div style="font-size: 30px;" class="col-12 h2">
            Suivez-nous
        </div>
        <div class="col-12 ">
            <a target="_blank" href=" https://www.facebook.com/Ganet-web-111396238064112"><i class="fab fa-facebook fa-2x" style="background-color: #1F3EA3;"></i></a>
            <a href=""><i class="fab fa-linkedin fa-2x" style="background-color: #1F3EA3;"></i></i></a>
            <a href=""><i class="fab fa-twitter-square fa-2x"  style="background-color: #1F3EA3;"></i></a>
            <a target="_blank" href="https://www.youtube.com/channel/UCYV91Rsiqw37mFxK7RBNykA"><i class="fab fa-youtube fa-2x" style="background-color: #1F3EA3;"></i></a>
        </div>
    </div>
    <div class=" footer text-white col-12 text-center">
       <strong style="background-color:transparent;">
           &copy;{{date('Y')}} WORFAC
       </strong> 
    </div>
 </div>

   <script src="https://kit.fontawesome.com/f0841bede9.js" crossorigin="anonymous"></script>      
</body>
 </html>
