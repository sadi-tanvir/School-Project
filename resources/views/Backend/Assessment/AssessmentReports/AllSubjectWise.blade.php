@extends('Backend.app')
@section('title')
    All Subject Wise
@endsection


@section('Dashboard')
    <div class="w-full mx-auto p-5 space-y-10">
        <div>
            <h1 class="text-xl font-semibold">Prograss Report</h1>
        </div>

        {{-- first section --}}
        <div class="w-full">
            <div class="w-3/6 mx-auto border rounded-lg shadow py-5">
                <form action="{{ url('') }}" method="POST">
                    @csrf
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="class" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">CLASS :</label>
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
                            <label for="group" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">GROUP :</label>
                            <select id="group" name="group"
                                class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="section" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">SECTION : </label>
                            <select id="section" name="section"
                                class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="bill_challan_no" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">STUDENT
                                ROLL :</label>
                            <input type="number" value="" name="bill_challan_no" id="bill_challan_no"
                                class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="exam_name" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">EXAM NAME
                                :</label>
                            <select id="exam_name" name="exam_name"
                                class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="type" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Type : </label>
                            <select id="type" name="type"
                                class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="year" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Year : </label>
                            <select id="year" name="year"
                                class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-full ">
                        <button type="button"
                            class="block ml-auto mr-20 text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-28 py-2.5 text-center">
                            Print
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
