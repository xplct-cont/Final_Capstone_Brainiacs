@extends('layouts.layoutsidebar')
@section('content')

    <body>
        <h1 class="text-dark p-3"
        style="font-weight:normal; font-size: 25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; ">
        Records of {{ $hopeStud->lastname }}, {{ $hopeStud->firstname }} from {{ $hopeStud->year_section }}</h1>
    <hr>
        <div class="py-5">
            <div class="container">
                <div class="row hidden-md-up">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <a href="{{ route('home') }}">
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
                            <a href="{{ url('show-student-hope/' . $hopeStud->id . '/anecdotal_record_hope') }}">
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
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <a
                                href="{{ url('show-student-hope/' . $hopeStud->id . '/counseling_anecdotal_record_hope') }}">
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
                                        <h2>Counseling Anecdotal Record</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <a href="{{ route('home') }}">
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
                                        <h2>Exit Interview Form</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="input-group mb-3 mx-auto" style="width: 300px; margin-top: -30px;">
            <input type="text" name="lastname" class="form-control text-center" value="{{ $hopeStud->email }}"
                required>
        </div>
        <div class="text d-flex justify-content-center text-dark" style="margin-top: 40px; font-size:20px;">

            <div class="container " style="position: relative; top:-40px;">
                <button type="submit" class="btn btn-info rounded"
                    style="width: 130px; height: 40px; position:relative; top: 10px;">Send Email&nbsp;&nbsp;<span
                        class=""></span></button>
                <div class="bg-light" style="">
                    <div class="input-group mt-3">
                        <textarea class="form-control" aria-label="" placeholder="Write something here..." style="height: 12rem;"></textarea>
                    </div>
                </div>
            </div>

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
