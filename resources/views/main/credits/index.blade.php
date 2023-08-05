@extends('layouts.userNav')
@section('title','WORFAC: Credits')
@section('headInfo')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
           td{
            text-align:center;
        }
        .search{
      padding:10px;
      color: #0d6efd;
    border: 1px solid #0d6efd;
    background: white;
    border-radius:5px;
    margin-top:10px;
   }
   .search:hover{
    padding:10px;
    margin-top: 10px;color: white;
    border: 1px solid #0d6efd;
    background: #0d6efd;
    border-radius:5px;
    margin-top:10px;
   }
   .Ajouter,.Modifier,.Liste{
    margin-left: 20%;
    */: ;
    padding-left: 20px;
    /* padding-top: 2%; */
    border-radius: 10px;
    /* box-shadow: rgb(252 183 66) 5px 10px 20px inset; */
    padding-bottom: 2%;
    /* margin-top: -15%; */
    width: 95%;
    border: 1px solid black;
    position: relative;
    transform: scale(0);
    /* top: 0; */
    margin: auto;
    position: absolute;
    top: 0;
    left: 0;
    /* bottom: 0; */
    margin-top: 10%;
    right: 0;
    border-radius: 1px;
    background-color: white;
    padding-right: 20px;
    box-shadow: 1px 0px 71px #404040;
    border: 1px solid;
    border: 1px solid #bababa;
    border-radius: 4px;
   }
   @media only screen and (max-width: 900px){
       td,th{
         font-size:5px;
       }
       .test{
        font-size:8px;
       }
     }
    </style>
<center><h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Gestion crédits :</h1></center> <form action="/listeCredits.php"  method="post">
    <input value="" type="text" name="numero" placeholder="Recherche par Client" style="    background: #f3f3f3 0 0 no-repeat padding-box;
        border: 0;
        outline:none;
        border-radius: 6px;
        box-shadow: 0 3px 6px rgb(54, 54, 54);
        height: 48px;
        padding: 10px 10px 10px 50px;
       " class=" col-9 col-md-3 mt-2" id=""/>
      <button name="submit2" type="submit"  style='' class="search"><i class="fas fa-search"></i>Chercher</button>
    </form>
        <table class='table table-striped mt-2'>
        <tr class='h3'>
            <td>Nom Client</td>
            <td>Téléphone</td>
            <td>adresse</td> 
            <td>Réf</td> 
            <td>Montant rest</td>
            <td>Piéce à jointe</td>
            <td>action</td> 
        </tr>
        @foreach ($credits as $cr)
            
            <tr>
                <td>{{$cr->client->name}}</td>
                <td>{{$cr->client->telephone}}</td>
                <td>{{$cr->client->adresse}}</td>
                <td>{{$cr->ref}}</td>
                <td>{{$cr->p_reste}}</td>
                <td><a target="_blank" href='/piece_jointe/{{$cr->piece_jointe}}'>{{$cr->piece_jointe}}</a></td>
                <td>
                
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i>Action</button>
                <div class="dropdown-menu">
                <button class="btn" title="Ajouter Paiement"  onclick="Ajoute({{$cr->id}})"  style="">
                Ajouter Paiement <i class="fas fa-plus-circle"></i></button>
                <br/>
                <button class="btn" title="Liste Payments"  onclick="Liste({{$cr->id}})"  style="">
                Liste Payments <i class="fas fa-list"></i></button>
                <br/>
                <button class="btn" title="Modifier"  onclick="Modifier({{$cr->id}})"  style="">
                Modifier <i class="far fa-edit"></i></button>
                <br/>
                <form action="{{route('credit.destroy',$cr->id)}}" method="post">
                @csrf
                @method('DELETE')
                    <button type="submit" title="Supprimer" class="btn" style="color:red;">Supprimer <i class="far fa-trash-alt"></i></button>
                </form>
                </td>
            </tr>
        @endforeach
               
             
        </table>
      <div class="Ajouter" style='transform:scale(0)'>
       <div class="row">
        <div class="h1 text-center">Paiement</div>
         <div class="h3">Montant :</div>
         <input type="hidden" id="Cid" hidden readonly>
         <input type="number" id="mnt" class="form-control">
         <div class="h3">Date :</div>
         <input type="date" id="date_mnt" class="form-control">
         <div class="h3">Mode de paiement:</div>
         <select name="" id="mdp" class="form-control">
         <option value="">Au choix du client</option>
                          <option value="Virement">Virement</option>
                          <option value="Chéque">Chéque</option>
                          <option value="Traite">Traite</option>
                          <option value="Espéce">Espèce</option>
                          <option value="Versement">Versement</option>
                          <option value="Carte bancaire">Carte bancaire</option>
                          <option value="Affacturage">Affacturage</option>
                          <option value="Autres">Autres</option>
         </select>
         <div class="h3">Observation :</div>
         <textarea name="" id="observation" class="form-control" cols="30" rows="10"></textarea>
         <br>
    
         <button class="mt-2 btn btn-primary" id="btnAjout"><i class="fas fa-plus-circle"></i>Ajouter</button>
         <button class="mt-2 btn btn-danger annule" id="annule"><i class="fas fa-backspace"></i>Annuler</button>
       </div>
    </div>
    <div class="Liste" style='transform:scale(0)'>
       <div class="row">
        <div class="h3 text-center">Liste Payments</div>
        <div class="col-12">
            <div class="row LPay">
                <div class="col-3 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Montant</div>
                <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Date</div>
                <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">reçu</div>
                <div class="col-3 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Observation</div>
                <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Etat</div>
            </div>
        </div>
        
         <button class="mt-1 btn btn-dark" style='display:none'>Imprimer</button>
         <button class="mt-2 btn btn-danger annule"><i class="fas fa-backspace"></i>Annuler</button>
       </div>
    </div>
    <div class="Modifier" style='transform:scale(0)'>
       <div class="row">
        <form action="" method="post" id="cform">
        @csrf
        @method('PUT')
        <div class="h1 text-center">Modifier</div>
        <div class="h3">Réf</div>
         <input type="text" id="ref" name="ref" class="form-control">
         <div class="h3">Type</div>
         <select class='form-control' name="type" id="type">
             <option value="FACTURE">FACTURE</option>
             <option value="BON LIVRAISON">BON LIVRAISON</option>
         </select>
         <div class="h3">Motif de l'opération</div>
         <input type="text" name="motif" class="form-control" id="motif">
         <div class="h3">Date crédits</div>
         <input type="date" name="date_credit" class="form-control" id="date">
         <div class="h3">Prix Marchandise</div>
         <input type="text" name="p_marchandise" class="form-control" id="pm">
         <div class="h3">Prix du Rest</div>
         <input type="text" name="p_reste" class="form-control" id="pr">
         <div class="h3">Observation</div>
         <textarea name="observation" id="ob" cols="30" rows="4" class="form-control"></textarea>
         <button class="mt-1 btn btn-success" type="submit"><i class="fas fa-edit"></i> Enregistrer</button>
         <button class="mt-2 btn btn-danger annule"><i class="fas fa-backspace"></i>Annuler</button>
        </form>
       </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/credit.js')}}"></script>
@endsection