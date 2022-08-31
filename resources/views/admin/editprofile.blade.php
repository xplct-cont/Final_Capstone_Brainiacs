@extends('layouts.layoutsidebar')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
          integrity="sha512-0S+nbAYis87iX26mmj/+fWt1MmaKCv80H+Mbo+Ne7ES4I6rxswpfnC6PxmLiw33Ywj2ghbtTw0FkLbMWqh4F7Q=="
          crossorigin="anonymous"/>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css"
          integrity="sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ=="
          crossorigin="anonymous"/>

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
          integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
          crossorigin="anonymous"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
</head>

<body>
    
<div class="card elevation-4" style="width: 440px; height: 400px; margin:auto; top: 20px;">
    <div class="card-header bg-info elevation-2">
        <h5>Administrator Profile Info</h5>
    </div>
<div class="card-body">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <img src="/images/avatars/{{$user->avatar}}" style="width: 150px; height:150px; border-radius: 50%; float:left; margin-right:25px; background-color: #5bc0de; padding-top:5px; padding-left:5px; padding-right:5px; padding-bottom:5px;">
          
             <form enctype="multipart/form-data" action="/adminprofile" method="POST">   
                <label>Update Profile Image</label><br>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"><br><br>
                <div class="btv">
                <input type="submit" class="btn btn-sm btn-success" >
               <div class="table elevation-2 bg-secondary rounded" style="width: 405px; margin:auto; position:absolute; left 10px; top: -60px;">
                <div class="edit">
                    <a href="{{url('edit-info/' .$user->id)}}" class="fas fa-edit" style="color: orange;"></a>
                </div>
                
               
               <b>&nbsp;Name: &nbsp;</b>{{$user->name}} <br>
               <b>&nbsp;Advisory: &nbsp;</b>{{$user->advisory}} <br>
               <b>&nbsp;Role: &nbsp;</b>{{$user->usertype}} <br>
               <b>&nbsp;Email: &nbsp;</b>{{$user->email}} <br>
            
              

               </div>
             
               
            </form>
        </div>
      
        </div>
    </div>
 </div>
 
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"
        integrity="sha512-++c7zGcm18AhH83pOIETVReg0dr1Yn8XTRw+0bWSIWAVCAwz1s2PwnSj4z/OOyKlwSXc4RLg3nnjR22q0dhEyA=="
        crossorigin="anonymous"></script>


</body>
</html>


<style scoped>
 
     
   
    .btv {
        position: relative;
        left: 50%;
    }
    h5{
        color: white;
    }
      .edit{
        position: absolute;
        left: 380px;
    }
    label{
        position:absolute;
        top: 30px;
        font-size: 15px;
        color: dimgray;
        margin: auto;
    }
    input{
        position:absolute;
        top: 60px;
        font-size: 15px;
        color: dimgray;
        margin: auto;
    }
    .btv{
        position:relative;
        top: 150px;
        left: -10px;
        color: dimgray;
        margin: auto;
    }
   
</style>
@endsection