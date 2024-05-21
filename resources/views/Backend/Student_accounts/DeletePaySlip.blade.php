@extends('Backend.app')
@section('title')
    Delete Pay Slip
@endsection


@section('Dashboard')
    <div>
        <h1>Payslip Deleted</h1>
    </div>


    <div class="w-full border mx-auto p-5 space-y-10">
        <form action="{{ url('') }}" method="POST">
            @csrf
            <div class="flex justify-start items-center gap-5">
                <h1>Payslip No.:</h1>
                <div>
                    <input type="text" value="" name="slip_type" id="slip_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-96"
                        placeholder="Pay Slip Number" />
                </div>
                <button type="submit"
                    class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center uppercase">
                    Search
                </button>
            </div>
        </form>

        <div class="space-y-1">
            <div class="bg-blue-200 text-center">
                <h5 class="py-1">PAYSLIP LIST</h5>
            </div>
            <div class="">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    StudentID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    CLASS </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    GROUP
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Voucher
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    MonthName
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Payable
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Waiver
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Received
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
                                <td class="px-6 py-4">
                                    i
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-32">
                    <div class="flex space-x-16 justify-end">
                        <button type="submit"
                            class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center">
                            Delete
                        </button>
                        <h1>
                            Total =
                            <input readonly type="number" value="" name="student_roll" id="student_roll"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 mr-10"
                                placeholder="" />
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
