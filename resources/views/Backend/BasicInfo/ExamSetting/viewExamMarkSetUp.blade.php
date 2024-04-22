@extends('Backend.app')
@section('title')
Exam Mark Setup
@endsection
@section('Dashboard')
    <div>
        <h3>
            Exam Mark Setup View List
        </h3>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
        <form action="">
        <div class="md:flex my-10 ">
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Class :</label>
            </div>
            <div class="mr-5">
                <select id="countries" name="Class_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option selected>Choose Class</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
            </div>
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Group :</label>
            </div>
            <div class="mr-5">
                <select id="group" name="group_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option selected>Choose group</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
            </div>
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Exam :</label>
            </div>
            <div class="mr-5">
                <select id="countries" name="Exam_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option selected>Choose Exam</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
            </div>
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Year :</label>
            </div>
            <div class="mr-5">
                <select name="year" id='date-dropdown'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option>Select Year</option>
                    </select>
            </div>
            <div class="mr-5">
                <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">Search</button>
            </div>
            <div>
                <button type="button"
                class="text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center   ">Print</button>
            </div>

        </div>

    </form>
    <div class="">

        <div class=" text-lg font-bold">
           <div class="flex justify-center">
            <h3>
                EXAM MARK CONFIG REPORT
            </h3>
           </div>
         
        <table class="w-full text-sm text-left rtl:text-right text-black ">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        SHORT CODE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TOTAL MARKS
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Countable Mark
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pass Mark
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Acceptance
                    </th>
                    <th scope="col" class="px-6 py-3">
                        STATUS
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class=" border-b border-blue-400">
                    <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">

                    </th>
                    <td class="px-6 py-4">

                    </td>
                    <td class="px-6 py-4">

                    </td>
                    <td class="px-6 py-4">

                    </td>
                    <td class="px-6 py-4 ">

                    </td>

                    <td class="px-6 py-4 ">
                        {{-- <div class="flex justify-center">
                            <input id="bordered-checkbox-1" type="checkbox" value="" name="bordered-checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                        </div> --}}
                    </td>
                </tr>



            </tbody>
        </table>
    </div>
    </div>
    <br> <br>
         

        
    </div>
@endsection

