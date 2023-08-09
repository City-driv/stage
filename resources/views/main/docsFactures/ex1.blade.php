<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>WORFAC 1</title>
    <script src='https://kit.fontawesome.com/f0841bede9.js' crossorigin='anonymous'></script>
    <link rel="icon" href="logo.png" />
    <style type='text/css' media='print'> 
      @page { size: A4; /* auto is the initial value */ margin: 0mm; /* this affects the margin in the printer settings */ } html { background-color: #FFFFFF; margin: 0px; /* this affects the margin on the html before sending to printer */ } body { border: solid 1px blue ; margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */ } 
      body {
  -webkit-print-color-adjust:exact;
  border: none !important;
  margin: 0;  
}
 </style>
    <style>
       body{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  }
  body::after {
  content: "";
  background: url(images/t1.jfif);
  background-size:100% 100%;
  opacity: 0.1;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;   
}
  .ligne1{
    background-color: #48B7F5;
    font-size: 20px;
  }
  table td{
    text-align: center;
    border: 1px solid #06486D;
  }
  footer{
    /* height: 8vh;  */
    font-size:15px;
    position: absolute;
    width: 100%;
    /* padding-left:15px; */
    /* padding-right:15px; */
    /* margin-top: 93.2vh; */
    /* margin-top: 192.6vh; */
    font-family:cursive;
    background:#6EC6F7;
  }
  .tr{
      }
    </style>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
</head>
<body>
 
  <div class=''>
    <div class='row' style='border-bottom: 1px solid #06486D;'>
      <div class='col-9 h1 text-center' style='border-top: 0;font-size:75px;font-familly:cursive;background: -webkit-linear-gradient(#00185E,#06486D);-webkit-background-clip: text;-webkit-text-fill-color: transparent;
    '>{{Auth::user()->name}}</div>
    <div class='col-3'>
      {{-- to add img --}}
      @php
          $img=asset('profiles/'.Auth::user()->img);
      @endphp
      <img src='{{$img}}' style='width: 90px;height: 90px;background-size: 90px 90px;' alt='Entreprise logo' >
      <div class='type h5'>
        {{$facture->type_fact}}
        <br>
        N° {{$facture->ref}}
      </div>
    </div>
  </div>
  <div class='row mt-1'>
    <div class='col-1'></div>
    <div class='col-2 text-center'>
      <div class='row'>
        <div class='col-12 h6'>Date:</div>
        <div class='col-12 h6'>Client :</div>
        <div class='col-12 h6 pt-2'>Adress:</div>
      </div>
    </div>
    <div class='col-4 text-center'>
      <div class='row'>
        <div class='col-12 h6'>{{$facture->date_facture}}</div>
        <div class='col-12 h6'>{{$facture->clientFact->name}}</div>
        <div class='col-12 h6 pt-2'>{{$facture->clientFact->adresse}}</div>
        <div class='col-12 h6'><i class='fas fa-phone-alt'></i>{{$facture->clientFact->telephone}}</div>      </div>
      </div>
      <div  style='background-color: #A8DDFA' class='col-5 h5 pt-2'>
        
        <center><h5></h5></center>
      </div>
    </div>
    <div class='row mt-4'>
      <div class='col-1'></div>
      <table class='col-10'>
        <tr class='ligne1'>
          <td>Description</td>
          <td>Prix unitaire</td>
          <td>Taux remise</td>
          <td>Qte</td>
          <td>Total TTC</td>
        </tr>
        @foreach ($Ligne_fact as $lf)
        <tr class='tr'>
          <td style='text-align: left; padding: 4px;'>{{$lf->article->description}}</td>
          <td>{{$lf->article->price}} DH</td>
          <td>{{$lf->remise}} %</td>
          <td>{{$lf->quantite}}</td> 
          <td style='width:15%'>{{ ($lf->ttc )}} DH</td>
        </tr>
        @endforeach
        <tr style='' class='ligne1'>
          <td colspan='6'>Récapulatif</td></tr>
          <td>Total Net H.T</td>
          <td>Montant TVA</td>
          <td class='ligne1' colspan='4'>Net a payer en MAD</td>
        </tr>
        <tr>
          <td>{{$facture->tht}}  DH</td>
          <td>{{$facture->ttva}}  DH</td>
          <td class='ligne1' colspan='4'>{{$facture->ttc}}  DH</td>
        </tr>
        {{-- <tr>
            <td>{{$Ligne_fact->articles}}</td>
        </tr> --}}
        {{-- <tr>
          <td colspan='6'> CENT TROIS DIRHAMS MAROCAINS  ET SOIXANTE-DIX  CENTIMES</td>
        </tr> --}}
       
      </table>
      <div class='col-8 h6 ms-5 mt-1 text-left'> </div>
    </div>
  </div>
</div>

<footer>
<div class='col-12 text-center'>Société :{{Auth::user()->entreprise_name}}:/Tél :{{Auth::user()->telephone}}  / Forme juridique:{{Auth::user()->fj}} /ICE:{{Auth::user()->ice}}</div>
</footer>
</body>
</html>