@extends('Backend.app')
@section('title')
Add Teacher
@endsection
@section('Dashboard')
@include('/Message/message')
<div class="">
    <h3>Add New Teacher </h3>
</div>
<div class="flex justify-center text-3xl font-semibold">
    <h1>Teacher Information </h1>
</div>


<div class="mx-10 mt-10">


    <form action="{{route('teacher.create')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="font-bold">
            <h3>Basic Information</h3>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-4 p-5 border border-4">
            <div class="">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Teacher's
                        Id</label>
                    <input type="text" readOnly value="{{$teacherId}}" name=" " id=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                        placeholder="Teacher's id"  />
                </div>
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Name" />
            </div>
            <div>
                <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900 ">Mobile
                    No</label>
                <input type="text" name="mobile" id="mobile"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter the Mobile No" />
            </div>

            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="image">Upload
                    Picture</label>
                <input name="image"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none  "
                    aria-describedby="user_avatar_help" id="image" type="file">
            </div>


            <div>
                <label for="emg_mobile" class="block mb-2 text-sm font-medium text-gray-900 ">Emergency
                    Mobile</label>
                <input type="text" name="emg_mobile" id="emg_mobile"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter the Emergency Mobile " />
            </div>


            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email Id

                </label>
                <input type="email" id="email" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter your email" />
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password

                </label>
                <input type="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter your Password" />
            </div>

            <div>
                <label for="fbid" class="block mb-2 text-sm font-medium text-gray-900 ">FB ID

                </label>
                <input type="text" id="fbid" name="fbid"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter your FB ID" />
            </div>

            <div>
                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 ">Department
                </label>
                <select id="department" type="text" name="department"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option selected>Choose a department</option>
                    <option>x</option>
                    <option>y</option>
                    <option>z</option>
                </select>
            </div>
            <div>
                <label for="designation"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Designation
                </label>
                <select id="designation" type="text" name="designation"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option selected>Choose a designation</option>
                    <option>x</option>
                    <option>y</option>
                    <option>z</option>
                </select>
            </div>
            <div>
                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 ">Gender
                </label>
                <select id="gender" type="text" name="gender"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option selected>Choose a gender</option>
                    <option>male</option>
                    <option>female</option>
                    <option>z</option>
                </select>
            </div>



            <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 ">Subject
                </label>
                <input type="text" name="subject" id="subject"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="subject" />
            </div>

            <div>
                <label for="index" class="block mb-2 text-sm font-medium text-gray-900 ">Index
                </label>
                <input type="text" name="index" id="index"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The  index" />
            </div>
            <div>
                <label for="salary_account" class="block mb-2 text-sm font-medium text-gray-900 ">Salary
                    Account No
                </label>
                <input type="text" name="salary_account" id="salary_account"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The  Salary Account" />
            </div>
            <div>
                <label for="pf" class="block mb-2 text-sm font-medium text-gray-900 ">PF Account No
                </label>
                <input type="text" name="pf" id="pf"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The  PF Account" />
            </div>




        </div>
        <div class="font-bold">
            <h3>Parents Information</h3>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-4 p-5 border border-4">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Father's
                    name</label>
                <input type="text" name="father_name" id="first_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Father Name" />
            </div>
            <div>
                <label for="father_mobile" class="block mb-2 text-sm font-medium text-gray-900 ">Father's
                    Mobile
                </label>
                <input type="text" name="father_mobile" id="father_mobile"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Mobile No" />
            </div>

            <div>
                <label for="mother_name" class="block mb-2 text-sm font-medium text-gray-900 ">Mother's
                    Name</label>
                <input type="text" name="mother_name" id="mother_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Mother Name" />
            </div>
            <div>
                <label for="mother_number" class="block mb-2 text-sm font-medium text-gray-900 ">Mother's
                    Number
                </label>
                <input type="text" name="mother_number" id="mother_number"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Number" />
            </div>

        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-4 p-5 border border-4">
            <div>
                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 ">Birth
                    Date</label>


                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-autohide type="text" name="birth_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5      "
                        placeholder="Select date">
                </div>


            </div>
            <div>
                <label for="nationality"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Nationality
                </label>
                <input type="text" name="nationality" id="nationality"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The nationality" />
            </div>

            <div>
                <label for="blood" class="block mb-2 text-sm font-medium text-gray-900 ">Blood Group
                </label>
                <select id="blood" type="text" name="blood"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option selected>Choose blood</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                </select>
            </div>


            <div>
                <label for="nid" class="block mb-2 text-sm font-medium text-gray-900 ">NID
                </label>
                <input type="text" name="nid" id="nid"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The nid No" />
            </div>
            <div>
                <label for="marital_status" class="block mb-2 text-sm font-medium text-gray-900 ">Marital
                    Status
                </label>
                <input type="text" name="marital_status" id="marital_status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The marital status" />
            </div>
            <div>
                <label for="age" class="block mb-2 text-sm font-medium text-gray-900 ">Age
                </label>
                <input type="text" name="age" id="age"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Age" />
            </div>

            <div>
                <label for="religious" class="block mb-2 text-sm font-medium text-gray-900 ">Religious
                </label>
                <select id="religious" type="text" name="religious"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option selected>Choose Religious</option>
                    <option>Islam</option>
                    <option>Hinduism</option>
                    <option>Buddhism</option>
                    <option>Christian</option>
                </select>
            </div>
            <div>
                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 ">Joining
                    Date</label>


                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-autohide type="text" name="joining_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5      "
                        placeholder="Select date">
                </div>


            </div>

        </div>
        <div class="font-bold">
            <h3>Present Address</h3>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-4 p-5 border border-4">
            <div>
                <label for="present_village"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Present
                    Village</label>
                <input type="text" name="present_village" id="present_village"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Village Name" />
            </div>
            <div>
                <label for="present_post_office"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Present
                    Post Office
                </label>
                <input type="text" name="present_post_office" id="present_post_office"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Post Office" />
            </div>

            <div>
                <label for="present_zip_code"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Present
                    Zip Code/Post_code
                </label>
                <input type="text" name="present_zip_code" id="present_zip_code"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Present Zip Code/Post_code" />
            </div>
            <div>
                <label for="present_district"
                    class="block mb-2 text-sm font-medium text-gray-900 ">present
                    District</label>
                <input type="text" name="present_district" id="present_district"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The District Name" />
            </div>
            <div>
                <label for="present_police_station"
                    class="block mb-2 text-sm font-medium text-gray-900 ">present
                    Police Station
                </label>
                <input type="text" name="present_police_station" id="present_police_station"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Police Station Name" />
            </div>

        </div>
        <div class="font-bold">
            <h3>Parmanent Address( if same as present address
                <input id="link-checkbox" type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 ">
                )
            </h3>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-4 p-5 border border-4">
            <div>
                <label for="parmanent_village"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Parmanent
                    Village</label>
                <input type="text" name="parmanent_village" id="parmanent_village"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Village Name" />
            </div>
            <div>
                <label for="parmanent_post_office"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Parmanent
                    Post Office
                </label>
                <input type="text" name="parmanent_post_office" id="parmanent_post_office"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Post Office" />
            </div>

            <div>
                <label for="parmanent_zip_code"
                    class="block mb-2 text-sm font-medium text-gray-900 ">parmanent
                    Zip Code/Post_code
                </label>
                <input type="text" name="parmanent_zip_code" id="parmanent_zip_code"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Parmanent Zip Code/Post_code" />
            </div>
            <div>
                <label for="parmanent_district"
                    class="block mb-2 text-sm font-medium text-gray-900 ">parmanent
                    District</label>
                <input type="text" name="parmanent_district" id="parmanent_district"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The District Name" />
            </div>
            <div>
                <label for="parmanent_police_station"
                    class="block mb-2 text-sm font-medium text-gray-900 ">parmanent
                    Police Station
                </label>
                <input type="text" name="parmanent_police_station" id="parmanent_police_station"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Police Station Name" />
            </div>

        </div>

        <div class="font-bold">
            <h3>
                Education Qualification
            </h3>
        </div>
        <div class="grid gap-4 mb-6 md:grid-cols-7 p-5 border border-4">
            <div>
                <label for="ssc" class="block mb-2 text-sm font-medium text-gray-900 ">SSC
                </label>
                <select type="text" id="ssc" name="ssc"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option selected>SSC</option>


                </select>
            </div>
            <div>
                <label for="school_name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    School Name

                </label>
                <input type="text" name="school_name" id="school_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The School Name" />
            </div>
            <div>
                <label for="ssc_department"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Department

                </label>
                <input type="text" name="ssc_department" id="ssc_department"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Department Name" />
            </div>
            <div>
                <label for="ssc_roll" class="block mb-2 text-sm font-medium text-gray-900 ">Roll No

                </label>
                <input type="text" name="ssc_roll" id="ssc_roll"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Roll No" />
            </div>
            <div>
                <label for="ssc_reg" class="block mb-2 text-sm font-medium text-gray-900 ">Registration
                    No

                </label>
                <input type="text" name="ssc_reg" id="ssc_reg"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Registration No" />
            </div>
            <div>
                <label for="ssc_gpa" class="block mb-2 text-sm font-medium text-gray-900 ">GPA

                </label>
                <input type="text" name="ssc_gpa" id="ssc_gpa"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The GPA" />
            </div>
            <div>
                <label for="ssc_year" class="block mb-2 text-sm font-medium text-gray-900 ">Passing Year

                </label>
                <input type="text" name="ssc_year" id="ssc_year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Passing Year" />
            </div>
            <div>

                <label for="hsc" class="block mb-2 text-sm font-medium text-gray-900 ">HSC
                </label>
                <select type="text" id="hsc" name="hsc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option selected>HSC</option>

                </select>
            </div>
            <div>
                <label for="college_name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    College Name

                </label>
                <input type="text" name="college_name" id="college_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The School Name" />
            </div>
            <div>
                <label for="college_department"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Department

                </label>
                <input type="text" name="college_department" id="college_department"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Department Name" />
            </div>
            <div>
                <label for="college_roll" class="block mb-2 text-sm font-medium text-gray-900 ">Roll No

                </label>
                <input type="text" name="college_roll" id="college_roll"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Roll No" />
            </div>
            <div>
                <label for="college_reg"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Registration No

                </label>
                <input type="text" name="college_reg" id="college_reg"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Registration No" />
            </div>
            <div>
                <label for="college_gpa" class="block mb-2 text-sm font-medium text-gray-900 ">GPA

                </label>
                <input type="text" name="college_gpa" id="college_gpa"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The GPA" />
            </div>
            <div>
                <label for="college_passing_year"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Passing Year

                </label>
                <input type="text" name="college_passing_year" id="college_passing_year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Passing Year" />
            </div>
            <div>
                <label for="honors" class="block mb-2 text-sm font-medium text-gray-900 ">Honors
                </label>
                <select type="text" id="honors" name="honors"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option selected>Honors</option>


                </select>
            </div>
            <div>
                <label for="versity_name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    University Name

                </label>
                <input type="text" name="versity_name" id="versity_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The School Name" />
            </div>
            <div>
                <label for="versity_department"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Department

                </label>
                <input type="text" name="versity_department" id="versity_department"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Department Name" />
            </div>
            <div>
                <label for="versity_roll" class="block mb-2 text-sm font-medium text-gray-900 ">Roll No

                </label>
                <input type="text" name="versity_roll" id="versity_roll"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Roll No" />
            </div>
            <div>
                <label for="versity_reg"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Registration No

                </label>
                <input type="text" name="versity_reg" id="versity_reg"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Registration No" />
            </div>
            <div>
                <label for="versity_gpa" class="block mb-2 text-sm font-medium text-gray-900 ">CGPA

                </label>
                <input type="text" name="versity_gpa" id="versity_gpa"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The GPA" />
            </div>
            <div>
                <label for="versity_passing_year"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Passing Year

                </label>
                <input type="text" name="versity_passing_year" id="versity_passing_year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Passing Year" />
            </div>


        </div>

        <div class="font-bold">
            <h3>
                ICT or Other Qualification
            </h3>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-3 p-5 border border-4">
            <div>
                <label for="qua_name" class="block mb-2 text-sm font-medium text-gray-900 ">Name

                </label>
                <input type="text" id="qua_name" name="qua_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter Name" />
            </div>
            <div>
                <label for="qua_industry_name"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Industry Name
                </label>
                <input type="text" name="qua_industry_name" id="qua_industry_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter Industry Name" />
            </div>
            <div>
                <label for="qua_description"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Description
                </label>
                <input type="text" name="qua_description" id="qua_description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter your Description" />
            </div>
            <div>
                <label for="qua_name" class="block mb-2 text-sm font-medium text-gray-900 ">Name

                </label>
                <input type="text" id="qua_name" name="qua_2_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter Name" />
            </div>
            <div>
                <label for="qua_2_industry_name"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Industry Name
                </label>
                <input type="text" name="qua_2_industry_name" id="qua_2_industry_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter Industry Name" />
            </div>
            <div>
                <label for="qua_2_description"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Description
                </label>
                <input type="text" name="qua_2_description" id="qua_2_description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter your Description" />
            </div>
        </div>
        <div class="font-bold">
            <h3>
                Educational Experience(if any)
            </h3>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-4 p-5 border border-4 ">
            <div>
                <label for="post_name" class="block mb-2 text-sm font-medium text-gray-900 ">Post Name
                </label>
                <input type="text" name="post_name" id="post_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Post Name" />
            </div>
            <div>
                <label for="industrial_name"
                    class="block mb-2 text-sm font-medium text-gray-900 ">Industry Name
                </label>
                <input type="text" name="industrial_name" id="industrial_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Police Industry Name" />
            </div>
            <div>
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 ">Start Date
                </label>
                <input type="text" name="start_date" id="start_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Police Start Date" />
            </div>
            <div>
                <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 ">End Date
                </label>
                <input type="text" name="end_date" id="end_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter The Police End Date" />
            </div>
            <div class="hidden">
                <label for="school_code" class="block mb-2 text-sm font-medium text-gray-900 ">End Date
                </label>
                <input type="text" value="100" name="school_code" id="school_code"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter  End Date" />
            </div>
            <div class="hidden">
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">End Date
                </label>
                <input type="text" value="teacher" name="role" id="role"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter  End Date" />
            </div>
            <div class="hidden">
                <label for="action" class="block mb-2 text-sm font-medium text-gray-900 ">End Date
                </label>
                <input type="text" value="pending" name="action" id="action"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     "
                    placeholder="Enter  End Date" />
            </div>
        </div>


        <button type="submit" class="text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
    </form>

</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
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