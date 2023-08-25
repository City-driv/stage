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
            <th colspan="2" style="text-align: center;background-color:red;color:aqua">Date Debut :</th>
            <th colspan="2">{{ $startDate }}</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center;background-color:red;color:aqua">Date Fin :</th>
            <th colspan="2">{{ $endDate }}</th>
        </tr>
    </table>
    @endif
    <table>
        <thead>
            <tr>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Entreprise</th>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Montant Total</th>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Remise Global</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2" style="text-align: center">{{ $name }}</td>
                <td colspan="2" style="text-align: center">{{ $TOTAL }}</td>
                <td colspan="2" style="text-align: center">{{ $REMISE }}</td>
            </tr>
        </tbody>
    </table>
    <table>
       <thead>
            <tr>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Fournisseur</th>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Numero</th>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Date</th>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Total</th>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Remise Global</th>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Mode Paiement</th>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Mode Livraison</th>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Type</th>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">ICE</th>
                <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">FJ</th>
            </tr>
       </thead>
        <tbody>
            @foreach ($achats as $achat)
            <tr>
                <td colspan="2" style="text-align: center">{{ $achat->fournisseur->nom_entreprise }}</td>
                <td colspan="2" style="text-align: center">{{ $achat->numero }}</td>
                <td colspan="2" style="text-align: center">{{ $achat->date }}</td>
                <td colspan="2" style="text-align: center">{{ $achat->total }}</td>
                <td colspan="2" style="text-align: center">{{ $achat->remiseGlobal }}</td>
                <td colspan="2" style="text-align: center">{{ $achat->mode_paiement }}</td>
                <td colspan="2" style="text-align: center">{{ $achat->mode_livraison }}</td>
                <td colspan="2" style="text-align: center">{{ $achat->type }}</td>
                <td colspan="2" style="text-align: center">{{ $achat->fournisseur->ice }}</td>
                <td colspan="2" style="text-align: center">{{ $achat->fournisseur->fj }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>