@extends('layouts.userNav')
@section('title','WORFAC: client create')
@section('content')
<center>
    <h1 style='color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Ajouter Client:</h1>
</center>
<div style="margin-left: 10%;margin-top: 5%;">
    <form action="{{route('clients.store')}}" method="post">
       @csrf
       <label for="" class="h1"><i class="fas fa-user-plus"></i></label><br>
       <label for="name" class="h2">    
           Nom d'entreprise ou Nom Complet:
       </label>
       @error('name')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="name" required type="text" value="{{old('name')}}" style="width: 50%;" class="form-control" />
       <label for="adresse" class="h2">
           Adresse:
       </label>
       @error('adresse')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="adresse" type="text" value="{{old('adresse')}}" style="width: 50%;" class="form-control" />
       <label for="telephone" class="h2">
           Télephone:
       </label>
       @error('telephone')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="telephone" type="tel" value="{{old('telephone')}}"  style="width: 50%;" class="form-control"  /><br>
       <label for="ice" class="h2">
           ICE:
       </label>
       @error('ice')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="ice" type="number" value="{{old('ice')}}"  style="width: 50%;" class="form-control" placeholder="" /><br>
       <label for="if" class="h2">
           IF:
       </label>
       <input name="if" type="number" value="{{old('if')}}"  style="width: 50%;" class="form-control" placeholder="" /><br>
       <label for="ville" class="h2">
           Ville:
       </label>
       @error('ville')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="ville" type="text" value="{{old('ville')}}"  style="width: 50%;" class="form-control" placeholder="" /><br>
       <button type="submit" class="btn btn-primary "><i class="fas fa-plus-square"></i> Ajouter</button>
    </form>
</div>

@endsection