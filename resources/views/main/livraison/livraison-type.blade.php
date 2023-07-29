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
      <label for="" class="col-12 fs-1">Choisier votre BON LIVRAISON preferé:</label>
       <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
             <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=bl&Ex=1" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a target="_blank" href="{{asset('imgs/facts/bl1.PNG')}}" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=bl&Ex=1" ><img src="{{asset('imgs/facts/bl1.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      {{-- <div style="display:none;" class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
             <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a 
              style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button  class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e12f.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a   ><img src="{{asset('imgs/facts/e12f.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div> --}}
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
              <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=bl&Ex=2" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/bl2.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=bl&Ex=2" ><img src="{{asset('imgs/facts/bl2.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>    
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
              <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=bl&Ex=3" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/bl3.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=bl&Ex=3" ><img src="{{asset('imgs/facts/bl3.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
           <button style="margin-left:3px; " class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=bl&Ex=4" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/bl4.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=bl&Ex=4" ><img src="{{asset('imgs/facts/bl4.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
              <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=bl&Ex=5" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/bl5.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=bl&Ex=5" ><img src="{{asset('imgs/facts/bl5.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>    
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
              <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=bl&Ex=6" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/bl6.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=bl&Ex=6" ><img src="{{asset('imgs/facts/bl6.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
           <button style="margin-left:3px; " class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=bl&Ex=7" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button  class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/bl7.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=bl&Ex=7" ><img src="{{asset('imgs/facts/bl7.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
                <button style="margin-left:3px;"  class="btn btn-primary  mb-2" type="submit">
                     <a href="/facture/create?t=bl&Ex=8" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a>
            </button>
            <button  class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/bl8.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
            <a href="/facture/create?t=bl&Ex=8" ><img src="{{asset('imgs/facts/bl8.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
             <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=bl&Ex=9" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button  class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/bl9.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=bl&Ex=9" ><img src="{{asset('imgs/facts/bl9.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
     
    </div>
    </div>

@endsection