@extends('layouts.userNav')
@section('title','WORFAC: Factures')
@section('headInfo')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')

<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none;
margin: 0;
}

/* Firefox */
input[type=number] {
-moz-appearance: textfield;
}
  body{
    height:190vh;
  }
  a{
    color:none;
    background-color:none;
  }
  .detaille{
   position: fixed;
   margin-left:10%;
   top: 25%;
   right: 25%;
   border-collapse:collapse;
   padding:0;
   background-color:black;
   color:white;
   display:none;
  }
  .table2{
   border:4px solid red;
   
  }
  .table2 tr td{
   padding:15px;
    text-align:center;
   border:2px solid white;
   color:white;
  }
  .facture,.modifier{
   margin-left: 20%;
 */: ;
 padding-left: 20px;
 /* padding-top: 2%; */
 border-radius: 10px;
 /* box-shadow: rgb(252 183 66) 5px 10px 20px inset; */
 padding-bottom: 2%;
 /* margin-top: -15%; */
 width: 70%;
 padding: 26px;
 border: 1px solid #afafaf;
 position: relative;
 transform: scale(0);
 /* top: 0; */
 margin: auto;
 position: absolute;
 top: 0;
 left: 0;
 /* bottom: 0; */
 margin-top: 10%;
 right: 0;
 /* border-radius: 1px; */
 border-radius: 5px;
 background-color: white;
 padding-right: 20px;
}
  @media only screen and (max-width: 900px){
    td,th{
      font-size:5px;
    }
  }
</style>

<center><h1 style='color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Liste Documents Factures  d'entrés:</h1></center>    <div class="facture">
  <div class="row">
    <label for="" class="h2 text-center">Réf:</label>
   <input type="text" class="form-control text-center reference" style='font-size:30px;' value="
   FACT-360-7">
   <button onclick='FacturerEng()' class="mt-1 btn btn-success"><i class="fas fa-edit"></i> Facturer</button>
   <button onclick='annuler()' class="mt-2 btn btn-danger"><i class="fas fa-backspace"></i>Annuler</button>
  </div>      
</div>
<div class="modifier">
     <div class="row pt-5 pb-5">
       <select name="" id="" class="form-control col-3 article" style='width:30%;margin-right:5px;'>
       <option value='497'>DUCIMUS EAQUE NON A</option><option value='498'>ET AUT ET EST DUCIMU</option><option value='499'>PHONE</option><option value='500'>SOURIS</option>          </select>
       <button class="col-1 ajoute btn btn-success h3"><i class="fas fa-plus"></i></button>
       <select name="" onchange="change(this.value)" id="" class="form-control col-3 client"style='display:block;width:30%;margin-right:5px;margin-left:5px;'>
       <option value='1560'>john snow</option><option value='1561'>HAMIID</option><option value='1562'>TEST CLIENT</option><option value='1563'>testyyy</option><option value='1564'>azerty</option><option value='1565'>AEAZE</option><option value='1566'>AZEAZE</option><option value='1567'>AZEAZEAZE</option><option value='1568'>TESTYY</option><option value='1569'>SED SINT SINT TOTAM</option>          </select>
       <table class="cmd">
         <tr class="bg-dark text-white h5 text-center pt-3 pb-3">
           <td>Description</td>
           <td>Unite</td>
           <td>Taux Remix</td>
           <td>Qte</td>
           <td>PUHT</td>
           <td>TVA</td>
           <td>TOTAL</td>
           <td>Supp</td>
         </tr>
       </table>
          <button onclick='engistrer()' class="mt-1 btn btn-success"><i class="fas fa-edit"></i> Enregistrer</button>
          <button onclick='annuler()' class="mt-2 btn btn-danger"><i class="fas fa-backspace"></i>Annuler</button>
     </div>
</div>
<div class="row">
   <label class="col-12 fs-1" style='font-size:20px;font-weight:900;'  for=""><i style="color: #0d6efd;" class="fas fa-search"></i> Recherche Par client:</label>
   <input style="margin-left:5%;background: #f3f3f3 0 0 no-repeat padding-box;border: 0;outline: none;border-radius: 6px;box-shadow: 0 3px 6px rgb(54 54 54);height: 48px;padding: 10px 10px 10px 50px;" class="input col-4"  type="text" placeholder="" aria-label="default input example">
</div>
<br>
<table class="text-center table table-bordered border-primary"></table>
<div class="detaille">
 <button onclick="annuler()" style="background-color:red;color:white;padding-bottom:0;font-size:30px;border:0;">x</button>
 <table  class="table2 table-success table-striped text-white">
 </table>
</div>
<form action="#"  method="post"><center><h1 style="color:black;background: -webkit-linear-gradient(rgb(255 205 45), rgb(255 87 87));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">bulletin  Sortie Par periode :</h1></center>  
<div class="row text-center mb-2" style="margin-left:15%">
<input type="date" class="form-control" name="date1" style="width:30%" value=""/>
<input type="date" class="form-control" style="width:30%"  name="date2" value=""/>
<button type="submit" style="margin-top: 10px;
       border-radius: 10px;
       margin-left:10px;
       padding-top:5px;padding-bottom:5px;background-color:#2c2815;color:white;border-radius:10px;border:0;" class="col-2 col-md-1"><i class="fa-2x fas fa-calculator"></i></button>
 
</div>
<table class="table table-striped">
 <tr class="h5">
     <td>Entreprise</td>
     <td>Montant Total TVA</td>
     <td>Montant Total HT </td>
     <td>Montant Total TTC </td>
     <td>Action</td>
 </tr>
 <tr class="h5">
    <td>test</td>
    <td>1,333.20 DH</td>
    <td>6,666.00 DH</td>
    <td>7,999.20 DH</td>
    <td><button style="border:2px solid green;border-radius:5px;padding:5px;" type="submit" name="exp"><i class="fas fa-file-excel" style="color:green"></i></button></td>
    </tr>
</table>
</form>  <script src="allFactures8.js?t=14111344"></script>


@endsection