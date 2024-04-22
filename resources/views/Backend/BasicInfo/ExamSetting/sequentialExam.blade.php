@extends('Backend.app')
@section('title')
Exam Mark Setup
@endsection
@section('Dashboard')
    <div>
        <h3>
            Exam Mark Setup
        </h3>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
        <form id="dataForm" method="POST" action="{{ route('store.sequentialExam',$school_code) }}">
            @csrf
            @method('PUT')
        <div class="md:flex my-10 ">
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Class Name :</label>
            </div>
            <div class="mr-10">
                <select id="countries" name="class_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">

                        @if ($searchClassData === null)
                        <option disabled selected>Choose a class</option>
                    @elseif($searchClassData)
                        <option value="{{ $searchClassData }}" selected>{{ $searchClassData }}</option>
                    @endif

                    @foreach ($classData as $data)
                        <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                    @endforeach

                    </select>
            </div>
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Exam Name :</label>
            </div>
            <div class="mr-10">
                <select id="countries" name="exam_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">

                        @if ($searchClassExamName === null)
                                <option selected>Choose a exam</option>
                            @elseif($searchClassExamName)
                                <option value="{{ $searchClassExamName }}" selected>{{ $searchClassExamName }}</option>
                            @endif

                            @foreach ($classExamData as $data)
                                <option value="{{ $data->class_exam_name }}">{{ $data->class_exam_name }}</option>
                            @endforeach

                    </select>
            </div>
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Year :</label>
            </div>
            <div class="mr-5">
                <select name="year" id=''
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        @if ($searchAcademicYearName === null)
                        <option selected>Select Year</option>
                    @elseif($searchAcademicYearName)
                        <option value="{{ $searchAcademicYearName }}" selected>{{ $searchAcademicYearName }}
                        </option>
                    @endif

                    @foreach ($academicYearData as $data)
                        <option value="{{ $data->academic_year_name }}">{{ $data->academic_year_name }}</option>
                    @endforeach
                    </select>
            </div>
            <div>
                <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">GET DATA</button>
            </div>

        </div>



    <div class="flex">

        <div class="mr-20" >
            <div class="grid gap-6 mb-6  md:grid-cols-1 items-center ps-4 border border-blue-200 rounded  mx-20 px-20 py-10">
                <h3>
                    Select SEQUENTIAL 
                    <h3 class="text-rose-700">
                        (Please Select one)
                    </h3>
                </h3>
                
                <div>

                    <input id="sequential_exam" type="checkbox" value="Grade-TotalMark-Roll"  name="sequential_exam" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                <label for="sequential_exam" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Grade-TotalMark-Roll</label>
                </div>
                <div>
                    <input id="sequential_exam" type="checkbox" value="TotalMark-Grade-Roll" name="sequential_exam" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                <label for="sequential_exam" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">TotalMark-Grade-Roll</label>
                </div>
                <div>
                    <input id="sequential_exam" type="checkbox" value="TotalMark-Roll-Grade"  name="sequential_exam" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                <label for="sequential_exam" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">TotalMark-Roll-Grade</label>
                </div>
                <div>
                    <input id="sequential_exam" type="checkbox" value="Roll-TotalMark-Grade"  name="sequential_exam" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                <label for="sequential_exam" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Roll-TotalMark-Grade</label>

                </div>
               
               
                
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

        <div class=" text-lg font-bold">
           <div class="flex justify-center">
            <h3>
                EXAM SEQUENTIAL SETTING
            </h3>
           </div>
         
        <table class="w-full text-sm text-left rtl:text-right text-black ">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        SL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CLASS
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        EXAM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SEQUENTIAL
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($sequentialExamData as $key =>$data )
                    
                
                <tr class=" border-b border-blue-400">
                    <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
                        {{ $key + 1 }}
                    </th>
                    <td class="px-6 py-4">
                    {{$data->class_name}}
                    </td>
                    <td class="px-6 py-4">
                    {{$data->exam_name}}

                    </td>
                    <td class="px-6 py-4">

                    {{$data->sequential_exam}}

                    </td>
                    
                </tr>
                @endforeach



            </tbody>
        </table>
    </div>
    </div>
    <br> <br>
         

        
    </div>
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
