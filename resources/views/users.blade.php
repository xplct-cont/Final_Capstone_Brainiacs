@extends('layouts.layoutsidebar')

@section('content')
    <div class="container text-dark" style="margin:auto; position:relative; top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card elevation-2">
                    <div class="card-header d-flex justify-content-start elevation-2">Pending Request Approval</div>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table table-sm text-center table-striped">
                            <tr class="bg-info">
                                <th>Full Name</th>
                                <th>Role</th>
                                <th>Advisory</th>
                                <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Email</th>
                                <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Registered at</th>
                                <th>...</th>
                            </tr>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{$user->usertype}}</td>
                                    <td>{{$user->advisory}}</td>
                                    <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{ $user->email }}</td>
                                    <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{ $user->created_at }}</td>
                                    <td><a href="{{ route('admin.users.approve', $user->id) }}"
                                           class="btn btn-success btn-sm" style="margin-top: 30px;">Approve</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No requests found.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection