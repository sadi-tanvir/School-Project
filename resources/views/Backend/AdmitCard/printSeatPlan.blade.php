@extends('Backend.app')
@section('title')
Student Admin Card
@endsection
@section('Dashboard')
    <div>
        <h3>
            Student Admin Card
        </h3>
    </div>

    <div class="mt-10">
        <div class="md:mx-52 border-2 p-10">
            <form action="">
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900  ">CLASS :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="class"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose Class</option>
                    @foreach($classes as $class)
                        <option >{{$class->class_name}}</option>
                        @endforeach
                </select>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900  ">Group :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose Group Name</option>
                        @foreach($groups as $group)
                        <option >{{$group->group_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900  ">Section :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="section_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose Section Name</option>
                        @foreach($sections as $section)
                        <option >{{$section->section_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900  ">Student ID :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose Student ID</option>
                        @foreach($studentId as $student)
                        <option >{{$student->student_id}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900  ">Exam Name :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="exam_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose Exam Name</option>
                        @foreach($examName as $exam)
                        <option >{{$exam->class_exam_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
           
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900  ">YEAR  : 
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose year</option>
                    @foreach($year as $year)
                    <option >{{$year->academic_year_name}}</option>
                    @endforeach
                </select>
                </div>
            </div>
           

            <div class=" flex justify-end">
                <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Print</button>
            </div>
        </form>
        </div>
    </div>

@endsection