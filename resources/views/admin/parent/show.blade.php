@extends('layouts.layoutsidebar')

@section('content')
    <div class="card-header col-md-11 mx-auto mb-5" style="position: relative; top: 30px;">
        <h1 class="text-center"
            style="color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 20px; color:dimgray;">
            Send Email to Parent/Guardian of Student</h1>
        {{-- <img src="/images/image17.png" class="user-image img-circle elevation-2 " alt="User Image"
            style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;"> --}}
    </div>
    <div class="row d-flex justify-content-center text-dark">
        <div class="col-md-11 p-3 rounded bg-light">
            @if ($message = Session::get('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="container mb-0">
                <div class="row">
                    <div class="col-md-4 elevation-2 mb-1">
                        <div class="bg-light text-center text-dark">
                            <p class=" ml-2 d-flex justify-content-start text-dark">{{ $students11_12->year_section }}</p>
                            <hr>
                            <h1 class="text-dark text-center"
                                style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                           font-size:19px;">
                                Name of Student </h1>

                            <table class="table table-sm text-center">
                                <thead>
                                    <tr>
                                        <td>Lastname : {{ $students11_12->lastname }} </td>
                                    </tr>
                                    <tr>
                                        <td>Firstname : {{ $students11_12->firstname }} </td>
                                    </tr>
                                    <tr>
                                        <td>Middlename : {{ $students11_12->middlename }} </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>


                    <div class="container contact-form elevation-2 p-3">
                        <div class="contact-image">
                            <img src="https://pnggrid.com/wp-content/uploads/2021/04/Gmail-Transparent-Logo-1024x768.png"
                                style="height: 40px;" />
                        </div>
                        <form action="{{ url('/send_email_parent_admin') }}" method="POST">
                            @csrf

                            <div class="d-flex justify-content-center">
                                <h3 class="" style="font-size: 20px; ">Name of Parent/Guardian:
                                    {{ $students11_12->parent_name }} </h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email To:</label>
                                        <input type="text" name="parent_email" class="form-control"
                                            value="{{ $students11_12->parent_email }}" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="">To:</label>
                                        <input type="text" name="parent_name" class="form-control"
                                            value="{{ $students11_12->parent_name }}" required />
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button class="btn btn-success"> <span class="fas fa-envelope"></span> Send
                                            Email</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Content:</label>
                                        <textarea name="content" class="form-control" placeholder="Write something here..." required
                                            style="width: 100%; height: 150px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
