@extends('layouts.userNav')
@section('title','WORFAC: Achat create')
@section('headInfo')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('content')
<center><h1 style='color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Ajouter facture d'achat:</h1></center>

<form action="{{route('achat.store')}}" style="margin-left: 10%;margin-top: 5%;" method="post" enctype="multipart/form-data" id="Fachat">
    @csrf
<label for="" class="h1"><i class="fas fa-file-medical"></i></label><br>
<label for="" class="h2">Informations piece :</label>
<div class="row">
    <div class="col-md-4 col-12 h5">Fournisseur:<br/>
        <select  class='form-control' name="fournisseur" id="">
            <option value=''>Selectionner un fournisseur</option>
            @foreach ($fournisseurs as $fr)
                <option value='{{$fr->id}}'>{{$fr->nom_entreprise}} </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 col-12 h5">Numero * :
        <input required  type="text" placeholder="FAA-07122021-1" class='form-control' name="Numero" id="num">
    </div>
    <div class="col-md-4 col-12 h5">Date  :<br/>
          <input type="date" name="dateFacture" id="date" class="form-control">
    </div>
    <div class="col-md-4 col-12 h5">Total :<br/>
          <input type="number" name="total" id="total" class="form-control"></div>
    <div class="col-md-4 col-12 h5">Remise Global (DH):<br/>
          <input type="number" name="remiseglobal" id="remise" class="form-control"></div>
    <div class="col-md-4 col-12 h5 ">Mode paiement :<br/>
          <select style="" name="modePaiement" class="form-select form-select-lg mb-3" id="modePaiement">
              <option value="">Au choix du client</option>
              <option value="Virement">Virement</option>
              <option value="Chéque">Chéque</option>
              <option value="Traite">Traite</option>
              <option value="Espéce">Espèce</option>
              <option value="Versement">Versement</option>
              <option value="Carte bancaire">Carte bancaire</option>
              <option value="Affacturage">Affacturage</option>
              <option value="Autres">Autres</option>
          </select>
        </div>
    <div class="col-md-4 col-12 h5">Mode Livraison :<br/>
          <select name="modeLivraison" class="form-select form-select-lg mb-3" id="modeLiv">
           <option value="">Veuillez selectionner</option>
           <option value="Livraison à domicile">Livraison à domicile</option>
           <option value="Livraison gratuite">Livraison gratuite</option>
           <option value="Mise à disposition en magasin">Mise à disposition en magasin</option>
           <option value="À la charge de l'acheteur">À la charge de l'acheteur</option>    
          </select>
    </div>
    <div class="col-md-4 col-12 h5">Type :<br/>
          <select name="type" class="form-select form-select-lg mb-3" id="type">
           <option value="Facture">Facture</option>
           <option value="Bon">Bon</option>
           <option value="reçu">reçu</option>
           <option value="Autres">Autres</option>
          </select>
    </div>
     <div class="col-md-4 col-12 h5">Piece à jointe :<br/>
     <input type="file" required accept='.png, .jpg, .jpeg, .pdf,.doc,.docx,.xlsx,.xls,.csv' name="file" class="form-control" id="pj" /><div class="h6" style="font-size:13px:color:gray;">image,pdf,doc,docx,xlsx,xls,csv</div></div>
</div>
<select name="Article" class="form-select form-select-lg mb-3" id="">
    <option>selectionner Article :</option>
    @foreach ($articles as $art)
        <option value='{{$art}}'>{{$art->description}}</option>
    @endforeach  
</select>
<div style="overflow-x:auto">
     <table class="table col-10" name="mytable"  style="width:80%">
             <thead>
               <tr>
                 <th scope="">Article</th>
                 <th scope="col-2">Qte commande</th>
                 <th scope="col">Qte reçue</th>
                 <th scope="col">Prix Achat</th>
                 <th scope="col">Action</th>
               </tr>
             </thead>
             <tbody>
             </tbody> 
       </table>
</div>

<button type="submit" class="btn btn-primary" ><i class="fas fa-download"></i> Enregistrer</button>    
</form>
<script src="/js/achat.js"></script>
@endsection