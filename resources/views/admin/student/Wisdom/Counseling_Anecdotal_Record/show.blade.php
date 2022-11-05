@extends('layouts.layoutsidebar')

@section('content')
<div class="p-1">
    <a class="fas fa-arrow-left" style="font-size:20px; color:blue;" href="{{ url('show-student-wisdom/' . $student_wisd->student->id . '/counseling_anecdotal_record_wisdom') }}"></a>
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
        href="{{ route('export_wisdomStudents_counseling_anecdotal_pdf', $student_wisd->id) }}"><span class="fas fa-file-pdf"
            style="font-size: 15px;"></span> Generate PDF</a>
            </div>
            <div class="d-flex justify-content-center">
                <img src="/images/image17.png" class="user-image img-circle elevation-2 "
                    alt="User Image"
                    style="width: 120px; height:120px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
            </div>
            <div class="container mx-auto">

                <form action="{{ url('update_counseling_anecdotal_record_wisdom/' . $student_wisd->id) }}" method="POST" accept-charset="UTF-8">
                    @csrf
                    @method('PUT')

                <h1 class="text-center mt-4"
                    style=" color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 22px; color:rgba(60, 58, 58, 0.904);">
                    Pangangan National High School </h1>
                <p class="text-center" style="font-weight:bold; font-size: 20px; color:rgba(60, 58, 58, 0.904);">Guidance
                    Office</p>
                <p class="text-center text-dark" style="position: relative; top: -15px;">Talisay, Calape, Bohol</p>


                <p class="text-center text-dark" style="font-size: 18px; font-weight: 500; color:rgba(60, 58, 58, 0.904); ">
                    Counseling Anecdotal Record</p>
                <p class="text-center text-dark">
                    <i class="text-dark"
                        style="font-size: 15px; position: relative; top: -15px; font-weight: 500; color:rgba(60, 58, 58, 0.904); ">(Confidential)</i>
                </p>
                <hr>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group ">
                            <label for="" style="color:dimgray">Name: </label>
                            <input type="text" class="form-control" value="{{ $student_wisd->student->firstname }} {{ $student_wisd->student->middlename }} {{ $student_wisd->student->lastname }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label for="" style="color:dimgray">Gender: </label>
                            <input type="text" class="form-control" value="{{ $student_wisd->student->gender }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label for="" style="color:dimgray">Date/Time Called: </label>
                            <input type="text" class="form-control" value="{{ $student_wisd->date_time_called->format('F d,  Y - g:i A') }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label for="" style="color:dimgray">Reason/s for Contact: </label>
                            <input type="text" class="form-control" name="reasons_for_contact" value="{{ $student_wisd->reasons_for_contact}}">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group ">
                            <label for="" style="color:dimgray">Age: </label>
                            <input type="text" class="form-control" value="{{ $student_wisd->student->age}}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label for="" style="color:dimgray">Year/Section: </label>
                            <input type="text" class="form-control" value="{{ $student_wisd->student->year_section}}" readonly>
                          
                        </div>

                        <div class="form-group mt-3">
                            <label for="" style="color:dimgray">Referred By: </label>
                            <input type="text" class="form-control" name="referred_by" value="{{ $student_wisd->referred_by}}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="" style="color:dimgray">Follow up Counseling Session: </label>
                            <input type="text" class="form-control" name="follow_up_counseling_session" value="{{ $student_wisd->follow_up_counseling_session}}">

                        </div>
                    </div>

                    <div class="col-md-12 mb-3 mt-2">
                        <label for="" style="color:dimgray;">Reasons for Referral</label>
                        <textarea style="border: solid 1px dimgray; height: 80px;" id="" type="text" class="form-control"
                            placeholder="" title="" name="reasons_for_referral">{{ $student_wisd->reasons_for_referral }}</textarea>

                    </div>

                    <div class="col-md-12 mb-3">
                        <div class=" p-2 bg-light" style="border: 1px solid dimgray;">

                            <label for="" style="color:dimgray;">Information/Behavior Observed</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="behavior_observed">{{ $student_wisd->behavior_observed }}</textarea>
                            <br>
                            <label for="" style="color:dimgray;">Interview Findings</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="interview_findings">{{ $student_wisd->interview_findings }}</textarea>
                            <br>
                            <label for="" style="color:dimgray;">Comments/Clinical Impressions</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="clinical_impressions">{{ $student_wisd->clinical_impressions }}</textarea>
                            <br>
                            <label for="" style="color:dimgray;">Recommendation</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="recommendation">{{ $student_wisd->recommendation }}</textarea>
                            <p class="text-dark mt-2">Note: <i class="text-dark">Information revealed is held strictly
                                    CONFIDENTIAL.</i></p>
                            <br>
                            <label for="" style="color:dimgray">Student ID </label>
                            <input type="text" class="form-control text-center" style="width: 45px;" name="student_id" value="{{ $student_wisd->student_id}}" readonly>
                            <p class="text-dark d-flex justify-content-end">______________________________________________
                            </p>
                            <p class="text-dark d-flex justify-content-end" style="position: relative; top: -20px;">
                                Designated Guidance Counselor's Name and Signature</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn-primary btn btn-sm"><span class="fas fa-save"></span> Submit Changes</button>
        </form>
        </div>
    </div>
    </div>
@endsection
