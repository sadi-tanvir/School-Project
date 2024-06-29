@extends('Backend.app')
@section('title')
Student Attendence
@endsection
@include('/Message/message')




@section('Dashboard')
@include('Shared.ContentHeader', ['title' => 'Student Attendence'])

<div class="relative overflow-x-auto md:my-10 py-6 border-2  rounded-lg">
    <div class="flex justify-start gap-3 border-b-2 border-blue-500">
        <p class="ms-5 flex items-center justify-center gap-3 rounded-t-lg bg-blue-700 px-7 py-2.5 pb-3 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300">Subject</p>
        <p class="me-2 flex items-center justify-center gap-3 rounded-t-lg px-7 py-2.5 pb-3 text-sm font-medium text-black hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300">Period</p>
    </div>
    
    <div class="p-6">
    <form action="{{route('attendanceStudent', $school_code)}}" method="GET">
        @csrf

        <div class="grid gap-3 mb-6 md:grid-cols-7 mt-2">
            <div>
                <label for="class" class="block mb-2 text-sm font-medium">Class</label>
                <select id="class" name="class"
                    class="bg-gray-200 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5 ">
                    <option disabled selected>Choose a class </option>
                    @foreach ($classes as $class)
                        <option>{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="group" class="block mb-2 text-sm font-medium">Group</label>
                <select id="group" name="group"
                    class="bg-gray-200 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5 ">
                    <option disabled selected>Choose a group</option>
                    @foreach ($groups as $group)
                        <option>{{ $group->group_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="section" class="block mb-2 text-sm font-medium">Section</label>
                <select id="section" name="section"
                    class="bg-gray-200 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5">
                    <option disabled selected>Choose a Section</option>
                    @foreach ($sections as $section)
                        <option>{{ $section->section_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="year" class="block mb-2 text-sm font-medium">Year</label>
                <select id="year" name="year"
                    class="bg-gray-200 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5 ">
                    @foreach ($years as $year)
                        <option>{{ $year->academic_year_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="period" class="block mb-2 text-sm font-medium">Period</label>
                <select id="period" name="period"
                    class="bg-gray-200 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5 ">
                    <option selected>Select Period</option>
                    @foreach ($periods as $period)
                        <option>{{ $period->class_period }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="date" class="block mb-2 text-sm font-medium">Date</label>
                <input
                    class="bg-gray-200 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5 "
                    type="date" placeholder="Selecct Date" name="date">
            </div>
            <div class="flex justify-end items-center mt-7">
                <button type="submit"
                    class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 h-12 w-full">Search
                </button>
            </div>
        </div>
    </form>
  
    <table class="w-full text-sm  rtl:text-right text-black text-center ">
        <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 rounded-t-xl">
            <tr>
                <th scope="col" class="px-6 py-3 bg-blue-500 ">
                    <input id="studentdata-checkbox" type="checkbox" value=""
                        class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 ">
                </th>
                <th scope="col" class="px-6 py-3">
                    SL
                </th>
                <th scope="col" class="px-6 py-3">
                    Student ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Student Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Section
                </th>
                <th scope="col" class="px-6 py-3">
                    Roll
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    <div>
                        sms
                    </div>
                    <div>
                    <input id="select-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                    </div>
                </th>
            </tr>
        </thead>
        <form action="{{route('storeAttendance',$school_code)}}" method="POST">
        @csrf
        <tbody>
                  
            @if ($data != null)   
            <input type="text" class="py-4 hidden" name="class" value="{{$selectclass}}">
                        <input type="text" class="py-4 hidden" name="group" value="{{ $selectgroup}}">
                        <input type="text" class="py-4 hidden" name="year" value="{{ $selectyear}}">
                        <input type="text" class="py-4 hidden" name="period" value="{{ $selectperiod}}">
                        <input type="text" class="py-4 hidden" name="date" value="{{ $selectdate}}">
                        <input type="text" class="py-4 hidden" name="section" value="{{ $selectsection }}">
                @foreach ($data as $key => $studentData)
                    <tr class="even:bg-gray-100 odd:bg-white">
                        <td>
                            <input id="link-checkbox" type="checkbox" value="active" name="status[]" 
                                class="student-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        </td>
                        <td class="py-4">{{ $key + 1 }}</td>
                        <td class="py-4">{{ $studentData->student_id }}</td>
                        <td class="py-4">{{ $studentData->name }}</td>
                        <td class="py-4">{{ $studentData->section }}</td>
                        <td class="py-4">{{ $studentData->student_roll }}</td>
                        <input type="text" class="py-4 hidden" name="student_id[]" value="{{ $studentData->student_id }}">
                        <input type="text" class="py-4 hidden" name="name[]" value="{{ $studentData->name }}">
                     
                        <input type="text" class="py-4 hidden" name="student_roll[]" value="{{ $studentData->student_roll }}">
                    
                        <td class="py-4">
                            <div class="flex justify-center">
                                <div class="flex items-center me-4">
                                    <input type="radio" value="Present" name="attendance[{{ $key }}]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Present</label>
                                </div>
                                <div class="flex items-center me-4">
                                    <input type="radio" value="Absent" name="attendance[{{ $key }}]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Absent</label>
                                </div>
                                <div class="flex items-center me-4">
                                    <input type="radio" value="Late" name="attendance[{{ $key }}]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Late</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" value="Leave" name="attendance[{{ $key }}]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Leave</label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input id="link-checkbox" type="checkbox" value=""
                                class="subject-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
    
    <p class="h-[1px] w-full bg-slate-300"></p>
    <div class="flex justify-between items-center mt-4">
        <div>
            <label for="sms" class="block mb-2 text-sm font-medium">Send Sms</label>
            <select id="sms" name="sms"
                class="bg-gray-200 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 ">
3               <option selected value="non-masking">Non Masking</option>
                <option value="masking">Masking</option>
            </select>
        </div>
        <div class="flex items-center gap-2">
            <label for="total" class="block mb-2 text-sm font-medium whitespace-nowrap">Total Student</label>
            <input
                class="bg-gray-200 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 "
                type="text" placeholder="1923892">
        </div>
    </div>
    <div class="flex justify-end mt-5">
        <button type="button"
            class="  text-white bg-red-700 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-10 py-3.5 me-2 mb-2 focus:outline-none">Cancel
        </button>
        <button type="submit"
            class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-14 py-3.5 me-2 mb-2 focus:outline-none">Save
        </button>
    </div>
    </form>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#class').change(function () {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('add.get-groups', $school_code) }}",
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
                url: "{{ route('add.get-sections', $school_code) }}",
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


    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllCheckbox = document.getElementById('select-all');
        const subjectCheckboxes = document.querySelectorAll('.subject-checkbox');

        selectAllCheckbox.addEventListener('change', function() {
            subjectCheckboxes.forEach(function(checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        subjectCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (!checkbox.checked) {
                    selectAllCheckbox.checked = false;
                } else if (Array.from(subjectCheckboxes).every(cb => cb.checked)) {
                    selectAllCheckbox.checked = true;
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllCheckbox = document.getElementById('studentdata-checkbox');
        const subjectCheckboxes = document.querySelectorAll('.student-checkbox');

        selectAllCheckbox.addEventListener('change', function() {
            subjectCheckboxes.forEach(function(checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        subjectCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (!checkbox.checked) {
                    selectAllCheckbox.checked = false;
                } else if (Array.from(subjectCheckboxes).every(cb => cb.checked)) {
                    selectAllCheckbox.checked = true;
                }
            });
        });
    });
</script>