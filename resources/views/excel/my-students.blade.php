<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Year/Section</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $myStudents)
            <tr class="text-center">

                <td>{{ $myStudents->id }}</td>
                <td>{{ $myStudents->lastname }}</td>
                <td>{{ $myStudents->firstname }}</td>
                <td>{{ $myStudents->middlename }}</td>
                <td>{{ $myStudents->year_section }}</td>
                <td>{{ $myStudents->gender }}</td>
                <td>{{ $myStudents->email }}</td>
                <td>{{ $myStudents->address }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
