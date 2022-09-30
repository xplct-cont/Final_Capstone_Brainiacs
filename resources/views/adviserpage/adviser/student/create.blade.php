@extends('adviserpage.app')

@section('content')
    


<div class="row d-flex justify-content-center text-dark">
    <div class="col-md-8 elevation-2 rounded mt-1 bg-light" style="position:relative; top: 30px;">
        @if (session('status'))
         <h6 class="alert alert-success">
           {{session('status')}}
         </h6>
    @endif
        <div class="card-header elevation-1">
        <h1 style="position: absolute; left:38%; color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 20px; color:dimgray;">ADD NEW STUDENT</h1>
        <img src="/images/image17.png" class="user-image img-circle elevation-2 " alt="User Image" style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
    </div>
        <form action="{{url('/students')}}" method="POST" >
            @csrf
            
               
    <div class="input-group mb-3 mt-4">
       <label for="" style="color:dimgray;"><span class=" input-group-text bg-secondary" style="width: 43px;">Ln</span></label>
       <input type="text" name="lastname"  class="form-control" placeholder="Enter Last Name" required>
    </div>

    <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Fn</span></label>
       <input type="text" name="firstname"  class="form-control" placeholder="Enter First Name" required>
       </div>


       <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Y/S</span></label>
       <input type="text" name="year_section"  class="form-control" placeholder="Enter Year/Section" required>
       </div>

       <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="fas fa-envelope input-group-text bg-secondary" style="width: 43px;"></span></label>
        <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
    </div>

    <div class="input-group mb-3">
        <label for="" style="color:dimgray;"><span class=" input-group-text bg-secondary" style="width: 43px;">Ad</span></label>
        <input type="text" name="address"  class="form-control" placeholder="Enter Address" required>
        </div>
             

                <div class="form-group mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success"><span class="fas fa-save"></span> Save</button>

                </div>

           </form>
            
    </div>
</div>



@endsection