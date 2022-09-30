@extends('adviserpage.app')

@section('content')

<div class="container" style="height: 620px;">
    <div class="row">

        <div class="card bg-dark col-md-12 mt-2 elevation-4 text-dark " style="height:600px;">
       

            <h1 style="color:dimgray;" class="p-3 mb-5"> <i style=" font-size:32px;color: white;"> Welcome {{Auth::user()->name}}!</i></h1>
            <h2 class="" style="font-size: 46px; margin:auto; position:relative; top: -25px; color:white; text-shadow: 2px 2px #17a2b8;">Guidance Information System</h2>
            <img src="/images/image17.png" class="user-image img-circle elevation-2 mx-auto" alt="User Image" style="width: 230px; height:230px; border-radius: 50%; position:relative; top: -20px; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
            <h3 class="" style="font-size: 22px; margin:auto; position:relative; top:-15px; color:white;">Pangangan National High School<br></h3>
            <h3 class="" style="font-size: 18px; margin:auto; position:relative; top:-55px; color:white;">Talisay, Calape, Bohol<br></h3>
          
        </div>
    </div>
</div>


<style scoped>

.card{
    background-image: url('/images/bbb.png');
    height:100px;
}
</style>



@endsection