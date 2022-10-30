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


            <div class="d-flex justify-content-end">

                <a class="btn btn-danger mt-2 ml-2 mr-2" style=""
              href="{{ route('export_charityStudents_parent_conference_record_pdf', $student_char->id) }}"><span class="fas fa-file-pdf"
            style="font-size: 15px;"></span> Generate PDF</a>

            </div>

           
            <div class="container mx-auto">

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

                        <div class="form-group mt-5">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Student Name: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_char->student->firstname }}
                                    {{ $student_char->student->middlename }} {{ $student_char->student->lastname }}</span>
                            </p>
                        </div>



                        <div class="form-group mt-3">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Year/Section: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_char->student->year_section }}</span>
                            </p>
                        </div>




                        <div class="form-group mt-3">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Parent/Guardian's Name: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_char->student->parent_name }}</span>
                            </p>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group mt-5">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Age: </span><span class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_char->student->age }}</span>
                            </p>
                        </div>

                        <div class="form-group ">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Date: </span><span class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_char->date->format('F d,  Y ') }}</span>
                            </p>
                        </div>

                        <div class="form-group ">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Relation to Student: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_char->relation_to_student }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3 mt-2">

                        <p class="text-dark"
                            style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                            <span class="text-dark" style="font-weight: 500">Reason for Contact: </span><span
                                class="text-dark"
                                style="border-bottom: 1px solid black">{{ $student_char->reason_for_contact }}
                                ({{ $student_char->inquiries_referral_appointment }})</span>
                        </p>
                        <hr>

                        <label for="" style="color:dimgray;">Problem/Concern</label>
                        <textarea style="border: solid 1px dimgray; height: 120px;" id="" type="text" class="form-control"
                            placeholder="" title="" name="problem_concern">{{ $student_char->problem_concern }}</textarea>
                        <br>
                        <label for="" style="color:dimgray;">Topics Discussed</label>
                        <textarea style="border: solid 1px dimgray; height: 120px;" id="" type="text" class="form-control"
                            placeholder="" title="" name="topics_discussed">{{ $student_char->topics_discussed }}</textarea>
                        <br>
                        <label for="" style="color:dimgray;">Suggested Resolution</label>
                        <textarea style="border: solid 1px dimgray; height: 120px;" id="" type="text" class="form-control"
                            placeholder="" title="" name="suggested_resolution">{{ $student_char->suggested_resolution }}</textarea>
                        <br>

                        <div class="form-group text-center ">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Action Taken: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_char->action_taken }}</span>
                            </p>
                        </div>

                        <p class="text-dark mt-2">Note: <i class="text-dark">Information revealed is held strictly
                                CONFIDENTIAL.</i></p>
                        <br>
                        <p class="text-dark d-flex justify-content-end">_________________________________________
                        </p>
                        <p class="text-dark d-flex justify-content-end" style=" margin-top: -20px;">
                            Designated Guidance Counselor's Name and Signature</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
