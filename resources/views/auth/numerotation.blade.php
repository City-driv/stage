@extends('layouts.userNav')
@section('title','WORFAC: Numerotation')
@section('content')
<center><h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;"> Paramètres   Numérotation :</h1></center>  
<body>
    <form method="POST" action="{{route('numerotation.update',Auth::id())}}" style="margin-left: 20%;width:70%;">
        @csrf
        @method('PUT')
       <div class="row">
         <label for="" class="col-12 h2">Codes Bases :</label>
         <div class="col-12 h5">Client :
            <input type="text" name="clt" class="form-control" style="width:50%" value="{{$num->clt}}" />
         </div>
         <div class="col-12 h5">Article : 
            <input type="text" name="art" class="form-control" style="width:50%" value="{{$num->art}}" />
        </div>
         <label for="" class="col-12 h2">Documents Clients :</label>
         <div class="col-12 h5">FACTURE : 
            <input type="text" name="fact" class="form-control" style="width:50%" value="{{$num->fact}}" />
        </div>
         <div class="col-12 h5">BON LIVRAISON : 
            <input type="text" name="bon_liv" class="form-control" style="width:50%" value="{{$num->bon_liv}}" />
        </div>
         <div class="col-12 h5">BON DE COMMANDE : 
            <input type="text" name="bon_cmd" class="form-control" style="width:50%" value="{{$num->bon_cmd}}" />
        </div>
         <div class="col-12 h5">BON : 
            <input type="text" name="bon" class="form-control" style="width:50%" value="{{$num->bon}}" />
        </div>
         <div class="col-12 h5">DEVIS : 
            <input type="text" name="devis" class="form-control" style="width:50%" value="{{$num->devis}}" />
        </div>
         <div class="col-12 h5">FACTURE PROFORMA : 
            <input type="text" name="fact_pro" class="form-control" style="width:50%" value="{{$num->fact_pro}}" />
        </div>
         <div class="col-12 h5">FACTURE D'AVOIR : 
            <input type="text" name="fact_d_avoir" class="form-control" style="width:50%" value="{{$num->fact_d_avoir}}" />
        </div>
         <label for="" class="col-12 h2">Etat Stock (Alert compris entre) :</label>
         <div class="col-12 h5">Alert inférieure : 
            <input type="number" name="alr_inf" class="form-control" style="width:50%" value="{{$num->alr_inf}}" />
        </div>
         <div class="col-12 h5">Alert supérieure : 
            <input type="number" name="alr_sup" class="form-control" style="width:50%" value="{{$num->alr_sup}}" />
        </div>
        </div>  
       <button type="submit" class="btn btn-success Modifier h3">
        <i class="fas fa-file-download"></i> Enregistrer</button>
    </form>
@endsection