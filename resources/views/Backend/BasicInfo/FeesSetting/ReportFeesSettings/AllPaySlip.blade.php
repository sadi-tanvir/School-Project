@extends('Backend.app')
@section('title')
    All Pay Slip
@endsection
@section('Dashboard')
    @include('/Message/message')
    <style>
        .shadowStyle {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }
    </style>
    <div class=" mt-10 space-y-10">
        <div class="w-full text-center">
            <h1 class="text-xl font-semibold">
                Before searching for data here, ensure that you have added data from <span class="text-red-300 font-bold bg-red-50 px-1 rounded">Fees Setting/Pay
                    Slip Setup</span>
            </h1>
        </div>
        <form action="{{ route('allPaySlip.print', $school_code) }}"
            class="p-5 shadowStyle rounded-[8px] border border-slate-300 w-2/5 mx-auto space-y-3">
            <div class="space-y-3">
                <div class="grid grid-cols-4 place-items-start  gap-5">
                    <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class
                        :</label>
                    <select id="class" name="class"
                        class="col-span-3 bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                        <option disabled selected>Select Class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-4 place-items-start  gap-5">
                    <label for="group" class="block mb-2 text-sm font-medium whitespace-noWrap">Group:</label>
                    <select id="group" name="group"
                        class="col-span-3 bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                        <option disabled selected>Select </option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->group_name }}">{{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="w-full flex justify-end">
                <button type="submit"
                    class="w-1/3  text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">Print
                </button>
            </div>
        </form>
    </div>
@endsection
