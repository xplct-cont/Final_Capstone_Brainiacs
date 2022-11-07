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

        {{-- @if (session('status'))
    <h6 class="alert alert-success"style="font-size: 20px;">
      {{session('status')}}
    </h6>
    @endif --}}
        @if ($message = Session::get('status'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        <h1
            style="color:dimgray; font-size:22px; margin-left:20px; position:relative; top:15px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
            DASHBOARD</h1>

        {{-- <li class="nav-item d-flex justify-content-end" style="position:relative; top:-30px;">
            <a href="{{ route('calendar') }}"
               class="nav-link {{ Request::is('calendar') ? '' : '' }}">
                <span class="input-group-text fas fa-calendar-alt bg-success "><span style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">&nbsp;Calendar|Events</span> </span>
                
            </a>
        </li> --}}

        <div class="cardBox" style="margin-top:8px;">
            <div class="card elevation-2">
                <div class="iconBx">
                    <ion-icon name="person"></ion-icon>
                </div>
                <div>
                    <div class="cardName d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Administrator</div>
                    <div class="numbers"><span>{{ $admin }}</span></div>
                </div>
            </div>
            <div class="card elevation-2">
                <div class="iconBx">
                    <ion-icon name="people"></ion-icon>
                </div>
                <div>
                    <div class="cardName d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Grade 11 Students</div>
                    <div class="numbers"><span>{{ $student11 }}</span></div>
                </div>
            </div>
            <div class="card elevation-2">
                <div class="iconBx">
                    <ion-icon name="people"></ion-icon>
                </div>
                <div>
                    <div class="cardName d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Grade 12 Students</div>
                    <div class="numbers">{{ $student12 }}</div>
                </div>
            </div>

            <div class="card elevation-2 bg-info">
                <div class="iconBx">
                    <ion-icon name="person-add" class="text-light"></ion-icon>
                </div>
                <div>
                    <div class="cardName text-light d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Adviser</div>
                    <div class="numbers text-light"><span>{{ $user }}</span></div>
                </div>
            </div>
        </div>



        <div class="card d-flex justify-content-end col-md-12" style="padding:3px;">

            <h2 style="color: dimgray; font-size:16px;" class="d-flex justify-content-between ">ALL SENIOR HIGH SCHOOL
                TEACHERS
            </h2>
            <div class="mx-auto">
                <a class="btn btn-danger mb-2 mr-2" style="" href="{{ route('export_advisers_pdf') }}"><span
                        class="fas fa-file-pdf" style="font-size: 15px;"></span> Generate PDF</a>
                <a href="/export_advisers_excel" style="" class="mb-2 ml-2 btn btn-success"><span
                        class="fas fa-file-excel" style="font-size: 15px;"></span> Export to Excel</a>
            </div>
            <div class="card-body">
                <div class="search" style=" margin-bottom:10px;">
                    <div class="mx-auto pull-left">
                        <form action="{{ route('home') }}" method="GET" role="search">

                            <div class="input-group">
                                <span class="input-group-btn mr-2 mt-0">
                                    <button class="btn btn-info" type="submit" title="Search">
                                        <span class="fas fa-search"></span>
                                    </button>
                                </span>
                                <input type="text" class="form-control mr-2" name="adviser" placeholder="Search..."
                                    id="adviser">
                                <a href="{{ route('home') }}" class=" mt-0">
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

                <table class="table table-sm table-hover text-dark elevation-2 rounded table-borderless text-center">
                    <thead style="background-color: rgb(219, 219, 219)">
                        <tr>

                            
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Profile Image</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Advisory</th>
                            <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">
                                Role</th>
                            <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">
                                Contact No</th>
                            <th class="d-none d-md-table-cell d-lg-table-cell d-lg-table-cell" style="text-align: center">
                                Email</th>
                            <th style="text-align: center">Edit</th>
                            <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($adviser as $item)
                            <tr class="text-center">

                                <td> @if(Cache::has('is_online' . $item->id))
                                    <span class="logged-in bg-success btn-xs p-1 rounded" style=" color:white; font-size">Online</span>
                                @else
                                    <span  class="logged-in bg-secondary btn-xs p-1 rounded" style=" color:white;">Offline</span>
                                @endif
                              <div style="font-size: 12px;">
                                @if($item->last_seen != null)
                                {{ \Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}
                            @else
                                No data
                            @endif
                              </div>
                            </td>

                                <td> <img src="{{ asset('storage/users-avatar/' . $item->avatar) }} " width="50px" height="50px"
                                        alt="Image" style="border-radius: 50%"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->advisory }}</td>
                                <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">
                                    {{ $item->admin ? 'Guidance Designate' : 'Adviser' }}</td>
                                <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{ $item->contact_no }}
                                </td>
                                <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{ $item->email }}</td>
                                <td><a href="{{ url('edit-adviser/' . $item->id) }}" class="btn btn-warning btn-xs "><i
                                            class="fas fa-user-edit text-dark"></i></a></td>
                                <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"><a href="{{ url('delete-adviser/' . $item->id) }}" class="btn btn-danger btn-xs "><i
                                            class="fas fa-trash"></i></a></td>
                                {{-- <td><a href="{{url('show-adviser/'.$item->id)}}" class="btn btn-success btn-xs"><i class="fas fa-eye"></i></a></td> --}}
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="text-dark"><span
                                        class="fas fa-exclamation-circle text-danger"></span> No Senior High School Adviser
                                    Found!</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="mt-1 d-flex justify-content-center">
                    {{ $adviser->onEachSide(1)->links() }}
                </div>
            </div>
        </div>


        <div class="card text-center mt-5 col-md-8" style="margin:auto;">
            <h3 style="color: dimgray; font-size: 20px;">
                <div class="nav-item" style="position:relative; top:-30px; margin:auto; width: 150px;">

                    <form action="{{ url('/add_new_event') }}" method="POST">
                        @csrf

                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter"
                            style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> <span
                                class="fas fa-calendar-check"></span>
                            Create Event
                        </button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Creating Event</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for=""
                                                style="color:dimgray; font-weight:500; font-size: 16px;">Title of the
                                                Event</label>
                                            <textarea id="" type="text" class="form-control" title="" rows="2" required
                                                name="title_of_the_event" placeholder="Write the title of the event"></textarea>
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for=""
                                                style="color:dimgray; font-weight:500; font-size: 16px; ">Location of the
                                                Event</label>
                                            <input type="text" class="form-control"
                                                placeholder="Location of the event" name="location_of_the_event" required>
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for=""
                                                style="color:dimgray; font-weight:500; font-size: 16px; ">Date/Time of the
                                                Event</label>
                                            <input type="datetime-local" class="form-control" name="event_date_time"
                                                required>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"><span class="fas fa-save"></span>
                                            Save</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>


        </div>
        <img src="/images/image17.png" class="user-image img-circle elevation-2" alt="User Image"
            style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
        School Events
        </h3>
        <form action="{{ url('send-event/') }}" method="POST" accept-charset="UTF-8">
            @csrf
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-dark bg-secondary" style="text-align: center">Event Title</th>
                        <th class="text-dark bg-secondary" style="text-align: center">Event Location</th>
                        <th class="text-dark bg-secondary" style="text-align:center">Event Date/Time</th>
                        <th class="text-dark bg-secondary" style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($events as $sched)
                        <tr class="text-dark">

                            <td>{{ $sched->title_of_the_event }}</td>
                            <td>{{ $sched->location_of_the_event }}</td>
                            <td>{{ Carbon\Carbon::parse($sched->event_date_time)->format('F d,  Y - g:i A') }}</td>
                            <td><a href="{{ url('event-delete/' . $sched->id) }}" class="btn btn-danger btn-xs "><i
                                        class="fas fa-trash"></i></a></td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-dark"><span
                                    class="fas fa-exclamation-circle text-danger"></span> No Events found!</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            <button type="submit" class="btn btn-sm input-group-center bg-success mb-1 ">Send to all</button>
        </form>
        </div>
        </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

    </html>




    <style scoped>
        .cardBox {
            position: relative;
            width: 100%;
            color: black;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 25px;
        }

        .cardBox .card {
            position: relative;

            padding: 10px;
            border-radius: 15px;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
        }

        .cardBox .card .numbers {
            position: relative;
            font-weight: 700;
            font-size: 1.5em;
            color: #39C0ED;
        }

        .cardBox .card .cardName {
            color: #262626;
            font-size: 1.0em;
            margin-top: 5px;

        }

        .cardBox .card .iconBx {
            font-size: 2.5em;
            color: dimgray;

        }

        .cardBox .card:hover {
            background-color: #17a2b8;
        }

        .cardBox .card:hover .numbers,
        .cardBox .card:hover .cardName,
        .cardBox .card:hover .iconBx {
            color: white;
        }



        * {
            box-sizing: border-box;
        }


        .column {
            float: left;
            width: 25%;
            padding: 0 10px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {
            margin: 0 -5px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }


        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }


        /* .card {
                            
                            padding: 1px;
                            text-align: center;
                            background-color: #f1f1f1;
                            } */
    </style>
@endsection
