<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>

    <img src="{{ public_path('images/image17.png') }}" style="width: 100px; height: 100px; border-radius: 50%;">
    <div style="margin-top: -120px;">
        <h1>PANGANGAN NATIONAL HIGH SCHOOL</h1>
        <h2>Guidance Office</h2>
        <h3>Talisay, Calape, Bohol</h3>
    </div>
    <div class="">
        <p style="font-size: 14px;">Type of Student: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->type_of_student }}</span></p>
    </div>

    <div class="" style="margin-top: -30px;">
        <h1>Student Information Sheet</h1>
    </div>
    <hr>

    <div class="">
        <p style="font-size: 14px;">Name: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->student->firstname}} {{ $student_information_sheets->student->middlename}} {{ $student_information_sheets->student->lastname}}</span></p>
    </div>
    <div class="" style="margin-top: -10px;">
        <p style="font-size: 14px;">Name and Address of School Last Attended: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->last_attended_school}}</span> </p>
    </div>
    <div class="" style="margin-top: -10px;">
        <p style="font-size: 14px;">Year/Section: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->student->year_section}}</span> </p>
    </div>
    <div class="" style="margin-top: -10px;">
        <p style="font-size: 14px;">School Year: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->school_year}}</span> </p>
    </div>
    <hr>
    <div class="">
        <p style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:16px; font-weight:500;">PERSONAL DATA</p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Date of Birth: <span
                style="border-bottom: 1px solid dimgray;">{{ Carbon\Carbon::parse($student_information_sheets->birthdate)->format('F d, Y') }}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Nationality: <span
                style="border-bottom: 1px solid dimgray;">{{$student_information_sheets->nationality}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Status: <span
                style="border-bottom: 1px solid dimgray;">{{$student_information_sheets->status}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Age: <span
                style="border-bottom: 1px solid dimgray;">{{$student_information_sheets->student->age}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Height: <span
                style="border-bottom: 1px solid dimgray;">{{$student_information_sheets->height}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Mobile Number: <span
                style="border-bottom: 1px solid dimgray;">{{$student_information_sheets->number}}</span></p>
    </div>

    <div class="" style=" position:absolute; top: 420px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Place of Birth: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->birthplace }}</span> </p>
    </div>
    <div class="" style=" position:absolute; top: 463px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Religion: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->religion }}</span> </p>
    </div>
    <div class="" style=" position:absolute; top: 506px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Home Address: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->student->address }}</span> </p>
    </div>
    <div class="" style=" position:absolute; top: 549px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Sex: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->student->gender }}</span> </p>
    </div>
    <div class="" style=" position:absolute; top: 592px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Weight: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->weight }}</span> </p>
    </div>
    <hr>
    <div class="">
        <p style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:16px; font-weight:500;">EDUCATIONAL BACKGROUND</p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Elementary: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->elementary}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Elementary Honor/s Received: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->elem_honors_rec}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Secondary: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->secondary}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Secondary Honor/s Received: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->secon_honors_rec}}</span></p>
    </div>
    <div class="" style=" position:absolute; top: 760px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Year Graduated in Elementary: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->elem_year_grad}}</span> </p>
    </div>
    <div class="" style=" position:absolute; top: 851px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Year Graduated in Secondary: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->secon_year_grad}}</span> </p>
    </div><br><br>
    <hr>
    <div class="">
        <p style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:16px; font-weight:500;">(FOR TRANSFEREE/SHIFTEE/CROSS ENROLLEE, WRITE SCHOOL/S ATTENDED)</p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Year Level Last Attended: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->level_last_attended}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">School and Address: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->school_add}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Reasons why transfer: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->reasons_for_transfer}}</span></p>
    </div>
    <div class="" style=" position:absolute; top: 50px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Year: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->year}}</span> </p>
    </div>
    <hr>
    <div class="">
        <p style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:16px; font-weight:500;">AFFILIATION IN ORGANIZATION(church, club, school, fraternity, volunteer)</p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Name of Organization: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->org_name}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Position: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->position}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Year: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->org_year}}</span></p>
    </div>
    <hr>
    <div class="">
        <p style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:16px; font-weight:500;">SELF</p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Favorite Subject: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->fav_sub}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Likes: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->likes}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Interest/Hobbies: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->hobbies}}</span></p>
    </div>
    <div class="" style=" position:absolute; top: 450px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Most Difficult Subject: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->most_dif_sub}}</span> </p>
    </div>
    <div class="" style=" position:absolute; top: 495px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Dislikes: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->dislikes}}</span> </p>
    </div>
    <hr>
    <div class="">
        <p style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:16px; font-weight:500;">FAMILY BACKGROUND</p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Father: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->father}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Age: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->father_age}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Occupation: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->father_occupation}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Office Address: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->father_off_ad}}</span></p>
    </div>
    <div class="" style=" position:absolute; top: 655px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Mother: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->mother}}</span> </p>
    </div>
    <div class="" style=" position:absolute; top: 700px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Age: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->mother_age}}</span> </p>
    </div>
    <div class="" style=" position:absolute; top: 745px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Occupation: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->mother_occupation}}</span> </p>
    </div>
    <div class="" style=" position:absolute; top: 790px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Office Address: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->mother_off_ad}}</span> </p>
    </div>
    <hr>
    <div class="">
        <p style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:16px; font-weight:500;">EDUCATIONAL STATUS</p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Father's Educational Status: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->father_educ_stat}}</span></p>
    </div>
    <div class="" style=" position:absolute; top: 905px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Mother's Educational Status: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->mother_educ_stat}}</span> </p>
    </div>
    <div class="">
        <p style="font-size: 14px;">(Total Monthly Income) <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->monthly_income}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">(Marital Status of Parents) <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->mar_parents_stat}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">(Rank of Order) <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->rank_order}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">No. of Brothers: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->no_of_brothers}}</span></p>
    </div>
    <div class="" style=" position:absolute; top: 90px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">No of Sisters: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->no_of_sisters}}</span> </p>
    </div>
    <div class="">
        <p style="font-size: 14px;">(Living with) <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->living_with}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">(How are you supported with) <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->how_are_you_supp}}</span></p>
    </div>
    <hr>
    <div class="">
        <p style="font-size: 14px;">How will you describe your relationship with your</p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Father: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->rel_with_father}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Brother: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->rel_with_brother}}</span></p>
    </div>
    <div class="" style=" position:absolute; top: 283px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Mother: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->rel_with_mother}}</span> </p>
    </div>
    <div class="" style=" position:absolute; top: 328px;  margin-left: 400px; text-align: end;">
        <p style="font-size: 14px">Sister: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->rel_with_sister}}</span> </p>
    </div>
    <hr>
    <div class="">
        <p style="font-size: 14px;">If married</p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Name of Spouse: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->spouse_name}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Occupation: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->spouse_occupation}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Nationality: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->spouse_nationality}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Age: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->spouse_age}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Name and Address of Company: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->spouse_comp_name}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Company Tel/Mobile No.: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->company_num}}</span></p>
    </div>
    <hr>
    <div class="">
        <p style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:16px; font-weight:500;">HEALTH HISTORY</p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Past Disease: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->past_disease}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Injuries of Illness: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->injuries}}</span></p>
    </div>
    <div class="">
        <p style="font-size: 14px;">Previous Hospitalization/Operations: <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->operations}}</span></p>
    </div>
   <div class="">
        <p style="font-size: 14px;">Menstrual History (Female Only): <span
                style="border-bottom: 1px solid dimgray;">{{ $student_information_sheets->operations}}</span></p>
    </div>
    <hr>

    <p
    style="font-size: 14px; font-weight: 400; margin-left: 5px; color:dimgray; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    Note: <i style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> Information revealed is held
        strictly CONFIDENTIAL.</i></p>

   <p style="margin-left: 355px; margin-top: 70px; border: 1px solid dimgray; width: 340px;"></p>
   <p
    style=" font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; position:relative; font-size: 14px; font-weight: 400; margin-left: 355px; margin-top: -10px;">
    Designated Guidance Counselor’s Name and Signature</p>
    <div class="">
        <p style="font-size: 14px;">Date Signed: <span
                style="border-bottom: 1px solid dimgray;">{{ Carbon\Carbon::parse($student_information_sheets->date_signed)->format('F d, Y') }}</span></p>
    </div>
       
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
