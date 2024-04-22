@extends('Backend.app')
@section('title')
4th Subject Setup
@endsection
@section('Dashboard')

@include('Message.message')

<div>
    <h3>
        Fourth Subject Setup
    </h3>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
    <form action="{{route('addFourthSubject')}}" method="POST" >
        @csrf
        <div class="grid md:grid-cols-9 gap-4 my-10 ">
            <div class="mr-2 md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Class :</label>
            </div>
            <div class="mr-2">
                <select id="classSelect" name="class_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "> 
                @foreach($classes as $class)
                    <option value="{{ $class->class_name }}">{{$class->class_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mr-2 md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Group :</label>
            </div>
            <div class="mr-2">
                <select id="groupSelect" name="group_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    @foreach($groups as $group)
                    <option >{{$group->group_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mr-2 md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Section :</label>
            </div>
            <div class="mr-2">
                <select id="countries" name="section_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                  
                    @foreach($sections as $section)
                    <option >{{$section->section_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mr-2 md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Year :</label>
            </div>
            <div class="mr-2">
              
                 
                <select name="year" id='' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                @foreach($years as $year)
                    <option >{{$year->academic_year_name}}</option>
                    @endforeach
                 
                </select>
            </div>
            <div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">GET DATA</button>
            </div>

        </div>


    </form>
    <div class=" text-lg font-bold">
        <div class="flex justify-center">
            <h3>
                FOURTH SUBJECT SETTING
            </h3>
        </div>


        <!-- optional subject part  -->
<form action="{{route('saveFourthSubject')}}" method="POST">
    @csrf

       @if($students)

       @php
    $data = [
        [
            'id' => 'linked-checkbox',
            'value' => 'Home Science',
            'label' => 'Home Science'
        ],
        [
            'id' => 'checkbox',
            'value' => 'Agriculture',
            'label' => 'Agriculture'
        ],
        [
            'id' => 'link-checkbox',
            'value' => 'Higher Math',
            'label' => 'Higher Math'
        ],
        [
            'id' => '-checkbox',
            'value' => 'Biology',
            'label' => 'Biology'
        ]
    ];
@endphp

        <div class="lg:w-[700px] mx-auto mt-5 border p-5 mb-5">
            <h1 class="text-xl mx-5 mb-5">Select optional Subject</h1>
            <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 ">
                @foreach($data as $item)
                    <div class="flex items-center optional-subject">
                        <input id="{{ $item['id'] }}" type="checkbox" value="{{ $item['value'] }}" name="optional_subject" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                        <label  class="ms-2 text-sm font-medium text-gray-900 ">{{ $item['label'] }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="lg:w-[700px] mx-auto mt-5 border p-5 mb-5">
            <h1 class="text-xl mx-5 mb-5">Select Compulsory Subject</h1>
            <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 ">
                @foreach($data as $item)
                    <div class="flex items-center optional-subject">
                        <input id="{{ $item['id'] }}" type="checkbox" name="compulsory_subject" value="{{ $item['value'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                        <label  class="ms-2 text-sm font-medium text-gray-900 ">{{ $item['label'] }}</label>
                    </div>
                @endforeach
            </div>
        </div>
       @endif



        <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const optionalCheckboxes = document.querySelectorAll('.optional-subject input[type="checkbox"]');
            const compulsoryCheckboxes = document.querySelectorAll('.compulsory-subject input[type="checkbox"]');

            optionalCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    if (this.checked) {
                        disableCompulsorySubjects();
                    } else {
                        enableCompulsorySubjects();
                    }
                });
            });

            function disableCompulsorySubjects() {
                compulsoryCheckboxes.forEach(function (checkbox) {
                    checkbox.checked = false;
                    checkbox.disabled = true;
                });
            }

            function enableCompulsorySubjects() {
                compulsoryCheckboxes.forEach(function (checkbox) {
                    checkbox.disabled = false;
                });
            }
        });
    </script> -->

        <table class="w-full text-sm text-left rtl:text-right text-black ">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        <input id="bordered-checkbox-1" type="checkbox" value="" name="bordered-checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SL
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        STUDENT ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        STUDENT NAME
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        ROLL
                    </th>

                </tr>
            </thead>
            <tbody>

                @if($students)
                @foreach($students as $index => $student)
                <tr class=" border-b border-blue-400">
                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">
                <input id="bordered-checkbox-{{ $index }}" type="checkbox" value="{{ $student->student_id }}" name="selected_students[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  "
                    @if($fourthSubjectStudents->pluck('student_id')->contains($student->student_id))
                        checked
                    @endif
                >
            </th>
                    <td class="px-6 py-4">
                        {{$index + 1}}
                    </td>
                    <td class="px-6 py-4">
                        {{$student->student_id}}
                    </td>
                    <td class="px-6 py-4">
                    {{$student->first_name}} {{$student->last_name}}
                    </td>
                    <td class="px-6 py-4 ">
                        {{$student->student_roll}}
                    </td>

                    <input class="hidden" name="class_name" value="{{$student->Class_name}}" type="text">
                    <input class="hidden" name="section_name" value="{{$student->section}}" type="text">
                    <input class="hidden" name="group" value="{{$student->group}}" type="text">
                    <input class="hidden" name="shift" value="{{$student->shift}}" type="text">
                    <input class="hidden" name="year" value="{{$student->year}}" type="text">
                </tr>
                @endforeach
                @else
                <tr class=" border-b border-blue-400">
                    <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">

                    </th>
                    <td class="px-6 py-4">

                    </td>
                    <td class="px-6 py-4">
                        
                    </td>
                    <td class="px-6 py-4">
                       
                    </td>
                    <td class="px-6 py-4 ">
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div>
        <input class="hidden" name="school_code" value="100" type="text">
        <input class="hidden" name="action" value="approved" type="text">
        <input class="hidden" name="type" value="active" type="text">
        
    </div>
  
    <br><br>
    <div class="md:flex justify-center">
        <div class="mr-10">
            <a href="/dashboard/viewFourthSubject">
            <p class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">View And Delete</p>
            </a>
            
        </div>
        <div class="mr-10">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">Save</button>
        </div>
        <div class="mr-10">
            <a href="/dashboard">
            <button  class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Close</button>
            </a>
        </div>

        <div class="ml-32">
            <h3>Total = <div class=" border-2"></div>
            </h3>
        </div>

    </div>
    </form>
    @endsection


