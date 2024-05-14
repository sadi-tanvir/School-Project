@extends('Backend.app')
@section('title')
    Accounts Voucher
@endsection


@section('Dashboard')
    <div class="w-full mx-auto p-5 space-y-10">
        {{-- first section --}}
        <div>
            <h1 class="">Accounting Voucher Report</h1>
        </div>

        <div class="w-3/5 mx-auto">
            <form action="{{ url('') }}" method="POST">
                @csrf
                <div class="flex flex-col justify-center space-y-3 border p-5">
                    <div class="p-6 px-2 space-x-3 grid grid-cols-4">
                        <div class="">
                            <h1 class="text-xl font-semibold">VOUCHER NO.</h1>
                        </div>
                        <div class="flex justify-between space-x-5 col-span-3">
                            <input type="date" value="" name="" id=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" />
                            <select id="group" name="group"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                            <input type="number" value="" name="" id=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1"
                                placeholder="" />
                        </div>
                    </div>
                    <button type="button"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center mx-auto">
                        Find
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection
