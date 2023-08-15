<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORFAC 9</title>
    <link rel="icon" href="logo.png" />
    <script src="https://kit.fontawesome.com/f0841bede9.js" crossorigin="anonymous"></script>
    <style type="text/css" media="print"> 
             .a4-page {
    height: 297mm; /* Hauteur du format A4 en millimètres */
    width: 210mm; /* Largeur du format A4 en millimètres */
}

@media print {
    .a4-page {
        overflow: hidden; /* Éviter les débordements lors de l'impression */
        page-break-before: always; /* Commencer chaque page sur une nouvelle feuille */
    }
}
        body {
    -webkit-print-color-adjust:exact;
    border: none !important;
    padding-top:5px;
    margin: 0;  
   }
   </style>
    <style>
      .nomE{
    color: #521400;
}
.nomE{
  font-size: 43px;    font-family: cursive;
    font-weight: 900;
    z-index: 2;
}
.info .h6 ,.info .h3{
    font-family: cursive;
    font-weight: 900;
}
.info {
background-color: #521400;
color: white;
border-left: 15px;
}
i{
    background-color: #50AF4C;
    padding: 4px;
    box-shadow: 5px 5px 5px grey;
    margin-right: 10px;
    color: #521400;
}
.info .col-7{
    padding-left: 10px;
    color: rgb(211, 208, 208);
}
.type{
    background-color: #521400;
    font-family: cursive;
    font-size: 30px;
}
.ligne1{
    
    color: white;
    font-size:18px;
    text-align: center;
    font-family: monospace;
    font-weight: 900;
}
tr{
              font-family: monospace;
    font-weight: 500;
    color: black;
    border-bottom: 4px solid #521400;
}
.Qte,.PRHT,.tva,.Ttva,.THT,.Total{
    text-align: center;
}
tr:nth-child(odd){
    background-color: rgb(243, 243, 240);
}
tr:nth-child(even){
    background-color: rgb(250, 250, 250);
}
.footer {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 6.4vh;
    background-color: #521400;
}
/* .footer{
    
    margin: auto;
  position: absolute;
  margin-top: 97vh;
  top: 0; left: 0;
  width: 100%;
  height:6.4vh;
 background-color: #521400;
 margin-top: 160vh;height:8vh;      } */
.footer .col-6{
    
     color: white;
  font-size: 25px;
  font-family: cursive;
  text-align: center;
}
.div {
    background-color:#50AF4C ;
    height:6.4vh;
   
}
.div i{
        color: black;
  font-size: 15px;
  font-family: cursive; 
  text-align: left; 
}
.client{
    background-color: rgb(243, 243, 240);
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
 <div class='container-fluid'>
<div class='row pt-4' >
  <div class='col-6'>
      <div class='row mt-4' style='padding-left: 30px;'>
          <div class='col-3'>
            @php
                $img=asset('profiles/'.Auth::user()->img);
            @endphp
            <img src='{{$img}}' style='height: 80px;width: 80px;background-size:  80px 80px;' alt='' srcset=''></div>
          <div class='col-9  nomE'> {{Auth::user()->entreprise_name}}</div>
          <div class='col-12 h3'>Contact</div>
          <div class='col-12 h6'><i class='fas fa-mobile-alt'></i>{{Auth::user()->telephone}}</div>
          <div class='col-12 h6'><i class='far fa-envelope'></i>{{Auth::user()->email}}</div>
          <div class='col-12 h6 lh-1'><i style='margin-bottom:10px;' class='fas fa-map-marker-alt mt-1'></i>{{Auth::user()->adresse}}</div>
        </div>
  </div>
  <div class='col-6 client'>
      <div class='row info pt-4'>
          <div class='col-3' style=' background-color: #521400;
          border-right: 20px solid transparent;
          border-top: 50px solid #50AF4C;'></div>
          <div class='col-6 text-center type'>{{$facture->type_fact}}</div>
          <div class='col-3' style=' background-color: #521400;
          border-left: 20px solid transparent;
          border-top: 50px solid #50AF4C;'></div>
          <div class='col-7'>N° {{$facture->ref}}</div>
          <div class='col-7'>Date :{{$facture->date_facture}}</div>
      </div>
      <div class='col-10 h3'>   Facture à</div>
      <div class='col-12 h7'>{{$facture->clientFact->name}} </div>
      <div class='col-12 h7'> {{$facture->clientFact->telephone}} </div>
      <div class='col-11 h7'>{{$facture->clientFact->adresse}}  </div>
    </div>
  </div>
  <div class='col-11 mt-3'  style='padding-left: 30px;'>
            <table>
                <tr class='ligne1' style='background-color: #521400'>
                    <td class='libelle' width='50%'>Description</td>
                    <td class='PRHT' width='15%'>Prix unitaire</td>
                    <td class='PRHT' width='5%%'>Taux remise</td>
                    <td class='Qte' width='5%%'>Qte</td>
                    <td class='tva' style='display:block' width='10%'>Tva</td>
                    <td class='Total' width='20%'>Total</td>
                </tr>
                @foreach ($Ligne_fact as $lf)
                    <tr style='border-bottom: 1px solid #aaaaaa;'>
                        <td style='padding-left: 10px;' class='libelle'>
                            {{$lf->article->description}}
                        </td>
                        <td class='PRHT'>{{$lf->article->price}} DH</td>
                        <td class='Qte'>{{$lf->article->remise}} %</td>
                        <td class='Qte'>{{$lf->article->quantite}}</td>
                        <td class='tva'  style='display:block'>{{$lf->article->tva}}%</td>
                        <td class='Total'>{{ ($lf->ttc )}} DH</td>
                    </tr>
                @endforeach
            </table>
   </div>
   <div class='row mt-2'  style='padding-left: 30px;'>
       <div class='col-6 h5'>
        </div>
        <div class='col-5 h6' style='margin-left: 10px;'>
        <div class='row'>
        
            <div  style='display:block'  class='col-6 mt-2'>Montant Tva :</div>
            <div  style='display:block'  class='col-6 mt-2 text-center'>{{$facture->ttva}}  DH</div>
            <div  style='display:block'  class='col-6 mt-2'>Total HT :</div>
            <div  style='display:block'  class='col-6 mt-2 text-center'>{{$facture->tht}}  DH</div>
            <div class='col-6 mt-2 pt-2 pb-2' style='color: black;background-color: #50AF4C;'>TOTAL TTC :</div>
            <div class='col-5 text-center mt-2  pt-2 pb-2'
              style='color: white; background-color: #521400;'>{{$facture->ttc}}  DH</div> 
             </div>   
            </div>
        </div>
        {{-- <div class='col-11 text-center h9 mt-2' style='font-size:14px;font-weight:600;'> MILLE QUATRE CENT QUATRE-VINGT TROIS DIRHAMS MAROCAINS  ET SOIXANTE-DIX  CENTIMES</div> --}}
            <div class='col-8 h5'>
             </div>
    <div class='col-8 h5 text-left'> </div>
   </div>
   <div class='signature' style='display:none'>
     <div class='row mt-3'>
         <div class='col-3'></div>
         <div class='col-3'>
           <p style='color:#521400;text-align: center; border-bottom: 2px dashed #521400;'>Signature Entreprise:
        <br>
         </div>
         <div class='col-3'>
           <p style='color:#521400;text-align: center; border-bottom: 2px dashed #521400;'> signature Client: <br>
         </div>
     </div>
 </div>
   
 </div>
</div>
    <div class="footer">
       <div class="row">
       <div class="col-6 pt-3 pb-2">merci pour votre Confiance</div>
           <div class="col-6 div text-center" style=" color: #521400;
            font-size: 14px;font-family: cursive;text-align: center;">
               Forme juridique:{{Auth::user()->fj}}/ICE:{{Auth::user()->ice}}</div>
       </div>
   </div>
      
</body>
</html>