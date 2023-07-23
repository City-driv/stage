@extends('layouts.userNav')
@section('title','WORFAC: Liste Fournisseurs')
@section('content')
    <style>
        
img{
    box-shadow: 0px 0px 60px white;
    background-size: 100% 100%;
    width: 300px;height:300px;
    border-radius: 50%;
    background-color:white;
}
img:active{
  margin-left: 0;
  width: 80%;
    height: 80%;
    background-size: 100% 100%;
    position: absolute;
    border-radius: 0;
    background-color:white;

}
button{
  background-color:white;
  border:0;
 
}
button:hover{
 border-bottom:1px solid black;
}
.search{
      padding:10px;
      color: #0d6efd;
    border: 1px solid #0d6efd;
    background: white;
    border-radius:5px;
    margin-top:10px;
   }
   .search:hover{
    padding:10px;
    margin-top: 10px;color: white;
    border: 1px solid #0d6efd;
    background: #0d6efd;
    border-radius:5px;
    margin-top:10px;
   }
    </style>

<center><h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Liste Fournisseurs :</h1></center>
<form action="{{route('fournisseur.liste')}}" method="GET"">
      
    <input value="" type="text" name="search" placeholder="Recherche par Entreprise" style="    background: #f3f3f3 0 0 no-repeat padding-box;
border: 0;
margin-left:20px;
outline:none;
border-radius: 6px;
box-shadow: 0 3px 6px rgb(54, 54, 54);
height: 48px;
padding: 10px 10px 10px 50px;
 " class=" col-9 col-md-3" id="">

<button type="submit" class="search"><i class="fas fa-search"></i>Chercher</button>

     {{-- <button style='margin:20px;' class="btn btn-outline-secondary  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-sort"></i>Trier par</button>
        <div class="dropdown-menu">
          <button type="submit" name="fourA"><i class="fas fa-sort-alpha-up"></i> Code Fournisseur croissant</button>
          <br><button type="submit" name="fourZ"><i class="fas fa-sort-alpha-up-alt"></i> Code Fournisseur décroissante</button>
          <br><button type="submit" name="entA"><i class="fas fa-sort-alpha-up"></i > Entreprise  croissant</button>
          <br><button type="submit" name="entZ"><i class="fas fa-sort-alpha-up-alt"></i> Entreprise décroissante</button>
        </div> --}}
</form>

    @foreach ($fournisseurs as $fournisseur)
    <div class='row rounded  border-info mt-5'style='margin-left:5%;border-radius:20px;'>
        <div class='col-md-4 col-12' style='background-color: #D4AD02'>
         
              {{-- <img src='http://127.0.0.1:8000/Fimgs/1690036136-images.jpg' class='mt-2 mb-2 text-center' alt='' srcset=''> --}}
              <img src='{{asset('Fimgs/'.$fournisseur->photo)}}' class='mt-2 mb-2 text-center' alt='' srcset=''>
            <h3 class='text-center' style='color: rgb(75, 75, 75);'>Code Fournisseur:{{$fournisseur->code_fournisseur}} <br>
            Entreprise : {{$fournisseur->nom_entreprise}} <br>
           <a href=''><i style='color: rgb(75, 75, 75);' class=' fa-2x fas fa-bus'></i></a>
        
            </h3>
            </div> 
        <div class='col-md-7 col-12' style='background-color: white;border:1px solid  #D4AD02;'>
            <div class='row mt-3 mb-3'>
                <div class='col-12 h4'><i class='fas fa-calendar-week'></i> FormeJuridique : {{$fournisseur->fj}}</div>
                <div class='col-12   h4'><i class='fas fa-building'></i> ICE : {{$fournisseur->ice}}</div>
                <div class='col-12   h4'><i class='fas fa-building'></i> IF : {{$fournisseur->if}}</div>
                <div class='col-12   h4'><i class='fas fa-map-marker-alt'></i> Adresse : {{$fournisseur->adresse}}</div>
                <div  class='col-12   h4' ><i class='fas fa-mobile'></i> Téléphone : {{$fournisseur->telephone}}</div>
                <div class='col-12   h4'><i class='fas fa-sms'></i> Mobile : {{$fournisseur->mobile}}</div>
                <div class='col-12   h4'><i class='fas fa-mail-bulk'></i> Code postale :{{$fournisseur->code_postale}}</div>
                <div class='col-12   h4'><i class='fas fa-flag'></i> Pays : {{$fournisseur->pays}}</div>
                <div class='col-12 h4'><i class='fas fa-at'></i> Email :{{$fournisseur->email}}</div>
                <div class='col-12   h4'><i class='fas fa-university'></i> Nom de banque :{{$fournisseur->nom_banque}}</div>
                <div class='col-12   h4'><i class='fas fa-university'></i> Numero de compte :{{$fournisseur->num_compte}}</div>
                <div class='col-12   h4'><i class='fas fa-globe'></i> {{$fournisseur->site_internet}}</div>
            </div>
        </div>
    </div>
        
    </div>
    @endforeach


@endsection