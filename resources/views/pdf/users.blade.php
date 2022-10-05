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

<h1 style="font-size: 25px; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Pangangan National High School - Talisay, Calape, Bohol</h1><hr>
<h1 style="font-size: 20px; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Senior High School Advisers</h1>

<table id="customers">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Advisory</th>
    <th>Contact Number</th>
    <th>Email</th>
  </tr>
  @if(count($users))
  @foreach($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->advisory}}</td>
    <td>{{$user->contact_no}}</td>
    <td>{{$user->email}}</td>
  </tr>
  @endforeach
  @else
   <tr>
    <td colspan="3">No Advisers Found!</td>
   </tr>

  @endif
  
</table>

</body>
</html>


