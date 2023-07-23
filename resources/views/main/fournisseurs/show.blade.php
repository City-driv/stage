@extends('layouts.userNav')
@section('title','WORFAC: Fournisseurs')
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
/* background-color:white; */

}



</style>

    <div class='row rounded  border-info mt-5'style='margin-left:5%;border-radius:20px;'>
    <div class='col-md-4 col-12' style='background-color: #D4AD02'>

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

@endsection