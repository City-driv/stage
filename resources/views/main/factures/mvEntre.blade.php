@extends('layouts.userNav')
@section('title','WORFAC: Mouvement entres')
@section('headInfo')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')
<style>
    td{
        text-align:center;
    }
    .detaile td{
        border:1px solid black;
    }
     .exp{
      border:2px solid green;border-radius:5px;padding:5px;
    }
    .exp:hover {
      background-color:#d6d6d6;
      border:2px solid #d6d6d6;border-radius:5px;padding:5px;
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
@media only screen and (max-width: 900px){
   td,th{
     font-size:5px;
   }
 }
</style>

    <input type="text" name="numero" placeholder="Recherche par Numéro" style="background: #f3f3f3 0 0 no-repeat padding-box;border: 0;outline:none;border-radius: 6px;box-shadow: 0 3px 6px rgb(54, 54, 54);
        height: 48px;padding: 10px 10px 10px 50px;" class=" col-9 col-md-3" id="searchInput" />   
    <center>
        <h1 style="margin-left:15%;color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">bulletin  Entrés Par période :</h1>
    </center>  
    <form action="{{route('mv.entre')}}" method="get">
        <div class="row text-center mb-2" style="margin-left:15%">
            <input type="date" class="form-control" name="date1" style="width:30%" value=""/>
            <input type="date" class="form-control" style="width:30%"  name="date2" value=""/>
            <button type="submit" style="margin-top: 10px;border-radius: 10px;margin-left: 10px;padding-top: 5px;padding-bottom: 5px;border-radius: 49px;border: 0;color: rgba(230,197,90,1);
            background: rgb(54, 54, 54); " class="col-2 col-md-1"><i class="fa-2x fas fa-calculator"></i>
            </button>
        </div>
    </form>
    <table class="table table-striped">
        <tr class="h5">
            <td>Entreprise</td>
            <td>Montant Total</td>
            <td>Remise Global </td>
            <td>Action</td>
        </tr>
        <tr class="h5">
        <td>{{Auth::user()->entreprise_name}}</td>
        <td>{{$TOTAL}} DH</td>
        <td>{{$REMISE}} DH</td>
        <td>
            <button class="exp" type="submit" name="exp"><i class="fas fa-file-excel" style="color:green"></i></button>
        </td>
    </tr>
    </table>
         
      <center>
        <h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Articles entrés :</h1>
      </center> 
      
      <table class='table table-striped'>
        <tr class='h3' style='color:white;'>
            <td style="text-align:left;">Numéro </td>
            <td style="text-align:left;">Description</td>
            <td style="text-align:left;">Prix d'achat</td>
            <td style="text-align:left;">Qte entrés</td>
            <td style="text-align:left;">Date </td>
            @if (request()->getQueryString()!=="type=f")
                <td style="text-align:left;">Type </td>
            @endif
        </tr>
        <tbody id="tbt">
            @foreach ($ligne_achat as $la)
                <tr>
                    <td class="num" style="text-align:left;">{{$la->achat->numero}}</td>
                    <td style="text-align:left;">{{$la->article->description}}</td>
                    <td style="text-align:left;">{{$la->price}} DH</td>
                    <td style="text-align:left;">{{$la->qte_recue}}</td>
                    <td style="text-align:left;">{{$la->achat->date}}</td>
                    @if (request()->getQueryString()!=="type=f")
                        <td style="text-align:left;">{{$la->achat->type}}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
               
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const rows = document.querySelectorAll('#tbt tr');

                searchInput.addEventListener('keyup', function(e) {
                    const x = e.target.value.toLowerCase();
                    rows.forEach(el => {
                        const cellContent = el.querySelector('.num').textContent.toLowerCase();
                        el.style.display = cellContent.includes(x) ? '' : 'none';
                    });
                });
            });

        </script>
@endsection