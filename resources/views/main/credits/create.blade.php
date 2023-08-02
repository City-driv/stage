@extends('layouts.userNav')
@section('title','WORFAC: Credits create')
@section('content')
<form   method="POST" action="/Nocredits.php" enctype="multipart/form-data" class="settings">
<form action="{{route('credit.store')}}" method="post" enctype="multipart/form-data">
    <div class="row mt-2">
        <div class="col-11 col-md-4 mt-1">
         <div class="form-floating">
             <select required name='client' class="form-select client" id="floatingSelectGrid" aria-label="Floating label select example">
             <option value="">sélectionnez client</option>
             @foreach ($clients as $cl)
                <option value='{{$cl->id}}'>{{$cl->name}}</option> 
             @endforeach
             </select>
             <label for="floatingSelectGrid" class='h5'>Client:</label>           
             </div>
        </div>
        <div class="col-11 col-md-3 mt-1">
         <div class="form-floating">
             <select name='type' class="form-select type" id="floatingSelectGrid" aria-label="Floating label select example">
                 <option value='FACTURE'>FACTURE</option>
                 <option value='BON LIVRAISON'>BON LIVRAISON</option>
             </select>
             <label for="floatingSelectGrid" class='h5'>Type:</label>
             </div>
        </div>
        <div class="col-11 col-md-3 mt-1">
         <div class="form-floating">
             <select  name='ref' class="form-select ref" id="floatingSelectGrid" aria-label="Floating label select example">
              <option value=''>sélectionnez documents</option>
             </select>
             <label for="floatingSelectGrid" class='h5'>Réf:</label>
             </div>
        </div>
        <div class="col-11 col-md-2 mt-1">
        <div class="row h6">
               
           </div>
           
        </div>
        {{-- <div class="col-11 col-md-4 mt-1" style='display:none'>
         <div class="form-floating">
             <select name='article' class="form-select article" id="floatingSelectGrid" aria-label="Floating label select example">
               <option value="">sélectionnez article</option>
              <option value='497'>DUCIMUS EAQUE NON A</option><option value='498'>ET AUT ET EST DUCIMU</option><option value='499'>PHONE</option><option value='500'>SOURIS</option>            </select>
             <label for="floatingSelectGrid" class='h5'>Aticles:</label>
             </div>
        </div> --}}
        
       
    </div>
    <div class="row"  style="margin-left: 10px;">
    <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
           <div class="row h6">
              <label for="" class="col-11">Prix Marchandise (DH)</label>
              <input required type='number' step="0.01" name='prixM' value='0'  class="form-control col-11 prix" value="">
           </div>
        </div>  
      <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
           <div class="row h6">
               <label for="" class="col-11">Prix Avance (DH)</label>
               <input required type='number' name='prixC' value='0'  class="form-control col-11 prix" value="">
           </div>
        </div>
        <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
          <div class="row h6">
            <label for="" class="col-11">prix du Reste (DH):</label>
            <input required type="number" readonly value="0" class="form-control col-11" name='Rest' value="">
          </div>
         </div>
        <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
           <div class="row h6">
            <label for="">Motif de l'opération:</label>                                           
            <input  type="text" name="motif" class="form-control" id=""> 
          </div>
         </div>
         <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
          <div class="row h6">
            <label for="" class="col-11">Mode de paiement:</label>
            <select name="mode" id="" class="form-control">
                       <option value="">Au choix du client</option>
                       <option value="Virement">Virement</option>
                       <option value="Chéque">Chéque</option>
                       <option value="Traite">Traite</option>
                       <option value="Espéce">Espèce</option>
                       <option value="Versement">Versement</option>
                       <option value="Carte bancaire">Carte bancaire</option>
                       <option value="Affacturage">Affacturage</option>
                       <option value="">Autres</option>
             </select>
          </div>
         </div>
         <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
          <div class="row h6">
            <label for="">Date crédits:</label>                                           
            <input required type="date" id="date" name="date" class="form-control" id=""> 
          </div>
         </div>
         <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
          <div class="row h6">
            <label for="">pièce à jointe:</label>                                           
            <input  type="file" name="fiche"   accept='.png, .jpg, .jpeg,,.pdf,.doc,.docx,.xlsx,.xls,.csv' id="file" class="form-control" id=""> 
          </div>
         </div>
         <div  style="margin-left: 10px;" class="col-11 col-md-9 mt-1">
          <div class="row h6">
            <label for="">Observation:</label>                                           
            <textarea name="Observation" class="form-control" id="" cols="30" rows="3"></textarea>
          </div>
         </div>
         <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
          <div class="row h6">
          <button type="submit"  class="btn btn-primary" name="ajoute"><i class="fas fa-plus-square"></i> Ajouter</button>
          </div>
         </div>
    </div>
 </form>
@endsection