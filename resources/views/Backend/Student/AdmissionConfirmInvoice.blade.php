<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/d703802588.js" crossorigin="anonymous"></script>

    <!-- flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


</head>
<style>
    /* You can add custom styles here */
    .gradient-bg {
        background: linear-gradient(90deg, #1E3A8A 0%, #007BFF 50%, #1E3A8A 100%);
    }

    /* .gradient-bg {
        background-image: repeating-linear-gradient(45deg, rgba(0,0,0,0.04),rgba(0,0,0,0.03),rgba(0,0,0,0.09),rgba(0,0,0,0.09),rgba(0,0,0,0.06),rgba(0,0,0,0.04),transparent,rgba(0,0,0,0.05),rgba(0,0,0,0.06),rgba(0,0,0,0.02),rgba(0,0,0,0.09),rgba(0,0,0,0.03),rgba(0,0,0,0.07) 4px),linear-gradient(0deg, rgb(24, 9, 88),rgb(20, 15, 94));
    } */

</style>

<body class="">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>

    <div class="w-full bg-slate-200 min-h-screen">
        <div class="w-[40%] h-fit bg-white mx-auto px-5 py-12">
            <div>
                <h1 class="text-center text-blue-500 font-bold text-lg">{{ $schoolInfo->school_name }}</h1>
                <h1 class="text-center text-slate-500 font-bold text-sm">Contact No: {{ $schoolInfo->school_phone }}</h1>
                <h1 class="text-center text-slate-500 font-bold text-sm">Email: {{ $schoolInfo->school_email }}</h1>
                <h1 class="text-center text-slate-500 font-bold text-sm">Website
                    <a href="#" class="text-blue-600">{{ $schoolInfo->website }}</a>
                </h1>
                <h1 class="text-center font-bold text-red-500 text-sm">Print date: {{ $date->format('Y-m-d H:i:s') }}</h1>
            </div>

            <h1 class="text-lg text-center mt-5 underline font-bold">Admission Confirmation Slip</h1>
            <h2 class="text-center text-md mt-3">Congratulations! Your Application For admission has been accepted.</h2>

            <div class="w-2/3 mx-auto mt-5 flex justify-center items-center">
                <ul class="text-md font-semibold space-y-1 mx-a">
                    <li>Student ID : {{$studentInfo->student_id}}</li>
                    <li>Student Name : {{$studentInfo->name}}</li>
                    <li>Class Name : {{$studentInfo->Class_name ?? "N/A"}}</li>
                    <li>Group Name : {{$studentInfo->group ?? "N/A"}}</li>
                    <li>Section : {{$studentInfo->section ?? "N/A"}}</li>
                    <li>Session : {{$studentInfo->Session ?? "N/A"}}</li>
                </ul>
            </div>
        </div>
</body>

</html>
