@extends('Backend.app')
@section('title')
    Add Student
@endsection
@section('Dashboard')
    @include('Message.message')
    <div class="">
        <h3>Add New Student </h3>
    </div>
    <div class="flex justify-center text-3xl font-semibold">
        <h1>Application Form </h1>
    </div>
    <div class="mx-10 mt-10">
        <form action="{{ url('/dashboard/create-student') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="font-bold">
                <h3>Student Information</h3>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-4 p-5  border-4">
                <div>


                    <label for="nedubd_student_id" class="block mb-2 text-sm font-medium text-gray-900 ">NEDUBD Student ID</label>
                    <input type="text" readOnly value="{{$studentId}}" name="nedubd_student_id" id="nedubd_student_id"

                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" />
                </div>
                <div>

                    <label for="student_id" class="block mb-2 text-sm font-medium text-gray-900 ">Institute Student ID</label>
                    <input type="text" name="student_id" id="student_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="student_id" />
                </div>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The  Name" />
                </div>
                <div>
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 ">Birth
                        Date</label>


                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" name="birth_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5   "
                            placeholder="Select date">

                    </div>


                </div>

                <div>
                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">student
                        Roll</label>
                    <input type="text" name="student_roll" id="website"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="student_roll" />
                </div>
                <div>
                    <label for="classess" class="block mb-2 text-sm font-medium text-gray-900 ">Class
                        Name</label>
                    <select id="classess" name="Class_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">

                        <option selected>Choose a class</option>
                        @foreach ($classes as $class)
                            <option>{{ $class->class_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">group</label>
                    <select id="countries" name="group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">

                        <option selected>Choose a group</option>
                        @foreach ($groups as $group)
                            <option>{{ $group->group_name }}</option>
                        @endforeach


                    </select>
                </div>
                <div>
                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">section</label>
                    <select id="countries" name="section"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">

                        <option selected>Choose a Section</option>
                        @foreach ($sections as $section)
                            <option>{{ $section->section_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div>
                    <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 ">shift</label>
                    <select id="countries" name="shift"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">

                        <option selected>Choose a Shift</option>
                        @foreach ($shifts as $shift)
                            <option>{{ $shift->shift_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">category (Day
                        care & general)</label>
                    <select id="countries" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">

                        <option disabled selected>Choose a Category</option>
                        @foreach ($categories as $category)
                            <option>{{ $category->category_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Academic
                        Year</label>
                    <select name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">

                        <option>Select Year</option>
                        @foreach ($years as $year)
                            <option>{{ $year->academic_year_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-6">
                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 ">Gender</label>
                    <select id="countries" name="gender"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">

                        <option selected>Choose gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Religious</label>
                    <select id="countries" name="religious"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">

                        <option selected>Choose Religious</option>
                        <option>Islam</option>
                        <option>Hindu</option>
                        <option>Buddhism</option>
                        <option>Christian</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Nationality</label>
                    <select id="countries" name="nationality"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                        <option selected>Bangladesh</option>


                    </select>
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Blood_group</label>
                    <select id="countries" name="blood_group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                        <option selected>Choose Blood_group</option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>O+</option>
                        <option>O-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Session</label>
                    <select id="countries" name="session"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                        <option selected>Choose Session</option>
                        @foreach ($sessions as $session)
                            <option>{{ $session->academic_session_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Choose Status</label>
                    <select name="status" id="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                        <!-- <option selected="">Select status</option> -->
                        <option value="active">Active</option>
                        <option value="in active">In active</option>

                    </select>


                    </select>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Upload
                        Picture</label>
                    <input name="image"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none  "
                        aria-describedby="user_avatar_help" id="user_avatar" type="file">


                </div>
                <div class="mb-6">
                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 ">Admission
                        Date</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" name="admission_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5   "
                            placeholder="Select date">
                    </div>
                </div>
                <div class="mb-6">
                    <label for="mobile_no" class="block mb-2 text-sm font-medium text-gray-900 ">Mobile No</label>
                    <div class="relative max-w-sm">
                        <input type="text" name="mobile_no"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  "
                            placeholder="Mobile no">
                    </div>
                </div>
            </div>
            <div class="font-bold">
                <h3>Parents Information</h3>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-4 p-5  border-4">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Father's
                        name</label>
                    <input type="text" name="father_name" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The  Name" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Father's
                        Mobile
                    </label>
                    <input type="text" name="father_mobile" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Mobile No" />
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Father's
                        Occupation
                    </label>
                    <input type="text" name="father_occupation" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Occupation" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Father's
                        Yearly Income
                    </label>
                    <input type="text" name="father_income" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Income" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Father's
                        NID
                    </label>
                    <input type="text" name="father_nid" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The NID" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Father's
                        Birthdate
                    </label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" name="father_birth_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5   "
                            placeholder="Select date">
                    </div>
                </div>

                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Mother's
                        Name</label>
                    <input type="text" name="mother_name" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The  Name" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Mother's
                        Number
                    </label>
                    <input type="text" name="mother_number" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Number" />
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Mother's
                        occupation
                    </label>
                    <input type="text" name="mother_occupation" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The occupation" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Mother's
                        NID
                    </label>
                    <input type="text" name="mother_nid" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The NID" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Mother's
                        Birthdate
                    </label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" name="mother_birth_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5   "
                            placeholder="Select date">
                    </div>
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Mother's
                        Income
                    </label>
                    <input type="text" name="mother_income" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Mother's Income" />
                </div>
            </div>
            <div class="font-bold">
                <h3>Present Address</h3>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-4 p-5  border-4">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Present
                        Village</label>
                    <input type="text" name="present_village" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Village Name" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Present
                        Post Office
                    </label>
                    <input type="text" name="present_post_office" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Post Office" />
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Present
                        Country
                    </label>
                    <input type="text" name="present_country" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Country Name" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Present
                        Zip Code/Post_code
                    </label>
                    <input type="text" name="present_zip_code" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Present Zip Code/Post_code" />
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">present
                        District</label>
                    <input type="text" name="present_district" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The District Name" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">present
                        Police Station
                    </label>
                    <input type="text" name="present_police_station" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Police Station Name" />
                </div>

            </div>
            <div class="font-bold">
                <h3>Parmanent Address
                </h3>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-4 p-5  border-4">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Parmanent
                        Village</label>
                    <input type="text" name="parmanent_village" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Village Name" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Parmanent
                        Post Office
                    </label>
                    <input type="text" name="parmanent_post_office" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Post Office" />
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Parmanent
                        Country
                    </label>
                    <input type="text" name="parmanent_country" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Enter The Country Name" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">parmanent
                        Zip Code/Post_code
                    </label>
                    <input type="text" name="parmanent_zip_code" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter The Present Zip Code/Post_code" />
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">parmanent
                        District</label>
                    <input type="text" name="parmanent_district" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter The District Name" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">parmanent
                        Police Station
                    </label>
                    <input type="text" name="parmanent_police_station" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter The Police Station Name" />
                </div>

            </div>
            <div class="font-bold">
                <h3>
                    If Parent's not available
                </h3>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2 p-5  border-4">
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Guardian
                        Name

                    </label>
                    <input type="text" name="guardian_name" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter The Police Station Name" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Guardian
                        Address
                    </label>
                    <input type="text" name="guardian_address" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter The Police Station Name" />
                </div>
            </div>
            <div class="font-bold">
                <h3>
                    Last Education History
                </h3>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-4 p-5  border-4">
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Last
                        School Name

                    </label>
                    <input type="text" name="last_school_name" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter The Last School Name" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Last Class
                        Name

                    </label>
                    <input type="text" name="last_class_name" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter The Last Class Name" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Last
                        Result

                    </label>
                    <input type="text" name="last_result" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter The Last Result" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Last
                        Passing year
                        <input type="text" name="last_passing_year" id="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                            placeholder="Enter The Last Passing year" />
                </div>
            </div>

            <div class="font-bold">
                <h3>
                    Authentication
                </h3>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2 p-5  border-4">
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Email

                    </label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter your email" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Password
                    </label>
                    <input type="password" name="password" id="floating_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter your password" />
                </div>
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-4 p-5 hidden border-4 ">
                <div class="hidden">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Role
                    </label>
                    <input type="text" value="student" name="role" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter The Police Station Name" />
                </div>
                <div class="hidden">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Action
                    </label>
                    <input type="text" value="approved" name="action" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter The Police Station Name" />
                </div>
                <div class="hidden">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">School Code
                    </label>
                    <input type="text" value="{{ $school_code }}" name="school_code" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Enter The Police Station Name" />
                </div>
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
                Submit
            </button>


        </form>

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