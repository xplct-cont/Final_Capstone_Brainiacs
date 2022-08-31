
@extends('layouts.layoutsidebar')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script> --}}

</head>
<body>
    
</body>
</html>

     <div class="container">
         <div class="row">
             <div class="col-md-6"  style="positon:relative; top:10px; margin:auto;">

                @if (session('status'))
                <h6 class="alert alert-success" style="position: relative; margin-top:4%;">
                  {{session('status')}}
                </h6>
                    
                @endif

                 <div class="card elevation-4 text-dark">
                     <div class="card-header bg-info elevation-2">
                         <h4 style="position: absolute; left:40%; color:whitesmoke; margin:auto; ">Edit Roles</h4>
                         <a href="{{url('advisers')}}" class="btn btn-danger btn-sm float-start" >Back</a>
                     </div>
                     <div class="card-body">

                        <form action="{{url('update-adviser/'.$user->id)}}"  method="POST" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                         

                          <div class="card bg-dark">
                            
                            <div class="form-group mb-1">
                                <div class="bb">
                                    <img src="{{url('/images/bbbb.png')}}" style="position:absolute; height:100%; width:100%; background-position:center; background-repeat:no-repeat; background-size: cover;  ">
                            </div>
                                <img src="{{asset('images/avatars/'.$user->avatar)}}" class="img-circle elevation-4" style="background-color:#5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px; position: relative; left: 0px; margin:auto; width:100px; height:100px; border-radius:50%;">
                                {{-- <label for="" style="color:dimgray;"></label>
                                <input type="file" name="avatar" > --}}
                            </div>
                        </div>
                            <hr>
                            <div class="form-group mb-3" >
                                <label for="" style="color:dimgray;">Role</label>
                                <input type="text" name="usertype" value="{{$user->usertype}}" class="form-control" required >
                              
                                <label for="" style="color:dimgray;">Advisory</label>
                                <input type="text" name="advisory" value="{{$user->advisory}}" class="form-control" required>

                                <label for="" style="color:dimgray;">Full Name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control" required>   
                            </div>   

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-success btn-sm float-right">Update</button>

                            </div>
                        </form>
                         
                     </div>
                 </div>
             </div>
         </div>
     </div>

     {{-- <script>
        $(function(){
            var $sections = $('.form-section');
            function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index>0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            }
            function curIndex(){
                return $sections.index($sections.filter('.current'));
            }
            $('.form-navigation .previous').click(function(){
                navigateTo(curIndex()-1);
            });
            $('.form-navigation .next').click(function(){
                $('.contact-form').parsley().whenValidate({
                        group: 'block-' + curIndex()
                }).done(function(){
                    navigateTo(curIndex()+1);
                });
            });
            $sections.each(function(index,section){
                $(section).find(':input').attr('data-parsley-group','block-'+index);
            });
            navigateTo(0);
        });
    </script>
    </body>
    </html>
    <style scoped>
        .section{
            padding-top:100px !important;
        }
        .form-section{
            padding-left:15px;
            display: none;
        }
        .form-section.current{
            display: inherit;
        }
        .btn-info, .btn-success{
            margin-top:10px;
        }
        .parsley-error-list{
            margin: 2px 0 3px;
            padding: 0;
            list-style-type:none;
            color:red;
        }
   
    </style> --}}






@endsection
