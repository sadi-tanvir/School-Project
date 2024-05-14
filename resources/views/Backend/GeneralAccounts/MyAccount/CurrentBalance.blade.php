@extends('Backend.app')
@section('title')
    Current Balance
@endsection


@section('Dashboard')
    <div class="w-full border mx-auto p-5 space-y-10">

        {{-- table section --}}
        <div class="space-y-1">
            <div class="mt-5 mb-5">
                <h1 class="py-1 text-center font-semibold text-3xl">CURRENT BALANCE</h1>
            </div>

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
                                    NAME
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    COLLECT BALANCE
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    TRANSFER BALANCE
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    IN HAND BALANCE
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
                                    <p class="text-end font-bold text-lg">Total=</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-start">00</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-start">00</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-start">00</p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            {{-- table 2 --}}
            <div class="">
                <div class="mt-10 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    SL#
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    ACCOUNTS HEAD NAME
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    DEBIT BALANCE
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    CREDIT BALANCE
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
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-end font-bold text-lg">Total=</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-start">00</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-start">00</p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
