<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <img src="{{ public_path('images/image17.png') }}" style="width: 100px; height: 100px; border-radius: 50%;">
    <div style="margin-top: -120px;">
        <h1>PANGANGAN NATIONAL HIGH SCHOOL</h1>
        <h2>Guidance Office</h2>
        <h3>Talisay, Calape, Bohol</h3>
    </div>
    <div class="" style="margin-top: -30px;">
        <h1>ANECDOTAL RECORD</h1>
    </div>
    <hr>

    <div class="">
        <p style="font-size: 14px;">Observation Date and Time: <span
                style="border-bottom: 1px solid dimgray;">{{ $anecdotal_records->observation_date_time->format('F d,  Y - g:i A') }}</span></p>
    </div>
    <div class="" style="margin-top: -10px;">
        <p style="font-size: 14px;">Student Name: <span
                style="border-bottom: 1px solid dimgray;">{{ $anecdotal_records->student->firstname }}
                {{ $anecdotal_records->student->middlename }} {{ $anecdotal_records->student->lastname }}</span> </p>
    </div>

    <div class="" style=" position:absolute; top: 188px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Observer/Class Adviser: <span
                style="border-bottom: 1px solid dimgray;">{{ $anecdotal_records->student->user->name }}</span> </p>
    </div>

    <div class="" style=" position:absolute; top: 223px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px;">Year/Section: <span
                style="border-bottom: 1px solid dimgray;">{{ $anecdotal_records->student->year_section }}</span> </p>
    </div>

    <div class="" style="">

        <p class="" style="font-size:14px;">Description of Incident</p>
        <textarea
            style="margin-top: -10px; height: 100px; font-size: 12px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">{{ $anecdotal_records->description_of_incident }}</textarea>

        <p class="" style="font-size:14px;">Description of the Location/Setting</p>
        <textarea
            style="margin-top: -10px; height: 100px; font-size: 12px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">{{ $anecdotal_records->location_of_incidents }}</textarea>


        <p class="" style="font-size:14px;">Action Taken</p>
        <textarea
            style="margin-top: -10px; height: 100px; font-size: 12px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">{{ $anecdotal_records->actions_taken }}</textarea>


        <p class="" style="font-size:14px;">Recommendation</p>
        <textarea
            style=" margin-top: -10px; height: 100px; font-size: 12px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">{{ $anecdotal_records->recommendations }}</textarea>
    </div>


    <p
        style="font-size: 14px; font-weight: 400; margin-left: 5px; color:dimgray; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        Note: <i style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> Information revealed is held
            strictly CONFIDENTIAL.</i></p>

    <p style="margin-left: 355px; margin-top: 70px; border: 1px solid dimgray; width: 340px;"></p>
    <p
        style=" font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; position:relative; font-size: 14px; font-weight: 400; margin-left: 355px; margin-top: -10px;">
        Designated Guidance Counselor’s Name and Signature</p>


</body>

</html>


<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 16px;
        margin-top: 50px;
        text-align: center;

    }

    h2 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 14px;
        margin-top: -5px;
        text-align: center;

    }

    h3 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 12px;
        font-weight: 400;
        margin-top: -5px;
        text-align: center;

    }
</style>
