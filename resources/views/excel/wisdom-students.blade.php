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
        @foreach ($students as $wisdom)
            <tr class="text-center">

                <td>{{ $wisdom->id }}</td>
                <td>{{ $wisdom->lastname }}</td>
                <td>{{ $wisdom->firstname }}</td>
                <td>{{ $wisdom->middlename }}</td>
                <td>{{ $wisdom->year_section }}</td>
                <td>{{ $wisdom->gender }}</td>
                <td>{{ $wisdom->email }}</td>
                <td>{{ $wisdom->address }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
