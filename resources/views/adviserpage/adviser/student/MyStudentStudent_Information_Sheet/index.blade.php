@extends('adviserpage.app')

@section('content')
    @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <h1 class="text-dark p-3"
        style="font-weight:normal; font-size: 25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; ">
        Student Information Sheet of {{ $student_myS->lastname }}, {{ $student_myS->firstname }} from
        {{ $student_myS->year_section }}</h1>
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

                    <form action="{{ url('/upload_student_information_myStudent') }}" method="POST"
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
                                            value="{{ $student_myS->lastname }}, {{ $student_myS->firstname }} {{ $student_myS->middlename }}"
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
                                        <input type="text" class="form-control" value="{{ $student_myS->year_section }}"
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
                                        <input type="text" class="form-control" value="{{ $student_myS->age }}"
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
                                        <input type="text" class="form-control" value="{{ $student_myS->address }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:dimgray">Sex</label>
                                        <input type="text" class="form-control" value="{{ $student_myS->gender }}"
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
                                            name="student_id" value="{{ $student_myS->id }}" readonly>
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

    @forelse ($student_information_sheet_myStudent as $stud_info_myS)
        <div class="row d-flex justify-content-center text-dark">
            <div class="col-md-11 elevation-4 p-3 rounded  mt-2 bg-light mb-3">
                <a href="{{ url('delete_student_information_sheet_myStudent/' . $stud_info_myS->id) }}"
                    class="btn btn-sm btn-danger mb-1"><i class="text-light fas fa-trash"></i></a>
            
                <div class="d-flex justify-content-end">

                    <a class="btn btn-danger mt-2 ml-2 mr-2" style=""
                        href="{{ route('export_myStudents_anecdotal_pdf', $student_myS->id) }}"><span
                            class="fas fa-file-pdf" style="font-size: 15px;"></span> Generate PDF</a>
                </div>
               
                <div class="container mx-auto">

                    <h1 class="text-center mt-4"
                        style=" color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 22px; color:rgba(60, 58, 58, 0.904);">
                        Pangangan National High School </h1>
                    <p class="text-center" style="font-weight:bold; font-size: 20px; color:rgba(60, 58, 58, 0.904);">
                        Guidance
                        Center</p>
                    <p class="text-center text-dark" style="position: relative; top: -15px;">Talisay, Calape, Bohol</p>

                    <div class="form-group mt-5">
                        <p class="text-dark"
                            style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                            <span class="text-dark" style="font-weight: 500">Type of Student: </span><span
                                class="text-dark"
                                style="border-bottom: 1px solid black">{{ $stud_info_myS->type_of_student }}</span>
                        </p>
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
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Name: </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->student->lastname }},
                                        {{ $stud_info_myS->student->firstname }}
                                        {{ $stud_info_myS->student->middlename }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Name and Address of School Last
                                        Attended: </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->last_attended_school }}</span>
                                </p>
                            </div>
                        </div>


                        <div class="col-md-6">

                            <div class="form-group5">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Year/Section: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->student->year_section }}</span>
                                </p>
                            </div>
                            <div class="form-group ">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">School Year: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->school_year }}</span>
                                </p>
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
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Date of Birth: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ Carbon\Carbon::parse($stud_info_myS->birthdate)->format('F d,  Y') }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Nationality: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->nationality }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Status: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->status }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Age: </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->student->age }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Height: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->height }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Mobile Number: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->number }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Place of Birth: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->birthplace }}</span>
                                </p>
                            </div>
                            <div class="form-group ">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Religion: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->religion }}</span>
                                </p>
                            </div>
                            <div class="form-group ">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Home Address: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->student->address }}</span>
                                </p>
                            </div>
                            <div class="form-group ">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Sex: </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->student->gender }}</span>
                                </p>
                            </div>
                            <div class="form-group ">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Weight: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->weight }}</span>
                                </p>
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
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Elementary: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->elementary }}</span>
                                </p>
                            </div>
                            <div class="form-group ">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Secondary: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->secondary }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group ">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Elementary Honor/s Received:
                                    </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->elem_honors_rec }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Secondary Honor/s Received:
                                    </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->secon_honors_rec }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group ">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Year Graduated in Elementary:
                                    </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->elem_year_grad }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Year Graduated in Secondary:
                                    </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->secon_year_grad }}</span>
                                </p>
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
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Year Level Last Attended:
                                    </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->level_last_attended }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Reason/s why transfer: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->reasons_for_transfer }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">School and Address: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->school_add }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Year: </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->year }}</span>
                                </p>
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
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Name of Organization: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->org_name }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Position: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->position }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Year: </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->org_year }}</span>
                                </p>
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
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Favorite Subject: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->fav_sub }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Likes: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->likes }}</span>
                                </p>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Most Difficult Subject: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->most_dif_sub }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Dislikes: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->dislikes }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Interest/Hobbies: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->hobbies }}</span>
                                </p>
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
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Father: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->father }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Age: </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->father_age }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Occupation: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->father_occupation }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Office Address: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->father_off_ad }}</span>
                                </p>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Mother: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->mother }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Age: </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->mother_age }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Occupation: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->mother_occupation }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Office Address: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->mother_off_ad }}</span>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-start">
                        <p class="mt-2 text-dark"><strong>(Educational Status)</strong></p>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Father's Educational Status:
                                    </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->father_educ_stat }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Mother's Educational Status:
                                    </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->mother_educ_stat }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">(Total Monthly Income) </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->monthly_income }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">(Marital Status of Parents)
                                    </span><span class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->mar_parents_stat }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">(Rank of Order) </span><span
                                        class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->rank_order }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">No. of Brothers: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->no_of_brothers }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">No. of Sisters: </span><span
                                        class="text-dark"
                                        style="border-bottom: 1px solid black">{{ $stud_info_myS->no_of_sisters }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">(Living with) </span><span
                                        class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->living_with }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">(How are you supported)
                                    </span><span class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->how_are_you_supp }}</span>
                                </p>
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
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Father: </span><span
                                        class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->rel_with_father }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Mother: </span><span
                                        class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->rel_with_mother }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Brother: </span><span
                                        class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->rel_with_brother }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Sister: </span><span
                                        class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->rel_with_sister }}</span>
                                </p>
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
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Name of Spouse: </span><span
                                        class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->spouse_name }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Occupation: </span><span
                                        class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->spouse_occupation }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Nationality: </span><span
                                        class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->spouse_nationality }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Age: </span><span
                                        class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->spouse_age }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Name and Address of Company:
                                    </span><span class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->spouse_comp_name }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Company Tel/Mobile No.:
                                    </span><span class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->company_num }}</span>
                                </p>
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
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Past Disease: </span><span
                                        class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->past_disease }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Injuries of Illness: </span><span
                                        class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->injuries }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Previous
                                        Hospitalization/Operations:
                                    </span><span class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->operations }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-dark"
                                    style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                    <span class="text-dark" style="font-weight: 500">Menstrual History (Female Only):
                                    </span><span class="text-dark" style="border-bottom: 1px solid black">
                                        {{ $stud_info_myS->mens_history }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p class="text-dark mt-2 mb-5"><i class="text-dark">I certify that all information above are true
                            and
                            correct to the best of my knowledge.</i></p>
                    <p class="text-dark d-flex justify-content-start" style=" margin-top: -20px;">
                        Date: {{ Carbon\Carbon::parse($stud_info_myS->date_signed)->format('F d,  Y') }}</p>
                    <br>
                    <p class="text-dark d-flex justify-content-end">_________________________________________
                    </p>
                    <p class="text-dark d-flex justify-content-end" style=" margin-top: -20px;">
                        Designated Guidance Counselor's Name and Signature</p>
                </div>
            </div>
        </div>
    @empty
        <tr>
            <p colspan="5" class="text-dark"><span class="fas fa-exclamation-circle text-danger"></span>
                No Information Attached!</p>
        </tr>
    @endforelse
@endsection
