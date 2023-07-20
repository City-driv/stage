@extends('layouts.guestNav')
@section('title','Contact')
@section('content')
<style>
    .contactN{
        text-decoration: none !important;
        color: #212529 !important;
    }
    button
    {
      background-color:#f60;
      color: white;
      border: 0;
      font-weight: 500;
      /* border-radius: 10%; */
    }
    label
    {
        font-weight: 500;
        font-size:15px;
        color: black;
    }
    a{
        text-decoration: none;
    }
    input,textarea{
        border: 1px solid #f60;
        outline: none;
        margin-left:5px;
        height:6vh;
        background: #f2f2f2;
    }
    .h4,.h3 i{
      color:#335ADB;
    }
    .footer{
       background-color: #1F3EA3;
       
   }
   .footer div{
     padding-left: 20%;
     background-color:#1F3EA3;

   }
   .footer .col-12,.footer a{
      background-color:#1F3EA3;
      color: white;
      text-decoration: none;
      
   }
  </style>
  {{-- @if (session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>
  @endif   --}}
   {{-- <form method="POST" action="/contact.php" class="login" method="post"> --}}
    <form action="{{route('contact.post')}}" method="post" class="login">
      @csrf
<div class="row">
    <div class="row">      
      <div class="col-md-6 col-12">
        <div class="row pt-5" style='margin-left:10px;'>
          <span class="contactN"  style='text-decoration:none;color:#212529;background-color:transparent'>Contactez nous</span>
          <h6   style='text-decoration:none;color:#212529;'>Nous sommes toujours heureux de recevoir vos demandes et suggestions, envoyez-nous un message et nous vous contacterons dès que possible.</h6>
          <div class="col-12 h4">Support technique</div>
          <div class="col-12 h5"  style='text-decoration:none;color:#212529;'><i class="fas fa-envelope"></i> support@worfac.com</div> 
          <div class="col-12 h5" ><i class="fas fa-phone-alt"></i><a href="tel:0606098827" style='text-decoration:none;color:#212529;'> 0606098827</a></div>
          <div class="col-12 h4">Support commercial</div>
          <div class="col-12 h5" style='text-decoration:none;color:#212529;'><i class="fas fa-envelope"></i> contact@worfac.com</div>     
          <div class="col-12 h5"><i class="fas fa-phone-alt"></i><a href="tel:0522470108" style='text-decoration:none;color:#212529;'> 0522470108</a></div>
          <div class="col-12 h5"><i class="fas fa-phone-alt"></i><a href="tel:0606927019" style='text-decoration:none;color:#212529;'> 0606927019</a></div>
          <div class="col-12 h3">
          <a target="_blank" href=" https://www.facebook.com/Ganet-web-111396238064112"><i class="fab fa-facebook fa-lg" style=" "></i></a>
          <a href=""><i class="fab fa-linkedin fa-lg" style=" "></i></i></a>
          <a href=""><i class="fab fa-twitter-square fa-lg"  style=" "></i></a>
          <a target="_blank" href="https://www.youtube.com/channel/UCYV91Rsiqw37mFxK7RBNykA"><i class="fab fa-youtube fa-lg" style=" "></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-12">
        <img src="imgs/undraw_contact_us_re_4qqt.svg" style='width:100%;' alt="" srcset="">
      </div>
      <div class="row"  style='margin-left:10px;'>
        <h3>Envoyez-nous votre message</h3>
        <input class='col-md-5 col-11' style='margin-left:10px;margin-top:5px;'placeholder='Nom'  type="text" name="nom" id="">
        <input class='col-md-5 col-11' style='margin-left:10px;margin-top:5px;'placeholder='Télephone'  type="text" name="telephone" id="">
        <input class='col-md-5 col-11' style='margin-left:10px;margin-top:5px;'placeholder='Email'  type="text" name="email" id="">
        <input class='col-md-5 col-11' style='margin-left:10px;margin-top:5px;'placeholder='Subject'  type="text" name="subject" id="">
        <textarea name="message" class='col-md-5 col-11'                              placeholder='écrivez votre message'   style='margin-left:10px;margin-top:5px;height:15vh;' id="" cols="30" rows="4"></textarea>
         <button type='submit' style='margin-left:10px;padding:10px;font-size:20px;' class="col-11 col-md-10 mt-2 mb-2">Envoyer</button>         
      </div>

    </div>
</div>  
</form>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection