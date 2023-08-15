@extends('layouts.userNav')
@section('title','WORFAC: Credits create')
@section('headInfo')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')
<center>
  <h1 style='color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Ajouter Credit</h1>
</center>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('credit.store')}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="row mt-2">
        <div class="col-11 col-md-4 mt-1">
         <div class="form-floating">
             <select required name='client_id' class="form-select client" id="clients" aria-label="Floating label select example">
             <option >sélectionnez client</option>
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
             <select  name='ref' class="form-select ref" id="refFact" aria-label="Floating label select example">
              <option value=''>sélectionnez documents</option>
             </select>
             <label for="floatingSelectGrid" class='h5'>Réf:</label>
             </div>
        </div>
        <div class="col-11 col-md-2 mt-1">
        <div class="row h6">
               
           </div>
           
        </div>
       
    </div>
    <div class="row"  style="margin-left: 10px;">
    <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
           <div class="row h6">
              <label for="" class="col-11">Prix Marchandise (DH)</label>
              <input  type='number' name='p_marchandise' id="pm"   class="form-control col-11 prix" >
           </div>
        </div>  
      <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
           <div class="row h6">
               <label for="" class="col-11">Prix Avance (DH)</label>
               <input required type='number' name='p_avance' value='0' id="pa" class="form-control col-11 prix">
           </div>
        </div>
        <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
          <div class="row h6">
            <label for="" class="col-11">prix du Reste (DH):</label>
            <input required type="number" readonly id="rest" class="form-control col-11" name='p_reste' >
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
            <select name="mode_paiment" id="" class="form-control">
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
            <input  type="date" id="date" name="date_credit" class="form-control" id=""> 
          </div>
         </div>
         <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
          <div class="row h6">
            <label for="">pièce à jointe:</label>                                           
            <input  type="file" name="piece_jointe"   accept='.png, .jpg, .jpeg,.pdf,.doc,.docx,.xlsx,.xls,.csv' id="file" class="form-control" id=""> 
          </div>
         </div>
         <div  style="margin-left: 10px;" class="col-11 col-md-9 mt-1">
          <div class="row h6">
            <label for="">Observation:</label>                                           
            <textarea name="observation" class="form-control" id="" cols="30" rows="3"></textarea>
          </div>
         </div>
         <div  style="margin-left: 10px;" class="col-11 col-md-3 mt-1">
          <div class="row h6">
          <button type="submit"  class="btn btn-primary"><i class="fas fa-plus-square"></i> Ajouter</button>
          </div>
         </div>
    </div>
 </form>
 <script>
  $(document).ready(function() {
      // Lorsque le menu déroulant change
      $('#clients').on('change',function() {
          var clientId = $(this).val();

          // Effectuer la requête Ajax vers le serveur Laravel
          $.ajax({
              url: '/getFactures/' + clientId,
              type: 'GET',
              success: function(response) {
                  // Afficher les factures des client correspondants
                  var result = $('#refFact');
                  result.empty();
                  if (response.factures.length > 0) {
                    //  console.log(response.factures);
                      $.each(response.factures, function(index, fact) {
                          result.append(`<option value="${fact.ref}">${fact.ref}</option>`);
                          console.log(fact.ref);
                        });
                      
                  } else {
                      result.innerHTML='<option>Aucun facture correspondant trouvé.</option>';
                  }
              },
              error: function() {
                  alert('Une erreur s\'est produite lors de la récupération des articles.');
              }
          });
      });

      // var pm=$('#pm');
      // var pa=$('#pa')
      // $('#pm').on('keyup',calcule);
      // $('#pa').on('keyup',calcule);

      // function calcule(){
      //    var pmr=parseFloat(pm.val());
      //    var par=parseFloat(pa.value);
      //    var rest=parseFloat(pm=-pa);
      //    console.log('le rest :'+ pmr);
      //   //  $('#rest').val=rest
      // }

      let Prix=document.querySelectorAll('input[type="number"]')
      chargerPrix=()=>{Prix[2].value=Prix[0].value-Prix[1].value}
      Prix[0].addEventListener("keyup",()=>{chargerPrix()});
      Prix[1].addEventListener("keyup",()=>{chargerPrix()});
      Prix[0].addEventListener("change",()=>{chargerPrix()});
      Prix[1].addEventListener("change",()=>{chargerPrix()});
  });
</script>
@endsection