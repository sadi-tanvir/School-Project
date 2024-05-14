@extends('Backend.app')
@section('title')
    Generate Multiple Payslip
@endsection


@section('Dashboard')
    <div>
        <h1>Multiple Fees Generate</h1>
    </div>

    @include('Shared.alert')
    <div id="errorContainer"></div>
    <form action="{{ route('multiplePayslipData.store', $school_code) }}">
        @csrf

        <div class="w-full border mx-auto p-5 space-y-10">
            <form action="" method="">
                @csrf
                <div class="grid grid-cols-12 items-center gap-5">
                    {{-- month --}}
                    <div class="col-span-2">
                        <div class="p-4">
                            <label for="month" class="block text-sm font-medium text-zinc-700">Month:</label>
                            <div class="mt-1 relative">
                                <button type="button" id="toggleMonthDropdown"
                                    class="relative w-full bg-white border border-zinc-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <span class="block truncate">Select Month</span>
                                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                        <svg class="h-5 w-5 text-zinc-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                                <div id="monthDropdown"
                                    class="hidden absolute mt-1 w-full rounded-md bg-white shadow-lg  z-50">
                                    <ul id="monthUnorderedList" tabindex="-1" role="listbox"
                                        aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3"
                                        class="max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                                        <li class="text-zinc-900 cursor-default select-none relative py-2 pl-3 pr-9">
                                            <div class="flex items-center">
                                                <input id="month_select_all" type="checkbox"
                                                    class="h-4 w-4 text-indigo-600 border-zinc-300 rounded focus:ring-indigo-500">
                                                <label for="month_select_all" class="font-normal ml-3 block truncate">Select
                                                    All</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- year --}}
                    <div class="">
                        <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year
                            :</label>
                        <input type="text" value="" name="year" id="year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="" />
                    </div>

                    {{-- last pay date --}}
                    <div class="">
                        <label for="last_pay_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                            Pay
                            Date:</label>
                        <input type="date" value="" name="last_pay_date" id="last_pay_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="" />
                    </div>

                    {{-- class --}}
                    <div class="col-span-2">
                        <div class="p-4">
                            <label for="month" class="block text-sm font-medium text-zinc-700">Class:</label>
                            <div class="mt-1 relative">
                                <button type="button" id="toggleClassDropdown"
                                    class="relative w-full bg-white border border-zinc-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <span class="block truncate">Select Class</span>
                                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                        <svg class="h-5 w-5 text-zinc-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                                <div id="classDropdown"
                                    class="hidden absolute mt-1 w-full rounded-md bg-white shadow-lg  z-50">
                                    <ul id="classUnorderedList" tabindex="-1" role="listbox"
                                        aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3"
                                        class="max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                                        <li class="text-zinc-900 cursor-default select-none relative py-2 pl-3 pr-9">
                                            <div class="flex items-center">
                                                <input id="class_select_all" type="checkbox"
                                                    class="h-4 w-4 text-indigo-600 border-zinc-300 rounded focus:ring-indigo-500">
                                                <label for="class_select_all" class="font-normal ml-3 block truncate">Select
                                                    All</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- group --}}
                    <div class="">
                        <label for="group"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group:</label>
                        <select id="group" name="group"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select</option>
                        </select>
                    </div>

                    {{-- pay slip types --}}
                    <div class="">
                        <label for="pay_slip_type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PaySlip
                            :</label>
                        <select id="pay_slip_type" name="pay_slip_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select</option>
                        </select>
                    </div>

                    {{-- academic session --}}
                    <div class="">
                        <label for="academic_session"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Session
                            :</label>
                        <select id="academic_session" name="academic_session"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select</option>
                        </select>
                    </div>

                    {{-- status --}}
                    <div class="">
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status:</label>
                        <select id="status" name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select</option>
                            <option value="New">New</option>
                            <option value="Old">Old</option>
                        </select>
                    </div>

                    {{-- academic_year --}}
                    <div class="">
                        <label for="academic_year"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year
                            :</label>
                        <select id="academic_year" name="academic_year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select</option>
                        </select>
                    </div>

                    <div>
                        <button id="getInformation" type="submit"
                            class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase mt-5">
                            get data
                        </button>
                    </div>
                </div>
            </form>

            {{-- table --}}
            <div class="space-y-1">
                <div class="bg-blue-200 text-center rounded-lg">
                    <h1 class="py-1">Transaction Data</h1>
                </div>
                <div class="">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg h-auto max-h-[400px] overflow-scroll">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                            <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                                <tr id="table_header_row">
                                    <th scope="col" class="px-6 py-3">
                                        SL
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        MONTH.YEAR
                                    </th>
                                    <th scope="col" class="px-16 py-3">
                                        S. ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        STUDENT NAME
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        CLASS
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        ROLL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        TYPE
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
                                </tr>
                            </thead>
                            <tbody id="table_body" class="" style="height: 500px">

                            </tbody>
                        </table>
                    </div>

                    <div class="mt-20 flex justify-between">
                        <h1>
                            Total =
                            <input readonly type="number" value="" id="totalStudents"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1"
                                placeholder="" />
                        </h1>

                        <div class="flex space-x-10">

                            <button type="submit"
                                class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-16 py-1 text-center">
                                Save
                            </button>
                            <button type="button"
                                class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-16 py-1 text-center">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


{{-- month select field --}}
<script>
    // handle error message
    function showError(message) {
        const errorContainer = document.getElementById('errorContainer');
        const errorDiv = document.createElement('div');
        errorDiv.role = "alert";
        errorDiv.classList.add("p-4", "mb-4", "text-sm", "text-red-800", "rounded-lg", "bg-red-50", "dark:bg-gray-800",
            "dark:text-red-400");
        errorDiv.textContent = message;
        const errorMessage = document.createElement('div');
        errorMessage.classList.add("font-medium");
        errorDiv.appendChild(errorMessage);
        errorContainer.appendChild(errorDiv);
        setTimeout(() => {
            errorContainer.removeChild(errorDiv)
        }, 2000);
    }


    // handle dropdown menu
    document.addEventListener('DOMContentLoaded', () => {
        const toggleMonthDropdown = document.getElementById('toggleMonthDropdown');
        const monthDropdown = document.getElementById('monthDropdown');
        const toggleClassDropdown = document.getElementById('toggleClassDropdown');
        const classDropdown = document.getElementById('classDropdown');

        // Function to check if an element is a descendant of another element
        const isDescendant = (parent, child) => {
            let node = child.parentNode;
            while (node != null) {
                if (node === parent) {
                    return true;
                }
                node = node.parentNode;
            }
            return false;
        };

        // Toggle month dropdown
        toggleMonthDropdown.addEventListener('click', (event) => {
            // Prevent event propagation to the document click listener
            event.stopPropagation();

            monthDropdown.classList.toggle('hidden');
        });

        // Collapse dropdown when clicking outside of it
        document.addEventListener('click', (event) => {
            const target = event.target;
            const isToggle = target === toggleMonthDropdown;
            const isDropdown = target === monthDropdown || isDescendant(monthDropdown, target);

            if (!isToggle && !isDropdown) {
                monthDropdown.classList.add('hidden');
            }
        });



        // Toggle class dropdown
        toggleClassDropdown.addEventListener('click', (event) => {
            // Prevent event propagation to the document click listener
            event.stopPropagation();

            classDropdown.classList.toggle('hidden');
        });

        // Collapse dropdown when clicking outside of it
        document.addEventListener('click', (event) => {
            const target = event.target;
            const isToggle = target === toggleClassDropdown;
            const isDropdown = target === classDropdown || isDescendant(classDropdown, target);

            if (!isToggle && !isDropdown) {
                classDropdown.classList.add('hidden');
            }
        });
    })



    document.addEventListener('DOMContentLoaded', () => {
        const schoolCode = {!! json_encode($school_code) !!};
        const classes = {!! json_encode($classes) !!};
        const groups = {!! json_encode($groups) !!};
        const PaySlipTypes = {!! json_encode($PaySlipTypes) !!};
        const academicSessions = {!! json_encode($academicSessions) !!};
        const academicYears = {!! json_encode($academicYears) !!};

        const monthUnorderedList = document.getElementById('monthUnorderedList');
        const month_select_all = document.getElementById('month_select_all');
        const classUnorderedList = document.getElementById('classUnorderedList');
        const class_select_all = document.getElementById('class_select_all');
        const group = document.getElementById('group');
        const pay_slip_type = document.getElementById('pay_slip_type');
        const academic_session = document.getElementById('academic_session');

        const currentYear = new Date().getFullYear();

        // set year
        year.value = currentYear;

        // set months
        const monthList = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august',
            'september', 'october', 'november', 'december'
        ];

        monthList.forEach(element => {
            const monthLi = document.createElement('li');
            monthLi.classList.add("text-zinc-900", "cursor-default", "select-none", "relative", "py-2",
                "pl-3",
                "pr-9");
            const monthDiv = document.createElement('div');
            monthDiv.classList.add("flex", "items-center");

            const checkboxCell = document.createElement('input');
            checkboxCell.type = "checkbox";
            checkboxCell.id = element;
            checkboxCell.name = "month_row_checkbox";
            checkboxCell.classList.add("h-4", "w-4", "text-indigo-600", "border-zinc-300", "rounded",
                "focus:ring-indigo-500")

            const checkboxLabel = document.createElement('label');
            checkboxLabel.htmlFor = element;
            checkboxLabel.classList.add("block", "text-sm", "text-zinc-700", "w-full", "pl-3")
            checkboxLabel.textContent = element;

            monthDiv.appendChild(checkboxCell);
            monthDiv.appendChild(checkboxLabel);
            monthLi.appendChild(monthDiv);


            monthUnorderedList.appendChild(monthLi);

            const monthRowCheckboxes = document.querySelectorAll(
                `input[type="checkbox"][name^="month_row_checkbox"]`);
            month_select_all.addEventListener('change', () => {
                monthRowCheckboxes.forEach((checkbox) => {
                    checkbox.checked = month_select_all.checked;
                })
            })
        });


        // set class
        classes.forEach(element => {
            const classLi = document.createElement('li');
            classLi.classList.add("text-zinc-900", "cursor-default", "select-none", "relative", "py-2",
                "pl-3",
                "pr-9");
            const classDiv = document.createElement('div');
            classDiv.classList.add("flex", "items-center");

            const checkboxCell = document.createElement('input');
            checkboxCell.type = "checkbox";
            checkboxCell.id = element.class_name;
            checkboxCell.name = "class_row_checkbox";
            checkboxCell.classList.add("h-4", "w-4", "text-indigo-600", "border-zinc-300", "rounded",
                "focus:ring-indigo-500")

            const checkboxLabel = document.createElement('label');
            checkboxLabel.htmlFor = element.class_name;
            checkboxLabel.classList.add("block", "text-sm", "text-zinc-700", "w-full", "pl-3")
            checkboxLabel.textContent = element.class_name;

            classDiv.appendChild(checkboxCell);
            classDiv.appendChild(checkboxLabel);
            classLi.appendChild(classDiv);


            classUnorderedList.appendChild(classLi);

            const classRowCheckboxes = document.querySelectorAll(
                `input[type="checkbox"][name^="class_row_checkbox"]`);
            class_select_all.addEventListener('change', () => {
                classRowCheckboxes.forEach((checkbox) => {
                    checkbox.checked = class_select_all.checked;
                })
            })
        });


        // set groups
        groups.forEach((item) => {
            const groupOption = document.createElement('option');
            groupOption.value = item.group_name;
            // if (item.group_name === 'N/A') groupOption.selected = true;
            groupOption.textContent = item.group_name;
            group.appendChild(groupOption);
        });

        // set payslip type
        PaySlipTypes.forEach((paySlip) => {
            const paySlipOption = document.createElement('option');
            paySlipOption.value = paySlip.pay_slip_type_name;
            paySlipOption.textContent = paySlip.pay_slip_type_name;
            pay_slip_type.appendChild(paySlipOption);
        })


        // set academic session
        academicSessions.forEach((session) => {
            const sessionOption = document.createElement('option');
            sessionOption.value = session.academic_session_name;
            sessionOption.textContent = session.academic_session_name;
            academic_session.appendChild(sessionOption);
        })

        // set academic year
        academicYears.forEach((year) => {
            const yearOption = document.createElement('option');
            yearOption.value = year.academic_year_name;
            yearOption.textContent = year.academic_year_name;
            academic_year.appendChild(yearOption);
        })

        // Function to get all selected months
        const getSelectedMonths = () => {
            const selectedMonths = [];
            const monthRowCheckboxes = document.querySelectorAll(
                'input[type="checkbox"][name="month_row_checkbox"]');
            monthRowCheckboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    selectedMonths.push(checkbox.id);
                }
            });
            return selectedMonths;
        };

        // Function to get all selected classes
        const getSelectedClasses = () => {
            const selectedClasses = [];
            const classRowCheckboxes = document.querySelectorAll(
                'input[type="checkbox"][name="class_row_checkbox"]');
            classRowCheckboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    selectedClasses.push(checkbox.id);
                }
            });
            return selectedClasses;
        };

        let selectedClasses = []
        let selectedMonths = [];

        // get all information
        getInformation.addEventListener('click', (e) => {
            e.preventDefault();
            // get all selected classes
            selectedClasses = getSelectedClasses();
            selectedMonths = getSelectedMonths();
            fetch(
                    `/dashboard/studentAccounts/getStudentInformation/${schoolCode}?months=${selectedMonths}&classes=${selectedClasses}&group=${group.value}&pay_slip_type=${pay_slip_type.value}&year=${year.value}&academic_session=${academic_session.value}&academic_year=${academic_year.value}`
                )
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.length <= 0) {
                        showError('There is no data found')
                        return;
                    }
                    console.log(data);
                    updateTableContent(data)
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        })

        function updateTableContent(data) {
            // create dynamic row
            table_body.innerHTML = "";
            let slColumn = 1;
            monthList.forEach((month) => {
                data[month]?.forEach(element => {
                    if (element.students.length > 0) {
                        // console.log(element);
                        element.students.forEach((student, index) => {
                            if (student.pay_slip_amount > 0) {
                                console.log(student);
                                const tr = document.createElement('tr');
                                tr.classList.add('odd:bg-white', 'odd:dark:bg-gray-900',
                                    'even:bg-gray-50',
                                    'even:dark:bg-gray-800', 'border-b',
                                    'dark:border-gray-700');


                                // create serial index column
                                const serialTD = document.createElement('td');
                                serialTD.classList.add('px-6', 'py-4');
                                serialTD.textContent = slColumn++;
                                tr.appendChild(serialTD);

                                // create month_year column
                                const monthYearTD = document.createElement('td');
                                monthYearTD.classList.add("px-6", "py-4",
                                    'overflow-hidden')
                                monthYearTD.style.maxWidth = "100px";
                                const monthYearInputBox = document.createElement(
                                    'input');
                                monthYearInputBox.type = 'text'
                                monthYearInputBox.name =
                                    `input_month_year[${student.nedubd_student_id}][${student.month_year}]`;
                                monthYearInputBox.value = student.month_year;
                                monthYearInputBox.classList.add('border-0', 'w-fit',
                                    'focus:ring-0')
                                monthYearInputBox.readOnly = true;
                                monthYearTD.appendChild(monthYearInputBox);
                                tr.appendChild(monthYearTD);


                                // create student_id column
                                const studentId_TD = document.createElement('td');
                                studentId_TD.style.maxWidth = "100px";
                                studentId_TD.classList.add("px-6", "py-4",
                                    'overflow-hidden')
                                const studentIdInputBox = document.createElement(
                                    'input');
                                studentIdInputBox.type = 'text'
                                studentIdInputBox.name =
                                    `input_nedubd_student_id[${student.nedubd_student_id}]`;
                                studentIdInputBox.value = student.nedubd_student_id;
                                studentIdInputBox.classList.add('border-0', 'w-fit',
                                    'focus:ring-0')
                                studentIdInputBox.readOnly = true;
                                studentId_TD.appendChild(studentIdInputBox);
                                tr.appendChild(studentId_TD);


                                // create STUDENT NAME column
                                const studentName_TD = document.createElement('td');
                                studentName_TD.style.maxWidth = "100px";
                                studentName_TD.classList.add("px-6", "py-4",
                                    'overflow-hidden')
                                const studentNameInputBox = document.createElement(
                                    'input');
                                studentNameInputBox.type = 'text'
                                studentNameInputBox.name =
                                    `input_name[${student.nedubd_student_id}]`;
                                studentNameInputBox.value = student.name;
                                studentNameInputBox.classList.add('border-0', 'w-fit',
                                    'focus:ring-0')
                                studentNameInputBox.readOnly = true;
                                studentName_TD.appendChild(studentNameInputBox);
                                tr.appendChild(studentName_TD);


                                // create student class column
                                const studentClass_TD = document.createElement('td');
                                studentClass_TD.style.maxWidth = "100px";
                                studentClass_TD.classList.add("px-6", "py-4",
                                    'overflow-hidden')
                                const studentClassInputBox = document.createElement(
                                    'input');
                                studentClassInputBox.type = 'text'
                                studentClassInputBox.name =
                                    `input_Class_name[${student.nedubd_student_id}]`;
                                studentClassInputBox.value = student.Class_name;
                                studentClassInputBox.classList.add('border-0', 'w-fit',
                                    'focus:ring-0')
                                studentClassInputBox.readOnly = true;
                                studentClass_TD.appendChild(studentClassInputBox);
                                tr.appendChild(studentClass_TD);



                                // create student roll column
                                const studentRoll_TD = document.createElement('td');
                                studentRoll_TD.style.maxWidth = "100px";
                                studentRoll_TD.classList.add("px-6", "py-4",
                                    'overflow-hidden')
                                const studentRollInputBox = document.createElement(
                                    'input');
                                studentRollInputBox.type = 'text'
                                studentRollInputBox.name =
                                    `input_student_roll[${student.nedubd_student_id}]`;
                                studentRollInputBox.value = student.student_roll;
                                studentRollInputBox.classList.add('border-0', 'w-fit',
                                    'focus:ring-0')
                                studentRollInputBox.readOnly = true;
                                studentRoll_TD.appendChild(studentRollInputBox);
                                tr.appendChild(studentRoll_TD);


                                // create payslip type column
                                const payslipType_TD = document.createElement('td');
                                payslipType_TD.style.maxWidth = "100px";
                                payslipType_TD.classList.add("px-6", "py-4",
                                    'overflow-hidden')
                                const payslipTypeInputBox = document.createElement(
                                    'input');
                                payslipTypeInputBox.type = 'text'
                                payslipTypeInputBox.name =
                                    `input_pay_slip_type[${student.nedubd_student_id}]`;
                                payslipTypeInputBox.value = student.pay_slip_type;
                                payslipTypeInputBox.classList.add('border-0', 'w-fit',
                                    'focus:ring-0')
                                payslipTypeInputBox.readOnly = true;
                                payslipType_TD.appendChild(payslipTypeInputBox);
                                tr.appendChild(payslipType_TD);




                                // create payslip amount column
                                const payslipAmount_TD = document.createElement('td');
                                payslipAmount_TD.style.maxWidth = "100px";
                                payslipAmount_TD.classList.add("px-6", "py-4",
                                    'overflow-hidden')
                                const payslipAmountInputBox = document.createElement(
                                    'input');
                                payslipAmountInputBox.type = 'text'
                                payslipAmountInputBox.name =
                                    `input_pay_slip_amount[${student.nedubd_student_id}]`;
                                payslipAmountInputBox.value = student.pay_slip_amount;
                                payslipAmountInputBox.classList.add('border-0', 'w-fit',
                                    'focus:ring-0')
                                payslipAmountInputBox.readOnly = true;
                                payslipAmount_TD.appendChild(payslipAmountInputBox);
                                tr.appendChild(payslipAmount_TD);



                                // create student WAIVER column
                                const waiverAmount_TD = document.createElement('td');
                                waiverAmount_TD.style.maxWidth = "100px";
                                waiverAmount_TD.classList.add("px-6", "py-4",
                                    'overflow-hidden')
                                const waiverAmountInputBox = document.createElement(
                                    'input');
                                waiverAmountInputBox.type = 'text'
                                waiverAmountInputBox.name =
                                    `input_waiver[${student.nedubd_student_id}]`;
                                waiverAmountInputBox.value = student.waiver;
                                waiverAmountInputBox.classList.add('border-0', 'w-fit',
                                    'focus:ring-0')
                                waiverAmountInputBox.readOnly = true;
                                waiverAmount_TD.appendChild(waiverAmountInputBox);
                                tr.appendChild(waiverAmount_TD);



                                // create student PAYABLE column
                                const payableAmount_TD = document.createElement('td');
                                payableAmount_TD.style.maxWidth = "100px";
                                payableAmount_TD.classList.add("px-6", "py-4",
                                    'overflow-hidden')
                                const payableAmountInputBox = document.createElement(
                                    'input');
                                payableAmountInputBox.type = 'text'
                                payableAmountInputBox.name =
                                    `input_payable[${student.nedubd_student_id}]`;
                                payableAmountInputBox.value = student.pay_slip_amount -
                                    student.waiver;
                                payableAmountInputBox.classList.add('border-0', 'w-fit',
                                    'focus:ring-0')
                                payableAmountInputBox.readOnly = true;
                                payableAmount_TD.appendChild(payableAmountInputBox);
                                tr.appendChild(payableAmount_TD);
                                // console.log('student_payable_amount_key ----',
                                // student_payable_amount_key);



                                // hidden input fields
                                const studentGroup_TD = document.createElement('td');
                                studentGroup_TD.style.maxWidth = "100px";
                                studentGroup_TD.classList.add("px-6", "py-4", 'hidden')
                                const studentGroupInputBox = document.createElement(
                                    'input');
                                studentGroupInputBox.type = 'text'
                                studentGroupInputBox.name =
                                    `input_group[${student.nedubd_student_id}]`;
                                studentGroupInputBox.value = student.group;
                                studentGroupInputBox.classList.add('border-0', 'w-fit',
                                    'hidden')
                                studentGroupInputBox.readOnly = true;
                                studentGroup_TD.appendChild(studentGroupInputBox);
                                tr.appendChild(studentGroup_TD);




                                // append table row into the table body
                                table_body.appendChild(tr);

                                totalStudents.value = slColumn - 1;
                            }
                        })
                    }
                });
            })
        }
    });





    document.addEventListener("DOMContentLoaded", function() {
        const last_pay_date = document.getElementById('last_pay_date');
        const desiredMonth = new Date().getMonth();
        const desiredYear = new Date().getFullYear();

        const lastPayDate = new Date(desiredYear, desiredMonth, 10 + 1);

        const formattedDate =
            `${String(lastPayDate.getMonth() + 1).padStart(2, '0')}-${String(lastPayDate.getDate()).padStart(2, '0')}-${lastPayDate.getFullYear()}`;

        document.getElementById('last_pay_date').value = lastPayDate.toISOString().slice(0, 10);
    });
</script>

{{--
function updateTableContent(data) {
    // table header content
    const th = document.createElement('th');
    th.classList.add('px-6', 'py-3', 'bg-blue-500');
    th.textContent = 'SL';
    table_header_row.appendChild(th);
    const dynamicHeading = data[selectedMonths[0]][0].students[0];
    Object.keys(dynamicHeading).forEach(item => {
        const th = document.createElement('th');
        th.scope = "col"
        th.classList.add('px-2', 'py-3', 'bg-blue-500');
        th.textContent = item;
        table_header_row.appendChild(th);
    })

    // create dynamic row

    // table_body.innerHTML = "";
    monthList.forEach((month) => {
        data[month].forEach(element => {
            if (element.students.length > 0) {
                element.students.forEach((item, index) => {
                    // console.log(element2.Class_name, element2.month_year);
                    console.log(item);
                    const tr = document.createElement('tr');
                    tr.classList.add('odd:bg-white', 'odd:dark:bg-gray-900',
                        'even:bg-gray-50',
                        'even:dark:bg-gray-800', 'border-b',
                        'dark:border-gray-700');


                    // create serial index column
                    const td = document.createElement('td');
                    td.classList.add('px-6', 'py-4');
                    td.textContent = index + 1;
                    tr.appendChild(td);

                    // creating rest columns
                    Object.values(item).forEach((element, index) => {
                        let currentKey = "";
                        for (const key in student) {
                            if (student[key] === element) {
                                currentKey = key;
                                break;
                            }
                        }
                        const td = document.createElement('td');
                        td.classList.add("px-6", "py-4", 'overflow-hidden')
                        const inputBox = document.createElement(
                            'input');
                        inputBox.type = 'text'
                        inputBox.name =
                            `input_${currentKey}[${student.student_id}]`;
                        inputBox.value = element;
                        inputBox.classList.add('border-0', 'w-fit', 'focus:ring-0')
                        inputBox.readOnly = true;
                        td.appendChild(inputBox);
                        tr.appendChild(td);
                    });

                    table_body.appendChild(tr);
                })
            }
        });
    })
} --}}
