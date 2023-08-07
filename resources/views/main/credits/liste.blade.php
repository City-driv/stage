@extends('layouts.userNav')
@section('title','WORFAC: Credits')
@section('content')

<center><h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Liste débiteurs trier par La somme:</h1></center> 

@foreach ($credits as $cr)
    <div class='row rounded  border-info mt-5'style='margin-left:5%;border-radius:20px;'>
        <div class='col-md-11 col-11' style='background-color: white;border:1px solid  #D4AD02;'>
            <div class='row mt-3 mb-3'>
                <div class='col-12 h4'><i class='fas fa-calendar-week'></i> Client : {{$cr->client->name}}</div>
                <div class='col-12   h4'><i class='fas fa-building'></i> Télephone :  {{$cr->client->telephone}}</div>
                <div class='col-12   h4'><i class='fas fa-map-marker-alt'></i> Adresse :  {{$cr->client->adresse}}</div>
                <div  class='col-12   h4' ><i class='fas fa-fist-raised'></i> La somme : {{$cr->p_reste}} DH</div>
            </div>
        </div>
    </div>
    
@endforeach


@endsection