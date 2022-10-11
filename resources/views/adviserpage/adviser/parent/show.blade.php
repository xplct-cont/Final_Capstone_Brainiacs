@extends('adviserpage.app')

@section('content')
<div class="card-header col-md-11 mx-auto mb-5 elevation-1" style="position: relative; top: 30px;">
    <h1
        style="position: absolute; left:30%; color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 20px; color:dimgray;">
        Send Email to Parent/Guardian of Student</h1>
    <img src="/images/image17.png" class="user-image img-circle elevation-2 " alt="User Image"
        style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
</div>
<div class="row d-flex justify-content-center text-dark">
    <div class="col-md-11 p-3 rounded bg-light">
        @if (session('status'))
            <h6 class="alert alert-success">
                {{ session('status') }}
            </h6>
        @endif
        <div class="container mb-0">
            <div class="row">
                <div class="col-md-4">
                    <div class="bg-dark text-center text-light">
                        <p class="mt-1 ml-2 d-flex justify-content-start">{{ $parentLists->year_section }}</p>
                        <hr>
                        <h1 class="text-light text-center"
                            style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                       font-size:19px;">
                            Name of Student </h1>

                        <table class="table table-sm text-center">
                            <thead>
                                <tr>
                                    <td>Lastname : {{ $parentLists->lastname }} </td>
                                </tr>
                                <tr>
                                    <td>Firstname : {{ $parentLists->firstname }} </td>
                                </tr>
                                <tr>
                                    <td>Middlename : {{ $parentLists->middlename }} </td>
                                </tr>

                            </thead>
                        </table>
                    </div>

                </div>
                <div class="col-md-6 text-center shadow-lg rounded text-dark bg-dark " style="margin:auto;">

                    <div class="card">
                        <div class="card-header bg-dark text-light">
                            Name of Parent : {{ $parentLists->parent_name }}
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/send') }}" method="POST">
                                @csrf

                                <div class="mb-3 text-dark">
                                    <label for="">Email To:</label>
                                    <input type="parent_email" name="parent_email" class="form-control text-center"
                                        value="{{ $parentLists->parent_email }}" required>
                                </div>

                                <div class="mb-3 text-dark">
                                    <label for="">Subject:</label>
                                    <input type="subject" name="subject" class="form-control">
                                </div>

                                <div class="mb-3 text-dark">
                                    <label for="">Content:</label>
                                    <textarea type="content" name="content" class="form-control" style="height:200px;" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-sm btn-success">Send Email &nbsp;<span
                                        class="fas fa-envelope"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
