@extends('Backend.app')
@section('title')
    Transfer Certificae List
@endsection



@section('Dashboard')
    @include('Message.message')
    <div class="py-5">
        <h3 class="text-xl font-bold text-center ">
            Transfer Certificae List
        </h3>
    </div>
    <div class="">
        <div class="md:mx-52 border-2 p-10 bg-blue-950">
            <form action="" method="" enctype="multipart/form-data">
                @csrf

                <div class="grid md:grid-cols-3 mb-5">
                    <div class=" ">
                        <label for="last_name" class="block mb-2 text-lg font-medium text-white "> From Date
                        </label>
                    </div>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" name="from_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5      "
                            placeholder="Select date">
                    </div>
                </div>

                <div class="grid md:grid-cols-3 mb-5">
                    <div class=" ">
                        <label for="last_name" class="block mb-2 text-lg font-medium text-white "> TO
                        </label>
                    </div>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" name="from_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5      "
                            placeholder="Select date">
                    </div>
                </div>
                
                <div class="grid md:grid-cols-3 mb-5">
                    <div class=" ">
                        <label for="last_name" class="block mb-2 text-lg font-medium text-white ">Class
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
