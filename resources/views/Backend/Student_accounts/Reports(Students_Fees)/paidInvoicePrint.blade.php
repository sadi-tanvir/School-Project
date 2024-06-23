@extends('Backend.app')
@section('title')
Payslip Invoice
@endsection

@php
$index = 0;
@endphp

@section('Dashboard')
<style>
    /* Hide non-printable elements */
    @media print {
        body * {
            visibility: hidden;
        }

        #print-section,
        #print-section * {
            visibility: visible;
        }
    }

    /* Style the print section */
    @media print {
        #print-section {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
<div class="w-full min-h-screen bg-neutral-200 mx-auto p-5">
    <a id="" href="{{route("paidInvoice", $school_code)}}"
        class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-red-300 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-auto">Back</a>
    <button id="" type="button" onclick="window.print()"
        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-blue-300 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-auto">Print</button>

    <div id="print-section">
        <div class="w-[1123px] h-[794px] bg-white mx-auto px-5 grid grid-cols-3 gap-5 mt-2">
            @for ($indx = 0; $indx < $schoolInfo->number_of_print_page; $indx++)
                <div class="">
                    <div class="flex justify-between items-center border-b-2 border-gray-600 px-2 text-[10px]">
                        <img src="https://cms.nedubd.com/logo/graduation.png" class="w-12" alt="">
                        <div class="text-center">
                            <h1 class="font-bold">{{ $schoolInfo->school_name }}</h1>
                            <h1>N/A</h1>
                        </div>
                        @if ($indx == 0)
                        <p>Student Copy</p>
                        @elseif ($indx == 1)
                        <p>Bank Copy</p>
                        @else
                        <p>Institute Copy</p>
                        @endif

                    </div>
                    <div class="text-center my-3">
                        <span class="border-b-2 px-2 font-semibold border-gray-600 text-[12px]">Money Receipt</span>
                    </div>
                    {{-- student information --}}
                    <div class="grid grid-cols-2 text-[10px]">

                        <div class="flex">
                            <ul>
                                <li>Invoice ID</li>
                                <li>Payment Date</li>
                                <li>Collected By</li>
                            </ul>
                            <ul>
                                <li class="font-semibold">:  {{$payslipInfo[0]->voucher_number}} </li>
                                <li>: {{$payslipInfo[0]->collect_date}} </li>
                                <li>:
                                    {{ isset($schoolAdminData->mobile_number) ? $schoolAdminData->mobile_number :
                                    'Unknown' }}
                                </li>
                            </ul>
                        </div>
                        <div class="">
                            <ul>
                                <li>Academic Year <span class="ml-2">:</span>
                                    {{ isset($studentInfo) ? $studentInfo->year :""}}</li>
                                <li>Student ID : {{ isset($studentInfo) ? $studentInfo->student_id :""}}</li>
                                <li>Name : {{ isset($studentInfo) ? $studentInfo->name :""}}</li>
                                <li>Class : {{ isset($studentInfo) ? $studentInfo->Class_name :""}}</li>
                                <li>Group : {{ isset($studentInfo) ? $studentInfo->group :""}}</li>
                                <li>Section : {{ isset($studentInfo) ? $studentInfo->section :""}}</li>
                                <li>Roll No. : {{ isset($studentInfo) ? $studentInfo->student_roll :""}}</li>
                            </ul>
                        </div>
                        {{-- <div class="">
                            <img class="w-16"
                                src="https://th.bing.com/th/id/OIP.lhmC35cDIwGov-aWutxtbgAAAA?rs=1&pid=ImgDetMain"
                                alt="QR Code">
                        </div> --}}
                    </div>

                    <div class="my-3 text-[10px]">
                        <div class="">
                            <table class="w-full divide-y divide-zinc-200 border border-b-0">
                                <thead class="text-[10px]">
                                    <tr>
                                        <th class="p-2 text-left text-zinc-500 uppercase tracking-wider">
                                            SL</th>
                                        <th class="p-2 text-left text-zinc-500 uppercase tracking-wider">
                                            Fees Name</th>
                                        <th class="p-2 text-left text-zinc-500 uppercase tracking-wider">
                                            Details</th>
                                        <th class="p-2 text-left text-zinc-500 uppercase tracking-wider">
                                            Amount</th>
                                        <th class="p-2 text-left text-zinc-500 uppercase tracking-wider">
                                            Payable</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-zinc-200">
                                    @foreach ($payslipInfo as $key => $paySlip)
                                    <tr class="">
                                        <td class="text-[10px] p-1 whitespace-nowrap">{{ $index = $index + 1 }}
                                        </td>
                                        <td class="text-[10px] p-1 whitespace-nowrap">
                                            {{ $paySlip->pay_slip_type }}
                                        </td>
                                        <td class="text-[10px] p-1 whitespace-nowrap">
                                            {{ $paySlip->month . ',' . $paySlip->year }}</td>
                                        <td class="text-[10px] p-1 whitespace-nowrap">{{ $paySlip->amount }}
                                        </td>
                                        <td class="text-[10px] p-1 whitespace-nowrap">
                                            {{ $paySlip->payable }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="border border-gray-300 grid grid-cols-6">
                                <div class="w-full text-wrap col-span-3 border-r p-1">
                                    <p>
                                        <span class="font-semibold">Note:</span> Last Payment Date:
                                        <span class="font-bold">N/A</span>
                                    </p>
                                </div>
                                <div class="col-span-3 grid grid-cols-2">
                                    <ul class=" grid columns-4">
                                        <li class="p-px border-b ">Total Amount</li>
                                        <li class="p-px border-b ">Total Waiver</li>
                                        <li class="p-px border-b ">Total Paid</li>
                                        <li class="p-px ">Total Due</li>
                                    </ul>
                                    <ul class="border-l grid columns-4">
                                        <li class="p-px border-b  font-bold">
                                            {{ $totalAmount }}
                                        </li>
                                        <li class="p-px border-b ">{{ $totalWaiverAmount }}</li>
                                        <li class="p-px border-b ">{{ $totalPaidAmount }}</li>
                                        <li class="p-px ">{{ $totalDueAmount }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="border p-1 border-t-0 flex justify-between">
                                {{-- <p class="text-[10px]">In-Word: One Thousand Taka Only.</p> --}}
                                <p class="text-[10px]">This is a Software Generated Receipt</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center text-[10px] mt-8">
                            <p class="text-red-500 font-semibold text-xs">Print Date: {{ date('Y-m-d') }}</p>
                            <div class="">
                                <p class="border-t border-dashed px-3 text-center">Accountant Sign</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
        </div>
    </div>
</div>
@endsection
