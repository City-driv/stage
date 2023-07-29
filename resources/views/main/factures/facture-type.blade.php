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
             <a href="/facture/create?t=F&Ex=1" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a target="_blank" href="{{asset('imgs/facts/e1.PNG')}}" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=F&Ex=1" ><img src="{{asset('imgs/facts/e1.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
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
             <a href="/facture/create?t=F&Ex=2" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e2.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=F&Ex=2" ><img src="{{asset('imgs/facts/e2.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>    
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
              <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=F&Ex=3" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e3.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=F&Ex=3" ><img src="{{asset('imgs/facts/e3.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
           <button style="margin-left:3px; " class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=F&Ex=4" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e4.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=F&Ex=4" ><img src="{{asset('imgs/facts/e4.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
              <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=F&Ex=5" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e5.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=F&Ex=5" ><img src="{{asset('imgs/facts/e5.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>    
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
              <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=F&Ex=6" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e6.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=F&Ex=6" ><img src="{{asset('imgs/facts/e6.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
           <button style="margin-left:3px; " class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=F&Ex=7" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button  class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e7.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=F&Ex=7" ><img src="{{asset('imgs/facts/e7.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
                <button style="margin-left:3px;"  class="btn btn-primary  mb-2" type="submit">
                     <a href="/facture/create?t=F&Ex=8" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a>
            </button>
            <button  class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e8.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
            <a href="/facture/create?t=F&Ex=8" ><img src="{{asset('imgs/facts/e8.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
      
      <div class="col-md-4 col-12  a mt-2 border rounded-start border-warning">
             <button style="margin-left:3px;" class="btn btn-primary  mb-2" type="submit">
             <a href="/facture/create?t=F&Ex=9" style="text-decoration:none;color:white"><i class="far fa-hand-pointer"></i> Choisier</a></button>
             <button  class="btn btn-primary  mb-2" type="submit">
             <a href="{{asset('imgs/facts/e9.PNG')}}" target="_blank" style="text-decoration:none;color:white">
               <i class="fas fa-eye"></i> Aperçu
             </a>
             </button> 
             <a href="/facture/create?t=F&Ex=9" ><img src="{{asset('imgs/facts/e9.PNG')}}" class="img-fluid rounded-start" alt="..."></a>
      </div>
     
    </div>
    </div>

@endsection