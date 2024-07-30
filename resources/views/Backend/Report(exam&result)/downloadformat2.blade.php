<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <style>
        /* @page {
            size: A4;
            margin: 0;
        } */

        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        #content-container {
            position: relative;
            margin: 0 auto;
            max-width: 1500px;
            padding: 0 60px;
        }

        #background-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            opacity: 0.1;
            /* 50% opacity */
            width: 30%;
            /* Adjust as needed */
            height: auto;
            /* Maintain aspect ratio */
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
            padding: 2px 10px;
        }

        tr th {
            border: 1px solid #000000;
            text-align: center;
            padding: 2px 10px;
            background-color: #bbccfa !important;
            color: black !important;

        }

        .content td,
        .content th {
            border-top: 1px solid transparent;
            padding: 2px 10px 2px 15px;
            color: black;
        }

        .page-container {
            page-break-after: always;
        }

        @media print {
            .page-container {
                page-break-before: always;
            }
        }
    </style>
</head>

<body class="bg-blue-100 text-sm">

    <div class="mt-5 page-container" id="">

        <div id="content-container"
            class=" mx-auto w-[992px] relative h-[1290px] bg-white  border-[7px] border-blue-500">
            <img id="background-image" src="{{ asset($schoolInfo->logo) }}" alt="School Logo" />
            <div class="grid w-full grid-cols-7 items-start justify-between pt-20">
                <div class="col-span-2">
                    <div class="flex justify-center">
                        <img src="{{ asset($schoolInfo->logo) }}" class="h-24 w-auto" alt="School Logo" />
                    </div>
                </div>
                <div class="col-span-3 text-center ">
                    <h3 class="text-2xl font-semibold ">{{ $schoolInfo->school_name }}</h3>
                    <p class="">
                        {{ $schoolInfo->address }}
                        <br />
                        <span class="font-semibold">Contact No:</span>
                        {{ $schoolInfo->mobile_number }},
                        <br>

                    </p>

                </div>
                <div class="col-span-2 flex w-full justify-end text-start text-sm whitespace-nowrap">

                </div>
            </div>

            <p class="font-semi-bold text-center text-xl font-bold pb-5"><u>Tabulation Sheet</u></p>
            <table>
                <tbody>
                    <tr>

                        <td>Class</td>
                        <td>Group</td>
                        <td>Section</td>
                        <td>Exam</td>
                        <td>Year</td>
                    </tr>
                    <tr>

                        <td>{{ $class }}</td>
                        <td>{{ $group }}</td>
                        <td>{{ $section }}</td>
                        <td>{{ $exam }}</td>
                        <td>{{ $year }}</td>
                    </tr>
                </tbody>
            </table>

            @foreach ($student as $stu)
            @php
                $sum_total=0;
                $sum_letter=0;
            @endphp
                <table class="mt-5">

                    <thead>
                        <tr>
                            <th colspan="{{ $count }}">
                                <label class="">Name:</label><label class="pr-32">{{ $stu->name }} </label>
                                <label class="">Student ID:</label> <label
                                    class="pr-32">{{ $stu->student_id }}</label>
                                <label class="">Roll:</label> <label class="pr-32">{{ $stu->roll }}</label>
                            </th>
                        </tr>

                        <tr class="font-bold">
                            <td>SL</td>
                            <td>Name Of Subjects</td>
                            @foreach ($shortCode as $data)
                                <td>{{ $data->short_code }}</td>
                            @endforeach

                            <td>Total Marks</td>
                            <td>Letter</td>
                            <td>Grade</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subject as $key => $sub)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ strtoupper($sub) }}</td>

                                @foreach ($shortCode as $data)
                               
                                @php
                                    $Smark = null;
                                    $total_mark=null;
                                    $letter=null;
                                    $grade=null;
                                    foreach ($marks as $mark) {
                                        if($stu->student_id== $mark->student_id){
                                            if(strtoupper($sub)==$mark->subject){

                                                $shortMarkss = json_decode($mark->short_marks, true);
                                                if (isset($shortMarkss[$data->short_code])) {
                                                    $Smark = $shortMarkss[$data->short_code];
                                                   // break; 
                                                }
                                                $total_mark=intval($mark->total_marks);
                                                $sum_total=$sum_total+$total_mark;
                                               
                                                //dd($sum_total);   
                                               
                                                $letter=$mark->gpa;
                                                $sum_letter=$sum_letter+$letter;
                                                $grade=$mark->grade;


                                            }
                                            
                                        }
                                        
                                    }
                                 //   break;  
                                @endphp
                                <td>
                                    {{ $Smark !== null ? $Smark : '-' }}
                                </td>
                            @endforeach

                                <td>{{$total_mark!== null ? $total_mark : '-'}}</td>
                                <td>{{$letter !== null ? $letter : '-'}}</td>
                                <td>{{$grade !== null ? $grade : '-'}}</td>
                            </tr>

                        @endforeach  
                       @php
                            //dd($sum_total);   
                       @endphp    
                                     
                        <tr>
                            <td colspan='2' class="font-bold">Merit: </td>
                            <td colspan='{{$shortCount}}'></td>
                            <td colspan=''>{{$sum_total}}</td>
                            <td colspan=''></td>
                            <td colspan=''></td>
                        </tr>
                       
                    </tbody>
                </table>
            @endforeach



        </div>
    </div>



</body>


</html>
