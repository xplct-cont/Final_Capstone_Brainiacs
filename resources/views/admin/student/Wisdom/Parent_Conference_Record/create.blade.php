@extends('layouts.layoutsidebar')

@section('content')
<div class="p-3">
    <a class="fas fa-arrow-left" style="font-size:20px; color:blue;" href="{{ url('show-student-wisdom/' . $student_wis->id . '/parent_conference_record_wisdom') }}"></a>
</div>
    <div class="d-flex justify-content-center mb-3">
        <h1 class="text-dark text-center" style="font-size: 25px;">Create Parent/Guardian Conference Record</h1>
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
                <form action="{{ url('/add_parent_conference_record_wisdom') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="" style="color:dimgray">Student Name</label>
                                <input type="text" class="form-control"
                                    value="{{ $student_wis->lastname }}, {{ $student_wis->firstname }} {{ $student_wis->middlename }}"
                                    readonly>
                            </div>

                            <div class="form-group mt-3">
                                <label for="" style="color:dimgray">Year/Section</label>
                                <input type="text" class="form-control" value="{{ $student_wis->year_section }}"
                                    readonly>
                            </div>

                            <div class="form-group mt-3">
                                <label for="" style="color:dimgray">Parent/Guardian's Name</label>
                                <input type="text" class="form-control" value="{{ $student_wis->parent_name }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Age</label>
                                <input type="text" class="form-control" value="{{ $student_wis->age }}" readonly>


                                <div class="form-group mt-3">
                                    <label for="" style="color:dimgray">Date</label>
                                    <input type="date" class="form-control" name="date" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="" style="color:dimgray">Relation to Student</label>
                                    <input type="text" class="form-control" name="relation_to_student"
                                        placeholder="Whats your relation to the student?" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="col-md-12">

                        <div class="form-group text-center">
                            <p class="" style="color: dimgray; font-weight: 700;">Reason for Contact</p>
                            <label class="radio inline mr-5">
                                <input type="radio" name="reason_for_contact" value="Inquiries">
                                <span>Inquiries</span>
                            </label>
                            <label class="radio inline mr-5">
                                <input type="radio" name="reason_for_contact" value="Referral">
                                <span>Referral</span>
                            </label>
                            <label class="radio inline mr-5">
                                <input type="radio" name="reason_for_contact" value="Appointment">
                                <span>Appointment</span>
                            </label>
                            <label class="radio inline mr-5">
                                <input type="radio" name="reason_for_contact" value="Follow Up">
                                <span>Follow Up</span>
                            </label>
                            <label class="radio inline mr-5">
                                <input type="radio" name="reason_for_contact" value="Feedback on the child progress">
                                <span>Feedback on the child progress</span>
                            </label>
                            <label class="radio inline mr-5">
                                <input type="radio" name="reason_for_contact" value="Others">
                                <span>Others</span>
                            </label>
                        </div>
                        <hr>

                        <div class="form-group text-center">

                            <p class="" style="color: dimgray; font-weight: 700;">Inquiries</p>
                            <label class="radio inline mr-5">
                                <input type="radio" name="inquiries_referral_appointment" value="Phone-in inquiry">
                                <span>Phone-in inquiry</span>
                            </label>
                            <label class="radio inline mr-5">
                                <input type="radio" name="inquiries_referral_appointment" value="Walk-in inquiry">
                                <span>Walk-in inquiry</span>
                            </label>
                            <label class="radio inline mr-5">
                                <input type="radio" name="inquiries_referral_appointment"
                                    value="Inquiry on Psychological Test Results">
                                <span>Inquiry on Psychological Test Results</span>
                            </label>
                        </div>
                        <hr>

                        <div class="form-group text-center">

                            <p class="" style="color: dimgray; font-weight: 700;">Referral</p>
                            <label class="radio inline mr-5">
                                <input type="radio" name="inquiries_referral_appointment" value="By Adviser">
                                <span>By Adviser</span>
                            </label>
                            <label class="radio inline mr-5">
                                <input type="radio" name="inquiries_referral_appointment" value="By Subject Teacher">
                                <span>By Subject Teacher</span>
                            </label>
                        </div>
                        <hr>

                        <div class="form-group text-center">

                            <p class="" style="color: dimgray; font-weight: 700;">Appointment</p>
                            <label class="radio inline mr-5">
                                <input type="radio" name="inquiries_referral_appointment"
                                    value="Contacted by the Counselor">
                                <span>Contacted by the Counselor</span>
                            </label>
                            <label class="radio inline mr-5">
                                <input type="radio" name="inquiries_referral_appointment"
                                    value="Appointment Letter Sent">
                                <span>Appointment Letter Sent</span>
                            </label>
                            <label class="radio inline mr-5">
                                <input type="radio" name="inquiries_referral_appointment"
                                    value="Appointment Set by the Counselor">
                                <span>Appointment Set by the Counselor</span>
                            </label>
                            <label class="radio inline mr-5">
                                <input type="radio" name="inquiries_referral_appointment"
                                    value="Appointment Set by the Parents">
                                <span>Appointment Set by the Parents</span>
                            </label>

                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="" style="color:dimgray">Problem/Concern</label>
                            <textarea id="" type="text" class="form-control" title="" rows="3" required
                                name="problem_concern" placeholder="Write the problem/concern"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="" style="color:dimgray">Topics Discussed</label>
                            <textarea id="" type="text" class="form-control" title="" rows="3" required
                                name="topics_discussed" placeholder="Write the topics discussed"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="" style="color:dimgray">Suggested Resolution</label>
                            <textarea id="" type="text" class="form-control" title="" rows="3" required
                                name="suggested_resolution" placeholder="Write the suggested resolution"></textarea>
                        </div>


                        <div class="form-group text-center">

                            <p class="" style="color: dimgray; font-weight: 700;">Action Taken</p>
                            <label class="radio inline mr-5">
                                <input type="radio" name="action_taken" value="Resolved">
                                <span>Resolved</span>
                            </label>
                            <label class="radio inline mr-5">
                                <input type="radio" name="action_taken" value="Unresolved">
                                <span>Unresolved</span>
                            </label>
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
