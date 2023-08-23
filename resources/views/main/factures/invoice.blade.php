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
            <thead style="background-color: deepskyblue">
                <tr>
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Entreprise</th>
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Montant Total TVA</th>
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Montant Total THT</th>
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Montant Total TTC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">{{$name}}</td>
                    <td colspan="2">{{$tva}} DH</td>
                    <td colspan="2">{{$tht}} DH</td>
                    <td colspan="2">{{$ttc}} DH</td>
                </tr>
            </tbody>
        </table>
        <table>
            <tr><td style="text-align: center;background-color:red" colspan="8">Liste document Sortie</td></tr>
            <thead style="background-color: rgb(20, 243, 157)">
                <tr style="color: white">
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">ref</th>
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Montant Tva</th>
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Montant HT</th>
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Total TTC</th>
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">Mode paiement</th>
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">date</th>
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">type</th>
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">ICE</th>
                    <th colspan="2" style="text-align: center;background-color:blueviolet;color:aqua">IF</th>
                </tr>
            </thead>
            <tbody style="text-align: center">
                @foreach ($factures as $fc)
                    <tr>
                        <td colspan="2" style="text-align: center">{{$fc->ref}}</td>
                        <td colspan="2" style="text-align: center">{{$fc->ttva}} DH</td>
                        <td colspan="2" style="text-align: center">{{$fc->tht}} DH</td>
                        <td colspan="2" style="text-align: center">{{$fc->ttc}} DH</td>
                        <td colspan="2" style="text-align: center">{{$fc->mode_paiement}}</td>
                        <td colspan="2" style="text-align: center">{{$fc->date_facture}}</td>
                        <td colspan="2" style="text-align: center">{{$fc->type_fact}}</td>
                        <td colspan="2" style="text-align: center">{{$fc->clientFact->ice}}</td>
                        <td colspan="2" style="text-align: center">{{$fc->clientFact->if}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>