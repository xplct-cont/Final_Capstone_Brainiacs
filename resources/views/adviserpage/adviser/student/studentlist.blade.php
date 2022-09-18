@extends('adviserpage.app')

@section('content')
    
@if (session('status'))
<h6 class="alert alert-success"style="position: relative; margin-top:4%;">
  {{session('status')}}
</h6>
@endif


<div class="search" style="position:relative; top: 50px;" >
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




<a class="btn btn-danger mt-3 ml-3" style="" href="{{route('export_user_pdf')}}">Download PDF</a>
<a href="/export_user_excel" class=" mt-3 ml-3 btn btn-success">Export to Excel</a>

<div class="card col-md-12 d-flex justify-content-between bg-dark" style="position:relative; top:20px;">
    <div class="card-header text-secondary">
        <h4 style="position: absolute; left:38%; color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">List of Students {{Auth::user()->advisory}}</h4>
                        <img src="/images/image17.png" class="user-image img-circle elevation-2 " alt="User Image" style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
                       
   
                    </div>

        <div class="card-body bg-light" >

            <table class="table table-sm text-center">
                <thead class="bg-info">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Year/Section</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Parent's Name</th>
                    <th scope="col">Parent's Email</th>
                    <th scope="col">Parent's Contact No</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Details</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td>@mdo</td>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td><button class="btn btn-sm bg-danger fas fa-trash-alt"></button></td>
                    <td><button class="btn btn-sm bg-success fas fa-eye"></button></td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td>@mdo</td>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td><button class="btn btn-sm bg-danger fas fa-trash-alt"></button></td>
                    <td><button class="btn btn-sm bg-success fas fa-eye"></button></td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td>@mdo</td>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td>Unknown</td>
                    <td><button class="btn btn-sm bg-danger fas fa-trash-alt"></button></td>
                    <td><button class="btn btn-sm bg-success fas fa-eye"></button></td>
                  </tr>
                </tbody>
              </table>

    
    </div>



</div>








    
@endsection