@extends('layouts.layoutsidebar')

@section('content')
<div class="p-1">
    <a class="fas fa-arrow-left" style="font-size:20px; color:blue;" href="{{ url('show-student-charity/' . $student_cha->id)}}"></a>
</div>
    <h1 class="text-dark p-3"
        style="font-weight:normal; font-size: 25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; ">
        Personality Test Result of {{ $student_cha->lastname }}, {{ $student_cha->firstname }} from
        {{ $student_cha->year_section }}</h1>
    <hr>

    @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="container" style="">
        <div class="">
            <div class="">
                <h1 class="text-dark "
                    style="font-weight:normal; font-size: 25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; ">
                </h1>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <span class="fas fa-upload"></span> Upload Record
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-light" style="font-weight:400" id="exampleModalLabel">Upload
                                        here...</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-secondary text-center">

                                    <form action="{{ url('/upload_personality_result_charity') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="">
                                            <label for=""></label>
                                            <input type="file" name="personality_result">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="d-flex justify-content-start"
                                                style="color:dimgray">User ID</label>
                                            <input type="text" style="width:50px;" name="student_id"
                                                class="form-control text-center" value="{{ $student_cha->id }}" readonly>
                                        </div>
                                        <button type="submit" class="btn btn-primary "><span class="fas fa-save"></span>
                                            Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                @forelse ($personality_test_result_charity as $personal_cha)
                    <a href="{{ url('delete_personality_test_result_charity/' . $personal_cha->id) }}"
                        class="btn btn-sm btn-danger mb-1"><i class="text-light fas fa-trash"></i> Delete</a>
                    <a href="{{ route('download_personality_test_result_charity', $personal_cha->id) }}"
                        class="btn btn-sm btn-primary mb-1"><i class="text-light fas fa-download"></i> Download </a>
                    <img src="{{ asset('storage/personality_test_result/' . $personal_cha->personality_result) }} "
                        alt="Image" style="height: 100%; width: 100%;" class="elevation-4 mb-5">
                @empty
                    <tr>
                        <p colspan="5" class="text-dark"><span class="fas fa-exclamation-circle text-danger"></span>
                            Empty Personality Test Result!</p>
                    </tr>
                @endforelse
            </div>
        </div>
    </div>


    <style scoped>
        td {
            border: solid 1px #5bc0de;
            border-style: none solid solid none;
            padding: 5px;
        }
    </style>
@endsection
