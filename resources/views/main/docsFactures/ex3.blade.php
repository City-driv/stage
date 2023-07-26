

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORFAC 4</title>
    <link rel="icon" href="logo.png" />
    <script src="https://kit.fontawesome.com/f0841bede9.js" crossorigin="anonymous"></script>

    <style type="text/css" media="print"> 
        @page { size: A4; /* auto is the initial value */ margin: 0mm; /* this affects the margin in the printer settings */ } html { background-color: #FFFFFF; margin: 0px; /* this affects the margin on the html before sending to printer */ } body { border: solid 1px blue ; margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */ } 
        body {
    -webkit-print-color-adjust:exact;
    border: none !important;
    margin: 0;  
   }
   </style>
    <style>
      .example4{
        height: 91vh;
      }
        .entreprise{
         background: linear-gradient(to left, #232526, #414345); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
         color: white;
         font-size:33px;
         border-bottom:  4px solid #137A5C;
         
         
        }
        .footer{
            background-color: rgb(72, 72, 72);
            height: 10vh;
            color: white;
            border-top: 7px solid #137A5C;
            osition: absolute;margin-top:101.5vh;        }
      .logo{
           width: 15%;
           height: 80px;
           background-size: 90px 90px;
           border-radius: 10%;
       }
       .info,.client{
         padding-left: 4px;
           text-align: left;
       }
       .Bill,.Binfo{
       color: rgba(23, 87, 23, 0.775);
       font-weight: lighter;
       }
       .type{
        background: linear-gradient(to left, #232526, #414345); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

         margin-top: 15%;
         font-size: 35px;
         color: white;
       }
       table{
        margin-left: 5px;
       }
       .Qte,.PRHT,.tva,.Ttva,.THT{
         text-align: center;
     }
     .Total{
       background-color: white;
       text-align: center;
       padding-left:5px;
       padding-right:5px;
     }
     .ligne1 td{
       background-color: #137A5C;
       color: white;
          font-weight: bold;
         font-size: 20px;
         text-align:center;
       border: 20px solid white;
     }
     tr:nth-child(odd){
         border-top: 5px solid white;
       background-color: rgb(233, 231, 231);

     }
     tr:nth-child(even){
        border-top: 5px solid white;
        background-color: #e6eae1;
        }
        .TTC{
          color: white;
          background-color: #137A5C;
        }
        .MT,.MHT{
          background-color: rgb(233, 231, 231);
        }
        .Payment{
           font-size: 15px;
          margin-top: 5px;
        }
        .TotTva,.TotHT,.TotalTTC{
          text-align: left;
        }
        .TotalTTC{
          color: white;
          background: linear-gradient(to left, #232526, #414345); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }
        .footer .row .col-3,.footer .row .col-4,.footer .row .col-2{
          border-right: 3px white solid;
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
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
     <div class='example4'>
<div class='row text-center'>
   <div class='entreprise pt-2'>
     <img src=images/t1.jfif class='logo'   onerror=this.onerror=null; this.src='images/alt.jpg'  alt='' srcset=''>
     <label for='' class='Nom text-center'>test</label>   
     </div>
     <div class='row'>
     <div class='col-1'></div>
         <div class='col-3'>
         <div class='client'>
           <label class='Bill'>    Facture à</label><br>
              <label class='NomC'>HAMIID </label><br>
            <label class='teleC'> 1 (184) 174-9605  </label><br>
            <label class='adressC'> 1 (991) 201-9743</label>
            <label class='adressC'>ICE: 1 (634) 256-2931</label><label class='adressC'>IF: 1 (592) 824-3534</label><br/>
            <label class='adressC text-center'>SALE</label>

            </div>
         </div>
         <div class='col-4'>
           <div class='info'>
                <label class='Bill Binfo'>Informations: </label><br>
                <label class='Ncmd'>N° fac3</ </label><br>
                <label class='dateC'>Date:2023/07/24</ </label>
           </div>
         </div>
         <div class='col-4'>
           <div class='type'>
           FACTURE
           </div>
         </div>
     </div>
</div><div class='row'>
      <table style='margin-left:5%' class='col-11 ml-3'>
        <tr class='ligne1'>
            <td class='libelle'>Description</td>
            <td class='PRHT'  scope='col'>Prix unitaire</td>
            <td class='PRHT'  scope='col'>Taux remise</td>
            <td class='Qte'  scope='col'>Qte</td>
            <td class='tva' style='display:'>Tva</td>
            <td style='padding-left:5px' class='Total'>Total</td>
        </tr><tr>
            <td style='padding-left:20px' class='libelle'>
            DUCIMUS EAQUE NON A
            </td>
            <td class='PRHT'>57 DH</td>
            <td class='Qte' style='text-align:center;'>0 %</td>
            <td class='Qte'>30</td>
            <td class='tva'  style='display:'>20%</td>
            <td class='Total'>2052 DH</td>
        </tr></table>
     </div>
     <div class='Payment'  style='margin-left:26%'>
      <div class='row'>
      <div class='col-6' style=''></div><div style='' class='col-3 MT'>Montant Tva :</div><div style='' class='col-3 text-left TotTva'>342 DH</div>
      <div class='col-6' style=''></div><div style='' class='col-3 MHT'>Montant HT:</div><div  style='' class='col-3 text-left TotHT'>1710 DH</div>
      <div class='col-6'></div><div style='padding:10px;' class='col-3 TTC'>Total TTC :</div><div style='padding-top:10px;' class='col-3 text-left TotalTTC'>2052 DH</div>
      
      </div>
      
  </div><div class='col-12 text-center h6'>DEUX MILLE CINQUANTE DEUX DIRHAMS MAROCAINS </div>
  <div class='col-8 ms-5 '> </div>
  <div class='col-12 text-center h5' style='text-align:right;'></div> 
  <div class='signature'  style='display:none'>
            <div class='row'>
                  <div class='col-6'>
                    <p>Signature Entreprise:
                 <br>
                  <img src='images/alt2.JPG'   style='opacity:1' class='signature' onerror=this.onerror=null; this.src='' /> </p>
                  </div>
                  <div class='col-6'>
                    <p> signature Client: <br>
                   <img style='margin-top:12px;'   style='opacity:1' src='images/alt2.JPG'  onerror='this.onerror=null; this.src='images/alt.jpg'' srcset=''></p>  
                  </div>
            </div>
        </div> 
 </div>
 <div class='footer'>
   <div class='row'>
     <div class='col-4 text-center'> <i class='fas fa-phone-square-alt'> 000000</i>
         <i class='fas fa-envelope'> mr.bmd360@gmail.com</i></div>  
     <div class='col-4 mt-1 text-center'><i class='fas fa-map-marker-alt'></i></div>
     <div class='col-4 mt-1 text-center'>
       /ICE:00000    </i>
     </div>
   </div>
 </div>
      

</body>
</html>