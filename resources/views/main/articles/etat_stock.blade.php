@extends('layouts.userNav')
@section('title','WORFAC: Article etat de stock')
@section('content')
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
    <img src="{{asset('/imgs/stock.svg')}}" style="height: 60vh;" alt="" srcset="">
</div>  
    </div>
    
</div>
@endsection