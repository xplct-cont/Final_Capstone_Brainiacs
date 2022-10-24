@extends('layouts.layoutsidebar')

@section('content')
    
<div class="row d-flex justify-content-center text-dark">
    <div class="col-md-8 p-2 rounded bg-light">
        @if (session('status'))
         <h6 class="alert alert-success">
           {{session('status')}}
         </h6>
    @endif
        <div class="card-header elevation-1">
        <h1 style="position: absolute; left:32%; color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 20px; color:dimgray;"> {{$faithStudents->firstname}} {{$faithStudents->lastname}}</h1>
        <img src="/images/image17.png" class="user-image img-circle elevation-2 " alt="User Image" style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
    </div>
        <form action="{{url('update-faith-student/'.$faithStudents->id)}}" method="POST" accept-charset="UTF-8" >
            @csrf
            @method('PUT')
               
    <div class="input-group mb-3 mt-4">
       <label for="" style="color:dimgray;"><span class=" input-group-text bg-secondary" style="width: 43px;">Ln</span></label>
       <input type="text" name="lastname"  class="form-control" value="{{$faithStudents->lastname}}" required>
    </div>

    <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Fn</span></label>
       <input type="text" name="firstname"  class="form-control" value="{{$faithStudents->firstname}}" required>
       </div>

       <div class="input-group mb-3">
        <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Mn</span></label>
        <input type="text" name="middlename"  class="form-control" value="{{$faithStudents->middlename}}" required>
        </div>


       <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Y/S</span></label>
       <input type="text" name="year_section"  class="form-control" value="{{$faithStudents->year_section}}" required>
       </div>

       <div class="input-group mb-3">
        <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary"
                style="width: 43px;">AG</span></label>
        <input type="text" name="age" class="form-control" value="{{ $faithStudents->age }}" required>
    </div>


       <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="fas fa-envelope input-group-text bg-secondary" style="width: 43px;"></span></label>
        <input type="email" name="email" class="form-control" value="{{$faithStudents->email}}" required>
    </div>

    <div class="input-group mb-3">
        <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Pn</span></label>
        <input type="text" name="parent_name"  class="form-control" value="{{$faithStudents->parent_name}}" required>
        </div>

    <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="fas fa-envelope input-group-text bg-secondary" style="width: 43px;"></span></label>
       <input type="email" name="parent_email"  class="form-control" value="{{$faithStudents->parent_email}}">
       </div>

    <div class="input-group mb-3">
        <label for="" style="color:dimgray;"><span class=" input-group-text bg-secondary" style="width: 43px;">Ad</span></label>
        <input type="text" name="address"  class="form-control" value="{{$faithStudents->address}}" required>
        </div>

        <div class="form-group text-dark d-flex justify-content-center">
            <div class="maxl">
                <label class="radio inline mr-5">
                    <input type="radio" name="gender" value="Male" {{ ($faithStudents->gender == 'Male' ? ' checked' : 'Unchecked') }}>
                    <span>Male</span>
                </label>
                <label class="radio inline">
                    <input type="radio" name="gender" value="Female"  {{ ($faithStudents->gender == 'Female' ? ' checked' : 'Unchecked') }}>
                    <span>Female</span>
                </label>
            </div>
        </div>

                <div class="form-group mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success"><span class="fas fa-save"></span> Save Changes</button>

                </div>

           </form>
            
    </div>
</div>


@endsection