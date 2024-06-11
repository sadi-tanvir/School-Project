@extends('Backend.app')
@section('title')
Exam Progress Report
@endsection
@section('Dashboard')
@include('/Message/message')
<div>
    <h1 class="">Exam Progress Report</h1>
</div>
<div class=" mb-3 card">
    <div class="card-body min-h-500 border rounded w-4/6 mx-auto mt-10">
        <div class="w-4/6 mx-auto p-5">
            <form action="{{route('exam_progressStudent', $school_code)}}" method="GET">
                @csrf
                <div class="row form-group">

                    <div class="flex justify-between items-center mb-5">
                        <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">Select Report:</label>
                        <select name="report"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
                            <option disabled selected>Select</option>
                            @foreach ($reports as $data)
                                <option value="{{ $data->report_name }}">{{ $data->report_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="flex justify-between items-center mb-5">
                        <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">CLASS:</label>
                        <select id="class" name="class"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
                            <option disabled selected>Select</option>
                            @foreach ($classData as $data)
                                <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="flex justify-between items-center mb-5">
                        <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">GROUP:</label>
                        <select id="group" name="group"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                            <option disabled selected value="">Select</option>

                            @foreach ($groupData as $data)
                                <option value="{{ $data->group_name }}">{{ $data->group_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="flex justify-between items-center mb-5">
                        <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">SECTION:</label>
                        <select id="section" name="section"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                            <option disabled selected value="">Select</option>

                            @foreach ($sectionData as $data)
                                <option value="{{ $data->section_name }}">{{ $data->section_name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="flex justify-between items-center mb-5">
                        <label for="student" class="text-gray-700 font-bold w-[150px] mr-2">STUDENT ID:</label>
                        <select id="student" name="student_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                            <option selected value="">Select</option>

                        </select>
                    </div>
                    <div class="flex justify-between items-center mb-5">
                        <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">EXAM NAME:</label>
                        <select name="exam_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                            <option disabled selected value="">Select</option>

                            @foreach ($classExamData as $data)
                                <option value="{{ $data->class_exam_name }}">{{ $data->class_exam_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="flex justify-between items-center mb-5">
                        <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">MERIT STATUS:</label>
                        <select name="merit_status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                            <option disabled selected value="">Select</option>

                            <option value="section_wise">Section Wise</option>
                            <option value="class_wise">Class Wise</option>

                        </select>
                    </div>
                    <div class="flex justify-between items-center mb-5">
                        <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">YEAR:</label>
                        <select name="year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">


                            @foreach ($academicYearData as $data)
                                <option value="{{ $data->academic_year_name }}">{{ $data->academic_year_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="hidden">

                        <input type="text" value="{{ $school_code }}" id="schoolCode">
                    </div>
                    <div class="row form-group">
                        <div class="offset-md-8 col-md-2">
                            <button type="submit" style="width: 100%;"
                                class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  "
                                id="feesCollectSaved">Print</button>
                        </div>
                    </div>



                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        //group
        $(document).ready(function () {
            $('#class').change(function () {
                var class_name = $(this).val();
                $.ajax({
                    url: "{{ route('exam.get-groups', $school_code) }}",
                    method: 'post',
                    data: {
                        class: class_name,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (result) {
                        $('#group').empty();
                        $('#group').append('<option disabled selected value="">Select</option>');
                        $.each(result, function (key, value) {
                            $('#group').append('<option value="' + value.group_name + '">' + value.group_name + '</option>');
                        });
                    }
                });
            });
            //section
            $('#class').change(function () {
                var class_name = $(this).val();
                $.ajax({
                    url: "{{ route('exam.get-sections', $school_code) }}",
                    method: 'post',
                    data: {
                        class: class_name,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (result) {
                        $('#section').empty();
                        $('#section').append('<option disabled selected value="">Select</option>');
                        $.each(result, function (key, value) {
                            $('#section').append('<option value="' + value.section_name + '">' + value.section_name + '</option>');
                        });
                    }
                });
            });

            //student 
            $('#class').change(function () {
                var class_name = $(this).val();
                $.ajax({
                    url: "{{ route('exam.get-student', $school_code) }}",
                    method: 'post',
                    data: {
                        class: class_name,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (result) {
                        $('#student').empty();
                        $('#student').append('<option  selected value="">Select</option>');
                        $.each(result, function (key, value) {
                            $('#student').append('<option value="' + value.student_id + '">' + value.student_id + '</option>');
                        });
                    }
                });
            });

        });
    </script>
    @endsection