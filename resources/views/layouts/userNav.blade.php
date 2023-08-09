<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title')</title>
   <link rel="icon" href="{{asset('/imgs/logo.png')}}" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   @yield('headInfo')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/f0841bede9.js" crossorigin="anonymous"></script>
   <style>
       .row .div{
           text-align: center;
       }
       body {
            font-family: Arial, Helvetica, sans-serif;
       }
        .notification {
        color: #907601;
        text-decoration: none;
        padding: 15px 26px;
        position: relative;

        display: inline-block;
        border-radius: 2px;
        }

        .notification:hover {
        color: #BD9B02;
        }
        a:hover{
        color: black;
        }

        .notification .badge {
        position: absolute;
        top: -10px;
        right: -10px;
        padding: 15px 20px;
        border-radius: 50%;
        background-color: #263137;
        color: white;
        }
        .etape button{
            margin-bottom: 4px;
            margin-left: 5px;
            background-color: rgb(243, 238, 215);
            border: 0;text-align: left;
            width: auto;
        }
        .etape a{
            text-decoration: none;
            color: rgb(54, 54, 54);
            
        }
        .e{
            border: 2px solid rgb(181, 154, 65);  
        }
        .e .col-12{
                background-color: rgb(181, 154, 65);
                color: rgb(54, 54, 54);
        }
body{
    overflow-x:hidden;
}
.nav{
    text-decoration: none;
    width: 100%; 
    margin-bottom:50px;
    background-color: rgb(54, 54, 54);
}
.LogOut{
    color: rgb(241, 53, 53);
}
.menu{
   
    text-decoration: none;
}
.menu div{
    padding: 20px 0 5px 5px;
    padding-top: 10px;
    display: inline-block;
    text-align: center;
    font-family:monospace;
    font-size: auto;
    cursor: pointer;
     color: rgba(230,197,90,1);
}
.menu a {
    text-decoration: none;
     color: rgba(230,197,90,1);
}
.menu div:hover,.menu a:hover{
    background-color: rgb(72, 72, 72);
    color: rgba(230,197,90,1);
}
.toggle{
    font-size: 36px;
    display: none;
    color: white;
}
#toogle{
    display: none;
}
.button{
    background: none;
    text-decoration: none;
         border: 0;
         color: red;
         font-family:monospace;
}
.menu ul {
    display: none;
    margin-top: 4px;
    position: absolute;
    z-index: 3;
    margin-left: -1%;
}
.menu div:hover ul{
    display: block;
}
.menu ul li{
    list-style: none;
    padding: 8px;
    text-align: left;
    position: relative;
    background-color: rgb(72, 72, 72);
    color: rgba(230,197,90,1); 
}
.menu ul li :hover {
    color: rgb(243, 247, 0);
}
@media only screen and (max-width: 900px){
  .toggle{
        display: block;
        cursor: pointer;
    }
    .menu{
        margin-top: -24px;;
    }
    .menu ul {
        width: 100%;
        padding: 0;
        display: none;
        position: absolute;
        
    }
    .menu ul li{
        list-style: none;
    width: 100%;
    text-align: center;
    box-shadow:   5px 00px 10px rgba(230,197,90,1) inset ;
        border-bottom: 2px solid  rgba(230,197,90,1);
    
}
    .menu{
    text-align: center;
    width:100%;
    margin-top: 10px;
    display: none;
    z-index:2;
    }
    .menu div{
        background-color: rgb(54, 54, 54);
        display: block;
        font-size:120%;
        box-shadow:   5px 00px 10px rgba(230,197,90,1) inset ;
        border-bottom: 2px solid  rgba(230,197,90,1);
    }
     #toogle:checked+.menu{
        display: block;     
      }
     #toogle:checked+.btn{
       display:none;
      }
      .button{
         background-color:rgb(54, 54, 54);; 
         width:100%;
      }
     }
     
     
    </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
       <div class="nav bootstrap-off">
        <label class="toggle" style="color:rgba(230,197,90,1)" for="toogle"><i class="fas fa-list"></i></label>
        <input type="checkbox" name="" id="toogle">
        <div class="menu ">
            <div>
                    <a style="padding-left: 10px;padding-right: 10px;" href="{{route('home')}}"><i class="fas fa-home"></i></a>         
               </div>
               <div><i class="fas fa-address-card"></i> Contacts <i class="fas fa-angle-double-down"></i>
                     <ul>
                         <li><a href="{{route('clients.create')}}"><i class="fas fa-plus-square"></i> Nouveau Client</a></li>
                         <li><a href="{{route('clients.index')}}"><i class="fas fa-tasks"></i> Gestion  des Clients</a></li>
                         <li><a href="{{route('clients.index')}}"><i class="fas fa-file-excel"></i> Import Clients</a></li>
                         <li><a href="{{route('fournisseur.create')}}"><i class="fas fa-plus-square"></i> Nouveau Fournisseur</a></li>
                         <li><a href="{{route('fournisseur.index')}}"><i class="fas fa-th-list"></i> Gestion des fournisseurs</a></li>
                         <li><a href="{{route('fournisseur.liste')}}"><i class="fas fa-list-ul"></i> Liste des fournisseurs</a></li>
                    </ul>
                </div>
               <div><i class="far fa-newspaper"></i> Articles <i class="fas fa-angle-double-down"></i>
               <ul>
                       <li><a href="{{route('article.create')}}"><i class="fas fa-plus-square"></i> Nouveau Article</a></li>
                        <li><a href="{{route('article.index')}}"><i class="fas fa-tasks"></i> Gestion  des Articles</a></li> 
                        <li><a href="{{route('article.index')}}"><i class="fas fa-file-excel"></i> Import articles</a></li>
                        <li><a href="{{route('etat.stock')}}"><i class="fas fa-battery-half"></i> état stock</a></li>
                        
                    </ul>
               </div>
               <div><i class="fas fa-calendar-check"></i> Ventes <i class="fas fa-angle-double-down"></i>
                <ul>
                    <li><a href="{{route('facture.type')}}"><i class="fas fa-plus-square"></i> Nouveau Facture</a></li>
                    <li><a href="{{route('all.factures',['type'=>'f'])}}"><i class="fas fa-stream"></i> Liste des factures</a></li>
                    <li><a href="{{route('bon-liv.type')}}"><i class="fas fa-plus-square"></i> Nouveau bon Livraison</a></li>
                    <li><a href="{{route('all.factures',['type'=>'bl'])}}"><i class="fas fa-stream"></i> Liste des Bons Livraison</a></li>
                    <li><a href="{{route('bon.cmd.type')}}"><i class="fas fa-plus-square"></i> Nouveau Bon de commande</a></li>
                    <li><a href="{{route('all.factures',['type'=>'bc'])}}"><i class="fas fa-stream"></i> Liste des Bons de commandes</a></li>
                    <li><a href="{{route('bon.type')}}"><i class="fas fa-plus-square"></i> Nouveau Bon</a></li>
                    <li><a href="{{route('all.factures',['type'=>'b'])}}"><i class="fas fa-stream"></i> Liste des Bons</a></li>
                    <li><a href="{{route('facture.avoir.type')}}"><i class="fas fa-plus-square"></i> Nouveau Facture d'avoir</a></li>
                    <li><a href="{{route('all.factures',['type'=>'fv'])}}"><i class="fas fa-stream"></i> Liste des Factures d'Avoirs</a></li>
                    <li><a href="{{route('garantie.create')}}"><i class="fas fa-plus-square"></i> Nouveau Garantie</a></li> 
                    <li><a href="{{route('garantie.index')}}"><i class="fas fa-tasks"></i> Liste Garanties</a></li> 
                </ul>
                  </div>
               <div><i class="far fa-file-alt"></i> Devis/Proforma <i class="fas fa-angle-double-down"></i>
                <ul>
                    <li><a href="{{route('facture.devis.type')}}"><i class="fas fa-plus-square"></i> Nouveau Devis</a></li>
                    <li><a href="{{route('all.factures',['type'=>'dv'])}}"><i class="fas fa-stream"></i> Liste des Devis</a></li>
                    <li><a href="{{route('facture.proforma.type')}}"><i class="fas fa-plus-square"></i> Nouveau Facture Proforma</a></li>
                    <li><a href="{{route('all.factures',['type'=>'fp'])}}"><i class="fas fa-stream"></i> Liste des Factures Proforma</a></li>
                    
                </ul>
               </div>
            <div><i class="far fa-credit-card"></i> Crédits <i class="fas fa-angle-double-down"></i>
                <ul>
                    <li><a href="{{route('credit.create')}}"><i class="fas fa-plus-square"></i> Nouveau crédits</a></li>
                    <li><a href="{{route('credit.index')}}"><i class="fas fa-stream"></i> Gestion des crédits</a></li>
                    <li><a href="{{route('liste.credit')}}"><i class="fas fa-th-list"></i> Liste débiteurs </a></li>
                </ul>
            </div>
            <div><i class="fas fa-chart-line"></i> Achats <i class="fas fa-angle-double-down"></i>
                <ul>
                    <li><a href="{{route('achat.create')}}"><i class="fas fa-plus-square"></i> Nouveau facture/Bon</a></li>
                    <li><a href="{{route('achat.index')}}"><i class="fas fa-stream"></i> Liste des factures/Bons</a></li>
                </ul>
            </div>
               <div><i class="fas fa-upload"></i> Sauvegarde <i class="fas fa-angle-double-down"></i>
               <ul>
                   <li><a href="{{route('all.factures')}}"><i class="fas fa-file-import"></i> Documents Sorties</a></li>
                   <li><a href="{{route('achat.index')}}"><i class="fas fa-file-download"></i> Documents entrée</a></li>
                   <li><a href="{{route('mv.sortie')}}"><i class="fas fa-sign-out-alt"></i> Mouvement sorties</a></li> 
                   <li><a href="{{route('mv.entre')}}"><i class="fas fa-arrow-alt-circle-right"></i> Mouvement d'entrés</a></li>  
                   <li><a href="sortieF.php"><i class="fas fa-clipboard-check"></i> Mouvement Sorties Facturé</a></li> 
                   <li><a href="entreeF.php"><i class="fas fa-clipboard-check"></i> Mouvement d'entrés Facturé</a></li>  
               </ul>
               </div>
               <div><i class="fas fa-cog"></i> Paramètres <i class="fas fa-angle-double-down"></i>
            <ul>
                @php
                    $id= Auth::id();
                @endphp
                <li><a href="{{route('user.edit',$id)}}"><i class="fas fa-business-time"></i> Société et Compte</a></li>
                <li><a href="numeration.php"><i class="fas fa-sort-numeric-up-alt"></i> Numérotation</a></li>
            </ul>
            </div>
               <div class="btn-disabled"><a href="{{route('logout')}}"><button  class="button" type="submit"><i class="fas fa-sign-out-alt"></i> Se déconnecter</button></a>   </div>
            </div>
            
    </div> 
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    @yield('jsScript')
</body>
</html>