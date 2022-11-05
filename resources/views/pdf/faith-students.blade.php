<!DOCTYPE html>
<html>

<head>
    <style>
        th {
            font-size: 12px;
        }

        tr {
            font-size: 12px;
        }

        h2 {
            text-align: center;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            font-size: 18px;
            text-align: center;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 8px;
            padding-bottom: 8px;
            text-align: left;
            background-color: #5bc0de;
            color: dimgray;
            text-align: center;


        }
    </style>
</head>

<body style="text-center">

    <h1 style="font-size: 25px; text-center; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Pangangan
        National High School - Talisay, Calape, Bohol</h1>
    <hr>
    <h2 style="font-size: 20px; text-center; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">List of
        Students in Grade 11 - Faith</h2>



    <table id="customers">
        <tr>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Year/Section</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Address</th>
        </tr>
        @if (count($students))
            @foreach ($students as $wisdom)
                <tr>
                    <td>{{ $wisdom->lastname }}</td>
                    <td>{{ $wisdom->firstname }}</td>
                    <td>{{ $wisdom->middlename }}</td>
                    <td>{{ $wisdom->year_section }}</td>
                    <td>{{ $wisdom->age }}</td>
                    <td>{{ $wisdom->gender }}</td>
                    <td>{{ $wisdom->address }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">No Grade 11 - Faith Students Found!</td>
            </tr>

        @endif

    </table>

</body>

</html>
