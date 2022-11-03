@extends('adviserpage.app')

@section('content')
    <div class="cardBox">
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

    <div class="container-fluid-content-row">
        <div class="row">
            <div class="card bg-light col-md-12 elevation-2 text-dark">
                <h1 style="color:dimgray;" class="p-3 mb-5"> <i style=" font-size:25px;color: dimgray;"> Welcome
                        {{ Auth::user()->name }}!</i></h1>
                <h2 class="text-center"
                    style="font-size: 32px; margin:auto; position:relative; top: -25px; color:dimgray; text-shadow: 1px 1px #17a2b8;">
                    Guidance Information System</h2>
                <img src="/images/image17.png" class="user-image img-circle elevation-2 mx-auto" alt="User Image"
                    style="width: 230px; height:230px; border-radius: 50%; position:relative; top: -20px; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
                <h3 class="" style="font-size: 22px; margin:auto; position:relative; top:-15px; color:dimgray;">
                    Pangangan National High School<br></h3>
                <h3 class="mb-3" style="font-size: 18px; margin:auto; position:relative; top:-10px; color:dimgray;">Talisay,
                    Calape, Bohol<br></h3>

            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <style scoped>
        /* .card{
        background-image: url('/images/bbb.png');
        height:100%;
    } */


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
    </style>
@endsection
