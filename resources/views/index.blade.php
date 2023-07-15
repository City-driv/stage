@extends('layouts.guestNav')
@section('title','WORFAC')
    
@section('content')
    
        <div class="row  fs-2 fs-md-5" id="accuile">
         <div style="font-size: 50px;" class="col-12 fs-1 col-md-6 pt-5 info">
                   <a class="" style="text-decoration: none;" href="{{route('connexion')}}"> 
                     <h1 style='padding-bottom:8px;'>Logiciel de facturation et gestion en ligne.</h1>
                    </a>
                   <ul>
                   <li><i class="fas fa-check"></i> Transformez vos devis en factures en  clique</li>
                   <li><i class="fas fa-check"></i> Accélérez et sécurisez les paiements</li>
                   <li><i class="fas fa-check"></i> Automatisez votre saisie comptable</li>
                   <li><i class="fas fa-check"></i> Vos équipes vont adorer gagner du temps</li>
               </ul>
         </div>
         <div class="col-11 col-md-6">
             <img src="imgs/print.png" style="width: 90%;height:56vh;" class="mr-3" alt="" srcset="">
         </div>
         <div class="col-12 info">
             <h4 style="color: gray; font-family: system-ui;" id="fonc">Des fonctionnalités innovantes</h4>
         </div>
         <div class="col-12 info" id="fonctionalites">
         <a class="" style="text-decoration: none;" href="{{route('connexion')}}">  <p class="h2" style=" color: #1F3EA3;padding-bottom:5px;">Une Solution compléte de gestion de la facturation pour les TPE-PME</p></a>
         </div>
         <div class="col-12 info">
            <h5 style="color: gray; font-family: serif;">Boostez la croissance de votre entreprise et gagner en efficacité avec une solution intégrée.</h5>
        </div>
     </div>
     <div class="row info info1 pt-5 pb-4">
         <div class="col-11 col-md-3 pt-2"
         style="background-color: #eceaea;;margin-bottom:10px;">
         <i style="color: #f60;background-color: #eceaea;" class="fas fa-cart-arrow-down fa-3x col-3"></i>
         <a class="" style="text-decoration: none;" href="{{route('connexion')}}">
          <h3 class="col-8">Gestion des ventes</h3>
         </a>
         <p class="col-12">
            Gestion complète et personnalisable de la chaîne de facturation : devis, bon de commande, bon de livraison.
         </p>
         </div>
         <div class="col-11 col-md-3 pt-2"
         style="background-color: #eceaea;margin-bottom:10px;">
         <i style="color: #f60;background-color: #eceaea;" class="fas fa-store-alt fa-3x col-12"></i>
         <a class="" style="text-decoration: none;" href="{{route('connexion')}}">
          <h3 class="col-12">Gestion des achats</h3>
         </a>
         <p class="col-12">
            Demandes d'achat, demandes de prix, bons de commande et de réception avec mise à jour du stock et de la facturation.
         </p>
         </div>
         <div class="col-11 col-md-3 pt-2"
         style="background-color: #eceaea;margin-bottom:10px;">
         <i style="color: #f60;background-color: #eceaea;" class="fas fa-users fa-3x col-12"></i>
         <a class="" style="text-decoration: none;" href="{{route('connexion')}}">
          <h3 class="col-12">Gestion des clients et fournisseurs</h3>
        </a>
         <p class="col-12 fs-md-">
            Une vue intégrée sur vos clients et fournisseurs pour obtenir facilement l'ensemble des données essentielles les concernant.         </p>
         </div>
         <div class="col-11 col-md-3 pt-2"
         style="background-color: #eceaea;margin-bottom:10px;">
         <i style="color: #f60;background-color: #eceaea;" class="fas fa-cubes fa-3x col-12"></i>
         <a class="" style="text-decoration: none;" href="{{route('connexion')}}">
          <h3 class="col-12">Gestion des stocks</h3>
        </a>
         <p class="col-12 fs-md-">
            Mouvements d’entrés et des sorties, dépréciation de stock, gestion multidépôt et saisie d’inventaire.         </div>
         <div class="col-11 col-md-3 pt-2"
         style="background-color: #eceaea;margin-bottom:10px;">
         <i style="color: #f60;background-color: #eceaea;" class="fas fa-balance-scale-right fa-3x col-12"></i>
         <a class="" style="text-decoration: none;" href="{{route('connexion')}}">
          <h3 class="col-12">Personnalisation</h3>
        </a>
         <p class="col-12 fs-md-">
            Vos modèles de factures et devis professionnels à l’image de votre entreprise avec vos couleurs, logos …     </div>
         <div class="col-11 col-md-3 pt-2"
         style="background-color: #eceaea;margin-bottom:10px;">
         <i style="color: #f60;background-color: #eceaea;" class="fas fa-ghost fa-3x col-12"></i>
         <a class="" style="text-decoration: none;" href="{{route('connexion')}}">
          <h3 class="col-12">Gestion des articles</h3>
        </a>
         <p class="col-12">
            Structuration du catalogue des articles .         </div>
     </div>
     <div style='overflow-x: hidden;' class="Pay mb-2"style="" id="prix">
         <div style='overflow-x: hidden;' class="row">
            <div class="row pack text-center mt-1 pt-1 pb-5" style='background-color:#ececec;margin:0'>
            <div class="col-12 h1 text-center" style='font-weight: 900;font-family: monospace;font-size:50px;background-color:#ececec;'>Nos Prix</div>
            <div class="col-12 text-center h6 text-dark" style='font-weight: 900;font-family: monospace;background-color:#ececec;'>
            Tarification annuelle adaptée aux  TPE-PME.
                 Tous nos prix sont affichés Toutes Taxe Comprises.</div>
            <div class="col-11 col-md-4 div mt-2 mb-2" style='background-color:white;'>
            <div class="row">
               <div class="col-12 pt-5 pb-5" style="background-image: url('imgs/Basic.png');height: 18vh;width: 100%;background-size: 100% 100%;filter: contrast(150%);"></div>  
               <div class="col-12 h5 pt-1 pb-1  bg-white" style="margin:0;">1000 documents,Clients illimités</div>   
               <div class="col-12 Basic ddd bg-white h7" style="text-align: left;color: #1F3EA3;padding-left:10px;margin:0;">
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Gestion des paramètres de l'application<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Numérotation <br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Devis<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des Devis<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Bons de livraison<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des Bons Livraison<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Conversion de bon de livraison en facture<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Factures<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des factures<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Facture d'avoir<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des Factures d'Avoirs<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Garantie
               </div>   
               <div class="col-12 text-center bg-white">
                  <button class='more btnBasic'  style='' onclick='Basic()' >En savoir plus</button>         
               </div>  
               <div class="col-12 text-center bg-white">
                 <a href="/inscription?pack=Perso">
                 <button class=" sss bg-Info mb-2">Commander</button>
                 </a>
               </div>       
            </div>
        </div>
        <div class="col-11 col-md-4 div mt-2 mb-2" style='background-color:white;'>
            <div class="row">
                <div class="col-12" style="background-image: url('imgs/Starter.png');height: 18vh;width: 100%;background-size: 100% 100%;filter: contrast(150%);"></div>  
                <div class="col-12 h5 pt-1 pb-1  bg-white" style="margin:0;">3000 documents,Clients illimités</div>   
               <div class="col-4 bg-white"></div> 
             <div class="col-12 Business ddd bg-white h7" style="text-align: left;color: #1F3EA3;padding-left:10px;margin:0;">
             <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Gestion des paramètres de l'application<br/>
             <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Numérotation <br/>
             <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Devis<br/>
             <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des Devis<br/>
             <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Bons de livraison<br/>
             <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des Bons Livraison<br/>
             <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Conversion de bon de livraison en facture<br/>
             <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Factures<br/>
             <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des factures<br/>
             <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Facture d'avoir<br/>
             <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des Factures d'Avoirs<br/>
             <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Garantie
               </div>   
               <div class="col-4 bg-white"></div>     
               <div class="col-12 text-center bg-white">
               <button class='more btnBusiness'  onclick='Business()'>En savoir plus</button>         
               </div>  
               <div class="col-12 text-center bg-white">
                 <a href="/inscription?pack=Starter">
                    <button class=" sss bg-Info mb-2">Commander</button>
                </a>
               </div>       
    
            </div>
        </div>
        <div class="col-11 col-md-4 div mt-2 mb-2" style='background-color:white;'>
            <div class="row">
                <div class="col-12" style="background-image: url('imgs/perfo.png');height: 18vh;width: 100%;background-size: 100% 100%;filter: contrast(150%);"></div>     
               <div class="col-12 h5 pt-1 pb-1  bg-white" style="margin:0;">illimites documents,Clients illimités</div>   
               <div class="col-4 bg-white"></div> 
               <div class="col-12 pro ddd bg-white h7" style="text-align: left;color: #1F3EA3;padding-left:10px;margin:0;">
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Gestion des paramètres de l'application<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Numérotation <br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Devis<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des Devis<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Bons de livraison<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des Bons Livraison<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Conversion de bon de livraison en facture<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Factures<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des factures<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Facture d'avoir<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des Factures d'Avoirs<br/>
               <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Garantie
               </div>   
               <div class="col-4 bg-white"></div>     
               <div class="col-12 text-center bg-white">
               <button class='more btnpro'  onclick='pro()'>En savoir plus</button>         
               </div>  
               <div class="col-12 text-center bg-white">
                 {{-- <a href="inscription.php?pack=Performance"> --}}
                 <a href="/inscription?pack=Performance">

                    <button class=" sss bg-Info mb-2">Commander</button>
                </a>
               </div>       
    
            </div>
        </div>
     </div>
<div style class="col-12 text-white mb-3"  style='margin:0;background-color:#f60;'>
     <div class="h1 text-center pb-2" style='margin:0;background-color:#f60;'>Contactez-nous au 0631933957 avec un Conseiller</div> 
     <div class="h3 text-center pb-2" style='margin:0;background-color:#f60;'>Contact téléphonique du Lundi au Vendredi de 09h00 a 17h00</div> 
</div>     
<div class="row info2" id="avant">
         <h3>100% en ligne, 100% sécurisée, 100% flexible</h3>
         <h5 class="col-10">Faites que vos rêves et vos objectifs les plus grands se réalisent. Obtenez instantanément une vue unique sur votre entreprise grâce à une solution intuitif, mobile et 100% collaborative</h5>
     </div>
     <div class="row info6 mt-5">
         <div class="col-12 col-md-5">
             <div class="row">
                <i class="col-md-2 col-3 fas fa-anchor fa-3x pt-5"></i>
                <div class="col-md-10 col-9"> 
                    <div class="row">
                        <h4 class="col-12"> Accès à tout moment, de n’importe où.</h4>
                        <p class="col-12">Consulter vos données n'importe quand et de n’importe quel endroit, d’un ordinateur équipé d’un accès à internet ou depuis votre smartphone ou tablette.</p> 
                         </div>
                   </div>   
            </div>
             
         </div>
         <div class="col-12 col-md-5">
            <div class="row">
                <i class="col-md-2 col-3 far fa-heart fa-3x pt-5"></i>
                <div class="col-md-10 col-9"> 
                    <div class="row">
                        <h4 class="col-12">Interface facile et intuitif..</h4>
                        <p class="col-12">Gérez votre activité avec une interface intuitif, facile et conviviale. Une solution conçue pour rendre la gestion d'entreprise plus facile.</p> 
                         </div>
                   </div>   
            </div>
         </div>
         <div class="col-12 col-md-5"> 
             <div class="row">
            <i class="col-md-2 col-3 fas fa-shield-alt fa-3x pt-5"></i>
            <div class="col-md-10 col-9"> 
                <div class="row">
                    <h4 class="col-12">Données sécurisées .</h4>
                    <p class="col-12">Vos donnés sont confidentielles et sauvegardées chaque jour. WORFAC crypte les données à l'aide des meilleures technologies et dans le respect des principales normes de sécurité.</p> 
                     </div>
               </div>   
        </div></div>
         <div class="col-12 col-md-5"> <div class="row">
            <i class="col-md-2 col-3 fas fa-first-aid fa-3x pt-5"></i>
            <div class="col-md-10 col-9"> 
                <div class="row">
                    <h4 class="col-12">Assistance comprise.</h4>
                    <p class="col-12">WORFAC et son service client vous accompagnent dans la prise en main de votre outil WORFAC et à mesure que votre entreprise grandit.</p> 
                     </div>
               </div>   
        </div></div>
     </div>
     <div class="row modeTele text-center mt-5">
       <div class="col-12 mt-2 text-center h1" style='font-size:300%;'>Simple & Efficace</div>
       <div class="col-12 mt-2 text-center h1">Aucune nation de comptabilité n'est requise !</div>
       <div class="col-12 mt-2 text-center h6 text-secondary">Inscrivez-vous gratuitement et testez toutes fonctionnalités avant de l'adopter</div>
       <div class="col-12 mt-3 text-center">
           <a href="/inscription?pack=demo" id="demo">INSCRIPTION GRATUITE</a>
       </div>
       <div class="col-12 text-center h6 text-secondary pb-2" >Essayer-le sans engagement</div>
       <div class="col-12 text-center mt-5">
        {{-- <a href="WorFac_1_BM.2.apk"><button type="button" class="android" style='background-image:url("https://www.situaction.fr/wp-content/uploads/2014/08/playstore.png");' ></button></a> --}}
        <a href=""><button type="button" class="iphone"  style='background-image:url("imgs/play2.png");'></button></a>
    </div>
     </div>
    </div>
    
</div> 

<script>
      let x=`<img src="imgs/11.png" class="imgIcon" alt="" srcset="">Gestion des paramètres de l'application<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Numérotation <br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Devis<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des Devis<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Bons de livraison<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des Bons Livraison<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Conversion de bon de livraison en facture<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Factures<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des factures<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Facture d'avoir<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des Factures d'Avoirs<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Garantie<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste Garanties<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">crédits<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Gestion des crédits<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste débiteurs<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Envoie de factures,Devis..par Email ou Whatsapp <br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Import Clients<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des fournisseurs<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Gestion des produits<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Import articles<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">état stock<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Liste des factures<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Gestion des fournisseurs<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Gestion des clients<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Gestion des rÃ¨glements<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Mouvement sorties et D'entrés<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Mouvement sorties et D'entrés Facturé<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Journal de vente<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Bons d'entrée et de sortie<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Gestion de stock<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Sauvegarde Documents Sorties et Entrée<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Gestion des inventaires<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Conversion de devis en Bon de livraison<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Multi-utilisateurs<br/>
    <img src="imgs/11.png" class="imgIcon" alt="" srcset="">Assistance Téléphone + Email<br/>`

function Basic(){
    document.querySelector(".btnBasic").style.display="none"
    document.querySelector(".Basic").innerHTML=x
}
function Business(){
    document.querySelector(".btnBusiness").style.display="none"
    document.querySelector(".Business").innerHTML=x
}
function pro(){
    document.querySelector(".btnpro").style.display="none"
    document.querySelector(".pro").innerHTML=x
}
    </script>
    {{-- <script src="index.js?t=1491313943552"></script> --}}

@endsection
