@extends('Backend.app')
@section('title')
    Add Fee Type
@endsection


@section('Dashboard')
    <div class="mb-2">
        <h1>Add Fees Type</h1>
    </div>

    {{-- alert message --}}
    @include('Shared.alert')

    <div class="w-full border mx-auto p-5 space-y-10">
        <div class="w-full flex justify-between items-center">
            <div class="flex space-x-20">
                <button data-modal-target="add_fee_type_modal" data-modal-toggle="add_fee_type_modal" type="button"
                    class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center uppercase">
                    Add New
                </button>

                {{-- Add Fee type modal form start --}}
                <div id="add_fee_type_modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    NEW FEE TYPE ENTRY FORM
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="add_fee_type_modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            <form method="POST" action="{{ route('addFeeType.store', $schoolCode) }}"
                                class="max-w-lg mx-auto">
                                @csrf
                                <div class="p-4 md:p-5 space-y-4">

                                    <div class="mb-5">
                                        <label for="fee_type_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fee
                                            Type Name</label>
                                        <input type="text" id="fee_type_name" name="fee_type_name"
                                            value="{{ old('fee_type_name') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="" />
                                        @if ($errors->has('fee_type_name'))
                                            <span class="text-red-500">{{ $errors->first('fee_type_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-5">
                                        <label for="position"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                                        <input type="number" id="position" name="position" value="{{ old('position') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                        @if ($errors->has('position'))
                                            <span class="text-red-500">{{ $errors->first('position') }}</span>
                                        @endif
                                    </div>
                                    <div class="flex items-start mb-5">
                                        <div class="flex items-center h-5">
                                            <input id="status" name="status" type="checkbox" value="true" checked
                                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                                        </div>
                                        <label for="status"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active
                                            Status</label>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                                    <button data-modal-hide="add_fee_type_modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-red-100 ">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Add Fee type modal form end --}}

                {{-- search box --}}
                <form id="searchForm" method="GET" action="{{ route('addFeeType.view', $schoolCode) }}">
                    <input type="text" value="{{ request('search_types') }}" name="search_types" id="search_types"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-96"
                        placeholder="Search..." />
                </form>


            </div>
            <a href="{{ route('addFeeType.print', $schoolCode) }}" target="_blank"
                class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 text-center uppercase">
                Print
            </a>
        </div>

        <div class="space-y-1">
            <div class="mt-20">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fee Type Name
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Position
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feeTypes as $key => $feeType)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $key + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $feeType->fee_type_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $feeType->position }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $feeType->status }}
                                    </td>
                                    <td class="px-6 py-4 flex justify-center items-center space-x-5">
                                        {{-- Delete  Fee Type --}}
                                        <form method="POST"
                                            action="/dashboard/basicSettings/feesSettings/addFeeType/{{ $schoolCode }}/{{ $feeType->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-1 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6 text-red-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>

                                        {{-- Update Fee Type --}}
                                        <div class="mb-3">
                                            <svg data-modal-target="update_fee_type_modal_{{ $feeType->id }}"
                                                data-modal-toggle="update_fee_type_modal_{{ $feeType->id }}"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>

                                            {{-- Update Fee type modal form start --}}
                                            <div id="update_fee_type_modal_{{ $feeType->id }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <div
                                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3
                                                                class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                Update Fee Type of <span
                                                                    class="text-blue-500 font-semibold">{{ $feeType->fee_type_name }}</span>
                                                            </h3>
                                                            <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="update_fee_type_modal_{{ $feeType->id }}">
                                                                <svg class="w-3 h-3" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>

                                                        <form method="POST"
                                                            action="/dashboard/basicSettings/feesSettings/addFeeType/{{ $schoolCode }}/{{ $feeType->id }}"
                                                            class="max-w-lg mx-auto">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="p-4 md:p-5 space-y-4">

                                                                <div class="mb-5">
                                                                    <label for="fee_type_name"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fee
                                                                        Type Name</label>
                                                                    <input type="text" id="fee_type_name"
                                                                        name="fee_type_name"
                                                                        value="{{ $feeType->fee_type_name }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        placeholder="" />
                                                                    @if ($errors->has('fee_type_name'))
                                                                        <span
                                                                            class="text-red-500">{{ $errors->first('fee_type_name') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="mb-5">
                                                                    <label for="position"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                                                                    <input type="number" id="position" name="position"
                                                                        value="{{ $feeType->position }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                                    @if ($errors->has('position'))
                                                                        <span
                                                                            class="text-red-500">{{ $errors->first('position') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="flex items-start mb-5">
                                                                    <div class="flex items-center h-5">
                                                                        <input id="status" name="status"
                                                                            type="checkbox"
                                                                            value="{{ $feeType->status }}"
                                                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                                                            {{ $feeType->status == 'active' ? 'checked' : '' }} />
                                                                    </div>
                                                                    <label for="status"
                                                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active
                                                                        Status</label>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                <button type="submit"
                                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                                                <button
                                                                    data-modal-hide="update_fee_type_modal_{{ $feeType->id }}"
                                                                    type="button"
                                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-red-100 ">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Update Fee type modal form end --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function handleFormSubmit() {
        var searchTerm = document.getElementById('search_types').value;
        document.getElementById('searchForm').submit();
    }

    var typingTimer;

    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById('search_types');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(handleFormSubmit, 1200);
            });
        }
    });
</script>
