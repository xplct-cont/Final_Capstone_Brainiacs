@extends('layouts.layoutsidebar')

@section('content')
    <h1 class="text-dark p-2 text-center" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 25px;">Senior
        High School List of Parents/Guardian</h1>
    <div class="div d-flex justify-content-end" style="position:relative; top: -10px;">
        {{ $Students11_12->onEachSide(1)->links() }}
    </div>
    <hr>

    <div class="d-flex justify-content-center">
        <h2 class="text-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 20px;">List of
            Parents in Grade 11 and Grade 12 </h2>
    </div>


    <div class="search" style="position:relative; top: 5px;">
        <div class="" style="width:340px;">
            <form action="{{ route('shs-parents') }}" method="GET" role="search">

                <div class="input-group">
                    <span class="input-group-btn mr-2 mt-0">
                        <button class="btn btn-info" type="submit" title="Search Student Name">
                            <span class="fas fa-search"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control mr-2" name="all_students"
                        placeholder="Search All Student Name" id="all_students">
                    <a href="{{ route('shs-parents') }}" class=" mt-0">
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button" title="Refresh page">
                                <span class="fas fa-sync-alt"></span>
                            </button>
                        </span>
                    </a>
                </div>
            </form>
        </div>


        <hr>


        <div class="container col-md-10">
            <div class="d-flex justify-content-center">
                <table class="table table-sm text-dark table-borderless table-hover">

                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Parent/Guardian Name</th>
                            <th class="text-center"> Mail Parents</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Students11_12 as $Stud)
                            <tr>
                                <td>{{ $Stud->lastname }}, {{ $Stud->firstname }} {{ $Stud->middlename }}</td>
                                <td>{{ $Stud->parent_name }}</td>
                                <td class="text-center">
                                    <a href="{{ url('email_to_parent/' . $Stud->id) }}" class="btn btn-warning btn-sm "
                                        style="background: linear-gradient(to left, #4285F4  , #34A853);"><span
                                            class="fas fa-envelope"></span></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
