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
                        <h1 class="uppercase font-semibold text-gray-500">Name: {{ $individualWaiverData[0]->name }}
                        </h1>
                    </div>
                    <div>
                        <h1 class="uppercase font-semibold text-gray-500">Id:
                            {{ $individualWaiverData[0]->nedubd_student_id }}</h1>
                    </div>
                    <div>
                        <h1 class="uppercase font-semibold text-gray-500">DISCOUNT:
                            {{ $individualWaiverData[0]->waiver_type_name }}</h1>
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
                                        Fee Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        WAIVER
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($individualWaiverData as $key => $waiver)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 text-center">
                                        <td class="px-6 py-4">
                                            {{ $key + 1 }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $waiver->fee_type }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $waiver->fee_amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $waiver->waiver_amount }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 text-center">
                                    <td class="px-6 py-4">
                                        {{-- {{ $key + 1 }} --}}
                                    </td>
                                    <td class="px-6 py-4 font-bold text-lg">
                                        Total =
                                    </td>
                                    <td class="px-6 py-4 font-bold text-lg">
                                        {{ $totalFeeAmount }}
                                    </td>
                                    <td class="px-6 py-4 font-bold text-lg">
                                        {{ $totalDiscount }}
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
