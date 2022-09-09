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

     <div class="container">
         <div class="row">
             <div class="col-md-7"  style="positon:relative; top:10px; margin:auto;">

                 <div class="card elevation-2" style="height: 500px;">
                     <div class="card-header bg-dark elevation-2">
                         <h4 style="position: absolute; left:33%; color:whitesmoke; margin:auto; font-weight:normal;">Adviser Informations</h4>
                         <a href="{{url('advisers')}}" class="btn btn-danger btn-sm float-start text-white">Back</a>
                     </div>
                     <div class="card-body">

                        <form action="{{url('show-adviser/'.$user->id)}}" method="GET" enctype="multipart/form-data">
                         @csrf
                         @method('GET')
                         
                         <div class="bb">
                                <img src="{{url('/images/bbbb.png')}}" style="position:relative; height:100px; width:100%; background-position:center; background-repeat:no-repeat; background-size: cover;  ">
                            </div>
                            <h1 class="text-center" style="position:relative; top:-90px; font-size: 20px; margin:auto;">Pangangan National High School</h1>
                            <h2 class="text-center" style="position:relative; top:-80px; font-size: 17px; margin:auto; color:whitesmoke;">Talisay, Calape, Bohol</h2>
                            <h5 class="text-center text-dark" style="margin:auto; position:relative; top:-42px; font-size: 18px;">School ID: 302882</h5>
               
                               
                                 <div class="card elevation-4 bg-dark" style="height: 270px; margin-top:-40px;">
                                    <img src="{{asset('images/avatars/'.$user->avatar)}}" class="img-circle elevation-4" style="position:relative; left: 20px; top: 10px; width:100px; height:100px; border-radius:50%;  background-color:#5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;"><br>
                                 <p style="color: 	#F5FFFA; position: relative; font-size: 16px; margin-left:20px; top: 20px;" >Name:&nbsp;&nbsp;{{$user->name}}</p>
                                 <p style="color: 	#F5FFFA; position: relative;  font-size: 16px; margin-left:20px; top: 2px;" >Advisory:&nbsp;&nbsp;{{$user->advisory}}</p>
                                 <p style="color: 	#F5FFFA; position: relative;  font-size: 16px; margin-left:20px; top: -15px;" >Contact No:&nbsp;&nbsp;{{$user->contact_no}}</p>
                                 <p style="color: 	#F5FFFA; position: relative;  font-size: 16px; margin-left:20px; top: -33px;" >Email:&nbsp;&nbsp;{{$user->email}}</p>
                                 
        
                                </div>
                        
                        </div>
                        </form>
                         
                        
                     </div>
                 </div>
             </div>
         </div>
     </div>








@endsection