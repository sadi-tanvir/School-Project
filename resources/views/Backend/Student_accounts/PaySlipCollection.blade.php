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

@include('Message.message')

@include('Shared.ContentHeader', ['title' => 'Fees Collection'])

<div class="grid grid-cols-3 gap-5">
    {{-- left section --}}
    <div class="rounded-lg">
        @include('Shared.ContentHeader', ['title' => 'Student Information'])
        <div class="border-2 rounded-lg py-5 px-6 space-y-3 flex flex-col">
            <div class="">
                <label for="year" class="block mb-2 text-sm font-medium whitespace-noWrap ">Year:</label>
                <select id="year" name="year"
                    class="bg-gray-200 border-0 text-gray-900 text-sm rounded-lg  block w-full p-3.5">
                    <option selected>Select</option>
                    @foreach ($years as $yearVal)
                    <option {{ date('Y')==$yearVal->year ? 'selected' : '' }} value="{{ $yearVal->year }}">
                        {{ $yearVal->year }}</option>
                    @endforeach
                </select>
            </div>

            {{-- class --}}
            <div class="">
                <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class:</label>
                <select id="class" name="class"
                    class="bg-gray-200 border-0  text-gray-900 text-sm rounded-lg  block w-full p-3.5">
                    <option selected>Select</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- group --}}
            <div class="">
                <label for="group" class="block mb-2 text-sm font-medium whitespace-noWrap ">Group:</label>
                <select id="group" name="group"
                    class="bg-gray-200 border-0  text-gray-900 text-sm rounded-lg  block w-full p-3.5">
                    <option selected>Select</option>
                </select>
            </div>

            {{-- section --}}
            <div class="">
                <label for="section" class="block mb-2 text-sm font-medium whitespace-noWrap ">Section:</label>
                <select id="section" name="section"
                    class="bg-gray-200 border-0  text-gray-900 text-sm rounded-lg  block w-full p-3.5">
                    <option selected>Select</option>
                </select>
            </div>

            {{-- Student Roll --}}
            <div class="">
                <label for="student_roll" class="block mb-2 text-sm font-medium whitespace-noWrap ">Student
                    Roll:</label>
                <div class="autocomplete w-full relative">
                    <input type="text" name="student_roll" id="student_roll" placeholder="Search..."
                        class="w-full py-3 px-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                    <div id="autocomplete-list" class="autocomplete-list hidden"></div>
                </div>
            </div>

            <button id="getPaySlipData" type="button"
                class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 w-full  py-3.5 text-center mx-auto">Load
                Data
            </button>
        </div>

        {{-- error message --}}
        <h1 id="fees_not_fount" class="text-red-400 text-center font-bold py-8 hidden">
            @include('Shared.generalErrorMessage', ['errorMessage' => 'No due amount found for this student'])
        </h1>



        {{-- table section --}}
        <div class="mt-10 hidden border-2 rounded-lg" id="payslip_table_section">
            <div class="relative max-h-60 overflow-auto p-2">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs uppercase bg-blue-600 text-white">
                        <tr>
                            <th scope="col" class="px-2 py-3 rounded-l-lg">
                                <div class="flex items-center">
                                    <input id="headerCheckbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500     focus:ring-2   ">
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3 bg-blue-500">
                                SL
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Month
                            </th>
                            <th scope="col" class="px-16 py-3 bg-blue-500">
                                PaySlip
                            </th>
                            <th scope="col" class="px-6 py-3 rounded-r-lg">
                                Amount
                            </th>
                        </tr>
                    </thead>
                    <tbody id="table_body">
                    </tbody>
                </table>
            </div>

            <div class="mt-5 flex items-center justify-end pb-2 px-2">
                <div class="flex items-center ms-3">
                    <input id="deleteCheckBox" name="deleteCheckBox" type="checkbox" value=""
                        class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500  focus:ring-2 ">
                    <label for="deleteCheckBox" class="ml-1 text-sm font-medium text-gray-900 ">Delete</label>
                </div>

                <button id="deletePayslip" type="button"
                    class="text-white  focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-9 py-3.5 text-end mx-auto bg-red-700">Delete
                </button>


                <button id="PrintReadyBtn" type="button"
                    class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-3.5 text-center">
                    >>
                </button>
            </div>
        </div>
    </div>


    {{-- right section --}}
    <div class=" col-span-2">

        <div class="bg-gray-100 rounded-lg shadow  p-5">
            <div class="w-full flex">
                <button id="resetVoucher" type="button"
                    class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center ml-auto mb-3">
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

                            </p>
                            <div class="">
                                <span id="voucher_id" class="text-lg font-bold"></span>
                                <input type="text" class="hidden" name="voucher_number" id="voucher_number">
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <label for="collection_date" class="text-sm font-medium text-gray-600 block">Collection
                                Date:</label>
                            <input type="date" value="{{ date('Y-m-d') }}" name="collection_date" id="collection_date"
                                class="bg-gray-200 border-0  border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 px-2 py-3.5 "
                                placeholder="student class" />
                        </div>

                        <div class="flex items-center gap-3">
                            <label for="collect_amount" class="text-sm font-medium text-gray-600 block ">Collection
                                Amount:</label>
                            <input type="text" value="" name="collect_amount" id="collect_amount"
                                class="bg-gray-200 border-0 -gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 px-2 py-3.5"
                                placeholder="amount" />
                        </div>
                    </div>




                    <div class="w-80 space-y-1.5">
                        <div class="w-full flex justify-between gap-5">
                            <div class="">
                                <p class="text-sm font-medium text-gray-700 ">
                                    S.ID:
                                    <input id="printable_student_id" type="text" value="" name="printable_student_id"
                                        class="bg-transparent border-none focus:ring-0 h-0 w-fit" readonly>
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
                    <div class="relative overflow-x-auto ">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class="text-xs text-white uppercase bg-blue-600">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-blue-500 rounded-l-lg">
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
                                        Pre Due
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        Current Due
                                    </th>
                                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                                        Current Pay
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="payablePaySlips">
                            </tbody>
                        </table>
                    </div>

                    <div class="grid grid-cols-4 gap-5 mt-20">

                        <div class="">
                            <label for="t_amount" class="mb-2 text-sm font-medium text-gray-600 ">T.
                                Amount:</label>
                            <input type="text" value="" name="t_amount" id="t_amount"
                                class="bg-gray-200 border-0  border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 px-2 py-3.5 block w-full"
                                placeholder="" readonly />
                        </div>
                        <div class="">
                            <label for="t_waiver" class="mb-2 text-sm font-medium text-gray-600 ">T.
                                Waiver:</label>
                            <input type="text" value="" name="t_waiver" id="t_waiver"
                                class="bg-gray-200 border-0  border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 px-2 py-3.5 block w-full"
                                placeholder="" readonly />
                        </div>
                        <div class="">
                            <label for="t_payable" class="mb-2 text-sm font-medium text-gray-600 ">T.
                                Payable:</label>
                            <input type="text" value="" name="t_payable" id="t_payable"
                                class="bg-gray-200 border-0  border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 px-2 py-3.5 block w-full"
                                placeholder="" readonly />
                        </div>

                        <div class="">
                            <label for="t_current_pay" class="mb-2 text-sm font-medium text-gray-600 ">Total
                                Current
                                Pay:</label>
                            <input type="number" value="0" name="t_current_pay" id="t_current_pay"
                                class="bg-gray-200 border-0  border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 px-2 py-3.5 block w-full"
                                placeholder="" readonly />
                        </div>

                    </div>

                    <div class="my-5 flex flex-col">
                        <label class="font-semibold" for="">Note:</label>
                        <textarea name="note" id="" cols="30" rows="4"
                            class="rounded-lg w-full border-0 bg-gray-200 p-2"
                            placeholder="Type your notes here..."></textarea>
                    </div>

                    <div class="flex gap-3">
                        <div class="">
                            <label for="changed" class="mb-2 text-sm font-medium text-gray-600 ">Changed:</label>
                            <input type="text" value="" name="changeAmount" id="changeAmount"
                                class="bg-gray-200 border-0  border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  py-3.5 block w-full "
                                placeholder="" />
                        </div>
                        <div class="mt-5">
                            <input type="text" value="" name="returnAmount" id="returnAmount"
                                class="bg-gray-200 border-0  border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 py-3.5 block w-full "
                                placeholder="" />
                        </div>
                    </div>

                    {{-- hidden inputs starts --}}
                    <input class="hidden" type="text" name="collected_by_name"
                        value="{{ isset($schoolAdminData->name) ? $schoolAdminData->name : 'Unknown' }}">
                    <input class="hidden" type="text" name="collected_by_email"
                        value="{{ isset($schoolAdminData->email) ? $schoolAdminData->email : 'Unknown' }}">
                    <input class="hidden" type="text" name="collected_by_phone"
                        value="{{ isset($schoolAdminData->mobile_number) ? $schoolAdminData->mobile_number : 'Unknown' }}">
                    {{-- hidden inputs end --}}

                    <div class="w-full grid grid-cols-3 items-end mt-10">
                        <div></div>
                        <button id="collect_fees" type="submit"
                            class="w-fit mx-auto h-fit text-white bg-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-8 py-3.5 text-center">Collect
                            Fees
                        </button>

                        <div class="w-full ml-auto flex justify-between">
                            <div class="flex items-center gap-2 mt-8">
                                <label for="full_paid" class="ml-1 text-sm font-medium text-gray-900">Full
                                    Paid</label>
                                <input id="full_paid" name="full_paid" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 ">
                            </div>

                            <div>
                                <label for="print_page" class="block mb-2 text-sm font-medium whitespace-noWrap ">Print
                                    Page
                                    :</label>
                                <select id="print_page" name="print_page"
                                    class="bg-gray-200 border-0  text-gray-900 text-sm rounded-lg  block w-32 px-2 py-3.5">
                                    <option disabled selected>Select</option>
                                    <option {{ $schoolInfo->number_of_print_page == 1 ? 'selected' : '' }}
                                        class="text-center" value="1">
                                        One Page</option>
                                    <option {{ $schoolInfo->number_of_print_page == 2 ? 'selected' : '' }}
                                        class="text-center" value="2">
                                        Two Page</option>
                                    <option {{ $schoolInfo->number_of_print_page == 3 ? 'selected' : '' }}
                                        class="text-center" value="3">
                                        Three Page</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const schoolCode = @json($school_code);

        const year = document.getElementById('year');
        const classId = document.getElementById('class');
        const groupId = document.getElementById('group');
        const sectionId = document.getElementById('section');
        const getPaySlipData = document.getElementById('getPaySlipData');
        const student_roll = document.getElementById('student_roll');
        const table_body = document.getElementById('table_body');
        const deleteCheckBox = document.getElementById('deleteCheckBox');
        const deletePayslip = document.getElementById('deletePayslip');
        const PrintReadyBtn = document.getElementById('PrintReadyBtn');
        const collect_amount = document.getElementById('collect_amount');
        const collect_fees = document.getElementById('collect_fees');
        // ("bg-gradient-to-br", "from-red-600", "to-red-500", "hover:bg-gradient-to-bl", "focus:ring-red-300")
        // collect fees null initially
        collect_fees.disabled = true;
        collect_fees.style.cursor = "not-allowed"
        collect_fees.classList.add("bg-gray-500");

        deletePayslip.disabled = true;
        deletePayslip.style.cursor = "not-allowed"
        deletePayslip.classList.add("bg-gray-500");

        // make unckeck the full paid checkbox
        full_paid.checked = false;
        full_paid.disabled = true;
        full_paid.style.cursor = "not-allowed"

        // common function to get student info
        async function getStudentInfo(className, groupName, sectionName, requestedBy) {
            try {
                const res = await fetch(
                    `/dashboard/studentAccounts/paySlipCollection/getStudentRoll/${schoolCode}?class_name=${className}&group=${groupName}&section=${sectionName}&year=${year.value}`
                )
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                if (requestedBy === 'class') {
                    UpdateGroupOption(data.group);
                    UpdateSectionOption(data.section);
                    UpdateStudentRoll(data.student_info)
                } else if (requestedBy === 'group') {
                    UpdateSectionOption(data.section);
                    UpdateStudentRoll(data.student_info)
                } else if (requestedBy === 'section') {
                    UpdateStudentRoll(data.student_info)
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }

        // get student information
        classId.addEventListener('change', async (e) => {
            const className = e.target.value;
            getStudentInfo(className, groupId.value, sectionId.value, 'class');
        });

        // get student info according to the section
        groupId.addEventListener('change', async (e) => {
            const groupName = e.target.value;
            // console.log('group name', groupName);
            getStudentInfo(classId.value, groupName, sectionId.value, 'group');
        });

        // get student info according to the section
        sectionId.addEventListener('change', async (e) => {
            const sectionName = e.target.value;
            getStudentInfo(classId.value, groupId.value, sectionName, 'section');
        });


        // update group options
        function UpdateGroupOption(groups) {
            groupId.innerHTML = "";
            const defaultOption = document.createElement('option');
            defaultOption.value = "Select";
            defaultOption.textContent = "Select";
            defaultOption.selected = true;
            groupId.appendChild(defaultOption);
            groups.forEach(group => {
                const groupOption = document.createElement('option');
                groupOption.value = group.group;
                groupOption.textContent = group.group;
                groupId.appendChild(groupOption);
            });
        };


        // update section options
        function UpdateSectionOption(sections) {
            sectionId.innerHTML = "";
            const defaultOption = document.createElement('option');
            defaultOption.value = "Select";
            defaultOption.textContent = "Select";
            defaultOption.selected = true;
            sectionId.appendChild(defaultOption);
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


        // get student wise pay slip inforamtion
        async function getPaySlipDataFunction() {
            try {
                const res = await fetch(
                    `/dashboard/studentAccounts/paySlipCollection/studentWisePaySlips/${schoolCode}?class_name=${classId.value}&group=${groupId.value}&section=${sectionId.value}&student_id=${student_roll.value}&year=${year.value}`
                )
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                console.log(data);
                DisplayUserPaySlip(data)
            } catch (error) {
                console.error('Error:', error);
            }
        }
        getPaySlipData.addEventListener('click', async () => {
            getPaySlipDataFunction()
        })

    const payslip_table_section = document.getElementById('payslip_table_section');
        function DisplayUserPaySlip(data) {
            console.log(data.paySlips);
            const selectedCheckboxes = [];

            if(data.paySlips.length === 0){
                table_body.innerHTML = "";
                fees_not_fount.classList.remove("hidden");
                payslip_table_section.classList.add("hidden");
                return;
            }


            // create dynamic row
            payslip_table_section.classList.remove("hidden");
            let slColumn = 1;
            table_body.innerHTML = "";
            fees_not_fount.classList.add("hidden");
            // update table content
            data.paySlips.forEach(slip => {
                const tr = document.createElement('tr');
                tr.classList.add( 'border-b', 'last:border-b-0');

                // Create a new checkbox input element
                const checkboxCell = document.createElement('td');
                checkboxCell.classList.add("px-2", "py-4")
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = `select_${slip.id}`
                checkbox.classList.add('w-4', 'h-4', 'text-blue-600', 'bg-gray-100', 'border-gray-300'
                    , 'rounded', 'focus:ring-blue-500')
                checkboxCell.appendChild(checkbox)
                tr.appendChild(checkboxCell);


                // create serial index column
                const serialTD = document.createElement('td');
                serialTD.classList.add('px-4', 'py-4');
                serialTD.textContent = slColumn++;
                tr.appendChild(serialTD);


                // create month_year column
                const monthYearTD = document.createElement('td');
                monthYearTD.classList.add("px-1", "py-4"
                    , 'overflow-hidden')
                monthYearTD.style.maxWidth = "100px";
                const monthYearInputBox = document.createElement('input');
                monthYearInputBox.type = 'text'
                monthYearInputBox.name = `input_month_year[${slip.student_id}]`;
                monthYearInputBox.value = slip.month + "," + slip.year;
                monthYearInputBox.classList.add('border-0', 'w-fit'
                    , 'focus:ring-0')
                monthYearInputBox.readOnly = true;
                monthYearTD.appendChild(monthYearInputBox);
                tr.appendChild(monthYearTD);


                // create Payslip Type column
                const payslipTypeTD = document.createElement('td');
                payslipTypeTD.classList.add("px-1", "py-4"
                    , 'overflow-hidden')
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
                payableAmountTypeTD.classList.add("px-1", "py-4"
                    , 'overflow-hidden')
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

            // delete payslip
            deleteCheckBox.addEventListener("change", (event) => {
                console.log('delete checkbox', );
                    if(event.target.checked){
                        deletePayslip.disabled = false;
                        deletePayslip.style.cursor = "pointer"
                        deletePayslip.classList.remove("bg-gray-200");
                        deletePayslip.classList.add("bg-gradient-to-br", "from-red-600", "to-red-500"
                            , "hover:bg-gradient-to-bl", "focus:ring-red-300");
                    }if(!event.target.checked){
                        deletePayslip.disabled = true;
                        deletePayslip.style.cursor = "not-allowed"
                        deletePayslip.classList.add("bg-gray-200");
                        deletePayslip.classList.remove("bg-gradient-to-br", "from-red-600", "to-red-500"
                            , "hover:bg-gradient-to-bl", "focus:ring-red-300");
                    }
            })
            let filteredPaySlipForDelete = [];
            deletePayslip.addEventListener("click", (event) => {
                // filtering checked data for money receiving
                filteredPaySlipForDelete = data.paySlips.filter((slip2) => selectedCheckboxes.includes(
                    slip2.id.toString()));
                if (filteredPaySlipForDelete.length > 0) {
                    filteredPaySlipForDelete.forEach(async payslip => {
                        try {
                            const res = await fetch(
                                `/dashboard/studentAccounts/paySlipCollection/deletePaySlip/${schoolCode}?payslipId=${payslip.id}`
                            )
                            if (!res.ok) throw new Error('Network response was not ok');
                            const data = await res.json();
                            // re fetch payslip data
                            if (res.ok) getPaySlipDataFunction();
                            console.log('from payslip delete', data);
                        } catch (error) {
                            console.error('Error:', error);
                        }
                    });
                }

                // again uncheck the delete checkbox
                deleteCheckBox.checked = false;
                // again disable the delete funciton
                deletePayslip.disabled = true;
                deletePayslip.style.cursor = "not-allowed"
                deletePayslip.classList.remove("bg-gradient-to-br", "from-red-600", "to-red-500"
                    , "hover:bg-gradient-to-bl", "focus:ring-red-300");
                deletePayslip.classList.add("bg-gray-2000");

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

                // make clickable the full paid checkbox
                full_paid.checked = false;
                full_paid.disabled = false;
                full_paid.style.cursor = "pointer"

                // showing data in the UI
                voucher_id.innerText = data.voucher_number;
                voucher_number.value = data.voucher_number;
                printable_student_id.value = data.student_information.student_id;
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
                totalAmount += parseInt(slip.amount);
                totalWaiver += parseInt(slip.waiver);
                totalPayable += parseInt(slip.payable);
                const tr = document.createElement('tr');
                tr.classList.add( 'border-b', );

                // create serial index column
                const serialTD = document.createElement('td');
                serialTD.classList.add('px-6', 'py-4');
                serialTD.textContent = slColumn++;
                tr.appendChild(serialTD);


                // create Payslip Type column
                const payslipTypeNameTD = document.createElement('td');
                payslipTypeNameTD.classList.add("px-1", "py-2"
                    , 'overflow-hidden','bg-gray-200')
                payslipTypeNameTD.style.maxWidth = "160px";
                const payslipTypeInputBox = document.createElement('input');
                payslipTypeInputBox.type = 'text'
                payslipTypeInputBox.name = `input_fee_type[${slip.id}]`;
                payslipTypeInputBox.value = slip.pay_slip_type + " (" + slip.month + "," + slip.year +
                    ")";
                payslipTypeInputBox.classList.add('border-0', 'w-fit'
                    , 'focus:ring-0','bg-gray-200')
                payslipTypeInputBox.readOnly = true;
                payslipTypeNameTD.appendChild(payslipTypeInputBox);
                tr.appendChild(payslipTypeNameTD);


                // create Payslip Amount column
                const payslipAmountNameTD = document.createElement('td');
                payslipAmountNameTD.classList.add("px-1", "py-2"
                    , 'overflow-hidden','bg-gray-200')
                payslipAmountNameTD.style.maxWidth = "100px";
                const payslipAmountInputBox = document.createElement('input');
                payslipAmountInputBox.type = 'text'
                payslipAmountInputBox.name = `input_payslip_amount[${slip.id}]`;
                payslipAmountInputBox.value = slip.amount;
                payslipAmountInputBox.classList.add('border-0', 'w-fit'
                    , 'focus:ring-0','bg-gray-200')
                payslipAmountInputBox.readOnly = true;
                payslipAmountNameTD.appendChild(payslipAmountInputBox);
                tr.appendChild(payslipAmountNameTD);


                // create Waiver column
                const payslipWaiverTD = document.createElement('td');
                payslipWaiverTD.classList.add("px-1", "py-2"
                    , 'overflow-hidden','bg-gray-200')
                payslipWaiverTD.style.width = "10px";
                const payslipWaiverInputBox = document.createElement('input');
                payslipWaiverInputBox.readOnly = slip.due_amount ? true : false;
                payslipWaiverInputBox.classList.add(slip.due_amount ? "bg-gray-200" : "bg-white")
                payslipWaiverInputBox.style.width = "90px"
                payslipWaiverInputBox.type = 'text'
                payslipWaiverInputBox.name = `input_waiver[${slip.id}]`;
                payslipWaiverInputBox.value = slip.waiver;
                payslipWaiverInputBox.classList.add('w-fit', 'rounded-lg', 'bg-gray-50', 'border-0')
                payslipWaiverTD.appendChild(payslipWaiverInputBox);
                tr.appendChild(payslipWaiverTD);



                // create Payable column
                const payableAmountTD = document.createElement('td');
                payableAmountTD.classList.add("px-1", "py-2"
                    , 'overflow-hidden','bg-gray-200')
                payableAmountTD.style.maxWidth = "100px";
                const payableInputBox = document.createElement('input');
                payableInputBox.type = 'text'
                payableInputBox.name = `input_payable_amount[${slip.id}]`;
                payableInputBox.value = slip.payable;
                payableInputBox.classList.add('border-0', 'w-fit'
                    , 'focus:ring-0','bg-gray-200')
                payableInputBox.readOnly = true;
                payableAmountTD.appendChild(payableInputBox);
                tr.appendChild(payableAmountTD);


                // create previous Due Amount column
                const previousDueAmountTD = document.createElement('td');
                previousDueAmountTD.classList.add("px-1", "py-2"
                    , 'overflow-hidden','bg-gray-200')
                previousDueAmountTD.style.maxWidth = "80px";
                const previousDueAmountInputBox = document.createElement('input');
                previousDueAmountInputBox.style.width = "100%"
                previousDueAmountInputBox.type = 'text'
                previousDueAmountInputBox.name = `input_due_amount[${slip.id}]`;
                previousDueAmountInputBox.value = slip.due_amount > 0 ? slip.due_amount : 0;
                previousDueAmountInputBox.classList.add('border-0', 'w-fit'
                    , 'focus:ring-0','bg-gray-200')
                previousDueAmountInputBox.readOnly = true;
                previousDueAmountTD.appendChild(previousDueAmountInputBox);
                tr.appendChild(previousDueAmountTD);

                // create current Due Amount column
                const dueAmountTD = document.createElement('td');
                dueAmountTD.classList.add("px-1", "py-2"
                    , 'overflow-hidden','bg-gray-200')
                dueAmountTD.style.maxWidth = "80px";
                const dueAmountInputBox = document.createElement('input');
                dueAmountInputBox.style.width = "100%"
                dueAmountInputBox.type = 'text'
                dueAmountInputBox.name = `input_due_amount[${slip.id}]`;
                dueAmountInputBox.value = slip.due_amount > 0 ? slip.due_amount : slip.payable;
                dueAmountInputBox.classList.add('border-0', 'w-fit'
                    , 'focus:ring-0','bg-gray-200')
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
                currentPayInputBox.classList.add('w-fit', 'rounded-lg','bg-gray-200', 'border-0')
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
                    // collect fees null initially
                    full_paid.disabled = true;
                    full_paid.style.cursor = "not-allowed"
                    collect_fees.disabled = false;
                    collect_fees.style.cursor = "pointer"
                    collect_fees.classList.add("bg-gradient-to-br", "from-blue-600"
                        , "to-blue-500", "focus:ring-blue-300");

                    // make readonly the input field
                    collect_amount.readOnly = true;
                    collect_amount.classList.add("bg-gray-200");

                    const value = parseInt(event.target.value);
                    if (value >= 0) {
                        const dueAmount = parseInt(payableInputBox.value) - value;
                        dueAmountInputBox.value = dueAmount;

                        // t_current_pay.value = t_current_pay.value >= 0 ? parseInt(t_current_pay
                        //     .value) + value : value;

                        if (value > parseInt(payableInputBox.value)) {
                            alert("Invalid Amount");
                            const dueAmount = parseInt(payableInputBox.value)
                            dueAmountInputBox.value = dueAmount;
                            currentPayInputBox.value = "";
                        }
                    } else {
                        const dueAmount = parseInt(payableInputBox.value)
                        dueAmountInputBox.value = dueAmount;
                    }

                    calculateTotalCurrentPay();
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
                function distributeAmount(value) {
                    // collect fees null initially
                    full_paid.disabled = true;
                    full_paid.style.cursor = "not-allowed"
                    collect_fees.disabled = false;
                    collect_fees.style.cursor = "pointer"
                    collect_fees.classList.add("bg-gradient-to-br", "from-blue-600"
                        , "to-blue-500", "focus:ring-blue-300");

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
                        collectAmount = collectAmount - parseInt(dueAmountInputBox.value);
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
                    payslipWaiverInputBox.classList.remove('w-fit', 'rounded-lg', 'bg-gray-50', 'border-0')
                    payslipWaiverInputBox.classList.add('w-fit', 'rounded-lg','bg-gray-200', 'border-0', 'cursor-not-allowed')
                }

                // collect amount
                collect_amount.addEventListener('change', (event) => {
                    const value = parseInt(event.target.value);
                    distributeAmount(value);
                })

                // make operation on full paid checkbox
                full_paid.addEventListener('change', (e) => {
                    if (e.target.checked) {
                        full_paid.disabled = true;
                        full_paid.style.cursor = "not-allowed"
                        collect_amount.value = t_payable.value;
                        distributeAmount(parseInt(collect_amount.value));
                        collect_fees.disabled = false;
                        collect_fees.style.cursor = "pointer"
                        collect_fees.classList.remove("bg-gray-500");
                        collect_fees.classList.add("bg-gradient-to-br", "from-blue-600"
                            , "to-blue-500"
                            , "hover:bg-gradient-to-bl", "focus:ring-blue-300");
                    } else {
                        collect_amount.value = "";
                        collect_fees.disabled = true;
                        collect_fees.style.cursor = "not-allowed"
                        collect_fees.classList.remove("bg-gradient-to-br", "from-blue-600"
                            , "to-blue-500"
                            , "hover:bg-gradient-to-bl", "focus:ring-blue-300");
                        collect_fees.classList.add("bg-gray-500");
                    }
                });

                payablePaySlips.appendChild(tr);
            })


            // update content of the totalAmount, totalWaiver, totalPayable
            t_amount.value = totalAmount;
            t_waiver.value = totalWaiver;
            t_payable.value = totalPayable;
        }

        // calculating total current pay
        function calculateTotalCurrentPay() {
            console.log('calculating');
            const currentPayAmounts = document.querySelectorAll('input[name^="input_current_pay"]');
            let totalCurrentPay = 0;
            currentPayAmounts.forEach((input) => {
                totalCurrentPay += parseInt(input.value) || 0;
            });
            t_current_pay.value = totalCurrentPay;
        }


        // note change
        let changeAmount = document.getElementById('changeAmount');
        let returnAmount = document.getElementById('returnAmount');
        changeAmount.addEventListener('change', (event) => {
            if (t_current_pay.value > 0) {
                const change = parseInt(event.target.value);
                returnAmount.value = change - parseInt(t_current_pay.value);
            }
        })

        let resetVoucher = document.getElementById('resetVoucher');
        resetVoucher.addEventListener('click', () => {
            collect_amount.value = 0;
            PrintReadyBtn.click();

            // collect fees null
            collect_fees.disabled = true;
            collect_fees.style.cursor = "not-allowed"
            collect_fees.classList.remove("bg-gradient-to-br", "from-blue-600"
                , "to-blue-500", "focus:ring-blue-300");
            collect_fees.classList.add('bg-gray-500');

            // make readable the input field after click on the reset
            collect_amount.readOnly = false;
            collect_amount.classList.remove("bg-gray-200");

            // make reset input fields to empty
            t_current_pay.value = 0;
            returnAmount.value = '';
            changeAmount.value = '';

            // make unckeck the full paid checkbox
            full_paid.checked = false;
        })


        // update print page
        const print_page = document.getElementById('print_page');
        print_page.addEventListener('change', async (event) => {
            const printPage = event.target.value;
            console.log(printPage);
            const res = await fetch(
                `/dashboard/studentAccounts/paySlipCollection/updatePrintPage/${schoolCode}?printPage=${printPage}`
            )
            if (!res.ok) throw new Error('Network response was not ok');
            const data = await res.json();
        })
    })

</script>
