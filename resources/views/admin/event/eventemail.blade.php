@extends('layouts.layoutsidebar')


@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>Laravel Email Functionality</title>
</head>
<body class="bg-dark">
 
<div class="col-md-6 text-center shadow-lg rounded text-dark" style="margin:auto; position:relative; top: 50px;">
   
    <div class="card">
        <div class="card-header bg-dark text-light">
            Event Number : {{$event->id}}
        </div>
        <div class="card-body">
            <form action="{{url('/send-event')}}" method="POST">
            @csrf
            
            
              <div class="mb-3">
                <label for="">Title:</label>
                <input type="title" name="title" value="{{$event->title}}" class="form-control" style="height:100px;" readonly  >
              </div>
            
              <div class="mb-3">
                <label for="">Start:</label>
                <input type="start" name="start" value="{{$event->start}}" class="form-control" readonly>
              </div>
              <div class="mb-3">
                <label for="">End:</label>
                <input type="end" name="end" value="{{$event->end}}" class="form-control" readonly>
              </div>


              <button type="submit" class="btn btn-sm btn-success">Send</button>
            </form>



       </div>
     </div>
    </div>
    
</body>

</html>


@endsection
