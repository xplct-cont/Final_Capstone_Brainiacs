@extends('layouts.layoutsidebar')

@section('content')
    @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="row d-flex justify-content-center text-dark">
        <div class="col-md-11 elevation-4 p-3 rounded  mt-5 bg-light mb-3">

            <div class="container mx-auto">

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

                        <div class="form-group mt-5">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Name: </span><span class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_fait->student->firstname }}
                                    {{ $student_fait->student->middlename }} {{ $student_fait->student->lastname }} </span>
                            </p>
                        </div>



                        <div class="form-group mt-3">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Gender: </span><span class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_fait->student->gender }} </span>
                            </p>
                        </div>

                        <div class="form-group mt-3">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Date/Time Called: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_fait->date_time_called }} </span>
                            </p>
                        </div>

                        <div class="form-group mt-3">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Reason/s for Contact: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_fait->reasons_for_contact }} </span>
                            </p>
                        </div>



                    </div>

                    <div class="col-md-6">

                        <div class="form-group mt-5">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Age: </span><span class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_fait->student->age }}</span>
                            </p>
                        </div>


                        <div class="form-group mt-3">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Year/Section: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_fait->student->year_section }}</span>
                            </p>
                        </div>

                        <div class="form-group mt-3">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Referred By: </span><span class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_fait->referred_by }}</span>
                            </p>
                        </div>

                        <div class="form-group mt-3">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Follow up Counseling Session: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_fait->follow_up_counseling_session }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3 mt-2">
                        <label for="" style="color:dimgray;">Reasons for Referral</label>
                        <textarea style="border: solid 1px dimgray; height: 80px;" id="" type="text" class="form-control"
                            placeholder="" title="" name="reasons_for_referral">{{ $student_fait->reasons_for_referral }}</textarea>

                    </div>

                    <div class="col-md-12 mb-3">
                        <div class=" p-2 bg-light" style="border: 1px solid dimgray;">

                            <label for="" style="color:dimgray;">Information/Behavior Observed</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="behavior_observed">{{ $student_fait->behavior_observed }}</textarea>
                            <br>
                            <label for="" style="color:dimgray;">Interview Findings</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="interview_findings">{{ $student_fait->interview_findings }}</textarea>
                            <br>
                            <label for="" style="color:dimgray;">Comments/Clinical Impressions</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="clinical_impressions">{{ $student_fait->clinical_impressions }}</textarea>
                            <br>
                            <label for="" style="color:dimgray;">Recommendation</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="recommendation">{{ $student_fait->recommendation }}</textarea>
                            <p class="text-dark mt-2">Note: <i class="text-dark">Information revealed is held strictly
                                    CONFIDENTIAL.</i></p>
                            <br>
                            <p class="text-dark d-flex justify-content-end">______________________________________________
                            </p>
                            <p class="text-dark d-flex justify-content-end" style="position: relative; top: -20px;">
                                Designated Guidance Counselor's Name and Signature</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
