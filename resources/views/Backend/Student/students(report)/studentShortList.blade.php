@extends('Backend.app')
@section('title')
Student Short List Information
@endsection
@section('Dashboard')

@include('Message.message')
<div>
    <h3>
        Student Short List Information
    </h3>
</div>
<form method="POST" action="{{route('viewStudentShortList')}}">
    @csrf
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10 border-2 md:p-5">

        <div class="grid gap-6 mb-6 md:grid-cols-4 mt-2">
            <!-- Class Dropdown -->
            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900" for="class">Class</label>
                <select id="class" name="class"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <option disabled selected>Choose class</option>
                    @foreach($classes as $class)
                        <option value="{{$class->class_name}}">{{$class->class_name}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Group Dropdown -->
            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900" for="group">Group</label>
                <select name="group" id="group"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <option disabled selected>Choose group</option>
                    @foreach($groups as $group)
                        <option value="{{$group->group_name}}">{{$group->group_name}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Section Dropdown -->
            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900" for="section">Section</label>
                <select name="section" id="section"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <option disabled selected>Choose section</option>
                    @foreach($sections as $section)
                        <option value="{{$section->section_name}}">{{$section->section_name}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Category Dropdown -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900" for="category">Category</label>
                <select name="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <option disabled selected>Choose Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Blood Group Dropdown -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900" for="blood_group">Blood Group</label>
                <select name="blood_group"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option disabled selected>Choose blood</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>O+</option>
                    <option>O-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                </select>
            </div>
            <!-- Gender Dropdown -->
            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900" for="gender">Gender</label>
                <select name="gender"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <option disabled selected>Choose Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <!-- Religion Dropdown -->
            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900" for="religion">Religion</label>
                <select name="religion"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <option disabled selected>Choose religion</option>
                    <option>Islam</option>
                    <option>Hindu</option>
                    <option>Buddhism</option>
                    <option>Christian</option>
                </select>
            </div>
            <!-- Academic Year Dropdown -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900" for="academic_year">Academic Year</label>
                <select name="academic_year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option disabled selected>Choose Academic Year</option>
                    @foreach($years as $year)
                        <option value="{{$year->academic_year_name}}">{{$year->academic_year_name}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Status Dropdown -->
            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900" for="status">Status</label>
                <select name="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option disabled selected>Choose Status</option>
                    <option>new</option>
                    <option>old</option>
                </select>
            </div>
            <!-- From Date Picker -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900" for="from_date">From Date</label>
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-autohide type="text" name="from_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                        placeholder="Select date">
                </div>
            </div>
            <!-- To Date Picker -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900" for="to_date">To Date</label>
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-autohide type="text" name="to_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                        placeholder="Select date">
                </div>
                <div>
                    <input class="hidden" name="school_code" value="{{$school_code}}" type="text">
                </div>
            </div>
        </div>
        <div>
            <div class="my-5">
                <input id="selectAll" type="checkbox"
                    class="group-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                <label for="selectAll" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Select All</label>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4">

            @foreach($columns as $column)
                <div class="">
                    <input id="{{$column}}" value="{{$column}}" type="checkbox" name="columns[{{$column}}]"
                        class="group-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                    <label for="{{$column}}" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">{{$column}}</label>
                </div>
            @endforeach
        </div>

        <div class="md:flex justify-end mr-10 mt-10">
            <div>
                <button type="button" id="btn"
                    class="text-white bg-rose-600 hover:bg-rose-600 focus:ring-4 focus:ring-rose-600 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">PDF
                    Download</button>
            </div>
            <div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">View
                    Report</button>
            </div>
        </div>
    </div>

    @if($students != null)
        @if(!is_null($students) && count($students) > 0)
            <div id="page" class="mx-10">
                <table class="w-full text-sm text-left rtl:text-right text-black">
                    <thead class=" text-white uppercase bg-blue-600 border-b border-blue-400">
                        <tr>
                            @foreach ($col as $column)
                                <th scope="col" class="px-6 py-3 bg-blue-500">{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                @foreach ($col as $column)
                                    <td class="px-6 py-4">{{ $student->$column }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No students found.</p>
        @endif
    @endif
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.getElementById('selectAll').addEventListener('click', function () {
        const checkboxes = document.querySelectorAll('.group-checkbox');
        const selectAllChecked = this.checked;

        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllChecked;
        });
    });

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
@endsection