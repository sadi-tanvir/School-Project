@extends('Backend.app')
@section('title')
    Student BasicInfo
@endsection
@section('Dashboard')
    @include('Message.message')
    <div>
        <h3>
            Student Basic Info
        </h3>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
        <div class="md:flex justify-end  ">

            <a href="{{ route('updateStudentBasicInfo', $school_code) }}">
                <button type="button"
                    class=" text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Basic
                    Info
                </button>
            </a>
            <a href="{{ route('studentClassInfo', $school_code) }}">
                <button type="button"
                    class=" text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Class
                    Info
                </button>
            </a>
            <a href="{{ route('StudentPhoto', $school_code) }}">
                <button type="button"
                    class=" text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Photo

                </button>
            </a>
            <a href="{{ route('getStudent', $school_code) }}">
            <button type="button"
                class="  text-white bg-rose-700 hover:bg-rose-600 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-rose-600 dark:hover:bg-rose-700 focus:outline-none dark:focus:ring-rose-800">Add
                Student
            </button>
            </a>

        </div>
        <hr>
        <form action="{{ route('postStudent') }}" method="POST">
            @csrf

            <div class="md:flex justify-end mt-10">
             
                <div class="md:mr-10">
                    <select id="year" name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a year</option>
                        @foreach ($years as $year)
                            <option value="{{ $year->academic_year_name }}">{{ $year->academic_year_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="md:mr-10">
                    <input type="text" id="row-amount" name="row_amount"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="Enter Row" />
                </div>

                <div class="flex justify-end">
                    <a  onclick="generateRows()"
                        class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Search
                </a>

                </div>
            </div>
<div class="text-rose-700">
    If you have a student ID, enter it. Otherwise, it'll generate a new one automatically.
</div>
            <table id="student-table" class="w-full text-sm text-left rtl:text-right text-black ">
                <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            Student ID
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Roll
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            Father Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Mother Name
                        </th>
                        <th scope="col" class="px-6 py-3  bg-blue-500">
                            Mobile
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Birthdate
                        </th>
                        <th scope="col" class="px-6 py-3  bg-blue-500">
                            Gender
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Religion
                        </th>
                        <th scope="col" class="px-6 py-3  bg-blue-500">
                            BG
                        </th>


                    </tr>
                </thead>
                <tbody>



                </tbody>
            </table>
            <div class="md:flex justify-end mb-6 mt-10">
                <div class="md:mr-10">
                    <select id="class_name" name="class_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a class</option>
                        @foreach ($classes as $data)
                            <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="md:mr-10">
                    <select id="group" name="group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Group</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->group_name }}">{{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:mr-10">
                    <select id="section" name="section"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->section_name }}">{{ $section->section_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:mr-10">
                    <select id="" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:mr-10">
                    <select id="" name="shift"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Shift</option>
                        @foreach ($shift as $shift)
                            <option value="{{ $shift->shift_name }}">{{ $shift->shift_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <input class="hidden" name="action" value="approved" type="text">
                    <input class="hidden" name="school_code" value="{{$school_code}}" type="text">
                </div>

                <div class="flex justify-end mt-5">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-10 py-1 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save
                    </button>
                </div>
            </div>
        </form>

    </div>

    <script>
        function generateRows() {
            var rowCount = document.getElementById('row-amount').value;
            var tableBody = document.querySelector('#student-table tbody');
            tableBody.innerHTML = '';
           

            for (var i = 0; i < rowCount; i++) {
                var row = document.createElement('tr');
                row.innerHTML = `
                    <td><input type="text" name="student_id[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="name[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="roll[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="father_name[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="mother_name[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="mobile[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="birthdate[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="gender[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="religion[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="bg[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                `;
                tableBody.appendChild(row);
            }
        }
    </script>

    {{-- <script>

        function generateUniqueStudentId() {
            $lastStudent = Student::latest() - > first();
            $currentYear = date('Y');
            $newId = 1;

            if ($lastStudent) {
                $lastId = intval(substr($lastStudent - > nedubd_student_id, -4));
                $newId = $lastId + 1;
            }

            $newStudentId = 'STU'.$currentYear.str_pad($newId, 4, '0', STR_PAD_LEFT);

            $existingStudent = Student::where('nedubd_student_id', $newStudentId) - > first();
            if ($existingStudent) {
                do {
                    $newId++;
                    $newStudentId = 'STU'.$currentYear.str_pad($newId, 4, '0', STR_PAD_LEFT);
                    $existingStudent = Student::where('nedubd_student_id', $newStudentId) - > first();
                } while ($existingStudent);
            }

            return $newStudentId;
        }

        function generateRows() {
            var rowCount = document.getElementById('row-amount').value;
            var idType = document.getElementById('studentID').value;
            var tableBody = document.querySelector('#student-table tbody');
            tableBody.innerHTML = '';

            for (var i = 0; i < rowCount; i++) {
                var row = document.createElement('tr');
                var idInput = '';
               
                row.innerHTML = `
                    <td>${idInput}</td>
                    <td><input type="text" name="name[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="roll[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="father_name[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="mother_name[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="mobile[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="birthdate[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="gender[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="religion[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                    <td><input type="text" name="bg[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></td>
                `;
                tableBody.appendChild(row);
            }
        }
    </script> --}}
@endsection
