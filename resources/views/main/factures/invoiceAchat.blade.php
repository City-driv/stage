<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (isset($startDate))
    <table>
        <tr>
            <th>Date Debut :</th>
            <th>{{ $startDate }}</th>
        </tr>
        <tr>
            <th>Date Fin :</th>
            <th>{{ $endDate }}</th>
        </tr>
    </table>
    @endif
    <table>
        <thead>
            <tr>
                <th>Entreprise</th>
                <th>Montant Total</th>
                <th>Remise Global</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $name }}</td>
                <td>{{ $TOTAL }}</td>
                <td>{{ $REMISE }}</td>
            </tr>
        </tbody>
    </table>
    <table>
       <thead>
            <tr>
                <th>Fournisseur</th>
                <th>Numero</th>
                <th>Date</th>
                <th>Total</th>
                <th>Remise Global</th>
                <th>Mode Paiement</th>
                <th>Mode Livraison</th>
                <th>Type</th>
                <th>ICE</th>
                <th>FJ</th>
            </tr>
       </thead>
        <tbody>
            @foreach ($achats as $achat)
            <tr>
                <td>{{ $achat->fournisseur->nom_entreprise }}</td>
                <td>{{ $achat->numero }}</td>
                <td>{{ $achat->date }}</td>
                <td>{{ $achat->total }}</td>
                <td>{{ $achat->remiseGlobal }}</td>
                <td>{{ $achat->mode_paiement }}</td>
                <td>{{ $achat->mode_livraison }}</td>
                <td>{{ $achat->type }}</td>
                <td>{{ $achat->fournisseur->ice }}</td>
                <td>{{ $achat->fournisseur->fj }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>