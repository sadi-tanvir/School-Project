@extends('Backend.app')
@section('title')
    List Of Applicant
@endsection


@section('Dashboard')
    <!-- Message -->
    @include('/Message/message')

    <div class="mb-5">
        <h1>Applicant List </h1>
    </div>

    {{-- <div class="w-full text-center mb-10">
        <h1 class="text-xl font-semibold">
            Before searching for data here, ensure that you have added data from <span
                class="text-red-300 font-bold bg-red-50 px-1 rounded">Fees Setting/Fees Setup</span>
        </h1>
    </div> --}}

    <div class="w-full border mx-auto p-5 space-y-10">
        <div class="grid grid-cols-7">
            <div>
                <a href="{{ route('onlineApplicationForm.view', $school_code) }}"
                    class="col-span-2 text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase mt-5">
                    Add New
                </a>
            </div>


            <form class="col-span-6" action="" method="POST">
                @csrf
                <div class="grid grid-cols-5 items-center gap-7">
                    <div class="">
                        <label for="class"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CLASS</label>
                        <select id="class" name="class"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select</option>
                        </select>
                    </div>
                    <div class="">
                        <label for="class"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CLASS</label>
                        <select id="class" name="class"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select</option>
                        </select>
                    </div>
                    <div class="">
                        <label for="class"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CLASS</label>
                        <select id="class" name="class"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select</option>
                        </select>
                    </div>
                    <div>
                        <input type="number" value="" name="" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 w-full mt-6"
                            placeholder="" />
                    </div>

                    <div>
                        <button type="submit"
                            class="text-white bg-gradient-to-br from-blue-500 to-blue-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase mt-5">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="space-y-1">
            <div class="mt-20">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    App. ID </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Name </th>
                                <th scope="col" class="px-6 py-3 ">
                                    Class </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Father Name </th>
                                <th scope="col" class="px-6 py-3 ">
                                    Mobile </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    BG </th>
                                <th scope="col" class="px-6 py-3 ">
                                    Status </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    <div class="flex items-center justify-center space-x-2">
                                        <span>Action</span>
                                        {{-- <input id="default-checkbox" type="checkbox" value=""
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> --}}
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{-- {{ $key + 1 }} --}}
                                </td>
                                <td class="px-6 py-4">
                                    {{-- {{ $feesData->fee_type }} --}}
                                    <input type="text" class="hidden" name="" value="#">
                                </td>
                                <td class="px-6 py-4">
                                    {{-- {{ $feesData->fee_amount }} --}}
                                    <input type="text" class="hidden" name="" value="#">
                                </td>
                                <td class="px-6 py-4">
                                    <input id="status" name="" {{-- {{ $feesData->status === 'checked' && $paySlipTypeName ? 'disabled' : '' }} --}} {{-- {{ $feesData->status === 'checked' ? 'checked' : '' }}  --}}
                                        type="checkbox" value=""
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
