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
        <div class="w-[60%] h-fit bg-white mx-auto px-5 py-12">
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
            <div class="space-y-2 mt-10">
                <div class="w-full flex justify-between items-center">
                    <div>
                        <h1 class="uppercase font-semibold text-gray-500">Class: {{ $class }}</h1>
                    </div>
                    <div>
                        <h1 class="uppercase font-semibold text-gray-500">PAY SLIP : {{ $pay_slip_type }}</h1>
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
                                        CLASS
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        Exam Fee
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($individualPaySlipsData as $key => $PaySlip)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 text-center">
                                        <td class="px-6 py-4">
                                            {{ $key + 1 }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $PaySlip->fee_type_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $PaySlip->fees_amount }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 text-center">
                                    <th scope="row"
                                        class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    </th>
                                    <td class="px-6 py-4 text-end font-bold  text-lg">
                                        Total <span class="ml-5">=</span>
                                    </td>
                                    <td class=" py-4 font-bold text-lg">
                                        {{$TotalAmount}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
