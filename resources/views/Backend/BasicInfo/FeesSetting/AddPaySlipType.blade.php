@extends('Backend.app')
@section('title')
    Add Pay Slip Type
@endsection


@section('Dashboard')

<style>
        /* table radius  */
        thead th:first-child {
            border-top-left-radius: 0.2rem;
            border-bottom-left-radius: 0.2rem;
        }
        thead th:last-child {
            border-top-right-radius: 0.2rem;
            border-bottom-right-radius: 0.2rem;
        } /* hover effect  */
        .btn-hover,
        .btn-hover {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }
        .btn-hover::before {
            background: #fff;
            content: '';
            height: 20rem;
            opacity: 0;
            position: absolute;
            top: -50px;
            transform: rotate(15deg);
            width: 40px;
            transition: all 3000ms cubic-bezier(0.19, 1, 0.22, 1);
        }
        .btn-hover::after {
            background: #fff;
            content: '';
            height: 20rem;
            opacity: 0;
            position: absolute;
            top: -50px;
            transform: rotate(15deg);
            transition: all 3000ms cubic-bezier(0.19, 1, 0.22, 1);
            width: 8rem;
        }
        .btn-hover__new::before {
            left: -50%;
        }

        .btn-hover__new::after {
            left: -100%;
        }

        .btn-hover__new:hover::before {
            left: 120%;
            opacity: 0.5s;
        }

        .btn-hover__new:hover::after {
            left: 200%;
            opacity: 0.6;
        }
        .btn-hover span {
            z-index: 20;
        }
    </style>

    @include('Shared.ContentHeader', ['title' => 'Add Pay Slip Type'])

    @include('Shared.alert')

    <div class="w-full border-2 rounded-md mx-auto p-6 border-gray-300 bg-gray-200/80 space-y-5">
        {{-- <form action="" method="POST"> --}}
        {{-- @csrf --}}
        <div class="flex space-x-4">
            <div class="">
            <button data-modal-target="add_pay_slip_type_modal" data-modal-toggle="add_pay_slip_type_modal" type="button"
            class="text-white bg-gradient-to-br from-blue-600  to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3.5 text-center flex items-center gap-3 w-40">
                   <span>
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z" fill="#ffffff"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0574 1.25H11.9426C9.63424 1.24999 7.82519 1.24998 6.41371 1.43975C4.96897 1.63399 3.82895 2.03933 2.93414 2.93414C2.03933 3.82895 1.63399 4.96897 1.43975 6.41371C1.24998 7.82519 1.24999 9.63422 1.25 11.9426V12.0574C1.24999 14.3658 1.24998 16.1748 1.43975 17.5863C1.63399 19.031 2.03933 20.1711 2.93414 21.0659C3.82895 21.9607 4.96897 22.366 6.41371 22.5603C7.82519 22.75 9.63423 22.75 11.9426 22.75H12.0574C14.3658 22.75 16.1748 22.75 17.5863 22.5603C19.031 22.366 20.1711 21.9607 21.0659 21.0659C21.9607 20.1711 22.366 19.031 22.5603 17.5863C22.75 16.1748 22.75 14.3658 22.75 12.0574V11.9426C22.75 9.63423 22.75 7.82519 22.5603 6.41371C22.366 4.96897 21.9607 3.82895 21.0659 2.93414C20.1711 2.03933 19.031 1.63399 17.5863 1.43975C16.1748 1.24998 14.3658 1.24999 12.0574 1.25ZM3.9948 3.9948C4.56445 3.42514 5.33517 3.09825 6.61358 2.92637C7.91356 2.75159 9.62177 2.75 12 2.75C14.3782 2.75 16.0864 2.75159 17.3864 2.92637C18.6648 3.09825 19.4355 3.42514 20.0052 3.9948C20.5749 4.56445 20.9018 5.33517 21.0736 6.61358C21.2484 7.91356 21.25 9.62177 21.25 12C21.25 14.3782 21.2484 16.0864 21.0736 17.3864C20.9018 18.6648 20.5749 19.4355 20.0052 20.0052C19.4355 20.5749 18.6648 20.9018 17.3864 21.0736C16.0864 21.2484 14.3782 21.25 12 21.25C9.62177 21.25 7.91356 21.2484 6.61358 21.0736C5.33517 20.9018 4.56445 20.5749 3.9948 20.0052C3.42514 19.4355 3.09825 18.6648 2.92637 17.3864C2.75159 16.0864 2.75 14.3782 2.75 12C2.75 9.62177 2.75159 7.91356 2.92637 6.61358C3.09825 5.33517 3.42514 4.56445 3.9948 3.9948Z" fill="#ffffff"></path> </g></svg>
                   </span>
                   <span> Add New</span>
                </button>
            </div>
            {{-- Add Fee type modal form start --}}
            <div id="add_pay_slip_type_modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-10 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow ">
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                            <h3 class="text-xl font-semibold text-gray-900">
                                New pay slip type entry form
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                data-modal-hide="add_pay_slip_type_modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        <form method="POST" action="{{ route('addPaySlipType.store', $school_code) }}"
                            class="mx-auto">
                            @csrf
                            <div class="p-4 md:p-5 space-y-4">
                                <div class="mb-5">
                                    <label for="fee_type_name"
                                        class="block mb-2 text-sm font-medium text-gray-900">
                                        Pay Slip Type Name :
                                    </label>
                                    <input type="text" id="pay_slip_type_name" name="pay_slip_type_name"
                                        value="{{ old('pay_slip_type_name') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                                        placeholder="" />
                                    @if ($errors->has('pay_slip_type_name'))
                                        <span class="text-red-500">{{ $errors->first('pay_slip_type_name') }}</span>
                                    @endif
                                </div>
                                <div class="flex items-start mb-5">
                                    <div class="flex items-center h-5">
                                        <input id="status" name="status" type="checkbox" value="true" checked
                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" />
                                    </div>
                                    <label for="status"
                                        class="ms-2 text-sm font-medium text-gray-900">Active
                                        Status</label>
                                </div>
                            </div>

                            <div
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save</button>
                                <button data-modal-hide="add_pay_slip_type_modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-red-100 ">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Add Fee type modal form end --}}
            {{-- search box --}}
            <form id="searchForm" method="GET" class="grow w-full" action="{{ route('addPaySlipType.view', $school_code) }}">
                <input type="text" value="{{ request('search_types') }}" name="search_types" id="search_types"
                    class="bg-white border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5"
                    placeholder="Search..." />
            </form>
        </div>
        {{-- </form> --}}

        <div class="space-y-1">
            <div class="mt-10">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-white  bg-blue-600 ">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center bg-blue-500">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Fee Type Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-center bg-blue-500">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allPaySlipTypes as $key => $slipType)
                                <tr
                                    class="border-b">
                                    <td class="px-6 py-4 text-center">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $slipType->pay_slip_type_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $slipType->status }}
                                    </td>
                                    <td class="px-6 py-4 flex justify-center items-center space-x-5">
                                        {{-- Delete  pay slip type --}}
                                        <form method="POST"
                                            action="{{ route('PaySlipType.delete', ['schoolCode' => $school_code, 'id' => $slipType->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-1 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>

                                        {{-- Update Fee Type --}}
                                        <div class="mb-3">
                                            <svg data-modal-target="update_fee_type_modal_{{ $slipType->id }}"
                                                data-modal-toggle="update_fee_type_modal_{{ $slipType->id }}"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>

                                            {{-- Update Pay Slip type modal form start --}}
                                            <div id="update_fee_type_modal_{{ $slipType->id }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-10 w-full max-w-2xl max-h-full">
                                                    <div class="relative bg-white rounded-lg shadow ">
                                                        <div
                                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                                                            <h3
                                                                class="text-xl font-semibold text-gray-900">
                                                                Update Fee Type of <span
                                                                    class="text-blue-500 font-semibold">{{ $slipType->fee_type_name }}</span>
                                                            </h3>
                                                            <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                                                data-modal-hide="update_fee_type_modal_{{ $slipType->id }}">
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
                                                            action="{{ route('PaySlipType.update', ['schoolCode' => $school_code, 'id' => $slipType->id]) }}"
                                                            class=" mx-auto">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="p-4 md:p-5 space-y-4">

                                                                <div class="mb-5">
                                                                    <label for="pay_slip_type_name"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">pay
                                                                        slip type name</label>
                                                                    <input type="text" id="pay_slip_type_name"
                                                                        name="pay_slip_type_name"
                                                                        value="{{ $slipType->pay_slip_type_name }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                                                                        placeholder="" />
                                                                    @if ($errors->has('pay_slip_type_name'))
                                                                        <span
                                                                            class="text-red-500">{{ $errors->first('pay_slip_type_name') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="flex items-start mb-5">
                                                                    <div class="flex items-center h-5">
                                                                        <input id="status" name="status"
                                                                            type="checkbox"
                                                                            value="{{ $slipType->status }}"
                                                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                                                                            {{ $slipType->status == 'active' ? 'checked' : '' }} />
                                                                    </div>
                                                                    <label for="status"
                                                                        class="ms-2 text-sm font-medium text-gray-900">Active
                                                                        Status</label>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                                                                <button type="submit"
                                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update</button>
                                                                <button
                                                                    data-modal-hide="update_fee_type_modal_{{ $slipType->id }}"
                                                                    type="button"
                                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-red-100 ">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Update Pay Slip type modal form end --}}
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

        // If the search term is empty, don't submit the form
        // if (searchTerm.trim() === '') {
        // return;
        // }

        document.getElementById('searchForm').submit();
    }

    var typingTimer;

    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById('search_types');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                // Clear the existing timer
                clearTimeout(typingTimer);
                // Start a new timer after 2 seconds
                typingTimer = setTimeout(handleFormSubmit, 1200);
            });
        }
    });
</script>
