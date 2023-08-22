@extends('layouts.userNav')
@section('title','WORFAC: articles')
@section('content')
{{-- css DataTable --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
{{-- Responsive Extension Datatables CSS --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<center><h1 style=" overflow-y: hidden; color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Gestion des articles :</h1></center>
<center>
  @if (session('danger'))
  <div class="alert alert-danger">
      {{ session('danger') }}
  </div>
  @endif
</center>
<div class="container  w-full md:w-4/5   mx-auto px-2">
    <div class="d-flex justify-content-between">
    <div class="col-12 fs-1 col-md-2">
        <button type="button" class="btn btn-primary" onclick="Ajoute()"><i class="fas fa-plus-circle"></i> Ajouter Article</button>
    </div>
    <div class="d-flex mt-2">
        <form class="row g-3" method="POST" action="{{route('import.excel')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-auto">
              <input type="file" id="art" accept='.xlsx,.xls,' class="form-control" name="excelfile" >
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-success mb-3"><i class="fas fa-file-excel" aria-hidden="true"></i>Importer Articles</button>
            </div>
        </form>
    </div>
    </div>
    {{-- <div style="margin-left: 2%"> --}}
<table class="table" id="articles_table">
    <thead class="table-dark" >
      <tr>
        <th>Libelle</th>
        <th>Quantité</th>
        <th>Prix unitaire</th>
        <th>Tva (%)</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($articles as $article)
          <tr>
            <td>{{$article->description}}</td>
            <td>{{$article->quantite}}</td>
            <td>{{$article->price}}</td>
            <td>{{$article->tva}}</td>
            <td class="d-flex">
                <a href="{{route('article.edit',$article->id)}}" class="btn btn-warning"><i class="fas fa-edit" aria-hidden="true"></i></a>
                <form action="{{route('article.destroy',$article->id)}}" method="post">
                @csrf
                @method('DELETE')
                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');" class="btn btn-danger"><i class="fas fa-minus-circle" aria-hidden="true"></i></button>
                </form>
            </td>

          </tr>
      @endforeach
    </tbody>
  </table>

  <div class="AjouteClient" style="   background-color: rgb(248, 248, 248);padding-left: 10%;border-radius: 5px;box-shadow: rgb(231 231 231) 5px 10px 20px inset; padding-bottom: 2%;width: 50%;border: 1px solid rgb(147 147 147);transform: scale(0);margin: 10% auto auto; position: absolute;
  padding: 17px;top: 0px;left: 0px;right: 0px;">
   <form action="{{route('article.store')}}" method="POST">
    @csrf
       <div class="row"></div>
          <div class="mb-3">
       <label for="description" class="form-label">Description :</label>
       <input type="text" style="width:50%" required class="form-control col-8" name="description" placeholder="ARTICLE" />
     </div>
     <div class="mb-3">
       <label for="quantite"  class="form-label">Quantite:</label>
       <input type="number" value="1" min="0" style="width:50%" class="form-control col-8" name="quantite" placeholder="20" />
     </div>
     <div class="mb-3">
       <label for="price"  class="form-label">PUHT(DH):</label>
       <input type="number" value="1" min="0" style="width:50%" class="form-control col-8" name="price" required placeholder="" />
     </div>
     <div class="mb-3">
       <label for="tva"  class="form-label">Tva(%):</label>
       <input type="number" value="20" min="0" style="width:50%" class="form-control col-8" name="tva" placeholder="20" />
     </div>
     <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Ajouter Article</button>
          <button type="button" class="btn btn-danger" onclick="annuler()"><i class="fas fa-backspace"></i> Annuler </button>
   </form>
   </div>
</div>
  <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
  {{-- dataTable --}}
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  {{-- dataTable responsive --}}
  <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
  
  <script src="js/datatable.js"></script>
@endsection
