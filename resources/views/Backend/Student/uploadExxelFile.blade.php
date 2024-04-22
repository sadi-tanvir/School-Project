@extends('Backend.app')
@section('title')
    Student Data
@endsection


@section('Dashboard')
    <div>
        @include('/Message/message')
        <h3>
            Excel Import Student Data
        </h3>
    </div>
    <div class="flex justify-center md:mt-10 text-xl font-bold">
        <h3>Student Information</h3>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10  border-2 md:p-5">

        <form action="{{ route('upload.excel') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="grid gap-6 mb-6 md:grid-cols-4 mt-2">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Class
                    </label>
                    <select id="" name="class"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    ">
                        <option selected>Choose a class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Group
                    </label>
                    <select id="" name="group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    ">
                        <option selected>Choose a group</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->group_name }}">{{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Section
                    </label>
                    <select id="" name="section"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    ">
                        <option selected>Choose a Section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->section_name }}">{{ $section->section_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Shift
                    </label>
                    <select id="" name="shift"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    ">
                        <option selected>Choose a Shift</option>
                        @foreach ($shifts as $shift)
                            <option value="{{ $shift->shift_name }}">{{ $shift->shift_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Category
                    </label>
                    <select id="" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    ">
                        <option selected>Choose a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Academic Year
                    </label>
                    <select id="" name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    ">
                        <option selected>Choose a year</option>
                        @foreach ($academicYears as $year)
                            <option value="{{ $year->academic_year_name }}">{{ $year->academic_year_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Excel
                        File</label>
                    <input name="file"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none  "
                        aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Student ID with/without
                    </label>
                    <select id="" name="stu_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Select</option>
                        <option value="with_id">With ID</option>
                        <option value="generate_id">Generate ID</option>
                    </select>
                </div>



            </div>
            <div class="md:flex justify-center">
                <div class="mt-2">
                    <a href="{{ route('download.demo', $school_code) }}"
                        class="  text-white bg-rose-600 hover:bg-rose-600 focus:ring-4 focus:ring-rose-600 font-medium rounded-lg text-sm px-5 py-2.5 me-2  focus:outline-none ">
                        Blank Excel Download
                    </a>

                </div>
                <div class="">
                    <button type="submit"
                        class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">
                        Submit
                    </button>
                </div>
            </div>

        </form>


    </div>
@endsection
