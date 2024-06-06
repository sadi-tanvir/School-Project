<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/d703802588.js" crossorigin="anonymous"></script>

    <!-- flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


</head>
<style>
    /* You can add custom styles here */
    .gradient-bg {
        background: linear-gradient(90deg, #1E3A8A 0%, #007BFF 50%, #1E3A8A 100%);
    }

</style>

<body class="">
    <div class="w-full bg-slate-200 min-h-screen">
        <div class="w-[60%] h-fit bg-white mx-auto px-5 py-12">
            <button type="button" onclick="history.back()" class="text-white bg-red-700 hover:bg-red-600 focus:ring-0  font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 focus:outline-none uppercase">
                Back
            </button>
            {{-- assessment scale section --}}
            <div>
                <h1 class="text-center text-blue-500 font-bold">{{ $schoolInfo->school_name }}</h1>
                <h1 class="text-center text-slate-500 font-bold">Contact No: {{ $schoolInfo->school_phone }}</h1>
                <h1 class="text-center text-slate-500 font-bold">Email: {{ $schoolInfo->school_email }}</h1>
                <h1 class="text-center text-slate-500 font-bold">Website
                    <a href="#" class="text-blue-600">{{ $schoolInfo->website }}</a>
                </h1>
                {{-- <h1 class="text-center font-bold text-red-500">Print date: {{ $date->format('Y-m-d H:i:s') }}</h1> --}}
            </div>


            {{-- All fee types --}}
            <div class="space-y-2 mt-10">
                <div class="w-full flex justify-between items-center">
                    <div class="space-y-2">
                        <h1 class="font-semibold text-gray-500">Student Id:
                            <span class="bg-gray-100 font-bold rounded-lg px-1.5 py-1">{{ $voucherWisePayslips[0]->student_id }}</span>
                        </h1>
                        <h1 class="font-semibold text-gray-500">Voucher No.:
                            <span class="bg-gray-100 font-bold rounded-lg px-1.5 py-1">{{ $voucherWisePayslips[0]->voucher_number }}</span>
                        </h1>
                    </div>

                    <div>
                        <h1 class="capitalize font-semibold text-gray-500">Collected By:
                            <span class="bg-gray-100 font-bold rounded-lg p-1.5">{{ $voucherWisePayslips[0]->collected_by_name }}</span>
                        </h1>
                    </div>
                </div>
                <div class="mt-10">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-white uppercase bg-blue-600">
                                <tr class="text-center">
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        SL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Collect Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        Pay Slip Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 ">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        Waiver
                                    </th>
                                    <th scope="col" class="px-6 py-3 ">
                                        paid_amount
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        Collect BY
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($voucherWisePayslips as $key => $payslip)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 text-center">
                                    <td class="px-6 py-4">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $payslip->collect_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $payslip->pay_slip_type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $payslip->amount }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $payslip->waiver }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $payslip->paid_amount }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $payslip->collected_by_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route("DailyCollectionReport.feesDetails.getReports",  ["schoolCode" => $school_code,"className" => $payslip->class, "payslipType" => $payslip->pay_slip_type])}}" class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">
                                            Details
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
