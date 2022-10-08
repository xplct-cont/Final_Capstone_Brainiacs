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
        @foreach ($students as $faith)
            <tr class="text-center">

                <td>{{ $faith->id }}</td>
                <td>{{ $faith->lastname }}</td>
                <td>{{ $faith->firstname }}</td>
                <td>{{ $faith->middlename }}</td>
                <td>{{ $faith->year_section }}</td>
                <td>{{ $faith->gender }}</td>
                <td>{{ $faith->email }}</td>
                <td>{{ $faith->address }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
