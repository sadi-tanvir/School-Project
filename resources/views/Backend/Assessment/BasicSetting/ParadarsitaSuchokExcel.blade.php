@extends('Backend.app')
@section('title')
    Paradarsita Suchok Excel
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
                            <label for="excel_file" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">এক্সেল ফাইল :</label>

                            <input
                                class="col-span-3 w-5/6 block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="excel_file" type="file">

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="w-full flex justify-center items-center gap-5">
                <button type="button"
                    class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-28 py-2.5 text-center">
                    Blank Excel Download
                </button>
                <button type="button"
                    class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-28 py-2.5 text-center">
                    Save
                </button>
        </div>
    </div>
@endsection
