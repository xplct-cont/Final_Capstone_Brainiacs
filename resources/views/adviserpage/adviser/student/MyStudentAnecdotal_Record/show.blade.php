@extends('adviserpage.app')

@section('content')
<div class="p-1">
    <a class="fas fa-arrow-left" style="font-size:20px; color:blue;" href="{{ url('show-my-student/' . $anecdotal_myStud->student->id . '/anecdotal_record_myStudent') }}"></a>
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
        href="{{ route('export_myStudents_anecdotal_pdf', $anecdotal_myStud->id) }}"><span class="fas fa-file-pdf"
            style="font-size: 15px;"></span> Generate PDF</a>

            </div>
            <div class="d-flex justify-content-center">
                <img src="/images/image17.png" class="user-image img-circle elevation-2 "
                    alt="User Image"
                    style="width: 120px; height:120px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
            </div>
            <div class="container mx-auto">
                <form action="{{ url('update_anecdotal_record_myStudent/' . $anecdotal_myStud->id) }}" method="POST" accept-charset="UTF-8">
                    @csrf
                    @method('PUT')
                 
                <h1 class="text-center mt-4"
                    style=" color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 22px; color:rgba(60, 58, 58, 0.904);">
                    Pangangan National High School </h1>
                <p class="text-center" style="font-weight:bold; font-size: 20px; color:rgba(60, 58, 58, 0.904);">Guidance
                    Office</p>
                <p class="text-center text-dark" style="position: relative; top: -15px;">Talisay, Calape, Bohol</p>


                <p class="text-center text-dark" style="font-size: 18px; font-weight: 500; color:rgba(60, 58, 58, 0.904); ">
                    Anecdotal Record</p>
                <hr>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="" style="color:dimgray">Observation Date and Time: </label>
                            <input type="text" class="form-control" value="{{ $anecdotal_myStud->observation_date_time->format('F d,  Y - g:i A') }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="" style="color:dimgray">Student Name: </label>
                            <input type="text" class="form-control" value="{{ $anecdotal_myStud->student->firstname }} {{ $anecdotal_myStud->student->middlename }} {{ $anecdotal_myStud->student->lastname }}" readonly>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="" style="color:dimgray">Observer/Class Adviser: </label>
                            <input type="text" class="form-control" value="{{ $anecdotal_myStud->student->user->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="" style="color:dimgray">Year/Section: </label>
                            <input type="text" class="form-control" value="{{ $anecdotal_myStud->student->year_section }}" readonly>
                        </div>
                      
                    </div>

                    <div class="col-md-12 mb-3 mt-2">
                        <div class=" p-2 bg-light" style="border: 1px solid dimgray;">

                            <label for="" style="color:dimgray;">Description of Incident</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="description_of_incident">{{ $anecdotal_myStud->description_of_incident }}</textarea>
                            <br>
                            <label for="" style="color:dimgray;">Description of Location/Setting</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="location_of_incidents">{{ $anecdotal_myStud->location_of_incidents }}</textarea>
                            <br>
                            <label for="" style="color:dimgray;">Action Taken</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="actions_taken">{{ $anecdotal_myStud->actions_taken }}</textarea>
                            <br>
                            <label for="" style="color:dimgray;">Recommendation</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="recommendations">{{ $anecdotal_myStud->recommendations }}</textarea>
                            <p class="text-dark mt-2">Note: <i class="text-dark">Information revealed is held strictly
                                    CONFIDENTIAL.</i></p>
                             <div class="form-group">
                            <label for="" style="color:dimgray">Student ID: </label>
                            <input type="text" class="form-control text-center" style="width: 45px;" name="student_id" value="{{ $anecdotal_myStud->student->id }}" readonly>
                            </div>
                            <br>
                            <p class="text-dark d-flex justify-content-end">_________________________________________
                            </p>
                            <p class="text-dark d-flex justify-content-end" style=" margin-top: -20px;">
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
