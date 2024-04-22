@extends('Backend.app')
@section('title')
    Religion Wise Student Information
@endsection



@section('Dashboard')
    @include('Message.message')
    <div class="py-5">
        <h3 class="text-xl font-bold text-center ">
            Religion Wise Student Information
        </h3>
    </div>
    <div class="">
        <div class="md:mx-52 border-2 p-10 bg-blue-950">
            <form action="" method="" enctype="multipart/form-data">
                @csrf
                <div class="grid md:grid-cols-3 mb-5 ">
                    <div class=" ">
                        <label for="last_name" class="block mb-2 text-lg font-medium text-white ">CLASS :
                        </label>
                    </div>
                    <div class="">
                        <select id="countries" name="Class_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:border-blue-500 block w-full p-2.5 ">
                            <option>Choose a class</option>
                            <option>one</option>
                            <option>two</option>
                        </select>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 mb-5">
                    <div class=" ">
                        <label for="last_name" class="block mb-2 text-lg font-medium text-white ">Section
                        </label>
                    </div>
                    <div class="">
                        <select id="countries" name="id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose student Section</option>
                            <option>01</option>
                        </select>
                    </div>
                </div>
                <div class="grid md:grid-cols-3 mb-5">
                    <div class=" ">
                        <label for="last_name" class="block mb-2 text-lg font-medium text-white ">Group
                        </label>
                    </div>
                    <div class="">
                        <select id="countries" name="id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose student Group</option>
                            <option>01</option>
                        </select>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 mb-5">
                    <div class=" ">
                        <label for="last_name" class="block mb-2 text-lg font-medium text-white ">Religion
                        </label>
                    </div>
                    <div class="">
                        <select id="countries" name="id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose student Religion</option>
                            <option>01</option>
                        </select>
                    </div>
                </div>
                <div class="grid md:grid-cols-3 mb-5">
                    <div class=" ">
                        <label for="last_name" class="block mb-2 text-lg font-medium text-white ">Academic Year
                        </label>
                    </div>
                    <div class="">
                        <select id="countries" name="id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Select Year</option>
                            <option>01</option>
                        </select>
                    </div>
                </div>

                <div class=" flex justify-end">
                    <button type="submit"
                        class="text-white bg-rose-600 hover:bg-rose-800 focus:ring-0 focus:outline-none F font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Print</button>
                </div>
            </form>
        </div>
    </div>
@endsection
