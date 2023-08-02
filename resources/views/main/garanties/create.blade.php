@extends('layouts.userNav')
@section('title','WORFAC: Create garantie')
@section('content')

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
            <input type="email" style="" name="email" id="" class="form-control">
        </div>
        <div class="col-10 col-md-6"></div>
        <div class="col-10 col-md-6 h5">Date d'achat 
            <input type="date" name="date_achat" class="form-control">
        </div>
        <div class="col-10 col-md-6 h5">
                Date fin garantie :
                <input type="date" name="date_fin" class="form-control" >
        </div>
        <div class="col-10 col-md-6 h5">
            Numéro série  :
            <input type="number" name="num_serie" class="form-control" id="">
        </div>
        <div class="col-10"> 
            <button type="submit" class="btn btn-primary" ><i class="fas fa-download"></i> Ajout Garantie</button>
        </div>
        </div>
    </form>
</div>
    
@endsection