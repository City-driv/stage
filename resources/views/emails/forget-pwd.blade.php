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
    <p style="color: black; font-family: system-ui; font-weight: 500; font-size: 15px;">Bonjour !
    Vous avez récemment sollicité une réinitialisation de votre mot de passe.
    Pour modifier votre mot de passe WORFAC, merci de bien vouloir cliquer sur le lien ci-dessous 
    </p>
    <center>
        <a style="cursor: pointer;" href="{{route('resetPwd',[$token,$email])}}">
            <button style="background-color: rgb(255, 102, 0); color: white; border: 0px; width: 300px; cursor: pointer; height: 50px; font-size: 20px; border-radius: 5px;">Modifier votre mot de passe</button>
        </a>
    </center>
    <br>
    <p style="color: black; font-family: system-ui; font-weight: 500; font-size: 15px;">(ce lien restera valable a la réinitialisation de votre compte une seule fois )</p>
    
    <p style="color: black; font-family: system-ui; font-weight: 500; font-size: 15px;">Merci de votre confiance et Ã&nbsp; trés bientot sur WORFAC,L'équipe WORFAC</p>
</div> 
   
</body>
</html>