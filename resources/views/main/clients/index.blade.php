@extends('layouts.userNav')
@section('title','WORFAC: fournisseur create')
@section('content')
{{-- css DataTable --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
{{-- Responsive Extension Datatables CSS --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<center>
    <h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Gestion des Clients :</h1>
 </center>  
<center>
@if (session('danger'))
<div class="alert alert-danger">
    {{ session('danger') }}
</div>
@endif
</center>
<div  style="overflow-x:auto; margin: 10%;" class="row tbl">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="d-flex justify-content-between">
        <div class="col-12 fs-1 col-md-2">
            <a href="{{route('clients.create')}}" class="btn btn-primary" ><i class="fas fa-plus-circle"></i> Ajouter Client</a>
        </div>
        <div class="d-flex mt-2">
            <form class="row g-3" method="POST" action="{{route('import.excel.client')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-auto">
                  <input id="clt" type="file" accept='.xlsx,.xls'  class="form-control" name="excelFileCl" >
                </div>
                <div class="col-auto">
                  <button type="submit"  class="btn btn-success mb-3"><i class="fas fa-file-excel" aria-hidden="true"></i>Importer Clients</button>
                </div>
            </form>
        </div>
        </div>
        
<table class="table"  id="articles_table">
    <thead class="table-dark">
        <tr>
            <th>Nom Complet</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>ICE</th>
            <th>IF</th>
            <th>Ville</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->adresse}}</td>
                    <td>{{$client->telephone}}</td>
                    <td>{{$client->ice}}</td>
                    <td>{{$client->if}}</td>
                    <td>{{$client->ville}}</td>
                    <td class="d-flex">
                        <form action="{{route('clients.destroy',$client->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('vous etes sur')" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button>
                        </form>
                        <a href="{{route('clients.edit',$client->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
      
    </tbody>
  </table>
</div>
 
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
  {{-- dataTable --}}
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  {{-- dataTable responsive --}}
  <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
  
  <script src="js/datatable.js"></script>
@endsection