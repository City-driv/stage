<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORFAC 4</title>
    <script src="https://kit.fontawesome.com/f0841bede9.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{asset('/imgs/logo.png')}}" />
    <style type="text/css" media="print"> 
    /* confirmed */

      @media print {
    body {
        margin: 0;
        padding: 0;
        background-color: white;
        -webkit-print-color-adjust: exact;
    }
    /* confirmed */
    
    .containerr{
        /* background-color: #f0f5f5; */
    }
    
    .a4-page {
        overflow: hidden; /* Éviter les débordements lors de l'impression */
        page-break-before: always;
         /* Commencer chaque page sur une nouvelle feuille */
    }

}
         @page { size: A4;margin-top: 10mm; margin-bottom: 0mm;}
        html { background-color: #FFFFFF; margin: 0px;  }
        body { border: solid 1px blue ; margin: 10mm 15mm 10mm 15mm; 
        background-color: #f0f5f5;
            /* margin you want for the content */ } 
        body {
    -webkit-print-color-adjust:exact;
    border: none !important;
    margin: 0;  
}
   </style>
    <style>
        .example2{
            border-top-left-radius: 250px;
            /* min-height: 100vh; */
            /* min-height: 101.5vh; */
            background-color: #f0f5f5;
            padding-left: 3%;
            border-bottom: 5vh solid  #0C91DA;
            /* height: 201.5vh; */
            height: 100%;
            border-bottom:0;            
                        
        }
        table{
            background-color: rgb(233, 227, 233);
        }
        .type{
         color:#4d79ff;
         font-size: 50px;
         font-family:cursive;
        }
        .info{
            padding-top: 5%;
            font-size: 30px;
            font-family: monospace;
        }
        .adressL,.emailL,.teleL{
       color: #4d79ff;
       font-family: fantasy;
        }
        .ligne1{
         border-bottom: 5px solid #f0f5f5;
         background-color:  #0C91DA;
         color: white;
         font-weight: bold;
         font-size: 20px;
         text-align: center;
        
        }
        td{
         border:1px solid black;   
        }
     .Total{
         text-align: center;
     }
     .Qte,.PRHT,.tva,.Ttva,.THT{
         text-align: center;}
     .tr{
         height:40px;
         font-family:sans-serif;
        line-height: 20px;
        font-size:13px;
         background-color: #D3D3D3;
     }.tr .libelle{
         padding-left:10px;
     } 
     .TotalTTC{
        background-color: #0C91DA;  
        color: white;
     font-size: 20px;
     }
         
     .signature{
         color: black;
         margin-top:5%;
         margin-left: 20%;
     }
     .signature p{
         color: black;
         float: left;
         height: 90px;
     }
     .signature img{
         border-top: 2px dashed black;
         height: 90px;
         margin-left: 20px;
         width: 90px;
         background-size:  90px 90px;
     }
     .Nom{
         color:#0C91DA;
         font-family:cursive;
     }
     .py{
         margin-left:50%;
     }
     
      tfoot{
    display: table-footer-group;
    bottom: 0;
  }
footer{
  position: fixed;
  width: 100%;
  bottom: 0;
  left: 0;
  height: 40px;
  /* padding-top: 10px; */
  text-align: center;
  background-color: #D3D3D3;
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: #0C91DA;">
<div class="containerr" id="c1">
<div class='example2'>
<header>
    <div class='row'>
        <div class='col-12 text-center mt-5'>
            @php
                $img=asset('profiles/'.Auth::user()->img);
            @endphp
          <img style='width: 100px;height: 100px; background-size: 100px 100px;' src='{{$img}}' class='rounded-circle logo' alt='...'>
          <br><h1 class='Nom'>{{Auth::user()->entreprise_name}}</h1>
        </div>
    </div>
    <div class='row'>
        <div class='col-6 infos'>
            <div class='type'> {{$facture->type_fact}}</div>
            <label class='Bill' style='font-size:20px;font-family:fantasy;padding-left:10px;color:#0C91DA'> Facture à</label><br>
            <label class='NomC' style='padding-left:10px;'>{{$facture->clientFact->name}}</label><br>
            <label class='teleC' style='padding-left:10px;'> {{$facture->clientFact->telephone}}</label><br>
            <label class='adressC' style='padding-left:10px;'>{{$facture->clientFact->adresse}} </label> 
            
            <label class='telec' style='padding-left:10px;text-align:center'></label> 
            </div>
        <div class='col-6'>
            <div class='info'>
                <label for='' class='Ncmd'>N° {{$facture->ref}}</label><br>
               <label for='' class='Dcmd'>Date : {{$facture->date_facture}}</label>
              </div>
              <div class='entreprise'>
                  <label for='' class='adressL'>Address : {{Auth::user()->adresse}}</label><label for='' class='adress'></label>
                  <br>
                  <label for='' class='emailL'>Email :</label><label for='' class='email'>{{Auth::user()->email}}</label>
                  <br>
                  <label for='' class='teleL'>Telephone:</label><label for='' class='tele'>{{Auth::user()->telephone}}</label>
                  
              </div>
        </div>
    </div>
</header>
<div class='container'>
    <div class='row'>
    
        <div> <table class='col-12 mt-2'>
         <tr class='ligne1'>
                        <td class='text-center libelle'>Description</td>
                        <td class='PRHT'>Prix unitaire</td>
                        <td class='PRHT'>Taux remise</td>
                        <td class='Qte'>Qte</td>
                        <td  style='opacity:1;width:10%;' class='tva'>Tva</td>
                        <td class='Total'>Total</td>
                    </tr>
                    @foreach ($Ligne_fact as $lf)
                        <tr class='tr' style=' border-bottom: 4px solid #f0f5f5'>
                            <td class='libelle'>
                                {{$lf->article->description}}
                            </td>
                            <td class='PRHT' style='width:10%'>{{$lf->article->price}} DH</td>
                            <td class='Qte'  style='width:10%'>{{$lf->article->remise}} %</td>
                            <td class='Qte'  style='width:5%'>{{$lf->article->quantite}}</td>
                            <td class='tva' style='opacity:1;width:10%;'>{{$lf->article->tva}}%</td>
                            <td class='Total'  style='width:15%'>{{ ($lf->ttc )}} DH</td>
                        </tr> 
                    @endforeach
 <tr class='tr' style='background-color:#f0f5f5;'>
 <td class='libelle'  style='font-size:20px;color:#0C91DA;'> 
 Mode Paiement:{{ $facture->mode_paiement }}</td>
 <td></td>
 <td></td>
 <td colspan='2'>  TOTAL HT :</td>
 <td style='text-align:center;'>{{$facture->tht}} DH</td>
 </tr>
 <tr style='background-color:#f0f5f5;'>
 <td></td>
 <td></td>
 <td></td>
 <td colspan='2'>  Tva :</td>
 <td style='text-align:center;'>{{$facture->ttva}} DH</td>
 </tr>
 <tr class='tr' style='background-color:#f0f5f5;'>
 <td></td>
    <td></td>
    <td></td>
    <td colspan='2' style='background-color:  #0C91DA;
 color: white; padding-left:5px;
  font-weight: bold;
 font-size: 15px;width:auto;
 '>TOTAL TTC:</td>
 <td style='background-color:  #0C91DA;
 color: white;
 text-align:center;
  font-weight: bold;
 font-size: 15px;'>{{$facture->ttc}} DH</td>
 
 </tr>
 <tfoot>
    <tr>
        <td colspan="6" style="background: #f0f5f5">
            <br><br>
            <footer>
                <label for=''  class=''><i style='color:#4d79ff;' class='fas fa-sitemap'></i></label>
                Forme juridique:{{Auth::user()->fj}} /ICE:{{Auth::user()->ice}} /IF: {{Auth::user()->if}}
            </footer>
        </td>
    </tr>
 </tfoot>
 </table>
 <div class='row text-center'> {{ $ntw }} DIRHAMS </div>
<div class='col-8 h6 mt-1 text-left'> </div>
@if ($facture->type_fact=='bon_livraison' )
        <div class='signature'>
            <div class='row'>
                <div class='col-6'>
                <p>Signature Entreprise:
            <br>
                </div>
                <div class='col-6'>
                <p> signature Client: <br>
                </div>
            </div>
        </div>       
@endif
              </div>
          </div>
      </div>
    </div>
</div>
 
</body>
</html>