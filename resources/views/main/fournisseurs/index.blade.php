@extends('layouts.userNav')
@section('title','WORFAC: Fournisseurs')
@section('content')

<style>
    img{
        background-size: 80px 80px ;
        width: 80px;
        height: 80px;
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
</style>

<div class="row">
<form action="{{route('fournisseur.index')}}"  method="GET">
    <input value="" type="text" name="search" placeholder="Recherche par Entreprise" style="    background: #f3f3f3 0 0 no-repeat padding-box;
  border: 0;
  outline:none;
  border-radius: 6px;
  box-shadow: 0 3px 6px rgb(54, 54, 54);
  height: 48px;
  padding: 10px 10px 10px 50px;
 " class=" col-9 col-md-3" >
   <button type="submit"  class="search"><i class="fas fa-search"></i>Chercher</button>
</form>
</div>
@if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
  <center><h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Gestion Fournisseurs :</h1></center> <table class='table table-striped'>
    <tr class='h6'>
        <td>Code Fournisseur</td>
        <td>Entreprise</td>
        <td>FormeJuridique</td>
        <td>Adresse</td>
        <td>Téléphone</td>
        <td>Photo</td>
        
        <td>Action</td> 
    </tr>
    @foreach ($fournisseurs as $f)
        <tr class=''>
        <td>{{$f->code_fournisseur}}</td>
        <td>{{$f->nom_entreprise}}</td>
        <td>{{$f->fj}}</td>
        <td>{{$f->adresse}}</td>
        <td>{{$f->telephone}}</td>
        <td><img src='{{asset('Fimgs/'.$f->photo)}}' ></td>
        
        <td>
        <button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fas fa-cog'></i>Action</button>
        <div class='dropdown-menu'>
        <a  style='color:#212529;;text-decoration:none;font-size:20px;' href='{{route('fournisseur.show',$f->id)}}'> Aperçu <i class='fas fa-eye'></i></a><br/>
        <a  style='color:#212529;;text-decoration:none;font-size:20px;' href='{{route('fournisseur.edit',$f->id)}}'> Modifier <i class='fas fa-edit'></i></a><br/>
        <a  class='' style='color:#212529;;text-decoration:none;font-size:20px;' href='listFactures.php?id=Courtney Rhodes' target='_blank'> liste d'achats <i class='fas fa-list-ul'></i></a><br/>
        <form action="{{route('fournisseur.destroy',$f->id)}}" method="post" onSubmit="return confirm('confirmation suppression')">
        @csrf
        @method('DELETE')
            <button style='color:red;border:0;background-color:white;padding:0;font-size:20px;text-decoration:none;' type='submit' > Supprimer <i class='fas fa-trash'></i></button>
        </form>
        </td> 
        </tr>
    @endforeach
  
  </table>    
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>





@endsection