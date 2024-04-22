@extends('Backend.app')
@section('title')
    List of Unassigned Subject
@endsection
@section('Dashboard')
    @include('/Message/message')
    <style>
        .shadowStyle {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }
    </style>

    <div>
        <h1 class="text-2xl font-bold my-5 mx-5 text-center">List of Unassigned Subject</h1>
    </div>
    <div class=" mb-3">
        <form action="" class="p-5 shadowStyle rounded-[8px] border border-slate-300 w-2/5 mx-auto space-y-3">
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class
                    :</label>
                <select id="class" name="class"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select Class</option>
                    <option value="">Active</option>
                    <option value="">In-Active</option>
                </select>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="group" class="block mb-2 text-sm font-medium whitespace-noWrap ">Group
                    :</label>
                <select id="group" name="group"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select Group</option>
                    <option value="">Active</option>
                    <option value="">In-Active</option>
                </select>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="section" class="block mb-2 text-sm font-medium whitespace-noWrap ">Section
                    :</label>
                <select id="section" name="section"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select section</option>
                    <option value="">Active</option>
                    <option value="">In-Active</option>
                </select>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="exam_name" class="block mb-2 text-sm font-medium whitespace-noWrap ">Exam Name
                    :</label>
                <select id="exam_name" name="exam_name"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select Exam Name</option>
                    <option value="">Active</option>
                    <option value="">In-Active</option>
                </select>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="year" class="block mb-2 text-sm font-medium whitespace-noWrap ">Year
                    :</label>
                <select id="year" name="year"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select Year</option>
                    <option value="">Active</option>
                    <option value="">In-Active</option>
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

