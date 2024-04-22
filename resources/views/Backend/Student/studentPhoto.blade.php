@extends('Backend.app')
@section('title')
    Upload Photo
@endsection
@section('Dashboard')
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
            <button type="button"
                class=" text-white bg-rose-700 hover:bg-rose-600 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-rose-600 dark:hover:bg-rose-700 focus:outline-none dark:focus:ring-rose-800">photo
                
            </button>
            <button type="button"
                class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Student
            </button>
        </div>
        <hr>
        <form action="">

            <div class="grid gap-6 mb-6 md:grid-cols-7 mt-2">
                <div>
                    <select id="" name="class"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a class</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
    
                <div>
                    <select id="" name="group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Group</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
                <div>
                    <select id="" name="section"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a section</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
                <div>
                    <select id="" name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a year</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
    
                <div>
                    <select id="" name="session"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a session</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
    
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" />
    
                <div class="flex justify-end">
                    <button type="button"
                    class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Search
                </button>
                </div>
            </div>
        </form>
        <table class="w-full text-sm text-left rtl:text-right text-black dark:text-blue-100">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 dark:text-white">
                <tr>
                    
                    <th scope="col" class="px-6 py-3">
                        Student Id
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Roll
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Photo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Upload Photo
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                



            </tbody>
        </table>
        <div class="flex justify-end mt-5">
            <button type="button"
            class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update
        </button>
        </div>
    </div>
@endsection