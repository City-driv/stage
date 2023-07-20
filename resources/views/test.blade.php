@extends('partials.guestHeader')
@section('title','facture-gratuit')
@section('content')
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<style>
    button
    {
      background-color:#f60;
      color: white;
      border: 0;
      font-weight: 500;
      border-radius: 10%;
    }
    label
    {
        font-weight: 500;
        font-size:15px;
        color: black;
        margin-bottom:2px;
    }
    a{
        text-decoration: none;
    }
    input:focus,textarea:focus,select:focus
    {
      border: 1px solid #f60;
      outline:none;
    }
    tr:nth-child(even) {background: #FFC0AC}
     tr:nth-child(odd) {background: #FFDAB8}
    input,textarea,select{
      padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
       
    }
    .h4,.h3 i{
      color:#335ADB;
    }
    table{
        border-collapse:collapse;
    }
    td{
        text-align:center;
        border:1px solid white;
    }
  </style>    

    <body style=" background-color:#e4e4e4;
font-family:system-ui;overflow-x:hidden;">

<form action="" id="product-form">
      <div class="row">     
           <div class="col-1"></div>
           <div class="col-12 col-md-10 pt-3 pb-3" style='border:1px solid #f60;'>
             <label for="" class="col-2">Date:</label>   <input type="date" name="" id="date"><br>
             <label for="" class="col-2">Numéro Facture: </label><input type="text" value='FC-897-1' name="" id="numf"><br>
             <button onclick='Societe()'id="societe" style='background:#335ADB;transform:scale(1.4)' >Societe</button>
             <button onclick='Client()' style='margin-left:10px;' id="client" >Client</button>
             <div class="col-12 societe pt-2 pb-2" style='border:1px solid #f60;padding-left:5px;'>
             <label class='col-2' for="">Société:</label>               <input type="text" name="" id="societe"><br>
             <label class='col-2' for="">Adresse: </label>              <input type="text" value='' name="" id="adresse"><br>
             <label class='col-2' for="">Email: </label>                <input type="email" value='' name="" id="email"><br>
             <label class='col-2' for="">Télephone: </label>            <input type="text" value='' name="" id="telephone"><br>
             <label class='col-2' for="">Identifiant fiscal: </label>   <input type="email" value='' name="" id="idf"><br>
             <label class='col-2' for="">Registre de commerce	: </label><input type="email" value='' name="" id="rc"><br>
             <label class='col-2' for="">ICE	: </label><input type="email" value='' name="" id="ice"><br>
             <label class='col-2' for="">Form Juridique :</label>
             <select name="" id="fj"><option value="">Veuillez selectionner</option>
                    <option value="Auto-entrepreneur">Auto-entrepreneur</option>
                    <option value="SARL A ASSOCIE UNIQUE">SARL A ASSOCIE UNIQUE</option>
                    <option value="Personne physique">Personne physique</option>
                    <option value="L’entreprise individuelle">L’entreprise individuelle</option>
                    <option value="La Societe à Responsabilite Limitee (SARL)">La Societe à Responsabilite Limitee (SARL)</option>
                    <option value="La Societe en Nom Collectif">La Societe en Nom Collectif</option>
                    <option value="La Societe en commandite simple">La Societe en commandite simple</option>
                    <option value="La Societe anonyme simplifiee">La Societe anonyme simplifiee</option>
                    <option value="La Societe en commandite par actions">La Societe en commandite par actions</option>
                    <option value="La Societe anonyme">La Societe anonyme</option>
                    <option value="La Societe en participation">La Societe en participation</option>
                    <option value="Le groupement d’interêt economique">Le groupement d’interêt economique</option>
                    <option value="Succursale">Succursale</option>
                </select></select>
             </div>
             <div class="col-12 client pt-2 pb-2" style='border:1px solid orange;display:none;padding-left:5px;'>
             <label class='col-2' for="">Société:</label><input type="text" name="" id="societe"><br>
             <label class='col-2' for="">Adresse: </label><input type="text" value='' name="" id="adresse"><br>
             <label class='col-2' for="" style=''>Email: </label><input style='' type="email" value='' name="" id="email"><br>
             <label class='col-2' for="">Télephone: </label><input type="text" value='' name="" id="telephone"><br>
             <label class='col-2' for="">Identifiant fiscal: </label><input type="email" value='' name="" id="idf"><br>
             <label class='col-2' for="">ICE	: </label><input type="email" value='' name="" id="ice"><br>
             <label class='col-2' for="">Ville	: </label><input type="email" value='' name="" id="ville"><br>
             </div>
             <div class="row produit">
                 <div class="col-12 h6">
                     Saisissez la désignation du produit ou service :
                 </div>
                 <div class="col-12 col-md-4"><input class='form-control' type="text" style='width:100%' placeholder="Désignation" name="" id="des"></div>
                 <div class="col-12 col-md-1"><input class='form-control' min="0" type="number" placeholder="TVA" name="" id="tva"></div>
                 <div class="col-12 col-md-2"><input class='form-control' min="0" type="number" placeholder="Quantité" name="" id="qte"></div>
                 <div class="col-12 col-md-2"><input class='form-control' min="0" type="number" placeholder="Prix unitaire" name="" id="prix"></div>
                 <div class="col-12 col-md-1">
                 <select id='unite' name='SaleDelivery[lines][0][product][unit]' class='form-control valid' data-validation='required' data-validation-error-msg='Ce champ est obligatoire.' original=''>
                 <optgroup label='Unité'><option value='Douzaine'>Douzaine(s)</option><option selected value=''>Unité(s)</option></optgroup>
                 <optgroup label='Poids'><option value='t'>t</option><option value='kg'>kg</option><option value='g'>g</option></optgroup>
                 <optgroup label='Temps de travail'><option value='Jour'>Jour(s)</option><option value='Heure'>Heure(s)</option></optgroup>
                 <optgroup label='Période'><option value='mois'>mois</option><option value='ans'>ans</option></optgroup>   
                 <optgroup label='Longueur/distance'><option value='km'>km</option><option value='m'>m</option><option value='cm'>cm</option></optgroup>
                 <optgroup label='Volume'><option value='Litre'>Litre(s)</option></optgroup>
                 </select>
                 </div>
                 <div class="col-1"></div>
                 <button type="submit" class="col-12 col-md-1 mb-2 mt-2" style='background-color:#28a745;border-radius:5px;'>ajouter</button>
              </form>
                 <div class="col-1"></div>
                 <table class='col-10 mt-2' style='' id="invoice-table">
                     <tr>
                         <td style='padding:5px;background-color:#f60;color:white'>Désignation </td>
                         <td style='padding:5px;background-color:#f60;color:white'>Unité</td>
                         <td style='padding:5px;background-color:#f60;color:white'>Prix Unitaire</td>
                         <td style='padding:5px;background-color:#f60;color:white'>Qte</td>
                         <td style='padding:5px;background-color:#f60;color:white'>Tva</td>
                         <td style='padding:5px;background-color:#f60;color:white'>Total</td>
                         <td style='padding:5px;background-color:#f60;color:white'>supp</td>
                     </tr>
                     {{-- <tbody> --}}
                     {{-- <tr>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                     </tr> --}}
                    {{-- </tbody> --}}
                    <tfoot>
                     <tr style='background-color:#7c93df;color:white;font-size:20px;'>
                         <td  style="background:#7c93df;">total tva</td>
                         <td  style="background:#7c93df;" id="ttva">0 DH</td>
                     </tr>
                     <tr style='background-color:#4063d7;color:white;font-size:20px;'>
                         <td  style="background:#4063d7;">total HT</td>
                         <td  style="background:#4063d7;" id="tht">0 DH</td>
                     </tr>
                     <tr style='background-color:#335ADB;color:white;font-size:20px;'>
                         <td  style="background:#335ADB;">total TTC</td>
                         <td  style="background:#335ADB;" id="ttc">0 DH</td>
                     </tr>
                    </tfoot>
                 </table>
                 <div class="row mt-3" style='margin-left:3px;width:96%;'>
                   <div class="col-1"></div>
                     <div class="col-10 text-center">
                        <button type="reset" id="fresh">Nouvelle facture</button>
                        <button type="button" id="imprimer">Imprimer facture</button>
                     </div>
                 </div>
             </div>
           </div>
           <div class="col-1"></div>
    </div>  
 </form>
 <script src="js/invoice.js?"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
@endsection