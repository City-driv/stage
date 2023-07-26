{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Welcome  {{Auth::user()->name}}</h1>
    {{-- <p>{{dd(auth()->user())}}</p> --}}
    {{-- @dump(Auth::user()) --}}
    {{-- @dump(auth()->user()) --}}
{{-- </body> --}}
{{-- </html> --}}

@extends('layouts.userNav')
@section('title','Worfac :home')
@section('content')

<div class="container">
   <div class='row'>
           <div class='col-md-7 col-12 '>
               <div class='h1 text-left'>Tableau de bord</div>
               <div class='row e'>
                 <div class=' col-12 h3 pt-2 pb-2'>
                     <i class='fas fa-check-square'></i> 5 étapes pour bien commencer avec WORFAC
                 </div>
                 <div class='col-11'>
                   Libérez-vous de la complexité de la facturation et de la gestion commerciale dès aujourd'hui en suivant ces quelques étapes :
                 </div>
                 <div class='col-11 col-md-7'>
                     <div class='row etape'>
                         
                         
                       <button><a href='Parametres.php'>1- Paramètrez les informations de votre société</a></button><button><a href='numeration.php'>2- Paramétrez la continuité de votre numérotation</a></button> <button style='background-color:green;'><a class='text-white' href='FacturesTypes.php'><i class='fas fa-check-square'></i>  Première facture de vente créée</a></button><button style='background-color:green;'><a class='text-white' href='NoArticle.php'><i class='fas fa-check-square'></i> catalogue d'articles Importer</a></button><button style='background-color:green;'><a class='text-white' href='NoClient.php'><i class='fas fa-check-square'></i>  Contacs clients Importer</a></button></div>
                 </div>
               </div>
           </div>
           
       <div class="col-12 col-md-5 mt-5 text-center">
        <div class="row">
        </div>
        <label for="" class="col-12 h3">Calculatrice TVA</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
            <input type="number" class="form-control text-center" value="20" aria-label="Amount (to the nearest dollar)">
            <div class="input-group-append">
              <span class="input-group-text">%</span>
            </div>
          </div>        <div class="row">
         <div class="col-12 col-md-4">
        <div class="row">
            <div class="col-12 h5 text-center">Montant Tva</div>
            <div class="col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    </div>
                    <input type="number" value="0" class="form-control text-center"  aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                      <span class="input-group-text">DH</span>
                    </div>
                  </div>
            </div>
        </div>
        </div>
        <div class="col-12 col-md-4">
        <div class="row">
            <div class="col-12 h5 text-center">Montant HT</div>
            <div class="col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    </div>
                    <input type="number"value="0" min="0" class="form-control text-center"  aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                      <span class="input-group-text">DH</span>
                    </div>
                  </div>
            </div>
        </div>
        </div>
        <div class="col-12 col-md-4">
        <div class="row">
            <div class="col-12 h5 text-center">TTC</div>
            <div class="col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    </div>
                    <input type="number"value="0" min="0" class="form-control text-center" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                      <span class="input-group-text">DH</span>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            </div>
        </div>
        </div>   
  
  
</div> 
</div>
   <div class="row mt-3">
       <div class="col-md-4 col-12">
        <label for="" class="h3"><i class="fas fa-check"></i> Articles disponibles</label>
        <table class="table">
            <tr class="bg-success h5 text-white text-center">
                <td>Description</td>
                <td>QTE</td>
            </tr>
            @foreach ($artD as $art)
                 <tr>
                         <td>{{$art->description}}</td>
                         <td class='text-center'>{{$art->quantite}}</td>
                 </tr>
            @endforeach
            
         </table>
     </div>
     <div class="col-md-4 col-12">
         <label for="" class="h3"><i class="fas fa-exclamation-triangle"></i> Articles alert</label>
         <table class="table">
             <tr style="background-color: rgb(235, 209, 61);" class=" h5 text-dark text-center">
                 <td>Description</td>
                 <td>QTE</td>
             </tr>
             @foreach ($artA as $art)
                 <tr>
                         <td>{{$art->description}}</td>
                         <td class='text-center'>{{$art->quantite}}</td>
                 </tr>
             @endforeach
           
         </table>
     </div>
     <div class="col-md-4 col-12">
         <label for="" class="h3"><i class="fas fa-ban"></i> Articles épuisés</label>
         <table class="table">
             <tr style="background-color: rgb(252, 70, 70);" class=" h5 text-white text-center">
                 <td>Description</td>
                 <td>QTE</td>
             </tr>
             @foreach ($artE as $art)
                 <tr>
                         <td>{{$art->description}}</td>
                         <td class='text-center'>{{$art->quantite}}</td>
                 </tr>
             @endforeach
       
         </table>
          <div class="row text-center">
       
   </div>  
       </div>
   <div class="row ml-3 mt-5">
       <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center">
           <a href="{{route('clients.index')}}" class="notification">
               <span><i class="fa-6x fas fa-users"></i><br>
                <h3 class="text-center">Contacts</h3>
           </span>
               <span class="badge">{{$nbc}}</span>
             </a>
       </div>
       <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center">
           <a href="{{route('article.index')}}" class="notification">
               <span><i class="fa-6x fab fa-product-hunt"></i><br>
                <h3 class="text-center">Articles</h3></span>
               <span class="badge">{{$nba}}</span>
             </a>
       </div>
       <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center">
           <a href="allFactures.php" class="notification">
               <span><i class="fa-6x fas fa-file-invoice"></i><br>
                <h3 class="text-center">Documents</h3></span>
               <span class="badge">5     
               </span>
             </a>
       </div>
       <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center">
           <a href="Parametres.php" class="notification text-center">
               <span><i class="fa-6x fas fa-cogs"></i></span>
             </a>
       </div>
       <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center">
       <img src="{{asset('/imgs/stock.svg')}}" style="height: 30vh;" alt="" srcset="">
       </div>
   </div>
</div>
<script>
            let select=document.querySelector("select")
            let inputes=document.querySelectorAll("input[type='number']")
            let [tva,mtva,ht,ttc]=inputes
            console.log(tva,mtva)

            inputes[0].addEventListener("keyup",()=>{
              mtva.value=parseFloat(parseFloat(tva.value)/100*parseFloat(ht.value)).toFixed(2)
              ttc.value=parseFloat(parseFloat(tva.value) /100*parseFloat(ht.value)+parseFloat(ht.value)).toFixed(2)
            })
            inputes[0].addEventListener("change",()=>{
                mtva.value=parseFloat(parseFloat(tva.value)/100*parseFloat(ht.value)).toFixed(2)
              ttc.value=parseFloat(parseFloat(tva.value) /100*parseFloat(ht.value)+parseFloat(ht.value)).toFixed(2)
            })
            inputes[1].addEventListener("keyup",()=>{
              ht.value=parseFloat(parseFloat(mtva.value)*100/parseFloat(tva.value)).toFixed(2)
              ttc.value=parseFloat(parseFloat(mtva.value)*100/parseFloat(tva.value)+parseFloat(mtva.value)).toFixed(2)
           
            })
            inputes[1].addEventListener("change",()=>{
                ht.value=parseFloat(parseFloat(mtva.value)*100/parseFloat(tva.value)).toFixed(2)
              ttc.value=parseFloat(parseFloat(mtva.value)*100/parseFloat(tva.value)+parseFloat(mtva.value)).toFixed(2)
            })
            inputes[2].addEventListener("keyup",()=>{
                mtva.value=parseFloat(parseFloat(tva.value)/100*parseFloat(ht.value)).toFixed(2)
                ttc.value=parseFloat(parseFloat(tva.value)/100*parseFloat(ht.value)+parseFloat(ht.value)).toFixed(2)
              })
              inputes[2].addEventListener("change",()=>{
                mtva.value=parseFloat(parseFloat(tva.value)/100*parseFloat(ht.value)).toFixed(2)
                ttc.value=parseFloat(parseFloat(tva.value)/100*parseFloat(ht.value)+parseFloat(ht.value)).toFixed(2)
              })
              inputes[3].addEventListener("keyup",()=>{
              ht.value=parseFloat(parseFloat(ttc.value)/((parseFloat(tva.value)/100)+1)).toFixed(2)
              mtva.value=parseFloat(parseFloat(ttc.value)-parseFloat(ht.value)).toFixed(2)
             })
             inputes[3].addEventListener("change",()=>{
                ht.value=parseFloat(parseFloat(ttc.value)/((parseFloat(tva.value)/100)+1)).toFixed(2)
                mtva.value=parseFloat(parseFloat(ttc.value)-parseFloat(ht.value)).toFixed(2)

             })
        </script>


@endsection
