@extends('Backend.app')
@section('title')
    Fees Collection
@endsection


@section('Dashboard')
    <div>
        <h1>Unpaid Payslip</h1>
    </div>


    <div class="w-3/5 border mx-auto p-5">
        <form action="{{ url('') }}" method="POST">
            @csrf
            <div class="w-full flex gap-5">
                <div class=" w-full py-5 px-2 space-y-3 flex flex-col">
                    <div class="">
                        <label for="class" class="mb-2 text-sm font-medium text-gray-900 ">CLASS:</label>
                        <input type="text" value="" name="class" id="class"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="class" />
                    </div>

                    <div class="">
                        <label for="group" class="mb-2 text-sm font-medium text-gray-900 ">GROUP:</label>
                        <input type="text" value="" name="group" id="group"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="student class" />
                    </div>

                    <div class="">
                        <label for="section" class="mb-2 text-sm font-medium text-gray-900 ">SECTION:</label>
                        <input type="text" value="" name="section" id="section"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="section" />
                    </div>

                    <div class="">
                        <label for="student_id" class="mb-2 text-sm font-medium text-gray-900 ">STUDENT ID:</label>
                        <input type="number" value="" name="student_id" id="student_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="Student Id" />
                    </div>

                    <div class="">
                        <label for="year" class="mb-2 text-sm font-medium text-gray-900 ">Year:</label>
                        <input type="date" value="" name="year" id="year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="year" />
                    </div>

                    <div class="">
                        <label for="student_id" class="mb-2 text-sm font-medium text-gray-900 ">Last Payment
                            Date:</label>
                        <input type="date" value="" name="student_id" id="student_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="student id" />
                    </div>
                </div>

                <div class="w-full">
                    <div class="border p-5 mt-10 space-y-3">
                        <span>Select Payslip</span>
                        <div class="flex items-center">
                            <input checked id="checked-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900">Select All</label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="w-full flex justify-center items-center gap-5">
                <button type="submit"
                    class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300  font-medium rounded-lg text-sm px-10 py-2.5 text-center">
                    Download List
                </button>

                <button type="button"
                    class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300  font-medium rounded-lg text-sm px-8 py-2.5 text-center">
                    Print
                </button>
            </div>
        </form>


        {{-- form --}}
        <form action="{{ url('') }}" method="POST">
            @csrf
            <div class="font-bold">
                <h3>Student Information</h3>
            </div>
            <div class="border py-5 px-2 space-y-3 flex flex-col rounded-lg shadow">
                <div class="">
                    <label for="year" class="block mb-2 text-sm font-medium whitespace-noWrap ">Year:</label>
                    <select id="year" name="year"
                        class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                        <option selected>Select</option>
                        {{-- @foreach ($years as $yearVal)
                            <option {{ date('Y') == $yearVal->year ? 'selected' : '' }} value="{{ $yearVal->year }}">
                                {{ $yearVal->year }}</option>
                        @endforeach --}}
                    </select>
                </div>

                {{-- class --}}
                <div class="">
                    <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class
                        :</label>
                    <select id="class" name="class"
                        class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                        <option selected>Select</option>
                        {{-- @foreach ($classes as $class)
                            <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                        @endforeach --}}
                    </select>
                </div>

                {{-- group --}}
                <div class="">
                    <label for="group" class="block mb-2 text-sm font-medium whitespace-noWrap ">Group
                        :</label>
                    <select id="group" name="group"
                        class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                        <option selected>Select</option>
                        {{-- @foreach ($classes as $class)
                            <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                        @endforeach --}}
                    </select>
                </div>

                {{-- section --}}
                <div class="">
                    <label for="section" class="block mb-2 text-sm font-medium whitespace-noWrap ">Section
                        :</label>
                    <select id="section" name="section"
                        class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                        <option selected>Select</option>
                    </select>
                </div>

                {{-- Student Roll --}}
                <div class="">
                    <label for="student_roll" class="block mb-2 text-sm font-medium whitespace-noWrap ">Student Roll:
                    </label>
                    <div class="autocomplete w-full relative">
                        <input type="text" name="student_roll" id="student_roll" placeholder="Search..."
                            class="w-full py-2 px-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                        <div id="autocomplete-list" class="autocomplete-list hidden"></div>
                    </div>
                </div>

                <button id="getPaySlipData" type="button"
                    class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-auto">Load
                    Data
                </button>
            </div>
        </form>
    </div>
@endsection
