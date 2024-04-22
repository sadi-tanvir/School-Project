@extends('Backend.app')
@section('title')
View 4th Subject
@endsection
@section('Dashboard')
@include('Message.message')
    <div>
        <h3>
            Choosable Subject List
        </h3>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
        <form action="{{route('getFourthSubject')}}" method="post">
        @csrf
        <div class="grid md:grid-cols-9 gap-4 my-10 ">
            <div class="mr-2 md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Class :</label>
            </div>
            <div class="mr-2">
                <select id="countries" name="class_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        @foreach($classes as $class)
                    <option value="{{ $class->class_name }}">{{$class->class_name}}</option>
                    @endforeach
                </select>
                    </select>
            </div>
            <div class="mr-2 md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Group :</label>
            </div>
            <div class="mr-2">
                <select id="countries" name="group_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        @foreach($groups as $group)
                    <option >{{$group->group_name}}</option>
                    @endforeach
                    </select>
            </div>
            <div class="mr-2 md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Section :</label>
            </div>
            <div class="mr-2">
                <select id="countries" name="section_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        @foreach($sections as $section)
                    <option >{{$section->section_name}}</option>
                    @endforeach
                  
                    </select>
            </div>

            <div class="mr-2 md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Year :</label>
            </div>
            <div class="mr-2">
                <select name="year" id='date-dropdown'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                @foreach($years as $year)
                    <option >{{$year->academic_year_name}}</option>
                    @endforeach
            </select>
            </div>
            <div>
                <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">GET DATA</button>
            </div>

        </div>
      

    </form>
    <div class=" text-lg font-bold">
        
      
     <table class="w-full text-sm text-left rtl:text-right text-black ">
         <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
             <tr>
                 <th scope="col" class="px-6 py-3 bg-blue-500">
                 SL
                 </th>
                 <th scope="col" class="px-6 py-3">
                 STUDENT ID
                 </th>
                 <th scope="col" class="px-6 py-3 bg-blue-500">
                 STUDENT NAME
                 </th>
                 <th scope="col" class="px-6 py-3">
                 ROLL
                 </th>
                 <th scope="col" class="px-6 py-3 bg-blue-500">
                 SUBJECT 
                 </th>
                 <th scope="col" class="px-6 py-3">
                 TYPE
                 </th>
                 <th scope="col" class="px-6 py-3 bg-blue-500">
                   Action
                 </th>
                
             </tr>
         </thead>
         <tbody>
            @foreach($students as $key => $student)
            <tr class=" border-b border-blue-400">
                 <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
                 {{$key + 1}}
                 </th>
                 <td class="px-6 py-4">
                 {{$student->student_id}}
                 </td>
                 <td class="px-6 py-4">
                 <?php
    // Search for student name with student ID
    $studentName = \DB::table('students')->where('student_id', $student->student_id)->value('first_name');
    $lastName = \DB::table('students')->where('student_id', $student->student_id)->value('last_name');
            ?>
            {{$studentName}} {{$lastName}}
                 </td>
                 <td class="px-6 py-4">
                 <?php
    // Search for student name with student ID
    $studentRoll = \DB::table('students')->where('school_code', $student->school_code)->where('student_id', $student->student_id)->value('student_roll');
           
            ?>
            {{$studentRoll}}
                 </td>
                 <td class="px-6 py-4 ">
                 {{$student->optional_subject}}
                 </td>
                 <td class="px-6 py-4">
                 {{$student->type}}
                 </td>
                 <td class="px-6 py-4 flex">
                    <button class="text-xl font-bold text-green-500 mr-2"><i class="fa-solid fa-pen"></i></button>
                        <form action="{{ route('deleteFourthSubject', $student->id) }}" method="POST">
                             @csrf
                            @method('DELETE')
                             <button type="submit" class="text-xl font-bold text-red-500"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    
                    </a>
                 </td>
             </tr>

            @endforeach
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
                 <td class="px-6 py-4">

                 </td>
                 <td class="px-6 py-4 ">

                 </td>

             
             </tr>



         </tbody>
     </table>
 </div>
<br><br>
<div class="md:flex justify-center">
   
    

    <div class="ml-32">
        <h3>Total = <span class="border border-2 p-5">@if($students)
        {{$students->count()}}
            @endif
</span></h3>
    </div>

</div>
@endsection


