@extends('Backend.app')
@section('title')
    Paradarsita Suchok Exam
@endsection


@section('Dashboard')
    <div class="my-5">
        <h1 class="text-xl font-semibold">পারদর্শিতার সূচক পরীক্ষা</h1>
    </div>

    <div class="w-full border mx-auto p-5 space-y-10">
        <form action="{{ url('') }}" method="POST">
            @csrf
            <div class="grid grid-cols-6 items-center  gap-5">
                <div>
                    <button type="submit"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase">
                        Add New
                    </button>
                </div>
                <div class="">
                    <input type="text" value="" name="slip_type" id="slip_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                        placeholder="" />
                </div>
            </div>
        </form>

        <div class="space-y-1">
            <div class="">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-blue-500 text-center">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3  text-center">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500 text-center">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3  text-center">
                                    Action
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
