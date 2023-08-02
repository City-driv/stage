@extends('layouts.userNav')
@section('title','WORFAC: garanties')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

<center><h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Liste Garanties :</h1></center>
<form action="/listGaranties.php"  method="post">


    <input value="" type="text" name="Nom" placeholder="Recherche par Entreprise ou Nom " style="    background: #f3f3f3 0 0 no-repeat padding-box;
        border: 0;
        outline:none;
        border-radius: 6px;
        box-shadow: 0 3px 6px rgb(54, 54, 54);
        height: 48px;
        padding: 10px 10px 10px 50px;
" class=" col-9 col-md-3 mt-2" id=""/>
    <input value="" type="text" name="numero" placeholder="Recherche par ICE" style="    background: #f3f3f3 0 0 no-repeat padding-box;
        border: 0;
        outline:none;
        border-radius: 6px;
        box-shadow: 0 3px 6px rgb(54, 54, 54);
        height: 48px;
        padding: 10px 10px 10px 50px;
       " class=" col-9 col-md-3 mt-2" id=""/>
      <button name="submit2" type="submit"  style='' class="search"><i class="fas fa-search"></i>Chercher</button>
    </form>
        <table class='table table-striped mt-2'>
        <tr class='h3'>
            <td>Nom Complet</td>
            <td>Description article</td>
            <td>Email</td>
            <td>Date Achat</td>
            <td>Date Fin Garantie</td> 
            <td>Action</td> 
        </tr>
        @foreach ($garanties as $gr)
           <tr>
            <td>{{$gr->client->name}}</td>
            <td>{{$gr->article->description}}</td>
            <td>{{$gr->email}}</td>
            <td>{{$gr->date_achat}}</td>
            <td>{{$gr->date_fin}}</td>
            <td>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-cog"></i>Action
                </button>
                <ul class="dropdown-menu">
                    <li>
                    <a id="imp" title="Enregistrer/Imprimer" style="color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="{{route('garantie.index')}}"  class="dropdown-item"
                        onclick="window.open('{{route('garantie.show',$gr->id)}}','popup','width=1000,height=1000').print(); return false;">Enregistrer/Imprimer <i class="fas fa-print"></i></a>
                    </li>
                    <li>
                        <a class="dropdown-item" title="Aprecu" style="padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="{{route('garantie.show',$gr->id)}}">Aperçu <i class="far fa-eye"></i></a>
                    </li>
                    <li>
                        <a title="Partager" class="dropdown-item" style=" padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="#">Partager <i class="  fab fa-whatsapp"></i></a></li>
                    <li>
                        <a class="dropdown-item"  title="Envoyer" style=" padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;"  href="#">Envoyer <i class="fas fa-envelope"></i></a>
                    </li>
                    <li>
                        <a class="dropdown-item"  title="Modifier" style="padding-left;5px;color: black;text-decoration:none;font-size:19px;font-familly:cursive;" id="modifier"  href="{{route('garantie.edit',$gr->id)}}">Modifier <i class="fas fa-edit"></i></a></li>
                    <li>
                    <form action="{{route('garantie.destroy',$gr->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                            <a title="Supprimer" class="dropdown-item" style="padding-left;5px;color: red;text-decoration:none;font-size:19px;font-familly:cursive;color:red;" ><button type="submit" >Supprimer <i class="far fa-trash-alt"></i></button> </a></li>
                    </form>
                </ul>
                </div>   
            </td>   
            </tr>
        @endforeach
        </table>
@endsection