@extends('Backend.app')
@section('title')
Student Invoice
@endsection


@section('Dashboard')
<!-- Message -->
@include('/Message/message')

<div class="w-full border mx-auto p-5 space-y-10">
    {{-- middle section --}}
    <div class="space-y-1">
        <form method="POST" action="{{route('student.add.fees', $school_code)}}">
            @csrf
            <div class="w-full flex flex-col justify-center items-center">
                {{-- Fees table --}}
                <div class="grid grid-cols-3 gap-10 mt-10">
                    <div></div>
                    <h1 class="text-3xl font-bold text-gray-700 mb-5">Student Inforamation</h1>
                    <div>
                        <a href="{{route("student.invoice.print",['student_id' => $student->id, 'schoolCode' =>  $school_code])}}" target="_blank" class="text-white bg-gradient-to-br from-cyan-600 to-cyan-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-14 py-2 text-center">
                            Print
                        </a>
                    </div>
                </div>
                <div class="w-2/3 grid grid-cols-5">
                    <ul class="text-xl font-semibold space-y-2">
                        <li>Student ID</li>
                        <li>Student Name</li>
                        <li>Class Name</li>
                        <li>Group Name</li>
                        <li>Section</li>
                        <li>Session</li>
                    </ul>
                    <ul class="text-xl font-semibold space-y-2 col-span-4">
                        <li>: {{$student->student_id}}</li>
                        <li>: {{$student->name}}</li>
                        <li>: {{$student->Class_name}}</li>
                        <li>: {{ isset($student->group) ? $student->group : "N/A"}}</li>
                        <li>: {{ isset($student->section) ? $student->section : "N/A"}}</li>
                        <li>: {{ isset($student->session) ? $student->session : "N/A"}}</li>
                    </ul>
                </div>

                <h1 class="text-2xl font-bold text-gray-700 mb-3 mt-10">Payslip Inforamation</h1>
                <div class="w-2/3 relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <input id="student_header_checkbox" checked type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Month
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Waiver
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    PaySlip
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payslipInfo as $key => $payslip)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="mx-auto">
                                        <input id="" type="checkbox" checked value="selected" name="select_payslip[{{ $payslip->pay_slip_type }}]" class="w-4 h-4 ml-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $key + 1 }}
                                </td>
                                <td name="month_section_{{ $key }}" class="px-6 py-4"></td>
                                <td class="">
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="waiver[{{ $payslip->pay_slip_type }}]" value="" placeholder="0" />
                                </td>
                                <td class="px-6 py-4">
                                    {{ $payslip->pay_slip_type }}
                                    <input class="hidden" name="amount[{{ $payslip->pay_slip_type }}]" value="{{ $payslip->pay_slip_type }}" />
                                </td>
                                <td class="px-6 py-4">
                                    {{ $payslip->totalFeesAmount }}
                                    <input class="hidden" name="amount[{{ $payslip->pay_slip_type }}]" value="{{ $payslip->totalFeesAmount }}" />
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- hidden inputs --}}
            <input class="hidden" name="student_id" value="{{ $student->student_id }}" />
            <input class="hidden" name="class" value="{{ $student->Class_name }}" />
            <input class="hidden" name="group" value="{{ isset($student->group) ? $student->group : "N/A"}}" />
            <input class="hidden" name="section" value="{{ isset($student->section) ? $student->section : "N/A"}}" />

            {{-- bottom section --}}
            <div class="">
                <div class="w-full flex justify-center items-center gap-20 mt-20">
                    <button type="submit" class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-20 py-2.5 text-center">
                        Save
                    </button>
                    <div class="flex items-center">
                        {{-- last pay date --}}
                        <div class="mb-4">
                            <label for="last_pay_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Pay Date:</label>
                            <input type="date" value="{{ date('Y-m-d') }}" name="last_pay_date" id="last_pay_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full" placeholder="" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const payslipInfo = @json($payslipInfo);
        // console.log('payslipInfo', payslipInfo);
        const student_header_checkbox = document.getElementById('student_header_checkbox');
        const select_payslip = document.querySelectorAll('input[name^="select_payslip"]')
        const month_section_ = document.querySelectorAll('td[name^="month_section_"]');

        // set months
        const monthList = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];

        // get current month
        const date = new Date();
        const currentMonth = date.getMonth();

        // create month option
        month_section_.forEach((month_section, index) => {
            const select = document.createElement('select');
            select.classList.add('bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg', 'focus:ring-blue-500', 'focus:border-blue-500', 'block', 'w-full', 'p-1');
            select.name = `month_[${payslipInfo[index].pay_slip_type}]`;
            select.id = `month_${monthList[currentMonth]}`;
            select.innerHTML = `<option disabled selected>Select</option>`;
            monthList.forEach((month, index) => {
                const option = document.createElement('option');
                option.value = month;
                option.textContent = month;
                option.selected = currentMonth === index;
                select.appendChild(option);
            });

            month_section.appendChild(select);
        });


        // select all payslips
        student_header_checkbox.addEventListener('change', () => {
            select_payslip.forEach((checkbox) => {
                // if (checkbox.checked) checkbox.checked = false;
                // else checkbox.checked = true;
                if (student_header_checkbox.checked) checkbox.checked = true;
                else checkbox.checked = false;
            })
        })
    });

</script>
