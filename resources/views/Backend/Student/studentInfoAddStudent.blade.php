@extends('Backend.app')
@section('title')
    Student BasicInfo
@endsection
@section('Dashboard')
    <div>
        <h3>
            Student Basic Info / Add Student
        </h3>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">

        <form action="">

            <div class="grid gap-6 mb-6 md:grid-cols-4 mt-2">

                <div>
                    <select id="" name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a year</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>

                <div>
                    <select id="" name="student Id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Student Id</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>

                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="row" />

                <div class="flex justify-end">
                    <button type="button"
                        class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Add
                    </button>
                </div>
            </div>
        </form>
        <table class="w-full text-sm text-left rtl:text-right text-black ">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 >
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

                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Mobile
                    </th>
                    <th scope="col" class="px-6 py-3">
                        BirthDate
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Religion
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        BG
                    </th>

                </tr>
            </thead>
            <tbody>




            </tbody>
        </table>

        <form action="">
            <div class="grid md:grid-cols-6 gap-6 my-5">
                <div>
                    <select id="" name="class"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a class</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>

                <div>
                    <select id="" name="group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Group</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
                <div>
                    <select id="" name="section"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a section</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
                <div>
                    <select id="" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Category</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
                <div>
                    <select id="" name="shift"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Shift</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>

                <div>
                    <button type="button"
                        class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
