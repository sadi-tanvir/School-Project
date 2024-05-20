@extends('Backend.app')
@section('title')
    Setup Ass. Paradarsita Noipunno
@endsection


@section('Dashboard')
    <div class="my-5">
        <h1 class="text-xl font-semibold">পারদর্শিতার সূচক গঠনের মাত্রা</h1>
    </div>

    {{-- left section --}}
    <div class="grid grid-cols-3">
        <div class="">
            <form action="{{ url('') }}" method="POST">
                @csrf
                <div class="py-5 px-2 space-y-5 flex flex-col">
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="class" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">CLASS NAME :</label>
                        <select id="class" name="class"
                            class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                            <option selected>Select</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="class" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">NOIPUNNO:</label>
                        <select id="class" name="class"
                            class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                            <option selected>Select</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                </div>
        </div>

        {{-- middle section --}}
        <div class="py-5 px-2 space-y-5 flex flex-col">
            <div class="grid grid-cols-4 space-x-5 items-center">
                <label for="class" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Subject: </label>
                <select id="class" name="class"
                    class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                    <option selected>Select</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                </select>
            </div>
            <div class="grid grid-cols-4 space-x-5 items-center">
                <label for="class" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">YEAR: </label>
                <select id="class" name="class"
                    class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                    <option selected>Select</option>
                    <option value="US">2024</option>
                    <option value="CA">2023</option>
                    <option value="FR">2022</option>
                    <option value="DE">2021</option>
                </select>
            </div>
        </div>

        {{-- right section --}}
        <div class="py-5 px-2 space-y-5 flex flex-col">
            <div class="grid grid-cols-4 space-x-5 items-center">
                <label for="class" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">EXAM : </label>
                <select id="class" name="class"
                    class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                    <option selected>Select</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                </select>
            </div>
            <div class="mx-auto">
                <button type="submit"
                    class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase">
                    get data
                </button>
            </div>
        </div>
        </form>
    </div>
    <div class="w-5/6 mx-auto mt-10 space-y-3">
        <h1 class="font-semibold text-xl">সিলেক্ট পারদর্শিতার সূচক</h1>
        <div class="flex items-center mb-4">
            <input id="default-checkbox" type="checkbox" value=""
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Select
                All</label>
        </div>
    </div>
    <div class="flex justify-center items-center gap-10 mt-20">
        <button type="submit"
            class="text-white bg-gradient-to-br from-sky-600 to-sky-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-20 py-2.5 text-center uppercase">
            Config View
        </button>
        <button type="submit"
            class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-20 py-2.5 text-center uppercase">
            Save
        </button>
        <button type="submit"
            class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-20 py-2.5 text-center uppercase">
            Close
        </button>
        <div class="flex space-x-2">
            <h1>Total =</h1>
            <input readonly type="number" value="" name="student_roll" id="student_roll"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1"
                    placeholder="" />
        </div>
    </div>
    </div>
@endsection
