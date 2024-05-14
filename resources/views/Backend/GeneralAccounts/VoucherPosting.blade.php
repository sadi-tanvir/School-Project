@extends('Backend.app')
@section('title')
    Voucher Posting
@endsection


@section('Dashboard')
    <div class="w-full grid grid-cols-4 mx-auto p-5 space-x-10">
        {{-- Controll Area --}}
        <div class="p-1">
            <div class="border rounded-lg p-3">
                <h1 class="text-2xl font-semibold">Control Area</h1>
                <form action="{{ url('') }}" method="POST">
                    @csrf
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="bill_challan_no"
                                class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Status</label>
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
                            <label for="bill_challan_no" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Entry
                                By</label>
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
                            <label for="bill_challan_no"
                                class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Type</label>
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
                            <label for="voucher_date" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Date
                                From</label>
                            <input type="date" value="" name="voucher_date" id="voucher_date"
                                class="col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="voucher_number" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Date
                                To</label>
                            <input type="date" value="1" name="voucher_number" id="voucher_number"
                                class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>

                    </div>
                    <div class="flex">
                        <button type="button"
                            class="text-white bg-gradient-to-br from-gray-600 to-gray-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center ml-auto">
                            Find
                        </button>
                    </div>
                </form>


                {{-- table section --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 py-1">
                                    <div class="flex items-center">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    ST
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    V. #
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    DATE
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    AMT.
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                                <td class="px-6 py-4">
                                    a
                                </td>
                                <td class="px-6 py-4">
                                    b
                                </td>
                                <td class="px-6 py-4">
                                    c
                                </td>
                                <td class="px-6 py-4">
                                    d
                                </td>
                                <td class="px-6 py-4">
                                    e
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-full flex justify-between items-center mt-5">
                    <button type="button"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center">
                        POST ALL
                    </button>
                    <div class="flex items-center">
                        <h1 class="text-sm">Total Amount =</h1>
                        <input readonly type="number" value="0" name="student_roll" id="student_roll"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 w-20"
                            placeholder="" />
                    </div>
                </div>
            </div>
        </div>

        {{-- Voucher Details --}}
        <div class="col-span-3 p-5 border rounded-lg">
            <h1 class="text-xl font-semibold mb-2">VOUCHER DETAILS</h1>

            <div class="w-full">
                <div class="w-11/12 ml-auto gap-14">
                    <div class="w-full grid grid-cols-3 space-x-5">
                        <div class="col-span-2  flex space-x-4">
                            <h1 class="text-sm">VOUCHER #</h1>
                            <input readonly type="number" value="" name="vouncer" id="vouncer"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 w-full"
                                placeholder="" />
                        </div>
                        <div class="flex items-center">
                            <h1 class="text-sm w-fit">VOUCHER DATE</h1>
                            <input readonly type="number" value="" name="vouncer_date" id="vouncer_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 w-full"
                                placeholder="" />
                        </div>
                    </div>

                    <div class="grid grid-cols-12 items-center mt-4">
                        <h1 class="text-sm w-fit">ENTRY BY</h1>
                        <input readonly type="number" value="" name="vouncer_date" id="vouncer_date"
                            class="col-span-11 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 w-full"
                            placeholder="" />
                    </div>
                </div>

                {{-- divider --}}
                <div class="border-2 mt-20 h-3"></div>


                <div class="flex justify-around">
                    <div class="flex items-center mt-4 gap-3">
                        <h1 class="text-sm w-fit">VOUCHER TYPE</h1>
                        <input readonly type="number" value="" name="vouncer_date" id="vouncer_date"
                            class="col-span-11 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 w-full"
                            placeholder="" />
                    </div>
                    <div class="flex items-center mt-4 gap-3">
                        <h1 class="text-sm w-fit">VOUCHER STATUS</h1>
                        <input readonly type="number" value="" name="vouncer_date" id="vouncer_date"
                            class="col-span-11 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 w-full"
                            placeholder="" />
                    </div>
                    <div class="flex items-center mt-4 gap-3">
                        <h1 class="text-sm w-fit">CHEQUE</h1>
                        <input readonly type="number" value="" name="vouncer_date" id="vouncer_date"
                            class="col-span-11 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 w-full"
                            placeholder="" />
                    </div>
                </div>


                {{-- VOUCHER EVALUTION FOR POSTING --}}
                <div class="space-y-1 mt-20">
                    <div class="bg-blue-200 text-center rounded-lg">
                        <h1 class="py-1">VOUCHER EVALUTION FOR POSTING</h1>
                    </div>
                    <div class="">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            SL# </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            A/C HEAD NAME
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            REGISTER NAME
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            PROJECT NAME
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            PARTICULARS
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            DEBIT AMOUNT
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            CREDIT AMOUNT
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            a
                                        </td>
                                        <td class="px-6 py-4">
                                            b
                                        </td>
                                        <td class="px-6 py-4">
                                            c
                                        </td>
                                        <td class="px-6 py-4">
                                            d
                                        </td>
                                        <td class="px-6 py-4">
                                            e
                                        </td>
                                        <td class="px-6 py-4">
                                            f
                                        </td>
                                        <td class="px-6 py-4">
                                            g
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="flex justify-center space-x-3 mt-28">
                            <button type="button"
                                class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center w-full">
                                Post
                            </button>
                            <button type="button"
                                class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center w-full">
                                Edit
                            </button>
                            <button type="button"
                                class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center w-full">
                                unpost
                            </button>
                            <button type="button"
                                class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center w-full">
                                close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
