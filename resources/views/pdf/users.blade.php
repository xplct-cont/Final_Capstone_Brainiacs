<!DOCTYPE html>
<html>
<head>
<style>



th{
  font-size: 15px;
}

tr{
  font-size: 15px;
}
h2{
  text-align: center;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  font-size: 18px;
  text-align: center;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

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
<img src="{{ public_path('images/image17.png') }}" style="width: 100px; height: 100px; border-radius: 50%; margin-left: 300px;">
<h1 style="font-size: 25px; text-center; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Pangangan National High School - Talisay, Calape, Bohol</h1><hr>
<h2 style="font-size: 20px; text-center; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Senior High School Advisers</h2>


 <table id="customers">
  <tr>

    <th>ID</th>
    <th>Profile Image</th>
    <th>Name</th>
    <th>Advisory</th>
    <th>Contact Number</th>
    <th>Email</th>
  </tr>
  @if(count($users))
  @foreach($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td> <img src="{{ public_path('images/avatars/' . $user->avatar) }}" style="width: 30px; height: 30px; border-radius: 50%;"></td>
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


