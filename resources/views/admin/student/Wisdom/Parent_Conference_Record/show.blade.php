@extends('layouts.layoutsidebar')

@section('content')
<div class="p-1">
    <a class="fas fa-arrow-left" style="font-size:20px; color:blue;" href="{{ url('show-student-wisdom/' . $student_wisd->student->id . '/parent_conference_record_wisdom') }}"></a>
</div>
    @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="row d-flex justify-content-center text-dark">
        <div class="col-md-11 elevation-4 p-3 rounded  mt-5 bg-light mb-3">

            <div class="d-flex justify-content-end">

                <a class="btn btn-danger mt-2 ml-2 mr-2" style=""
        href="{{ route('export_wisdomStudents_parent_conference_record_pdf', $student_wisd->id) }}"><span class="fas fa-file-pdf"
            style="font-size: 15px;"></span> Generate PDF</a>

            </div>
            <div class="d-flex justify-content-center">
                <img src="/images/image17.png" class="user-image img-circle elevation-2 "
                    alt="User Image"
                    style="width: 120px; height:120px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
            </div>
            <div class="container mx-auto">

                <form action="{{ url('update_parent_conference_record_wisdom/' . $student_wisd->id) }}" method="POST" accept-charset="UTF-8">
                    @csrf
                    @method('PUT')

                <h1 class="text-center mt-4"
                    style=" color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 22px; color:rgba(60, 58, 58, 0.904);">
                    Pangangan National High School </h1>
                <p class="text-center" style="font-weight:bold; font-size: 20px; color:rgba(60, 58, 58, 0.904);">Guidance
                    Office</p>
                <p class="text-center text-dark" style="position: relative; top: -15px;">Talisay, Calape, Bohol</p>


                <p class="text-center text-dark" style="font-size: 18px; font-weight: 500; color:rgba(60, 58, 58, 0.904); ">
                    Parent/Guardian Conference Record</p>
                <hr>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group ">
                            <label for="" style="color:dimgray">Student Name: </label>
                            <input type="text" class="form-control" value="{{ $student_wisd->student->firstname }} {{ $student_wisd->student->middlename }} {{ $student_wisd->student->lastname }}" readonly>   
                        </div>


                        <div class="form-group">
                            <label for="" style="color:dimgray">Year/Section: </label>
                            <input type="text" class="form-control" value="{{ $student_wisd->student->year_section }}" readonly>
                        </div>

                        <div class="form-group ">
                            <label for="" style="color:dimgray">Parent/Guardian's Name: </label>
                            <input type="text" class="form-control" value="{{ $student_wisd->student->parent_name }}" readonly>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="" style="color:dimgray">Age: </label>
                            <input type="text" class="form-control" value="{{ $student_wisd->student->age }}" readonly>
                        </div>

                        <div class="form-group ">
                            <label for="" style="color:dimgray">Date: </label>
                            <input type="text" class="form-control" value="{{ $student_wisd->date->format('F d,  Y ') }}" readonly>
                        </div>

                        <div class="form-group ">
                            <label for="" style="color:dimgray">Relation to Student: </label>
                            <input type="text" class="form-control" name="relation_to_student" value="{{ $student_wisd->relation_to_student}}">
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Reason for Contact: </label>
                                <input type="text" class="form-control" name="reason_for_contact" value="{{ $student_wisd->reason_for_contact}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Inquiries/Referral/Appointment:</label>          
                                <input type="text" class="form-control" name="inquiries_referral_appointment" value="{{ $student_wisd->inquiries_referral_appointment}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3 mt-2">
                     
                        <hr>

                        <label for="" style="color:dimgray;">Problem/Concern</label>
                        <textarea style="border: solid 1px dimgray; height: 120px;" id="" type="text" class="form-control"
                            placeholder="" title="" name="problem_concern">{{ $student_wisd->problem_concern }}</textarea>
                        <br>
                        <label for="" style="color:dimgray;">Topics Discussed</label>
                        <textarea style="border: solid 1px dimgray; height: 120px;" id="" type="text" class="form-control"
                            placeholder="" title="" name="topics_discussed">{{ $student_wisd->topics_discussed }}</textarea>
                        <br>
                        <label for="" style="color:dimgray;">Suggested Resolution</label>
                        <textarea style="border: solid 1px dimgray; height: 120px;" id="" type="text" class="form-control"
                            placeholder="" title="" name="suggested_resolution">{{ $student_wisd->suggested_resolution }}</textarea>
                        <br>

                        <div class="form-group text-center ">
                           <div class="col-md-2">
                            <label for="" style="color:dimgray">Action Taken: </label>
                            <input type="text" class="form-control" name="action_taken" value="{{ $student_wisd->action_taken}}">
                           </div>
                        </div>

                        <p class="text-dark mt-2">Note: <i class="text-dark">Information revealed is held strictly
                                CONFIDENTIAL.</i></p>
                        <br>
                        <label for="" style="color:dimgray">Student ID </label>
                            <input type="text" class="form-control text-center" style="width: 45px;" name="student_id" value="{{ $student_wisd->student_id}}" readonly>

                        <p class="text-dark d-flex justify-content-end">_________________________________________
                        </p>
                        <p class="text-dark d-flex justify-content-end" style=" margin-top: -20px;">
                            Designated Guidance Counselor's Name and Signature</p>
                    </div>
                </div>
                <button class="btn-primary btn btn-sm"><span class="fas fa-save"></span> Submit Changes</button>
            </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
