@extends('Backend.app')
@section('title')
Student Information with Image
@endsection
@section('Dashboard')
    <div>
        <h3>
            Student Information with Image
        </h3>
    </div>

    <form action="{{ route('viewStudentListPhoto') }}" method="POST">
        @csrf
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10 border-2 md:p-5">


        <div class="grid gap-6 mb-6 md:grid-cols-4 mt-2">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Class
                </label>
                <select id="" name="class"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a class</option>
                    @foreach ($classes as $data)
                    <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Group
                </label>
                <select id="" name="group"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a group</option>
                    @foreach ($groups as $data)
                    <option value="{{ $data->group_name }}">{{ $data->group_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Section
                </label>
                <select id="" name="section"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a Section</option>
                    @foreach ($sections as $data)
                    <option value="{{ $data->section_name }}">{{ $data->section_name }}</option>
                    @endforeach
                </select>
            </div>

            
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Category
                </label>
                <select id="" name="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a Category</option>
                    @foreach ($categories as $data)
                    <option value="{{ $data->category_name }}">{{ $data->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Academic Year
                </label>
                <select id="" name="academic_year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a academic year</option>
                    @foreach ($years as $data)
                    <option value="{{ $data->academic_year_name }}">{{ $data->academic_year_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="hidden">
<input type="text" name="school_code" value="{{$school_code}}">
            </div>

           


           
        </div>

        <div class="grid md:grid-cols-4  grid-cols-2">
            @foreach($columns as $column)
            <div class="">
                <input id="{{$column}}" value="{{$column}}" type="checkbox"  name="columns[{{$column}}]"
                    class="group-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                <label for="{{$column}}" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">{{$column}}</label>

            </div>
            @endforeach

           
        </div>
        <div class="md:flex justify-end mr-10 mt-10">
            <div class="">
                <button type="submit"
                    class="  text-white bg-rose-600 hover:bg-rose-600 focus:ring-4 focus:ring-rose-600 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2   focus:outline-none ">Search
                </button>
            </div>
           
        </div>

        


    </div>
    </form>




   
@endsection
