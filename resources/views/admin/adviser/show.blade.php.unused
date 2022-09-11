@extends('layouts.layoutsidebar')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
</head>
<body>
    
</body>
</html>
                      <div class="" style="height: 500px; position:relative; top:10px;">
                        <div class="card-header elevation-1">
                            <h4 style="position: absolute; left:33%; color: dimgray; margin:auto; font-weight:normal;">ADVISER INFORMATIONS</h4>
                            <a href="{{url('advisers')}}" class="btn btn-danger btn-sm float-start text-white">Back</a>
                        </div>
                      
                      <div class="row mt-5" style="width:97%;">

                        <div class="col-md-5" style="height: 283px; overflow:hidden;">
                            <div class="position-relative">
                                <img src="/images/avatars/{{$user->avatar}}" style=" position:absolute; top:0px; width: 255px; left: 120px; height:255px;border-radius: 50%; float:left; ">
                               
                            </div>
                            <p style="position:absolute; left: 190px; top: 260px; color:black">{{$user->advisory}} </p>
                        </div>
                     
                        <div class="col-md-6 text-dark mx-auto">
                            
                         
                        
                    
                        <div class="cold-md-4" style="height: 265px; margin-left: 10px; margin-top: 10px; margin-bottom: 100px;">
                            <h2 class="text-center" style="color:dimgray; font-size:20px; font-weight: normal;">Details</h2>
                        <hr>
                    
                        <form action="{{url('update-info/'.$user->id)}}" method="POST" accept-charset="UTF-8">
                            @csrf
                            @method('PUT')
                            
                    
                            <div class="input-group mb-3">
                               <label for="" style="color:dimgray;"><span class="fas fa-user input-group-text bg-dark" style="width: 43px;"></span></label>
                               <input type="text" name="name" value="{{$user->name}}" class="form-control" readonly>
                            </div>
                    
                            <div class="input-group mb-3">
                               <label for="" style="color:dimgray;"><span class="input-group-text bg-dark" style="width: 43px;">As</span></label>
                               <input type="text" name="advisory" value="{{$user->advisory}}" class="form-control" readonly>
                               </div>
                    
                    
                               <div class="input-group mb-3">
                               <label for="" style="color:dimgray;"><span class="input-group-text bg-dark" style="width: 43px;">Pn</span></label>
                               <input type="text" name="contact_no" value="{{$user->contact_no}}" class="form-control" readonly>
                               </div>
                    
                               <div class="input-group mb-3">
                               <label for="" style="color:dimgray;"><span class="fas fa-envelope input-group-text bg-dark" style="width: 43px;"></span></label>
                                <input type="text" name="email" value="{{$user->email}}" class="form-control" readonly>
                            </div>  
                        </div>
                       </div>
                   
          
    
@endsection
