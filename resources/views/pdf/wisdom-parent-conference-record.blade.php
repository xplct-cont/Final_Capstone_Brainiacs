<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div>
        <h1>PANGANGAN NATIONAL HIGH SCHOOL</h1>
        <h2>Guidance Office</h2>
        <h3>Talisay, Calape, Bohol</h3>
    </div>
    <div class="" style="margin-top: -30px;">
        <h1>PARENT/GUARDIAN CONFERENCE RECORD</h1>
    </div>
    <hr>

    <div class="">
        <p style="font-size: 14px;">Student Name: <span
                style="border-bottom: 1px solid dimgray;">{{ $parent_conference_records->student->firstname }}
                {{ $parent_conference_records->student->middlename }}
                {{ $parent_conference_records->student->lastname }}</span></p>
    </div>
    <div class="" style="margin-top: -10px;">
        <p style="font-size: 14px;">Year/Section: <span
                style="border-bottom: 1px solid dimgray;">{{ $parent_conference_records->student->year_section }}</span>
        </p>
    </div>

    <div class="" style="margin-top: -10px;">
        <p style="font-size: 14px;">Parent/Guardian's Name: <span
                style="border-bottom: 1px solid dimgray;">{{ $parent_conference_records->student->parent_name }}</span>
        </p>
    </div>

    <div class="" style="margin-top: -10px;">
        <p style="font-size: 14px;">Reason for Contact: <span
                style="border-bottom: 1px solid dimgray;">{{ $parent_conference_records->reason_for_contact }}
                ({{ $parent_conference_records->inquiries_referral_appointment }})</span> </p>
    </div>

    <div class="" style=" position:absolute; top: 188px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Age: <span
                style="border-bottom: 1px solid dimgray;">{{ $parent_conference_records->student->age }}</span> </p>
    </div>

    <div class="" style=" position:absolute; top: 223px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px;">Date: <span
                style="border-bottom: 1px solid dimgray;">{{ $parent_conference_records->date->format('F d,  Y') }}</span>
        </p>
    </div>

    <div class="" style=" position:absolute; top: 258px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px;">Relation to Student: <span
                style="border-bottom: 1px solid dimgray;">{{ $parent_conference_records->relation_to_student }}</span>
        </p>
    </div>

    <div class="" style="">

        <p class="" style="font-size:14px;">Problem/Concern</p>
        <textarea
            style="margin-top: -10px; height: 100px; font-size: 12px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">{{ $parent_conference_records->problem_concern }}</textarea>

        <p class="" style="font-size:14px;">Topics Discussed</p>
        <textarea
            style="margin-top: -10px; height: 100px; font-size: 12px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">{{ $parent_conference_records->topics_discussed }}</textarea>

        <p class="" style="font-size:14px;">Suggested Resolution</p>
        <textarea
            style="margin-top: -10px; height: 100px; font-size: 12px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">{{ $parent_conference_records->suggested_resolution }}</textarea>

        <div class="" style="margin-top: -10px; text-align:center;">
            <p style="font-size: 14px;">Action Taken:<span
                    style="border-bottom: 1px solid dimgray;">{{ $parent_conference_records->action_taken }}</span>
            </p>
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
