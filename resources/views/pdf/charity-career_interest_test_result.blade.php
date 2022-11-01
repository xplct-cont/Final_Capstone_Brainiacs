<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
</head>
<body>
   
    <div style="margin-top: -50px;">
        <h1>PANGANGAN NATIONAL HIGH SCHOOL</h1>
        <h2>Guidance Office</h2>
        <h3>Talisay, Calape, Bohol</h3>
    </div>
    <div class="" style="margin-top: -30px;">
        <h1>Career Interest Test Result of {{$career_interest_test_results->student->firstname}} {{$career_interest_test_results->student->middlename}} {{$career_interest_test_results->student->lastname}}</h1>
    </div>
    <hr>

    <img src="{{ storage_path('app/public/career_interest_test_result/' . $career_interest_test_results->interest_result) }}" style="width: 100%; height: 85%;">

</body>
</html>


<style scoped>
     body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 16px;
        margin-top: 50px;
        text-align: center;
        font-weight: 450;

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