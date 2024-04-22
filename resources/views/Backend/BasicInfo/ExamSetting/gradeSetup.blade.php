@extends('Backend.app')
@section('title')
Grade
@endsection
@section('Dashboard')

@include('Message.message')
<div>
    <h3>
        Grade/Grade Setup
    </h3>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10 p-5">
    <form id="myForm" action="{{route('addGradeSetup',$school_code)}}" method="POST">
    @csrf
        <div class="md:flex my-10 ">
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Exam Name :</label>
            </div>
            <div class="mr-5">
                <select id="class_exam_name" name="class_exam_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose a exam</option>
                    @foreach($classExamData as $data)
                    <option value="{{ $data->class_exam_name }}">{{ $data->class_exam_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Year :</label>
            </div>
            <div class="mr-5">
                <select id="academic_year_name" name="academic_year_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose year</option>
                    @foreach($academicYearData as $data)
                    <option value="{{ $data->academic_year_name }}">{{ $data->academic_year_name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">GET DATA</button>
            </div>

        </div>


    </form>



    @if($classExamName)
    <form action="{{route('saveGradeSetup',$school_code)}}" method="POST">
@csrf

<input class="hidden" value="{{$classExamName}}" name="class_exam_name" type="text">
<input class="hidden" value="{{$academic_year_name}}" name="academic_year_name" type="text">

    <div class="flex ">

        <div class="">
            <div class="grid gap-5 mb-6  md:grid-cols-1 items-center ps-4 border border-blue-200 rounded   mx-5 px-20 py-10">
                <h3>
                    Select Class
                </h3>
                @foreach($classData as $data)
                <div>
                    
                @php
             $classChecked = $gradesetup->where('class_name', $data->class_name)
                                        ->where('academic_year_name', $academic_year_name)
                                        ->where('class_exam_name', $classExamName)
                                        ->isNotEmpty();
    @endphp
    @unless($classChecked)
        <input id="group_{{ $data->class_name }}" 
               type="checkbox" 
               value="{{ $data->class_name }}" 
               name="class_name[]" 
               class="group-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  " 
               @if($classChecked) checked @endif
        >
    @endunless
                    <label for="group_{{ $data->class_name }}" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">{{ $data->class_name }}</label>
                </div>
                @endforeach
            </div>
        </div>

 
        <div class=" text-lg font-bold">
            <div class="flex justify-center">
                <h3>
                    Exam Wise Grade Setting
                </h3>
            </div>

            <table class=" text-sm text-left rtl:text-right text-black ">
                <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            SL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Letter
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            Grade
                        </th>
                        <th scope="col" class="px-6 py-3">
                            1st Range
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            2nd Range
                        </th>
                        <th scope="col" class="px-6 py-3">
                            STATUS
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gradePointData as $key => $data)
                    <tr class=" border-b capitalize text-lg">
                        <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
                            {{$key + 1}}
                            <input class="hidden" value="{{$key}}" name="key[]" type="text">
                        </th>
                        <td class="px-6 py-4">
                            {{$data->letter_grade}}
                            <input class="hidden" value="{{$data->letter_grade}}" name="latter_grade[{{$key}}]" type="text">
                        </td>
                        <td class="px-6 py-4">
                            <!-- {{$data->grade_point}} -->
                            <input class="border-0 w-[80px]" value="{{$data->grade_point}}" name="grade_point[{{$key}}]" type="text">
                        </td>
                        <td class="px-6 py-4">
                            <!-- {{$data->mark_point_1st}} -->
                            <input class="border-0 w-[80px]" value="{{$data->mark_point_1st}}" name="mark_point_1st[{{$key}}]" type="text">
                        </td>
                        <td class="px-6 py-4 ">
                            <!-- {{$data->mark_point_2nd}} -->
                            <input class="border-0 w-[80px]" value="{{$data->mark_point_2nd}}" name="mark_point_2nd[{{$key}}]" type="text">
                        </td>
                        <td class="px-6 py-4 ">
                            <div>
                                <select class="" name="status[]" id="">
                                    <option selected value="active">Active</option>
                                    <option value="in_active">In Active</option>
                                </select>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br> <br>
    <input class="hidden" value="approved" name="action" type="text">

    <div class="md:flex justify-center">
    <div class="mr-10">
            <a href="/dashboard/viewGradeSetup" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">GET Config View</a>
        </div>
        <div class="mr-10">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">Save</button>
        </div>
        <div class="mr-10">
            <a href="/dashboard"  class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Close</a>
        </div>

        <div class="ml-32">
            <h3>Total = <div class=" border-2"></div>
            </h3>
        </div>
    </div>

</form>

@else
<div class="md:flex justify-center">
        <div class="mr-10">
            <a href="/dashboard/viewGradeSetup/{{$school_code}}" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">GET Config View</a>
        </div>
       
        <div class="mr-10">
            <a href="/dashboard" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Close</a>
        </div>

        <div class="ml-32">
            <h3>Total = <div class=" border-2"></div>
            </h3>
        </div>

    </div>
    @endif

   
 </div>
@endsection
