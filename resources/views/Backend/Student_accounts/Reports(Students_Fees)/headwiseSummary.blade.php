@extends('Backend.app')
@section('title')
Income Summary Report
@endsection
@section('Dashboard')
    @include('/Message/message')
    <style>
        .shadowStyle {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }
    </style>

    <div>
        <h1 class="">Income Summary Report</h1>
    </div>
    <div class=" mt-10">
        <form action="" class="p-5 shadowStyle rounded-[8px] border border-slate-300 w-2/5 mx-auto space-y-3">
            <div class="grid grid-cols-4 place-items-start  gap-5">
                <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Date From
                    :</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" name="birth_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5   "
                            placeholder="Select date">

                    </div>
                <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ml-10">To
                    :</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" name="birth_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5   "
                            placeholder="Select date">

                    </div>
            </div>
            <div class="grid grid-cols-4 place-items-start  gap-5">
                <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class
                    :</label>
                <select id="class" name="class"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                    <option disabled selected>Select Class</option>
                    <option value="">x</option>
                    <option value="">y</option>
                </select>
            </div>
            <div class="grid grid-cols-4 place-items-start  gap-5">
                <label for="group" class="block mb-2 text-sm font-medium whitespace-noWrap ">Student ID
                    :</label>
                <select id="group" name="group"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                    <option disabled selected>Select </option>
                    <option value="">x</option>
                    <option value="">y</option>
                </select>
            </div>
            <div class="grid grid-cols-4 place-items-start  gap-5">
                <label for="section" class="block mb-2 text-sm font-medium whitespace-noWrap ">Head ID :
                    :</label>
                <select id="section" name="headId"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                    <option disabled selected>Select </option>
                    <option value="">x</option>
                    <option value="">y</option>
                </select>
            </div>
            <div class="grid grid-cols-4 place-items-start  gap-5">
                <label for="section" class="block mb-2 text-sm font-medium whitespace-noWrap ">Entry By :
                    :</label>
                <select id="section" name="entry"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                    <option disabled selected>Select </option>
                    <option value="">x</option>
                    <option value="">y</option>
                </select>
            </div>
           
            <div class="w-full flex justify-end">
                <button type="submit"
                    class="w-1/3  text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">Print
                </button>
            </div>
        </form>
    </div>
@endsection











