@extends('layouts.layoutsidebar')

@section('content')

<div class="container">
    <div class="row">
        @if (session('status'))
                <h6 class="alert alert-success"style="position: relative; margin-top:4%;">
                  {{session('status')}}
                </h6>
                @endif
     <div class="container " style="position: relative; margin-top:3%;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header elevation-2" style="height: 60px;">
                        <h4 style="position: absolute; left:38%; color:dimgray;">Senior High Advisers</h4>
                        {{-- <a href="{{url('add-adviser')}}" class="btn btn-info float-start" >Register Adviser</a> --}}
                        <img src="/images/image17.png" class="user-image img-circle elevation-2 " alt="User Image" style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
                    </div>
                    <div class="card-body">
                       <table class="table table-hover bg-light table-sm elevation-2" style="margin:auto;">

                           <thead class="bg-info rounded">
                               <tr>
                                  
                                   <th style="text-align: center">Profile Image</th>
                                   <th style="text-align: center">Name</th>
                                   <th style="text-align: center">Advisory</th>
                                   <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">Contact No</th>
                                   <th class="d-none d-md-table-cell d-lg-table-cell d-lg-table-cell" style="text-align: center">Email</th>
                                   <th style="text-align: center">Edit</th>
                                   <th style="text-align: center">Delete</th>
                                   <th style="text-align: center">View</th>
                               </tr>
                           </thead>

                           <tbody>
                               @foreach ($user as $item)
                               <tr class="text-center" >
                                   
                                   <td><img src="{{asset('images/avatars/'.$item->avatar )}} " width="50px" height="50px" alt="Image" style="border-radius: 50%"></td>
                                   <td>{{$item->name}}</td>
                                   <td>{{$item->advisory}}</td>
                                   <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{$item->contact_no}}</td>
                                   <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{$item->email}}</td>
                                   <td><a href="{{url('edit-adviser/' .$item->id)}}" class="btn btn-warning btn-xs "><i class="fas fa-edit"></i></a></td>
                                   <td><a href="{{url('delete-adviser/'.$item->id)}}" class="btn btn-danger btn-xs "><i class="fas fa-trash"></i></a></td>
                                   <td><a href="{{url('show-adviser/'.$item->id)}}" class="btn btn-success btn-xs"><i class="fas fa-eye"></i></a></td>
                               </tr>
                               @endforeach
                           </tbody>

                       </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection
