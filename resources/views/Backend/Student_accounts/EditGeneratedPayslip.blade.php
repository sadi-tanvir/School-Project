@extends('Backend.app')
@section('title')
Generate Payslip
@endsection


@section('Dashboard')
<style>
    input[type="checkbox"] {
        /* Hide the default checkbox */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        /* Set custom styles for the checkbox */
        width: 16px;
        height: 16px;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 3px;
        cursor: pointer;
        /* Add a checkmark when the checkbox is checked */
    }

    input[type="checkbox"]:checked {
        background-color: #007bff;
        border-color: #007bff;
    }

    .shadowStyle {
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }

    /* Custom styles */
    .autocomplete {
        position: relative;
    }

    .autocomplete input {
        padding-right: 2.5rem;
    }

    .autocomplete .autocomplete-list {
        position: absolute;
        z-index: 10;
        width: calc(100% - 1rem);
        max-height: 200px;
        overflow-y: auto;
        background-color: #fff;
        border: 1px solid #d1d5db;
        border-radius: 0.25rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .autocomplete .autocomplete-list-item {
        padding: 0.5rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .autocomplete .autocomplete-list-item:hover {
        background-color: #f3f4f6;
    }

</style>
<div>
    <h1>Fees Generate</h1>
</div>

@include('Shared.alert')


<div class="w-full border mx-auto p-5 space-y-10">
    <form action="{{ route('AllPayslipInformation.get', $school_code) }}" method="GET">
        @csrf
        <div class="grid grid-cols-11 items-center gap-5">
            {{-- month --}}
            <div class="">
                <label for="month" class="block mb-2 text-sm font-medium text-gray-900  ">Month
                    :</label>
                <select id="month" name="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected>Select</option>
                </select>
            </div>

            {{-- year --}}
            <div class="">
                <label for="year" class="block mb-2 text-sm font-medium text-gray-900  ">Year
                    :</label>
                <input type="text" value="" name="year" id="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full" placeholder="" />
            </div>

            {{-- month_year --}}
            <div class="mt-7">
                <input type="text" value="" name="month_year" id="month_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full" placeholder="" />
            </div>

            {{-- last pay date --}}
            <div class="">
                <label for="last_pay_date" class="block mb-2 text-sm font-medium text-gray-900  ">Last
                    Pay
                    Date:</label>
                <input type="date" value="" name="last_pay_date" id="last_pay_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full" placeholder="" />
            </div>

            {{-- class --}}
            <div class="">
                <label for="class" class="block mb-2 text-sm font-medium text-gray-900  ">Class:</label>
                <select id="class" name="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected>Select</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Group --}}
            <div class="">
                <label for="group" class="block mb-2 text-sm font-medium text-gray-900  ">Group:</label>
                <select id="group" name="group" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Select</option>
                    @foreach ($groups as $group)
                    <option {{ $group->group_name === 'N/A' ? 'selected' : '' }} value="{{ $group->group_name }}">
                        {{ $group->group_name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- section --}}
            <div class="">
                <label for="section" class="block mb-2 text-sm font-medium text-gray-900  ">section
                    :</label>
                <select id="section" name="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1">
                    <option selected>Select</option>
                    @foreach ($sections as $section)
                    <option value="{{ $section->section_name }}">{{ $section->section_name }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- PaySlip --}}
            <div class="">
                <label for="pay_slip_type" class="block mb-2 text-sm font-medium text-gray-900  ">PaySlip
                    :</label>
                <select id="pay_slip_type" name="pay_slip_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected>Select</option>
                </select>
            </div>

            {{-- Student Roll --}}
            <div class="">
                <label for="student_id" class="block mb-2 text-sm font-medium whitespace-noWrap ">Student Roll:</label>
                <div class="autocomplete w-full relative">
                    <input type="text" name="student_id" id="student_id" placeholder="Search..." class="w-full py-2 px-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                    <div id="autocomplete-list" class="autocomplete-list hidden"></div>
                </div>
            </div>

            <div>
                <button id="getInformation" type="submit" class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl foc2024:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center uppercase mt-5">
                    get data
                </button>
            </div>
        </div>
    </form>

    <form action="#" method="POST">
        @csrf
        <div class="space-y-1">
            <div class="bg-blue-200 text-center rounded-lg">
                <h1 class="py-1">Transaction Data</h1>
            </div>
            <div class="">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600  dark:text-gray-400">
                            <tr id="table_header_row">

                            </tr>
                        </thead>
                        <tbody id="table_body">
                            <thead class="text-xs text-white uppercase bg-blue-600  dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        SL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        student Id
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        Fee Type Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        action
                                    </th>
                                </tr>
                            </thead>
                        <tbody>
                            @if (isset($payslipsSession) && count($payslipsSession) > 0)
                            @foreach ($payslipsSession as $key => $payslip)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap  ">
                                    {{ $key + 1 }}
                                </th>
                                <td class="px-6 py-4">
                                    <input name="fee_type[{{ $payslip->student_id }}]" value="{{ $payslip->student_id }}" class="hidden" type="text">
                                    {{ $payslip->student_id }}
                                </td>
                                <td class="px-6 py-4">
                                    <input name="fee_type[{{ $payslip->pay_slip_type }}]" value="{{ $payslip->pay_slip_type }}" class="hidden" type="text">
                                    {{ $payslip->pay_slip_type }}
                                </td>
                                <td>
                                    {{-- Update payslip start --}}
                                    <div class="mb-3">
                                        <svg data-modal-target="update_payslip_modal_{{ $payslip->id }}" data-modal-toggle="update_payslip_modal_{{ $payslip->id }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>

                                        {{-- Update Fee type modal form start --}}
                                        <div id="update_payslip_modal_{{ $payslip->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                <div class="relative bg-white rounded-lg shadow ">
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900  ">
                                                            Update Fee Type of <span class="text-blue-500 font-semibold">{{ $payslip->pay_slip_type }}</span>
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="update_payslip_modal_{{ $payslip->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>

                                                    <form method="POST" action="#" class="max-w-lg mx-auto">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="p-4 md:p-5 space-y-4">
                                                            <div class="mb-5">
                                                                <label for="month" class="block mb-2 text-sm font-medium text-gray-900  ">month</label>
                                                                <input type="text" name="month" value="{{ $payslip->month }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                                                            </div>

                                                            <div class="mb-5">
                                                                <label for="year" class="block mb-2 text-sm font-medium text-gray-900  ">year</label>
                                                                <input type="text" name="year" value="{{ $payslip->year }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                                                            </div>

                                                            <div class="mb-5">
                                                                <label for="last_pay_date" class="block mb-2 text-sm font-medium text-gray-900  ">Last Pay Date</label>
                                                                <input type="date" value="{{ $payslip->last_pay_date }}" name="last_pay_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full" placeholder="" />
                                                            </div>

                                                            <div class="mb-5">
                                                                <label for="student_id" class="block mb-2 text-sm font-medium text-gray-900  ">Student Id</label>
                                                                <input type="text" name="student_id" value="{{ $payslip->student_id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                                                            </div>

                                                            <div class="mb-5">
                                                                <label for="class" class="block mb-2 text-sm font-medium text-gray-900  ">Class</label>
                                                                <select name="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <option disabled selected>Select</option>
                                                                    @foreach ($classes as $class)
                                                                    <option {{$payslip->class == $class->class_name ? "selected" : ""}} value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-5">
                                                                <label for="group" class="block mb-2 text-sm font-medium text-gray-900  ">Group</label>
                                                                <select name="group" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <option disabled selected>Select</option>
                                                                    @foreach ($groups as $group)
                                                                    <option {{$payslip->group == $group->group_name ? "selected" : ""}} value="{{ $group->group_name }}">{{ $group->group_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-5">
                                                                <label for="section" class="block mb-2 text-sm font-medium text-gray-900  ">Section</label>
                                                                <select name="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <option disabled selected>Select</option>
                                                                    @foreach ($sections as $section)
                                                                    <option {{$payslip->section == $section->section_name ? "selected" : ""}} value="{{ $section->section_name  }}">{{ $section->section_name  }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-5">
                                                                <label for="student_id" class="block mb-2 text-sm font-medium text-gray-900  ">Fee Type Name</label>
                                                                <input type="text" id="student_id" name="student_id" value="{{ $payslip->student_id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                                                            </div>
                                                        </div>

                                                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center      ">Update</button>
                                                            <button data-modal-hide="update_payslip_modal_{{ $payslip->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-red-100 ">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Update Fee type modal form end --}}
                                    </div>
                                    {{-- Update payslip end --}}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        </tbody>
                    </table>
                </div>

                <div class="mt-20 flex justify-between">
                    <h1>
                        Total =
                        <input readonly type="number" value="" id="totalStudents" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1" placeholder="" />
                    </h1>

                    <div class="flex space-x-10">

                        <button type="submit" class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-16 py-1 text-center">
                            Save
                        </button>
                        <button type="button" class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-16 py-1 text-center">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const schoolCode = @json($school_code);

        const month = document.getElementById('month');
        const year = document.getElementById('year');
        const month_year = document.getElementById('month_year');
        const last_pay_date = document.getElementById('last_pay_date');
        const student_class = document.getElementById('class');
        const student_group = document.getElementById('group');
        const student_section = document.getElementById('section');
        const getInformation = document.getElementById('getInformation');
        const academic_year = document.getElementById('academic_year');
        const table_header_row = document.getElementById('table_header_row');
        const table_body = document.getElementById('table_body');
        const student_id = document.getElementById('student_id');

        const currentYear = new Date().getFullYear();
        const currentMonth = new Date().getMonth();


        // set months
        const monthList = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        monthList.forEach((item) => {
            let option = document.createElement('option');
            option.value = item;
            option.text = item;
            month.appendChild(option);
        })


        // set year
        year.value = currentYear;

        // set month_year
        month.addEventListener('change', (e) => {
            month_year.value = e.target.value + "." + year.value;
        })
        year.addEventListener('change', (e) => {
            month_year.value = month.value + "." + e.target.value;
        })




        // getting pay slip types using class & group
        let className = "";
        let groupName = student_group.value;
        let AllPaySlips = [];

        function getPayslipTypesData(className, groupName, sectionName = student_section.value) {
            fetch(`/dashboard/studentAccounts/editGeneratedPayslip/getPaySlipData/${schoolCode}?class_name=${className}&group_name=${groupName}&section=${sectionName}`)
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                }).then(data => {
                    console.log(data);
                    AllPaySlips = data.pay_slip_data;
                    updatePaySlipContent();
                    UpdateStudentRoll(data.students_info);
                }).catch(error => console.error('Error:', error));
        };
        student_class.addEventListener('change', (e) => {
            className = e.target.value;
            getPayslipTypesData(className, groupName);
        })
        student_group.addEventListener('change', (e) => {
            groupName = e.target.value;
            getPayslipTypesData(className, groupName);
        })
        student_section.addEventListener('change', (e) => {
            const sectionName = e.target.value;
            getPayslipTypesData(className, groupName, sectionName);
        })

        // update pay slip content
        function updatePaySlipContent() {
            pay_slip_type.innerHTML = "";
            AllPaySlips.forEach((item) => {
                let option = document.createElement('option');
                option.value = item.pay_slip_type;
                option.text = item.pay_slip_type;
                pay_slip_type.appendChild(option);
            })
        }


        // update student roll
        function UpdateStudentRoll(students) {
            const inputField = document.getElementById('student_id');
            const autocompleteList = document.getElementById('autocomplete-list');
            inputField.value = "";
            // Function to show autocomplete suggestions
            function showAutocompleteSuggestions() {
                const inputValue = inputField.value.toLowerCase();
                const filteredData = students.filter(item =>
                    (item.name && item.name.toLowerCase().includes(inputValue)) ||
                    (item.student_roll && item.student_roll.toLowerCase().includes(inputValue)) ||
                    (item.student_id && item.student_id.toLowerCase().includes(inputValue))
                );

                if (filteredData.length > 0) {
                    autocompleteList.innerHTML = '';
                    filteredData.forEach(item => {
                        const listItem = document.createElement('div');
                        listItem.textContent = item.student_roll + " - " + item.name;
                        listItem.classList.add('autocomplete-list-item');
                        listItem.addEventListener('click', () => {
                            inputField.value = item.student_id;
                            autocompleteList.classList.add('hidden');
                        });
                        autocompleteList.appendChild(listItem);
                    });
                    autocompleteList.classList.remove('hidden');
                } else {
                    autocompleteList.classList.add('hidden');
                }
            }

            // Show all data when the field is clicked
            inputField.addEventListener('click', () => {
                autocompleteList.innerHTML = '';
                students.forEach(item => {
                    const listItem = document.createElement('div');
                    listItem.textContent = item.student_roll + " - " + item.name;
                    listItem.classList.add('autocomplete-list-item');
                    listItem.addEventListener('click', () => {
                        inputField.value = item.student_id;
                        autocompleteList.classList.add('hidden');
                    });
                    autocompleteList.appendChild(listItem);
                });
                autocompleteList.classList.remove('hidden');
            });

            // Event listener for input field
            inputField.addEventListener('input', showAutocompleteSuggestions);

            // Hide autocomplete list on click outside
            document.addEventListener('click', (event) => {
                if (!autocompleteList.contains(event.target) && event.target !== inputField) {
                    autocompleteList.classList.add('hidden');
                }
            });
        };


        // get all information
        /* getInformation.addEventListener('click', (e) => {
            e.preventDefault();
            fetch(
                    `/dashboard/studentAccounts/editGeneratedPayslip/getAllInformation/${schoolCode}?class_name=${className}&group_name=${groupName}&month=${month.value}&year=${year.value}&pay_slip_type=${pay_slip_type.value}&section=${student_section.value}&student_id=${student_id.value? student_id.value : "Select"}`
                )
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    updateTableContent(data)
                })
                .catch(error => console.error('Error:', error));
        }) */



        /* function updateTableContent(data) {
            // create rest columns
            table_header_row.innerHTML = "";
            Object.keys(data[0]).forEach(item => {
                const th = document.createElement('th');
                th.scope = "col"
                th.classList.add('px-6', 'py-3', 'bg-blue-500');
                th.textContent = item;
                table_header_row.appendChild(th);
            })

            // create dynamic row
            table_body.innerHTML = "";
            data.forEach((item, index) => {
                const tr = document.createElement('tr');
                tr.classList.add('odd:bg-white', 'odd:dark:bg-gray-900', 'even:bg-gray-50'
                    , 'even:dark:bg-gray-800', 'border-b', 'dark:border-gray-700');

                // creating rest columns
                Object.values(item).forEach((element, index) => {
                    let currentKey = "";
                    for (const key in item) {
                        // Check if the current value matches the desired value
                        if (item[key] === element) {
                            currentKey = key;
                            break;
                        }
                    }
                    const td = document.createElement('td');
                    td.classList.add("px-6", "py-4")
                    const inputBox = document.createElement('input');
                    inputBox.type = 'text'
                    inputBox.name = `input_${currentKey}[${item.student_id}]`;
                    inputBox.value = element;
                    inputBox.classList.add('border-0')
                    inputBox.readOnly = true;
                    td.appendChild(inputBox);
                    tr.appendChild(td);
                });

                table_body.appendChild(tr);
            })

            // showing total student's count
            document.getElementById("totalStudents").value = data.length;

            // marking all the checkbox according to the header checkbox
            const rowCheckboxes = document.querySelectorAll(`input[type="checkbox"][name^="select"]`);
            headerCheckbox.addEventListener('change', function() {
                rowCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = headerCheckbox.checked;
                });
            });

        }
 */

    })

    document.addEventListener("DOMContentLoaded", function() {
        const desiredMonth = new Date().getMonth();
        const desiredYear = new Date().getFullYear();

        const lastPayDate = new Date(desiredYear, desiredMonth, 10 + 1);

        const formattedDate =
            `${String(lastPayDate.getMonth() + 1).padStart(2, '0')}-${String(lastPayDate.getDate()).padStart(2, '0')}-${lastPayDate.getFullYear()}`;

        document.getElementById('last_pay_date').value = lastPayDate.toISOString().slice(0, 10);
    });

</script>
