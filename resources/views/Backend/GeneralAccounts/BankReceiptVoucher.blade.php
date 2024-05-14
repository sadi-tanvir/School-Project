@extends('Backend.app')
@section('title')
    Bank Receipt Voucher
@endsection


@section('Dashboard')
    <div class="w-full border mx-auto p-5 space-y-10">
        {{-- first section --}}
        <div class="w-2/5 mx-auto">
            <form action="{{ url('') }}" method="POST">
                @csrf
                <div class="py-5 px-2 space-y-3 flex flex-col">
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="voucher_date" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Voucher Date</label>
                        <input type="date" value="" name="voucher_date" id="voucher_date"
                            class="col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="voucher_number" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Voucher
                            Number</label>
                        <input type="text" value="1" name="voucher_number" id="voucher_number"
                            class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="money_receipt_no" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Money Receipt
                            No.</label>
                        <input type="number" value="" name="money_receipt_no" id="money_receipt_no"
                            class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="bill_challan_no" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Bank
                            Account</label>
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
                        <label for="narration" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Narration</label>
                        <input type="number" value="" name="narration" id="narration"
                            class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 py-5 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="available_balance" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">Available
                            Balance </label>
                        <input type="text" value="0" name="available_balance" id="available_balance"
                            class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                </div>
            </form>
        </div>


        {{-- table section 1 --}}
        <div class="space-y-1">
            <div class="bg-blue-200 text-center rounded-lg">
                <h1 class="py-1">Bank Receipt Voucher</h1>
            </div>
            <button type="button"
                class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center mx-auto">
                Add
            </button>
            <div class="">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    SL#
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Accounts Head Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Project Name
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Register Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Particulars
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Amount(BDT)
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1
                                </th>
                                <td class="px-6 py-4">
                                    <div class="">
                                        <select id="group" name="group"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Select</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="FR">France</option>
                                            <option value="DE">Germany</option>
                                        </select>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="">
                                        <select id="group" name="group"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Select</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="FR">France</option>
                                            <option value="DE">Germany</option>
                                        </select>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="">
                                        <select id="group" name="group"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Select</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="FR">France</option>
                                            <option value="DE">Germany</option>
                                        </select>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <input type="number" value="" name="" id=""
                                        class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                        placeholder="" />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="number" value="" name="" id=""
                                        class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                        placeholder="" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-20 flex justify-center">
                    <div class="flex items-center space-x-10">
                        <h1>Total Amount =</h1>
                        <input readonly type="number" value="0" name="student_roll" id="student_roll"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1"
                            placeholder="" />
                    </div>
                </div>
            </div>
        </div>


        {{-- table section 2 --}}
        <div class="space-y-1">
            <div class="">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    CHEQUE #
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    PROJECT
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    REGISTER
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    CQ. DATE
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    EN. DATE
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    TYPE
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="number" value="" name="" id=""
                                        class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                        placeholder="" />
                                </th>
                                <td class="px-6 py-4">
                                    <div class="">
                                        <select id="group" name="group"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Select</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="FR">France</option>
                                            <option value="DE">Germany</option>
                                        </select>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="">
                                        <select id="group" name="group"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Select</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="FR">France</option>
                                            <option value="DE">Germany</option>
                                        </select>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <input type="date" value="" name="" id=""
                                        class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                        placeholder="" />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="date" value="" name="" id=""
                                        class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                        placeholder="" />
                                </td>
                                <td class="px-6 py-4">
                                    <input type="number" value="" name="" id=""
                                        class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                        placeholder="" />
                                </td>
                                <td class="px-6 py-4">
                                    <div class="">
                                        <select id="group" name="group"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>CHEQUE</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="FR">France</option>
                                            <option value="DE">Germany</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-center space-x-3 mt-10">
                    <button type="button"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center">
                        Save
                    </button>
                    <button type="button"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center">
                        Edit
                    </button>
                    <button type="button"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center">
                        print
                    </button>
                    <button type="button"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center">
                        refresh
                    </button>
                    <button type="button"
                        class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center">
                        close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
