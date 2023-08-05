<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Reçu</title>
    <link rel='icon' href='logo.png' />
    <script src='https://kit.fontawesome.com/f0841bede9.js' crossorigin='anonymous'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <style type='text/css' media='print'> 
        @page { size: A4; /* auto is the initial value */ margin: 0mm; /* this affects the margin in the printer settings */ } html { background-color: #FFFFFF; margin: 0px; /* this affects the margin on the html before sending to printer */ } body { border: solid 1px blue ; margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */ } 
        body {
    -webkit-print-color-adjust:exact;
    border: none !important;
    margin: 0;  
   }
   </style>
   <style>
   </style>
</head>
<body>
<div class='row mt-1 mb-1' style='border-bottom: 1px dashed black;'>
        <div class='col-3 text-center mt-2' ><img src='images/' style='margin-left: 10px;width: 50%;height:8vh;' alt='' srcset=''></div>
        <div class='col-5 mt-5' style='border: 1px solid black;'>
          <div class='row'>
             <h2 style='text-decoration: underline; text-align: center;  text-underline-position: under;' class='col-12'>REÇU DE PAIEMENT</h2> 
             <div class='col-12 text-center'>Numéro de référence l'opération :{{$payement->id}}</div>
         </div>  
         
        </div>
        <div class='col-4 mt-2'>
            <div class='row' style='text-align:right;'>
               <p class='col-9'><strong>Date: {{$payement->date}}</strong></p>
               {{-- <p style='margin:0;' class='col-9'><strong>02:13:18</strong></p> --}}
            </div>
        </div>
        <div class='col-1'></div>
        <div class='col-10 mt-2' style='border: 1px solid black;'>
          <div class='row'>
              <div class='col-6' >
               <div class='row' style='margin-left:1px;margin-top:2px;border: 1px dashed black;'>
                   <label for='' class='col-12 h3'>Payé par:</label>
                   <label for='' class='h6'>Nom/Prénom ou Raison sociale:{{$payement->credit->user->entreprise_name}} </label>
                   <label for='' class='h6'>ICE:{{$payement->credit->user->ice}}</label>
                   <label for='' class='h6'>Tél:{{$payement->credit->user->telephone}}</label>   
               </div>
              </div>
              <div class='col-6'>
                  <div class='row mt-3'>
                      <label for='' style='text-align: right;' class='col-6 h6 pt-1'>Montant </label>
                      <label for='' class='col-6 h4' style='text-align: center;background: #D0D0D0;  /* fallback for old browsers */
                      background: -webkit-linear-gradient(to bottom, #F8F8F8, #D0D0D0);  /* Chrome 10-25, Safari 5.1-6 */
                      background: linear-gradient(to bottom, #F8F8F8, #D0D0D0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                       '>{{$payement->montant}} DH</label>
                      <label for='' style='text-align: right;' class='col-6 h6 pt-1'>Mode de paiement </label>
                      <label for='' class='col-6 h4' style='text-align: center;background:#D0D0D0;background: -webkit-linear-gradient(to bottom, #F8F8F8, #D0D0D0);  /* Chrome 10-25, Safari 5.1-6 */
                      background: linear-gradient(to bottom, #F8F8F8, #D0D0D0); '>{{$payement->mode_paiement}}</label>
                  </div>
              </div>
              <div class='col-2'></div>
              <div class='col-10'>
                  <h5>Somme en toutes lettres</h5>
                  <div class='col-2'></div>
              <label for='' class='col-12 h6 pt-1 pb-1' style=' text-align: center;background:#D0D0D0;background: -webkit-linear-gradient(to bottom, #F8F8F8, #D0D0D0);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to bottom, #F8F8F8, #D0D0D0); '> DIRHAMS  </label>
              </div>
              <div class='col-2'></div>
              <div class='col-10'>
                  <h5>Motif de l'opération</h5>
                  <div class='col-2'></div>
              <label for='' class='col-12 h6' style='height:2vh; text-align: center;background:#D0D0D0;background: -webkit-linear-gradient(to bottom, #F8F8F8, #D0D0D0);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to bottom, #F8F8F8, #D0D0D0); '>
              {{$payement->credit->motif}}
              </label>
              </div>
              <label for='' class='col-6 h5 text-center'>Signature du Client</label>
              <label for='' class='col-6 h5 text-center mb-2'>Signature</label>
              <p class='mt-5'>l'opération enregistrée sur votre compte , avec date de valeur le <strong>:{{$payement->date}}</strong></p>
          </div>
        </div>
        <div class='col-2'></div>
        <div class='col-9'>Société :{{Auth::user()->entreprise_name}} -IF:{{Auth::user()->if}} -ICE:{{Auth::user()->ice}} -Email :{{Auth::user()->email}}<span style='color:blue;'></span></div>
          <div class='col-2'><i style='margin-left:3px;margin-bottom:-20px;color:#C8C8C8;' class='fas fa-cut'></i></div>
          </div>     <div class='row'>
        <div class='col-3 text-center' ><img src='images/' style='margin-left: 10px;width: 50%;height:6vh;' alt='' srcset=''></div>
        <div class='col-5' style='border: 1px solid black;'>
          <div class='row'>
             <h2 style='text-decoration: underline; text-align: center;  text-underline-position: under;' class='col-12'>REÇU DE PAIEMENT</h2> 
             <div class='col-12 text-center'>Numéro de référence l'opération :{{$payement->id}}</div>
         </div>  
         
        </div>
        <div class='col-4'>
            <div class='row' style='text-align:right;'>
               <p class='col-9'><strong>Date: {{$payement->date}}</strong></p>
               {{-- <p style='margin:0;' class='col-9'><strong>02:13:18</strong></p> --}}
            </div>
        </div>
        <div class='col-1'></div>
        <div class='col-10 mt-2' style='border: 1px solid black;'>
          <div class='row'>
              <div class='col-6' >
               <div class='row' style='margin-left:1px;margin-top:2px;border: 1px dashed black;'>
                   <label for='' class='col-12 h3'>Payé par:</label>
                   <label for='' class='h6'>Nom/Prénom ou Raison sociale:{{$payement->credit->user->entreprise_name}} </label>
                   <label for='' class='h6'>ICE:{{$payement->credit->user->ice}}</label>
                   <label for='' class='h6'>Tél:{{$payement->credit->user->telephone}}</label>   
               </div>
              </div>
              <div class='col-6'>
                  <div class='row mt-3'>
                      <label for='' style='text-align: right;' class='col-6 h6 pt-1'>Montant </label>
                      <label for='' class='col-6 h4' style='text-align: center;background: #D0D0D0;  /* fallback for old browsers */
                      background: -webkit-linear-gradient(to bottom, #F8F8F8, #D0D0D0);  /* Chrome 10-25, Safari 5.1-6 */
                      background: linear-gradient(to bottom, #F8F8F8, #D0D0D0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                       '>{{$payement->montant}} DH</label>
                      <label for='' style='text-align: right;' class='col-6 h6 pt-1'>Mode de paiement </label>
                      <label for='' class='col-6 h4' style='text-align: center;background:#D0D0D0;background: -webkit-linear-gradient(to bottom, #F8F8F8, #D0D0D0);  /* Chrome 10-25, Safari 5.1-6 */
                      background: linear-gradient(to bottom, #F8F8F8, #D0D0D0); '>{{$payement->mode_paiement}}</label>
                  </div>
              </div>
              <div class='col-2'></div>
              <div class='col-10'>
                  <h5>Somme en toutes lettres</h5>
                  <div class='col-2'></div>
              <label for='' class='col-12 h6 pt-1 pb-1' style=' text-align: center;background:#D0D0D0;background: -webkit-linear-gradient(to bottom, #F8F8F8, #D0D0D0);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to bottom, #F8F8F8, #D0D0D0); '> DIRHAMS  </label>
              </div>
              <div class='col-2'></div>
              <div class='col-10'>
                  <h5>Motif de l'opération</h5>
                  <div class='col-2'></div>
              <label for='' class='col-12 h6 pt-1 pb-1' style='height:2vh; text-align: center;background:#D0D0D0;background: -webkit-linear-gradient(to bottom, #F8F8F8, #D0D0D0);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to bottom, #F8F8F8, #D0D0D0); '>
              {{$payement->credit->motif}}
              </label>
              </div>
              <label for='' class='col-6 h5 text-center'>Signature du Client</label>
              <label for='' class='col-6 h5 text-center mb-2'>Signature</label>
              <p class='mt-5'>l'opération enregistrée sur votre compte , avec date de valeur le <strong>:2023/08/04</strong></p>
          </div>
        </div>
        <div class='col-2'></div>
        <div class='col-9'>Société :{{$payement->credit->user->entreprise_name}}  -IF:{{$payement->credit->user->if}} -ICE:{{$payement->credit->user->ice}} -Email :{{$payement->credit->user->email}}<span style='color:blue;'></span></div>
          </div>  
   
    <script>
setTimeout(() => {
   var ua = navigator.userAgent.toLowerCase();
   var isAndroid = ua.indexOf("Android") > -1; //&& ua.indexOf("mobile");
     if (isAndroid) {
       // https://developers.google.com/cloud-print/docs/gadget
       var gadget = new cloudprint.Gadget();
       gadget.setPrintDocument("url", $('title').html(), window.location.href, "utf-8");
       gadget.openPrintDialog();
     } else {
       
     } window.print();
     window.close()
   }, 900);
    </script>
</body>
</html>