<ul style="position:relative; left: -38px; margin:auto; height: 50px;">
    <li class="nav-item"> 
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

<div class="eleven text-white text-center mt-2" style="padding:5px; font-size:15px; background-color:dimgray;">
     GRADE 11 SECTIONS
</div>

<li class="nav-item" style="margin-top:-5px;">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('home') ? '': ''  }}">
        <p>Grade 11 - Black</p>
        <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
    </a>
</li>

<li class="nav-item" style="margin-top:-10px;">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('home') ? '': ''  }}">
        <p>Grade 11 - Red</p>
        <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
    </a>
</li>

<li class="nav-item" style="margin-top:-10px;">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('home') ? '': ''  }}">
        <p>Grade 11 - Blue</p>
        <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
    </a>
</li>

<div class="eleven text-white text-center mt-2" style="padding:5px; font-size:15px; background-color:dimgray;">
    GRADE 12 SECTIONS
</div>

<li class="nav-item" style="margin-top:-5px;">
   <a href="{{ route('home') }}"
      class="nav-link {{ Request::is('home') ? '': ''  }}">
       <p>Grade 12- Cyan</p>
       <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
   </a>
</li>

<li class="nav-item" style="margin-top:-10px;">
   <a href="{{ route('home') }}"
      class="nav-link {{ Request::is('home') ? '': ''  }}">
       <p>Grade 12 - Brown</p>
       <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
   </a>
</li>

<li class="nav-item" style="margin-top:-10px;">
   <a href="{{ route('home') }}"
      class="nav-link {{ Request::is('home') ? '': ''  }}">
       <p>Grade 12 - Gray</p>
       <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
   </a>
</li>













{{-- 
<div class="btn-group dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Grade 11 - Sections
    </button>
    <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenu2">
        <a href="{{ route('home') }}"
        class="nav-link {{ Request::is('home') ? 'bg-dark text-white': ''  }}">
         <p>Grade 11 - Blue</p>
         <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
     </a>
      <a href="{{ route('home') }}"
        class="nav-link {{ Request::is('home') ? 'bg-dark text-white': ''  }}">
         <p>Grade 11 - Blue</p>
         <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
     </a>
      <a href="{{ route('home') }}"
        class="nav-link {{ Request::is('home') ? 'bg-dark text-white': ''  }}">
         <p>Grade 11 - Blue</p>
         <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
     </a>
    </div>
  </div>


  
<div class="btn-group dropdown mt-4">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Grade 12 - Sections
    </button>
    <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenu2">
        <a href="{{ route('home') }}"
        class="nav-link {{ Request::is('home') ? 'bg-dark text-white': ''  }}">
         <p>Grade 12 - Blue</p>
         <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
     </a>
      <a href="{{ route('home') }}"
        class="nav-link {{ Request::is('home') ? 'bg-dark text-white': ''  }}">
         <p>Grade 12 - Blue</p>
         <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
     </a>
      <a href="{{ route('home') }}"
        class="nav-link {{ Request::is('home') ? 'bg-dark text-white': ''  }}">
         <p>Grade 12 - Blue</p>
         <i class="fas fa-graduation-cap fa-pull-left fa-md "></i>
     </a>
    </div>
  </div>
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