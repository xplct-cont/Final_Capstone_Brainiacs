@extends('layouts.layoutsidebar')

@section('content')
    <h1 class="text-dark p-3"
        style="font-weight:normal; font-size: 25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; ">
        Parent Conference Records of {{ $student_fai->lastname }}, {{ $student_fai->firstname }} from
        {{ $student_fai->year_section }}</h1>
    <hr>

    <div class="container" style="">
        <div class="card">
            <div class="card-header text-center">
                <h1 class="text-dark "
                    style="font-weight:normal; font-size: 25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; ">
                    List of Records
                </h1>

                <div class="d-flex justify-content-end">
                    <a href="{{ url('show-student-faith/' . $student_fai->id . '/parent_conference_record_faith/create/') }}"
                        class="btn btn-primary ml-2" style="margin-top: 0px;"><span class=" mr-1"></span>
                        Create New Record
                    </a>
                </div>
                <hr>
                <table class="table table-striped  table-sm text-dark text-center bg-light">
                    <thead class="bg-secondary">
                        <tr>

                            <th>Date</th>
                            <th>Reasons for Contact</th>
                            <th>View</th>~
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($parent_conference_record_faith as $parent_confer_fai)
                            <tr>
                                <td class="text-dark">{{ $parent_confer_fai->date ->format('F d,  Y - l')}}</td>
                                <td class="text-dark">{{ $parent_confer_fai->reason_for_contact }}</td>
                                <td><a href="{{ url('/show-student-faith/'.$parent_confer_fai->student->id.'/parent_conference_record_faith/' . $parent_confer_fai->id) }}"
                                        class="btn btn-xs "><i class="fas fa-search text-info"></i></a></td>
                                <td><a href="{{ url('delete_parent_conference_record_faith/' . $parent_confer_fai->id) }}"
                                        class="btn btn-xs "><i class="text-danger fas fa-trash-alt"></i></a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-dark"><span
                                        class="fas fa-exclamation-circle text-danger"></span> Empty Parent Conference Records!</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <style scoped>
        td {
            border: solid 1px #5bc0de;
            border-style: none solid solid none;
            padding: 5px;
        }
    </style>
@endsection
