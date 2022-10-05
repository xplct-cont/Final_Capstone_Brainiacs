<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Last Name</th>
        <th scope="col">First Name</th>
        <th scope="col">Year/Section</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($students as $charity)
        <tr class="text-center">
          
          <td>{{$charity->id}}</td>
          <td>{{$charity->lastname}}</td>
          <td>{{$charity->firstname}}</td>
          <td >{{$charity->year_section}}</td>
          <td >{{$charity->email}}</td>
          <td>{{$charity->address}}</td>
        </tr>
            
        @endforeach

    </tbody>
  </table>