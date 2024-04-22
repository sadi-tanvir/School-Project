@extends('Backend.app')
@section('title')
Institute Info
@endsection
@section('Dashboard')
<div>
    <h3>
        Institute/Institute Information
    </h3>
</div>

<div class="mt-10">
    <div class="md:mx-52 border border-2 p-10">
        <form id="dataForm" method="POST" action="{{ route('update.institute.info') }}">
            @csrf
            @method('PUT')
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="institute_code" class="block mb-2 text-lg font-medium text-gray-900 d ">Institute Code :
                    </label>
                </div>
                <div class="">
                    <input type="text" name="institute_code" id="institute_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter The Institute Code" required />
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="eiin" class="block mb-2 text-lg font-medium text-gray-900 d ">EIIN No :
                    </label>
                </div>
                <div class="">
                    <input type="text" name="eiin" id="eiin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter The EIIN No" required />
                </div>
            </div>

            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="institute_name" class="block mb-2 text-lg font-medium text-gray-900 d ">Institute Name :
                    </label>
                </div>
                <div class="">
                    <input type="text" name="institute_name" id="institute_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter The Institute Name " required />
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="address1" class="block mb-2 text-lg font-medium text-gray-900 d ">Address1 :
                    </label>
                </div>
                <div class="">
                    <input type="text" name="address1" id="address1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter The Address1" required />
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="address2" class="block mb-2 text-lg font-medium text-gray-900 d ">Address2 :
                    </label>
                </div>
                <div class="">
                    <input type="text" name="address2" id="address2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter The Address2" required />
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="phone" class="block mb-2 text-lg font-medium text-gray-900 d ">Phone :
                    </label>
                </div>
                <div class="">
                    <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter The Phone" required />
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="fax" class="block mb-2 text-lg font-medium text-gray-900 d ">Fax :
                    </label>
                </div>
                <div class="">
                    <input type="text" name="fax" id="fax" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter The Fax" required />
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="email" class="block mb-2 text-lg font-medium text-gray-900 d ">Email :
                    </label>
                </div>
                <div class="">
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter The Email" required />
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="website" class="block mb-2 text-lg font-medium text-gray-900 d ">Website :
                    </label>
                </div>
                <div class="">
                    <input type="text" name="website" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter The Website" required />
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
              
                    <label for="logo" class="block mb-2 text-lg font-medium text-gray-900 d">Logo:</label>
              
                    <!-- <input name="logo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 " id="logo" type="file"> -->
                    <input type="file" name="logo" id="logo">
           
            </div>

            <div class=" flex justify-end">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection