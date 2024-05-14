@extends('Backend.app')
@section('title')
    personal Statement
@endsection


@section('Dashboard')
    <div class="w-full border mx-auto p-5 space-y-10">
        <div class="w-4/5 mx-auto">
            <form action="{{ url('') }}" method="POST">
                @csrf
                <div class="py-5 px-2 space-y-3 flex flex-col">
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="bill_challan_no" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Entry By</label>
                        <input type="text" value="All" name="bill_challan_no" id="bill_challan_no"
                            class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="year" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Status</label>
                        <select id="group" name="group"
                            class="col-span-3 bg-gray-50 border px-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>* ALL</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="year" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Type</label>
                        <select id="group" name="group"
                            class="col-span-3 bg-gray-50 border px-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="date_from" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Date From</label>
                        <input type="date" value="" name="date_from" id="date_from"
                            class="col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="date_to" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Date To</label>
                        <input type="text" value="1" name="date_to" id="date_to"
                            class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                </div>
                <div class="flex justify-center items-center gap-10">
                    <button type="button"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center">
                        Find
                    </button>
                    <button type="button"
                        class="text-white bg-gradient-to-br from-sky-600 to-sky-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center">
                        Print
                    </button>
                </div>
            </form>
        </div>

        {{-- table section --}}
        <div class="space-y-1">
            {{-- table 1 --}}
            <div class="">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    SL#
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Voucher No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Entry By
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    View
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-end"></p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-start"></p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-start"></p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-end font-bold text-lg">Total Items=</p>
                                </td>
                                <td class="">
                                    <input class="w-20" type="number" value="00">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
