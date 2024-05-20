@extends('Backend.app')
@section('title')
    Journal Book
@endsection


@section('Dashboard')
    <div class="w-full mx-auto p-5 space-y-10">
        {{-- first section --}}
        <div>
            <h1 class="">Journal Flow Voucher Report<h1>
        </div>

        <div class="w-3/5 mx-auto">
            <form action="{{ url('') }}" method="POST">
                @csrf
                <div class="flex flex-col justify-center space-y-3 border p-5">
                    <div class="grid grid-cols-2">
                        <div class="p-6 px-2 space-x-3 grid grid-cols-4">
                            <div class="">
                                <h1 class="text-xl font-semibold">Date From:</h1>
                            </div>
                            <div class="flex justify-between space-x-5 col-span-3">
                                <input type="date" value="" name="" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                    placeholder="" />
                            </div>
                        </div>

                        <div class="p-6 px-2 space-x-3 grid grid-cols-4">
                            <div class="">
                                <h1 class="text-xl font-semibold">To:</h1>
                            </div>
                            <div class="flex justify-between space-x-5 col-span-3">
                                <input type="date" value="" name="" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                    placeholder="" />
                            </div>
                        </div>
                    </div>
                    <button type="button"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center mx-auto">
                        Print
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
