@extends('layouts.userNav')
@section('title','WORFAC: Factures')
@section('headInfo')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')
<style>
    *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}


/* Table Styles */

.table-wrapper{
    margin: 20px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
    overflow-x: scroll;
}

.fl-table {
    border-radius: 5px;
    font-size: 10px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
  
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 10px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
 a.dropdown-item{
    font-size: 11px !important;
 }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

<center><h1 style='color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Liste des Users:</h1></center>
<div class="table-wrapper">
            {{-- <table class="table table-responsive"> --}}
{{-- <table class="table table-responsive text-center table-bordered border-primary"> --}}
    <table class="fl-table">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>telephone</th>
        <th>Entreprise name</th>
        <th>ice</th>
        <th>if</th>
        <th>fj</th>
        <th>pack</th>
        <th>password</th>
        <th>status</th>
        <th>adresse</th>
        <th>mobile</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody id="ttbody">
        @foreach ($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td class="cl">{{$user->email}}</td>
                <td>{{$user->telephone}} </td>
                <td>{{$user->entreprise_name}} </td>
                <td>{{$user->ice}} </td>
                <td>{{$user->if}}</td>
                <td>{{$user->fj}}</td>
                <td>{{$user->pack}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->status}}</td>
                <td>{{$user->adresse}}</td>
                <td>{{$user->mobile}}</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" style="font-size: 10px;" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-cog"></i>Action
                    </button>
                    <ul class="dropdown-menu">
                      <li>
                        <a title="Activer_compte" style="color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="{{route('user.active',$user->id)}}"  class="dropdown-item">Activer compte <i class="fas fa-check"></i></a>
                      </li>
                      <li>
                          <a title="Desactiver_compte" class="dropdown-item" style=" padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="{{route('user.desactive',$user->id)}}">Desactiver compte <i class="fa fa-times"></i></a></li>
                      <li>
                      <li>
                          <a class="dropdown-item" title="Aprecu" style="padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="{{route('admin.show',$user->id)}}">Aperçu <i class="far fa-eye"></i></a>
                      </li>
                         <a class="dropdown-item"  title="Envoyer" style=" padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="#">Envoyer <i class="fas fa-envelope"></i></a>
                      </li>
                      <li>
                         <a class="dropdown-item"  title="Modifier" style="padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;" id="modifier"  href="{{route('admin.edit',$user->id)}}">Modifier <i class="fas fa-edit"></i></a></li>
                      <li>
                        <form action="{{route('admin.destroy',$user->id)}}" method="post">
                         @csrf
                         @method('DELETE')
                              <a title="Supprimer" class="dropdown-item" style="padding-left;5px;color: red;text-decoration:none;font-size:19px;font-familly:cursive;color:red;" ><button type="submit" >Supprimer <i class="far fa-trash-alt"></i></button> </a></li>
                        </form>
                    </ul>
                  </div>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection