@extends('Backend.app')
@section('title')
Exam Marks Delete
@endsection
@section('Dashboard')
@include('/Message/message')
<div>
    <h1 class="">Exam Marks Delete</h1>
</div>

<div>
    <div class=" mb-10">
        <div class="card-body p-2">
            <form action="{{ route('get.Data',$school_code) }}" method="Get">
                @csrf
                <div class="grid grid-cols-7 gap-4">
                    <!-- Class Name -->
                    <div class="col-span-1">
                        <div class="">
                            <label for="class" class="text-gray-700">Class Name:</label>
                            <select id="class" name="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">
                                <option disabled selected>Select</option>
                                @foreach ($classData as $data)
                                <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Group -->
                    <div class="col-span-1">
                        <div class="">
                            <label for="class" class="text-gray-700">Group Name: </label>
                            <select id="group" name="group" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

                                <option disabled selected value="">Select</option>

                                @foreach ($groupData as $data)
                                <option value="{{ $data->group_name }}">{{ $data->group_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Section -->
                    <div class="col-span-1">
                        <div class="">
                            <label for="class" class="text-gray-700">Section:</label>
                            <select id="section" name="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

                                <option disabled selected value="">Select</option>

                                @foreach ($sectionData as $data)
                                <option value="{{ $data->section_name }}">{{ $data->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Subject -->
                    <div class="col-span-1">
                        <div class="">
                            <label for="class" class="text-gray-700">Subject Name:</label>
                            <select id="subject" name="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

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
                            <label for="class" class="text-gray-700">Exam Name:</label>
                            <select id="exam" name="exam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">
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
                            <select name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

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
            </form>
        </div>
    </div>

</div>

@if($markInputs!= null)



<form action="{{route("exam-marks.delete",$school_code)}}" method="post">
@csrf
@method('put')
    <table class="w-full text-sm text-left rtl:text-right text-black dark:text-blue-100">
        <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <input type="checkbox" name="" class="row-checkbox" id="select-all">
                </th>
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
                    Roll
                </th>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    Class
                </th>
                <th scope="col" class="px-6 py-3">
                    Subject
                </th>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    Full Marks
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Marks
                </th>
            </tr>
        </thead>
        @foreach($markInputs as $key => $data)
        <tbody>

            <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
                <input type="checkbox" name="selected_ids[]" class="row-checkbox" value="{{$data->id}}">
            </th>
            <td class="px-6 py-4">
                {{$key + 1}}
            </td>
            <td class="px-6 py-4">
                {{$data->name}}
            </td>
            <td class="px-6 py-4">
                {{$data->student_id}}
            </td>
            <td class="px-6 py-4">
                {{$data->student_roll}}
            </td>
            <td class="px-6 py-4">
                {{$data->class_name}}
            </td>

            <td class="px-6 py-4">
                {{$data->subject}}
            </td>
            <td class="px-6 py-4">
                {{$data->full_marks}}
            </td>
            <td class="px-6 py-4">
                {{$data->total_marks}}
            </td>
        </tbody>
        @endforeach
    </table>
    <div class="flex justify-end mr-20">
        <div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between ">
                <label class="w-5/12 " style="padding: 0;" for="item_name">Total Student = </label>
                <div class="w-5/12 text-left" style="padding: 0 0 10px 0;">
                    <input type="text" value="{{$markInputs->count()}}" name="total_items" id="total_items" class="bg-red-200 w-full text-left" readonly="readonly">
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-4">
        <div class="sm:w-9/12 sm:offset-w-1">
            <div class="flex flex-row items-start justify-between">
                <div class="sm:w-6/12"> </div>
                <div class="sm:w-3/12">
                    <button type="submit" class="btn p-1 bg-red-600 text-white text-xl">Delete</button>
                </div>
                <div class="sm:w-3/12"> </div>
            </div>
        </div>
    </div>
</form>





@endif
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function toggle(source) {
        checkboxes = document.querySelectorAll('.row-checkbox');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#class').change(function() {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('exam-marks.get-groups', $school_code) }}",
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
                url: "{{ route('exam-marks.get-sections', $school_code) }}",
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
                url: "{{ route('exam-marks.get-shifts', $school_code) }}",
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
                url: "{{ route('exam-marks.get-subjects', $school_code) }}",
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
                url: "{{ route('exam-marks.get-exams', $school_code) }}",
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



    // Check/uncheck all checkboxes when the select-all checkbox is clicked
    $('#select-all').change(function() {
        $('.row-checkbox').prop('checked', $(this).prop('checked'));
    });
</script>
@endsection