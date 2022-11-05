@extends('adviserpage.app')

@section('content')
    <div class="container d-flex justify-content-center" style="position:relative; top: 5px;">
        <div class="p-2 col-md-8">
            <div class="card-header">
                <h1 class="text-center"
                    style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin:auto; font-size: 25px; color:dimgray;">
                    EDIT STUDENT INFORMATIONS</h1>
            </div> <br>

            <form action="{{ url('update-my-student/' . $student->id) }}" method="POST" accept-charset="UTF-8">
                @csrf
                @method('PUT')


                <div class="input-group mb-3">
                    <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary"
                            style="width: 43px;">Ln</span></label>
                    <input type="text" name="firstname" value="{{ $student->firstname }}" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary"
                            style="width: 43px;">Fn</span></label>
                    <input type="text" name="lastname" value="{{ $student->lastname }}" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary"
                            style="width: 43px;">Mn</span></label>
                    <input type="text" name="middlename" value="{{ $student->middlename }}" class="form-control"
                        required>
                </div>

                <div class="input-group mb-3">
                    <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary"
                            style="width: 43px;">Y/S</span></label>
                    <input type="text" name="year_section" value="{{ $student->year_section }}" class="form-control"
                        readonly>
                </div>

                <div class="input-group mb-3">
                    <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary"
                            style="width: 43px;">AG</span></label>
                    <input type="text" name="age" class="form-control" value="{{ $student->age }}" required>
                </div>

                <div class="input-group mb-3">
                    <label for="" style="color:dimgray;"><span class="fas fa-envelope input-group-text bg-secondary"
                            style="width: 43px;"></span></label>
                    <input type="email" name="email" value="{{ $student->email }}" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary"
                            style="width: 43px;">Pn</span></label>
                    <input type="text" name="parent_name" value="{{ $student->parent_name }}" class="form-control"
                        required>
                </div>

                <div class="input-group mb-3">
                    <label for="" style="color:dimgray;"><span class="fas fa-envelope input-group-text bg-secondary"
                            style="width: 43px;"></span></label>
                    <input type="email" name="parent_email" value="{{ $student->parent_email }}" class="form-control">
                </div>

                <div class="input-group mb-3">
                    <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary"
                            style="width: 43px;">Ad</span></label>
                    <input type="text" name="address" value="{{ $student->address }}" class="form-control" required>
                </div>

              
                <div class="form-group text-dark d-flex justify-content-center">
                    <div class="maxl">
                        <label class="radio inline mr-5">
                            <input type="radio" name="gender" value="Male" {{ ($student->gender == 'Male' ? ' checked' : 'Unchecked') }}>
                            <span>Male</span>
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="gender" value="Female"  {{ ($student->gender == 'Female' ? ' checked' : 'Unchecked') }}>
                            <span>Female</span>
                        </label>
                    </div>
                </div>


                <div class="mb-3">
                    <button type="submit" class="btn btn-success float-right btn-sm"><span class="fas fa-save"></span> Save
                        Changes</button>

                </div>
            </form>
        </div>
    </div>
@endsection
