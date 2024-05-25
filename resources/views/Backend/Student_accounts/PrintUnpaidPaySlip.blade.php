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
        <h1>Unpaid Payslip</h1>
    </div>


    <div class="w-3/5 border mx-auto p-5">
        <form class="" action="{{ route('UnpaidInvoice.print', $school_code) }}" method="GET">
            @csrf
            <div class="font-bold">
                <h3>Student Information</h3>
            </div>
            <div class="w-full grid grid-cols-5 gap-5">
                <div class="col-span-3 border py-5 px-2 space-y-3 flex flex-col rounded-lg shadow">
                    <div class="">
                        <label for="year" class="block mb-2 text-sm font-medium whitespace-noWrap ">Year: <span
                                class="text-red-500">*</span></label>
                        <select id="year" name="year"
                            class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                            <option selected>Select</option>
                            @foreach ($years as $year)
                                <option {{ date('Y') == $year->year ? 'selected' : '' }} value="{{ $year->year }}">
                                    {{ $year->year }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- class --}}
                    <div class="">
                        <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class
                            : <span class="text-red-500">*</span></label>
                        <select id="class" name="class"
                            class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                            <option selected>Select</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->Class_name }}">{{ $class->Class_name }}</option>
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
                                <option value="{{ $section->section }}">{{ $section->section }}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    {{-- group --}}
                    <div class="">
                        <label for="group" class="block mb-2 text-sm font-medium whitespace-noWrap ">groups
                            :</label>
                        <select id="group" name="group"
                            class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                            <option selected>Select</option>
                        </select>
                    </div>

                    {{-- Student Roll --}}
                    <div class="">
                        <label for="student_roll" class="block mb-2 text-sm font-medium whitespace-noWrap ">Student Roll:
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="autocomplete w-full relative">
                            <input type="text" name="student_roll" id="student_roll" placeholder="Search..."
                                class="w-full py-2 px-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                            <div id="autocomplete-list" class="autocomplete-list hidden"></div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <label for="last_payment_date" class="text-sm font-medium text-gray-600 ">Last Payment Date:</label>
                        <input type="date" value="{{ date('Y-m-d') }}" name="last_payment_date" id="last_payment_date"
                            class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 "
                            placeholder="student class" />
                    </div>
                </div>

                <div class="w-full col-span-2 relative">

                    <div class="flex flex-col">
                        {{-- <div id="hidden-inputs"></div> --}}
                        <div class="w-full border p-5 space-y-3  rounded-lg">
                            <span>Select Payslip</span>
                            <div class="flex items-center">
                                <input id="headerCheckBox" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                <label for="headerCheckBox" class="ms-2 text-sm font-medium text-gray-900">Select
                                    All</label>
                            </div>
                            <div id="payslip-box" class="ml-5"></div>
                        </div>
                        <input id="student_id" type="text" name="student_id" class="hidden" value="">
                        <button id="" type="submit"
                            class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center mx-auto mt-5">Print</button>
                    </div>


                    <div class="absolute bottom-0 right-0">
                        <label for="print_page" class="block mb-2 text-sm font-medium whitespace-noWrap ">Print
                            Page
                            :</label>
                        <select id="print_page" name="print_page"
                            class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-32 p-1">
                            <option disabled selected>Select</option>
                            <option {{ $schoolInfo->number_of_print_page == 1 ? 'selected' : '' }} class="text-center"
                                value="1">
                                One Page</option>
                            <option {{ $schoolInfo->number_of_print_page == 2 ? 'selected' : '' }} class="text-center"
                                value="2">
                                Two Page</option>
                            <option {{ $schoolInfo->number_of_print_page == 3 ? 'selected' : '' }} class="text-center"
                                value="3">
                                Three Page</option>
                        </select>
                    </div>
                </div>


            </div>

        </form>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', () => {
        var schoolCode = {!! json_encode($school_code) !!};

        const year = document.getElementById('year');
        const classId = document.getElementById('class');
        const sectionId = document.getElementById('section');
        const groupId = document.getElementById('group');
        const getPaySlipData = document.getElementById('getPaySlipData');
        const student_roll = document.getElementById('student_roll');
        const headerCheckBox = document.getElementById('headerCheckBox');
        const PaySlipBox = document.getElementById('payslip-box');

        let selectedPayslips = [];


        // Fetch and update section and group based on selected class
        classId.addEventListener('change', async (e) => {
            try {
                const className = e.target.value;
                getAllStudentPaySlips(className, null, null);

                const res = await fetch(
                    `/dashboard/studentAccounts/printUnpaidPaySlip/getSectionAndGroup/${schoolCode}?class_name=${className}&year=${year.value}`
                );
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                UpdateSectionOption(data.section);
                UpdateGroupOption(data.group);
                UpdateStudentRoll(data.student_info);
            } catch (error) {
                console.error('Error:', error);
            }
        });

        // Fetch and update student roll based on selected section
        sectionId.addEventListener('change', async (e) => {
            try {
                const sectionName = e.target.value;
                getAllStudentPaySlips(classId.value, sectionName, null);

                const res = await fetch(
                    `/dashboard/studentAccounts/printUnpaidPaySlip/getStudentRoll/${schoolCode}?class=${classId.value}&section=${sectionName}&group=${groupId.value}`
                );
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                UpdateStudentRoll(data.student_info);
            } catch (error) {
                console.error('Error:', error);
            }
        });


        // Fetch and update student roll based on selected group
        groupId.addEventListener('change', async (e) => {
            try {
                const groupName = e.target.value;
                getAllStudentPaySlips(classId.value, sectionId.value === "Select" ? null : sectionId
                    .value,
                    groupName);

                const res = await fetch(
                    `/dashboard/studentAccounts/printUnpaidPaySlip/getStudentRoll/${schoolCode}?class=${classId.value}&section=${sectionId.value}&group=${groupName}`
                );
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                UpdateStudentRoll(data.student_info);
            } catch (error) {
                console.error('Error:', error);
            }
        });

        // Update section options
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

        // Update group options
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

        // get multiple student payslips
        async function getAllStudentPaySlips(class_name, section, group) {
            const res = await fetch(
                `/dashboard/studentAccounts/printUnpaidPaySlip/getAllStudentUnpaidPayslip/${schoolCode}?class_name=${class_name}&section=${section ? section : ''}&group=${group ? group : ''}&year=${year.value}`
            );
            if (!res.ok) throw new Error('Network response was not ok');
            const data = await res.json();
            ShowMultipleStudentPaySlips(data.paySlips);
            console.log('with all payslips', data);
        }
        // show multiple student payslips
        function ShowMultipleStudentPaySlips(payslips) {
            PaySlipBox.innerHTML = "";
            selectedPayslips = [];
            payslips.forEach((payslip, index) => {
                const payslipDiv = document.createElement('div');
                payslipDiv.classList.add('flex', 'items-center', 'mt-2');
                const payslipCheckBox = document.createElement('input');
                payslipCheckBox.type = 'checkbox';
                payslipCheckBox.value = payslip.pay_slip_type + '-' + payslip.month + '-' + payslip.year;
                payslipCheckBox.id = payslip.pay_slip_type + '-' + payslip.month + '-' + payslip.year;
                payslipCheckBox.name =
                    `payslip-[]`;
                payslipCheckBox.classList.add('w-4', 'h-4', 'text-blue-600', 'bg-gray-100',
                    'border-gray-300', 'rounded', 'focus:ring-blue-500');
                const payslipLabel = document.createElement('label');
                payslipLabel.htmlFor = payslip.pay_slip_type + '-' + payslip.month + '-' + payslip.year;
                payslipLabel.classList.add('ms-2', 'text-sm', 'font-medium', 'text-gray-900');
                payslipLabel.textContent = payslip.pay_slip_type + ' - ' + payslip.month + ' - ' + payslip.year;
                payslipDiv.appendChild(payslipCheckBox);
                payslipDiv.appendChild(payslipLabel);
                PaySlipBox.appendChild(payslipDiv);


                payslipCheckBox.addEventListener('change', (e) => {
                    if (e.target.checked) {
                        selectedPayslips.push(e.target.value);
                    } else {
                        selectedPayslips = selectedPayslips.filter(
                            payslip => payslip !== e
                            .target.value);
                    }
                });

                // hiddne inputs
                const hiddenInputs = document.getElementById('hidden-inputs');
                selectedPayslips.forEach(payslip => {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'text';
                    hiddenInput.name = `payslips[]`;
                    hiddenInput.value = payslip;
                    hiddenInputs.appendChild(hiddenInput);
                });
            });
        }





        // Update student roll
        function UpdateStudentRoll(students) {
            const autocompleteList = document.getElementById('autocomplete-list');
            student_roll.value = "";

            // Function to show autocomplete suggestions
            function showAutocompleteSuggestions() {
                const inputValue = student_roll.value.toLowerCase();
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
                            student_roll.value = item.nedubd_student_id;
                            autocompleteList.classList.add('hidden');

                            // Manually trigger input event
                            const event = new Event('input', {
                                bubbles: true
                            });
                            student_roll.dispatchEvent(event);
                        });
                        autocompleteList.appendChild(listItem);
                    });
                    autocompleteList.classList.remove('hidden');
                } else {
                    autocompleteList.classList.add('hidden');
                }
            }

            // Show all data when the field is clicked
            student_roll.addEventListener('click', () => {
                autocompleteList.innerHTML = '';
                students.forEach(item => {
                    const listItem = document.createElement('div');
                    listItem.textContent = item.student_roll + " - " + item.name;
                    listItem.classList.add('autocomplete-list-item');
                    listItem.addEventListener('click', () => {
                        student_roll.value = item.nedubd_student_id;
                        autocompleteList.classList.add('hidden');

                        // Manually trigger input event
                        const event = new Event('input', {
                            bubbles: true
                        });
                        student_roll.dispatchEvent(event);
                    });
                    autocompleteList.appendChild(listItem);
                });
                autocompleteList.classList.remove('hidden');
            });

            // Event listener for input field
            student_roll.addEventListener('input', showAutocompleteSuggestions);

            // Hide autocomplete list on click outside
            document.addEventListener('click', (event) => {
                if (!autocompleteList.contains(event.target) && event.target !== student_roll) {
                    autocompleteList.classList.add('hidden');
                }
            });
        }

        // Get payslip data on student roll input
        const studentId = document.getElementById('student_id');
        student_roll.addEventListener('input', async (e) => {
            try {
                const student_id = e.target.value;
                studentId.value = student_id;
                const res = await fetch(
                    `/dashboard/studentAccounts/printUnpaidPaySlip/getUnpaidPayslip/${schoolCode}?class_name=${classId.value}&section=${sectionId.value}&group=${sectionId.value}&student_id=${student_id}&year=${year.value}`
                );
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                ShowSingleStudentPaySlips(data.paySlips);
            } catch (error) {
                console.error('Error:', error);
            }
        });



        // show payslip data
        function ShowSingleStudentPaySlips(payslips) {
            console.log('payslips', payslips);
            PaySlipBox.innerHTML = "";
            selectedPayslips = [];
            payslips.forEach(payslip => {
                const payslipDiv = document.createElement('div');
                payslipDiv.classList.add('flex', 'items-center', 'mt-2');
                const payslipCheckBox = document.createElement('input');
                payslipCheckBox.type = 'checkbox';
                payslipCheckBox.value = payslip.pay_slip_type + '-' + payslip.month + '-' + payslip.year;
                payslipCheckBox.id =  payslip.pay_slip_type + '-' + payslip.month + '-' + payslip.year;
                payslipCheckBox.name = `payslip-[${payslip.id}]`;
                payslipCheckBox.classList.add('w-4', 'h-4', 'text-blue-600', 'bg-gray-100',
                    'border-gray-300', 'rounded', 'focus:ring-blue-500');
                const payslipLabel = document.createElement('label');
                payslipLabel.htmlFor =  payslip.pay_slip_type + '-' + payslip.month + '-' + payslip.year;
                payslipLabel.classList.add('ms-2', 'text-sm', 'font-medium', 'text-gray-900');
                payslipLabel.textContent =  payslip.pay_slip_type + ' - ' + payslip.month + ' - ' + payslip.year;
                payslipDiv.appendChild(payslipCheckBox);
                payslipDiv.appendChild(payslipLabel);
                PaySlipBox.appendChild(payslipDiv);


                payslipCheckBox.addEventListener('change', (e) => {
                    if (e.target.checked) {
                        selectedPayslips.push(e.target.value);
                    } else {
                        selectedPayslips = selectedPayslips.filter(
                            payslip => payslip !== e
                            .target.value);
                    }
                });

                // hiddne inputs
                const hiddenInputs = document.getElementById('hidden-inputs');
                selectedPayslips.forEach(payslip => {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'text';
                    hiddenInput.name = `payslips[]`;
                    hiddenInput.value = payslip;
                    hiddenInputs.appendChild(hiddenInput);
                });
            });
        }
        // select all payslips
        headerCheckBox.addEventListener('click', () => {
            const checkBoxes = document.querySelectorAll('input[type="checkbox"][name^="payslip-"');
            if (headerCheckBox.checked) {
                checkBoxes.forEach(checkbox => {
                    checkbox.checked = true;
                    if (!selectedPayslips.includes(checkbox.value))
                        selectedPayslips.push(
                            checkbox.value);

                });
            } else {
                checkBoxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                selectedPayslips = [];
            }
            console.log('selectedPayslips', selectedPayslips);
        });

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
    });
</script>
