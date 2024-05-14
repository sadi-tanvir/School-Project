@extends('Backend.app')
@section('title')
    Quick Collection
@endsection


@section('Dashboard')
    <div>
        <h1>Special Discount</h1>
    </div>

    <div class="grid grid-cols-3 gap-5">
        {{-- left section --}}
        <div class="">
            {{-- form --}}
            <form action="{{ url('') }}" method="POST">
                @csrf
                <div class="font-bold">
                    <h3>Student Information</h3>
                </div>
                <div class="border py-5 px-2 space-y-3 flex flex-col">
                    <div class="">
                        <label for="year" class="mb-2 text-sm font-medium text-gray-900 ">Year :</label>
                        <input type="date" value="" name="year" id="year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="" />
                    </div>

                    <div class="">
                        <label for="student_class" class="mb-2 text-sm font-medium text-gray-900 ">Class :</label>
                        <input type="text" value="" name="student_class" id="student_class"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="student class" />
                    </div>

                    <div class="">
                        <label for="section" class="mb-2 text-sm font-medium text-gray-900 ">Section :</label>
                        <input type="text" value="" name="section" id="section"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="section" />
                    </div>

                    <div class="">
                        <label for="student_roll" class="mb-2 text-sm font-medium text-gray-900 ">Student Roll :</label>
                        <input type="number" value="" name="student_roll" id="student_roll"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="student roll" />
                    </div>

                    <div class="">
                        <label for="student_id" class="mb-2 text-sm font-medium text-gray-900 ">Student ID :</label>
                        <input type="number" value="" name="student_id" id="student_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="student id" />
                    </div>

                    <button type="submit"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-auto">Load
                        Data</button>
                </div>
            </form>

            {{-- table section --}}
            <div class="">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Month
                                </th>
                                <th scope="col" class="px-16 py-3 bg-blue-500">
                                    PaySlip
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    a
                                </th>
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

                <div class="mt-20 flex justify-between">
                    <button type="submit"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-1.5 text-center">
                        >>
                    </button>

                    <h1>
                        Total =
                        <input readonly type="number" value="" name="student_roll" id="student_roll"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1"
                            placeholder="" />
                    </h1>
                </div>
            </div>
        </div>


        {{-- right section --}}
        <div class="bg-gray-200 col-span-2 p-5">
            <div class="flex justify-between">
                <div class="w-80">
                    <div class="">
                        <label for="student_class" class="mb-2 text-sm font-medium text-gray-900 ">Collention
                            Date:</label>
                        <input type="date" value="" name="student_class" id="student_class"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="student class" />
                    </div>

                    <div class="">
                        <label for="waiver_amount:" class="mb-2 text-sm font-medium text-gray-900 ">Waiver Amount:</label>
                        <input type="text" value="" name="waiver_amount:" id="waiver_amount:"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="" />
                    </div>
                </div>




                <div class="w-80">
                    <div class="flex gap-5">
                        <div class="">
                            <label for="student_class" class="mb-2 text-sm font-medium text-gray-900 ">S.ID:</label>
                            <input type="text" readonly value="" name="student_class" id="student_class"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" />
                        </div>
                        <div class="">
                            <label for="student_class" class="mb-2 text-sm font-medium text-gray-900 ">Roll:</label>
                            <input type="text" readonly value="" name="student_class" id="student_class"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" />
                        </div>
                    </div>

                    <div class="">
                        <label for="name" class="mb-2 text-sm font-medium text-gray-900 ">Name:</label>
                        <input type="text" value="" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="" />
                    </div>

                    <div class="">
                        <label for="class" class="mb-2 text-sm font-medium text-gray-900 ">Class:</label>
                        <input type="text" value="" name="class" id="class"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="" />
                    </div>

                    <div class="flex gap-5">
                        <div class="">
                            <label for="month" class="mb-2 text-sm font-medium text-gray-900 ">Month:</label>
                            <input type="text" readonly value="" name="month" id="month"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" />
                        </div>
                        <div class="mt-6">
                            <input type="text" readonly value="" name="student_class" id="student_class"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" />
                        </div>
                    </div>
                </div>
            </div>


            {{-- table section --}}
            <div class="mt-10">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    HEAD NAME
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    AMOUNT
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    WAIVER
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    PAYABLE
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Rece. Amt.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Waiver
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    C. Pay
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    a
                                </th>
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
                                <td class="px-6 py-4">
                                    h
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="grid grid-cols-4 gap-5">
                    <div class="mt-20 flex flex-wrap gap-5 col-span-3">
                        <div class="">
                            <label for="t_amount" class="mb-2 text-sm font-medium text-gray-900 ">T. Amount:</label>
                            <input type="text" value="" name="t_amount" id="t_amount"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" readonly />
                        </div>
                        <div class="">
                            <label for="t_waiver" class="mb-2 text-sm font-medium text-gray-900 ">T. Waiver:</label>
                            <input type="text" value="" name="t_waiver" id="t_waiver"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" readonly />
                        </div>
                        <div class="">
                            <label for="t_payable" class="mb-2 text-sm font-medium text-gray-900 ">T. Payable:</label>
                            <input type="text" value="" name="t_payable" id="t_payable"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" readonly />
                        </div>
                        <div class="">
                            <label for="t_received" class="mb-2 text-sm font-medium text-gray-900 ">T. Received:</label>
                            <input type="text" value="" name="t_received" id="t_received"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" readonly />
                        </div>
                        <div class="">
                            <label for="current_pay" class="mb-2 text-sm font-medium text-gray-900 ">Current Pay:</label>
                            <input type="text" value="" name="current_pay" id="current_pay"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" readonly />
                        </div>
                    </div>



                    <div class="mt-24 space-y-3">
                        <div class="flex gap-2">
                            <label for="special_waiver" class="mb-2 text-sm font-medium text-gray-900 ">Special
                                Waiver:</label>
                            <input type="number" value="" name="special_waiver" id="special_waiver"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" readonly />
                        </div>

                        <div class="flex gap-2">
                            <label for="approaved_by"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Approved By:</label>
                            <select id="approaved_by" name="approaved_by"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>

                        <div class="flex gap-2">
                            <label for="note" class="mb-2 text-sm font-medium text-gray-900 ">Note:</label>
                            <input type="text" value="" name="note" id="note"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" readonly />
                        </div>

                        <div class="flex space-x-3">
                            <h1>Send SMS:</h1>
                            <div>
                                <div class="flex items-center">
                                    <input id="non_masking" name="non_masking" type="checkbox" value=""
                                        class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500  focus:ring-2 dark:bg-gray-700">
                                    <label for="non_masking"
                                        class="ml-1 text-sm font-medium text-gray-900 ">Non-Masking</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="masking" name="masking" type="checkbox" value=""
                                        class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500  focus:ring-2 dark:bg-gray-700">
                                    <label for="masking" class="ml-1 text-sm font-medium text-gray-900 ">Masking</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
