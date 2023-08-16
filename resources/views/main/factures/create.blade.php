@extends('layouts.userNav')
@section('title','WORFAC: facture create')
@section('headInfo')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('content')
{{-- <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script> --}}

<style>
  input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

</style>

<div class="DepotFacture">
    <div class="row mt2" style="">
    <div class="col-md-2 col-5 mt-3">
        <div class="form-floating">
          <input id="Ref" class="form-control" value="{{$ref}}">
          <label for="floatingInputGrid"  class='h5'>Réf : </label>
        </div>
    </div>
    <div class="col-md-2 col-5 mt-3">
        <div class="form-floating">
          <select class="form-select" id="type">
                @if ($t=='F')
                <option selected value='facture'> Facture </option>
                @elseif ($t=='bl') 
                <option selected value='bon_livraison'>  Bon Livraison </option>
                @elseif ($t=='bc')
                <option selected value='bon_cmd'>  Bon Commande </option>
                @elseif ($t=='b')
                <option selected value='bon'>  Bon </option>
                @elseif ($t=='fv') 
                <option selected value='facture_d_avoir'>  Facture d'avoir </option>
                @elseif ($t=='dv') 
                <option selected value='devis'>  Devis </option>
                @elseif ($t=='fp') 
                <option selected value='facture_proforma'>  Facture Proforma </option>
                @else 
                <option selected value='facture'>  Facture </option>
                @endif 
          </select>
          <input type="text" hidden readonly value="{{$ex}}" id="exemple"/>
          <label for="type"  class='h5'>Type</label>
        </div>
    </div>
    <div class="col-md-3 col-5 mt-3">
      <input type="text" id="searchInput" class="form-control pb-3 pt-3 rech2" placeholder="Recherche par Nom" />
    </div>
    <div class="col-md-3 col-5 mt-3">
    <div class="form-floating">
     <select class="form-select client"  id="clients" aria-label="Floating label select example">
        @foreach ($clients as $cl)
            <option value='{{$cl->id}}'>{{$cl->name}}</option>   
        @endforeach 
     </select>
     <label for="floatingSelectGrid" class='h5'>Client:</label>
     </div>
    </div>
    <div class="col-md-1 col-5 mt-3">
       <button type="button" class="btn btn-primary " onclick="Ajoute()" ><i class="fas fa-user-plus"></i>Client </button>
    </div>
    <br>
    <div class="col-md-4 col-10 mt-3 ms-1">
      <input type="text" id="searchInputArt" class="form-control pb-3 pt-3 rech" placeholder="Recherche par description">
    </div>
    <div class="col-md-4 col-10 mt-3">
    <div class="form-floating">
     <select class="form-select produit" id="articles" aria-label="Floating label select example">
        @foreach ($articles as $art)
            <option value='{{$art}}'>{{$art->description}}</option>
        @endforeach 
     </select>
     <label for="floatingSelectGrid"  class='h5'>Articles:</label>
     </div>
    </div>
    <div class="col-1 mt-4"  style="padding: 0;padding-top: 5px;width: auto;">
    <button type="button" id="addArt" class="btn btn-success articlebtn" ><i class="fas fa-plus-circle"></i> </button>
    </div>
    <div class="col-md-3 col-12 mt-4" style="">
    <div class="form-floating">
     <select style="overflow-y: hidden;display:;" class="form-select " id="payment" aria-label="Floating label select example">
          <option value="">Au choix du client</option>
          <option value="Virement">Virement</option>
          <option value="Chéque">Chéque</option>
          <option value="versement">versement</option>
          <option value="Traite">Traite</option>
          <option value="Espéce">Espèce</option>
          <option value="Carte bancaire">Carte bancaire</option>
          <option value="Affacturage">Affacturage</option>
          <option value="">Autres</option>
     </select>
     <label for="floatingSelectGrid"  class='h5'>Mode paiement:</label>
     </div>
    </div>
    <div class="col-md-6 col-11 mt-4" style="margin-left:10px">
    <div class="form-floating">
     <textarea name="NB" id="" cols="30" rows="18"  style="padding-top: 3px;height: 20vh;display:none;" class="form-control"> </textarea>
     </div>
    </div>
    <div class="col-12 mt-2"  style="overflow-x:auto">
    <table class="table article-table" style="margin-left:10px" >
    <thead class='table-dark'>
         <td>Libelle</td>
         <td>Unité</td>
         <td>Qte</td>
         <td>PU HT</td>
         <td>TVA</td>
         <td>Montant Tva</td>
         <td>Total TTC </td>
         <td>Sel</td>
    </thead>
    </table>
    </div>
    
    <div class="col-8 ms-2">
       <div class="Payment">
       <p style="padding-left:4px;background: whitesmoke;color: #525050;border: 1px solid #e3e2e2;opacity:" class="fs-2 tva">Montant Brut HT :</p>
       <p style="padding-left:4px;background: whitesmoke;color: #525050;border: 1px solid #e3e2e2;" class="fs-2 ht">Montant Brut HT : </p>
       <p style="padding-left:4px;background: whitesmoke;color: #525050;border: 1px solid #e3e2e2;" class="fs-2 remise">Remise :</p>
       <p style="padding-left:4px;background: whitesmoke;color: #525050;border: 1px solid #e3e2e2;" class="fs-2 Netht">Net HT : </p>
       <p style="padding-left:4px;background: whitesmoke;color: #525050;border: 1px solid #e3e2e2;opacity:
         " class="fs-2 ttc">Montant TTC :</p>
       </div>
    </div>
    <div class="col-3">
      <form action="{{route('facture.store')}}" method="post" id="FForm">
        <button type="submit" class="btn btn-success col-md-9 col-12" ><i class="far fa-check-circle"></i> Valider</button>
        {{-- <button type="button" class="btn btn-success col-md-9 col-12  " onclick="Valider()"><i class="far fa-check-circle"></i> Valider</button> --}}
      </form>
        <a href="#" id="imprime" ><button type="button" value="" class="btn btn-secondary imprimer col-md-9 col-12 mt-2"><i class="fas fa-print"></i> Imprimer</button></a>
        <a href="#" id="wht"  class="btn btn-success col-md-9 col-12 mt-2" style='background-color:#075e54;color:white;border:0;' onclick=""><i class="fab fa-whatsapp"></i>
        Whatsapp</a>
        <button style="border:1px solid #075e54; " type="button" class="btn btn-light col-md-9 col-12 mt-2" id="vider">Vider</button>
    </div>
  <div class="AjouteClient" style="background-color: rgb(248, 248, 248);padding-left: 10%;border-radius: 5px;box-shadow: rgb(231 231 231) 5px 10px 20px inset;
padding-bottom: 2%;width: 70%;border: 1px solid rgb(147 147 147);transform: scale(0);margin: 10% auto auto;position: absolute;padding: 17px;top: 0px;left: 0px;right: 0px;">
 <div class="row"></div>
 <form action="{{route('clients.store')}}" method="post">
  @csrf
  <div class="mb-3">
     <label for="name" class="form-label">Nom entreprise ou Nom Complet :</label>
     <input name="name" type="text" style="width:50%" class="form-control col-8" placeholder="" />
   </div>
   <div class="mb-3">
     <label for="adresse"  class="form-label">Adresse:</label>
     <input type="text" name="adresse" style="width:50%" class="form-control col-8" placeholder="" />
   </div>
   <div class="mb-3">
     <label for="telephone"  class="form-label">Telephone:</label>
     <input type="text" name="telephone" style="width:50%" class="form-control col-8" placeholder="+212631933957" />
   </div>
   <div class="mb-3">
     <label for="ice"  class="form-label">ICE:</label>
     <input type="text" name="ice" style="width:50%" class="form-control col-8" id="ice" placeholder="" />
   </div>
   <div class="mb-3">
     <label for="ville"  class="form-label">Ville:</label>
     <input type="text" name="ville" style="width:50%" class="form-control col-8" placeholder="" />
   </div>
   <button type="submit" class="btn btn-success "><i class="fas fa-plus-circle"></i> Ajouter Client</button>
        <button type="button" id="annuler" class="btn btn-danger " >Annuler </button>
      </form>
 </div>  
     </div>
   </div>
  
   <script src="{{asset('js/test.js')}}"></script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@endsection