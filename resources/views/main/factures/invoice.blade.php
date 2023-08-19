<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
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
            <thead style="background-color: deepskyblue">
                <tr>
                    <th>Entreprise</th>
                    <th>Montant Total TVA</th>
                    <th>Montant Total THT</th>
                    <th>Montant Total TTC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$name}}</td>
                    <td>{{$tva}} DH</td>
                    <td>{{$tht}} DH</td>
                    <td>{{$ttc}} DH</td>
                </tr>
            </tbody>
        </table>
        <table>
            <tr><td style="text-align: center" colspan="4">Liste document Sortie</td></tr>
            <thead style="background-color: rgb(20, 243, 157)">
                <tr>
                    <th>ref</th>
                    <th>Montant Tva</th>
                    <th>Montant HT</th>
                    <th>Total TTC</th>
                    <th>Mode paiement</th>
                    <th>date</th>
                    <th>type</th>
                    <th>ICE</th>
                    <th>IF</th>
                </tr>
            </thead>
            <tbody style="text-align: center">
                @foreach ($factures as $fc)
                    <tr>
                        <td>{{$fc->ref}}</td>
                        <td>{{$fc->ttva}} DH</td>
                        <td>{{$fc->tht}} DH</td>
                        <td>{{$fc->ttc}} DH</td>
                        <td>{{$fc->mode_paiement}}</td>
                        <td>{{$fc->date_facture}}</td>
                        <td>{{$fc->type_fact}}</td>
                        <td>{{$fc->clientFact->ice}}</td>
                        <td>{{$fc->clientFact->if}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>