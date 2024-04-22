@extends('Backend.app')
@section('title')
    Student ProfileUpdate
@endsection
@section('Dashboard')
    <div>
        <h3>
            Student Profile Update
        </h3>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">

        <hr>
        <form action="{{ route('studentData', $school_code) }}" method="GET">
            @csrf

            <div class="grid gap-6 mb-6 md:grid-cols-9 mt-2">
                <div>
                    <a href="{{ route('AddStudentForm', $school_code) }}">
                        <button type="button"
                            class=" text-white bg-rose-700 hover:bg-rose-600 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-rose-600 dark:hover:bg-rose-700 focus:outline-none dark:focus:ring-rose-800">Add

                        </button>
                    </a>
                </div>
                <div>

                    <select id="" name="class_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option selected>Choose a class</option>
                        @foreach ($classes as $class)
                            <option>{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <select id="" name="group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Group</option>
                        @foreach ($groups as $group)
                            <option>{{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select id="" name="section"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a section</option>
                        @foreach ($sections as $section)
                            <option>{{ $section->section_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select id="" name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a year</option>
                        @foreach ($years as $year)
                            <option>{{ $year->academic_year_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <select id="" name="session"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a session</option>
                        @foreach ($sessions as $session)
                            <option>{{ $session->academic_session_name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="" />

                <div class="flex justify-end">

                    <button type="submit"

                        class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Search
                    </button>
                </div>
                <div>

                    <a 
                        class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Print
                </a>
                </div>
            </div>
        </form>
        <table class="w-full  rtl:text-right text-black dark:text-blue-100 text-center">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 dark:text-white">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        SL
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Student ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Class
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Section
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Group
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Roll
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Mobile
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Birthdate
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        BG
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Action
                    </th>

                </tr>
            </thead>
            <tbody>
                @if ($student !== null)
                    {{-- @dd($student) <!-- Add this line to inspect the value --> --}}
                    @foreach ($student as $key => $data)
                        <tr>
                            <td scope="col" class="px-6 py-3">{{ $key + 1 }}</td>
                            <td scope="col" class="px-6 py-3">{{ $data->student_id }}</td>
                            <td scope="col" class="px-6 py-3">{{ $data->name }}</td>
                            <td scope="col" class="px-6 py-3">{{ $data->Class_name }}</td>
                            <td scope="col" class="px-6 py-3">{{ $data->section }}</td>
                            <td scope="col" class="px-6 py-3">{{ $data->group }}</td>
                            <td scope="col" class="px-6 py-3">{{ $data->student_roll }}</td>
                            <td scope="col" class="px-6 py-3">{{ $data->mobile_no }}</td>
                            <td scope="col" class="px-6 py-3">{{ $data->birth_date }}</td>
                            <td scope="col" class="px-6 py-3">{{ $data->blood_group }}</td>
                            <td scope="col" class="px-6 py-3">{{ $data->status }}</td>
                            <td scope="col" class="px-6 py-3">
                               <div class="flex justify-center">
                                <a class="mr-2 edit-button" href="{{ route('student_update', ['id' => $data->id, 'schoolCode' => $school_code]) }}">
                                    <i class="fa fa-edit" style="color:green;"></i>
                                </a>
                                
                                <a class="mr-2 edit-button"><i class="fa fa-eye" style="color:green;"></i></a>
                               </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
        <div class="flex justify-end mt-5">
            <button type="button"

                class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update
            </button>

        </div>
    </div>
@endsection
