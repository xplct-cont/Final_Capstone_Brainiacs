@extends('adviserpage.app')

@section('content')
@if ($message = Session::get('status'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="elevation-1 col-md-10 mx-auto mb-5" style="position: relative; top: 30px;">
<h1
    style="position: absolute; left:35%; color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 22px; color:dimgray;">
    Pangangan National High School </h1> <br>
<p class="text-center text-dark">Talisay, Calape, Bohol</p>
<p class="text-center text-dark" style="font-weight:bold; font-size: 20px;">Guidance Office</p>
<hr>
<p class="text-center text-dark" style="font-size: 18px;">Anecdotal Record</p>

</div>
<div class="row d-flex justify-content-center text-dark ">
<div class="col-md-11 elevation-1 p-3 rounded  mt-2 bg-light mb-3">

    <div class="container mb-0">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" style="color:dimgray;">Observation Date and Time</label>
                        <input type="datetime-local" name="observation_date_time" class="form-control"
                            value="{{ $anecdotal_myStud->observation_date_time }}" readonly>

                    </div>
                    <div class="form-group">
                        <label for="" style="color:dimgray;">Lastname</label>
                        <input type="text" name="" class="form-control"
                            value="{{ $anecdotal_myStud->student->lastname }}" readonly>

                    </div>
                    <div class="form-group">
                        <label for="" style="color:dimgray;">Firstname</label>
                        <input type="text" name="" class="form-control"
                            value="{{ $anecdotal_myStud->student->firstname }}" readOnly>

                    </div>
                    <div class="form-group">
                        <label for="" style="color:dimgray;">Middlename</label>
                        <input type="text" name="" class="form-control"
                            value="{{ $anecdotal_myStud->student->middlename }}" readOnly>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" style="color:dimgray;">Observer/Class Adviser</label>
                        <input type="text" name="" class="form-control"
                            value="{{ $anecdotal_myStud->student->user->name }}" readOnly>

                    </div>

                    <div class="form-group">
                        <label for="" style="color:dimgray;">Year/Section</label>
                        <input type="text" name="" class="form-control"
                            value="{{ $anecdotal_myStud->student->year_section }}" readOnly>

                    </div>



                </div>

                <div class="col-md-12 mb-3">
                    <label for="" style="color:dimgray;">Description of Incident</label>
                    <textarea id="" type="text" class="form-control" placeholder="" title="" rows="5" readonly
                        name="description_of_incident">{{ $anecdotal_myStud->description_of_incident }}</textarea>
                    <br>
                    <label for="" style="color:dimgray;">Description of Location/Setting</label>
                    <textarea id="" type="text" class="form-control" placeholder="" title="" rows="5" readonly
                        name="location_of_incident">{{ $anecdotal_myStud->location_of_incidents }}</textarea>
                    <br>
                    <label for="" style="color:dimgray;">Action Taken</label>
                    <textarea id="" type="text" class="form-control" placeholder="" title="" rows="5" readonly
                        name="action_taken">{{ $anecdotal_myStud->actions_taken }}</textarea>
                    <br>
                    <label for="" style="color:dimgray;">Recommendation</label>
                    <textarea id="" type="text" class="form-control" placeholder="" title="" rows="5" readonly
                        name="recommendations">{{ $anecdotal_myStud->recommendations }}</textarea>
                    <p class="text-dark">Note: <i class="text-dark">Information revealed is held strictly
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

@endsection