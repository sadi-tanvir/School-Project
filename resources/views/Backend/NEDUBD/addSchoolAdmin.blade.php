@extends('Backend.app')
@section('title')
Add School Admin
@endsection
@section('Dashboard')
@include('/Message/message')

<h1 class="my-3 text-center text-4xl font-semibold">Add School Admin</h1>

<form class="max-w-lg mx-auto border p-5" action="{{route('schoolAdmin.create')}}", method="POST", enctype="multipart/form-data">
@csrf
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="name" id="name"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        <label for="name"
            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="email" name="email" id="email"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        <label for="email"
            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="password" name="password" id="floating_repeat_password"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        <label for="password"
            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full group">
                <select onchange="setSchoolCode()" id="schoolName"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option>Select School</option>
                    @foreach($schools as $school)
                    <option value="{{$school->school_code}}|{{$school->school_name}}">{{$school->school_name}}</option>
                    @endforeach
                </select>

            </div>
            
            <div class="hidden z-0 w-full group">
                <input name="school_name" id="school_name" type="text">
            </div>
        <div class="relative z-0 w-full mb-5 group">
            <input readOnly type="text" name="school_code" id="school_code"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "  required />
            <label for="school_code"
                class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">School
                Code</label>
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="mobile_number" id="mobile"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="mobile"
                class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mobile
                Number</label>
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="image">Upload
                Image</label>
            <input
            name="image"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none   "
                aria-describedby="user_avatar_help" id="image" type="file">
        </div>
        <div class="my-3">
        <label for="role" class="block mb-2 text-sm font-medium text-gray-900  ">Select Role</label>
        <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
        <option selected>Choose a role</option>
        <option value="head_of_admin">Head Of Admin</option>
        <option value="admin">Admin</option>
        <option value="accounts">Accounts</option>
        <option value="operator">Operator</option>
        <option value="user">User</option>
        </select>
        </div>
    </div>
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">Submit</button>
</form>


@endsection

<script>
    function setSchoolCode() {
        var selectElement = document.getElementById('schoolName');
        var School = document.getElementById('school_name');
        var schoolCodeInput = document.getElementById('school_code');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var value = selectedOption.value;
        var splitValues = value.split('|');
        var schoolCode = splitValues[0];
        var schoolName = splitValues[1];
        schoolCodeInput.value = schoolCode;
        School.value=schoolName;
    }
</script>

