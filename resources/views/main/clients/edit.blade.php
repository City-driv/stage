@extends('layouts.userNav')
@section('title','WORFAC: client edit')
@section('content')
<center>
    <h1 style='color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Modifier Client:</h1>
</center>
<div style="margin-left: 10%;margin-top: 5%;">
    <form action="{{route('clients.update',$client->id)}}" method="post">
       @csrf
       @method('PUT')
       <label for="" class="h1"><i class="fas fa-user-plus"></i></label><br>
       <label for="name" class="h2">    
           Nom d'entreprise ou Nom Complet:
       </label>
       @error('name')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="name" value="{{$client->name}}"  type="text"  style="width: 50%;" class="form-control" />
       <label for="adresse" class="h2">
           Adresse:
       </label>
       @error('adresse')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="adresse" value="{{$client->adresse}}" type="text" style="width: 50%;" class="form-control" />
       <label for="telephone" class="h2">
           Télephone:
       </label>
       @error('telephone')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="telephone" type="tel" value="{{$client->telephone}}"  style="width: 50%;" class="form-control" /><br>
       <label for="ice" class="h2">
           ICE:
       </label>
       @error('ice')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="ice" type="number" value="{{$client->ice}}"  style="width: 50%;" class="form-control" placeholder="" /><br>
       <label for="if" class="h2">
           IF:
       </label>
       <input name="if" type="number" value="{{$client->if}}"  style="width: 50%;" class="form-control" placeholder="" /><br>
       <label for="ville" class="h2">
           Ville:
       </label>
       @error('ville')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="ville" type="text" value="{{$client->ville}}"  style="width: 50%;" class="form-control" placeholder="" /><br>
       <button type="submit" class="btn btn-success "><i class="fas fa-plus-square"></i> Modifier</button>
       </form>
</div>

@endsection