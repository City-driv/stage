@extends('layouts.userNav')
@section('title','WORFAC: Create garantie')
@section('content')
<center><h1 style='color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Ajouter Garantie</h1></center>
<div class="container mt-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('garantie.store')}}" method="post">
    @csrf
        <div class="row">
            <div class="form-floating col-10 col-md-4">
            <select name="client_id" class="form-select client" id="floatingSelectGrid" aria-label="Floating label select example">
                @foreach ($clients as $cl)
                    <option value="{{$cl->id}}">{{$cl->name}}</option>
                @endforeach 
            </select>
        <label for="floatingSelectGrid" class="h5">Client:</label>
        </div>
        <div class="form-floating col-10 col-md-4">
        <select name="article_id" class="form-select client" id="floatingSelectGrid" aria-label="Floating label select example">
            @foreach ($articles as $art)
                <option value="{{$art->id}}">{{$art->description}}</option>
            @endforeach
        </select>
        <label for="floatingSelectGrid"  class="h5">Article:</label>
        </div>
        <div class="col-10 col-md-6 h5">
                Email :
            <input type="email" value="{{old('email')}}" name="email"  class="form-control">
        </div>
        <div class="col-10 col-md-6"></div>
        <div class="col-10 col-md-6 h5">Date d'achat 
            <input type="date" value="{{old('date_achat')}}" name="date_achat" class="form-control">
        </div>
        <div class="col-10 col-md-6 h5">
                Date fin garantie :
                <input type="date" value="{{old('date_fin')}}" name="date_fin" class="form-control" >
        </div>
        <div class="col-10 col-md-6 h5">
            Numéro série  :
            <input type="number" value="{{old('num_serie')}}" name="num_serie" class="form-control" >
        </div>
        <div class="col-10"> 
            <button type="submit" class="btn btn-primary" ><i class="fas fa-download"></i> Ajout Garantie</button>
        </div>
        </div>
    </form>
</div>
    
@endsection