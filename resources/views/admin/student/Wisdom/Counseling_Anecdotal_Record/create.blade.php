@extends('layouts.layoutsidebar')

@section('content')
<div class="p-3">
    <a class="fas fa-arrow-left" style="font-size:20px; color:blue;" href="{{ url('show-student-wisdom/' . $student_wis->id . '/counseling_anecdotal_record_wisdom') }}"></a>
</div>
    <div class="d-flex justify-content-center mb-3">
        <h1 class="text-dark text-center" style="font-size: 25px;">Create Counseling Anecdotal Record</h1>
    </div>

    <div class="row d-flex justify-content-center text-dark">
        <div class="col-md-11 elevation-1 p-3 mb-3 rounded bg-light">
            @if ($message = Session::get('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="container mb-0">
                <form action="{{ url('/add_counseling_anecdotal_record_wisdom') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="" style="color:dimgray">Student Name</label>
                                <input type="text" class="form-control"
                                    value="{{ $student_wis->lastname }}, {{ $student_wis->firstname }} {{ $student_wis->middlename }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label for="" style="color:dimgray">Gender</label>
                                <input type="text" class="form-control" value="{{ $student_wis->gender }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="" style="color:dimgray">Date/Time Called</label>
                                <input type="datetime-local" class="form-control" name="date_time_called" required>
                            </div>

                            <div class="form-group">

                                <p class="" style="color: dimgray; font-weight: 700;">Follow up Counseling</p>
                                <label class="radio inline mr-5">
                                    <input type="radio" name="follow_up_counseling_session"
                                        value="1st Counseling Session">
                                    <span>1st</span>
                                </label>
                                <label class="radio inline mr-5">
                                    <input type="radio" name="follow_up_counseling_session"
                                        value="2nd Counseling Session">
                                    <span>2nd</span>
                                </label>
                                <label class="radio inline mr-5">
                                    <input type="radio" name="follow_up_counseling_session"
                                        value="3rd Counseling Session">
                                    <span>3rd</span>
                                </label>
                                <label class="radio inline mr-5">
                                    <input type="radio" name="follow_up_counseling_session"
                                        value="4th Counseling Session">
                                    <span>4th</span>
                                </label>
                                <label class="radio inline mr-5">
                                    <input type="radio" name="follow_up_counseling_session"
                                        value="5th Counseling Session">
                                    <span>5th</span>
                                </label>
                                <label class="radio inline mr-5">
                                    <input type="radio" name="follow_up_counseling_session"
                                        value="Voluntary">
                                    <span>Voluntary</span>
                                </label>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Age</label>
                                <input type="text" class="form-control" value="{{ $student_wis->age }}" readonly>
                            </div>

                            <div class="form-group mt-3">
                                <label for="" style="color:dimgray">Year/Section</label>
                                <input type="text" class="form-control" value="{{ $student_wis->year_section }}"
                                    readonly>
                            </div>

                            <p style="color:dimgray; font-weight:bold;">Reasons for Contact</p>

                            <div class="form-group text-dark">
                                <div class="maxl">
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="reasons_for_contact" value="Regular Counseling">
                                        <span> Regular Counseling </span>
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="reasons_for_contact" value="Interview">
                                        <span>Interview </span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" style="color:dimgray;">Referred by</label>
                                <input type="text" name="referred_by" class="form-control" name="referred_by"
                                    placeholder="Enter referred by" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" style="color:dimgray;">Reasons for Referral</label>
                            <textarea id="" type="text" class="form-control" placeholder="" title="" rows="3" required
                                name="reasons_for_referral" placeholder="Write reasons for referral"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="" style="color:dimgray;">Information/Behavior Observed</label>
                            <textarea id="" type="text" class="form-control" placeholder="" title="" rows="5" required
                                name="behavior_observed" placeholder="Write information/behavior observed"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="" style="color:dimgray;">Interview Findings</label>
                            <textarea id="" type="text" class="form-control" placeholder="" title="" rows="5" required
                                name="interview_findings" placeholder="Write some interview findings"></textarea>

                        </div>

                        <div class="form-group">
                            <label for="" style="color:dimgray;">Comments/Clinical Impression</label>
                            <textarea id="" type="text" class="form-control" placeholder="" title="" rows="5" required
                                name="clinical_impressions" placeholder="Write some comments/clinical impressions"></textarea>

                        </div>

                        <div class="form-group">
                            <label for="" style="color:dimgray;">Recommendations</label>
                            <textarea id="" type="text" class="form-control" placeholder="" title="" rows="5" required
                                name="recommendation" placeholder="Write some recommendations"></textarea>
                        </div>
                    </div>

                    <p class="text-dark">Note: <i class="text-dark">Information revealed is held strictly
                            CONFIDENTIAL.</i></p>

                    <div class="form-group" style="width: 100px;">
                        <label for="" style="color:dimgray">Student ID</label>
                        <input type="text" name="student_id" class="form-control text-center"
                            value="{{ $student_wis->id }}" readOnly>
                    </div>

                    <div class="form-group mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success"><span class="fas fa-save"></span>
                            Save</button>

                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
