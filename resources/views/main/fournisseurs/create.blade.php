@extends('layouts.userNav')
@section('title','WORFAC: fournisseur create')
@section('content')
<center>
    <h1 style='color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Ajouter fournisseur</h1>
</center>
<form style="margin-left: 10%;margin-top: 5%;"  method="POST" action="{{route('fournisseur.store')}}"  enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<label for="" class="h1"><i class="fa-2x fas fa-truck"></i></label><br>
<div class="row">
    <div class="col-12 col-md-8">
        <div class="row">
            <div class="col-12 col-md-2 h6">Code Fournisseur:</div>
            <div class="col-12 col-md-2"><input type="text" class="form-control" value="{{old('code_fournisseur')}}" name="code_fournisseur" ></div>
            <div class="col-12 col-md-2 h6">Type de Fournisseur:</div>
            <div class="col-12 col-md-2 h6" style="float:left"><label for="part">Particulier</label>
            <input required type="radio"  value="Particulier" name="type_fournisseur" id="part"></div>
            <div class="col-12 col-md-2 h6" style="float:left"><label for="entr">Entreprise</label>
            <input required type="radio" value="Entreprise" name="type_fournisseur" id="entr"></div>
            <label for="" class="col-10 col-md-3 h6"  style="margin-left:10px;">Nom l'entreprise <br/>
            <input type="text"  style="margin-left:10px;" value="{{old('nom_entreprise')}}" name="nom_entreprise" class=" form-control">
            </label>
            <label for="" class="col-10 col-md-3  h6"  style="margin-left:10px;">Form Juridique   <br/> 
            <select class=" form-control" name="fj" style="margin-left:10px;" id="">
                <option value="">Veuillez selectionner</option>
                <option value="Auto-entrepreneur">Auto-entrepreneur</option>
                <option value="SARL A ASSOCIE UNIQUE">SARL A ASSOCIE UNIQUE</option>
                <option value="Personne physique">Personne physique</option>
                <option value="L'entreprise individuelle">L'entreprise individuelle</option>
                <option value="La Societe à Responsabilite Limitee (SARL)">La Societe à Responsabilite Limitee (SARL)</option>
                <option value="La Societe en Nom Collectif">La Societe en Nom Collectif</option>
                <option value="La Societe en commandite simple">La Societe en commandite simple</option>
                <option value="La Societe anonyme simplifiee">La Societe anonyme simplifiee</option>
                <option value="La Societe en commandite par actions">La Societe en commandite par actions</option>
                <option value="La Societe anonyme">La Societe anonyme</option>
                <option value="La Societe en participation">La Societe en participation</option>
                <option value="Le groupement d'interêt economique">Le groupement d'interêt economique</option>
                <option value="Succursale">Succursale</option>
            </select>
            </label>
            <label for="" class="col-10 col-md-3  h6"  style="margin-left:10px;">ICE  <br/>
            <input name="ice" type="text" value="{{old('ice')}}" class="form-control" style="margin-left:10px;"> </label>
            <label for="" class="col-10 col-md-3  h6"  style="margin-left:10px;">IF   <br/>
            <input name="if" type="text" value="{{old('if')}}" class="form-control" style="margin-left:10px;"> </label>
        </div>
    </div>
    <div class="col-12 col-md-4">
    <input type='file' name='photo' accept='image/*' class='form-control' id='inputGroupFile01'>
    <img src="{{asset('imgs/facts/alt.jpg')}}" class="img" style="width:100%;height:200px; background-size:200px 100%;" alt="" srcset="">
    </div>
</div>
<div class="row">
    <label for="h3 text-succes"> Adresse & Coordonnees</label>
    <hr>
     <div class="col-md-4 col-12 h6">Adresse :<br/>
     <input class="form-control" type="text" name="adresse" id=""></div>
     <div class="col-md-3 col-12 h6">Téléphone :<br/><input class="form-control" type="text" value="+212" name="telephone" id=""></div>
     <div class="col-md-3 col-12 h6">Mobile :   <br/><input class="form-control" type="text" value="+212" name="mobile" id=""></div>
     <div class="col-md-4 col-12 h6">Code Postale :<br/><input class="form-control" type="text" name="code_postale" id=""></div>
     <div class="col-md-3 col-12 h6">Pays :        <br/><input class="form-control" type="text" value="" name="pays" id=""></div>
     <div class="col-md-4 col-12 h6">Numero de compte :<br/><input class="form-control" type="text" name="num_compte" id=""></div>
     <div class="col-md-3 col-12 h6">Nom de la banque :<br/><input class="form-control" type="text" value="" name="nom_banque" id=""></div>
     <div class="col-md-3 col-12 h6">Email :           <br/><input class="form-control" type="email" value="" name="email" id=""></div>
     <div class="col-md-4 col-12"></div>
     <div class="col-md-3 col-12"></div>
     <div class="col-md-3 col-12"></div>
     <div class="col-12 h6">Site internet :</div>
     <div class="col-md-4 col-12"><input class="form-control" type="text" name="site_internet" id=""></div>
</div><br>
<button type="submit" class="btn btn-primary "><i class="fas fa-plus-square"></i> Ajouter</button>
</form>
<script>
document.querySelector("input[type='file']").addEventListener("change",function(){
let Path=URL.createObjectURL(this.files[0]);
document.querySelector(".img").setAttribute("src",Path);
})
</script>

@endsection