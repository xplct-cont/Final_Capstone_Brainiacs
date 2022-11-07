@extends('layouts.layoutsidebar')

@section('content')
<div class="p-1">
    <a class="fas fa-arrow-left" style="font-size:20px; color:blue;" href="{{ url('show-student-wisdom/' . $student_wis->id)}}"></a>
</div>
    @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <h1 class="text-dark p-3"
        style="font-weight:normal; font-size: 25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; ">
        Student Information Sheet of {{ $student_wis->lastname }}, {{ $student_wis->firstname }} from
        {{ $student_wis->year_section }}</h1>
    <hr>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary ml-5 mt-2" data-toggle="modal" data-target="#exampleModalLong">
       <span class="fas fa-upload"></span> Create Record
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h1 class="text-center mt-4"
                        style=" color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 22px; color:rgba(60, 58, 58, 0.904);">
                        Pangangan National High School </h1>
                    <p class="text-center" style="font-weight:bold; font-size: 20px; color:rgba(60, 58, 58, 0.904);">
                        Guidance
                        Center</p>
                    <p class="text-center text-dark" style="position: relative; top: -15px;">Talisay, Calape, Bohol</p>

                    <p class="text-center text-dark"
                        style="font-size: 18px; font-weight: 500; color:rgba(60, 58, 58, 0.904); ">
                        Student Information Sheet</p>
                    <hr>
                    <p class="text-center text-dark">NOTE: All information are held strictly <strong>CONFIDENTIAL</strong>.
                        Thank you.</p>

                    <form action="{{ url('/upload_student_information_wisdom') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="container mx-auto">
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="radio inline mr-5">
                                            <input type="radio" name="type_of_student" value="New Student">
                                            <span class="text-dark" style="font-weight: 400">New Student</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="radio inline mr-5">
                                            <input type="radio" name="type_of_student" value="Old Student">
                                            <span class="text-dark" style="font-weight: 400">Old Student</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="radio inline mr-5">
                                            <input type="radio" name="type_of_student" value="Transferee">
                                            <span class="text-dark" style="font-weight: 400">Transferee</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="radio inline mr-5">
                                            <input type="radio" name="type_of_student" value="Returnee">
                                            <span class="text-dark" style="font-weight: 400">Returnee</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p class="text-center text-dark" style="font-weight: 500">NOTE: Please type "None" if the field
                                is
                                empty.
                                Thank you.</p>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Student Name</label>
                                        <input type="text" class="form-control"
                                            value="{{ $student_wis->lastname }}, {{ $student_wis->firstname }} {{ $student_wis->middlename }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Name and Address of School Last
                                            Attended</label>
                                        <input type="text" class="form-control" name="last_attended_school"
                                            placeholder="Type the name and address of  school">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Year/Section</label>
                                        <input type="text" class="form-control" value="{{ $student_wis->year_section }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">School Year</label>
                                        <input type="text" class="form-control" name="school_year"
                                            placeholder="Type the school year">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>PERSONAL DATA</strong> </p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Date of Birth</label>
                                        <input type="date" class="form-control" name="birthdate">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Nationality</label>
                                        <input type="text" class="form-control" name="nationality">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Status</label>
                                        <input type="text" class="form-control" name="status">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Age</label>
                                        <input type="text" class="form-control" value="{{ $student_wis->age }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Height</label>
                                        <input type="text" class="form-control" name="height">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Mobile Number</label>
                                        <input type="text" class="form-control" name="number">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Place of Birth</label>
                                        <input type="text" class="form-control" name="birthplace">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Religion</label>
                                        <input type="text" class="form-control" name="religion">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Home Address</label>
                                        <input type="text" class="form-control" value="{{ $student_wis->address }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Sex</label>
                                        <input type="text" class="form-control" value="{{ $student_wis->gender }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Weight</label>
                                        <input type="text" class="form-control" name="weight">
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>EDUCATIONAL BACKGROUND</strong> </p>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Elementary</label>
                                        <input type="text" class="form-control" name="elementary">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Secondary</label>
                                        <input type="text" class="form-control" name="secondary">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Elementary Honor/s Received</label>
                                        <input type="text" class="form-control" name="elem_honors_rec">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Secondary Honor/s Received</label>
                                        <input type="text" class="form-control" name="secon_honors_rec">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Year Graduated in Elementary</label>
                                        <input type="text" class="form-control" name="elem_year_grad">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Year Graduated in Secondary</label>
                                        <input type="text" class="form-control" name="secon_year_grad">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>(FOR TRANSFEREE/SHIFTEE/CROSS ENROLLEE, WRITE SCHOOL/S
                                        ATTENDED)</strong> </p>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Year Level Last Attended</label>
                                        <input type="text" class="form-control" name="level_last_attended">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Reason/s why transfer</label>
                                        <input type="text" class="form-control" name="reasons_for_transfer">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">School and Address</label>
                                        <input type="text" class="form-control" name="school_add">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Year</label>
                                        <input type="text" class="form-control" name="year">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>AFFILIATION IN ORGANIZATION</strong>(church, club,
                                    school, fraternity, volunteer)</p>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Name of Organization</label>
                                        <input type="text" class="form-control" name="org_name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Position</label>
                                        <input type="text" class="form-control" name="position">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Year</label>
                                        <input type="text" class="form-control" name="org_year">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>SELF</strong></p>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Favorite Subject</label>
                                        <input type="text" class="form-control" name="fav_sub">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Likes</label>
                                        <input type="text" class="form-control" name="likes">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Most Difficult Subject</label>
                                        <input type="text" class="form-control" name="most_dif_sub">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Dislikes</label>
                                        <input type="text" class="form-control" name="dislikes">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Interest/Hobbies</label>
                                        <input type="text" class="form-control" name="hobbies">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>FAMILY BACKGROUND</strong></p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Father</label>
                                        <input type="text" class="form-control" name="father">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Age</label>
                                        <input type="text" class="form-control" name="father_age">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Occupation</label>
                                        <input type="text" class="form-control" name="father_occupation">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Office Address</label>
                                        <input type="text" class="form-control" name="father_off_ad">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Mother</label>
                                        <input type="text" class="form-control" name="mother">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Age</label>
                                        <input type="text" class="form-control" name="mother_age">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Occupation</label>
                                        <input type="text" class="form-control" name="mother_occupation">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Office Address</label>
                                        <input type="text" class="form-control" name="mother_off_ad">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>(Educational Status)</strong></p>
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-dark">
                                    <p class="text-dark">Father's Educational Status</p>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="father_educ_stat" value="Elementary">
                                        <span>Elementary</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="father_educ_stat" value="High School">
                                        <span>High School</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="father_educ_stat" value="Undergraduate">
                                        <span>Undergraduate</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="father_educ_stat" value="College Graduate">
                                        <span>College Graduate</span>
                                    </label>
                                </div>

                                <div class="col-md-6 text-dark">
                                    <p class="text-dark">Mother's Educational Status</p>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="mother_educ_stat" value="Elementary">
                                        <span>Elementary</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="mother_educ_stat" value="High School">
                                        <span>High School</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="mother_educ_stat" value="Undergraduate">
                                        <span>Undergraduate</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="mother_educ_stat" value="College Graduate">
                                        <span>College Graduate</span>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>(Total Monthly Income)</strong></p>
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-dark">
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="monthly_income"
                                            value="More than 1, 0000 but less than 5, 000">
                                        <span>More than 1, 0000 but less than 5, 000</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="monthly_income"
                                            value="More than 5, 0000 but less than 10, 000">
                                        <span>More than 5, 0000 but less than 10, 000</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="monthly_income"
                                            value="More than 10, 0000 but less than 15, 000">
                                        <span>More than 10, 0000 but less than 15, 000</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="monthly_income"
                                            value="More than 15, 0000 but less than 20, 000">
                                        <span>More than 15, 0000 but less than 20, 000</span>
                                    </label>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="monthly_income" value="More than 20, 000">
                                        <span>More than 20, 000</span>
                                    </label>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>(Marital Status of Parents)</strong></p>
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-dark">
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="mar_parents_stat"
                                            value="Living together here in the Philippines">
                                        <span>Living together here in the Philippines</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="mar_parents_stat"
                                            value="Living together but only the father is working">
                                        <span>Living together but only the father is working</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="mar_parents_stat"
                                            value="Living together but only the mother is working">
                                        <span>Living together but only the mother is working</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="mar_parents_stat"
                                            value="Living together but both working abroad">
                                        <span>Living together but both working abroad</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="mar_parents_stat" value="Separated">
                                        <span>Separated</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="mar_parents_stat"
                                            value="Separated with other families">
                                        <span>Separated with other families</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="mar_parents_stat" value="Deceased (Mother, Father)">
                                        <span>Deceased (Mother, Father)</span>
                                    </label>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>(Rank of Order)</strong></p>
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-dark">
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="rank_order" value="Eldest">
                                        <span>Eldest</span>
                                    </label>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="rank_order" value="Middle">
                                        <span>Middle</span>
                                    </label>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="rank_order" value="Youngest">
                                        <span>Youngest</span>
                                    </label>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="rank_order" value="Only">
                                        <span>Only</span>
                                    </label>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">No. of Brothers</label>
                                        <input type="text" class="form-control" name="no_of_brothers">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">No. of Sisters</label>
                                        <input type="text" class="form-control" name="no_of_sisters">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>(Living with)</strong></p>
                            </div>

                            <div class="row">
                                <div class="col-md-8 text-dark">
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="living_with" value="Parents">
                                        <span>Parents</span>
                                    </label>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="living_with" value="Boardmates">
                                        <span>Boardmates</span>
                                    </label>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="living_with" value="Relatives">
                                        <span>Relatives</span>
                                    </label>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="living_with" value="Siblings">
                                        <span>Siblings</span>
                                    </label>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>(How are you supported with)</strong></p>
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-dark">
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="how_are_you_supp" value="Parents">
                                        <span>Parents</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="how_are_you_supp" value="Academic Scholar">
                                        <span>Academic Scholar</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="how_are_you_supp" value="Part-Self">
                                        <span>Part-Self</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="how_are_you_supp" value="Non-Academic Scholar">
                                        <span>Non-Academic Scholar</span>
                                    </label><br>
                                    <label class="radio inline mr-5">
                                        <input type="radio" name="how_are_you_supp" value="Relatives">
                                        <span>Relatives</span>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark">How would you describe your relationship with your</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Father</label>
                                        <input type="text" class="form-control" name="rel_with_father">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Mother</label>
                                        <input type="text" class="form-control" name="rel_with_mother">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Brother</label>
                                        <input type="text" class="form-control" name="rel_with_brother">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Sister</label>
                                        <input type="text" class="form-control" name="rel_with_sister">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark">If married</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Name of Spouse</label>
                                        <input type="text" class="form-control" name="spouse_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Occupation</label>
                                        <input type="text" class="form-control" name="spouse_occupation">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Nationality</label>
                                        <input type="text" class="form-control" name="spouse_nationality">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Age</label>
                                        <input type="text" class="form-control" name="spouse_age">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Name and Address of Company</label>
                                        <input type="text" class="form-control" name="spouse_comp_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Company Tel/Mobile No.</label>
                                        <input type="text" class="form-control" name="company_num">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-start">
                                <p class="mt-2 text-dark"><strong>HEALTH HISTORY</strong></p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Past Disease</label>
                                        <input type="text" class="form-control" name="past_disease">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Injuries of Illness</label>
                                        <input type="text" class="form-control" name="injuries">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Previous
                                            Hospitalization/Operations</label>
                                        <input type="text" class="form-control" name="operations">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Menstrual History (Female
                                            Only)</label>
                                        <input type="text" class="form-control" name="mens_history">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Date Signed</label>
                                        <input type="date" class="form-control" name="date_signed">
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Student ID</label>
                                        <input type="text" style="width: 50px" class="form-control text-center"
                                            name="student_id" value="{{ $student_wis->id }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mt-2 "><span class="fas fa-save"></span>
                                    Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    
    @forelse ($student_information_sheet_wisdom as $stud_info_wis)

    <form action="{{ url('update_student_information_sheet_wisdom/' . $stud_info_wis->id) }}" method="POST" accept-charset="UTF-8">
        @csrf
        @method('PUT')

        <div class="row d-flex justify-content-center text-dark">
            <div class="col-md-11 elevation-4 p-3 rounded  mt-2 bg-light mb-3">
                <a href="{{ url('delete_student_information_sheet_wisdom/' . $stud_info_wis->id) }}"
                    class="btn btn-sm btn-danger mb-1"><i class="text-light fas fa-trash"></i></a>
            
                <div class="d-flex justify-content-end">

                    <a class="btn btn-danger mt-2 ml-2 mr-2" style=""
                    href="{{ route('export_wisdomStudents_student_information_sheet_pdf', $stud_info_wis->id) }}"><span
                        class="fas fa-file-pdf" style="font-size: 15px;"></span> Generate PDF</a>
                </div>
                <div class="d-flex justify-content-center">
                    <img src="/images/image17.png" class="user-image img-circle elevation-2 "
                        alt="User Image"
                        style="width: 120px; height:120px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
                </div>
                <div class="container mx-auto">

                    <h1 class="text-center mt-4"
                        style=" color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 22px; color:rgba(60, 58, 58, 0.904);">
                        Pangangan National High School </h1>
                    <p class="text-center" style="font-weight:bold; font-size: 20px; color:rgba(60, 58, 58, 0.904);">
                        Guidance
                        Center</p>
                    <p class="text-center text-dark" style="position: relative; top: -15px;">Talisay, Calape, Bohol</p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-5">
                                <label for="" style="color:dimgray">Type of Student</label>
                                <input type="text" class="form-control" name="type_of_student" value="{{$stud_info_wis->type_of_student}}">
                            </div>
        
                        </div>
                    </div>
                   
                    <p class="text-center text-dark"
                        style="font-size: 18px; font-weight: 500; color:rgba(60, 58, 58, 0.904); ">
                        Student Information Sheet</p>


                    <hr>
                    <p class="text-center text-dark">NOTE: All information are held strictly <strong>CONFIDENTIAL</strong>.
                        Thank you.</p>


                    <div class="row mt-5">

                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="" style="color:dimgray">Name: </label>
                                    <input type="text" class="form-control" value="{{ $stud_info_wis->student->lastname }}, {{ $stud_info_wis->student->firstname }} {{ $stud_info_wis->student->middlename }}" readonly>
                                </div>

                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <label for="" style="color:dimgray">Name and Address of School Last Attended: </label>
                                    <input type="text" class="form-control" name="last_attended_school" value="{{ $stud_info_wis->last_attended_school }}">
                                </div>

                            </div>
                        </div>


                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="" style="color:dimgray">Year/Section: </label>
                                <input type="text" class="form-control"  value="{{ $stud_info_wis->student->year_section }}" readonly>
                                
                            </div>
                            <div class="form-group ">
                                <label for="" style="color:dimgray">School Year: </label>
                                <input type="text" class="form-control" name="school_year"  value="{{ $stud_info_wis->school_year }}">

                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-start">
                        <p class="mt-2 text-dark"><strong>PERSONAL DATA</strong> </p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Date of Birth: </label>
                                <div style="font-size:15px;">YYYY-MM-DD</div>
                                <input type="text" class="form-control" name="birthdate"  value="{{$stud_info_wis->birthdate}}">
                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Nationality: </label>
                                <input type="text" class="form-control" name="nationality"  value="{{ $stud_info_wis->nationality}}">
                    
                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Status: </label>
                                <input type="text" class="form-control" name="status"  value="{{ $stud_info_wis->status}}">

                               
                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Age: </label>
                                <input type="text" class="form-control"  value="{{ $stud_info_wis->student->age}}" readonly>

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Height: </label>
                                <input type="text" class="form-control" name="height"  value="{{ $stud_info_wis->height}}">
                                
                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Mobile Number: </label>
                                <input type="text" class="form-control" name="number"  value="{{ $stud_info_wis->number}}">

                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="" style="color:dimgray">Place of Birth: </label>
                                <input type="text" class="form-control" name="birthplace"  value="{{ $stud_info_wis->birthplace}}">
                             
                            </div>
                            <div class="form-group ">
                                <label for="" style="color:dimgray">Religion: </label>
                                <input type="text" class="form-control" name="religion"  value="{{ $stud_info_wis->religion}}">
                              
                            </div>
                            <div class="form-group ">
                                <label for="" style="color:dimgray">Home Address: </label>
                                <input type="text" class="form-control"  value="{{ $stud_info_wis->student->address}}" readonly>

                            </div>
                            <div class="form-group ">
                                <label for="" style="color:dimgray">Sex: </label>
                                <input type="text" class="form-control" value="{{ $stud_info_wis->student->gender}}" readonly>
                               
                            </div>
                            <div class="form-group ">
                                <label for="" style="color:dimgray">Weight: </label>
                                <input type="text" class="form-control" name="weight"  value="{{ $stud_info_wis->weight}}">
                               
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="d-flex justify-content-start">
                        <p class="mt-2 text-dark"><strong>EDUCATIONAL BACKGROUND</strong> </p>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="" style="color:dimgray">Elementary: </label>
                                <input type="text" class="form-control" name="elementary"  value="{{ $stud_info_wis->elementary}}">
                            </div>
                            <div class="form-group ">
                                <label for="" style="color:dimgray">Secondary: </label>
                                <input type="text" class="form-control" name="secondary"  value="{{ $stud_info_wis->secondary}}">
                                
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="" style="color:dimgray">Elementary Honor/s Received: </label>
                                <input type="text" class="form-control" name="elem_honors_rec"  value="{{ $stud_info_wis->elem_honors_rec}}">
                              
                            </div>
                            <div class="form-group ">
                                <label for="" style="color:dimgray">Secondary Honor/s Received: </label>
                                <input type="text" class="form-control" name="secon_honors_rec"  value="{{ $stud_info_wis->secon_honors_rec}}">
                              
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group ">
                                <div class="form-group ">
                                    <label for="" style="color:dimgray">Year Graduated in Elementary: </label>
                                    <input type="text" class="form-control" name="elem_year_grad"  value="{{ $stud_info_wis->elem_year_grad}}">
                                  
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Year Graduated in Secondary: </label>
                                <input type="text" class="form-control" name="secon_year_grad"  value="{{ $stud_info_wis->secon_year_grad}}">
                              
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="d-flex justify-content-start">
                        <p class="mt-2 text-dark"><strong>(FOR TRANSFEREE/SHIFTEE/CROSS ENROLLEE, WRITE SCHOOL/S
                                ATTENDED)</strong>
                        </p>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Year Level Last Attended: </label>
                                <input type="text" class="form-control" name="level_last_attended"  value="{{ $stud_info_wis->level_last_attended}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Reason/s why transfer: </label>
                                <input type="text" class="form-control" name="reasons_for_transfer"  value="{{ $stud_info_wis->reasons_for_transfer}}">
                               
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" style="color:dimgray">School and Address: </label>
                                <input type="text" class="form-control" name="school_add"  value="{{ $stud_info_wis->school_add}}">                        
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Year: </label>
                                <input type="text" class="form-control" name="year"  value="{{ $stud_info_wis->year}}">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-start">
                        <p class="mt-2 text-dark"><strong>AFFILIATION IN ORGANIZATION</strong>(church, club, school,
                            fraternity,
                            volunteer)</p>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Name of Organization: </label>
                                <input type="text" class="form-control" name="org_name"  value="{{ $stud_info_wis->org_name}}">
                               
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Position: </label>
                                <input type="text" class="form-control" name="position"  value="{{ $stud_info_wis->position}}">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Year: </label>
                                <input type="text" class="form-control" name="org_year"  value="{{ $stud_info_wis->org_year}}">
                               
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-start">
                        <p class="mt-2 text-dark"><strong>SELF</strong></p>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Favorite Subject: </label>
                                <input type="text" class="form-control" name="fav_sub"  value="{{ $stud_info_wis->fav_sub}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Likes: </label>
                                <input type="text" class="form-control" name="likes"  value="{{ $stud_info_wis->likes}}">

                               
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Most Difficult Subject: </label>
                                <input type="text" class="form-control" name="most_dif_sub"  value="{{ $stud_info_wis->most_dif_sub}}">

                              
                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Dislikes: </label>
                                <input type="text" class="form-control" name="dislikes"  value="{{ $stud_info_wis->dislikes}}">

                              
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Interest/Hobbies: </label>
                                <input type="text" class="form-control" name="hobbies"  value="{{ $stud_info_wis->hobbies}}">

                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-start">
                        <p class="mt-2 text-dark"><strong>FAMILY BACKGROUND</strong></p>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Father: </label>
                                <input type="text" class="form-control" name="father"  value="{{ $stud_info_wis->father}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Age: </label>
                                <input type="text" class="form-control" name="father_age"  value="{{ $stud_info_wis->father_age}}">

                               
                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Occupation: </label>
                                <input type="text" class="form-control" name="father_occupation"  value="{{ $stud_info_wis->father_occupation}}">

                             
                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Office Address: </label>
                                <input type="text" class="form-control" name="father_off_ad"  value="{{ $stud_info_wis->father_off_ad}}">

                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Mother: </label>
                                <input type="text" class="form-control" name="mother"  value="{{ $stud_info_wis->mother}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Age: </label>
                                <input type="text" class="form-control" name="mother_age"  value="{{ $stud_info_wis->mother_age}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Occupation: </label>
                                <input type="text" class="form-control" name="mother_occupation"  value="{{ $stud_info_wis->mother_occupation}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Office Address: </label>
                                <input type="text" class="form-control" name="mother_off_ad"  value="{{ $stud_info_wis->mother_off_ad}}">

                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-start">
                        <p class="mt-2 text-dark"><strong>(Educational Status)</strong></p>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Father's Educational Status: </label>
                                <input type="text" class="form-control" name="father_educ_stat"  value="{{ $stud_info_wis->father_educ_stat}}">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Mother's Educational Status: </label>
                                <input type="text" class="form-control" name="mother_educ_stat"  value="{{ $stud_info_wis->mother_educ_stat}}">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">(Total Monthly Income) </label>
                                <input type="text" class="form-control" name="monthly_income"  value="{{ $stud_info_wis->monthly_income}}">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">(Marital Status of Parents) </label>
                                <input type="text" class="form-control" name="mar_parents_stat"  value="{{ $stud_info_wis->mar_parents_stat}}">

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">(Rank of Order) </label>
                                <input type="text" class="form-control" name="rank_order"  value="{{ $stud_info_wis->rank_order}}">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">No. of Brothers: </label>
                                <input type="text" class="form-control" name="no_of_brothers"  value="{{ $stud_info_wis->no_of_brothers}}">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">No. of Sisters: </label>
                                <input type="text" class="form-control" name="no_of_sisters"  value="{{ $stud_info_wis->no_of_sisters}}">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">(Living with) </label>
                                <input type="text" class="form-control" name="living_with"  value="{{ $stud_info_wis->living_with}}">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">(How are you supported) </label>
                                <input type="text" class="form-control" name="how_are_you_supp"  value="{{ $stud_info_wis->how_are_you_supp}}">

                              
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-start">
                        <p class="mt-2 text-dark">How will you describe your realationship with your</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Father: </label>
                                <input type="text" class="form-control" name="rel_with_father"  value="{{ $stud_info_wis->rel_with_father}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Mother: </label>
                                <input type="text" class="form-control" name="rel_with_mother"  value="{{ $stud_info_wis->rel_with_mother}}">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Brother: </label>
                                <input type="text" class="form-control" name="rel_with_brother"  value="{{ $stud_info_wis->rel_with_brother}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Sister: </label>
                                <input type="text" class="form-control" name="rel_with_sister"  value="{{ $stud_info_wis->rel_with_sister}}">

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-start">
                        <p class="mt-2 text-dark">If married</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Name of Spouse: </label>
                                <input type="text" class="form-control" name="spouse_name"  value="{{ $stud_info_wis->spouse_name}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Occupation: </label>
                                <input type="text" class="form-control" name="spouse_occupation"  value="{{ $stud_info_wis->spouse_occupation}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Nationality: </label>
                                <input type="text" class="form-control" name="spouse_nationality"  value="{{ $stud_info_wis->spouse_nationality}}">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Age: </label>
                                <input type="text" class="form-control" name="spouse_age"  value="{{ $stud_info_wis->spouse_age}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Name and Address of Company: </label>
                                <input type="text" class="form-control" name="spouse_comp_name"  value="{{ $stud_info_wis->spouse_comp_name}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Company Tel/Mobile No.: </label>
                                <input type="text" class="form-control" name="company_num"  value="{{ $stud_info_wis->company_num}}">

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-start">
                        <p class="mt-2 text-dark"><strong>HEALTH HISTORY</strong></p>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Past Disease: </label>
                                <input type="text" class="form-control" name="past_disease"  value="{{ $stud_info_wis->past_disease}}">

                              
                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Injuries of Illness: </label>
                                <input type="text" class="form-control" name="injuries"  value="{{ $stud_info_wis->injuries}}">
                             
                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Previous Hospitalization/Operations: </label>
                                <input type="text" class="form-control" name="operations"  value="{{ $stud_info_wis->operations}}">

                            </div>
                            <div class="form-group">
                                <label for="" style="color:dimgray">Menstrual History (Female Only): </label>
                                <input type="text" class="form-control" name="mens_history"  value="{{ $stud_info_wis->mens_history}}">

                            </div>
                        </div>
                    </div>
                    <hr>
                    <p class="text-dark mt-2 mb-5"><i class="text-dark">I certify that all information above are true
                            and
                            correct to the best of my knowledge.</i></p>
                          <div class="row">
                            <div class="col-md-4">
                                <label for="" style="color:dimgray">Date Signed: </label>
                                <div style="font-size:15px;">YYYY-MM-DD</div>
                                <input type="text" class="form-control" name="date_signed"  value="{{$stud_info_wis->date_signed->format('Y-m-d')}}">
                            
                                <label for="" style="color:dimgray">Student ID: </label>
                                <input type="text" class="form-control text-center" style="width: 45px;" name="student_id"  value="{{$stud_info_wis->student_id}}" readonly>
                            </div>
                          </div>
                    <br>
                    <p class="text-dark d-flex justify-content-end">_________________________________________
                    </p>
                    <p class="text-dark d-flex justify-content-end" style=" margin-top: -20px;">
                        Designated Guidance Counselor's Name and Signature</p>
                </div>
                <button type="submit" class="btn btn-primary"><span class="fas fa-save"></span> Submit Changes</button>
            </form>
            </div>
        </div>
    @empty
        <tr>
            <p colspan="5" class="text-dark"><span class="fas fa-exclamation-circle text-danger"></span>
                No Information Attached!</p>
        </tr>
    @endforelse
@endsection
