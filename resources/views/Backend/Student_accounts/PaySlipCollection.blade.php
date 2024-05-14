@extends('Backend.app')
@section('title')
    Fees Collection
@endsection


@section('Dashboard')
    <style>
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
        <h1>Others Fees Collection</h1>
    </div>

    <div class="grid grid-cols-3 gap-5">
        {{-- left section --}}
        <div class="">
            {{-- form --}}
            <form action="{{ url('') }}" method="POST">
                @csrf
                <div class="font-bold">
                    <h3>Student Information</h3>
                </div>
                <div class="border py-5 px-2 space-y-3 flex flex-col rounded-lg shadow">
                    <div class="">
                        <label for="year" class="block mb-2 text-sm font-medium whitespace-noWrap ">Year:</label>
                        <select id="year" name="year"
                            class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                            <option selected>Select</option>
                            @foreach ($years as $yearVal)
                                <option {{ date('Y') == $yearVal->year ? 'selected' : '' }} value="{{ $yearVal->year }}">
                                    {{ $yearVal->year }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- class --}}
                    <div class="">
                        <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class
                            :</label>
                        <select id="class" name="class"
                            class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                            <option selected>Select</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- section --}}
                    <div class="">
                        <label for="section" class="block mb-2 text-sm font-medium whitespace-noWrap ">Section
                            :</label>
                        <select id="section" name="section"
                            class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                            <option selected>Select</option>
                            {{-- @foreach ($sections as $section)
                                <option value="{{ $section->section_name }}">{{ $section->section_name }}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    {{-- Student Roll --}}
                    <div class="">
                        <label for="student_roll" class="block mb-2 text-sm font-medium whitespace-noWrap ">Student Roll:
                        </label>
                        <div class="autocomplete w-full relative">
                            <input type="text" name="student_roll" id="student_roll" placeholder="Search..."
                                class="w-full py-2 px-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                            <div id="autocomplete-list" class="autocomplete-list hidden"></div>
                        </div>
                    </div>

                    <button id="getPaySlipData" type="button"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-auto">Load
                        Data
                    </button>
                </div>
            </form>

            {{-- table section --}}
            <div class="mt-10">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs uppercase bg-blue-600 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        <input id="headerCheckbox" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Month
                                </th>
                                <th scope="col" class="px-16 py-3 bg-blue-500">
                                    PaySlip
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">

                                </th>
                            </tr>
                        </thead>
                        <tbody id="table_body">
                        </tbody>
                    </table>
                </div>

                <div class="mt-20 flex justify-between">
                    <div class="flex items-center">
                        <input id="deleteCheckBox" name="deleteCheckBox" type="checkbox" value=""
                            class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500  focus:ring-2 dark:bg-gray-700">
                        <label for="deleteCheckBox" class="ml-1 text-sm font-medium text-gray-900 ">Delete</label>
                    </div>

                    <button id="PrintReadyBtn" type="button"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-1.5 text-center">
                        >>
                    </button>

                    <h1>
                        Total =
                        <input readonly type="number" value="" name="student_roll" id="student_roll"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1"
                            placeholder="" />
                    </h1>
                </div>
            </div>
        </div>


        {{-- right section --}}
        <div class=" col-span-2">

            <div class="bg-gray-100 rounded-lg shadow  p-5">
                <div class="w-full flex">
                    <button id="resetVoucher" type="button"
                        class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-10 py-1.5 text-center ml-auto mb-3">
                        Reset
                    </button>
                </div>
                <form action="{{ route('paySlipData.store', $school_code) }}" method="POST">
                    @csrf
                    <div class="flex justify-between">
                        <div class="w-80 space-y-3">
                            <div class="">
                                <p class="text-sm font-medium text-gray-700 ">
                                    Voucher Number:
                                    <span id="voucher_id" class="text-lg font-bold"></span>
                                    <input type="text" class="hidden" name="voucher_number" id="voucher_number">
                                </p>
                            </div>

                            <div class="flex items-center gap-3">
                                <label for="collection_date" class="text-sm font-medium text-gray-600 ">Collention
                                    Date:</label>
                                <input type="date" value="{{ date('Y-m-d') }}" name="collection_date"
                                    id="collection_date"
                                    class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 "
                                    placeholder="student class" />
                            </div>

                            <div class="flex items-center gap-3">
                                <label for="collect_amount" class="text-sm font-medium text-gray-600 ">Collection
                                    Amount:</label>
                                <input type="text" value="" name="collect_amount" id="collect_amount"
                                    class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 px-2"
                                    placeholder="amount" />
                            </div>
                        </div>




                        <div class="w-80 space-y-1.5">
                            <div class="w-full flex justify-between gap-5">
                                <div class="">
                                    <p class="text-sm font-medium text-gray-700 ">
                                        S.ID:
                                        <span id="printable_student_id" class="font-bold"></span>
                                    </p>
                                </div>
                                <div class="">
                                    <p class="text-sm font-medium text-gray-700 ">
                                        Roll:
                                        <span id="printable_student_roll" class=""></span>
                                    </p>
                                </div>
                            </div>

                            <div class="">
                                <p class="text-sm font-medium text-gray-700 ">
                                    Name:
                                    <span id="printable_student_name" class="font-bold"></span>
                                </p>
                            </div>

                            <div class="w-full flex justify-between gap-5">
                                <div class="">
                                    <p class="text-sm font-medium text-gray-700 ">
                                        Class:
                                        <span id="printable_student_class" class="font-bold"></span>
                                    </p>
                                </div>
                                <div class="">
                                    <p class="text-sm font-medium text-gray-700 ">
                                        Group:
                                        <span id="printable_student_group" class="font-bold"></span>
                                    </p>
                                </div>
                            </div>

                            <div class="">
                                <p class="text-sm font-medium text-gray-700 ">
                                    Mobile:
                                    <span id="printable_student_mobile" class="font-bold"></span>
                                </p>
                            </div>
                        </div>
                    </div>


                    {{-- table section --}}
                    <div class="mt-10">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                                <thead class="text-xs text-white uppercase bg-blue-600">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            SL
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            HEAD NAME
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            AMOUNT
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            WAIVER
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            PAYABLE
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Due Amt.
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            Current Pay
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="payablePaySlips">
                                </tbody>
                            </table>
                        </div>

                        <div class="grid grid-cols-4 gap-5">
                            <div class="mt-20 flex flex-wrap gap-5 col-span-3">
                                <div class="">
                                    <label for="t_amount" class="mb-2 text-sm font-medium text-gray-600 ">T.
                                        Amount:</label>
                                    <input type="text" value="" name="t_amount" id="t_amount"
                                        class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                        placeholder="" readonly />
                                </div>
                                <div class="">
                                    <label for="t_waiver" class="mb-2 text-sm font-medium text-gray-600 ">T.
                                        Waiver:</label>
                                    <input type="text" value="" name="t_waiver" id="t_waiver"
                                        class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                        placeholder="" readonly />
                                </div>
                                <div class="">
                                    <label for="t_payable" class="mb-2 text-sm font-medium text-gray-600 ">T.
                                        Payable:</label>
                                    <input type="text" value="" name="t_payable" id="t_payable"
                                        class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                        placeholder="" readonly />
                                </div>

                                <div class="">
                                    <label for="t_current_pay" class="mb-2 text-sm font-medium text-gray-600 ">Total
                                        Current
                                        Pay:</label>
                                    <input type="text" value="" name="t_current_pay" id="t_current_pay"
                                        class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                        placeholder="" readonly />
                                </div>
                            </div>
                            <div class="mt-24 space-y-3">
                                <div class="flex gap-2">
                                    <label for="fine" class="mb-2 text-sm font-medium text-gray-600 ">Fine:</label>
                                    <input type="text" value="" name="fine" id="fine"
                                        class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                        placeholder="" readonly />
                                    <input type="text" value="" name="fine2" id="fine2"
                                        class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                        placeholder="" readonly />
                                </div>

                                <div class="flex gap-2">
                                    <label for="fail" class="mb-2 text-sm font-medium text-gray-600 ">Fail:</label>
                                    <input type="text" value="" name="fail" id="fail"
                                        class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                        placeholder="" readonly />
                                    <input type="text" value="" name="fail2" id="fail2"
                                        class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                        placeholder="" readonly />
                                </div>

                                <div class="flex gap-2">
                                    <label for="absent" class="mb-2 text-sm font-medium text-gray-600 ">Absent:</label>
                                    <input type="text" value="" name="absent" id="absent"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                        placeholder="" readonly />
                                    <input type="text" value="" name="absent2" id="absent2"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                        placeholder="" readonly />
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <div class="">
                                    <label for="changed" class="mb-2 text-sm font-medium text-gray-600 ">Changed:</label>
                                    <input type="text" value="" name="changeAmount" id="changeAmount"
                                        class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full px-1"
                                        placeholder="" />
                                </div>
                                <div class="mt-5">
                                    <input type="text" value="" name="returnAmount" id="returnAmount"
                                        class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full px-1"
                                        placeholder="" />
                                </div>
                            </div>
                        </div>

                        <div class="w-full flex">
                            <button id="getPaySlipData" type="submit"
                                class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-10 text-center mx-auto">Collect
                                Fees
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', () => {
        var schoolCode = {!! json_encode($school_code) !!};

        const year = document.getElementById('year');
        const classId = document.getElementById('class');
        const sectionId = document.getElementById('section');
        const getPaySlipData = document.getElementById('getPaySlipData');
        const student_roll = document.getElementById('student_roll');
        const table_body = document.getElementById('table_body');
        const PrintReadyBtn = document.getElementById('PrintReadyBtn');
        const collect_amount = document.getElementById('collect_amount');



        // get student information
        classId.addEventListener('change', async (e) => {
            try {
                className = e.target.value;
                const res = await fetch(
                    `/dashboard/studentAccounts/paySlipCollection/getStudentRoll/${schoolCode}?class_name=${className}&year=${year.value}`
                )
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                UpdateSectionOption(data.section);
                UpdateStudentRoll(data.student_info)
            } catch (error) {
                console.error('Error:', error);
            }
        });


        // update section options
        function UpdateSectionOption(sections) {
            sectionId.innerHTML = "";
            sections.forEach(section => {
                const sectionOption = document.createElement('option');
                sectionOption.value = section.section;
                sectionOption.textContent = section.section;
                sectionId.appendChild(sectionOption);
            });
        };

        // update student roll
        function UpdateStudentRoll(students) {
            const inputField = document.getElementById('student_roll');
            const autocompleteList = document.getElementById('autocomplete-list');
            inputField.value = "";
            // Function to show autocomplete suggestions
            function showAutocompleteSuggestions() {
                const inputValue = inputField.value.toLowerCase();
                const filteredData = students.filter(item =>
                    (item.name && item.name.toLowerCase().includes(inputValue)) ||
                    (item.student_roll && item.student_roll.toLowerCase().includes(inputValue)) ||
                    (item.nedubd_student_id && item.nedubd_student_id.toLowerCase().includes(inputValue))
                );

                if (filteredData.length > 0) {
                    autocompleteList.innerHTML = '';
                    filteredData.forEach(item => {
                        const listItem = document.createElement('div');
                        listItem.textContent = item.student_roll + " - " + item.name;
                        listItem.classList.add('autocomplete-list-item');
                        listItem.addEventListener('click', () => {
                            inputField.value = item.nedubd_student_id;
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
                        inputField.value = item.nedubd_student_id;
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


        // get student wise pay slip inforamtion
        getPaySlipData.addEventListener('click', async () => {
            try {
                const res = await fetch(
                    `/dashboard/studentAccounts/paySlipCollection/studentWisePaySlips/${schoolCode}?class_name=${classId.value}&student_id=${student_roll.value}&year=${year.value}`
                )
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                DisplayUserPaySlip(data)
            } catch (error) {
                console.error('Error:', error);
            }
        })


        function DisplayUserPaySlip(data) {
            const selectedCheckboxes = [];

            // create dynamic row
            let slColumn = 1;
            table_body.innerHTML = "";
            // update table content
            data.paySlips.forEach(slip => {
                const tr = document.createElement('tr');
                tr.classList.add('odd:bg-white', 'odd:dark:bg-gray-900', 'even:bg-gray-50',
                    'even:dark:bg-gray-800', 'border-b', 'dark:border-gray-700');

                // Create a new checkbox input element
                const checkboxCell = document.createElement('td');
                checkboxCell.classList.add("px-6", "py-4")
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = `select_${slip.id}`
                checkbox.classList.add('w-4', 'h-4', 'text-blue-600', 'bg-gray-100', 'border-gray-300',
                    'rounded', 'focus:ring-blue-500')
                checkboxCell.appendChild(checkbox)
                tr.appendChild(checkboxCell);


                // create serial index column
                const serialTD = document.createElement('td');
                serialTD.classList.add('px-6', 'py-4');
                serialTD.textContent = slColumn++;
                tr.appendChild(serialTD);


                // create month_year column
                const monthYearTD = document.createElement('td');
                monthYearTD.classList.add("px-1", "py-4",
                    'overflow-hidden')
                monthYearTD.style.maxWidth = "100px";
                const monthYearInputBox = document.createElement('input');
                monthYearInputBox.type = 'text'
                monthYearInputBox.name = `input_month_year[${slip.student_id}]`;
                monthYearInputBox.value = slip.month + "," + slip.year;
                monthYearInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                monthYearInputBox.readOnly = true;
                monthYearTD.appendChild(monthYearInputBox);
                tr.appendChild(monthYearTD);


                // create Payslip Type column
                const payslipTypeTD = document.createElement('td');
                payslipTypeTD.classList.add("px-1", "py-4",
                    'overflow-hidden')
                payslipTypeTD.style.maxWidth = "100px";
                const payslipTypeInputBox = document.createElement('input');
                payslipTypeInputBox.type = 'text'
                payslipTypeInputBox.name = `input_payslip_type[${slip.student_id}]`;
                payslipTypeInputBox.value = slip.pay_slip_type;
                payslipTypeInputBox.classList.add('border-0', 'w-fit', 'focus:ring-0')
                payslipTypeInputBox.readOnly = true;
                payslipTypeTD.appendChild(payslipTypeInputBox);
                tr.appendChild(payslipTypeTD);


                // create Payslip Type column
                const payableAmountTypeTD = document.createElement('td');
                payableAmountTypeTD.classList.add("px-1", "py-4",
                    'overflow-hidden')
                payableAmountTypeTD.style.maxWidth = "100px";
                const payableAmountInputBox = document.createElement('input');
                payableAmountInputBox.type = 'text'
                payableAmountInputBox.name = `input_payslip_type[${slip.student_id}]`;
                payableAmountInputBox.value = slip.payable;
                payableAmountInputBox.classList.add('border-0', 'w-fit', 'focus:ring-0')
                payableAmountInputBox.readOnly = true;
                payableAmountTypeTD.appendChild(payableAmountInputBox);
                tr.appendChild(payableAmountTypeTD);


                // append table row
                table_body.appendChild(tr);


                // marking all the checkbox according to the header checkbox
                const headerCheckbox = document.getElementById("headerCheckbox");
                const rowCheckboxes = document.querySelectorAll(
                    `input[type="checkbox"][name^="select"]`);

                headerCheckbox.addEventListener('change', function() {
                    rowCheckboxes.forEach(function(checkbox) {
                        checkbox.checked = headerCheckbox.checked;
                        if (checkbox.checked) {
                            const checkboxName = checkbox.name.split("_")[1];
                            if (!selectedCheckboxes.includes(checkboxName)) {
                                selectedCheckboxes.push(checkboxName);
                            }
                        } else {
                            const checkboxName = checkbox.name.split("_")[1];
                            const index = selectedCheckboxes.indexOf(checkboxName);
                            if (index !== -1) {
                                selectedCheckboxes.splice(index, 1);
                            }
                        }
                    });
                });

                // Add change event listener to each checkbox
                rowCheckboxes.forEach(function(checkbox) {
                    checkbox.addEventListener('change', (event) => {
                        const isChecked = event.target.checked;
                        const checkboxName = event.target.name.split("_")[1];

                        // If checkbox is checked, add it to selectedCheckboxes array, else remove it
                        if (isChecked) {
                            if (!selectedCheckboxes.includes(checkboxName)) {
                                selectedCheckboxes.push(checkboxName);
                            }
                        } else {
                            const index = selectedCheckboxes.indexOf(checkboxName);
                            if (index !== -1) {
                                selectedCheckboxes.splice(index, 1);
                            }
                        }
                    });
                });
            });

            // print ready btn
            PrintReadyBtn.addEventListener('click', () => {
                const voucher_id = document.getElementById('voucher_id');
                const printable_student_id = document.getElementById('printable_student_id');
                const printable_student_roll = document.getElementById('printable_student_roll');
                const printable_student_name = document.getElementById('printable_student_name');
                const printable_student_class = document.getElementById('printable_student_class');
                const printable_student_group = document.getElementById('printable_student_group');
                const printable_student_mobile = document.getElementById('printable_student_mobile');

                // showing data in the UI
                voucher_id.innerText = data.voucher_number;
                voucher_number.value = data.voucher_number;
                printable_student_id.innerText = data.student_information.nedubd_student_id;
                printable_student_roll.innerText = data.student_information.student_roll;
                printable_student_name.innerText = data.student_information.name;
                printable_student_class.innerText = data.student_information.Class_name;
                printable_student_group.innerText = data.student_information.group;
                printable_student_mobile.innerText = data.student_information.mobile_no;

                // filtering checked data for money receiving
                const filteredPaySlip = data.paySlips.filter((slip2) => selectedCheckboxes.includes(
                    slip2.id.toString()))

                displayPayablePayslips(filteredPaySlip)
            })
        }

        const payablePaySlips = document.getElementById('payablePaySlips')
        const t_amount = document.getElementById('t_amount')
        const t_waiver = document.getElementById('t_waiver')
        const t_payable = document.getElementById('t_payable')
        // display payable & printable paySlips
        function displayPayablePayslips(paySlips) {
            // create dynamic row
            let slColumn = 1;
            payablePaySlips.innerHTML = "";

            let collectAmount = null;
            let totalAmount = 0;
            let totalWaiver = 0;
            let totalPayable = 0;

            paySlips.forEach((slip, index) => {
                totalAmount += slip.amount;
                totalWaiver += slip.waiver;
                totalPayable += slip.payable;
                const tr = document.createElement('tr');
                tr.classList.add('odd:bg-white', 'odd:dark:bg-gray-900', 'even:bg-gray-50',
                    'even:dark:bg-gray-800', 'border-b', 'dark:border-gray-700');

                // create serial index column
                const serialTD = document.createElement('td');
                serialTD.classList.add('px-6', 'py-4');
                serialTD.textContent = slColumn++;
                tr.appendChild(serialTD);


                // create Payslip Type column
                const payslipTypeNameTD = document.createElement('td');
                payslipTypeNameTD.classList.add("px-1", "py-2",
                    'overflow-hidden')
                payslipTypeNameTD.style.maxWidth = "160px";
                const payslipTypeInputBox = document.createElement('input');
                payslipTypeInputBox.type = 'text'
                payslipTypeInputBox.name = `input_payslip_type[${slip.id}]`;
                payslipTypeInputBox.value = slip.pay_slip_type + " (" + slip.month + "," + slip.year +
                    ")";
                payslipTypeInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                payslipTypeInputBox.readOnly = true;
                payslipTypeNameTD.appendChild(payslipTypeInputBox);
                tr.appendChild(payslipTypeNameTD);


                // create Payslip Amount column
                const payslipAmountNameTD = document.createElement('td');
                payslipAmountNameTD.classList.add("px-1", "py-2",
                    'overflow-hidden')
                payslipAmountNameTD.style.maxWidth = "100px";
                const payslipAmountInputBox = document.createElement('input');
                payslipAmountInputBox.type = 'text'
                payslipAmountInputBox.name = `input_payslip_amount[${slip.id}]`;
                payslipAmountInputBox.value = slip.amount;
                payslipAmountInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                payslipAmountInputBox.readOnly = true;
                payslipAmountNameTD.appendChild(payslipAmountInputBox);
                tr.appendChild(payslipAmountNameTD);


                // create Waiver column
                const payslipWaiverTD = document.createElement('td');
                payslipWaiverTD.classList.add("px-1", "py-2",
                    'overflow-hidden')
                payslipWaiverTD.style.width = "10px";
                const payslipWaiverInputBox = document.createElement('input');
                payslipWaiverInputBox.style.width = "90px"
                payslipWaiverInputBox.type = 'text'
                payslipWaiverInputBox.name = `input_waiver[${slip.id}]`;
                payslipWaiverInputBox.value = slip.waiver;
                payslipWaiverInputBox.classList.add('w-fit', 'rounded-lg')
                payslipWaiverTD.appendChild(payslipWaiverInputBox);
                tr.appendChild(payslipWaiverTD);



                // create Payable column
                const payableAmountTD = document.createElement('td');
                payableAmountTD.classList.add("px-1", "py-2",
                    'overflow-hidden')
                payableAmountTD.style.maxWidth = "100px";
                const payableInputBox = document.createElement('input');
                payableInputBox.type = 'text'
                payableInputBox.name = `input_payable_amount[${slip.id}]`;
                payableInputBox.value = slip.payable;
                payableInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                payableInputBox.readOnly = true;
                payableAmountTD.appendChild(payableInputBox);
                tr.appendChild(payableAmountTD);


                // create Due Amount column
                const dueAmountTD = document.createElement('td');
                dueAmountTD.classList.add("px-1", "py-2",
                    'overflow-hidden')
                dueAmountTD.style.maxWidth = "80px";
                const dueAmountInputBox = document.createElement('input');
                dueAmountInputBox.style.width = "100%"
                dueAmountInputBox.type = 'text'
                dueAmountInputBox.name = `input_due_amount[${slip.id}]`;
                dueAmountInputBox.value = slip.due_amount > 0 ? slip.due_amount : slip.payable;
                dueAmountInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                dueAmountInputBox.readOnly = true;
                dueAmountTD.appendChild(dueAmountInputBox);
                tr.appendChild(dueAmountTD);


                // create Current Pay Amount column
                const currentPayAmountTD = document.createElement('td');
                currentPayAmountTD.classList.add("px-1", "py-2")
                currentPayAmountTD.style.maxWidth = "90px";
                const currentPayInputBox = document.createElement('input');
                currentPayInputBox.style.width = "100%"
                currentPayInputBox.type = 'text'
                currentPayInputBox.name = `input_current_pay[${slip.id}]`;
                // currentPayInputBox.value = 0;
                currentPayInputBox.placeholder = 0;
                currentPayInputBox.classList.add('w-fit', 'rounded-lg')
                // currentPayInputBox.readOnly = true;
                currentPayAmountTD.appendChild(currentPayInputBox);
                tr.appendChild(currentPayAmountTD);


                // create hidden input id for submit form
                const paySlipIdTD = document.createElement('td');
                const paySlipIdInputBox = document.createElement('input');
                paySlipIdInputBox.type = 'text'
                paySlipIdInputBox.name = `input_payslip_id[${slip.id}]`;
                paySlipIdInputBox.value = slip.id;
                paySlipIdInputBox.classList.add('hidden')
                paySlipIdTD.appendChild(paySlipIdInputBox);
                tr.appendChild(paySlipIdTD);



                // calculate with current pay
                let preValueOfCurrentPay = parseInt(currentPayInputBox.value) || 0;
                currentPayInputBox.addEventListener('change', (event) => {
                    const value = parseInt(event.target.value);
                    if (value >= 0) {
                        const dueAmount = payableInputBox.value - value;
                        dueAmountInputBox.value = dueAmount;

                        if (value > payableInputBox.value) {
                            alert("Invalid Amount");
                            const dueAmount = payableInputBox.value
                            dueAmountInputBox.value = dueAmount;
                            currentPayInputBox.value = "";
                        }
                    } else {
                        const dueAmount = payableInputBox.value
                        dueAmountInputBox.value = dueAmount;
                    }
                });

                // calculate with waiver
                let preValueOfWaiver = parseInt(payslipWaiverInputBox.value);
                payslipWaiverInputBox.addEventListener('change', (event) => {
                    const waiverValue = parseInt(event.target.value);
                    if (waiverValue > slip.amount) {
                        alert("invalid waiver amount");
                        PrintReadyBtn.click();
                        return;
                    }

                    if (waiverValue >= 0) {
                        payableInputBox.value = payslipAmountInputBox.value - waiverValue;
                        dueAmountInputBox.value = payableInputBox.value;
                        currentPayInputBox.value = "";
                    } else {
                        payableInputBox.value = slip.payable;
                        payslipWaiverInputBox.value = slip.waiver;
                        dueAmountInputBox.value = payableInputBox.value;
                        currentPayInputBox.value = "";
                    }

                    // make empty collect amount field
                    collect_amount.value = "";

                    // set total amount of waiver and payable
                    if (preValueOfWaiver > waiverValue) {
                        let tempVal = preValueOfWaiver - waiverValue;
                        t_waiver.value = parseInt(t_waiver.value) - tempVal;
                        t_payable.value = parseInt(t_payable.value) + tempVal;
                    } else {
                        let tempVal = waiverValue - preValueOfWaiver;
                        t_waiver.value = parseInt(t_waiver.value) + tempVal;
                        t_payable.value = parseInt(t_payable.value) - tempVal;
                    }
                    preValueOfWaiver = parseInt(payslipWaiverInputBox.value);
                });


                // calculate & distribute collect amount
                collect_amount.addEventListener('change', (event) => {
                    const value = parseInt(event.target.value);

                    // make readonly the input field after enter the value once
                    collect_amount.readOnly = true;
                    collect_amount.classList.add("bg-gray-200")

                    // throw alert if input value greterthen total payable amount
                    if (value > parseInt(t_payable.value)) {
                        alert("invalid amount");
                        collect_amount.value = 0;
                        PrintReadyBtn.click();
                        return;
                    }

                    // set total current pay amount
                    t_current_pay.value = value;

                    // distribute collect amount into each current_pay field and update due amount
                    currentPayInputBox.value = "";
                    if (collectAmount === null) collectAmount = value;
                    if (dueAmountInputBox.value <= collectAmount) {
                        collectAmount = collectAmount - dueAmountInputBox.value;
                        currentPayInputBox.value = dueAmountInputBox.value;
                        dueAmountInputBox.value = 0;
                    } else {
                        currentPayInputBox.value = collectAmount;
                        dueAmountInputBox.value = dueAmountInputBox.value - collectAmount;
                        collectAmount = 0;
                    }
                    if ((paySlips.length - 1) === index) {
                        collectAmount = null;
                    }

                    // make readonly waver amount after distributing the collect_amount
                    payslipWaiverInputBox.readOnly = true;
                    payslipWaiverInputBox.classList.add("bg-gray-200")
                })

                payablePaySlips.appendChild(tr);
            })

            // update content of the totalAmount, totalWaiver, totalPayable
            t_amount.value = totalAmount;
            t_waiver.value = totalWaiver;
            t_payable.value = totalPayable;
        }


        // note change
        let changeAmount = document.getElementById('changeAmount');
        let returnAmount = document.getElementById('returnAmount');
        changeAmount.addEventListener('change', (event) => {
            if (collect_amount.value > 0) {
                const change = parseInt(event.target.value);
                returnAmount.value = change - parseInt(collect_amount.value);
            }
        })

        let resetVoucher = document.getElementById('resetVoucher');
        resetVoucher.addEventListener('click', () => {
            collect_amount.value = 0;
            PrintReadyBtn.click();

            // make readable the input field after click on the reset
            collect_amount.readOnly = false;
            collect_amount.classList.remove("bg-gray-200")
        })
    })
</script>
