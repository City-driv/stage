@extends('layouts.userNav')
@section('title','WORFAC: fournisseur create')
@section('content')
   <div style="margin-left: 10%;margin-top: 5%;">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{route('article.store')}}">
        @csrf
        <label for="" class="h1"><i class="fas fa-paperclip"></i></label><br>
        <label for="description" class="h2">Description:</label>
        <input name="description" required type="text"  style="width: 50%;" class="form-control" />
        <label for="price" class="h2">Prix unitaire:</label>
        <input name="price" type="number"  min="0" style="width: 50%;" class="form-control" />
        <label for="" class="h2">TVA (%): </label>
        <input min="0" max="100" type="number"  name="tva" type="number" value="20" style="width: 50%;" class="form-control" />
        <label for="quantite" class="h2">Quantité:</label>
        <input name="quantite" min="0" type="number"  style="width: 50%;" class="form-control" placeholder="" /><br>
        <button type="submit" class="btn btn-primary "><i class="fas fa-plus-square"></i> Ajouter</button>
    </form>
</div>
@endsection