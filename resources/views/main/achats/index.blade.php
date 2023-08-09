@extends('layouts.userNav')
@section('title','WORFAC: Achats ')
@section('headInfo')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')
<style>

td{
            text-align:center;
        }
        .detaile td{
            border:1px solid black;
            padding:10px;
        }
        center button{
            background-color:#ff3e55;color:white;font-size:25px;
            border:0;
            padding:5px;
        }
        tr td{
            
        }
        button{
          margin-top: 10px;
           border-radius: 10px;
          padding-top:5px;padding-bottom:5px;background-color:#2c2815;color:white;border-radius:10px;border:0;
        }
   .modifier{
    margin-left: 20%;
    */: ;
    padding-left: 20px;
    /* padding-top: 2%; */
    border-radius: 10px;
    /* box-shadow: rgb(252 183 66) 5px 10px 20px inset; */
    padding-bottom: 2%;
    /* margin-top: -15%; */
    width: 95%;
    border: 1px solid black;
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
    border-radius: 1px;
    background-color: white;
    padding-right: 20px;
    box-shadow: 1px 0px 71px #404040;
    border: 1px solid;
    border: 1px solid #bababa;
    border-radius: 4px;
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
    margin-top: 10px;color:white;
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
<div class="row">
    {{-- <form action="/listFactures.php"  method="post"> --}}
      <input value="" type="text" name="fournisseur" placeholder="Recherche par fournisseur" style="background: #f3f3f3 0 0 no-repeat padding-box;border: 0;outline:none;border-radius: 6px;box-shadow: 0 3px 6px rgb(54, 54, 54);height: 48px;padding: 10px 10px 10px 50px;" class=" col-9 col-md-3" id="searchInput">
    {{-- <button type="submit" style='' class="search"><i class="fas fa-search"></i>Chercher
  </button> --}}
  </div>
  <div  style="overflow-x:auto">
  <table class="table table-striped table-responsive">
      <tr class='h5'>
          <td>Fournisseur</td>
          <td>Numéro</td>
          <td>Date </td>
          <td>Total</td>
          <td>Remise Global</td> 
          <td>Mode Paiement</td>
          <td>Mode Livraison</td>
          <td>Type</td>
          <td>Piéce à jointe</td>
          <td>Action</td>
      </tr>
      <center><h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Liste Documents entrée :</h1></center> 
      <tbody id="tbt">
            @foreach ($achats as $ac)
                <tr>
                <td class="fr">{{$ac->fournisseur->nom_entreprise}}</td>
                <td onclick="Liste({{$ac->id}})" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="color:blue;text-decoration:underline;cursor:pointer;">{{$ac->numero}}</td>
                <td>{{$ac->date}}</td>
                <td>{{$ac->total}} DH</td>
                <td>{{$ac->remiseGlobal}} DH</td>
                <td>{{$ac->mode_paiement}}</td>
                <td>{{$ac->mode_livraison}}</td>
                <td>{{$ac->type}}</td>
                <td><a href="{{asset('/achats/'.$ac->piece_jointe)}}" target="_blank">{{$ac->piece_jointe}}</a></td>
                <td>
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i>Action</button>
                <div class="dropdown-menu">
            
                {{-- <button class="btn" title="Modifier"  onclick="Md({{$ac->id}})" id="Mbtn"> --}}
                  <button class="btn Mbtn" title="Modifier"  id="{{$ac->id}}">
                Modifier <i class="far fa-edit"></i></button>
                <br/>
                <span class="btn" title="List articles" onclick="Liste({{$ac->id}})" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                  List Articles <i class="fas fa-list"></i></span>
                {{-- <span class="btn" title="List articles"  onclick="Liste({{$ac->id}})" >
                List Articles <i class="fas fa-list"></i></span> --}}
                <br/>
                <form action="{{route('achat.destroy',$ac->id)}}" method="post">
                @csrf
                @method('DELETE')
                  <button title="Supprimer" type="submit" class="btn" style="color:red;">Supprimer <i class="far fa-trash-alt"></i></button></td>
                </form>
                </tr>
            @endforeach
          </tbody>
                
             </table>
  </div>

  <div class="Liste" style='transform:scale(0)'>
    <div class="row">
     <div class="h3 text-center">Liste Payments</div>
     <div class="col-12">
         <div class="row LPay">
             <div class="col-3 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Libelle</div>
             <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Qte_cmd</div>
             <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Qte_recue</div>
             <div class="col-3 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Prix_achat</div>
         </div>
     </div>
    </div>
 </div>

  <div class="modifier">
     <div class="row">
       <label for="" style="display:none;">Fournisseur</label>
       <select name="Fournisseur" style="display:none;" class="form-control" id="">
       <option value=''>Sélectionner un fournisseur</option>
       <option value='11'>Barclay Finch - Jasper Alston </option><option value='12'>Adena Matthews - Ayanna Lamb </option><option value='16'>James Paul - Courtney Rhodes </option>     </select>
       <label for="">Numéro</label><input class="form-control" type="text">
       <label for="">Date</label><input class="form-control" type="date">
       <label for="">Total</label><input class="form-control" type="number">
       <label for="">Remise Global (DH)</label><input class="form-control" type="number">
       <label for="">Mode Paiement</label>
       <select name="" id="" class="form-control">
       <option value="">Au choix du client</option>
          <option value="Virement">Virement</option>
          <option value="Chéque">Chéque</option>
          <option value="versement">versement</option>
          <option value="Traite">Traite</option>
          <option value="Espèce">Espèce</option>
          <option value="Carte bancaire">Carte bancaire</option>
          <option value="Affacturage">Affacturage</option>
          <option value="">Autres</option>
       </select>
       <label for="">Mode Livraison</label>
       <select name="" id="" class="form-control">
           <option value="">Veuillez sélectionner</option>
           <option value="Livraison à domicile">Livraison à domicile</option>
           <option value="Livraison gratuite">Livraison gratuite</option>
           <option value="Mise à disposition en magasin">Mise à disposition en magasin</option>
           <option value="À la charge de l'acheteur">À la charge de l'acheteur</option>    
       </select>
       <label for="">Type</label>
       <select name="" id="" class="form-control">
             <option value="Facture">Facture</option>
             <option value="Bon">Bon</option>
             <option value="reçu">reçu</option>
                     <option value="Autres">Autres</option>
       </select>
       <div class="row text-center ">
         <button class="mt-2 btn btn-success">
         <i class="far fa-edit"></i> Enregistrer
         </button>
         <button class="mt-2 btn btn-danger">
         <i class="fas fa-backspace"></i>  annuler
        </button>
       </div>
       
     </div>
  </div>


{{-- <!-- Modal --> --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Liste Articles</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table ArtTable">
          <thead>
            <tr>
              <th>Libelle</th>
              <th>Qte_cmd</th>
              <th>Qte_recue</th>
              <th>Prix_achat</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
  {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('js/dtAchat.js')}}"></script>

@endsection