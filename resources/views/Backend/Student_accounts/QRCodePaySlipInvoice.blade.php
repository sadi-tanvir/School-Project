<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* You can add custom styles here */
        .gradient-bg {
            background: rgb(240, 239, 239);
        }

    </style>
</head>
<body class="gradient-bg flex justify-center items-center h-screen">
    @php
    $index = 0;
    @endphp
    <div class="w-full min-h-screen bg-neutral-200 mx-auto p-5">
        <div id="print-section" class="w-full sm:w-3/4 md:w-1/2  bg-white mx-auto px-5 py-10 mt-5">
            <div class="">
                <div class="flex justify-between items-center border-b-2 border-gray-600 px-2 text-[10px]">
                    <img src="https://cms.nedubd.com/logo/graduation.png" class="w-12" alt="">
                    <div class="text-center">
                        <h1 class="font-bold text-md sm:text-xl">{{$schoolInfo->school_name}}</h1>
                        <h1 class="text-xs">N/A</h1>
                    </div>
                    <p class="text-xs">Student Copy</p>
                </div>
                <div class="text-center my-3">
                    <span class="border-b-2 px-2 font-semibold border-gray-600 text-[12px]">Money Receipt</span>
                </div>
                {{-- student information --}}
                <div class="grid grid-cols-3 text-[10px] mb-10">
                    <div class="col-span-2">
                        <ul>
                            <li>Invoice ID : {{ $pay_slips[0]->voucher_number }}</li>
                            <li>Payment Date : {{ $pay_slips[0]->collect_date }}</li>
                            <li>Collected By : {{ $pay_slips[0]->collected_by_name }}</li>
                        </ul>
                    </div>
                    <div class="">
                        <ul>
                            <li>Name : {{$studentInfo->name}}</li>
                            <li>Student ID : {{ $studentInfo->student_id }}</li>
                            <li>Class : {{ $studentInfo->Class_name }}</li>
                            <li>Roll No. : {{ $studentInfo->student_roll }}</li>
                            <li>Group : {{ $studentInfo->group }}</li>
                            <li>Section : {{ $studentInfo->section }}</li>
                            <li>Academic Year <span class="ml-2">:</span>
                                {{ $studentInfo->year }} </li>
                        </ul>
                    </div>
                </div>

                <div class="my-3 text-[10px] overflow-auto">
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
                                        Waiver</th>
                                    <th class="p-2 text-left text-zinc-500 uppercase tracking-wider">
                                        Payable</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-zinc-200">
                                @foreach ($pay_slips as $key => $payslip)
                                <tr class="">
                                    <td class="text-[10px] p-1 whitespace-nowrap">{{ $index = $index + 1 }}</td>
                                    <td class="text-[10px] p-1 whitespace-nowrap">{{ $payslip->pay_slip_type }}</td>
                                    <td class="text-[10px] p-1 whitespace-nowrap">n/a</td>
                                    <td class="text-[10px] p-1 whitespace-nowrap">{{ $payslip->waiver }}</td>
                                    <td class="text-[10px] p-1 whitespace-nowrap">
                                        {{ $payslip->payable }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class=" w-full border border-gray-300 grid grid-cols-6">
                            <div class="w-full text-wrap col-span-3 border-r p-1">
                                <p><span class="font-semibold">Note:</span> {{ $pay_slips[0]->note }}</p>
                            </div>
                            <div class="col-span-3 grid grid-cols-2">
                                <ul class=" grid columns-4">
                                    <li class="p-px border-b">Total Payable</li>
                                    <li class="p-px border-b">Total Waiver</li>
                                    <li class="p-px border-b">Total Paid</li>
                                    <li class="p-px ">Total Due</li>
                                </ul>
                                <ul class="border-l grid columns-4">
                                    <li class="p-px border-b font-bold">{{ $aggregateAmounts->total_payable }}</li>
                                    <li class="p-px border-b">{{ $aggregateAmounts->total_waiver }}</li>
                                    <li class="p-px border-b">{{ $aggregateAmounts->total_paid }}</li>
                                    <li class="p-px ">{{ $aggregateAmounts->total_due_amount }}</li>
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
        </div>
    </div>
</body>
</html>
