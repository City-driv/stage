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
    min-height: 100vh;
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

<center>
    <h1 style='color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Liste des Users:</h1>
</center>
<div class="table-wrapper">
    {{-- {{ now()->addYear()->toDateString() }} --}}
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
        <th>Num docs</th>
        <th>Date Creation</th>
        <th>Date Expiration</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody id="ttbody">
        @foreach ($users as $user)
            <form action="{{ route('admin.update.user',$user->id) }}" method="post">
                @csrf
                @php
                    $c='#03A9F4';
                    if (($user->pack =='perso' && $user->num_doc >= 1000) || ($user->pack =='starter' && $user->num_doc >= 3000))
                     {$c='#ff0000a6';}
                    if (($user->pack =='perso' && $user->num_doc >= 980 && $user->num_doc < 1000) || ($user->pack =='starter' && $user->num_doc >= 2980 && $user->num_doc < 3000))
                    {$c='#ffcc00';}
                @endphp
            <tr style="background:{{ $c }}">
                <th>{{$user->id}}</th>
                <td><input type="text" name="name" value="{{$user->name}}"></td>
                <td class="cl"><input type="text" name="email" value="{{$user->email}}"></td>
                <td><input type="text" name="telephone" value="{{$user->telephone}}"></td>
                <td><input type="text" name="entreprise_name" value="{{$user->entreprise_name}}"></td>
                <td><input type="text" name="ice" value="{{$user->ice}}"> </td>
                <td><input type="text" name="if" value="{{$user->if}}"> </td>
                <td>
                    <select style="max-width: 100px" name="fj">
                        <option selected value="{{$user->fj}}">{{$user->fj !==null ? $user->fj : 'Forme juridique' }}</option>
                        <option  value="Auto-entrepreneur" >Auto-entrepreneur</option>
                        <option  value="Personne physique">Personne physique</option>
                        <option  value="L'entreprise individuelle">L'entreprise individuelle</option>
                        <option  value="La Societe à Responsabilite Limitee (SARL)">La Societe à Responsabilite Limitee (SARL)</option>
                        <option  value="La Societe en Nom Collectif">La Societe en Nom Collectif</option>
                        <option  value="La Societe en commandite simple">La Societe en commandite simple</option>
                        <option  value="La Societe anonyme simplifiee">La Societe anonyme simplifiee</option>
                        <option  value="La Societe en commandite par actions">La Societe en commandite par actions</option>
                        <option  value="La Societe anonyme">La Societe anonyme</option>
                        <option  value="La Societe en participation">La Societe en participation</option>
                        <option  value="Le groupement d'interêt economique">Le groupement d'interêt economique</option>
                        <option  value="SARL au">SARL au</option>
                        <option  value="Succursale">Succursale</option>
                    </select>  
                    {{-- <input type="text" name="fj" value="{{$user->fj}}"> --}}
                </td>
                <td>
                    <select name="pack" >
                        <option value="demo" {{ $user->pack == 'demo' ? 'selected' : '' }}>Demo</option>
                        <option value="performance" {{ $user->pack == 'performance' ? 'selected' : '' }}>Performance</option>
                        <option value="starter" {{ $user->pack == 'starter' ? 'selected' : '' }}>Starter</option>
                        <option value="perso" {{ $user->pack == 'perso' ? 'selected' : '' }}>Perso</option>
                    </select>
                </td>
                <td><input type="text" value="{{$user->password}}"></td>
                <td>
                   <select name="status">
                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="test" {{ $user->status == 'test' ? 'selected' : '' }}>Test</option>
                   </select>
                    {{-- <input type="text" value="{{$user->status}}">  --}}
                </td>
                <td><input type="text" name="adresse" value="{{$user->adresse}}"></td>
                <td><input type="text" name="num_doc" value="{{$user->num_doc}}" style="width: 30px;text-align:center"></td>
                {{-- <td><span style="background: white;padding:2px">{{$user->formatted_created_at}}</span></td> --}}
                <td><input type="date" name="date_cr" value="{{$user->date_cr}}"></td>
                <td><input type="date" name="date_exp" value="{{$user->date_exp}}"></td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" style="font-size: 10px;background:white;color:#324960" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-cog"></i>Action
                    </button>
                    <ul class="dropdown-menu">
                      <li>
                        <a title="Activer_compte" style="color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="{{route('user.active',$user->id)}}"  class="dropdown-item">Activer compte <i class="fas fa-check"></i></a>
                      </li>
                      <li>
                          <a title="Desactiver_compte" class="dropdown-item" style=" padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="{{route('user.desactive',$user->id)}}">Desactiver compte <i class="fa fa-times"></i></a>
                      </li>
                      <li>
                          <a title="renouveler offre" class="dropdown-item" style=" padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="{{route('user.renouveler.offre',$user->id)}}">Renouveler L'offre <i class="fa fa-refresh"></i></a>
                      </li>
                      <li>
                         <a class="dropdown-item"  title="Modifier" style="padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;" id="modifier"  ><button style="display: contents" type="submit">Modifier</button> <i class="fas fa-edit"></i></a>
                      </li>
                    </form>

                      <li>
                        <form action="{{route('admin.destroy',$user->id)}}" method="post">
                         @csrf
                         @method('DELETE')
                              <a title="Supprimer" class="dropdown-item" style="padding-left;5px;color: red;text-decoration:none;font-size:19px;font-familly:cursive;color:red;" ><button style="display: contents;color:red" type="submit" >Supprimer <i class="far fa-trash-alt"></i></button> </a>
                        </form> 
                      </li>
                    </ul>
                  </div>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection