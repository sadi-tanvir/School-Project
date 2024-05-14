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
    </style>
    <div>
        <h1>Fees Generate</h1>
    </div>

    @include('Shared.alert')

    <form action="{{ route('generatePaySlip.store', $school_code) }}" method="POST">
        <div class="w-full border mx-auto p-5 space-y-10">

            <form action="" method="GET">
                {{-- <form action="{{ route('AllInformation.get', $school_code) }}" method="GET"> --}}
                @csrf
                <div class="grid grid-cols-12 items-center gap-5">
                    {{-- month --}}
                    <div class="">
                        <label for="month" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Month
                            :</label>
                        <select id="month" name="month"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Select</option>
                        </select>
                    </div>

                    {{-- year --}}
                    <div class="">
                        <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year
                            :</label>
                        <input type="text" value="" name="year" id="year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="" />
                    </div>

                    {{-- month_year --}}
                    <div class="mt-7">
                        <input type="text" value="" name="month_year" id="month_year"
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
                    <div class="">
                        <label for="class"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class:</label>
                        <select id="class" name="class"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Select</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Group --}}
                    <div class="">
                        <label for="group"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group:</label>
                        <select id="group" name="group"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select</option>
                            @foreach ($groups as $group)
                                <option {{ $group->group_name === 'N/A' ? 'selected' : '' }}
                                    value="{{ $group->group_name }}">
                                    {{ $group->group_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- PaySlip --}}
                    <div class="">
                        <label for="pay_slip_type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PaySlip
                            :</label>
                        <select id="pay_slip_type" name="pay_slip_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Select</option>
                        </select>
                    </div>

                    {{-- Session --}}
                    <div class="">
                        <label for="session" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Session
                            :</label>
                        <select id="session" name="session"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1">
                            <option selected>Select</option>
                            @foreach ($academicSessions as $session)
                                <option value="{{ $session->academic_session_name }}">{{ $session->academic_session_name }}
                                </option>
                            @endforeach
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
                        <label for="academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year
                            :</label>
                        <select id="academic_year" name="academic_year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select</option>
                        </select>
                    </div>



                    <div>
                        <button id="getInformation" type="submit"
                            class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl foc2024:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center uppercase mt-5">
                            get data
                        </button>
                    </div>
                </div>
            </form>


            @csrf
            <div class="space-y-1">
                <div class="bg-blue-200 text-center rounded-lg">
                    <h1 class="py-1">Transaction Data</h1>
                </div>
                <div class="">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                                <tr id="table_header_row">

                                </tr>
                            </thead>
                            <tbody id="table_body">

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


<script>
    document.addEventListener('DOMContentLoaded', () => {
        var schoolCode = {!! json_encode($school_code) !!};
        var academicYears = {!! json_encode($academicYears) !!};

        const month = document.getElementById('month');
        const year = document.getElementById('year');
        const month_year = document.getElementById('month_year');
        const last_pay_date = document.getElementById('last_pay_date');
        const student_class = document.getElementById('class');
        const student_group = document.getElementById('group');
        const getInformation = document.getElementById('getInformation');
        const session = document.getElementById('session');
        const academic_year = document.getElementById('academic_year');
        const table_header_row = document.getElementById('table_header_row');
        const table_body = document.getElementById('table_body');

        const currentYear = new Date().getFullYear();
        const currentMonth = new Date().getMonth();


        // set months
        const monthList = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august',
            'september', 'october',
            'november', 'december'
        ];
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
        student_class.addEventListener('change', (e) => {
            className = e.target.value;
            fetch(
                    `/dashboard/studentAccounts/getPaySlipData/${schoolCode}?class_name=${className}&group_name=${groupName}`
                )
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Handle the response data here
                    AllPaySlips = data;
                    updatePaySlipContent();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        })

        student_group.addEventListener('change', (e) => {
            groupName = e.target.value;
            fetch(
                    `/dashboard/studentAccounts/getPaySlipData/${schoolCode}?class_name=${className}&group_name=${groupName}`
                )
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    AllPaySlips = data;
                    updatePaySlipContent();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
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



        // set academic year
        academicYears.forEach((year) => {
            const yearOption = document.createElement('option');
            yearOption.value = year.academic_year_name;
            yearOption.textContent = year.academic_year_name;
            academic_year.appendChild(yearOption);
        })



        // get all information
        getInformation.addEventListener('click', (e) => {
            e.preventDefault();
            fetch(
                    `/dashboard/studentAccounts/getAllInformation/${schoolCode}?class_name=${className}&group_name=${groupName}&month_year=${month_year.value}&pay_slip_type=${pay_slip_type.value}&session=${session.value}&academic_year=${academic_year.value}`
                )
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    updateTableContent(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        })



        function updateTableContent(data) {
            // create header row
            // SL Column
            // Create a new checkbox input element
            table_header_row.innerHTML = "";
            const thCheckbox = document.createElement('th');
            thCheckbox.scope = "col"
            thCheckbox.classList.add("px-6", "py-3", "bg-blue-500");
            const headerCheckbox = document.createElement('input');
            headerCheckbox.type = 'checkbox';
            headerCheckbox.classList.add('w-4', 'h-4', 'bg-gray-100', 'border-gray-300',
                'rounded', 'focus:ring-blue-500', 'mt-2')
            headerCheckbox.id = "header_ceckbox"
            thCheckbox.appendChild(headerCheckbox)
            table_header_row.appendChild(thCheckbox);

            const th = document.createElement('th');
            th.classList.add('px-6', 'py-3', 'bg-blue-500');
            th.textContent = 'SL';
            table_header_row.appendChild(th);
            // create rest columns
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
                tr.classList.add('odd:bg-white', 'odd:dark:bg-gray-900', 'even:bg-gray-50',
                    'even:dark:bg-gray-800', 'border-b', 'dark:border-gray-700');

                // Create a new checkbox input element
                const checkboxCell = document.createElement('td');
                checkboxCell.classList.add("px-6", "py-4")
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = `select[${item.student_id}]`
                checkbox.classList.add('w-4', 'h-4', 'text-blue-600', 'bg-gray-100', 'border-gray-300',
                    'rounded', 'focus:ring-blue-500')
                checkboxCell.appendChild(checkbox)
                tr.appendChild(checkboxCell);

                // create serial index column
                const td = document.createElement('td');
                td.classList.add('px-6', 'py-4');
                td.textContent = index + 1;
                tr.appendChild(td);

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
