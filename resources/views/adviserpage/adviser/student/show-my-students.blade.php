@extends('adviserpage.app')


@section('content')
<div class="p-1">
    <a class="fas fa-arrow-left" style="font-size:20px; color:blue;" href="{{ url('advisory-list-students')}}"></a>
</div>
    <body>
        <h1 class="text-dark p-3"
            style="font-weight:normal; font-size: 25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; ">
            Records of {{ $myStud->lastname }}, {{ $myStud->firstname }}</h1>
        <hr>
        @if ($message = Session::get('status'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="py-5">
            <div class="container">
                <div class="row hidden-md-up">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <a href="{{ url('show-my-student/' . $myStud->id . '/student_information_sheet_myStudent') }}">
                                <div class="layer">
                                </div>
                                <div class="content">
                                    <div class="div">
                                        <p style="font-size: 20px;">Pangangan National High School</p>
                                        <p style="font-size: 15px;">Talisay, Calape, Bohol</p>
                                    </div>

                                    <div class="image">
                                        <img src="/images/image17.png" class="user-image img-circle elevation-2 "
                                            alt="User Image"
                                            style="width: 62px; height:62px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
                                    </div>
                                    <div class="details mt-2">
                                        <h2>Student Information Sheet</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <a href="{{ url('show-my-student/' . $myStud->id . '/anecdotal_record_myStudent') }}">
                                <div class="layer">

                                </div>
                                <div class="content">
                                    <div class="div">
                                        <p style="font-size: 20px;">Pangangan National High School</p>
                                        <p style="font-size: 15px;">Talisay, Calape, Bohol</p>
                                    </div>

                                    <div class="image">
                                        <img src="/images/image17.png" class="user-image img-circle elevation-2 "
                                            alt="User Image"
                                            style="width: 62px; height:62px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">

                                    </div>
                                    <div class="details mt-2">
                                        <h2>Anecdotal Record</h2>
                                    </div>
                                </div>
                            </a>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <form action="{{ url('/send_email_myStudent') }}" method="POST">
            @csrf
            <div class="input-group mb-3 mx-auto" style="width: 300px; margin-top: -30px;">
                <input type="email" name="email" class="form-control text-center" value="{{ $myStud->email }}" required>
            </div>
            <div class="text d-flex justify-content-center text-dark" style="margin-top: 40px; font-size:20px;">

                <div class="container " style="position: relative; top:-40px;">
                    <div class="form-group">
                        <label for="" style="font-weight:400; font-size: 16px;">To:</label>
                        <input type="text" name="subject" class="form-control"
                            value="{{ $myStud->firstname }} {{ $myStud->middlename }} {{ $myStud->lastname }}" required />
                    </div>
                    <button type="submit" class="btn btn-info rounded"
                        style="width: 130px; height: 40px; position:relative; top: 10px;">Send Email&nbsp;&nbsp;<span
                            class=""></span></button>
                    <div class="bg-light" style="">
                        <div class="input-group mt-3">
                            <textarea class="form-control" required name="content" aria-label="" placeholder="Write something here..."
                                style="height: 12rem;"></textarea>
                        </div>
                    </div>
                </div>
        </form>
        </div>

    </body>

    <style scoped>
        .card {

            position: relative;
            overflow: hidden;
            width: 300px;
            height: 310px;
            margin: auto;
            background: #333;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, .5)
        }



        .card .layer {
            z-index: 1;
            position: absolute;
            top: calc(100% - 5px);
            height: 100%;
            width: 100%;
            left: 0;
            background: linear-gradient(to left, #4ca1af, #c4e0e5);
            transition: 0.5s;

        }


        .card .content {
            z-index: 2;
            position: relative;
        }

        .card:hover .layer {
            top: 0;
        }

        .card .content p {
            font-size: 14px;
            line-height: 24px;
            color: #fff;

        }

        .card .content .image {
            width: 70px;
            height: 70px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid white;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);

        }

        .card .content .details h2 {
            font-size: 18px;
            color: white;
        }
    </style>
@endsection
