<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #5bc0de;
  color: dimgray;
}
</style>
</head>
<body>

<h1 style="margin:auto; font-size:25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Pangangan National High School - Talisay, Calape, Bohol</h1><hr>
<h1 style="margin:auto; font-size:20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">List of Students in Grade 12 - Love</h1>


<table id="customers">
  <tr>
    <th scope="col">Last Name</th>
    <th scope="col">First Name</th>
    <th scope="col" >Year/Section</th>
    <th scope="col" >Email</th>
    <th scope="col">Address</th>
  </tr>
  @if(count($students))
  @foreach($students as $love)
  <tr>
    <td>{{$love->lastname}}</td>
    <td>{{$love->firstname}}</td>
    <td>{{$love->year_section}}</td>
    <td>{{$love->email}}</td>
    <td>{{$love->address}}</td>
  </tr>
  @endforeach
  @else
   <tr>
    <td colspan="3">No Grade 12 - Love Students Found!</td>
   </tr>

  @endif
  
</table>

</body>
</html>


