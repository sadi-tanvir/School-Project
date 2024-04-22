@extends('Backend.app')
@section('title')
Short Code

@endsection
@section('Dashboard')

@include('Message.message')

<div>
    <h3>
        Set Short Code

    </h3>
</div>
<form action="{{ url('dashboard/setShortCode',$school_code) }}" method="POST" enctype="multipart/form-data" class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
    @csrf
    @method('PUT')
    <div>
        <div class="grid gap-6 mb-6 md:grid-cols-4 mt-2">
            <div>
                <div class="mr-5">
                    <label for="class_name" class="block mb-2 text-sm font-medium text-gray-900 ">Class Name:</label>
                </div>
                <select id="class_name" name="class_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">


                    @if($searchClassData=== null)
                    <option disabled selected>Choose a class</option>
                    @elseif($searchClassData )
                    <option value="{{ $searchClassData }}" selected>{{$searchClassData}}</option>
                    @endif

                    @foreach($classData as $data)
                    <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <div class="mr-5">
                    <label for="class_exam_name" class="block mb-2 text-sm font-medium text-gray-900 ">Exam Name:</label>
                </div>
                <select id="class_exam_name" name="class_exam_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    @if($searchClassExamName=== null)
                    <option selected>Choose a exam</option>
                    @elseif($searchClassExamName )
                    <option value="{{ $searchClassExamName }}" selected>{{$searchClassExamName}}</option>
                    @endif

                    @foreach($classExamData as $data)
                    <option value="{{ $data->class_exam_name }}">{{ $data->class_exam_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <div class="mr-5">
                    <label for="academic_year_name" class="block mb-2 text-sm font-medium text-gray-900 ">Year:</label>
                </div>
                <select name="academic_year_name" id='date-academic_year_name' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    @if($searchAcademicYearName=== null)
                    <option selected>Select Year</option>
                    @elseif($searchAcademicYearName )
                    <option value="{{ $searchAcademicYearName }}" selected>{{$searchAcademicYearName}}</option>
                    @endif

                    @foreach($academicYearData as $data)
                    <option value="{{ $data->academic_year_name }}">{{ $data->academic_year_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="hidden">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">School Code 
                </label>
                <input type="text" value="{{$school_code}}" name="school_code" id="last_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Police Station Name" />
            </div>


            <div class="flex justify-end">
                <!-- <button type="button" class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Get Data
                </button> -->
                <button type="button" onclick="submitForm()" class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Get Data</button>

            </div>
        </div>
    </div>
    <script>
        function submitForm() {
            // Get the selected values
            var className = document.getElementById('class_name').value;
            var classExamName = document.getElementById('class_exam_name').value;
            var academicYearName = document.getElementById('date-academic_year_name').value;
            var shortCodes = document.querySelectorAll('input[name="short_code"]:checked');

            // Create a form element
            var form = document.createElement('form');
            form.setAttribute('method', 'GET');
            form.setAttribute('action', '{{ route("set.short.code",$school_code) }}');
            form.setAttribute('enctype', 'multipart/form-data');

            // Add CSRF token input
            var csrfTokenInput = document.createElement('input');
            csrfTokenInput.setAttribute('type', 'hidden');
            csrfTokenInput.setAttribute('name', '_token');
            csrfTokenInput.setAttribute('value', '{{ csrf_token() }}');
            form.appendChild(csrfTokenInput);

            // Add other inputs
            var classNameInput = document.createElement('input');
            classNameInput.setAttribute('type', 'hidden');
            classNameInput.setAttribute('name', 'class_name');
            classNameInput.setAttribute('value', className);
            form.appendChild(classNameInput);

            var classExamNameInput = document.createElement('input');
            classExamNameInput.setAttribute('type', 'hidden');
            classExamNameInput.setAttribute('name', 'class_exam_name');
            classExamNameInput.setAttribute('value', classExamName);
            form.appendChild(classExamNameInput);

            var academicYearNameInput = document.createElement('input');
            academicYearNameInput.setAttribute('type', 'hidden');
            academicYearNameInput.setAttribute('name', 'academic_year_name');
            academicYearNameInput.setAttribute('value', academicYearName);
            form.appendChild(academicYearNameInput);

            // Add selected short codes
            shortCodes.forEach(function(shortCode) {
                var shortCodeInput = document.createElement('input');
                shortCodeInput.setAttribute('type', 'hidden');
                shortCodeInput.setAttribute('name', 'short_codes[]');
                shortCodeInput.setAttribute('value', shortCode.value);
                form.appendChild(shortCodeInput);
            });

            // Append the form to the document body and submit it
            document.body.appendChild(form);
            form.submit();
        }
    </script>

    <div class="flex justify-center text-md font-bold">
        <h2>CLASS WISE SHORT CODE SETTING</h2>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-black ">

        <thead class="text-lg text-white uppercase bg-blue-600 border-b border-blue-400 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    SL
                </th>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    SHORT CODE NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @if($shortCodeData !== null)
            @foreach($shortCodeData as $key=> $data)

            <tr class=" border-b capitalize text-lg">
                <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
                    {{$key + 1}}
                </th>
                <td class="px-6 py-4">
                    {{$data->short_code}}
                </td>
                <!-- <td class="px-6 py-4  text-center">
                    <input id="short_code" type="checkbox" value="{{ $data->short_code }}" name="status" class="group-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                </td> -->


                <td class="px-6 py-4 text-center">
                    @php
                    $found = false;
                    @endphp

                    @if($setCode !== null)


                    @foreach($setCode as $code)                

                    @if( $data->short_code === $code->short_code)
                    <input id="short_code" type="checkbox" value="{{ $code->short_code }}" name="short_code[{{ $code->short_code }}]" class="group-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  " checked>
                    @php
                    $found = true;
                    @endphp                   
                    @endif 
                    @endforeach
                    @endif 
                                 
               

                    @if(!$found)
                    <input id="short_code" type="checkbox" value="{{ $data->short_code }}" name="short_code[{{ $data->short_code }}]" class="group-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                    @endif
                </td>

            </tr>
            @endforeach
            @endif
            


        </tbody>
    </table>
    <br><br>
    <div class="grid md:grid-cols-3">
        <div class="mr-10 md:flex justify-center">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">Save</button>
        </div>
        <div class="mr-10 md:flex justify-center">
            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Close</button>
        </div>

        <div class="ml-32 md:flex justify-center">
            <h3>Total =
                @if($shortCodeData !== null)
                {{$shortCodeData->count()}}
                @endif
            </h3>
        </div>

    </div>
</form>
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