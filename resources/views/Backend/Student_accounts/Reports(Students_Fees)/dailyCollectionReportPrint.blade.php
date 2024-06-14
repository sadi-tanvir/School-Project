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
    .gradient-bg {
        background: linear-gradient(90deg, #1E3A8A 0%, #007BFF 50%, #1E3A8A 100%);
    }

</style>

<body class="">
    <div class="w-full bg-slate-200 min-h-screen">
        <form id="sortOrderForm" action="{{ route('DailyCollectionReport.sort.getReports', $school_code) }}" method="get">
            <div class="w-[60%] h-fit bg-white mx-auto px-5 py-12">
                <div class="flex w-full justify-between items-center">
                    <button type="button" onclick="location.replace('{{env('APP_URL')}}/dashboard/DailyCollectionReport/{{$school_code}}')" class="text-white bg-red-700 hover:bg-red-600 focus:ring-0  font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 focus:outline-none uppercase">
                        Back
                    </button>
                    <div class="flex space-x-3">
                        <div class="flex w-full justify-between items-center mt-10">
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
                            </div>
                        </div>
                    </div>
                </div>
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
                        <div>
                            <h1 class="font-semibold text-gray-500">Date: from:
                                <span class="font-bold">{{ $date_from }}</span> to:
                                <span class="font-bold">{{ $date_to }}</span>
                                <input name="date_from" type="text" class="hidden" value="{{ $date_from }}">
                                <input name="date_to" type="text" class="hidden" value="{{ $date_to }}">
                            </h1>
                            </h1>
                        </div>

                        <div>
                            <h1 class="uppercase font-semibold text-gray-500">By:
                                {{ $entry_by_name != '' ? $entry_by_name : 'All' }}</h1>
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
                                            Date
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            VOUCHER ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            STUDENT ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            CLASS NAME
                                        </th>
                                        {{-- <th scope="col" class="px-6 py-3 bg-blue-500">
                                        MONTH NAME
                                    </th> --}}
                                        <th scope="col" class="px-6 py-3">
                                            AMOUNT
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-blue-500">
                                            BY
                                        </th>
                                        <th scope="col" class="px-6 py-3">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paySlipReport as $key => $payslip)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b text-center">
                                        <td class="px-6 py-4">
                                            {{ $key + 1 }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $payslip->collect_date }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $payslip->voucher_number }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $payslip->student_id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $payslip->class }}
                                        </td>
                                        {{-- <td class="px-6 py-4">
                                            {{ $payslip->month }}
                                        </td> --}}
                                        <td class="px-6 py-4">
                                            {{ $payslip->total_paid }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $payslip->collected_by_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{route("DailyCollectionReport.payslipDetails.getReports", ["schoolCode" => $school_code, "voucherNumber" => str_replace("#" , "", $payslip->voucher_number)])}}" class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 text-center">
                                        <td class="px-6 py-4">
                                        </td>
                                        <td class="px-6 py-4">
                                        </td>
                                        <td class="px-6 py-4">
                                        </td>
                                        <td class="px-6 py-4">
                                        </td>
                                        {{-- <td class="px-6 py-4">
                                    </td> --}}
                                        <td class="px-6 py-4 font-bold text-lg">
                                            Total =
                                        </td>
                                        <td class="px-6 py-4 font-bold text-lg">
                                            {{ $TotalAmount }}
                                        </td>
                                        <td class="px-6 py-4 font-bold text-lg">

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- hidden input fields --}}
            <input name="class" type="text" class="hidden" value="{{ $class }}">
            <input name="student_roll" type="text" class="hidden" value="{{ $student_roll }}">
            <input name="entry_by" type="text" class="hidden" value="{{ $entry_by }}">
        </form>


        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const sortOrder = document.getElementById('sortOrder');
                const sortOrderForm = document.getElementById('sortOrderForm');
                sortOrder.addEventListener('change', function(event) {
                    sortOrder.value = event.target.value;
                    sortOrderForm.submit();
                });

            });

        </script>
</body>

</html>
