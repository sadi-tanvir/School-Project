@extends('Backend.app')
@section('title')
    Paradarsita Suchok
@endsection


@section('Dashboard')
    <div class="w-full mx-auto p-5 space-y-10">
        <div>
            <h1 class="text-xl font-semibold">পারদর্শিতার সূচক গঠন</h1>
        </div>

        {{-- first section --}}
        <div class="grid grid-cols-2">
            <div class="">
                <form action="{{ url('') }}" method="POST">
                    @csrf
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="class" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">শ্রেণি:</label>
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
                            <label for="class" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">বিভাগ:</label>
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

                            <label for="message"
                                class="block text-sm font-medium text-gray-900 dark:text-white ml-auto ">পারদর্শিতা সূচক নাম
                                :</label>
                            <textarea id="message" rows="4"
                                class="col-span-3 block p-2.5 w-5/6 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write your thoughts here..."></textarea>
                        </div>
                    </div>
                </form>
            </div>


            {{-- left section --}}
            <div class="">
                <form action="{{ url('') }}" method="POST">
                    @csrf
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="class" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">বিষয়:</label>
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
                            <label for="bill_challan_no" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">পারদর্শিতা
                                সূচক মান :</label>
                            <input type="number" value="" name="bill_challan_no" id="bill_challan_no"
                                class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="w-full space-y-5">
            <form class="flex justify-around items-center gap-10" action="">
                <textarea id="message" rows="4"
                    class="col-span-3 block p-2.5 w-5/6 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..."></textarea>
                <textarea id="message" rows="4"
                    class="col-span-3 block p-2.5 w-5/6 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..."></textarea>
                <textarea id="message" rows="4"
                    class="col-span-3 block p-2.5 w-5/6 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..."></textarea>
            </form>
            <div class="w-full flex justify-center items-center">
                <button type="button"
                    class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-28 py-2.5 text-center">
                    Save
                </button>
            </div>
        </div>

    </div>
@endsection
