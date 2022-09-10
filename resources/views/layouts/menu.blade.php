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
        <p>Approval Requests</p>
        <i class="fas fa-exclamation-circle fa-pull-left fa-md "></i>
    </a>
</li>

 
<li class="nav-item">
    <a href="{{ route('calendar') }}"
       class="nav-link {{ Request::is('calendar') ? '' : '' }}">
        <p>Calendar/Events</p>
        <i class="fas fa-calendar-alt fa-pull-left fa-md "></i>
    </a>
</li>
 





 
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