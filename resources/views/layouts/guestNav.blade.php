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
      {{-- <link rel="stylesheet" href="{{ asset('./resources/css/app.css') }}"> --}}
      {{-- <script src="{{ asset('./resources/js/app.js') }}"></script> --}}
      {{-- <link rel="stylesheet" href="{{ asset("/resources/css/app") }}"> --}}
      {{-- <script src="{{asset("/resources/js/app") }}"></script> --}}
     {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
     {{-- @vite(['resources/css/app.css']) --}}
<style>
    /*---------------------------Nav bar user-----------------------*/
body{           
    background-color:#F8F8F8;
}
*{
background-color:#F8F8F8;
font-family: cursive;
}
.navbaruser a{

text-decoration: none;
color: #1f3ea3;
font-weight: 900;
font-size:110%;
font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
.navbaruser a:hover{
color: black;
}
.ins i div{
font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
.ins i{
background-color: #f60;
color: white; 
padding-left:20px;
padding-right:20px;
padding-top:10px;
padding-bottom:10px;
font-size: 110%;
}
.ins i:hover{
color:rgb(241, 240, 240);
}
.logSel i{
background-color:#f7f9ff;
color:#f60; 
border:1px solid #f60;
padding-left:20px;
padding-right:20px;
padding-top:10px;
padding-bottom:10px;
font-size: 110%;
}
.logSel i:hover{
color:#1f3ea3;
border:1px solid #1f3ea3;
}
@media only screen and (max-width: 765px){
.logSel{
text-align: center;
}
}
/*-------------------------NAV BAR -----------------------*/


/* app style */

body{
background-color:#F8F8F8;
font-family: system-ui;
}
*{  display: relative;
   background-color:#F8F8F8;
   overflow-x: hidden;
   font-family: system-ui;
}
i{
   overflow-y: hidden;
}
.col-12,.col-10,h5,h4,p,h3,h1,img,h2,div,.h6{
   overflow-y: hidden;
}
header a{
    text-decoration: none;
    color: none;
}
header div {
    cursor: pointer;
}
ul li{
    list-style: none;
    font-size: 20px;
    margin-top: 10px;
}
 ul li i{
 color: #f60;
 }
h1,.info2 h3,.info3 h2, .info6 h6{
    color: #1F3EA3;
    font-size:50px;
}
h2{
font-weight: 900;
background: -webkit-linear-gradient(#f60, rgb(129, 129, 232));
/* -webkit-background-clip: text; */
-webkit-text-fill-color: transparent;
}
.info3 .img{
    height:62vh;
    background-size: 100% 100%;
    margin-top: 50px;
    border-radius:20px;
    background-color: #eceaea;
}
.info{
    padding-left: 120px;
}
.info div{
    box-shadow: 1px 1px 20px #ffff;
    cursor: pointer;
    margin-left: 15px;
}
.info div h3{
    font-size: 20px;
}
.info div p{
    font-size: 15px;
}
.info div:hover{
   box-shadow: 1px 1px 20px #d0d0d0; 
}
.info1 div  h3{
    color: #1F3EA3;
    background-color: #eceaea;
}
.info1 div p{
    background-color: #eceaea;
    font-family: system-ui;
}
.info1:hover{
    cursor: pointer;
}
.info2,.info6{
    padding-left: 60px;
}
.info div{
 border-radius: 10px;
}
.info3{
    width: 110%;
    background-color: #eceaea;
}
/*fooooooooter*/
.footer{
    background-color: #1F3EA3;
    
}
.footer div{
  padding-left: 20%;
  background-color:#1F3EA3;
}
.footer .col-12,.footer a{
   background-color:#1F3EA3;
   color: white;
   text-decoration: none;
   
}
/*********************************************/
.info3 label{
   font-weight: 900;
background: -webkit-linear-gradient(#ff3c00, rgb(204 204 253));
/* -webkit-background-clip: text; */
-webkit-text-fill-color: transparent;
font-size: 50px;
font-family: system-ui;
}
.info6 i{
   color: #f60;
    }
 .info6  h4{
    color: #1F3EA3;
    font-weight: 900;
}
.prix{
    background-color: #ededed;
    border-radius: 10px;
}
.divs{
    margin-left: 13.4%;
 }
 .divs div{
     margin-left: 2px;
 }
.divs h3,.divs i,.divs h4,.divs p,.divs button,.divs a{
    background-color:#ededed;
    
}
.divs h3,.divs i{
    color: #f60;  
}
.divs button{
    color: #f60;
    border:1px solid#f60;
    font-size: 20px;
    padding: 10px;
}
.divs h4{
    color:#1F3EA3;
}
.crois{
   padding-top: 75px;
   padding-bottom: 75px;
}
.divs div:hover{
    cursor: pointer;
     transform:scale(1.01);
}
.crois,.crois h3,.crois i,.crois h4,.crois p,.crois button,.crois a{
    background-color: #f60;
}
.crois h3,.crois i,.crois h4,.crois button,.crois p{
    color: white;  
}
.crois button{
    margin-top: 20px;
   background-color: #1F3EA3;
}
.divs button:hover{
   color: #1F3EA3;
    border:1px solid#1F3EA3;
}
.crois button:hover{
   color: white;
   border:0;
   background-color: #1F3EA3;
}
span{
   background-color: #1F3EA3;font-size: 25px;font-family:system-ui
}
.btnn{
   background-color: #1F3EA3;
font-size: 15px;
margin-bottom: 10px;
color: white;
}
.btnn:hover{
    background-color:#4E74F0 ;font-size: 15px; color: white;    margin-bottom: 10px;
}

body{background-color: gray;}
.more{
   padding:1px;margin:0;background:white; text-align: left;border-radius:0;border:1px solid white;color: #1F3EA3;
background: transparent;
color: #1F3EA3;
font-size: 20px;
text-align: left;
}
.more:hover{
   padding:1px;margin:0;background:white; text-align: left;border-radius:0;border:1px solid white;color: #f60;
background: transparent;
font-size: 20px;
text-align: left;
}
.pack{
    margin-left:5px;
   color: #1F3EA3;
}
.pack .div{
   width:29.5%
}
.sss{
   padding:5px;
   border:1px solid #f60;
   background-color:#f60;
   font-size:20px;
   color:white; 
   border-bottom: 2px solid #a54200;
}
.sss:hover{
   color: white;
   border:1px solid rgb(252, 138, 62);
   background-color: rgb(252, 138, 62);
   border-bottom: 2px solid #a54200;
}
.pack .div{
   margin-left: 40px;
   background-color:white;
}
.pack i{
   color: #f60;
   background-color:white;
}
@media only screen and (max-width: 765px){
.pack{
   margin-left: 10px;
}
.pack .div{
   margin-left: 5px;
   width:96%;
}  
.pack .ddd{
   text-align: center;
}
}
.imgIcon{
   background-size: 20px 20px;
   width: 20px;
   height: 20px;
}
#demo:hover{
   border-radius:5px;background-color: #1F3EA3;color: white;text-decoration: none;padding: 26px;font-size: 30px;
}
#demoi{
   border-radius:5px;background-color: #335adb;color: white;text-decoration: none;padding: 20px;font-size: 25px;padding-top: 8px;;
}
#demo{
   border-radius:5px;background-color: #3464ff;color: white;text-decoration: none;padding: 26px;font-size:30px;
}
.iphone{
background-color:transparent;border:0;width:23%;height:15vh;background-size:100% 100%;
margin-left:30px;
}
.android{
background-color:transparent;border:0;width:23%;height:15vh;background-size:100% 100%;

}
.iphone:hover{
background-color:transparent;border:0;width:23%;height:15vh;background-size:100% 100%;
filter: sepia(60%);
}
.android:hover{
background-color:transparent;border:0;width:23%;height:15vh;background-size:100% 100%;
filter: grayscale(80%);
}
@media only screen and (max-width: 765px){
   .iphone{
background-color:transparent;border:0;width:200px;height:120px;background-size:100% 100%;
margin-left:0;
}
.android{
background-color:transparent;border:0;width:200px;height:120px;background-size:100% 100%;
}
    .iphone:hover{
background-color:transparent;border:0;width:200px;height:120px;background-size:100% 100%;
margin-left:0;
}
.android:hover{
background-color:transparent;border:0;width:200px;height:120px;background-size:100% 100%;
}

#demo{
   border-radius:5px;background-color: #3464ff;color: white;text-decoration: none;padding: 26px;font-size:20px;
   width: 110%;
}
   .crois{
       transform:scale(1);
   }
  .info{
      padding-left:20px;
  }
  .devs{
    margin-left: 2%;
   }
   .info div{
       margin-left: 0;
   }
   .info div h3{
    font-size: 25px;
   }
   .info div p{
       font-size: 18px;
   }
   .footer div{
     padding-left: 3%;
     background-color:#1F3EA3;
    }
}

/* app style */
</style>
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
