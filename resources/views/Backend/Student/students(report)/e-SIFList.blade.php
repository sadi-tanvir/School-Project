@extends('Backend.app')
@section('title')
Student Information
@endsection
@section('Dashboard')
    <div>
        <h3>
            Student Information
        </h3>
    </div>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10 border-2 md:p-5">


        <div class="grid gap-6 mb-6 md:grid-cols-2 mt-2">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Class
                </label>
                <select id="" name="class"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a class</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Group
                </label>
                <select id="" name="group"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a group</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Section
                </label>
                <select id="" name="section"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a Section</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>

            
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Session
                </label>
                <select id="" name="session"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a Session</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>

           

           


           
        </div>

        <div class="md:flex justify-end mr-10 mt-10">
            <div class="">
                <button type="button"
                    class="  text-white bg-rose-600 hover:bg-rose-600 focus:ring-4 focus:ring-rose-600 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Print
                </button>
            </div>
           
        </div>

        


    </div>

   
@endsection
