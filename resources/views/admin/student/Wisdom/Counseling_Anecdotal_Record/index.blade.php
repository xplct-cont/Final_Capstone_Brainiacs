@extends('layouts.layoutsidebar')

@section('content')
<div class="p-1">
    <a class="fas fa-arrow-left" style="font-size:20px; color:blue;" href="{{ url('show-student-wisdom/' . $student_wis->id)}}"></a>
</div>
    <h1 class="text-dark p-3"
        style="font-weight:normal; font-size: 25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; ">
        Counseling Anecdotal Records of {{ $student_wis->lastname }}, {{ $student_wis->firstname }} from
        {{ $student_wis->year_section }}</h1>
    <hr>

    <div class="container col-md-12" style="">
        <div class="card">
            <div class="card-header text-center">
                <h1 class="text-dark "
                    style="font-weight:normal; font-size: 25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; ">
                    List of Records
                </h1>

                <div class="d-flex justify-content-end">
                    <a href="{{ url('show-student-wisdom/' . $student_wis->id . '/counseling_anecdotal_record_wisdom/create/') }}"
                        class="btn btn-primary ml-2" style="margin-top: 0px;"><span class=" mr-1"></span>
                        Create New Record
                    </a>
                </div>
                <hr>
                <table class="table table-striped table-sm text-dark text-center bg-light">
                    <thead class="bg-secondary">
                        <tr>
                            <th>Date/Time Called</th>
                            <th>Reasons for Contact</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($counseling_anecdotal_wisdom as $coun_anec_wis)
                            <tr>
                                <td class="text-dark">{{ $coun_anec_wis->date_time_called->format('F d,  Y - g:i A') }}</td>
                                <td class="text-dark">{{ $coun_anec_wis->reasons_for_contact }}</td>
                                <td><a href="{{ url('/show-student-wisdom/'.$coun_anec_wis->student->id.'/counseling_anecdotal_record_wisdom/' . $coun_anec_wis->id) }}"
                                        class="btn btn-xs "><i class="fas fa-search text-info"></i></a></td>
                                <td><a href="{{ url('delete_counseling_anecdotal_record_wisdom/' . $coun_anec_wis->id) }}"
                                        class="btn btn-xs "><i class="text-danger fas fa-trash-alt"></i></a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-dark"><span
                                        class="fas fa-exclamation-circle text-danger"></span> Empty Counseling Anecdotal
                                    Records!</td>
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
