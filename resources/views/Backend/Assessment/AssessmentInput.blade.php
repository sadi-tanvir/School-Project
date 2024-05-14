@extends('Backend.app')
@section('title')
    Assessment Input
@endsection


@section('Dashboard')
    <div class="w-full mx-auto p-5 space-y-10">
        <form action="{{ url('') }}" method="POST">
            @csrf
            <div class="grid grid-cols-6 items-center gap-5">
                <div class="space-y-2">
                    <label for="class_name" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Class Name:</label>
                    <select id="class_name" name="class_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Class</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label for="group" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Group: </label>
                    <select id="group" name="group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label for="section" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Section:</label>
                    <select id="section" name="section"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label for="shift" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Shift:</label>
                    <select id="shift" name="shift"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label for="subject" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Subject:</label>
                    <select id="subject" name="subject"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label for="exam" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Exam:</label>
                    <select id="exam" name="exam"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label for="type" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Type:</label>
                    <select id="type" name="type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label for="year" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Year:</label>
                    <select id="year" name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>

                <div>
                    <button type="submit"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center uppercase mt-7">
                        find
                    </button>
                </div>
            </div>
        </form>
    </div>

    <hr class="mt-5">

    <div class="flex justify-end items-center mr-5 mt-2">
        <div class="flex space-x-2">
            <h1 class="font-semibold text-lg">Total =</h1>
            <input readonly type="number" value="" name="student_roll" id="student_roll"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1"
                    placeholder="" />
        </div>
    </div>

    <div class="flex justify-center items-center gap-10 mt-20">
        <button type="submit"
            class="text-white bg-gradient-to-br from-sky-600 to-sky-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-20 py-2.5 text-center uppercase">
            Blank Page
        </button>
        <button type="submit"
            class="text-white bg-gradient-to-br from-cyan-600 to-cyan-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-20 py-2.5 text-center uppercase">
            Print Mak Page
        </button>
        <button type="submit"
            class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-20 py-2.5 text-center uppercase">
            Save
        </button>
    </div>
@endsection
