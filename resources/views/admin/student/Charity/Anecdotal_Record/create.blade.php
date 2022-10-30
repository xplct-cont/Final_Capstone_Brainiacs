@extends('layouts.layoutsidebar')

@section('content')
<div class="p-3">
    <a class="fas fa-arrow-left" style="font-size:20px; color:blue;" href="{{ url('show-student-charity/' . $student_cha->id . '/anecdotal_record_charity') }}"></a>
</div>
    <div class="d-flex justify-content-center mb-3">
        <h1 class="text-dark text-center" style="font-size: 25px;">Create Anecdotal Record</h1>
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
                <form action="{{ url('/add_anecdotal_record_charity') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="" style="color:dimgray">Observation Date/Time</label>
                                <input type="datetime-local" name="observation_date_time" class="form-control" required>

                            </div>

                            <div class="form-group">
                                <label for="" style="color:dimgray">Student Name</label>
                                <input type="text" class="form-control"
                                    value="{{ $student_cha->lastname }}, {{ $student_cha->firstname }} {{ $student_cha->middlename }}"
                                    readonly>

                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Observer/Class Adviser</label>
                                <input type="text" class="form-control" value="{{ $student_cha->user->name }}" readonly>


                                <div class="form-group mt-3">
                                    <label for="" style="color:dimgray">Year/Section</label>
                                    <input type="text" class="form-control" value="{{ $student_cha->year_section }}"
                                        readonly>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" style="color:dimgray">Description of Incident</label>
                            <textarea id="" type="text" class="form-control" placeholder="" title="" rows="5" required
                                name="description_of_incident" placeholder="Write the description of incident"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="" style="color:dimgray">Location of Incident</label>
                            <textarea id="" type="text" class="form-control" placeholder="" title="" rows="5" required
                                name="location_of_incidents" placeholder="Write the location of incident"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="" style="color:dimgray">Actions Taken</label>
                            <textarea id="" type="text" class="form-control" placeholder="" title="" rows="5" required
                                name="actions_taken" placeholder="Write the actions taken"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="" style="color:dimgray">Recommendations</label>
                            <textarea id="" type="text" class="form-control" placeholder="" title="" rows="5" required
                                name="recommendations" placeholder="Write some recommendations"></textarea>
                        </div>

                    </div>

                    <p class="text-dark">Note: <i class="text-dark">Information revealed is held strictly
                            CONFIDENTIAL.</i></p>

                    <div class="form-group" style="width: 100px;">
                        <label for="" style="color:dimgray">Student ID</label>
                        <input type="text" name="student_id" class="form-control text-center"
                            value="{{ $student_cha->id }}" readOnly>
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
