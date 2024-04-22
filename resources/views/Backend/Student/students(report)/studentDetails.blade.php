@extends('Backend.app')
@section('title')
    Student Details Information
@endsection
@section('Dashboard')
    @include('Message.message')
    <div class="py-5 mt-10">
        <h3 class="text-xl font-bold text-center">
            Student Details Information
        </h3>
    </div>
    <div class="">
        <div class="md:mx-52 border-2 p-10 bg-blue-950">
            <form action="{{ route('StudentDetailsPrint', $school_code) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid md:grid-cols-3 mb-5 ">
                    <div class=" ">
                        <label for="last_name" class="block mb-2 text-lg font-medium text-white ">CLASS :</label>
                    </div>
                    <div class="">
                        <select id="class-select" name="Class_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:border-blue-500 block w-full p-2.5 ">
                            <option>Choose a class</option>
                            @foreach($classes as $class)
                                <option>{{$class->class_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid md:grid-cols-3 mb-5">
                    <div class=" ">
                        <label for="last_name" class="block mb-2 text-lg font-medium text-white ">STUDENT ID :</label>
                    </div>
                    <div class="">
                        <select name="id" id="student-select" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose student id</option>
                            <option >Select</option>
                        </select>
                    </div>
                </div>
                <div class="grid md:grid-cols-3 mb-5">
                    <div class=" ">
                        <label for="year" class="block mb-2 text-lg font-medium text-white ">Year :</label>
                    </div>
                    <div class="">
                        <select id="" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose year</option>
                            @foreach($year as $year)
                                <option>{{$year->academic_year_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hidden">
                        <input type="text" value="{{ $school_code }}" id="schoolCode">
                    </div>
                </div>
                <div class=" flex justify-end">
                    <button type="submit" class="text-white bg-rose-600 hover:bg-rose-800 focus:ring-0 focus:outline-none F font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Print</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to fetch students based on selected class
        function fetchStudents() {
            // Get the selected value of the class
            var className = $('#class-select').val();
            var schoolCode = $('#schoolCode').val();

            // Make an AJAX request to fetch students
            $.ajax({
                url: '/dashboard/getStudentID/' + schoolCode + '/' + className,
                type: 'GET',
                success: function(data) {
                    // Clear existing options in the student select field
                    $('#student-select').empty();
                    console.log(data);
                    // Populate student options
                    $.each(data, function(key, value) {
                        // Append each student ID as a separate option tag
                        var optionTag = $('<option>').attr('value', key).text(value);
                        $('#student-select').append(optionTag);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Event listener for class select field
        $('#class-select').on('change', function() {
            // When the class field changes, fetch students
            fetchStudents();
        });

        // Initially fetch students based on default selected class
        fetchStudents();
    });
</script>

    
@endsection
