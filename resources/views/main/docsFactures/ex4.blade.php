

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORFAC 2</title>
    <script src="https://kit.fontawesome.com/f0841bede9.js" crossorigin="anonymous"></script>
    <link rel="icon" href="logo.jfif" />
    <style type="text/css" media="print"> 
        @page { size: A4; /* auto is the initial value */ margin: 0mm; /* this affects the margin in the printer settings */ } html { background-color: #FFFFFF; margin: 0px; /* this affects the margin on the html before sending to printer */ } body { border: solid 1px blue ; margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */ } 
        body {
    -webkit-print-color-adjust:exact;
    border: none !important;
    margin: 0;  
   }
   </style>
    <style>
        .example2{
            border-top-left-radius: 250px;
            height: 101.5vh;
            background-color: #f0f5f5;
            padding-left: 3%;
            border-bottom: 5vh solid  #0C91DA;
            height: 201.5vh;border-bottom:0;            
                        
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
     footer{
         height:6vh;
         padding-left:20px;
         position: absolute;
         width:100%;
         margin-top: -6vh;display:none;         font-size:17px;
         background:#D3D3D3;
         color:black;
     }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: #0C91DA;">
<div class='example2'>
<header>
    <div class='row'>
        <div class='col-12 text-center mt-5'>
          <img style='width: 100px;height: 100px; background-size: 100px 100px;'   onerror='this.onerror=null; this.src='images/alt.jpg'' src=images/t1.jfif class='rounded-circle logo' alt='...'>
          <br><h1 class='Nom'>test</h1>
        </div>
    </div>
    <div class='row'>
        <div class='col-6 infos'>
            <div class='type'> FACTURE</div>
            <label class='Bill' style='font-size:20px;font-family:fantasy;padding-left:10px;color:#0C91DA'> Facture à</label><br>
            <label class='NomC' style='padding-left:10px;'>SED SINT SINT TOTAM</label><br>
            <label class='teleC' style='padding-left:10px;'> 1 (676) 791-8529</label><br>
            <label class='adressC' style='padding-left:10px;'>adresse </label> 
            
            <label class='telec' style='padding-left:10px;text-align:center'></label> 
            </div>
        <div class='col-6'>
            <div class='info'>
                <label for='' class='Ncmd'>N° fact4</label><br>
               <label for='' class='Dcmd'>Date : 2023/07/24</label>
              </div>
              <div class='entreprise'>
                  <label for='' class='adressL'>Address :</label><label for='' class='adress'></label>
                  <br>
                  <label for='' class='emailL'>Email :</label><label for='' class='email'>mr.bmd360@gmail.com</label>
                  <br>
                  <label for='' class='teleL'>Telephone:</label><label for='' class='tele'>000000</label>
                  
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
                    </tr><tr class='tr' style=' border-bottom: 4px solid #f0f5f5'>
               <td class='libelle'>
               SOURI
               </td>
               <td class='PRHT' style='width:10%'>50 DH</td>
               <td class='Qte'  style='width:10%'>0 %</td>
               <td class='Qte'  style='width:5%'>4</td>
               <td class='tva' style='opacity:1;width:10%;'>20%</td>
               <td class='Total'  style='width:15%'>240 DH</td>
           </tr> 
 <tr class='tr' style='background-color:#f0f5f5;'>
 <td class='libelle'  style='font-size:20px;color:#0C91DA;'> 
 Mode Paiement:Espéce</td>
 <td></td>
 <td></td>
 <td colspan='2'>  TOTAL HT :</td>
 <td style='text-align:center;'>200 DH</td>
 </tr>
 <tr style='background-color:#f0f5f5;'>
 <td></td>
 <td></td>
 <td></td>
 <td colspan='2'>  Tva :</td>
 <td style='text-align:center;'>40 DH</td>
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
 font-size: 15px;'>240 DH</td>
 
 </tr>
 </table>
 <div class='row text-center'>DEUX CENT QUARANTE DIRHAMS MAROCAINS </div>
<div class='col-8 h6 mt-1 text-left'> </div>
                <div class='signature'  style='display:none'>
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
              </div>
          </div>
      </div>
    </div><footer>
    <label for=''  class=''><i style='color:#4d79ff;' class='fas fa-sitemap'></i> 
     /ICE:00000</footer>
 
</body>
</html>