<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>
    <style>
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: -1;
            width: 60%;
        }

        .content {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body class="bg-blue-100">
    <div class=" bg-white w-[1500px] px-[120px] mx-auto" id="page">
        <div class="grid grid-cols-3 w-full justify-between items-center p-5">
            <div>
                <img src="https://i.pinimg.com/originals/82/c6/5b/82c65b9bb0a75026fc4c82a438b4cc9b.jpg" class="rounded-full w-28 h-28" alt="">
            </div>
            <div class="text-center">
                <h3 class="text-2xl text-blue-400 font-bold">Pallabi Mazedul Islam Model High School</h3>
                <p class="text-sm">13/14,Pallabi, Dhaka - 1216. <br>
                    Contact No: 01309108183 <br>
                    Email: mimodelschool1978@gmail.com <br>
                    Website: http://pmimhs.edu.bd/ <br>

                </p>
                <div class="flex justify-center">
                    <img src="https://i.pinimg.com/originals/82/c6/5b/82c65b9bb0a75026fc4c82a438b4cc9b.jpg" class="rounded-full w-28 h-28" alt="">
                </div>
                <p class="font-bold font-semi-bold text-center text-xl">PROGRESS REPORT</p>
            </div>

            <div class="mx-10 md:pl-20 text-sm text-center">
                <div class="grid grid-cols-3">
                    <div class=" col-span-1 ">Grade</div>
                    <div class=" p-1 col-span-1">Range</div>
                    <div class=" p-1 col-span-1">GPA</div>

                        <div class="border-t border-b border-l border-black p-1 col-span-1">A+</div>
                        <div class="border border-black p-1 col-span-1">80-100</div>
                        <div class="border-t border-b border-r border-black p-1 col-span-1">5</div>

                        <div class="border-t border-b border-l border-black p-1 col-span-1">A</div>
                        <div class="border border-black p-1 col-span-1">70-79</div>
                        <div class="border-t border-b border-r border-black p-1 col-span-1">4</div>

                        <div class="border-t border-b border-l border-black p-1 col-span-1">A-</div>
                        <div class="border border-black p-1 col-span-1">60-69</div>
                        <div class="border-t border-b border-r border-black p-1 col-span-1">3.5</div>

                        <div class="border-t border-b border-l border-black p-1 col-span-1">B</div>
                        <div class="border border-black p-1 col-span-1">50-59</div>
                        <div class="border-t border-b border-r border-black p-1 col-span-1">3</div>

                        <div class="border-t border-b border-l border-black p-1 col-span-1">C</div>
                        <div class="border border-black p-1 col-span-1">45-49</div>
                        <div class="border-t border-b border-r border-black p-1 col-span-1">2</div>

                        <div class="border-t border-b border-l border-black p-1 col-span-1">D</div>
                        <div class="border border-black p-1 col-span-1">40-44</div>
                        <div class="border-t border-b border-r border-black p-1 col-span-1">1</div>

                        <div class="border-t border-b border-l border-black p-1 col-span-1">F</div>
                        <div class="border border-black p-1 col-span-1">0-39</div>
                        <div class="border-t border-b border-r border-black p-1 col-span-1">0</div>

                    </div>
                </div>
            </div>
        </div>
        {{-- student info --}}
        <div class="grid grid-cols-2">
            <div class="grid grid-cols-3  ">
                <div class=" col-span-1 font-bold">Name of Student</div>
                <div class=" p-1.5 col-span-2">:</div>
                <div class="  col-span-1 font-bold">Father's Name</div>
                <div class=" p-1.5 col-span-2">:</div>
            </div>
        </div>
        <div class="grid grid-cols-2">
            <div class="grid grid-cols-3  ">
                <div class=" col-span-1 font-bold">Mother's Name</div>
                <div class=" p-1.5 col-span-2">:</div>
                <div class=" col-span-1 font-bold">Student ID</div>
                <div class=" p-1.5 col-span-2">:</div>
                <div class=" col-span-1 font-bold">Roll No</div>
                <div class=" p-1.5 col-span-2">:</div>
                <div class="  col-span-1 font-bold">Class</div>
                <div class=" p-1.5 col-span-2">:</div>
            </div>
            <div class="grid grid-cols-3  ">
                <div class=" col-span-1 font-bold">Exam</div>
                <div class="= p-1.5 col-span-2">:</div>
                <div class="= col-span-1 font-bold">Year/Session</div>
                <div class="= p-1.5 col-span-2">:</div>
                <div class=" col-span-1 font-bold">Group</div>
                <div class="= p-1.5 col-span-2">:</div>
                <div class="= col-span-1 font-bold">Section</div>
                <div class="= p-1.5 col-span-2">:</div>
            </div>
        </div>


        <div class="grid grid-cols-8 mt-1 text-center font-bold">
            <div class=" border-b border-l border-t  border-black p-1.5 "> SL</div>
            <div class="border-l border-b border-t  border-black p-1.5 ">Name Of
                Subjects</div>
            <div class="border-l border-b border-t border-black p-1.5 ">Full
                Marks</div>
            <div class="border-l border-b border-t border-r border-black p-1.5 ">Highest
                Marks</div>
            <div class=" border-b border-t  border-black p-1.5 ">WR </div>
            <div class="border-l border-b border-t  border-black p-1.5 ">Total
                Marks</div>
            <div class="border-l border-b border-t border-black p-1.5 ">Letter
                Grade</div>
            <div class="border-l border-b border-t border-r border-black p-1.5 ">Grade
                WR Point</div>

            <div class=" border-b border-l   border-black p-1.5 "> </div>
            <div class="border-l border-b   border-black p-1.5 "></div>
            <div class="border-l border-b border-black p-1.5 "></div>
            <div class="border-l border-b border-r border-black p-1.5 "></div>
            <div class=" border-b  border-black p-1.5 "></div>
            <div class="border-l border-b   border-black p-1.5 "></div>
            <div class="border-l border-b border-black p-1.5 "></div>
            <div class="border-l border-b  border-r border-black p-1.5 "></div>


            <div class=" border-b border-l   border-black p-1.5 col-span-2">Total Exam Marks </div>
            <div class="border-l border-b   border-black p-1.5 "></div>
            <div class="border-l border-b border-black p-1.5 col-span-2"> Obtained Marks & GPA</div>
            <div class="border-l border-b border-r border-black p-1.5 "></div>
            <div class=" border-b  border-black p-1.5 "></div>
            <div class="border-l border-b border-r  border-black p-1.5 "></div>

        </div>


            <div class="grid grid-cols-3 mt-10 text-center">
                <div class="grid grid-cols-2">
                    <div class="border-t border-b border-l border-r border-black p-1 col-span-1">Result Status</div>
                    <div class="border-t border-b border-r border-black p-1 col-span-1 text-green-700">Passed</div>

                    <div class="border-b border-l border-r border-black p-1 col-span-1">Section Position</div>
                    <div class="border-b border-r border-black p-1 col-span-1">1</div>

                    <div class="border-b border-l border-r border-black p-1 col-span-1">GPA (Without 4th)</div>
                    <div class="border-b border-r border-black p-1 col-span-1">5.00</div>

                    <div class="border-b border-l border-r border-black p-1 col-span-1">Failed Subject (s)</div>
                    <div class="border-b border-r border-black p-1 col-span-1">0</div>

                    <div class="border-b border-l border-r border-black p-1 col-span-1">Total Present</div>
                    <div class="border-b border-r border-black p-1 col-span-1">-</div>

                    <div class="border-b border-l border-r border-black p-1 col-span-1">Total Absent</div>
                    <div class="border-b border-r border-black p-1 col-span-1">-</div>

                    <div class="border-b border-l border-r border-black p-1 col-span-1">Total Leave</div>
                    <div class="border-b border-r border-black p-1 col-span-1">-</div>
                </div>
                <div class="grid grid-cols-2 md:ml-10">
                    <div class="border-t border-b border-l border-r border-black p-1 col-span-1 font-bold">Moral & Behavior Evaluation</div>
                    <div class="border-t border-b border-r border-black p-1 col-span-1 font-bold">Co-Curricular Activities</div>

                    <div class="border-b border-l border-r border-black p-1 col-span-1">Excellent</div>
                    <div class="border-b border-r border-black p-1 col-span-1">Sports</div>

                    <div class="border-b border-l border-r border-black p-1 col-span-1">Good</div>
                    <div class="border-b border-r border-black p-1 col-span-1">Cultural Function</div>

                    <div class="border-b border-l border-r border-black p-1 col-span-1">Average</div>
                    <div class="border-b border-r border-black p-1 col-span-1">Scout/BNCC</div>

                    <div class="border-b border-l border-r border-black p-1 col-span-1">Poor</div>
                    <div class="border-b border-r border-black p-1 col-span-1">Math Olympiad</div>

                    <div class="text-justify border-l border-r border-black p-1 col-span-2">
                        <p class="font-bold">Comments:</p><br>
                        Congratulations on your brilliant result. If you desire to be a real successful man, obtain ‘A’ in your character, then obtain ‘A’ in your study. May Allah bestow you the capability. Keep it up for the coming days.
                    </div>
                </div>
                <div></div>
            </div>

            <div class="py-10 mt-20 flex justify-end items-center">
                <div class="border-t border-black pt-2 w-[25%] text-center">Headmaster</div>
            </div>
        </div>
    </div>
    </div>
    @endforeach   
    @endforeach
    <div class="flex justify-center mt-10">
        <div class="mr-10">
            <a href="/dashboard/progressReport/{{ $school_code }}">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Back</button>
            </a>
        </div>
        <div>
            <button id="btn" type="button" class="text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Download</button>
        </div>
    </div>

    <script>
        let btn = document.getElementById('btn');
        let page = document.getElementById('page');

        btn.addEventListener('click', function () {
            html2PDF(page, {
                jsPDF: {
                    format: 'a4',
                },
                imageType: 'image/jpeg',
                output: './pdf/generate.pdf'
            });
        });
    </script>
</body>

</html>
