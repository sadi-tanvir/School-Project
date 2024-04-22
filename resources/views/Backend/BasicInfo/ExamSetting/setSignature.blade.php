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
        <form action="{{ route('view.signature', $school_code) }}" method="GET">
            @csrf
            <div class="md:flex my-10 ">
                <div class="mr-5">
                    <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Report NAME
                        :</label>
                </div>
                <div class="mr-10">
                    <select id="countries" name="report_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        @if($selectedReport === null)
                    <option disabled selected>Choose a report</option>
                    @elseif($selectedReport )
                    <option disabled selected>{{$selectedReport}}</option>
                    @endif
                        @foreach ($reports as $report)
                            <option value="{{ $report->report_name }}">{{ $report->report_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit" id="getDataButton"
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
                <table id="data" class="w-full text-sm text-left rtl:text-right text-black">
                    <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-blue-500">SL</th>
                            <th scope="col" class="px-6 py-3">SIGNATURE NAME</th>
                            <th scope="col" class="px-6 py-3 bg-blue-500">POSITION</th>
                            <th scope="col" class="px-6 py-3">STATUS</th>
                        </tr>
                    </thead>
                    <tbody id="dataBody">
                        @if (isset($selectedReport))
                            @foreach ([1, 2, 3] as $index)
                                <tr>
                                    <td>{{ $index }}</td>
                                    <input type="hidden" name="report_name" value="{{ $selectedReport }}">
                                    <input type="hidden" name="signature_name[]" value="{{ $index === 1 ? 'Class Teacher' : ($index === 2 ? 'Guardian' : 'Headmaster') }}">
                                    <td>{{ $index === 1 ? 'Class Teacher' : ($index === 2 ? 'Guardian' : 'Headmaster') }}</td>
                                    <td>
                                        <select name="positions[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option selected>Select</option>
                                            <option value="left">Left</option>
                                            <option value="center">Center</option>
                                            <option value="right">Right</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="status[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option selected value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="md:flex justify-center my-10">
                    <div class="mr-10">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">Save</button>
                    </div>
                    <div class="mr-10">
                        <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Close</button>
                    </div>
                </div>
            </form>
            

        </div>

    </div>
@endsection
