
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    {{-- <link rel="icon" href="logo.png" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
      button
      {
        background-color:#f60;
        color: white;
        border: 0;
        font-weight: 900;font-size:25px;
      }
      label
      {
        font-weight: 500;
          font-size:20px;
          color: black;
      }
      a{
          text-decoration: none;
      }
      input,select{
          border: 1px solid #f60;
          outline:none;
      }
      input :focus{
          border:1px solid  red;
          outline:1px solid  #1f3ea3;
      }
    </style>
<script src='https://kit.fontawesome.com/f0841bede9.js' crossorigin='anonymous'></script>
</head>
<body style=" background-color:#e4e4e4;font-family:system-ui;">

      <div class="row mt-4">
         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-1 col-xs-1"></div>
        <div class="col-xl-4 col-lg-4 col-md-4  col-sm-10 col-xs-10">
            <div class="row">
                <div class="col-12 text-center fw-bold"  style="font-size:70px; background: -webkit-linear-gradient(#ff3c00, rgb(204 204 253)); -webkit-background-clip: text; font-family:cursive; font-weight: 900; -webkit-text-fill-color: transparent;">
                   <a href="/">
                      WORFAC 
                   </a>
                </div>
                <div class="col-12 mb-3" style="border-radius: 7px;box-shadow: 5px 10px 8px #888888;">
                      <div class="row pt-3 pb-5 fs-3" style="padding-left: 10px;background-color:#f60;color: white;border-radius:4px;">
                          <div class="col-12">
                            Inscrivez-vous ! WORFAC
                          </div>
                          <div class="col-12 h6"></div>
                          <div class="col-12">
                            Connectez-vous.
                          </div>
                        </div>
                        
                        <ul>
                        @foreach ($errors->all() as $error)
                          <li><span class="text-danger">{{$error}}</span></li>
                        @endforeach
                      </ul>
                      
              <form method="POST" action="{{route('enregistrer')}}">
                @csrf
                    <div class="row bg-white pb-3">
                        <div class="col-1"></div>
                        <div class="col-10 mt-3 ">
                                                  </div> 
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <label for="Nom" class="col-10 mt-3">Nom d’entreprise </label>
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <input type="text" name="entreprise_name" value="{{old('entreprise_name')}}" class="col-10">
                       
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <label for="email" class="col-10 mt-3">Adresse e-mail (nom d'utilisateur)</label>
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <input type="email" value="{{old('email')}}" name="email"  class="col-10 mb-3">
                        
                        <div class="col-1"></div>
                       
                        <div class="col-1"></div>
                        <label for="tele" class="col-10 mt-3">Téléphone (recommandé)</label>
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <input type="tel" placeholder="+212 *********" value="{{old('telephone')}}"   name="telephone" class="col-10">
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                         <label for="ice" class="col-10 mt-3">ICE </label>
                         <div class="col-1"></div>
                         <div class="col-1"></div>
                         <input type="text" value="{{old('ice')}}" name="ice" class="col-10">
                         <div class="col-1"></div>
                        @php
                            $pack=request('pack');
                        @endphp
                        @if ($pack!=='demo')
                            <div class="col-1"></div>
                            <label for="Pack" class="col-10 mt-3">Type Pack  </label>
                            <div class="col-1"></div>
                            <div class="col-1"></div>
                            <select class="col-10" name="pack">
                            <option value="Perso" {{$pack==='Perso' ? 'selected' :'' }} >Perso - 720 DH</option>          
                            <option value="Starter" {{$pack=='Starter' ? 'selected' :'' }} >Starter - 1800 DH </option>
                            <option value="Performance" {{$pack=='Performance' ? 'selected' :'' }}>Performance - 5400 DH</option>
                            </select>
                            <div class="col-1"></div>
                        @endif
                         
                                                 <div class="col-1"></div>
                        <label for="password" class="col-10">Mot de passe (8 characters minimum)</label>
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <input type="password" required palceholder="Mot de passe"  name="password"  class="col-10">
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <label for="password" class="col-10">Confirmation mot de passe</label>
                        <div class="col-1"></div>
                        <div class="col-1 icon"></div>
                        <input type="password" required palceholder="Mot de passe"" name="password_confirmation"  class="col-10">
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <label for="contrat" class="col-10 h6 text-primary"><input type="checkbox" required name="" id="contrat"> 
                        Conditions générales et contrat
                        </label>
                        <div class="col-1"></div>
                         <div  class="col-1"></div>
                          <button   style="font-weight: 900;font-size:25px;" class="submit col-10 pt-2 pb-2 mb-1 mt-1 rounded "  type="submit">Créer un compte</button>
                          <div class="col-1"></div>
                          <div class="col-1"></div>
                      </form>
                          <div class="col-10">
                              <label style="font-weight: 500;color: rgb(43, 41, 41);font-size: 14px;" for="">En vous inscrivant, vous confirmez accepter <a target="_blank" href="{{route('conditions')}}">les Conditions générales</a>  d'utilisation. et le traitement de vos données personnelles par WORFAC</label>
                          </div>
                          <div class="col-1"></div>
                    </div>
                   
                    </div>
                     <div class="row"  style="font-weight: 900;">
                        <div class="col-11 mb-3" style="font-size:15px;">
                            Vous avez déjà un compte WORFAC ?<a href="{{route('connexion')}}" class="text-decoration-none">  Connectez-vous</a>    
                        </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-1 col-xs-1"></div>
    </div>  


 {{-- <script src="inscription.js"></script> --}}
 {{-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
</body>
</html>