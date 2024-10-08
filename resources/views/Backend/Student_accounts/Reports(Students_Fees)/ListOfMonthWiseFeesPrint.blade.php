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

<body class="">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>

    @php
        $months = [
            'january',
            'february',
            'march',
            'april',
            'may',
            'june',
            'july',
            'august',
            'september',
            'october',
            'november',
            'december',
        ];
    @endphp

    <div class="w-full px-5 mx-auto min-h-screen flex flex-col justify-center items-center">
        <div class="flex w-full justify-between items-center mt-10">
            <div class="flex items-center space-x-2">
                <button type="button"
                    onclick="location.replace('{{ env('APP_URL') }}/dashboard/listOfMonthWiseFees/{{ $school_code }}')"
                    class="text-white bg-red-700 hover:bg-red-600 focus:ring-0  font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 focus:outline-none uppercase">
                    Back
                </button>
                <button type="button" onclick="window.print()"
                    class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 focus:outline-none uppercase">
                    Print
                </button>
            </div>
        </div>

        <div id="print-section" class="w-full h-fit mx-auto px-5 py-12 bg-white">
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
                    <div class="relative shadow-md sm:rounded-lg">
                        <table class="w-full text-xs text-left rtl:text-right text-gray-500">
                            <thead class="text-white uppercase bg-blue-600">
                                <tr class="text-center">
                                    <th scope="col" class="px-1 py-1 bg-blue-500">
                                        SL
                                    </th>
                                    <th scope="col" class="px-1 py-1">
                                        Class
                                    </th>
                                    <th scope="col" class="px-1 py-1 bg-blue-500">
                                        Roll
                                    </th>
                                    <th scope="col" class="px-1 py-1">
                                        STUDENT ID
                                    </th>
                                    <th scope="col" class="px-1 py-1 bg-blue-500">
                                        Name
                                    </th>
                                    @foreach ($months as $monthKey => $month)
                                        <th scope="col"
                                            class="px-1 py-1 {{ $monthKey % 2 !== 0 ? 'bg-blue-500' : '' }}">
                                            {{ $month }}
                                        </th>
                                    @endforeach
                                    <th scope="col" class="px-1 py-1">
                                        {{ $payment_status === 'paid' ? 'Tota Paid' : 'Total DUE' }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($payslips)
                                    @foreach ($payslips as $key => $payslip)
                                        <tr class="odd:bg-white even:bg-gray-50 text-center">
                                            <td class="px-4 py-3">
                                                {{ $key + 1 }}
                                            </td>
                                            <td class="px-4 py-3">
                                                {{ $payslip->student_id }}
                                            </td>
                                            <td class="px-4 py-3">
                                                {{ $payslip->student_roll }}
                                            </td>
                                            <td class="px-4 py-3">
                                                {{ $payslip->class }}
                                            </td>
                                            <td class="px-4 py-3">
                                                {{ $payslip->name }}
                                            </td>
                                            @foreach ($months as $month)
                                                <td class="px-4 py-3">
                                                    {{ isset($studentAndMonthWiseData[$payslip->student_id]) &&
                                                    isset($studentAndMonthWiseData[$payslip->student_id][$month])
                                                        ? ($payment_status == 'unpaid'
                                                            ? $studentAndMonthWiseData[$payslip->student_id][$month]->payable
                                                            : $studentAndMonthWiseData[$payslip->student_id][$month]->paid_amount)
                                                        : 0 }}
                                                </td>
                                            @endforeach
                                            <td class="px-6 py-4">
                                                <a class="text-blue-600 font-semibold"
                                                    href="{{ route('listOfMonthWiseFees.details.display', ['schoolCode' => $school_code, 'student_id' => $payslip->student_id, 'payment_status' => $payslip->payment_status]) }}">
                                                    {{ $payment_status == 'unpaid'
                                                        ? $studentAndMonthWiseData[$payslip->student_id]['all_month_unpaid_amount']
                                                        : $studentAndMonthWiseData[$payslip->student_id]['all_month_paid_amount'] }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr class="odd:bg-white even:bg-gray-50 border-b text-center">
                                    @for ($i = 0; $i < 16; $i++)
                                        <td scope="row"
                                            class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap"></td>
                                    @endfor
                                    <td class=" py-4 font-bold text-lg">
                                        total =
                                    </td>
                                    <td class=" py-4 font-bold text-lg">
                                        {{ $payment_status == 'unpaid' ? $institute_due_amount : $institute_paid_amount }}
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
