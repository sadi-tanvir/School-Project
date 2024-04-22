@extends('Backend.app')
@section('title')
    Student Attendence
@endsection
@include('/Message/message')
<style>
    .shadowStyle {
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }
</style>
@section('Dashboard')
    <div>
        <h3 class="text-slate-500 text-center font-bold text-2xl">
            Student Attendence
        </h3>
    </div>
    <div class="relative overflow-x-auto shadowStyle mx-10 md:my-10 p-5">
        <div class="flex justify-end gap-5">
            <p>Subject</p>
            <p>Period</p>
        </div>
        <hr>
        <form action="">

            <div class="grid gap-6 mb-6 md:grid-cols-7 mt-2">
                <div>
                    <label for="class" class="block mb-2 text-sm font-medium">Class</label>
                    <select id="class" name="class"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Select a class</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
                <div>
                    <label for="group" class="block mb-2 text-sm font-medium">Group</label>
                    <select id="group" name="group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Group</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
                <div>
                    <label for="section" class="block mb-2 text-sm font-medium">Section</label>
                    <select id="section" name="section"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Choose a section</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
                <div>
                    <label for="year" class="block mb-2 text-sm font-medium">Year</label>
                    <select id="year" name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a year</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
                <div>
                    <label for="period" class="block mb-2 text-sm font-medium">Period</label>
                    <select id="period" name="period"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Select Period</option>
                        <option value="">x</option>
                        <option value="">y</option>
                        <option value="">z</option>
                    </select>
                </div>
                <div>
                    <label for="date" class="block mb-2 text-sm font-medium">Date</label>
                    <input
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        type="date" placeholder="Selecct Date">
                </div>
                <div class="flex justify-end items-center">
                    <button type="button"
                        class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 h-10">Search
                    </button>
                </div>
            </div>
        </form>
        <table class="w-full text-sm text-left rtl:text-right text-black ">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        <input id="link-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 ">
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Student ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Student Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Section
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Roll
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        sms
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th></th>
                </tr>
            </tbody>
        </table>

        <p class="h-[1px] w-full bg-slate-300"></p>
        <div class="flex justify-between items-center">
            <div>
                <label for="sms" class="block mb-2 text-sm font-medium">Send Sms</label>
                <select id="sms" name="sms"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 ">
                    <option selected value="non-masking">Non Masking</option>
                    <option value="masking">Masking</option>
                </select>
            </div>
            <div class="flex items-center gap-2">
                <label for="total" class="block mb-2 text-sm font-medium whitespace-nowrap">Total Student</label>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 "
                    type="text" placeholder="1923892">
            </div>
        </div>
        <div class="flex justify-end mt-5">
            <button type="button"
                class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 focus:outline-none">Cancel
            </button>
            <button type="submit"
                class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 focus:outline-none">Save
            </button>
        </div>
    </div>
@endsection
