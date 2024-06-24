@extends('Backend.app')
@section('title')
    Pay Slip Setup
@endsection


@section('Dashboard')
    <!-- Message -->
    @include('Shared.alert')

    <style>
        /* table radius  */
        thead th:first-child {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }
        thead th:last-child {
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
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

    @include('Shared.ContentHeader', ['title' => 'Pay Slip Setup'])


    <div class="text-center mb-10">
        <div class="text-xs font-semibold   py-2.5 px-6 rounded-md flex items-center justify-center flex-shrink gap-3">
            <span>
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z" fill="#000000"></path> </g></svg>
            </span>
        <span>
            Before searching for data here, ensure that you have added data from <span class="text-red-700 ">Fees Setting/Add Fee Type</span>
        </span>
        </div>
    </div>

    <div class="w-full border-2 rounded-md bg-gray-200 border-gray-300 mx-auto p-6 space-y-10">
        <form action="{{ route('paySlipSetup.getData', $school_code) }}" method="POST">
            @csrf
            <div class="grid grid-cols-5 items-center gap-7">
                <div class="">
                    <label for="class_to" class="block mb-2 text-sm font-medium text-gray-900">Class
                        To</label>
                    <select id="class_to" name="class_to"
                        class="bg-white py-3.5 px-2 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 ">
                        <option selected>Select</option>
                        @foreach ($classes as $class)
                            <option {{ $class->class_name == $classTo ? 'selected' : '' }} value="{{ $class->class_name }}">
                                {{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <label for="class_from" class="block mb-2 text-sm font-medium text-gray-900">Class
                        From</label>
                    <select id="class_from" name="class_from"
                        class="bg-white py-3.5 px-2 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 ">
                        <option selected>Select</option>
                        @foreach ($classes as $class)
                            <option {{ $class->class_name == $classFrom ? 'selected' : '' }}
                                value="{{ $class->class_name }}">
                                {{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <label for="pay_slip_type" class="block mb-2 text-sm font-medium text-gray-900">Pay Slip
                        Type:</label>
                    <select id="pay_slip_type" name="pay_slip_type"
                        class="bg-white py-3.5 px-2 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 ">
                        <option selected>Select</option>
                        @foreach ($paySlipTypes as $paySlipType)
                            <option {{ $paySlipType->pay_slip_type_name == $paySlipTypeName ? 'selected' : '' }}
                                value="{{ $paySlipType->pay_slip_type_name }}">{{ $paySlipType->pay_slip_type_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <label for="group" class="block mb-2 text-sm font-medium text-gray-900">Group
                        :</label>
                    <select id="group" name="group"
                        class="bg-white py-3.5 px-2 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 ">
                        @foreach ($groups as $group)
                            <option {{ $group->group_name == 'N/A' ? 'selected' : '' }} value="{{ $group->group_name }}">
                                {{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-7 py-3.5 text-center  mt-7">
                        Get Data
                    </button>
                </div>
            </div>
        </form>

        <div class="space-y-1">
            <div class="text-center">
                <h1 class="py-2.5 text-lg">Class wise pay slip setup list </h1>
            </div>
            <div class="">
                <form method="POST" action="{{ route('paySlipSetup.store', $school_code) }}">
                    @csrf
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class="text-xs text-white  bg-blue-600 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        SL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Type Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center justify-center space-x-2">
                                            <span>Status</span>
                                            {{-- <input id="default-checkbox" type="checkbox" value=""
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"> --}}
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($feesTypes)
                                    @foreach ($feesTypes as $key => $feeType)
                                        <tr
                                            class=" border-b">
                                            <td class="px-6 py-4">
                                                {{ $key + 1 }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $feeType->fee_type_name }}
                                                <input type="text" class="hidden" name="fee_type_name[]"
                                                    value="{{ $feeType->fee_type_name }}">
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ isset($fees_amounts[$feeType->fee_type_name]) ? $fees_amounts[$feeType->fee_type_name] : 0 }}
                                                <input type="text" class="hidden"
                                                    name="fee_amount[{{ $feeType->fee_type_name }}]"
                                                    value="{{ isset($fees_amounts[$feeType->fee_type_name]) ? $fees_amounts[$feeType->fee_type_name] : 0 }}">
                                            </td>
                                            <td class="px-6 py-4">
                                                <input id="status" name="status[{{ $feeType->fee_type_name }}]"
                                                    {{ isset($PaySlipData[$feeType->fee_type_name]) ? 'checked' : '' }}
                                                    type="checkbox" value="selected"
                                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" />
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>


                    <input type="text" class="hidden" name="fees_data_class" value="{{ $classTo }}">
                    <input type="text" class="hidden" name="fees_data_group" value="{{ $groupName }}">
                    <input type="text" class="hidden" name="pay_slip_type_name" value="{{ $paySlipTypeName }}">
                    <div class="w-full flex justify-end items-center gap-10 mt-20">
                        <button type="submit"
                            class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-20 py-3.5 text-center">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
        let totalAmount = document.getElementById('totalAmount');
        var fees_amounts = {!! json_encode($fees_amounts) !!};
        let total = {!! json_encode($TotalPaySlipAmount) !!};
        const rowCheckboxes = document.querySelectorAll('input[name^="status"]');
        rowCheckboxes.forEach(element => {
            element.addEventListener('change', (e) => {
                var checkboxName = e.target.name;
                var extractedName = checkboxName.match(/\[(.*?)\]/)[1];
                if (e.target.checked) {
                    total = parseInt(fees_amounts[extractedName]) + total;
                    totalAmount.innerText = total;
                } else {
                    total = total - parseInt(fees_amounts[extractedName]);
                    totalAmount.innerText = total;
                }
            })
        });
    });
</script>
