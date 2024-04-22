@extends('Backend.app')
@section('title')
Admit Setup
@endsection
@section('Dashboard')
@include('Message.message')
<div>
    <h3>
        Admit Setup
    </h3>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
    <form id="dataForm" method="POST" action="{{ route('store.add.admit.card',$school_code) }}">
        @csrf
        @method('PUT')
        <div class="grid md:grid-cols-9 gap-4 my-10 ">
            <div class=" md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Class :</label>
            </div>
            <div class="">
                <select id="class_name" name="class_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    @if ($selectClassData === null)
                    <option disabled selected>Choose a class</option>
                    @elseif($selectClassData)
                    <option value="{{ $selectClassData }}" selected>{{ $selectClassData }}</option>
                    @endif

                    @foreach($classData as $data)
                    <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class=" md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Group :</label>
            </div>
            <div class="">
                <select id="group_name" name="group_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    @if ($selectGroupData === null)
                    <option disabled selected>Choose a group</option>
                    @elseif($selectGroupData)
                    <option value="{{ $selectGroupData }}" selected>{{ $selectGroupData }}</option>
                    @endif


                    @foreach($groupData as $data)
                    <option value="{{ $data->group_name }}">{{ $data->group_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class=" md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Exam :</label>
            </div>
            <div class="">
                <select id="class_exam_name" name="class_exam_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                    @if ($selectClassExamName === null)
                    <option disabled selected>Choose a exam</option>
                    @elseif($selectClassExamName)
                    <option value="{{ $selectClassExamName }}" selected>{{ $selectClassExamName }}</option>
                    @endif

                    @foreach($classExamData as $data)
                    <option value="{{ $data->class_exam_name }}">{{ $data->class_exam_name }}</option>
                    @endforeach

                </select>
            </div>

            <div class=" md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Year :</label>
            </div>
            <div class="">
                <select id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                    @if ($selectYear === null)
                    <option disabled selected>Select Year</option>
                    @elseif($selectYear)
                    <option value="{{ $selectYear }}" selected>{{ $selectYear }}</option>
                    @endif

                    @foreach($yearData as $data)
                    <option value="{{ $data->academic_year_name }}">{{ $data->academic_year_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" onclick="submitForm()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">GET DATA</button>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.shift-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    document.getElementById('dataForm').submit();
                });
            });
        });
    </script>
    <script>
        function submitForm() {
            // Get the selected values
            var className = document.getElementById('class_name').value;
            var groupName = document.getElementById('group_name').value; // Corrected id
            var classExamName = document.getElementById('class_exam_name').value;
            var academicYearName = document.getElementById('year').value;

            // Send data via AJAX
            var formData = {
                class_name: className,
                group_name: groupName,
                class_exam_name: classExamName,
                year: academicYearName
            };

            console.log('admit', formData)
            // Send an AJAX request
            axios.post(`{{ route('add.admit.card',$school_code)}}`, formData)
                .then(function(response) {
                    // Handle success response
                    console.log(response.data);
                })
                .catch(function(error) {
                    // Handle error
                    console.error(error);
                });
        }
    </script>




    <div class="flex justify-center text-lg font-bold">
        <h3>
            ADMIT SETTING
        </h3>
    </div>


    <table class="w-full text-sm text-left rtl:text-right text-black ">
        <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
            <tr>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    SL
                </th>
                <th scope="col" class="px-6 py-3">
                    SUBJECT NAME
                </th>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Time
                </th>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    STATUS
                </th>

            </tr>
        </thead>
        <tbody>
            @if ($classWiseSubjectData !== null)
            @foreach ($classWiseSubjectData as $key => $data)
            <tr class=" border-b border-blue-400">
                <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
                    {{ $key + 1 }}
                </th>
                <td class="px-6 py-4">
                    {{ $data->subject_name }}
                </td>
                <td class="px-6 py-4">
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>

                        <input type="date" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  " placeholder="Select date">
                    </div>
                </td>
                <td class="px-6 py-4">
                    <input type="time" name="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg form-control" style="text-align:center;" value="0">
                </td>

                <td class="px-6 py-4 ">
                    <input id="subject_name" type="checkbox" value="{{ $data->subject_name }}" name="subject_name" class="group-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 ">
                    

                </td>
            </tr>
            @endforeach
            @endif


        </tbody>
    </table>


    <br><br>
    <div class="md:flex justify-center">

        <div class="mr-10">
            <button type="button" onclick="submitForm()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Save</button>

        </div>
        <div class="mr-10">
            <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Close</button>
        </div>

        <div class="ml-32">
            <h3>Total = 
                @if ($classWiseSubjectData !== null)
                    {{ $classWiseSubjectData->count() }}
                    @endif
                     <div class="border-2"></div>
            </h3>
        </div>

    </div>

    <script>
        function submitForm() {
            var className = document.getElementById('class_name').value;
            var groupName = document.getElementById('group_name').value; // Corrected id
            var classExamName = document.getElementById('class_exam_name').value;
            var academicYearName = document.getElementById('year').value;
           

            // Get all checkboxes
            var checkboxes = document.getElementsByName('subject_name');
            var selectedSubjects = [];

            // Loop through each checkbox
            checkboxes.forEach(function(checkbox) {
                // Check if the checkbox is checked
                if (checkbox.checked) {
                    // Get the corresponding date and time inputs
                    var dateInput = checkbox.closest('tr').querySelector('input[name="date"]');
                    var timeInput = checkbox.closest('tr').querySelector('input[name="time"]');

                    // Parse date and time strings into JavaScript Date objects
var date = new Date(dateInput.value);
var time = new Date('1970-01-01T' + timeInput.value);

// Convert date and time to local time zone
var localDate = date.toLocaleDateString();
var localTime = time.toLocaleTimeString();

// Store the converted date and time in an object
var selectedSubject = {
    subject: checkbox.value,
    date: localDate,
    time: localTime,
    class_name:className,
    group_name:groupName,
    class_exam_name:classExamName,
    year:academicYearName,
   



};

                    // Push the selected subject data to the array
                    selectedSubjects.push(selectedSubject);
                }
            });

            // Create a form element
            var form = document.createElement('form');
            form.setAttribute('method', 'POST');
            form.setAttribute('action', '{{ route("update.add.admit.card",$school_code) }}');
            form.setAttribute('enctype', 'multipart/form-data');

            // Add method spoofing input for PUT request
            var methodInput = document.createElement('input');
            methodInput.setAttribute('type', 'hidden');
            methodInput.setAttribute('name', '_method');
            methodInput.setAttribute('value', 'PUT');
            form.appendChild(methodInput);

            // Add CSRF token input
            var csrfTokenInput = document.createElement('input');
            csrfTokenInput.setAttribute('type', 'hidden');
            csrfTokenInput.setAttribute('name', '_token');
            csrfTokenInput.setAttribute('value', '{{ csrf_token() }}');
            form.appendChild(csrfTokenInput);

            // Add other inputs for selected subjects
            selectedSubjects.forEach(function(selectedSubject) {
                var subjectInput = document.createElement('input');
                subjectInput.setAttribute('type', 'hidden');
                subjectInput.setAttribute('name', 'selected_subjects[]');
                subjectInput.setAttribute('value', JSON.stringify(selectedSubject));
                form.appendChild(subjectInput);
            });

            // Append the form to the document body and submit it
            document.body.appendChild(form);
            form.submit();
        }
    </script>



    @endsection



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            let $dateDropdown = $('#date-dropdown');

            let currentYear = new Date().getFullYear();
            let earliestYear = 1970;

            while (currentYear >= earliestYear) {
                let $dateOption = $('<option>');
                $dateOption.text(currentYear);
                $dateOption.val(currentYear);
                $dateDropdown.append($dateOption);
                currentYear -= 1;
            }
        });
    </script>