@extends('Backend.app')
@section('title')
Exam Publish and Close
@endsection
@section('Dashboard')
@include('Message.message')
    <div>
        <h3>
            Exam Publish and Close
        </h3>
    </div>

    <div class="mt-10">
        <div class="md:mx-52 border-2 p-10">
            <div class=" flex justify-start mb-5">
                <button type=""
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">
                <a href="{{url('/dashboard/ViewExamPublish',$school_code)}}">View</a></button>
            </div>
            <form action="{{url('dashboard/addExamPublish',$school_code)}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900  ">CLASS :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="Class_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option selected>Choose a class</option>
                        @foreach($classes as $class)
                        <option >{{$class->class_name}}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900  ">EXAM NAME :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="exam_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option selected>Choose Exam Name</option>
                        @foreach($exam as $exam)
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
                    <select name="year" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option>Select Year</option>
                    @foreach($years as $year)
                    <option >{{$year->academic_year_name}}</option>
                    @endforeach
                    
                </select>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900  ">Status  :
                    </label>
                </div>
                <div>
                    <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5     ">
                        <option value="active">Active</option>
                        <option value="in active">In active</option>

                    </select>
                </div>
            </div>
            <div class="hidden">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">School Code 
                </label>
                <input type="text" value="{{$school_code}}" name="school_code" id="last_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Police Station Name" />
            </div>

            <div class=" flex justify-end">
                <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">Publish</button>
            </div>
        </form>
        </div>
    </div>

@endsection