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
        @foreach ($students as $hope)
            <tr class="text-center">

                <td>{{ $hope->id }}</td>
                <td>{{ $hope->lastname }}</td>
                <td>{{ $hope->firstname }}</td>
                <td>{{ $hope->middlename }}</td>
                <td>{{ $hope->year_section }}</td>
                <td>{{ $hope->gender }}</td>
                <td>{{ $hope->email }}</td>
                <td>{{ $hope->address }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
