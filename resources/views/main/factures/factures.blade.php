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

<center><h1 style='color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Liste Documents {{$t}}  d'entrés:</h1></center>

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
                          <a title="Partager" class="dropdown-item" style=" padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="#">Partager <i class="  fab fa-whatsapp"></i></a></li>
                      <li>
                         <a class="dropdown-item"  title="Envoyer" style=" padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="#">Envoyer <i class="fas fa-envelope"></i></a>
                      </li>
                      <li>
                         <a class="dropdown-item"  title="Modifier" style="padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;" id="modifier"  href="#">Modifier <i class="fas fa-edit"></i></a></li>
                      <li>
                        <form action="{{route('facture.destroy',$f->id)}}" method="post">
                         @csrf
                         @method('DELETE')
                              <a title="Supprimer" class="dropdown-item" style="padding-left;5px;color: red;text-decoration:none;font-size:19px;font-familly:cursive;color:red;" ><button type="submit" >Supprimer <i class="far fa-trash-alt"></i></button> </a></li>
                        </form>
                    </ul>
                  </div>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  <form action="#"  method="post"><center><h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">bulletin  Sortie Par periode :</h1></center>  
    <div class="row text-center mb-2" style="margin-left:15%">
      <input type="date" class="form-control" name="date1" style="width:30%" value=""/>
      <input type="date" class="form-control" style="width:30%"  name="date2" value=""/>
      <button type="submit" style="margin-top: 10px;
              border-radius: 10px;
              margin-left:10px;
              padding-top:5px;padding-bottom:5px;background-color:#2c2815;color:white;border-radius:10px;border:0;" class="col-2 col-md-1"><i class="fa-2x fas fa-calculator"></i></button>
        
    </div>
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
           <td><button style="border:2px solid green;border-radius:5px;padding:5px;" type="submit" name="exp"><i class="fas fa-file-excel" style="color:green"></i></button></td>
           </tr>
    </table>
    </form>
    
  <script>
    const searchInput=document.getElementById('searchInput');
    const rows = document.querySelectorAll('#ttbody tr');
    console.log(rows);
    searchInput.addEventListener('keyup',function(e){
       const x=e.target.value.toLowerCase();
       rows.forEach((el) => {
          el.querySelector('.cl').textContent.toLowerCase().startsWith(x) ? (el.style.display='') : (el.style.display='none');
       });
    });

    

  </script>

@endsection