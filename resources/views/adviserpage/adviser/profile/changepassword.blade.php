@extends('adviserpage.app')

@section('content')



    <h1 class="d-flex justify-content-center" style="position:relative; top:70px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:dimgray; font-size: 20px; margin:auto;">CHANGE PASSWORD</h1><hr>
   <div class="row d-flex justify-content-center" style="position:relative; top:80px;">
    <div class="col-md-6">
        <form action="{{url('update-adviser-info/'.$user->id)}}" method="POST" accept-charset="UTF-8">
            @csrf
            @method('PUT')
    
            <div class="input-group mb-3">
               
                <span class="input-group-text bg-info text-white" style="width:39px;"><i class="fas fa-lock"></i></span>
                <input class="form-control" placeholder="Current Password" name="current_password" type="password" value="" required>
            </div>

            <div class="input-group mb-3">
               
                <span class="input-group-text bg-success text-white" style="width:39px;"><i class="fas fa-key"></i></span>
                <input class="form-control" placeholder="New Password" name="new_password" type="password"  value="" required>
            </div>

            <div class="input-group mb-3">
               
                <span class="input-group-text bg-success text-white" style="width:39px;"><i class="fas fa-key"></i></span>
                <input class="form-control" placeholder="Confirm New Password" name="new_password_confirmation" type="password"  value="" required>
            </div>
            
                  <div class="mb-3">
                   <button type="submit" class="btn btn-success float-right btn-sm"><span class="fas fa-save"></span> Save Changes</button>
                </div>
           </form>
           
    
    </div>
   </div>






@endsection