@extends('Backend.app')
@section('title')
    Waiver Setup
@endsection


@section('Dashboard')

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

    @include('Shared.ContentHeader', ['title' => 'Discount Setup'])


    <!-- Message -->
    @include('/Message/message')

    <div class="w-full border-2 border-gray-300 bg-gray-200 mx-auto p-6 rounded-md space-y-10">
        {{-- top section --}}


        <div class="grid grid-cols-2 items-center gap-5">
            <form class="grid grid-cols-3 gap-5" id="waiver_setup_form" action="{{ route('GetStudent.data', $school_code) }}"
                method="GET">
                <div class="">
                    <label for="class" class="block mb-2 text-sm font-medium text-gray-900 ">Class:</label>
                    <select id="class" onchange="onClassChange()" name="class"
                        class="bg-white border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5">
                        <option selected>Select</option>
                        @foreach ($classes as $class)
                            <option {{ $sessionClass === $class->class_name ? 'selected' : '' }}
                                value="{{ $class->class_name }}">
                                {{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <label for="group"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Group:</label>
                    <select id="group" onchange="onGroupChange()" name="group"
                        class="bg-white border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5">
                        <option selected>Select</option>
                        @foreach ($groups as $group)
                            <option
                                {{ (isset($sessionGroup) ? ($sessionGroup === $group->group_name ? 'selected' : '') : $group->group_name === 'N/A') ? 'selected' : '' }}
                                value="{{ $group->group_name }}">{{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <label for="section"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Section:</label>
                    <select id="section" onchange="onSectionChange()" name="section"
                        class="bg-white border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5">
                        <option selected>Select</option>
                        @foreach ($sections as $section)
                            <option {{ $sessionSection === $section->section_name ? 'selected' : '' }}
                                value="{{ $section->section_name }}">{{ $section->section_name }}</option>
                        @endforeach
                    </select>
                </div>

            </form>

            <form id="waiver_setup_Get" class="grid grid-cols-3 gap-5"
                action="{{ route('waiverSetup.getData', $school_code) }}" method="GET">
                @csrf
                <div class="">
                    <label for="waiver_type" class="block mb-2 text-sm font-medium text-gray-900 ">Waiver
                        Type:</label>
                    <select id="waiver_type" name="waiver_type"
                        class="bg-white border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5">
                        <option selected>Select</option>
                        @foreach ($waiverTypes as $waiverType)
                            <option {{ $sessionWaiver_type === $waiverType->waiver_type_name ? 'selected' : '' }}
                                value="{{ $waiverType->waiver_type_name }}">{{ $waiverType->waiver_type_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <label for="percentage" class="block mb-2 text-sm font-medium text-gray-900 ">Percentage
                        %:</label>
                    <input type="number" value="{{ isset($sessionPercentage) ? $sessionPercentage : '' }}"
                        name="percentage" id="percentage"
                        class="bg-white border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-3.5"
        3.5             placeholder="" />
                </div>

                <div>
                    <button onclick="GetData()" type="submit"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-7 py-3.5 text-center capitalize mt-7">
                        get data
                    </button>
                </div>
                <input class="hidden" name="selected_class" type="text" value="{{ $sessionGroup }}">
                <input class="hidden" name="selected_group" type="text" value="{{ $sessionClass }}">
                <input class="hidden" name="selected_section" type="text" value="{{ $sessionSection }}">
            </form>
        </div>

        {{-- middle section --}}
        <div class="space-y-1">
            <form method="POST" action="{{ route('studentListWaiverSetup.store', $school_code) }}">
                @csrf

                <div class="grid grid-cols-2 gap-5">
                    {{-- Fees Table --}}
                    <div>
                        <div class="text-center rounded-lg">
                            <h1 class="py-3 text-lg">Student wise waiver setup list</h1>
                        </div>
                        <div class="relative overflow-x-auto ">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                                <thead class="text-xs text-white  bg-blue-600 ">
                                    <tr class="text-center">
                                        <th scope="col" class="px-6 py-3">
                                            <input id="waiver_header_checkbox" type="checkbox" value=""
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            TYPE NAME
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            FEES AMOUNT
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            WAIVER AMOUNT
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($sessionAllFees)
                                        @foreach ($sessionAllFees as $fee)
                                            <tr
                                                class="border-b border-gray-300 last:border-gray-200 text-center">
                                                <th scope="row"
                                                    class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    <div class="mx-auto">
                                                        <input id="" type="checkbox" value="selected"
                                                            name="fees_select[{{ $fee->id }}]"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                                                    </div>
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $fee->fee_type }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $fee->fee_amount }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <input type="number"
                                                        value="{{ $sessionPercentageAmounts[$fee->id] }}"
                                                        name="waiver_amount[{{ $fee->id }}]">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- stutdent table --}}
                    <div>
                        <div class="text-center rounded-lg">
                            <h1 class="py-3 text-lg">Class wise pay slip setup list </h1>
                        </div>
                        <div class="relative overflow-x-auto ">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                                <thead
                                    class="text-xs text-white  bg-blue-600 ">
                                    <tr class="text-center">
                                        <th scope="col" class="px-6 py-3 ">
                                            <input id="student_header_checkbox" type="checkbox" value=""
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            SL
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            NAME
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            Student ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Roll
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($sessionStudents)
                                        @foreach ($sessionStudents as $key => $student)
                                            <tr
                                                class="border-b border-gray-300 last:border-gray-200 text-center">
                                                <th scope="row"
                                                    class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    <div class="mx-auto">
                                                        <input id="" type="checkbox" value="selected"
                                                            name="student_select[{{ $student->id }}]"
                                                            class="w-4 h-4 ml-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                                                    </div>
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $key + 1 }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $student->name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $student->student_id }}
                                                    <input type="text" class="hidden" value="{{ $student->id }}"
                                                        name="student_id[{{ $student->id }}]">
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $student->student_roll }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <input type="text" class="hidden" value="{{ $sessionClass }}" name="student_class">
                <input type="text" class="hidden" value="{{ $sessionGroup }}" name="student_group">
                <input type="text" class="hidden" value="{{ $sessionSection }}" name="student_section">
                <input type="text" class="hidden" value="{{ $sessionWaiver_type }}" name="waiver_type_name">

                {{-- bottom section --}}
                <div class="">
                    <div class="w-full flex justify-center items-center gap-20 mt-20">
                        <div class="flex items-center space-x-2 ">
                            <h3>Waiver Expire DATE: </h3>
                            <input type="date" name="waiver_expire_date" id="waiver_expire_date"
                                class="bg-white border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-3.5"
                            value="<?php echo date('Y-m-d'); ?>" />
                        </div>
                        <button type="submit"
                            class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-20 py-3.5 text-center">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


<script>
    // for waiver table
    document.addEventListener("DOMContentLoaded", function() {
        const headerCheckbox = document.getElementById('waiver_header_checkbox');
        const rowCheckboxes = document.querySelectorAll('input[name^="fees_select"]');
        headerCheckbox.addEventListener('change', function() {
            rowCheckboxes.forEach(function(checkbox) {
                checkbox.checked = headerCheckbox.checked;
            });
        });
    });

    // for student table
    document.addEventListener("DOMContentLoaded", function() {
        const headerCheckbox = document.getElementById('student_header_checkbox');
        const rowCheckboxes = document.querySelectorAll('input[name^="student_select"]');
        headerCheckbox.addEventListener('change', function() {
            rowCheckboxes.forEach(function(checkbox) {
                checkbox.checked = headerCheckbox.checked;
            });
        });
    });
</script>

<script>
    function submitForm() {
        document.getElementById("waiver_setup_form").submit();
    }

    // function submitFormAll() {
    //     document.getElementById("waiver_setup_form").submit();
    //     document.getElementById("waiver_setup_Get").submit();
    // }

    function onClassChange() {
        submitForm();
    }

    function onGroupChange() {
        submitForm();
    }

    function onSectionChange() {
        submitForm();
    }

    // function GetData() {
    //     submitFormAll();
    // }
</script>
