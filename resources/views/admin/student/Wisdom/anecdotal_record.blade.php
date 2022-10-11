@extends('layouts.layoutsidebar')

@section('content')


<table class="table table-sm">

    <thead class="text-dark">
    <tr>
        <th>Description of incident</th>
        <th>Lastname of Student</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($anecdotal_wisdom as $item)
        <tr>
            <td class="text-dark">{{ $item->description_of_incident}}</td>
            <td class="text-dark">{{ $item->student->lastname}}</td>
        </tr>
            
        @endforeach
        
    </tbody>
</table>

@endsection