@extends('layouts.layoutsidebar')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
    
           <h1 style="color:dimgray; font-size:22px; margin-left:20px; position:relative; top:15px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">DASHBOARD</h1>
           {{-- <h2 class="text-center text-dark" style="font-size: 20px; margin:auto; ">DASHBOARD</h2> --}}

          <div class="cardBox">
            <div class="card elevation-2">
                <div class="iconBx">
                    <ion-icon name="person"></ion-icon>
                </div>
                <div>
                    <div class="cardName" >Administrator</div>
                    <div class="numbers" >2</div>
                </div>
            </div>
            <div class="card elevation-2">
                <div class="iconBx">
                    <ion-icon name="people"></ion-icon>
                </div>
                <div>
                    <div class="cardName" >Grade 11 Students</div>
                    <div class="numbers">115</div>
                </div>
            </div>
            <div class="card elevation-2">
                <div class="iconBx">
                    <ion-icon name="people"></ion-icon>
                </div>
                <div>
                    <div class="cardName" >Grade 12 Students</div>
                    <div class="numbers" >85</div>
                </div>
            </div>
          
            <div class="card elevation-2 bg-info">
                <div class="iconBx">
                    <ion-icon name="person-add" class="text-light"></ion-icon>
                </div>
                <div>
                    <div class="cardName text-light" >Adviser</div>      
                    <div class="numbers text-light" >12</div>
               
                </div>
            </div>
              
          </div>

  
            <div class="card elevation-2 rounded " style="margin:auto; width: 96%;">
                <div class="card-header ">
                    <h2 style="color: dimgray; font-size:16px;" >ALL SENIOR HIGH SCHOOL SECTIONS</h2><hr>
                  <div class="card-body">

                    <div class="search" style="margin-top:-20px; margin-bottom:10px;">
                        <div class="mx-auto pull-left">
                        <form action="#" method="GET" role="search">
        
                            <div class="input-group">
                                <span class="input-group-btn mr-2 mt-0">
                                    <button class="btn btn-info" type="submit" title="Search Sections">
                                        <span class="fas fa-search"></span>
                                    </button>
                                </span>
                                <input type="text" class="form-control mr-2" name="term" placeholder="Search Sections" id="term">
                                <a href="#" class=" mt-0">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button" title="Refresh page">
                                            <span class="fas fa-sync-alt"></span>
                                        </button>
                                    </span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                    <table class="table table-sm table-hover text-dark rounded elevation-2">
                        <thead>
                          <tr>
                            <th scope="col" class="bg-info ">Action</th>
                            <th scope="col" class="bg-info">#</th>
                            <th scope="col" class="bg-info">First</th>
                            <th scope="col" class="bg-info">Last</th>
                            <th scope="col" class="bg-info">Handle</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th><button class="btn btn-sm bg-success">View</button></th>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            
                          </tr>
                          <tr>
                            <th><button class="btn btn-sm bg-success">View</button></th>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                           
                          </tr>
                          <tr>
                            <th><button class="btn btn-sm bg-success">View</button></th>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            
                          </tr>
                          <tr>
                            <th><button class="btn btn-sm bg-success">View</button></th>
                            <th scope="row">4</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            
                          </tr>
                          <tr>
                            <th><button class="btn btn-sm bg-success">View</button></th>
                            <th scope="row">5</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            
                          </tr>
                        </tbody>
                      </table>

                </div>
          </div>
          
          

          <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
          <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        </body>
        </html>




<style scoped>

    .cardBox{
        position: relative;
        width: 100%;
        color: black;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(4, 1fr); 
        grid-gap: 25px;
    }
    .cardBox .card{
        position: relative;
      
        padding: 10px;
        border-radius: 15px;
        display: flex;
        justify-content: space-between;
        cursor: pointer;
        box-shadow:  0 7px 25px rgba(0, 0, 0, 0.08);  
    }

    .cardBox .card .numbers{
        position: relative;
        font-weight: 700;
        font-size: 1.5em;
        color: #39C0ED;
    }

    .cardBox .card .cardName{
        color: #262626;
        font-size: 1.0em;
        margin-top: 5px;

    }

    .cardBox .card .iconBx{
        font-size: 2.5em;
        color: dimgray;
        
    }

    .cardBox .card:hover{
        background-color:#17a2b8;
    }

    .cardBox .card:hover .numbers,
    .cardBox .card:hover .cardName,
    .cardBox .card:hover .iconBx {
        color: white;
    }
  

</style>
@endsection
