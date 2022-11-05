<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>

    <div class="container" style="color:white;  background: linear-gradient(#28313B, #485461); width: 600px;">
        <div>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVRTCHiIiL1FcTvHzaU5O1QmhNwdThjQkymI8J_D4BWg&s"
            style="height: 60px; border-radius: 50%; margin-left: 270px; margin-top: 15px;" />
            <h2 style="color:white; text-align:center; font-size: 20px;">Pangangan National High School <br><span
                style="font-size: 15px; margin-top: -20px;">Guidance Office<br></span></h2>
        </div>

        <div class="card" style="border:1px solid white;  height: 100px; width: 150px text-align:center;">

            <div class="card-header">
            </div>
            <div class="card-body" style="background-color:#5bc0de; color:white;">
                <div class="subject" style=" text-align:center; color:white;">
                    To: {{ $subject }}
                </div><br>
            </div>
        </div>

    </div>

    <div class="">
        <p style="text-center">Content :</p>
        <textarea readonly
            style="margin-left: 1.5px; margin-right:auto; margin-top: -10px; color:#292b2c; height:100px; width: 591px; font-size: 15px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">{{ $content }}</textarea>

        <h1 style="font-size: 12px; color: #292b2c; font-weight: 400">Regards, <br>Guidance Designate</h1>

    </div>
    </div>

</body>

</html>
