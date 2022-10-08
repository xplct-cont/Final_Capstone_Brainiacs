@extends('adviserpage.app')

@section('content')

<div class="container d-flex justify-content-center" style="position:relative; top: 10px;">
<div class="card p-3 col-md-8 ">
    <div class="card-header">
        <h1 class="text-center" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin:auto; font-size: 25px; color:dimgray;">EDIT STUDENT INFORMATIONS</h1>
    </div><hr>
    
<form action="{{url('update-my-student/'.$student->id)}}" method="POST" accept-charset="UTF-8">
    @csrf
    @method('PUT')
    

    <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="fas fa-user input-group-text bg-secondary" style="width: 43px;"></span></label>
       <input type="text" name="firstname" value="{{$student->firstname}}" class="form-control" required>
    </div>

    <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">As</span></label>
       <input type="text" name="lastname" value="{{$student->lastname}}" class="form-control" required>
       </div>

    <div class="input-group mb-3">
        <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Mn</span></label>
        <input type="text" name="middlename" value="{{$student->middlename}}" class="form-control" required>
        </div>

       <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Pn</span></label>
       <input type="text" name="year_section" value="{{$student->year_section}}" class="form-control" readonly>
       </div>

       <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="fas fa-envelope input-group-text bg-secondary" style="width: 43px;"></span></label>
        <input type="email" name="email" value="{{$student->email}}" class="form-control" required>
    </div>

    <div class="input-group mb-3">
        <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Pn</span></label>
        <input type="text" name="parent_name" value="{{$student->parent_name}}" class="form-control" required>
        </div>

    <div class="input-group mb-3">
        <label for="" style="color:dimgray;"><span class="fas fa-envelope input-group-text bg-secondary" style="width: 43px;"></span></label>
        <input type="email" name="parent_email" value="{{$student->parent_email}}" class="form-control">
        </div>

    <div class="input-group mb-3">
        <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Ad</span></label>
        <input type="text" name="address" value="{{$student->address}}" class="form-control" required>
        </div>

        <div class="mx-auto" style="width: 200px;">
            <select name="gender" class="form-control" required>
                <option hidden="true"></option>
                <option selected disabled>Select Gender</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
               </select>
            </div> 
              

          <div class="mb-3">
           <button type="submit" class="btn btn-success float-right btn-sm"><span class="fas fa-save"></span> Save Changes</button>

        </div>
   </form>
</div>
</div>
@endsection