<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- tailwind css -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<style>
    .gradient-bg {
        background: linear-gradient(145deg, #1E3A8A 0%, #0054af 50%, #0054af 100%);
    }
</style>

<body class="">
    @include('Shared.navbar')
    @include('Shared.sidebar')
    <div class="p-3  sm:ml-80 mt-0.5 min-h-[90vh] flex flex-col justify-between">
        <div>
            @yield('Dashboard')
        </div>
        <div class="mt-5 ">
            @include('Shared.copyright')
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>
</body>

</html>