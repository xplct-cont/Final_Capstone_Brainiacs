<ul style="position:relative; left: -38px; margin:auto; height: 50px;">
    <li class="nav-item list-unstyled"> 
     <a href="{{url('/adminprofile')}}">
        <img src="/images/avatars/{{Auth::user()->avatar}}"
                  class="user-image img-circle elevation-4" alt="User Image" style="width: 37px; height:37px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
                   <span class="" style="font-size: 13px; font-weight:bold; margin:auto; color:whitesmoke;">{{ Auth::user()->name }}</span><br></a>
                     <p style="font-size: 10px; position:relative; top:-10px; left: 50px; ">Administrator</p>
             <hr size="1" color="white" style=" position:relative; width: 145px; left: 7px; top: -20px; ">
             </li>
         </ul>  
     
 <li class="nav-item">
     <a href="{{ route('home') }}"
        class="nav-link {{ Request::is('home*') ? '' : '' }}">
         <p>Dashboard</p>
         <i class="fas fa-tachometer-alt fa-pull-left fa-md "></i>
     </a>
 </li>
 <li class="nav-item">
     <a href="{{ route('advisers') }}"
        class="nav-link {{ Request::is('advisers*') ? '' : '' }}">
         <p>Advisers</p>
         <i class="fas fa-chalkboard-teacher fa-pull-left fa-md "></i>
     </a>
 </li>

 <li class="nav-item">
    <a href="{{ route('users') }}"
       class="nav-link {{ Request::is('users') ? '': ''  }}">
        <p>Pending Requests</p>
        <i class="fas fa-exclamation-circle fa-pull-left fa-md "></i>
    </a>
</li>




<li class="text-white text-center mt-2" style="padding:5px; font-size:15px; background-color:dimgray;">
    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-white">GRADE 11 SECTIONS</a>
    <ul class="collapse list-unstyled" id="pageSubmenu">
        <li style="margin-top: 12px;">
            <a href="{{ route('advisers') }}" style="color:white; margin-left: -50px;">Grade 11 - Charity</a><i class="fas fa-graduation-cap fa-pull-left fa-md " style="margin-left: 10px;  margin-right: 25px;"></i>
        </li>
        <li style="margin-top: 10px;">
            <a href="{{ route('advisers') }}" style="color:white; margin-left: -67px;">Grade 11 - Faith</a><i class="fas fa-graduation-cap fa-pull-left fa-md " style="margin-left: 10px; margin-right: 25px;"></i>
        </li>
        <li style="margin-top: 10px;">
            <a href="{{ route('advisers') }}" style="color:white; margin-left: -44px;">Grade 11 - Wisdom</a><i class="fas fa-graduation-cap fa-pull-left fa-md " style="margin-left: 10px; margin-right: 25px;"></i>
        </li>
    </ul>
</li>




<li class="text-white text-center mt-3" style="padding:5px; font-size:15px; background-color:dimgray;">
    <a href="#Submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-white">GRADE 12 SECTIONS</a>
    <ul class="collapse list-unstyled" id="Submenu">
        <li style="margin-top: 12px;">
            <a href="{{ route('advisers') }}" style="color:white; margin-left: -63px;">Grade 12 - Love</a><i class="fas fa-graduation-cap fa-pull-left fa-md " style="margin-left: 10px; margin-right: 25px;"></i>
        </li>
        <li style="margin-top: 10px;">
            <a href="{{ route('advisers') }}" style="color:white; margin-left: -60px;">Grade 12 - Hope</a><i class="fas fa-graduation-cap fa-pull-left fa-md " style="margin-left: 10px; margin-right: 25px;"></i>
        </li>
    </ul>
</li>






{{-- <div class="eleven text-white text-center mt-2" style="padding:5px; font-size:15px; background-color:dimgray;">
    GRADE 11 SECTIONS
</div>

<li class="nav-item" style="margin-top:-5px;">
   <a href="{{ route('home') }}"
      class="nav-link {{ Request::is('home') ? '': ''  }}">
       <p>Grade 11 - Wisdom</p>
       <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
   </a>
</li>

<li class="nav-item" style="margin-top:-10px;">
   <a href="{{ route('home') }}"
      class="nav-link {{ Request::is('home') ? '': ''  }}">
       <p>Grade 11 - Faith</p>
       <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
   </a>
</li>

<li class="nav-item" style="margin-top:-10px;">
   <a href="{{ route('home') }}"
      class="nav-link {{ Request::is('home') ? '': ''  }}">
       <p>Grade 11 - Charity</p>
       <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
   </a>
</li>

<div class="eleven text-white text-center mt-2" style="padding:5px; font-size:15px; background-color:dimgray;">
   GRADE 12 SECTIONS
</div>

<li class="nav-item" style="margin-top:-5px;">
  <a href="{{ route('home') }}"
     class="nav-link {{ Request::is('home') ? '': ''  }}">
      <p>Grade 12- Hope</p>
      <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
  </a>
</li>

<li class="nav-item" style="margin-top:-10px;">
  <a href="{{ route('home') }}"
     class="nav-link {{ Request::is('home') ? '': ''  }}">
      <p>Grade 12 - Love</p>
      <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
  </a>
</li>
 --}}











 
 <style scoped>
 
    .nav-item p{
        position: relative;
        font-size:16px;
        left: 3px;
        top: 1px;
        font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        text-decoration: none;
        color:	gainsboro;
      
      }
     p:hover{
     color: white;
      }
 
 
       i{
        margin-top:5px;
        margin-left: -1px;
        color:gainsboro;
        font-size: 16px;
       
    }
    
 
    i:hover{
     color:white ;
    }
 
 
    img{
     height: 45px;
     width: 45px;
    } 
 
 </style>