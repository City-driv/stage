@extends('layouts.userNav')
@section('title','WORFAC: Parametres')
@section('content')

<center><h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;"> Paramètres  Société et Compte :</h1></center>  
    @if (session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif 
    {{-- @dump($id) --}}
    <div style="margin-left: 20%;width:70%;">
    <form action="{{route('user.update',$id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" hidden readonly name="id" value="{{$id}}">
            <label for='exampleInputEmail1' style='font-size:14px;font-weight:700; class='form-label' >Email :</label>
        <div class='row'>
        <div class='col-md-6 col-12'>
        <input type='email' class='form-control' name='email' value='{{$user->email}}' readonly id='exampleInputEmail1' />
        <label for='n1'  style='font-size:14px;font-weight:700;'  class='form-label'>Nom entreprise :</label>
        <input type='text' class='form-control'  name='name' readonly value='{{$user->name}}' id='n1'  />
            <label for='n2'  style='font-size:14px;font-weight:700;'  class='form-label'>Forme juridique :</label>
        <select class="form-control" name="fj" style="" id="n2">
                    <option selected value="{{$user->name}}">{{$user->fj}}</option>
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
            <label for='adr'  style='font-size:14px;font-weight:700;' class='form-label'>Adresse:</label>
            <input type='text' class='form-control' name='adresse' value='{{$user->adresse}}' id='adr' />
            <label for='telephone'  style='font-size:14px;font-weight:700;' class='form-label'>Telephone 1:</label>
            <input type="tel"' class='form-control' name='telephone' value=' {{$user->telephone}}'  />
            <label for='tele'  style='font-size:14px;font-weight:700;' class='form-label'>Telephone 2:</label>
            <input type='tel' class='form-control' name='mobile' value='{{$user->mobile}}'' />
            <label for='site_web'  style='font-size:14px;font-weight:700;' class='form-label'>Site Web:</label>
            <input type='text' class='form-control' name='site_web' value='{{$user->site_web}}' />
            <label for='if' style='font-size:14px;font-weight:700;' class='form-label'>N°IF:</label>
            <input type='text' class='form-control' name='if' value='{{$user->if}}'  />
            <label for='ce' style='font-size:14px;font-weight:700;' class='form-label'>N°ICE:</label>
            <input type='Text' class='form-control' name='ice' value='{{$user->ice}}' id='ice' />
            </div>
            <div class='col-md-4 col-12 '>
            <div>
                <label  style='font-size:14px;font-weight:700;' for='exampleInputPassword1' class='form-label'>N°Pattente:</label>
                <input type='Text'  class='form-control' name='num_pattente' value='{{$user->num_pattente}}' id='exampleInputPassword1'/>
                
                <label style='display: none;' for='exampleInputPassword1'  style='font-size:14px;font-weight:700;' class='form-label'>
            </div>
            <label for='num_rc'  style='font-size:14px;font-weight:700;' class='form-label'>N° RC:</label>
            <input type='text'   class='form-control' name='num_rc' value='{{$user->num_rc}}'  />
            <label for='cnss'  style='font-size:14px;font-weight:700;' class='form-label'>CNSS:</label>
            <input type='text' class='form-control' name='cnss' value='{{$user->cnss}}'  />
            <label class='h5'>Mot de passe:<input id='check' type='checkbox' class='h1' style='height:20px;width:20px;    margin-top: 4px;float: right;'/></label>
            {{-- <input type='password' name='password' value="{{$user->password}}" class='form-control' placeholder='***********' /> --}}
            <input type='password' name='password' value="{{$user->password}}" class='form-control pass' placeholder='***********' />
            <br/>
            <input type='file' name='img' accept='image/*' class='form-control ' id='inputGroupFile01'>
            <img  class='card-img-top img' name='Logo' src="{{asset('imgs/Basic.png')}}" value='t1.jfif' class='' alt='...'/>   
                    </div>
                    </div> 
                    <br>
                    <button type="submit" class="btn btn-success  mb-2"><i class="fas fa-file-download"></i> Enregistrer</button>
</form>
</div>
<script>
document.querySelector("input[type='file']").addEventListener("change",function(){
    let Path=URL.createObjectURL(this.files[0]);
    console.log(document.querySelector(".img"))
    document.querySelector(".img").setAttribute("src",Path);
})
document.querySelector("#check").addEventListener("click",()=>{
    if((document.querySelector("#check").checked))
    document.querySelector(".pass").setAttribute("type","text")
    else
    document.querySelector(".pass").setAttribute("type","password")
})
</script>

@endsection