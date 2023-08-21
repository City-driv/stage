
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
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
      input{
          border: 1px solid #f60;
          outline:none;
      }
      input :focus{
          border:1px solid  #1f3ea3;
          outline:1px solid  #1f3ea3;
      }
    </style>
<script src='https://kit.fontawesome.com/f0841bede9.js' crossorigin='anonymous'></script>
</head>
<body style=" background-color:#e4e4e4;
font-family:system-ui;">
      <div class="row mt-4">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-1 col-xs-1"></div>
        <div class="col-xl-4 col-lg-4 col-md-4  col-sm-10 col-xs-10">
            <div class="row">
               <div class="col-12 text-center fw-bold"  style="font-size:70px;background: -webkit-linear-gradient(#ff3c00, rgb(204 204 253));-webkit-background-clip: text; font-family:cursive; font-weight: 900; -webkit-text-fill-color: transparent;">
                <a href="/">
                      WORFAC 
                   </a> 
                </div>
                <div class="col-12 mb-3" style="border-radius: 7px;box-shadow: 5px 10px 8px #888888;">
                      <div class="row pt-3 pb-5 fs-3" style="padding-left: 10px;background-color:#f60;
                                              color: white;
                                              border-radius:4px;">
                          <div class="col-12">
                            Veuillez sélectionner un mot de passe ne comportant pas moins de 8 caractères, incluant à la fois des lettres et des chiffres.
                          </div>
                        </div>
                        @error('password')
                            <span class="text-danger alert alert-danger">{{$message}}</span>
                        @enderror
                    <form action="{{route('resetPwdPost')}}" method="post">
                      @csrf
                    <div class="row bg-white">
                        <input type="hidden" name="token" value="{{$token}}"">
                        <input type="email" hidden name="email" value="{{$email}}"">
                        <div class="col-1"></div>
                        <label  class="col-10 mt-3">Nouveau mot de passe</label>
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <input type="password"  required placeholder="Nouveau mot de passe" name="password" class="col-10 mb-3 pass">
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <label  class="col-10 mt-3">Confirmer le nouveau mot de passe</label>
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <input type="password"  required placeholder="Confirmer le nouveau mot de passe"  name="password_confirmation" class="col-10 mb-3 pass">
                        <div class="col-1"></div>
                        <div class="col-1" style="font-weight: 900;font-size:25px;"></div>
                        <button class=" col-10 pt-2 pb-2 mb-4 rounded btn2"  type="submit">Enregistrer le nouveau mot de passe</button>
                        <div class="col-1"></div>
                    </div>
                    </form>
                    </div>
                     <div class="row" style="font-weight: 900;">
                        <div class="col-1"></div>
                        <div class="col-11">
                            Vous n'avez pas de compte ?<a href="{{route('inscription')}}" class="text-decoration-none"> Enregistrez-vous maintenant</a>    
                        </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-1 col-xs-1"></div>
    </div>  

 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>