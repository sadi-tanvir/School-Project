@extends('Backend.app')
@section('title')
Signature
@endsection
@section('Dashboard')
@include('Message.message')
<div class="">
    <h3>
        Exam Report Name By Signature Setup
    </h3>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
    <form action="{{ route('get.signature.data', $school_code) }}" method="POST">
        @csrf
        <div class="md:flex my-10 ">
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Report NAME
                    :</label>
            </div>
            <div class="mr-10">
                <select name="report_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Select</option>
                    @foreach ($reports as $report)
                        <option value="{{ $report->report_name }}">{{ $report->report_name }}</option>`
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">GET
                    DATA
                </button>
            </div>

        </div>
    </form>

    <div class="text-lg ">
        <div class="flex justify-center mb-5 text font-bold">
            <h3>
                REPORT NAME WISE SIGNATURE SETTING
            </h3>
        </div>
        <form id="dataForm" method="POST" action="{{ route('store.signature', $school_code) }}">
            @csrf

            <table id="data" class="w-full text-sm text-center rtl:text-right text-black">
                <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-blue-500">SL</th>
                        <th scope="col" class="px-6 py-3">SIGNATURE NAME</th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">POSITION</th>
                        <th scope="col" class="px-6 py-3">STATUS</th>
                    </tr>
                </thead>
                @if ($reportName !== null)
                    <tbody id="dataBody">
                        @foreach ($signatures as $key => $signature)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <input class="hidden" name="reportName" value="{{ $reportName }}" type="text">
                                <input class="hidden" name="signatureName[]" value="{{ $signature->sign }}" type="text">
                                <td>{{ $signature->sign }}</td>
                                <td>
                                    <select name="positions[{{ $key }}]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option disabled selected>Select</option>
                                        <option value="left">Left</option>
                                        <option value="center">Center</option>
                                        <option value="right">Right</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="">
                                        <input id="laravel-checkbox-{{ $key }}" type="checkbox" value="active"
                                            name="status[{{ $key }}]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                @endif
            </table>
            <div class="md:flex justify-center my-10">
                <div class="mr-10">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">Save</button>

                </div>
                <div class="mr-10">
                    <button type="button"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Close</button>
                </div>
            </div>
        </form>


    </div>

</div>
@endsection