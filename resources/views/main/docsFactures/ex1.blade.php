<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>WORFAC 3</title>
    <script src='https://kit.fontawesome.com/f0841bede9.js' crossorigin='anonymous'></script>
    <link rel="icon" href="logo.png" />
    <style type='text/css' media='print'> 
        @page { size: auto; /* auto is the initial value */ margin: 0mm; /* this affects the margin in the printer settings */ } html { background-color: #FFFFFF; margin: 0px; /* this affects the margin on the html before sending to printer */ } body { border: solid 1px blue ; margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */ } 
        body {
            -webkit-print-color-adjust:exact;
            border: none !important;
            margin: 0;  

        }
   </style>
    <style>
        .example3{
            height: 90vh;
        }
       .entreprise{
           margin-left: 20%;
       }
       .logo{
           width: 40%;
           height: 90px;
           border-radius: 50%;
       }
       .Nom{
           font-size: 30px;
           font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
       }
       .Nom::first-letter{
         font-family: Verdana, Geneva, Tahoma, sans-serif;
         color: white;
         background:#4A66C3;
 
         border-radius: 40%;
       }
       .Type{
        font-size: 70px;
           font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
       }
       .Type::first-letter{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
         color: white;
         background:#4A66C3;
         width: 100%;
         height:100%;
         border-radius: 50%;
       }
       .Bill{
        background:#4A66C3;
         color: white;
         position: absolute;
         padding-left: 10px;
         padding-right: 10px;
       }
       body{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
       }
       .example3 table
     {

     }
     .example3 table .ligne1{
         color: white;
         font-size: 20px;
         text-align: center;
         background: #4A66C3;
         color: white;
          font-weight: bold;
         font-size: 20px;
         text-align: center;

     }
     .Qte,.PRHT,.tva,.Ttva,.THT{
         text-align: center;
     }
     tr:nth-child(odd){
       background-color: #ecf2f9;
       border-bottom:1px solid #787878;
     }
     tr:nth-child(even){
        background-color: #F5F5F5;
        border-bottom:1px solid #787878;
        }
        .TotTva, .TotHT,.TotalTTC{
            text-align: center;
            border-bottom: 1px solid #3F525B;
        }
        .footer{
            background-color: rgb(72, 72, 72);
            height: 11vh;
        }
        .Thanks{
            background:#4A66C3;
            border-radius: 30px;
            margin-left:15%;
            position: relative;
            box-shadow: 5px 10px 18px black;
            top: -10px;
        }
        .libelle{
            padding-left:10px;
            font-size:13px;
            font-family:cursive;
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
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>

</head>
<body style='font-family: Verdana, Geneva, Tahoma, sans-serif;'>
    
<div class='example3'>
     <div class='row'>
         <div class='col-4'>
             <div class='entreprise'>
               <img src='{{asset('Fimgs/1690036155-22259.jpg')}}' class='logo' srcset=''>
             <br>
             <label for='' class='Nom text-center'>test</label>   
             </div>
            </div>
            <div class='col-6 info mt-3'>
                <label for='' class='Type'>FACTURE</label> <br>
                <div class='row'>
                    <div class='col-6 Ncmd'>
                      Numero :<br>
                      #602
                    </div>
                    <div class='col-6 dateC'>
                        Date : <br>
                        2023/07/24
                    </div>
                </div>          
            </div>
     </div>
     <div class='row'>
         <div class='col-3 mt-5' style='padding-left:5%;'>
            <div class='to'>
                <p class='Bill'>    Facture à</p><br>
                <label class='NomC'>azerty</label><br/>
                <label class='teleC' style='padding:0;'>4545 </label><br/>
                <label class='adressC'>azert</label> 
                </div>
         </div>
         <div class='col-8 mt-5'>
            <table>
                <tr class='ligne1'>
                    <td class=''>Description</td>
                    <td style='width:13%;' class='PRHT'  scope='col'>Prix unitaire</td>
                    <td style='width:13%;' class='Qte'  scope='col'>Qte</td>
                    <td style='width:13%;' class='tva'>Tva</td>
                    <td style='width:13%;' class='Total'>Total</td>
                </tr><tr>
                       <td class='libelle'>
                       PHONE
                       </td>
                       <td class='PRHT'>1200DH</td>
                       <td class='Qte'>1</td>
                       <td class='tva'>20%</td>
                       <td class='Total'>1440DH</td>
                   </tr><tr>
                       <td class='libelle'>
                       ET AUT ET EST DUCIMU
                       </td>
                       <td class='PRHT'>31DH</td>
                       <td class='Qte'>1</td>
                       <td class='tva'>20%</td>
                       <td class='Total'>37.2DH</td>
                   </tr> </table>
            <br>
            <div class='Payment'>
                <div class='row'>
                <div class='col-6'><p class='TotTva'>Montant Tva :246.2DH </p></div>
                <div class='col-6'><p class='TotHT'>Montant HT:1231 DH</p></div>
                <div class='col-6'></div>
                <div class='col-6'><p class='TotalTTC'>Total TTC :1477.2 DH</p></div>
                </div>
            </div> 
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
         </div>
     </div>
     
    </div>
    <div class='footer' style='background-color: rgb(72, 72, 72);
    height: 120px;
    width: 100%;'>
        <div class='row text-center'>
             <div class='col-8 Thanks text-white'>
                Merci pour votre confiance
             </div>
             <div class='col-3 text-white'>
             <i class='fas fa-sitemap'></i> 
             IF: / ICE:00000  / RC:</div>
             <div class='col-2 text-white'><i class='fas fa-phone-square-alt'>Telephone :<br/><br/><div class='tele'>000000</div>    </i>  
             </div>
             <div class='col-3 text-white'><i class='fas fa-envelope'>Email :<br/><br/><div class='email'>mr.bmd360@gmail.com</div></i></div>
             <div class='col-3 text-white'><i class='fas fa-map-marker-alt'><br/><br/><div class='adress'></div></i>
             </div>
            
         </div>
    </div>
    
             

</body>
</html>