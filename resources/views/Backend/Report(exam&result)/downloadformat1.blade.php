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
            background-color: #5c85d6;
            background-color: #5c85d6 !important;
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
                        <span class="font-semibold">Email:</span>
                        {{ $schoolInfo->school_email }}
                        <br />
                        <span class="font-semibold">Website:</span>
                        {{ $schoolInfo->website }}
                        <br />
                    </p>

                </div>
                <div class="col-span-2 flex w-full justify-end text-start text-sm whitespace-nowrap">

                </div>
            </div>

            <p class="font-semi-bold text-center text-xl font-bold"><u>Tabulation Sheet</u></p>
            <table>
                <tbody>
                    <tr>
                        <td>Year</td>
                        <td>Class</td>
                        <td>Group</td>
                        <td>Section</td>
                        <td>Exam</td>
                        <td>T.Students</td>
                    </tr>
                    <tr>
                        <td>{{ $year }}</td>
                        <td>{{ $class }}</td>
                        <td>{{ $group }}</td>
                        <td>{{ $section }}</td>
                        <td>{{ $exam }}</td>
                        <td>{{ $count }}</td>
                    </tr>
                </tbody>
            </table>

            <table class="mt-5">
                <thead>
                    <tr>
                        <th rowspan="2">SL</th>
                        <th rowspan="2">STUDENT ID</th>
                        <th rowspan="2">STUDENT NAME</th>
                        <th rowspan="2">ROLL</th>
                        @foreach ($subjects as $subject)
                            <th rowspan="2">{{ strtoupper($subject) }}</th>
                        @endforeach
                        
                        <th rowspan="2">TOTAL</th>
                        <th rowspan="2">Merit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $index => $result)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $result['student_id'] }}</td>
                        <td>{{ $result['name'] }}</td>
                        <td>{{ $result['roll'] }}</td>
                        @foreach ($subjects as $subject)
                            <td>{{ $result['subjects'][$subject] }}</td>
                        @endforeach
                        <td>{{ $result['total'] }}</td>
                        <td>{{ $result['merit'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>



</body>


</html>
