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
        <table>
            <thead>
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
                    <td>{{$tva}}</td>
                    <td>{{$tht}}</td>
                    <td>{{$ttc}}</td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
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
            <tbody>
                @foreach ($factures as $fc)
                    <tr>
                        <td>{{$fc->ref}}</td>
                        <td>{{$fc->ttva}}</td>
                        <td>{{$fc->tht}}</td>
                        <td>{{$fc->ttc}}</td>
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