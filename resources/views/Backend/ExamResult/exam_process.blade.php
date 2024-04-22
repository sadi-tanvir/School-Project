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
            
            <div class="row form-group">

                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">CLASS:</label>
                    <select id="class-select"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
                        <option disabled selected >Select</option>
                        @foreach ($classData as $data)
                            <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">GROUP:</label>
                    <select id="group-select"

                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option disabled selected value="">Select</option>

                        @foreach ($groupData as $data)
                            <option value="{{ $data->group_name }}">{{ $data->group_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">SECTION:</label>
                    <select id="section-select"

                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option disabled selected value="">Select</option>

                        @foreach ($sectionData as $data)
                            <option value="{{ $data->section_name }}">{{ $data->section_name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="flex justify-between items-center mb-5">
                    <label for="student" class="text-gray-700 font-bold w-[150px] mr-2">STUDENT ROLL:</label>
                    <select id="student-select"

                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option disabled selected value="">Select</option>

                    </select>
                </div>
                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">EXAM NAME:</label>
                    <select

                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option disabled selected value="">Select</option>

                        @foreach ($classExamData as $data)
                            <option value="{{ $data->class_exam_name }}">{{ $data->class_exam_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">MERIT STATUS:</label>
                    <select

                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option disabled selected value="">Select</option>

                        <option value="1">Section Wise</option>
                        <option value="2">Class Wise</option>

                    </select>
                </div>
                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 font-bold w-[150px] mr-2">YEAR:</label>
                    <select

                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option disabled selected value="">Select</option>

                        @foreach ($academicYearData as $data)
                            <option value="{{ $data->academic_year_name }}">{{ $data->academic_year_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="hidden">

                    <input type="text" value="{{ $school_code }}" id="schoolCode">
                </div>
                <div class="row form-group">
                    <div class="offset-md-8 col-md-2" style="">
                        <button style="width: 100%;"
                            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  "
                            id="feesCollectSaved">Print</button>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch students based on selected class, group, and section
            function fetchStudents() {
                // Get the selected values of class, group, and section
                var className = $('#class-select').val();
                var groupName = $('#group-select').val();
                var sectionName = $('#section-select').val();


                var schoolCode = $('#schoolCode').val();
                console.log(schoolCode);
                // Make an AJAX request to fetch students
                $.ajax({
                    url: '/dashboard/getStudents/' + schoolCode + '/' + className + '/' + groupName + '/' +
                        sectionName,
                    type: 'GET',
                    success: function(data) {
                        // Clear existing options in the student select field
                        $('#student-select').empty();

                        // Populate student options
                        $.each(data, function(key, value) {
                            $('#student-select').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Event listeners for class, group, and section select fields
            $('#class-select, #group-select, #section-select').on('change', function() {
                // When any of these fields change, fetch students
                fetchStudents();
            });

            // Initially fetch students based on default selected values
            fetchStudents();
        });
    </script>
@endsection
