@extends('layouts.userNav')
@section('title','WORFAC: Edit garantie')
@section('content')
<center><h1 style='color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Modifier garantie:</h1></center>
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
    <form action="{{route('garantie.update',$garantie->id)}}" method="post">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="form-floating col-10 col-md-4">
            <select name="client_id" class="form-select client" id="floatingSelectGrid" aria-label="Floating label select example">
                @foreach ($clients as $cl)
                    <option value="{{$cl->id}}"  {{$garantie->client_id == $cl->id ? 'selected' : ''}} >{{$cl->name}}</option>
                @endforeach 
            </select>
        <label for="floatingSelectGrid" class="h5">Client:</label>
        </div>
        <div class="form-floating col-10 col-md-4">
        <select name="article_id" class="form-select client" id="floatingSelectGrid" aria-label="Floating label select example">
            @foreach ($articles as $art)
                <option value="{{$art->id}}" {{$garantie->article_id == $art->id ? 'selected' : ''}} >{{$art->description}}</option>
            @endforeach
        </select>
        <label for="floatingSelectGrid"  class="h5">Article:</label>
        </div>
        <div class="col-10 col-md-6 h5">
                Email :
            <input type="email" style="" value="{{$garantie->email}}" name="email" id="" class="form-control">
        </div>
        <div class="col-10 col-md-6"></div>
        <div class="col-10 col-md-6 h5">Date d'achat 
            <input type="date" value="{{$garantie->date_achat}}" name="date_achat" class="form-control">
        </div>
        <div class="col-10 col-md-6 h5">
                Date fin garantie :
                <input type="date" name="date_fin" value="{{$garantie->date_fin}}" class="form-control" >
        </div>
        <div class="col-10 col-md-6 h5">
            Numéro série  :
            <input type="number" name="num_serie" value="{{$garantie->num_serie}}" class="form-control" id="">
        </div>
        <div class="col-10"> 
            <button type="submit" class="btn btn-primary" ><i class="fas fa-download"></i> Modifier Garantie</button>
        </div>
        </div>
    </form>
</div>
    
@endsection