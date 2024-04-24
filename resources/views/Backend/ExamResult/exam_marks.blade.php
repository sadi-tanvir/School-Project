@extends('Backend.app')
@section('title')
Exam Marks
@endsection
@section('Dashboard')
<!-- Message -->
@include('/Message/message')

<div>
    <h1 class="">Exam Marks</h1>
</div>



<div class="mx-10 mt-5">
    <div class=" mb-3">
        <form action="{{ route('findData', $school_code) }}" method="GET">
            @csrf
            <div class="md:flex  ">
                <div class="lg:grid grid-cols-8 gap-8">
                    <!-- Class Name -->
                    <div class="col-span-1">
                        <div class="">
                            <label for="class" class="text-gray-700">Class:</label>
                            <select id="class" name="class_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected value="">Select</option>
                                @foreach ($classData as $data)
                                <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Group -->
                    <div class="col-span-1">
                        <div class="">
                            <label for="group" class="text-gray-700">Group:</label>
                            <select id="group" name="group" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected>Select</option>
                                @foreach ($groupData as $data)
                                <option value="{{ $data->group_name }}">{{ $data->group_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Section -->
                    <div class="col-span-1">

                        <div class="">
                            <label for="section" class="text-gray-700">Section:</label>

                            <select id="section" name="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected>Select</option>
                                @foreach ($sectionData as $data)
                                <option value="{{ $data->section_name }}">{{ $data->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <!-- Shift -->
                    <div class="col-span-1">

                        <div class="">
                            <label for="shift" class="text-gray-700">Shift:</label>

                            <select id="shift" name="shift" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected>Select</option>
                                @foreach ($shiftData as $data)
                                <option value="{{ $data->shift_name }}">{{ $data->shift_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Subject -->
                    <div class="col-span-1">
                        <div class="">
                            <label for="class" class="text-gray-700">Subject:</label>
                            <select id="subject" name="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option disabled selected value="">Select</option>
                                @foreach ($subjectData as $data)
                                <option value="{{ $data->subject_name }}">{{ $data->subject_name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <!-- Exam -->
                    <div class="col-span-1">
                        <div class="">
                            <label for="class" class="text-gray-700">Exam:</label>

                            <select id="exam" name="exam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option disabled selected>Select</option>
                                @foreach ($classExamData as $data)
                                <option value="{{ $data->class_exam_name }}">{{ $data->class_exam_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Year -->
                    <div class="col-span-1">
                        <div class="">
                            <label for="class" class="text-gray-700">Year:</label>

                            <select name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option disabled selected value="">Select</option>
                                @foreach ($academicYearData as $data)
                                <option value="{{ $data->academic_year_name }}">{{ $data->academic_year_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>




                    <div class="col-span-1">
                        <div class="">
                            <button type="submit" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-green-800 mt-5">Find</button>
                        </div>
                    </div>

                </div>

                <div>


                    <div class="col-span-3">
                        <div class="md:mt-5">
                            <input type="file" class="file-input border file-input-primary w-full max-w-xs" />
                            <br>
                            <button class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-green-800 mt-3">Upload</button>
                        </div>
                    </div>
                </div>


            </div>
        </form>
    </div>


</div>


<hr>

@if($student!=null)
@php
$totalMarksSum = 0; // Initialize a variable to hold the sum
@endphp
 <form action="{{ route('exam.marks') }}" method="post" >

@csrf
<table class="w-full text-sm text-left rtl:text-right text-black dark:text-blue-100">
    <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 dark:text-white">
        <tr>
            <th scope="col" class="px-6 py-3 bg-blue-500">
                SL
            </th>
            <th scope="col" class="px-6 py-3">
                Student Name
            </th>
            <th scope="col" class="px-6 py-3 bg-blue-500">
                Student ID
            </th>
            <th scope="col" class="px-6 py-3">
                Class
            </th>
            <th scope="col" class="px-6 py-3 bg-blue-500">
                Roll
            </th>
            <th scope="col" class="px-6 py-3">
                Subject
            </th>
            <th scope="col" class="px-6 py-3 bg-blue-500">
                Full Marks
            </th>
            @php
            $totalMarksSum = 0;
            @endphp

            @foreach($shortCode as $code)
            @php
            $totalMarksSum += $code->total_mark; // Add each total mark to the sum

            @endphp

            <th scope="col" class="px-6 py-3">
                {{$code->short_code}} = {{$code->total_mark}}/{{$code->pass_mark}}
            </th>
            @endforeach

            <th scope="col" class="px-6 py-3 bg-blue-500">
                T. Marks
            </th>
            <th scope="col" class="px-6 py-3">
                Grade
            </th>
            <th scope="col" class="px-6 py-3 bg-blue-500">
                GPA
            </th>
            <th scope="col" class="px-6 py-3">
                Absent
            </th>
        </tr>
    </thead>
   
    @foreach($student as $key=>$data)

    <tbody>
        <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
            {{$key + 1}}
            <input class="hidden" value="{{$data->id}}" name="key[{{ $data->id }}]" type="text">
        </th>
        <td class="px-6 py-4">
            <input type="text" class="hidden" name="name[{{ $data->id }}]" value="{{$data->name}}">
            {{$data->name}}
        </td>
        <td class="px-6 py-4">
            {{$data->student_id}}
            <input type="text" class="hidden" name="student_id[{{ $data->id }}]" value=" {{$data->student_id}}">
        </td>
        <td class="px-6 py-4">
            {{$data->Class_name}}
           
        </td>
        <td class="px-6 py-4">
            {{$data->student_roll}}
            <input type="text" class="hidden" name="student_roll[{{ $data->id }}]" value="{{$data->student_roll}}">
        </td>
        <td class="px-6 py-4">
            {{$selectedSubjectName}}
            <input type="text" class="hidden" name="subject" value="{{$selectedSubjectName}}">
        </td>
        <td class="px-6 py-4">
            {{$totalMarksSum}}
            <input type="text" class="hidden" name="full_marks[{{ $data->id }}]" value="{{$totalMarksSum}}">
        </td>
        @foreach($shortCode as $code)
        <td class="px-6 py-4">
            <input type="number" name="short_marks[{{$code->short_code}}][{{$data->id}}]" value=0 class="mark-input md:w-[120px] md:h-[30px] px-2 rounded-md" data-total="{{$code->total_mark}}" data-pass=" {{$code->pass_mark}}"  data-acceptance=" {{$code->acceptance}}">
            
        </td>
        @endforeach
        <td class="px-6 py-4">
            <span class="total-marks">0</span>
            <input type="text" class="hidden total-marks" value="0" name="total_marks[{{$data->id}}]" >
        </td>

        <td class="px-6 py-4  ">
            <!-- <input type="number" class="mark-input row-input md:w-[120px] md:h-[30px] px-2 rounded-md" data-total="{{$code->total_mark}}" data-pass="{{$code->pass_mark}}"> -->

            <span class="grade" >F</span>
            <input type="text" class="hidden grade-input" value="F" name="grade[{{ $data->id }}]" >
            
        </td>
        <td class="px-6 py-4 ">
            <span class="gpa">0</span>
            <input type="text" class="hidden gpa-input" value="0" name="gpa[{{ $data->id }}]" >
        </td>

        <td class="px-6 py-4">
            <input type="checkbox" name="status[{{ $data->id }}]"  value="absent" class="row-checkbox" >
            <input type="text" class="hidden "  value="{{$selectedGroupName}}"  name="group" >
            <input type="text" class="hidden "  value="{{$selectedClassName}}"  name="class" >
            <input type="text" class="hidden"  value="{{$selectedSectionName}}" name="section" >
            <input type="text" class="hidden "  value="{{$selectedShiftName}}" name="shift" >
            <input type="text" class="hidden "  value="{{$selectedExamName}}" name="exam" >
            <input type="text" class="hidden"  value="{{$selectedYear}}" name="year" >
            <input type="text" class="hidden"  value="{{$school_code}}" name="school_code" >
        </td>


    </tbody>
    @endforeach
</table>
@endif

<div class="mt-5">

    <div class="w-full ">
        <div class="flex justify-around">
            <div class=" flex justify-between gap-5 ">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Blank
                    Page</button>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Print
                    Mark Page</button>

            </div>

            <div class=" flex justify-between gap-5">
                <input class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="submit">
                <a class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" href="/dashboard/{{$school_code}}"><i class="fa fa-times"></i> Close</a>
            </div>

        </div>
    </div>
</div>
</form>
<script>
    document.getElementById('generateExcelForm').addEventListener('submit', function(event) {
        event.preventDefault();
        console.log(this.action);
        fetch(this.action, {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }
            })
            .then(response => response.blob())
            .then(blob => {
                const url = window.URL.createObjectURL(new Blob([blob]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'table.xlsx');
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            })
            .catch(error => console.error('Error:', error));
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#class').change(function() {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('exam-marks.get-groups',$school_code) }}",
                method: 'post',
                data: {
                    class: class_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('#group').empty();
                    $('#group').append('<option disabled selected value="">Select</option>');
                    $.each(result, function(key, value) {
                        $('#group').append('<option value="' + value.group_name + '">' + value.group_name + '</option>');
                    });
                }
            });
        });
        //section
        $('#class').change(function() {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('exam-marks.get-sections',$school_code) }}",
                method: 'post',
                data: {
                    class: class_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('#section').empty();
                    $('#section').append('<option disabled selected value="">Select</option>');
                    $.each(result, function(key, value) {
                        $('#section').append('<option value="' + value.section_name + '">' + value.section_name + '</option>');
                    });
                }
            });
        });
        //shift
        $('#class').change(function() {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('exam-marks.get-shifts',$school_code) }}",
                method: 'post',
                data: {
                    class: class_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('#shift').empty();
                    $('#shift').append('<option disabled selected value="">Select</option>');
                    $.each(result, function(key, value) {
                        $('#shift').append('<option value="' + value.shift_name + '">' + value.shift_name + '</option>');
                    });
                }
            });
        });
        //subject name
        $('#class').change(function() {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('exam-marks.get-subjects',$school_code) }}",
                method: 'post',
                data: {
                    class: class_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('#subject').empty();
                    $('#subject').append('<option disabled selected value="">Select</option>');
                    $.each(result, function(key, value) {
                        $('#subject').append('<option value="' + value.subject_name + '">' + value.subject_name + '</option>');
                    });
                }
            });
        });
        //exam name
        $('#class').change(function() {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('exam-marks.get-exams',$school_code) }}",
                method: 'post',
                data: {
                    class: class_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('#exam').empty();
                    $('#exam').append('<option disabled selected value="">Select</option>');
                    $.each(result, function(key, value) {
                        $('#exam').append('<option value="' + value.class_exam_name + '">' + value.class_exam_name + '</option>');
                    });
                }
            });
        });

        // Similar code for getting sections, shifts, and other dynamic options
    });
</script>

<script>
    $(document).ready(function() {
        // Fetch GradeSetup data from PHP and store it in a JavaScript variable
        var gradeSetupData = JSON.parse("{!! addslashes($gradeSetupData) !!}");

        $('.mark-input').on('input', function() {
            var totalMarks = parseFloat($(this).attr('data-total')) || 0;
            var totalMarksRow = 0;
            var enteredMark = parseFloat($(this).val()) || 0;
            //var mark = parseInt($(this).val()) || 0;
            var allMarksAbovePass = true;

            // Check if entered mark exceeds total marks
            if (enteredMark > totalMarks) {
                $(this).val(0); // Reset input value to 0
                enteredMark = 0;
            }


            // // Iterate over all mark-input elements in the same row
            $(this).closest('tr').find('.mark-input').each(function() {
                var passMarks = parseFloat($(this).attr('data-pass')) || 0;
                var mark = parseFloat($(this).val()) || 0;
                totalMarksRow += mark;
                // console.log(passMarks);
                // console.log(mark);

                // Check if any mark is below pass mark
                if (mark < passMarks) {
                    allMarksAbovePass = false;

                    // Exit the loop if any mark is below pass mark
                }
            });

            // If all marks are above or equal to pass mark, calculate grade
            if (allMarksAbovePass) {

                calculateGrade($(this)); // Calculate grade
            } else {
               
                $(this).closest('tr').find('.grade').text('F');
                $(this).closest('tr').find('.grade-input').val('F');
                $(this).closest('tr').find('.gpa').text('0');
                $(this).closest('tr').find('.gpa-input').val('0');
            }

            // Display total marks for the current row
            $(this).closest('tr').find('.total-marks').text(totalMarksRow);
            $(this).closest('tr').find('.total-marks').val(totalMarksRow);
        });


        function calculateGrade(input) {
            var totalMarksRow = 0;
            input.closest('tr').find('.mark-input').each(function() {
                
                var dataacceptance = parseFloat($(this).attr('data-acceptance'));
                console.log('acc',dataacceptance);
                var mark=parseFloat($(this).val()) || 0;
                mark=mark*dataacceptance;
                totalMarksRow += mark;
                console.log('acc',totalMarksRow);

            });

            var letterGrade = 'F'; // Initialize letter grade
            var GPA = 0; // Initialize GPA
           
            // Compare totalMarksRow with mark_point_1st and mark_point_2nd from gradeSetupData
            gradeSetupData.forEach(function(gradeSetup) {
                //console.log(totalMarksRow >= gradeSetup.mark_point_1st);
                if (totalMarksRow >= gradeSetup.mark_point_1st && totalMarksRow <= gradeSetup.mark_point_2nd) {
                    letterGrade = gradeSetup.latter_grade;
                    GPA = gradeSetup.grade_point;
                }
            
            });

            // Display the calculated grade
            input.closest('tr').find('.grade').text(letterGrade);
            // Display the calculated GPA
            input.closest('tr').find('.gpa').text(GPA);
            //var gpaValue = GPA; // Use the calculated GPA directly
    input.closest('tr').find('.gpa-input').val(GPA);
    input.closest('tr').find('.grade-input').val(letterGrade);


        }
    });
</script>



@endsection