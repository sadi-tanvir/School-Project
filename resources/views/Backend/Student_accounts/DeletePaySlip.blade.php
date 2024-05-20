@extends('Backend.app')
@section('title')
    Delete Pay Slip
@endsection


@section('Dashboard')
    {{-- alert message --}}
    <div id="success-alert"
        class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 absolute top-20 right-10 z-50 w-96 shadow-xl"
        role="alert">
        <span class="font-medium">Pay slip voucher deleted successfully.</span>
    </div>

    <div class="w-full border mx-auto p-5 space-y-10">
        <h1 class="text-center text-3xl font-semibold text-gray-500">Delete Payslip</h1>
        <div class="w-full flex justify-between items-center gap-5">
            <div class="space-y-2 mt-6 flex space-x-3">
                <div>
                    <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Voucher No. :</label>
                    <input type="text" value="" name="voucher_number" id="voucher_number"
                        class="px-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-fit"
                        placeholder="#V66497828B6A6B" />
                </div>
                <div>
                    <button id="get_payslip_using_voucherNo" type="button"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center uppercase mt-5">
                        Search
                    </button>
                </div>
            </div>
            <div class="w-[400px] grid grid-cols-3 gap-5">
                <div>
                    <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Date From
                        :</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center mt-3">
                            <input type="date" value="{{ date('Y-m-d') }}" name="date_from" id="date_from"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" />
                        </div>
                    </div>
                </div>
                <div>
                    <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap">To
                        :</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center mt-3">
                            <input type="date" value="{{ date('Y-m-d') }}" name="date_to" id="date_to"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" />
                        </div>
                    </div>
                </div>
                <div>
                    <button id="get_payslip_using_date" type="button"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center uppercase mt-6">
                        Search
                    </button>
                </div>
            </div>
        </div>

        <div class="space-y-1">
            <div class="bg-blue-200 text-center">
                <h5 class="py-1">PAYSLIP LIST</h5>
            </div>
            <div class="">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        <input id="headerCheckbox" name="headerCheckbox" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Student ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    CLASS </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    GROUP
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Voucher
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Collect_Date
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Waiver
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Paid
                                </th>
                            </tr>
                        </thead>
                        <tbody id="table_body" class="" style=""></tbody>
                    </table>
                </div>

                <div class="mt-32 mr-32">
                    <div class="flex space-x-16 justify-end">
                        <button id="delete_payslip" type=""
                            class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center">
                            Delete
                        </button>
                        <h1 class="">
                            Total = <span id="total_payslip_count">0</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const schoolCode = {!! json_encode($school_code) !!};
        const successAlert = document.getElementById('success-alert');
        const voucher_number = document.getElementById('voucher_number');
        const get_payslip_using_voucherNo = document.getElementById('get_payslip_using_voucherNo');
        const date_from = document.getElementById('date_from');
        const date_to = document.getElementById('date_to');
        const get_payslip_using_date = document.getElementById('get_payslip_using_date');
        const delete_payslip = document.getElementById('delete_payslip');
        const total_payslip_count = document.getElementById('total_payslip_count');

        // make alert message hidden initially
        successAlert.style.display = 'none';

        // get payslips using voucher number
        get_payslip_using_voucherNo.addEventListener('click', async function(e) {
            e.preventDefault();
            if (voucher_number.value.length > 0) getPaySlipData();
        });

        // get payslips using date
        get_payslip_using_date.addEventListener('click', async function(e) {
            e.preventDefault();
            getPaySlipData();
        });
        // common function to get payslip data
        async function getPaySlipData() {
            try {
                let res;
                if (voucher_number.value.length > 0) {
                    res = await fetch(
                        `/dashboard/studentAccounts/deletePaySlip/getPaySlipData/${schoolCode}?voucherNumber=${voucher_number.value.charAt(0) == '#' ? voucher_number.value.slice(1) : voucher_number.value}`
                    )
                    voucher_number.value = "";
                } else {
                    res = await fetch(
                        `/dashboard/studentAccounts/deletePaySlip/getPaySlipData/${schoolCode}?date_from=${date_from.value}&date_to=${date_to.value}`
                    )
                }

                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                // update payslip into the table
                updateTableContent(data.pay_slips);
                total_payslip_count.innerText = data.pay_slips.length;
            } catch (error) {
                console.error('Error:', error);
            }
        }



        let selectedCheckbox;
        // update table content with payslip
        function updateTableContent(payslips) {
            selectedCheckbox = [];
            // create dynamic row
            table_body.innerHTML = "";
            payslips.forEach(slip => {
                const tr = document.createElement('tr');
                tr.classList.add('odd:bg-white', 'odd:dark:bg-gray-900',
                    'even:bg-gray-50',
                    'even:dark:bg-gray-800', 'border-b',
                    'dark:border-gray-700');

                // Create a new checkbox input element
                const checkboxCell = document.createElement('td');
                checkboxCell.classList.add("px-6", "py-4")
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = `select_${slip.voucher_number}`
                checkbox.classList.add('w-4', 'h-4', 'text-blue-600', 'bg-gray-100', 'border-gray-300',
                    'rounded', 'focus:ring-blue-500')
                checkboxCell.appendChild(checkbox)
                tr.appendChild(checkboxCell);

                checkbox.addEventListener('click', function() {
                    if (checkbox.checked) {
                        selectedCheckbox.push(slip.voucher_number);
                    } else {
                        selectedCheckbox = selectedCheckbox.filter(item => item !== slip
                            .voucher_number);
                    }
                });
                // create student_id column
                const studentId_TD = document.createElement('td');
                studentId_TD.style.maxWidth = "100px";
                studentId_TD.classList.add("px-6", "py-4",
                    'overflow-hidden')
                const studentIdInputBox = document.createElement(
                    'input');
                studentIdInputBox.type = 'text'
                studentIdInputBox.name =
                    `input_student_id[${slip.student_id}]`;
                studentIdInputBox.value = slip.student_id;
                studentIdInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                studentIdInputBox.readOnly = true;
                studentId_TD.appendChild(studentIdInputBox);
                tr.appendChild(studentId_TD);


                // create student class column
                const studentClass_TD = document.createElement('td');
                studentClass_TD.style.maxWidth = "100px";
                studentClass_TD.classList.add("px-6", "py-4",
                    'overflow-hidden')
                const studentClassInputBox = document.createElement(
                    'input');
                studentClassInputBox.type = 'text'
                studentClassInputBox.name =
                    `input_class[${slip.student_id}]`;
                studentClassInputBox.value = slip.class;
                studentClassInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                studentClassInputBox.readOnly = true;
                studentClass_TD.appendChild(studentClassInputBox);
                tr.appendChild(studentClass_TD);



                // create student group column
                const studentGroup_TD = document.createElement('td');
                studentGroup_TD.style.maxWidth = "100px";
                studentGroup_TD.classList.add("px-6", "py-4",
                    'overflow-hidden')
                const studentGroupInputBox = document.createElement(
                    'input');
                studentGroupInputBox.type = 'text'
                studentGroupInputBox.name =
                    `input_group[${slip.student_id}]`;
                studentGroupInputBox.value = slip.group;
                studentGroupInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                studentGroupInputBox.readOnly = true;
                studentGroup_TD.appendChild(studentGroupInputBox);
                tr.appendChild(studentGroup_TD);



                // create student VOUCHER column
                const studentVoucher_TD = document.createElement('td');
                studentVoucher_TD.style.maxWidth = "100px";
                studentVoucher_TD.classList.add("px-6", "py-4",
                    'overflow-hidden')
                const studentVoucherInputBox = document.createElement(
                    'input');
                studentVoucherInputBox.type = 'text'
                studentVoucherInputBox.name =
                    `input_voucher_number[${slip.student_id}]`;
                studentVoucherInputBox.value = slip.voucher_number;
                studentVoucherInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                studentVoucherInputBox.readOnly = true;
                studentVoucher_TD.appendChild(studentVoucherInputBox);
                tr.appendChild(studentVoucher_TD);




                // create student MONTH column
                const studentMonth_TD = document.createElement('td');
                studentMonth_TD.style.maxWidth = "100px";
                studentMonth_TD.classList.add("px-6", "py-4",
                    'overflow-hidden')
                const studentMonthInputBox = document.createElement(
                    'input');
                studentMonthInputBox.type = 'text'
                studentMonthInputBox.name =
                    `input_collect_date[${slip.student_id}]`;
                studentMonthInputBox.value = slip.collect_date;
                studentMonthInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                studentMonthInputBox.readOnly = true;
                studentMonth_TD.appendChild(studentMonthInputBox);
                tr.appendChild(studentMonth_TD);




                // create student PAYABLE column
                const studentAmount_TD = document.createElement('td');
                studentAmount_TD.style.maxWidth = "100px";
                studentAmount_TD.classList.add("px-6", "py-4",
                    'overflow-hidden')
                const studentAmountInputBox = document.createElement(
                    'input');
                studentAmountInputBox.type = 'text'
                studentAmountInputBox.name =
                    `input_total_amount[${slip.student_id}]`;
                studentAmountInputBox.value = slip.total_amount;
                studentAmountInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                studentAmountInputBox.readOnly = true;
                studentAmount_TD.appendChild(studentAmountInputBox);
                tr.appendChild(studentAmount_TD);




                // create student WAIVER column
                const studentWaiver_TD = document.createElement('td');
                studentWaiver_TD.style.maxWidth = "100px";
                studentWaiver_TD.classList.add("px-6", "py-4",
                    'overflow-hidden')
                const studentWaiverInputBox = document.createElement(
                    'input');
                studentWaiverInputBox.type = 'text'
                studentWaiverInputBox.name =
                    `input_waiver[${slip.student_id}]`;
                studentWaiverInputBox.value = slip.total_waiver;
                studentWaiverInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                studentWaiverInputBox.readOnly = true;
                studentWaiver_TD.appendChild(studentWaiverInputBox);
                tr.appendChild(studentWaiver_TD);




                // create student RECEIVED column
                const studentPaid_TD = document.createElement('td');
                studentPaid_TD.style.maxWidth = "100px";
                studentPaid_TD.classList.add("px-6", "py-4",
                    'overflow-hidden')
                const studentPaidInputBox = document.createElement(
                    'input');
                studentPaidInputBox.type = 'text'
                studentPaidInputBox.name =
                    `input_waiver[${slip.student_id}]`;
                studentPaidInputBox.value = slip.total_paid;
                studentPaidInputBox.classList.add('border-0', 'w-fit',
                    'focus:ring-0')
                studentPaidInputBox.readOnly = true;
                studentPaid_TD.appendChild(studentPaidInputBox);
                tr.appendChild(studentPaid_TD);


                // append table row into the table body
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
                            if (!selectedCheckbox.includes(checkboxName)) {
                                selectedCheckbox.push(checkboxName);
                            }
                        } else {
                            const checkboxName = checkbox.name.split("_")[1];
                            const index = selectedCheckbox.indexOf(checkboxName);
                            if (index !== -1) {
                                selectedCheckbox.splice(index, 1);
                            }
                        }
                    });
                });
            });
        }


        // delete payslip
        delete_payslip.addEventListener('click', function(e) {
            e.preventDefault();
            try {
                selectedCheckbox.forEach(async voucherId => {
                    const res = await fetch(
                        `/dashboard/studentAccounts/deletePaySlip/deletePaySlipData/${schoolCode}?voucherId=${voucherId.charAt(0) == '#' ? voucherId.slice(1) : voucherId}`
                    )
                    if (!res.ok) throw new Error('Network response was not ok');
                    if (res.ok) {
                        let timeOut;
                        clearTimeout(timeOut);
                        successAlert.style.display = 'block';
                        timeOut = setTimeout(() => {
                            successAlert.style.display = 'none';
                        }, 3000);
                    }
                    const data = await res.json();

                    // remove the row from the table
                    const rows = table_body.getElementsByTagName('tr');
                    for (i = 0; i < rows.length; i++) {
                        const td = rows[i].getElementsByTagName('td');
                        const input = td[4].getElementsByTagName('input')[0];
                        if (input.value === voucherId) {
                            table_body.removeChild(rows[i]);
                            selectedCheckbox = selectedCheckbox.filter(item => item !==
                                voucherId);
                            break;
                        }
                    }

                    total_payslip_count.innerText = parseInt(total_payslip_count.innerText) - 1;
                });
            } catch (error) {
                console.error('Error:', error);
            }
        });
    });
</script>
