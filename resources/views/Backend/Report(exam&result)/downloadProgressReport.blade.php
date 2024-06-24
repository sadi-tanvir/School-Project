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
        @page {
            size: A4;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        #content-container {
            position: relative;
            margin: 0 auto;
            max-width: 1500px;
            padding: 0 120px;
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
            padding: 6px 20px;
        }

        tr th {
            border: 1px solid #000000;
            text-align: center;
            padding: 6px 20px;
            background-color: #1e3a8a;
            color: #fff;
        }

        .content td,
        .content th {
            border-top: 1px solid transparent;
            padding: 2px 10px 2px 15px;
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

<body class="bg-blue-100">
    <!-- @php

        foreach ($sorted_exam_process_data as $index => $data) {
            if ($data->total_gpa == 0) {
                $data->position = 0;
            } else {
                $data->position = $index + 1;
            }
        }

    @endphp -->

    @foreach ($students as $key => $studentData)
        <div class="mt-10 page-container" id="page-{{ $loop->index }}">

            <div id="content-container" class=" mx-auto w-[1150px]  bg-white px-[120px] border-[7px] border-blue-500">
                <img id="background-image" src="{{asset($schoolInfo->logo)}}" alt="School Logo" />
                <div class="pb- grid w-full grid-cols-7 items-start justify-between pt-28">
                    <div class="col-span-2">
                        <img src="{{asset($schoolInfo->logo)}}" class="h-28 w-auto" alt="School Logo" />
                    </div>
                    <div class="col-span-3 text-center">
                        <h3 class="text-3xl font-semibold">{{$schoolInfo->school_name}}</h3>
                        <p class="text- pt-6">
                            {{$schoolInfo->address}}
                            <br />
                            <span class="font-semibold">Contact No:</span>
                            {{$schoolInfo->mobile_number}},

                            <span class="font-semibold">Email:</span>
                            {{$schoolInfo->school_email}}
                            <br />
                            <span class="font-semibold">Website:</span>
                            {{$schoolInfo->website}}
                            <br />
                        </p>
                    </div>
                    <div class="col-span-2 flex w-full justify-end text-start text-sm">
                        <div class="ms-14 grid grow grid-cols-3">
                            <div class="col-span-1 border-l border-t border-black p-1 ps-4">Grade</div>
                            <div class="col-span-1 border-e border-s border-t border-black p-1 ps-4">Range</div>
                            <div class="col-span-1 border-e border-t border-black p-1 ps-4">GPA</div>

                            <div class="col-span-1 border-b border-l border-t border-black p-1 ps-4">A+</div>
                            <div class="col-span-1 border-x border-y border-black p-1 ps-4">80-100</div>
                            <div class="col-span-1 border-y border-r border-black p-1 ps-4">5</div>

                            <div class="col-span-1 border-b border-l border-black p-1 ps-4">A</div>
                            <div class="col-span-1 border-x border-b border-black p-1 ps-4">70-79</div>
                            <div class="col-span-1 border-b border-e border-black p-1 ps-4">4</div>

                            <div class="col-span-1 border-b border-l border-black p-1 ps-4">A-</div>
                            <div class="col-span-1 border-x border-b border-black p-1 ps-4">60-69</div>
                            <div class="col-span-1 border-b border-r border-black p-1 ps-4">3.5</div>

                            <div class="col-span-1 border-b border-l border-black p-1 ps-4">B</div>
                            <div class="col-span-1 border-x border-b border-black p-1 ps-4">50-59</div>
                            <div class="col-span-1 border-b border-r border-black p-1 ps-4">3</div>

                            <div class="col-span-1 border-b border-l border-black p-1 ps-4">C</div>
                            <div class="col-span-1 border-x border-b border-black p-1 ps-4">45-49</div>
                            <div class="col-span-1 border-b border-r border-black p-1 ps-4">2</div>

                            <div class="col-span-1 border-b border-l border-black p-1 ps-4">D</div>
                            <div class="col-span-1 border-x border-b border-black p-1 ps-4">40-44</div>
                            <div class="col-span-1 border-b border-r border-black p-1 ps-4">1</div>

                            <div class="col-span-1 border-b border-l border-black p-1 ps-4">F</div>
                            <div class="col-span-1 border-x border-b border-black p-1 ps-4">0-39</div>
                            <div class="col-span-1 border-b border-r border-black p-1 ps-4">0</div>
                        </div>
                    </div>
                </div>
                <p class="font-semi-bold py-3 text-center text-2xl font-bold">PROGRESS REPORT</p>
                {{-- student info --}}
                @foreach ($studentData as $studentInfo)
                    <div class="grid grid-cols-2">
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 font-bold">Name of Student</div>
                            <div class="col-span-2 p-1.5">: {{$studentInfo->name}}</div>
                            <div class="col-span-1 font-bold">Father's Name</div>
                            <div class="col-span-2 p-1.5">: {{$studentInfo->father_name}}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 font-bold">Mother's Name</div>
                            <div class="col-span-2 p-1.5">: {{$studentInfo->mother_name}}</div>
                            <div class="col-span-1 font-bold">Student ID</div>
                            <div class="col-span-2 p-1.5">: {{$studentInfo->student_id}}</div>
                            <div class="col-span-1 font-bold">Roll No</div>
                            <div class="col-span-2 p-1.5">: {{$studentInfo->student_roll}}</div>
                            <div class="col-span-1 font-bold">Class</div>
                            <div class="col-span-2 p-1.5">: {{$studentInfo->Class_name}}</div>
                        </div>
                        <div class="grid grid-cols-3">
                            <div class="col-span-1 font-bold">Exam</div>
                            <div class="= col-span-2 p-1.5">: {{$exam_name}}</div>
                            <div class="= col-span-1 font-bold">Year/Session</div>
                            <div class="= col-span-2 p-1.5">: {{$studentInfo->year}}</div>
                            <div class="col-span-1 font-bold">Group</div>
                            <div class="= col-span-2 p-1.5">: {{$studentInfo->group}}</div>
                            <div class="= col-span-1 font-bold">Section</div>
                            <div class="= col-span-2 p-1.5">: {{$studentInfo->section}}</div>
                        </div>
                    </div>
                @endforeach
                <table class="mt-6">
                    <tbody>
                        <tr>
                            <th rowspan="2">SL</th>
                            <th rowspan="2">Name Of Subjects</th>
                            <th rowspan="2">Full Marks</th>
                            <th rowspan="2">Highest Marks</th>
                            <th colspan="{{$shortCode->count()}}">Obtaining Marks</th>
                            <th rowspan="2">Total Mark</th>
                            <th rowspan="2">Letter Grade</th>
                            <th rowspan="2">Grade Point</th>
                        </tr>
                        <tr>
                            @foreach($shortCode as $short)
                                <th>{{$short->short_code}}</th>
                            @endforeach
                        </tr>
                        @php
                            $totalFullMarks = 0;
                            $totalMarks = 0;
                            $totalGPA = 0;
                            $fail = 0;
                            $Grade = [];
                            $gpa = [];
                             $GPA=0;
                             $grade=0;
                            $studentId = "";
                            $gradePoint = "";
                            $studentRoll = "";
                            $count = 0;
                        @endphp
                        @foreach ($existingRecords as $data)
                                @foreach ($data as $key => $exam)
                                        @if ($studentInfo->student_id == $exam->student_id)
                                                <tr>
                                                    @php
                                                        $highestMark = $highestMarks->firstWhere('subject', $exam->subject);
                                                        $shortMarkss = json_decode($exam->short_marks, true);
                                                        $count = count($shortMarkss);

                                                        $Grade[] = $exam->grade;
                                                        $gpa[] = $exam->gpa;
                                                        $studentId = $studentInfo->student_id;
                                                        $gradePoint = $exam->gpa;
                                                        $studentRoll = $studentInfo->student_roll;
                                                        $gradeMark = 0;
                                                    @endphp
                                                    <td>{{$key + 1}}</td>
                                                    <td>{{$exam->subject}}</td>
                                                    <td>{{$exam->full_marks}}</td>
                                                    <td>{{ $highestMark ? $highestMark->highest_marks : 'N/A' }}</td>
                                                    @foreach($shortMarkss as $short)
                                                        <td>{{$short}}</td>
                                                    @endforeach
                                                    <td>{{$exam->total_marks}}</td>
                                                    <td>{{$exam->grade}}</td>
                                                    <td>{{$exam->gpa}}</td>
                                                </tr>


                                                @php
                                                    $totalFullMarks += $exam->full_marks;
                                                    $totalMarks += $exam->total_marks;
                                                    $totalGPA += $exam->gpa;
                                                @endphp
                                                @php
                                                    $grade = '';
                                                    if ($totalMarks != 0) {
                                                        $gradeMark = $totalMarks / $data->count();
                                                    }
                                                    foreach ($grades as $gradeSetup) {
                                                        if (isset($gradeSetup->mark_point_1st) && isset($gradeSetup->mark_point_2nd)) {
                                                            if ($gradeMark >= $gradeSetup->mark_point_1st && $gradeMark <= $gradeSetup->mark_point_2nd) {
                                                                $grade = $gradeSetup->latter_grade;
                                                                break;
                                                            }
                                                        } else {
                                                        }
                                                    }
                                                @endphp
                                                @php

                                                    $GPA = $totalGPA / $data->count();
                                                    $GPA = number_format($GPA, 2);
                                                @endphp
                                        @endif
                                @endforeach
                        @endforeach




                        <tr>
                            <td colspan="2">Total Exam Marks</td>
                            <td colspan="">{{$totalFullMarks}}</td>
                            <td colspan="{{$count + 1}}">Obtained Marks And GPA</td>
                            <td colspan="">{{$totalMarks}}</td>

                            @php

                                foreach ($Grade as $Sgrade) {
                                    if ($Sgrade == 'F') {
                                        $grade = 'F';
                                        $fail++;
                                    }
                                }
                                foreach ($gpa as $Sgpa) {
                                    if ($Sgpa == '0') {
                                        $GPA = '0';
                                        break;
                                    }
                                }
                                $position = ($GPA == 0) ? 0 : 1;
                            @endphp
                            <td colspan="">{{$grade}}</td>
                            <td colspan="">{{$GPA}}</td>
                        </tr>

                    </tbody>
                </table>

                <div class="my-10 grid grid-cols-8 text-center">
                    <div class="col-span-3 grid grid-cols-2">
                        <div class="col-span-1 border-b border-l border-r border-t border-black p-1">Result Status</div>
                        @if ($grade === "F")
                            <div class="col-span-1 border-b border-r border-t border-black p-1 text-red-700">Fail</div>
                        @else
                            <div class="col-span-1 border-b border-r border-t border-black p-1 text-green-700">Passed</div>
                        @endif


                        @if ($merit_status === "section_wise")

                            <div class="col-span-1 border-b border-l border-r border-black p-1">Section Position</div>
                            @foreach ($studentData as $positionSTD)
                                @foreach ($sorted_exam_process_data as $positionData)
                                    @if($positionData->student_id === $positionSTD->student_id)
                                        <div class="col-span-1 border-b border-r border-black p-1">
                                            {{$positionData->position}}
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach


                        @endif
                        @if ($merit_status === "class_wise")
                            <div class="col-span-1 border-b border-l border-r border-black p-1">Class Position</div>
                            @foreach ($studentData as $positionSTD)
                                @foreach ($sorted_exam_process_data as $positionData)
                                    @if($positionData->student_id === $positionSTD->student_id)
                                        <div class="col-span-1 border-b border-r border-black p-1">
                                            {{$positionData->position}}
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif


                        <div class="col-span-1 border-b border-l border-r border-black p-1">GPA (Without 4th)</div>
                        <div class="col-span-1 border-b border-r border-black p-1">{{$GPA}}</div>

                        <div class="col-span-1 border-b border-l border-r border-black p-1">Failed Subject (s)</div>
                        <div class="col-span-1 border-b border-r border-black p-1">{{$fail}}</div>

                        <div class="col-span-1 border-b border-l border-r border-black p-1">Total Present</div>
                        <div class="col-span-1 border-b border-r border-black p-1">-</div>

                        <div class="col-span-1 border-b border-l border-r border-black p-1">Total Absent</div>
                        <div class="col-span-1 border-b border-r border-black p-1">-</div>

                        <div class="col-span-1 border-b border-l border-r border-black p-1">Total Leave</div>
                        <div class="col-span-1 border-b border-r border-black p-1">-</div>
                    </div>
                    <div class="col-span-3 grid grid-cols-2 md:ml-10">
                        <div class="col-span-1 border-b border-l border-r border-t border-black p-1 font-bold">
                            Moral & Behavior Evaluation
                        </div>
                        <div class="col-span-1 border-b border-r border-t border-black p-1 font-bold">
                            Co-Curricular Activities
                        </div>

                        <div class="col-span-1 border-b border-l border-r border-black p-1">Excellent</div>
                        <div class="col-span-1 border-b border-r border-black p-1">Sports</div>

                        <div class="col-span-1 border-b border-l border-r border-black p-1">Good</div>
                        <div class="col-span-1 border-b border-r border-black p-1">Cultural Function</div>

                        <div class="col-span-1 border-b border-l border-r border-black p-1">Average</div>
                        <div class="col-span-1 border-b border-r border-black p-1">Scout/BNCC</div>

                        <div class="col-span-1 border-b border-l border-r border-black p-1">Poor</div>
                        <div class="col-span-1 border-b border-r border-black p-1">Math Olympiad</div>

                        <div class="col-span-2 border-b border-l border-r border-black p-1 text-justify">
                            @php
                                $comments = "";
                                foreach ($gradePoints as $gradesData) {
                                    if ($gradesData->letter_grade === $grade) {
                                        $comments = $gradesData->note;
                                        break;
                                    }
                                }
                            @endphp

                            <p class="font-bold">Comments:</p>
                            <br />
                            {{$comments}}
                        </div>
                    </div>
                    <div class="col-span-2 ps-6">
                        @php
                            $results = [
                                "ID" => $studentData[0]->student_id,
                                "Name" => $studentData[0]->name,
                                "Total Mark" => $totalMarks,
                                "GPA" => $GPA,
                            ];
                            $resultJson = json_encode($results);
                            echo QrCode::size(100)->generate($resultJson);
                        @endphp
                    </div>
                </div>


                <div class=" flex justify-end  py-10">
                    <div class="w-[200px]">
                        <img class="w-1/2" src="{{asset($signImage)}}" alt="">
                        <div class=" border-t border-black  text-center">{{$signatureName}}</div>
                    </div>
                </div>


            </div>
        </div>
    @endforeach

    <div class="mt-10 flex justify-center">
        <div class="mr-10">
            <a href="/dashboard/progressReport/{{ $school_code }}">
                <button type="button"
                    class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 sm:w-auto">
                    Back
                </button>
            </a>
        </div>
        <!-- <div>
            <button id="download-pdfs" type="button"
                class="text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Download
                PDFs</button>
        </div> -->

    </div>
</body>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.getElementById('download-pdfs').addEventListener('click', async function () {
        const { jsPDF } = window.jspdf;
        const pages = document.querySelectorAll('.page-container');

        const pdf = new jsPDF('p', 'mm', 'a4');

        for (let i = 0; i < pages.length; i++) {
            const page = pages[i];
            await html2canvas(page).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                if (i > 0) {
                    pdf.addPage();
                }
                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
            });
        }

        pdf.save('student_reports.pdf');
    });
</script> -->

</html>