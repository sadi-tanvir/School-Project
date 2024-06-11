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

    /* .gradient-bg {
        background-image: repeating-linear-gradient(45deg, rgba(0,0,0,0.04),rgba(0,0,0,0.03),rgba(0,0,0,0.09),rgba(0,0,0,0.09),rgba(0,0,0,0.06),rgba(0,0,0,0.04),transparent,rgba(0,0,0,0.05),rgba(0,0,0,0.06),rgba(0,0,0,0.02),rgba(0,0,0,0.09),rgba(0,0,0,0.03),rgba(0,0,0,0.07) 4px),linear-gradient(0deg, rgb(24, 9, 88),rgb(20, 15, 94));
    } */

</style>

<body class="">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>

    <div class="w-full bg-slate-200 min-h-screen">
        <div class="w-[80%] h-fit bg-white mx-auto px-5 py-12">
            <div class="flex w-full justify-between items-center">
                <button type="button" onclick="location.replace('{{env('APP_URL')}}/dashboard/DuepaySummary/{{$school_code}}')" class="text-white bg-red-700 hover:bg-red-600 focus:ring-0  font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 focus:outline-none uppercase">
                    Back
                </button>
                <form id="sortOrderForm" action="{{route("DuepaySummary.sort.info", $school_code)}}" method="GET">
                    <div class="flex space-x-3">
                        {{-- @csrf --}}
                        <select id="sortType" name="sortType" class="w-32 bg-gray-50 text-gray-900 text-sm rounded-lg block p-2.5 col-span-2">
                            <option selected disabled>Select</option>
                            <option {{$sortType === "collect_date" ? 'selected' : ''}} value="collect_date">Collect Date</option>
                            <option {{$sortType === "class_position" ? 'selected' : ''}} value="class_position">Class</option>
                        </select>
                        <select id="sortOrder" name="sortOrder" class="w-32 bg-gray-50 text-gray-900 text-sm rounded-lg block p-2.5 col-span-2">
                            <option selected disabled>Select</option>
                            <option {{$sortOrder === "asc" ? 'selected' : ''}} value="asc">ASC</option>
                            <option {{$sortOrder === "desc" ? 'selected' : ''}} value="desc">DESC</option>
                        </select>

                        {{-- hidden inputs --}}
                        <input class="hidden" name="class" value="{{ $class }}">
                        <input class="hidden" name="group" value="{{ $group }}">
                        <input class="hidden" name="section" value="{{ $section }}">
                        <input class="hidden" name="student_id" value="{{ $student_id }}">
                        <input class="hidden" name="payment_status" value="{{ $payment_status }}">
                    </div>
                </form>
            </div>
            {{-- assessment scale section --}}
            <div>
                <h1 class="text-center text-blue-500 font-bold">{{ $schoolInfo->school_name }}</h1>
                <h1 class="text-center text-slate-500 font-bold">Contact No: {{ $schoolInfo->school_phone }}</h1>
                <h1 class="text-center text-slate-500 font-bold">Email: {{ $schoolInfo->school_email }}</h1>
                <h1 class="text-center text-slate-500 font-bold">Website
                    <a href="#" class="text-blue-600">{{ $schoolInfo->website }}</a>
                </h1>
                <h1 class="text-center font-bold text-red-500">Print date: {{ $date->format('Y-m-d H:i:s') }}</h1>
            </div>

            {{-- All fee types --}}
            <div class="space-y-1">
                <div class="mt-10">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-white uppercase bg-blue-600">
                                <tr class="text-center">
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        SL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        STUDENT ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Class
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        AMOUNT
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        RECEIVED
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        WAIVER
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        DUE
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        STATUS
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($payslips)
                                @foreach ($payslips as $key => $payslip)
                                <tr class="odd:bg-white even:bg-gray-50 text-center">
                                    <td class="px-6 py-4">
                                        {{$key + 1}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $payslip->student_id}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $payslip->class }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $payslip->amount }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $payslip->paid_amount ?? 0 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $payslip->waiver }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $payslip->due_amount ?? $payslip->payable }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="text-blue-600 font-semibold" href="{{route("DuepaySummary.details.info", ["schoolCode" => $school_code, "student_id" => $payslip->student_id, "payment_status" => $payslip->payment_status])}}">
                                            {{ $payslip->payment_status === 'unpaid' ? 'DUE' : 'PAID'}}
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                <tr class="odd:bg-white even:bg-gray-50 border-b text-center">
                                    <td scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    </td>
                                    <td scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    </td>
                                    <td class="px-6 py-4 text-end font-bold  text-lg">
                                    </td>
                                    <td class="px-6 py-4 font-bold  text-lg text-center">
                                        {{ $totalAmount }}
                                    </td>
                                    <td class="px-6 py-4 text-center font-bold  text-lg">
                                        {{$totalReceived}}
                                    </td>
                                    <td class="px-6 py-4 text-center font-bold  text-lg">
                                        {{$totalWaiver}}
                                    </td>
                                    <td class="px-6 py-4 text-center font-bold  text-lg">
                                        {{$totalDue}}
                                    </td>
                                    <td class=" py-4 font-bold text-lg">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const sortOrder = document.getElementById('sortOrder');
                const sortType = document.getElementById('sortType');
                const sortOrderForm = document.getElementById('sortOrderForm');
                sortOrder.addEventListener('change', function(event) {
                    sortOrder.value = event.target.value;
                    sortOrderForm.submit();
                });
                sortType.addEventListener('change', function(event) {
                    sortType.value = event.target.value;
                    sortOrderForm.submit();
                });

            });

        </script>
</body>

</html>
