@extends('Backend.app')
@section('title')
Donation Collection
@endsection
@section('Dashboard')
    <div>
        <h3>
        Donation Collection
        </h3>
    </div>

    <div class="mt-10">
        <div class="md:mx-52 border-2 p-10">
            <form action="">
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="" class="block mb-2 text-lg font-medium text-gray-900  ">Voucher Date :
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
                        <input datepicker datepicker-autohide type="text" name="birth_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5   "
                            placeholder="Select date">

                    </div>
                
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="" class="block mb-2 text-lg font-medium text-gray-900 ">Voucher Number :
                    </label>
                </div>
                <div class="">
                   <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="" class="block mb-2 text-lg font-medium text-gray-900 "> Name :
                    </label>
                </div>
                <div class="">
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
            </div>
           
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900 ">Mobile  : 
                    </label>
                </div>
                <div class="">
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="" class="block mb-2 text-lg font-medium text-gray-900 ">Village  : 
                    </label>
                </div>
                <div class="">
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900 ">Division :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="division"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>select</option>
                    <option >x</option>
                    <option >y</option>
                    <option >z</option>
                </select>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900 ">District :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="district"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Select</option>
                        <option >x</option>
                        <option >y</option>
                        <option >z</option>
                    </select>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900 ">Thana :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="thana"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Select</option>
                        <option >x</option>
                        <option >y</option>
                        <option >z</option>
                    </select>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="" class="block mb-2 text-lg font-medium text-gray-900 ">Donation Type :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="donation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Select</option>
                        <option >x</option>
                        <option >y</option>
                        <option >z</option>
                    </select>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="" class="block mb-2 text-lg font-medium text-gray-900 ">Amount  : 
                    </label>
                </div>
                <div class="">
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
            </div>
           

            <div class=" flex justify-end">
                <button type="submit"
                class="mr-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Edit</button>
                <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Save</button>
            </div>
        </form>
        </div>
    </div>

@endsection