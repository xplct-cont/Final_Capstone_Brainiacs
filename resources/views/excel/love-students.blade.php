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
        @foreach ($students as $love)
        <tr class="text-center">
          
          <td>{{$love->id}}</td>
          <td>{{$love->lastname}}</td>
          <td>{{$love->firstname}}</td>
          <td >{{$love->year_section}}</td>
          <td >{{$love->email}}</td>
          <td>{{$love->address}}</td>
        </tr>
            
        @endforeach

    </tbody>
  </table>