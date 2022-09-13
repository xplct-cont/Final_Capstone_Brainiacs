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

<h1 class="text-dark text-center" style="margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Advisers List of Informations</h1>

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


