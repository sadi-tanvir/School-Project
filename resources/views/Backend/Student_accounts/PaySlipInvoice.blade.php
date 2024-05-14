@extends('Backend.app')
@section('title')
    Payslip Invoice
@endsection


@section('Dashboard')
    <div class="w-full min-h-screen bg-neutral-200 mx-auto p-5">
        <div class="w-[1123px] h-[794px] bg-white mx-auto px-5 ">
            <div class="w-1/2">
                <div class="flex justify-between items-center border-b-2 border-gray-600 px-2 text-xs">
                    <div class="flex items-center justify-center gap-3">
                        <img src="https://cms.nedubd.com/logo/graduation.png" class="w-20" alt="">
                        <div>
                            <h1 class="">{{ $school_info->school_name }}</h1>
                            <h1>N/A</h1>
                        </div>
                    </div>
                    <p>Student Copy</p>
                </div>
                <div class="text-center my-5">
                    <span class="border-b-2 px-2 font-semibold border-gray-600">Money Receipt</span>
                </div>
                {{-- student information --}}
                <div class="grid grid-cols-4 text-xs">
                    <div class="col-span-3 grid grid-cols-3">
                        <div>
                            <ul>
                                <li>Academic Year</li>
                                <li>Student ID</li>
                                <li>Name</li>
                                <li>Class</li>
                                <li>Group</li>
                                <li>Section</li>
                                <li>Roll No.</li>
                            </ul>
                        </div>
                        <div class="col-span-2">
                            <ul>
                                <li>: {{ $student_info->year }}</li>
                                <li>: {{ $student_info->student_id }}</li>
                                <li>: {{ $student_info->name }}</li>
                                <li>: {{ $student_info->Class_name }}</li>
                                <li>: {{ $student_info->group }}</li>
                                <li>: {{ $student_info->section }}</li>
                                <li>: {{ $student_info->student_roll }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="">
                        <img class="w-28"
                            src="https://th.bing.com/th/id/OIP.lhmC35cDIwGov-aWutxtbgAAAA?rs=1&pid=ImgDetMain"
                            alt="QR Code">
                    </div>
                </div>

                <div class="my-5">
                    <div class="">
                        <table class="w-full divide-y divide-zinc-200 border border-b-0">
                            <thead class="">
                                <tr>
                                    <th class="p-2 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">
                                        SL</th>
                                    <th class="p-2 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">
                                        Fees Name</th>
                                    <th class="p-2 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">
                                        Details</th>
                                    <th class="p-2 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">
                                        Waiver</th>
                                    <th class="p-2 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">
                                        Payable</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-zinc-200">
                                {{ $index = 0 }}
                                @foreach ($input_fee_types as $key => $feeType)
                                    <tr class="">
                                        <td class="text-xs p-1 whitespace-nowrap">{{ $index = $index + 1 }}</td>
                                        <td class="text-xs p-1 whitespace-nowrap">{{ $feeType }}</td>
                                        <td class="text-xs p-1 whitespace-nowrap">2</td>
                                        <td class="text-xs p-1 whitespace-nowrap">{{ $input_waivers[$key] }}</td>
                                        <td class="text-xs p-1 whitespace-nowrap">{{ $input_payable_amounts[$key] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="border border-gray-300 grid grid-cols-6">
                            <div class="w-full text-wrap col-span-3 border-r p-1">
                                <span>Note: {{ $note }}</span>
                            </div>
                            <div class="col-span-3 grid grid-cols-2">
                                <ul class=" grid columns-4">
                                    <li class="p-1 border-b text-xs">Total Payable</li>
                                    <li class="p-1 border-b text-xs">Total Waiver</li>
                                    <li class="p-1 border-b text-xs">Total Paid</li>
                                    <li class="p-1 text-xs">Total Due</li>
                                </ul>
                                <ul class="border-l grid columns-4">
                                    <li class="p-1 border-b text-xs font-bold">{{ $total_payable }}</li>
                                    <li class="p-1 border-b text-xs">{{ $total_waiver }}</li>
                                    <li class="p-1 border-b text-xs">{{ $totalCurrentPay }}</li>
                                    <li class="p-1 text-xs">{{ $total_due_amount }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="border p-1 border-t-0 flex justify-between">
                            {{-- <p class="text-xs">In-Word: One Thousand Taka Only.</p> --}}
                            <p class="text-xs">This is a Software Generated Receipt</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-3">
                    <div class="col-span-2 flex gap-5">
                        <ul>
                            <li>Invoice ID</li>
                            <li>Payment Date</li>
                            <li>Collected By</li>
                        </ul>
                        <ul>
                            <li class="font-semibold">: {{ $voucher_number }}</li>
                            <li>: {{ $collection_date }}</li>
                            <li>: {{ isset($schoolAdminData->name) ? $schoolAdminData->name : '' }}</li>
                        </ul>
                    </div>
                    <div class="w-full">
                        <p class="border-t border-dashed px-3 text-center mt-12">Accountant Sign</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
