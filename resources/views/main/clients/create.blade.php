@extends('layouts.userNav')
@section('title','WORFAC: client create')
@section('content')
<div style="margin-left: 10%;margin-top: 5%;">
    {{-- <form  method="POST" action="{{route('clients.store')}}"> --}}
       <form action="{{route('clients.store')}}" method="post">
       @csrf
       <label for="" class="h1"><i class="fas fa-user-plus"></i></label><br>
       <label for="name" class="h2">    
           Nom d’entreprise ou Nom Complet:
       </label>
       @error('name')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="name" required type="text"  style="width: 50%;" class="form-control" />
       <label for="adresse" class="h2">
           Adresse:
       </label>
       @error('adresse')
           <span class="text-danger">{{$message}}</span>
       @enderror
       

       <input name="adresse" type="text" style="width: 50%;" class="form-control" />
       <label for="telephone" class="h2">
           Télephone:
       </label>
       @error('telephone')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="telephone" type="number" value="+212"  style="width: 50%;" class="form-control" placeholder="+212631933957" /><br>
       <label for="ice" class="h2">
           ICE:
       </label>
       @error('ice')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="ice" type="text" value=""  style="width: 50%;" class="form-control" placeholder="" /><br>
       <label for="if" class="h2">
           IF:
       </label>
       <input name="if" type="text" value=""  style="width: 50%;" class="form-control" placeholder="" /><br>
       <label for="ville" class="h2">
           Ville:
       </label>
       @error('ville')
           <span class="text-danger">{{$message}}</span>
       @enderror
       <input name="ville" type="text" value=""  style="width: 50%;" class="form-control" placeholder="" /><br>

       <button type="submit" class="btn btn-primary "><i class="fas fa-plus-square"></i> Ajouter</button>
       </form>
</div>

@endsection