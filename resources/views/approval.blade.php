@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header"> Your Request Has Been Sent! <i class="fas fa-check text-danger d-flex justify-content-end"></i></div>

                    <div class="card-body">
                        Your account is waiting for administrator approval.
                        <br />
                        Please check back later.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection