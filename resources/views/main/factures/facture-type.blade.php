@extends('layouts.userNav')
@section('title','WORFAC: facture create')
@section('content')
<style>
    .a{
        border: 2px solid #FCB742;
        border-radius:10px;
        box-shadow:5px 10px 20px #FCB742 inset 
    }
    *{
      overflow-x: hidden;
    }
  </style>
<div class="container">
    <div class="row">
      <label for="" class="col-12 fs-1">Choisier votre Facture preferé:</label>
       <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
             <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a 
             href="facture.php?type=Facture&Example=3" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a target="_blank" href="{{asset('imgs/facts/e11f.PNG')}}" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="facture.php?type=Facture&Example=11" ><img src="{{asset('imgs/facts/e11f.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      <div 
      style="display:none;"      class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
             <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a 
              style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button  class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e12f.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a   ><img src="{{asset('imgs/facts/e12f.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
              <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="facture.php?type=Facture&Example=5" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e5f.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="facture.php?type=Facture&Example=5" ><img src="{{asset('imgs/facts/e5f.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>    
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
              <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="facture.php?type=Facture&Example=4" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e4f.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="facture.php?type=Facture&Example=4" ><img src="{{asset('imgs/facts/e4f.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
           <button style="margin-left:3px; " class="btn btn-primary  mb-2" type="submit">
             <a href="facture.php?type=Facture&Example=2" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e2f.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="facture.php?type=Facture&Example=2" ><img src="{{asset('imgs/facts/e2f.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      
  <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
              <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="facture.php?type=Facture&Example=6" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e6f.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="facture.php?type=Facture&Example=6" ><img src="{{asset('imgs/facts/e6f.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>    
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
              <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="facture.php?type=Facture&Example=7" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e7f.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="facture.php?type=Facture&Example=7" ><img src="{{asset('imgs/facts/e7f.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
           <button style="margin-left:3px; " class="btn btn-primary  mb-2" type="submit">
             <a href="facture.php?type=Facture&Example=8" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button  class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e8f.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="facture.php?type=Facture&Example=8" ><img src="{{asset('imgs/facts/e8f.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
                <button style="margin-left:3px;"  class="btn btn-primary  mb-2" type="submit">
                     <a href="facture.php?type=Facture&Example=9" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a>
            </button>
            <button  class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e9f.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
            <a href="facture.php?type=Facture&Example=9" ><img src="{{asset('imgs/facts/e9f.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
             <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="facture.php?type=Facture&Example=3" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button  class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e10f.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="facture.php?type=Facture&Example=10" ><img src="{{asset('imgs/facts/e10f.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
     
    </div>
    </div>

@endsection