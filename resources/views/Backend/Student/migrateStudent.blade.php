@extends('Backend.app')
@section('title')
Migration
@endsection
@section('Dashboard')
<div>
    <h3>
        Migration
    </h3>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">

    <hr>
    <form action="">

        <div class="grid gap-6 mb-6 md:grid-cols-5 mt-20 mx-20">

            <div>
                <select id="" name="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a class</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>

            <div>
                <select id="" name="group" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a Group</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>
            <div>
                <select id="" name="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a section</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>
            <div>
                <select id="" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a year</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>

            <div>
                <select id="" name="exam_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Exam Name</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>
            <div>
                <select id="" name="migrate_class:" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Migrate Class:</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>
            <div>
                <select id="" name="migrate_group:" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Migrate Group:</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>
            <div>
                <select id="" name="migrate_section:" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Migrate Section::</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>
            <div>
                <select id="" name="migrate_year:" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Migrate Year:</option>
                    <option value="">x</option>
                    <option value="">y</option>
                    <option value="">z</option>
                </select>
            </div>

            <button type="button" class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-3 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Get Data
            </button>

        </div>
    </form>
    <table class="w-full text-sm text-left rtl:text-right text-black dark:text-blue-100">
        <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </th>
                <th scope="col" class="px-6 py-3">
                    Student ID
                </th>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Class
                </th>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    Group
                </th>
                <th scope="col" class="px-6 py-3">
                    Roll
                </th>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    Migrate Class
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Mark
                </th>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    M.Roll
                </th>


            </tr>
        </thead>
        <tbody>




        </tbody>
    </table>
    <div class="grid md:grid-cols-3 sticky z-56 md:mt-32 mb-5">

        <div class="md:mr-10 md:flex justify-center">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-20 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">save</button>
        </div>
        <div class="mr-10">
            <a href="">
                <button type="button" class="text-white  bg-rose-400 hover:bg-rose-400 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm w-full sm:w-auto px-20 py-2.5 text-center dark:bg-rose-300 dark:hover:bg-rose-400 dark:focus:ring-rose-400">Close</button>
            </a>
        </div>

        <div class="ml-32">
            <h3>Total Percent = <div class="border-2"></div>
            </h3>
        </div>

    </div>
</div>
@endsection