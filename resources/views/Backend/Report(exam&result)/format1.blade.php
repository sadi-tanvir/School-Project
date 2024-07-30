@extends('Backend.app')
@section('title')
    Student Tabulation Sheet1
@endsection
@section('Dashboard')
    @include('/Message/message')
    <style>
        .shadowStyle {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }
    </style>


    <div>
        <h1 class="text-2xl font-bold my-5 mx-5 text-center">Student Tabulation Format </h1>
    </div>
    <div class=" mb-3">
        <form action="{{ route('tabulation1', $school_code) }}" method="POST" class="p-5 shadowStyle rounded-[8px] border border-slate-300 w-2/5 mx-auto space-y-3">
                @csrf
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class
                    :</label>
                <select id="class" name="class"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select Class</option>
                    @foreach ($classes as $class)
                        <option>{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="group" class="block mb-2 text-sm font-medium whitespace-noWrap ">Group
                    :</label>
                <select id="group" name="group"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select Group</option>
                    @foreach ($groups as $group)
                        <option>{{ $group->group_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="section" class="block mb-2 text-sm font-medium whitespace-noWrap ">Section
                    :</label>
                <select id="section" name="section"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select section</option>
                    @foreach ($sections as $section)
                        <option>{{ $section->section_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="exam_name" class="block mb-2 text-sm font-medium whitespace-noWrap ">Exam Name
                    :</label>
                <select id="exam_name" name="exam_name"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select Exam Name</option>
                    @foreach ($examName as $exam)
                        <option>{{ $exam->class_exam_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="merit" class="block mb-2 text-sm font-medium whitespace-noWrap ">Merit Status
                    :</label>
                <select id="merit" name="merit_status"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select </option>
                  
                        <option value="class_wise">Class Wise</option>
                        <option value="section_wise">Section Wise</option>
                  
                </select>
            </div>

            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="year" class="block mb-2 text-sm font-medium whitespace-noWrap ">Year
                    :</label>
                @php
                    $currentYear = date('Y'); // Get the current year
                @endphp
                <select id="year" name="year"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select</option>
                    @foreach ($years as $year)
                        <option value="{{ $year->academic_year_name }}"
                            {{ $year->academic_year_name == $currentYear ? 'selected' : '' }}>
                            {{ $year->academic_year_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="w-full flex justify-end">
                <button type="submit"
                    class="w-1/3  text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">Print
                </button>
            </div>
        </form>
    </div>

    
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#class').change(function() {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('print.get-groups', $school_code) }}",
                method: 'post',
                data: {
                    class: class_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('#group').empty();
                    $('#group').append(
                        '<option disabled selected value="">Select</option>');
                    $.each(result, function(key, value) {
                        $('#group').append('<option value="' + value.group_name +
                            '">' + value.group_name + '</option>');
                    });
                }
            });
        });
        //section
        $('#class').change(function() {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('print.get-sections', $school_code) }}",
                method: 'post',
                data: {
                    class: class_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('#section').empty();
                    $('#section').append(
                        '<option disabled selected value="">Select</option>');
                    $.each(result, function(key, value) {
                        $('#section').append('<option value="' + value
                            .section_name + '">' + value.section_name +
                            '</option>');
                    });
                }
            });
        });

    });
</script>
