@extends('adviserpage.app')

@section('content')
    
<div>
  @if (session('status'))
<h6 class="alert alert-success">
  {{session('status')}}
</h6>
@endif
</div>


<div class="search" style="position:relative; top: 5px;" >
    <div class="mx-auto" style="width:400px;">
    <form action="{{route('users')}}" method="GET" role="search">

        <div class="input-group">
            <span class="input-group-btn mr-2 mt-0">
                <button class="btn btn-info" type="submit" title="Search Full Name">
                    <span class="fas fa-search"></span>
                </button>
            </span>
            <input type="text" class="form-control mr-2" name="term" placeholder="Search Full Name" id="term">
            <a href="{{route('users')}}" class=" mt-0">
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="button" title="Refresh page">
                        <span class="fas fa-sync-alt"></span>
                    </button>
                </span>
            </a>
        </div>
    </form>
</div>




<a class="btn btn-danger mt-2 ml-3" style="" href="{{route('export_user_pdf')}}">Download PDF</a>
<a href="/export_user_excel" class=" mt-2 ml-3 btn btn-success">Export to Excel</a>

<div class="d-flex justify-content-end" style="position: relative;top:-38px;">
  <a href="{{url('/students/create')}}" class="btn btn-primary"><span class="fas fa-user-graduate mr-1"></span>
      Add New Student
  </a>
</div>

<div class="card col-md-12 d-flex justify-content-between bg-dark" style="position:relative; top: -32px;">
    <div class="card-header text-secondary">
        <h4 style="position: absolute; left:38%; color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 20px;">{{Auth::user()->advisory}} Students</h4>
                        <img src="/images/image17.png" class="user-image img-circle elevation-2 " alt="User Image" style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
                  
                    </div>

        <div class="card-body bg-light" >

            <table class="table table-sm text-center elevation-3">
                <thead class="bg-info">
                  <tr>
                    
                    <th scope="col">View</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">Year/Section</th>
                    <th scope="col" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($myStudents as $student)
                  <tr class="text-center">
                    
                    <td><a href="{{url('/students/show/'.$student->id)}}" class="btn btn-success btn-xs "><i class="fas fa-eye"></i></a></td>
                    <td>{{$student->lastname}}</td>
                    <td>{{$student->firstname}}</td>
                    <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">{{$student->year_section}}</td>
                    <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">{{$student->email}}</td>
                    <td>{{$student->address}}</td>
                    <td><a href="{{url('/students/edit/' .$student->id)}}" class="btn btn-warning btn-xs "><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{url('delete-student/'.$student->id)}}" class="btn btn-danger btn-xs "><i class="fas fa-trash-alt"></i></a></td>
                  </tr>
                      
                  @endforeach
                 
                </tbody>
              </table>
              <div class="div d-flex justify-content-center mt-3">
                {{$myStudents->onEachSide(1)->links()}}
               </div>

    
    </div>



</div>








    
@endsection