@extends('layouts.layoutsidebar')

@section('content')

<div class="search" style="position:relative; top: 50px;" >
    <div class="mx-auto" style="width:340px;">
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


    <div class="container text-dark" style="margin:auto; position:relative; top: 30px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-dark">
                    <div class="card-header d-flex justify-content-start">Pending Approval Requests <span class="fas fa-exclamation-triangle mt-1 ml-1 text-danger" style="font-size:20px;"></span></div>

                    <div class="card-body">

                        {{-- @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif --}}
                        @if ($message = Session::get('status'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>	
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <table class="table table-sm text-center">
                            <tr class="bg-danger">
                                <th>Remove</th>
                                <th>Full Name</th>
                                {{-- <th>Role</th> --}}
                                <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Advisory</th>
                                <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Email</th>
                                <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Registered at</th>
                                <th>Email Verification Status</th>
                                <th>Approve</th>
                               
                            </tr>
                            @forelse ($users as $user)
                                <tr>
                                    <td><a href="{{ route('admin.users.destroy', $user->id) }}"
                                        class="btn btn-danger btn-sm" style="margin-top: 1px;"><span class="fas fa-trash-alt"></span></a></td>
                                    <td>{{ $user->name }}</td>
                                    <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{$user->advisory}}</td>
                                    <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{ $user->email }}</td>
                                    <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{ $user->created_at }}</td>
                                    <td>{{ $user->email_verified_at ? 'Verified' : 'Not Verified' }}</td>
                                    <td> <a href="{{ route('admin.users.approve', $user->id) }}"
                                        class="btn btn-success btn-sm" style="margin-top: 1px;;"><span class="fas fa-check"></span></a></td></td>
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No requests found.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection