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
        <div class="mt-5 page-container" id="page-{{ $loop->index }}">

            <div id="content-container"
                class=" mx-auto w-[992px] relative h-[1290px] bg-white  border-[7px] border-blue-500">
                <img id="background-image" src="{{asset($schoolInfo->logo)}}" alt="School Logo" />
                <div class="grid w-full grid-cols-7 items-start justify-between pt-20">
                    <div  class="col-span-2">
                        @foreach ($studentData as $studentInfo)
                            <div>
                                <img src="{{asset($studentInfo->image)}}" class="h-28 w-auto" alt="student pic" />
                            </div>
                        @endforeach
                    </div>
                    <div class="col-span-3 text-center ">
                        <h3 class="text-2xl font-semibold ">{{$schoolInfo->school_name}}</h3>
                        <p class="">
                            {{$schoolInfo->address}}
                            <br />
                            <span class="font-semibold">Contact No:</span>
                            {{$schoolInfo->mobile_number}},
                            <br>
                            <span class="font-semibold">Email:</span>
                            {{$schoolInfo->school_email}}
                            <br />
                            <span class="font-semibold">Website:</span>
                            {{$schoolInfo->website}}
                            <br />
                        </p>
                        <div class="flex justify-center">
                            <img src="{{asset($schoolInfo->logo)}}" class="h-24 w-auto" alt="School Logo" />
                        </div>
                    </div>
                    <div class="col-span-2 flex w-full justify-end text-start text-sm whitespace-nowrap">
                        <div class="ms-14 grid grow grid-cols-3">
                            <div class="col-span-1 border-l border-t border-black text-center bg-yellow-100">Grade</div>
                            <div class="col-span-1 border-e border-s border-t border-black text-center bg-yellow-100">Range
                            </div>
                            <div class="col-span-1 border-e border-t border-black text-center bg-yellow-100">GPA</div>




                            <div class="col-span-1 border-b border-l border-t border-black text-center">A+</div>
                            <div class="col-span-1 border-x border-y border-black text-center">80-100</div>
                            <div class="col-span-1 border-y border-r border-black text-center">5</div>

                            <div class="col-span-1 border-b border-l border-black text-center">A</div>
                            <div class="col-span-1 border-x border-b border-black text-center">70-79</div>
                            <div class="col-span-1 border-b border-e border-black text-center">4</div>

                            <div class="col-span-1 border-b border-l border-black text-center">A-</div>
                            <div class="col-span-1 border-x border-b border-black text-center">60-69</div>
                            <div class="col-span-1 border-b border-r border-black text-center">3.5</div>

                            <div class="col-span-1 border-b border-l border-black text-center">B</div>
                            <div class="col-span-1 border-x border-b border-black text-center">50-59</div>
                            <div class="col-span-1 border-b border-r border-black text-center">3</div>

                            <div class="col-span-1 border-b border-l border-black text-center">C</div>
                            <div class="col-span-1 border-x border-b border-black text-center">45-49</div>
                            <div class="col-span-1 border-b border-r border-black text-center">2</div>

                            <div class="col-span-1 border-b border-l border-black text-center">D</div>
                            <div class="col-span-1 border-x border-b border-black text-center">40-44</div>
                            <div class="col-span-1 border-b border-r border-black text-center">1</div>

                            <div class="col-span-1 border-b border-l border-black text-center">F</div>
                            <div class="col-span-1 border-x border-b border-black text-center">0-39</div>
                            <div class="col-span-1 border-b border-r border-black text-center">0</div>
                        </div>
                    </div>
                </div>

                <p class="font-semi-bold text-center text-xl font-bold"><u>PROGRESS REPORT</u></p>
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
                <table class="mt-5">
                    <tbody>
                        <tr>
                            <th rowspan="2">SL</th>
                            <th rowspan="2">Name Of Subjects</th>
                            <th rowspan="2">Full Marks</th>
                            <th rowspan="2">Highest Marks</th>
                            <th colspan="{{$shortCode->count()}}">Obtaining Marks</th>
                            <th rowspan="2" class="text-red-500">Total Mark</th>
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
                            $GPA = 0;
                            $grade = 0;
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
                            <td colspan="2" class="font-bold">Total Exam Marks</td>
                            <td colspan="" class="font-bold">{{$totalFullMarks}}</td>
                            <td colspan="{{$count + 1}}" class="font-bold">Obtained Marks And GPA</td>
                            <td colspan="" class="font-bold">{{$totalMarks}}</td>

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
                            <td colspan="" class="font-bold">{{$grade}}</td>
                            <td colspan="" class="font-bold">{{$GPA}}</td>
                        </tr>

                    </tbody>
                </table>

                <div class="my-5 grid grid-cols-10 text-center">
                    <div class="col-span-3 grid grid-cols-2">
                        <div class="col-span-1 border-b border-l border-r border-t border-black px-1">Result Status</div>
                        @if ($grade === "F")
                            <div class="col-span-1 border-b border-r border-t border-black px-1 text-red-700">Fail</div>
                        @else
                            <div class="col-span-1 border-b border-r border-t border-black px-1 text-green-700">Passed</div>
                        @endif


                        @if ($merit_status === "section_wise")

                            <div class="col-span-1 border-b border-l border-r border-black px-1">Section Position</div>
                            @foreach ($studentData as $positionSTD)
                                @foreach ($sorted_exam_process_data as $positionData)
                                    @if($positionData->student_id === $positionSTD->student_id)
                                        <div class="col-span-1 border-b border-r border-black px-1">
                                            {{$positionData->position}}
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach


                        @endif
                        @if ($merit_status === "class_wise")
                            <div class="col-span-1 border-b border-l border-r border-black px-1">Class Position</div>
                            @foreach ($studentData as $positionSTD)
                                @foreach ($sorted_exam_process_data as $positionData)
                                    @if($positionData->student_id === $positionSTD->student_id)
                                        <div class="col-span-1 border-b border-r border-black px-1">
                                            {{$positionData->position}}
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif


                        <div class="col-span-1 border-b border-l border-r border-black px-1">GPA (Without 4th)</div>
                        <div class="col-span-1 border-b border-r border-black px-1">{{$GPA}}</div>

                        <div class="col-span-1 border-b border-l border-r border-black px-1">Failed Subject (s)</div>
                        <div class="col-span-1 border-b border-r border-black px-1">{{$fail}}</div>

                        <div class="col-span-1 border-b border-l border-r border-black px-1">Total Present</div>
                        <div class="col-span-1 border-b border-r border-black px-1">-</div>

                        <div class="col-span-1 border-b border-l border-r border-black px-1">Total Absent</div>
                        <div class="col-span-1 border-b border-r border-black px-1">-</div>

                        <div class="col-span-1 border-b border-l border-r border-black px-1">Total Leave</div>
                        <div class="col-span-1 border-b border-r border-black px-1">-</div>
                    </div>
                    <div class="col-span-5 grid grid-cols-2 ml-5">
                        <div class="col-span-1 border-b border-l border-r border-t border-black  font-bold">
                            Moral & Behavior Evaluation
                        </div>
                        <div class="col-span-1 border-b border-r border-t border-black px-1 font-bold">
                            Co-Curricular Activities
                        </div>

                        <div class="col-span-1 border-b border-l border-r border-black px-1">Excellent</div>
                        <div class="col-span-1 border-b border-r border-black px-1">Sports</div>

                        <div class="col-span-1 border-b border-l border-r border-black px-1">Good</div>
                        <div class="col-span-1 border-b border-r border-black px-1">Cultural Function</div>

                        <div class="col-span-1 border-b border-l border-r border-black px-1">Average</div>
                        <div class="col-span-1 border-b border-r border-black px-1">Scout/BNCC</div>

                        <div class="col-span-1 border-b border-l border-r border-black px-1">Poor</div>
                        <div class="col-span-1 border-b border-r border-black px-1">Math Olympiad</div>

                        <div class="col-span-2 border-b border-l border-r border-black px-1 text-justify">
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
                    <div class="col-span-2 px-2">
                        <div class="flex justify-end">
                            @php
                                $results = [
                                    "ID" => $studentData[0]->student_id,
                                    "Name" => $studentData[0]->name,
                                    "Total Mark" => $totalMarks,
                                    "GPA" => $GPA,
                                ];
                                $resultJson = json_encode($results);
                                echo QrCode::size(150)->generate($resultJson);
                            @endphp
                        </div>
                    </div>
                </div>


                @php
                    $leftSignatures = [];
                    $centerSignatures = [];
                    $rightSignatures = [];
                @endphp

                @foreach($setSignature as $sign)
                    @foreach($signatures as $position)
                        @if($position->sign == $sign->signature_name)
                            @if($sign->positions == 'left')
                                @php
                                    $leftSignatures[] = $position;
                                @endphp
                            @elseif($sign->positions == 'center')
                                @php
                                    $centerSignatures[] = $position;
                                @endphp
                            @elseif($sign->positions == 'right')
                                @php
                                    $rightSignatures[] = $position;
                                @endphp
                            @endif
                        @endif
                    @endforeach
                @endforeach
                <div class="absolute bottom-0 left-0 w-full">
                    <div class="flex justify-between p-8  px-[120px]">
                        <div class="">

                            @foreach($leftSignatures as $left)
                                @if($left->image != null)
                                    <img class="w-20 h-10 pb-1" src="{{ asset($left->image) }}" alt="Signature">
                                    <div class="border-t border-dashed border-t-black px-5 pt-1.5">{{ $left->sign }}</div>

                                @else
                                    <div class="w-20 h-10 pb-1"></div>
                                    <div class="border-t border-dashed border-t-black px-5 pt-1.5">{{ $left->sign }}</div>
                                @endif
                            @endforeach
                        </div>
                        <div class="">
                            @foreach($centerSignatures as $center)
                                @if($center->image != null)
                                    <img class="w-20 h-10 pb-1" src="{{ asset($center->image) }}" alt="Signature">
                                    <div class="border-t border-dashed border-t-black px-5 pt-1.5">{{ $center->sign }}</div>
                                @else

                                    <div class="w-20 h-10 pb-1"></div>
                                    <div class="border-t border-dashed border-t-black px-5 pt-1.5">{{ $center->sign }}</div>
                                @endif
                            @endforeach
                        </div>
                        <div class="">
                            @foreach($rightSignatures as $right)
                                @if($right->image != null)
                                    <img class="w-20 h-10 pb-1" src="{{ asset($right->image) }}" alt="Signature">
                                    <div class="border-t border-dashed border-t-black px-5 pt-1.5">{{ $right->sign }}</div>
                                @else

                                    <div class="w-20 h-10 pb-1"></div>
                                    <div class="border-t border-dashed border-t-black px-5 pt-1.5 ">{{ $right->sign }}</div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</body>


</html>