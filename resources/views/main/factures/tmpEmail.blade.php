<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WORFAC</title>
    <style>

    </style>
</head>
<body>
       
<div class="inbox-data-content-intro">
    <center>
        <h1 style="font-weight: 900; font-size: 50px; font-family: cursive; color: rgb(255, 60, 0);">WORFAC</h1>    
    </center>
    
    <center>
        <a style="cursor: pointer;" href="{{ route('facture.show', $facture->id) }}">
            <p>Voici le lien de votre facture :</p>
            <button style="background-color: rgb(255, 102, 0); color: white; border: 0px; width: 300px; cursor: pointer; height: 50px; font-size: 20px; border-radius: 5px;">{{ route('facture.show', $facture->id) }}</button>
        </a>
    </center>
    <br>
    
    <p style="color: black; font-family: system-ui; font-weight: 500; font-size: 15px;">Merci de votre confiance et Ã&nbsp; trés bientot sur WORFAC,L'équipe WORFAC</p>
</div> 
   
</body>
</html>