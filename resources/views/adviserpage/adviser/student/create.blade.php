@extends('adviserpage.app')

@section('content')
    


<div class="row d-flex justify-content-center text-dark">
    <div class="col-md-7 elevation-2 rounded mt-1 bg-light">
        @if (session('status'))
         <h6 class="alert alert-success"style="position: relative; margin-top:4%;">
           {{session('status')}}
         </h6>
    @endif
        <div class="card-header elevation-1">
        <h1 style="position: absolute; left:34%; color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 20px; color:dimgray;">ADD NEW STUDENT</h1>
        <img src="/images/image17.png" class="user-image img-circle elevation-2 " alt="User Image" style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
    </div>
        <form action="{{url('/students')}}" method="POST" >
            @csrf
            
               
               <div class="form-group mb-3">
                   <label for="">Last Name</label>
                   <input type="text" name="lastname" class="form-control" required>
               </div>
               <div class="form-group mb-3">
                   <label for="">First Name</label>
                   <input type="text" name="firstname" class="form-control"  required>
               </div>
               <div class="form-group mb-3">
                   <label for="">Year/Section</label>
                   <input type="text" name="year_section" class="form-control" required>
               </div>
               <div class="form-group mb-3">
                   <label for="">Email</label>
                   <input type="email" name="email" class="form-control" required>
               </div>
               <div class="form-group mb-3">
                   <label for="">Address</label>
                   <input type="text" name="address" class="form-control" required>
               </div>

                <div class="form-group mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success"><span class="fas fa-save"></span> Save</button>

                </div>

           </form>
            
    </div>
</div>



@endsection