<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture</title>
</head>
<body>
    <p>Voici le lien de votre facture :</p>
    <a href="{{ route('facture.show', $facture->id) }}">{{ route('facture.show', $facture->id) }}</a>
</body>
</html>