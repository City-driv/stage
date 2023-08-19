@extends('layouts.userNav')
@section('title','WORFAC: Factures')
@section('headInfo')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')

<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none;
margin: 0;
}

/* Firefox */
input[type=number] {
-moz-appearance: textfield;
}
  body{
    height:190vh;
  }
  a{
    color:none;
    background-color:none;
  }
  .detaille{
   position: fixed;
   margin-left:10%;
   top: 25%;
   right: 25%;
   border-collapse:collapse;
   padding:0;
   background-color:black;
   color:white;
   display:none;
  }
  .table2{
   border:4px solid red;
   
  }
  .table2 tr td{
   padding:15px;
    text-align:center;
   border:2px solid white;
   color:white;
  }
  .facture,.modifier{
   margin-left: 20%;
 */: ;
 padding-left: 20px;
 /* padding-top: 2%; */
 border-radius: 10px;
 /* box-shadow: rgb(252 183 66) 5px 10px 20px inset; */
 padding-bottom: 2%;
 /* margin-top: -15%; */
 width: 70%;
 padding: 26px;
 border: 1px solid #afafaf;
 position: relative;
 transform: scale(0);
 /* top: 0; */
 margin: auto;
 position: absolute;
 top: 0;
 left: 0;
 /* bottom: 0; */
 margin-top: 10%;
 right: 0;
 /* border-radius: 1px; */
 border-radius: 5px;
 background-color: white;
 padding-right: 20px;
}
  @media only screen and (max-width: 900px){
    td,th{
      font-size:5px;
    }
  }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

<center>
  <h1 style='color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Liste Documents {{$t}}  d'entrés:</h1>
</center>
{{-- @php
    $url = Route::current();
@endphp --}}
{{-- @dump(Request::url())
@dump(Request::path())
@dump(Request::fullUrl()) --}}
{{-- @dump(request()->getQueryString()) --}}

<div class="row mb-2">
  <label class="col-12 fs-1" style="font-size:20px;font-weight:900;" for=""><i style="color: #0d6efd;" class="fas fa-search" aria-hidden="true"></i> Recherche Par client:</label>
  <input style="margin-left:5%;background: #f3f3f3 0 0 no-repeat padding-box;border: 0;outline: none;border-radius: 6px;box-shadow: 0 3px 6px rgb(54 54 54);height: 48px;padding: 10px 10px 10px 50px;" class="input col-4" type="text" id="searchInput" placeholder="Chercher par client...">
</div>

<table class="table text-center table-bordered border-primary">
    <thead class="table-dark">
      <tr>
        <th>Réf</th>
        <th>Client</th>
        <th>Montant HT</th>
        <th>Montant Tva</th>
        <th>Total TTC</th>
        <th>Date</th>
        <th>Type</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody id="ttbody">
        @foreach ($factures as $f)
            <tr>
                <td>{{$f->ref}}</td>
                <td class="cl">{{$f->clientFact->name}}</td>
                <td>{{$f->tht}} DH</td>
                <td>{{$f->ttva}} DH</td>
                <td>{{$f->ttc}} DH</td>
                <td>{{$f->date_facture}}</td>
                <td>{{$f->type_fact}}</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-cog"></i>Action
                    </button>
                    <ul class="dropdown-menu">
                      <li>
                        <a id="imp" title="Enregistrer/Imprimer" style="color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="{{route('facture.show',$f->id)}}"  class="dropdown-item"
                          onclick="window.open('{{route('facture.show',$f->id)}}','popup','width=1000,height=1000').print(); return false;">Enregistrer/Imprimer <i class="fas fa-print"></i></a>
                      </li>
                      <li>
                          <a class="dropdown-item" title="Aprecu" style="padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="{{route('facture.show',$f->id)}}">Aperçu <i class="far fa-eye"></i></a>
                      </li>
                      <li>
                          <a href="{{'https://api.whatsapp.com/send?text='.route('facture.show',$f->id)}}" title="Partager" class="dropdown-item" style=" padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;">Partager <i class="fab fa-whatsapp"></i></a></li>
                      <li>
                        @if ($f->type_fact =='devis')    
                          <li>
                            <a title="Partager" class="dropdown-item" style=" padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="facturer({{$f->id}})">Facturer <i class="fas fa-share"></i></a></li>
                          <li>
                        @endif
                         <a class="dropdown-item"  title="Envoyer" style=" padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="#">Envoyer <i class="fas fa-envelope"></i></a>
                      </li>
                      <li>
                         <a class="dropdown-item"  title="Modifier" style="padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;" id="modifier"  href="{{route('facture.edit',$f->id)}}">Modifier <i class="fas fa-edit"></i></a></li>
                      <li>
                        <form action="{{route('facture.destroy',$f->id)}}" method="post">
                         @csrf
                         @method('DELETE')
                              {{-- <a title="Supprimer" class="dropdown-item" style=" padding-left;5px;color: red;text-decoration:none;font-size:19px;font-familly:cursive;color:red;" > --}}
                                <button type="submit" style="padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;" class="btn" >Supprimer <i class="far fa-trash-alt"></i></button> 
                              {{-- </a> --}}
                            </li>
                        </form>
                    </ul>
                  </div>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{-- @if (isset($_GET['trimestre']))
  @dump( $_GET['trimestre'])
      
  @endif --}}


  @if (request()->getQueryString()!== null)
      <form action="{{route('facture.index',['type'=>$x])}}"  method="GET">
        <input type="text" hidden name="type" value="{{$x}}">
        <center><h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">bulletin  Sortie Par periode :</h1></center>  
        <div class="row text-center mb-2" style="margin-left:15%">
          <input type="date" class="form-control"  name="date1" style="width:30%" value=""/>
          <input type="date" class="form-control" style="width:30%"  name="date2" value=""/>
          <select class="form-select-sm" name="trimestre" style="width: auto" aria-label="select Trimestre">
            <option value="">select Trimestre</option>
            <option value="1">T1</option>
            <option value="2">T2</option>
            <option value="3">T3</option>
            <option value="4">T4</option>
          </select>
          <button type="submit" style="margin-top: 10px;border-radius: 10px;margin-left:10px;padding-top:5px;padding-bottom:5px;background-color:#2c2815;color:white;border-radius:10px;border:0;" class="col-2 col-md-1"><i class="fa-2x fas fa-calculator"></i></button>
        </div>
      </form>      
  @endif


    <table class="table table-striped">
        <tr class="h5">
            <td>Entreprise</td>
            <td>Montant Total TVA</td>
            <td>Montant Total HT </td>
            <td>Montant Total TTC </td>
            <td>Action</td>
        </tr>
        <tr class="h5">
          @if (isset($factures->first()->userFact->name))
          <td>{{$factures->first()->userFact->name}}</td>
          @endif
           <td>{{$TTVA}} DH</td>
           <td>{{$THT}} DH</td>
           <td>{{$TTC}} DH</td>
           <td>
            <form action="{{route('facture.index',['type'=>$x,'excel'=>'excel'])}}" method="get">
            @csrf
            @if (isset($_GET['trimestre']))
              <input type="hidden" name="trimestre" value="{{$_GET['trimestre']}}">
            @endif
            <input type="hidden" name="excel" value="excel">
            <input type="text" hidden name="type" value="{{$x}}">
              <button style="border:2px solid green;border-radius:5px;padding:5px;" type="submit" name="exp"><i class="fas fa-file-excel" style="color:green"></i></button></td>
            </form>
           </tr>
    </table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="ctn">

         
        </div>
      </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>
  </div>    
  <script>
    
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const rows = document.querySelectorAll('#ttbody tr');

        searchInput.addEventListener('keyup', function(e) {
            const x = e.target.value.toLowerCase();
            rows.forEach(el => {
                const cellContent = el.querySelector('.cl').textContent.toLowerCase();
                el.style.display = cellContent.includes(x) ? '' : 'none';
            });
        });
    });

    function facturer (fid){
      var i=fid;
        document.querySelector('.ctn').innerHTML=`
        <form action="/facturer/${fid}" method="POST">
            @csrf
            <div class="row">
              <input type="hidden" hidden name='id' value="${fid}">
              <label for="" class="h2 text-center">Réf:</label>
              <input type="text" class="form-control text-center reference" name="ref" style='font-size:30px;' value="FACT-360-21">
           </div>  
           <button type="submit" class="btn btn-primary">Facturer</button>
        </form>
        `
    }
    

  </script>

@endsection