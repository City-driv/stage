<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Example Garantie</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <link rel='icon' href='logo.png' />
    <script src='https://kit.fontawesome.com/f0841bede9.js' crossorigin='anonymous'></script>
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
           padding-left: 100px;
           padding-top: 50px;
       }
       span{
        width: 100%;   
        border-bottom: 1px solid #b0b0b0;
       }
       img{
           margin-bottom: 10px;
           width: 170px;
           height: 170px;
           background-size: 170px 170px;
       }
   </style>
</head>
<body>
    <div class='row'>
        <div class='col-10 text-center'>
            <img src=images/t1.jfif alt='' srcset=''>
        </div>
        <div class='col-10 h3'>Formulaire de Garantie {{Auth::user()->name}}</div>
        <div class='col-10 h5'>Client : <span>{{$garantie->client->name}}</span> </div>
        <div class='col-10 h5'>Numero de téléphone : <span>{{$garantie->client->telephone}}</span></div>
        <div class='col-10 h5'>Adresse : <span> {{$garantie->client->adresse}}</span></div>
        <div class='col-10 h5'>Email : <span>{{$garantie->email}}</span></div>
        <div class='col-10 h5'>Date d'achat : <span>{{$garantie->date_achat}}</span></div>
        <div class='col-10 h5'>Date fin Garantie : <span>{{$garantie->date_fin}}</span></div>
        <div class='col-10 h5'>Revendeur : <span>{{Auth::user()->name}}</span></div>
        <div class='col-10 h5'>Téléphone Revendeur : <span>{{Auth::user()->telephone}}</span></div>
        <div class='col-10 h5'>Email Revendeur : <span>{{Auth::user()->email}}</span></div>
        <div class='col-10 h5'>Adresse du Revendeur : <span>{{Auth::user()->adresse}}</span></div>
        <div class='col-10 h5'>Numéro série : <span style='border: 1px solid #ababab;
        background-color: #dfdddd;
        color: black;
        padding-left: 5px;
        padding-right: 5px;'>{{$garantie->num_serie}}</span></div>
        <div class='col-12 h5'>
            description Article:
        </div> 
        <span class='col-10 h2 text-center' style='background-color: rgb(240 240 240);
        border-radius: 5px;
        margin-left: 10px;
        margin-top: 20px;
        border: 2px solid #ababab;
        color: #191919;
        padding: 20px;
        /* font-family: -webkit-body; */
        font-family: inherit;'>{{$garantie->article->description}}</span>
        <div class='col-10 h5'>
         important :veuillez conserver précieusement cette carte de Garantie se réserve le droit de vous demander le présent document avant d'accepter toute procédure deréparation  La garandi  n'affecte ou ne limite pas vos droits légaux</div>
    </div>    
    </body>
</html>