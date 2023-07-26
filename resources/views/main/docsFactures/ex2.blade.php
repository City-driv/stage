

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORFAC 5</title>
    <link rel="icon" href="logo.png" />
    <script src="https://kit.fontawesome.com/f0841bede9.js" crossorigin="anonymous"></script>
    <style type="text/css" media="print"> 
        @page { size: A4; /* auto is the initial value */ margin: 0mm; /* this affects the margin in the printer settings */ } html { background-color: #FFFFFF; margin: 0px; /* this affects the margin on the html before sending to printer */ } body { border: solid 1px blue ; margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */ } 
        body {
    -webkit-print-color-adjust:exact;
    border: none !important;
    padding-top:5px;
    margin: 0;  
   }
   </style>
    <style>
      .nomE{
    color: #333333;
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
background-color: #333333;
color: white;
border-left: 15px;
}
i{
    background-color: #FDD835;
    padding: 4px;
    box-shadow: 5px 5px 5px grey;
    margin-right: 10px;
    color: #333333;
}
.info .col-7{
    padding-left: 10px;
    color: rgb(211, 208, 208);
}
.type{
    background-color: #333333;
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
   font-size:18px; 
        font-family: monospace;
    font-weight: 500;
    color: #333333;
    border-bottom: 4px solid #333333;
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
.footer{
    
    margin: auto;
  position: absolute;
  margin-top: 95vh;
    top: 0; left: 0;
  width: 100%;
  height:6.4vh;
 background-color: #333333;
 margin-top: 190vh;height:8vh;}
.footer .col-6{
    
     color: white;
  font-size: 25px;
  font-family: cursive;
  text-align: center;
}
.div {
    background-color:#FDD835 ;
    height:6.4vh;
     margin-top: 190vh;height:8vh;   
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
          <div class='col-3'><img src=images/t1.jfif style='
            height: 80px;
            width: 80px;
            background-size:  80px 80px;' alt='' srcset=''></div>
          <div class='col-9  nomE'> test</div>
          <div class='col-12 h3'>Contact</div>
          <div class='col-12 h6'><i class='fas fa-mobile-alt'></i>000000</div>
          <div class='col-12 h6'><i class='far fa-envelope'></i>mr.bmd360@gmail.com</div>
          <div class='col-12 h6 lh-1'><i style='margin-bottom:10px;' class='fas fa-map-marker-alt mt-1'></i></div>
        </div>
  </div>
  <div class='col-6 client'>
      <div class='row info pt-4'>
          <div class='col-3' style=' background-color: #333333;
          border-right: 20px solid transparent;
          border-top: 50px solid #FDD835;'></div>
          <div class='col-6 text-center type'>FACTURE</div>
          <div class='col-3' style=' background-color: #333333;
          border-left: 20px solid transparent;
          border-top: 50px solid #FDD835;'></div>
          <div class='col-7'>N° fac2</div>
          <div class='col-7'>Date :2023-07-24</div>
      </div>
      <div class='col-10 h3'>   Facture à</div>
      <div class='col-12 h7'>AEAZE </div>
      <div class='col-12 h7'>+212 </div>
      <div class='col-11 h7'> </div>
       
    </div>
  </div>
  <div class='col-11 mt-3'  style='padding-left: 30px;'>
            <table>
                <tr class='ligne1' style='background-color: #484747;'>
                    <td class='libelle' width='50%'>Description</td>
                    <td class='PRHT' width='15%'>Prix unitaire</td>
                    <td class='PRHT' width='5%%'>Taux remise</td>
                    <td class='Qte' width='5%%'>Qte</td>
                    <td class='tva' style='display:' width='10%'>Tva</td>
                    <td class='Total' width='20%'>Total</td>
                </tr><tr style='border-bottom: 1px solid #aaaaaa;'>
         <td style='padding-left: 10px;' class='libelle'>
         DUCIMUS EAQUE NON A
             </td>
         <td class='PRHT'>57 DH</td>
         <td class='Qte'>0 %</td>
         <td class='Qte'>10</td>
         <td class='tva'  style='display:'>20%</td>
         <td class='Total'>684 DH</td>
     </tr><tr style='border-bottom: 1px solid #aaaaaa;'>
         <td style='padding-left: 10px;' class='libelle'>
         SOURI
             </td>
         <td class='PRHT'>50 DH</td>
         <td class='Qte'>0 %</td>
         <td class='Qte'>8</td>
         <td class='tva'  style='display:'>20%</td>
         <td class='Total'>480 DH</td>
     </tr> </table>
   </div>
   <div class='row mt-2'  style='padding-left: 30px;'>
       <div class='col-6 h5'>
        </div>
        <div class='col-5 h6' style='margin-left: 10px;'>
            <div class='row'>
            
                <div  style='display:' class='col-6 mt-2'>Montant Tva :</div>
                <div  style='display:' class='col-6 mt-2 text-center'>194  DH</div>
                <div  style='display:' class='col-6 mt-2'>Total HT :</div>
                <div style='display:' class='col-6 mt-2 text-center'>970  DH</div>
                <div class='col-6 mt-2 pt-2 pb-2' style='color: #333333;background-color: #FDD835;'>TOTAL TTC:</div>
                <div class='col-5 text-center mt-2  pt-2 pb-2'
                  style='color: white; background-color: #333333;'>1164  DH</div>    
            </div>
        </div>
        <div class='col-11 text-center h9 mt-2' style='font-size:14px;font-weight:600;'> MILLE  CENT SOIXANTE QUATRE DIRHAMS MAROCAINS  </div>
    <div class='col-8 h5 text-left'> </div>
   </div>
   <div class='signature' style='display:none'>
     <div class='row mt-3'>
         <div class='col-3'></div>
         <div class='col-3'>
           <p style='color:#333333;text-align: center; border-bottom: 2px dashed #333333;'>Signature Entreprise:
        <br>
         </div>
         <div class='col-3'>
           <p style='color:#333333;text-align: center; border-bottom: 2px dashed #333333;'> signature Client: <br>
         </div>
     </div>
 </div>
   
 </div>
</div><div class="footer">
       <div class="row">
           <div class="col-6 pt-3 pb-2">merci pour votre Confiance</div>
           <div class="col-6 div text-center" style=" color: #333333;
            font-size: 14px;
            font-family: cursive;
            text-align: center;">
               /ICE:00000           </div>
       </div>
   </div>
      
</body>
</html>