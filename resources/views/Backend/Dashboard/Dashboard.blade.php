@extends('Backend.app')
@section('title')
Dashboard
@endsection

@section('Dashboard')
@include('/Message/message')
<div
    class=" flex justify-between items-center rounded-md bg-gradient-to-tr from-[#1E3A8A] to-[#0054af] px-10 py-16 text-white mb-5">
    <div>
        <h2 class="text-4xl">
            <span class="font-light">Hello!</span>
            @if ($adminData)
                <span class="font-semibold">{{ $adminData->first_name }} {{ $adminData->last_name }}</span>
            @endif
            @if ($schoolAdminData)
                <span class="font-semibold">{{ $schoolAdminData->name }}</span>
            @endif
            @if ($studentData)
                <span class="font-semibold">{{ $studentData->name }}</span>
            @endif
        </h2>
        <p class="mt-1 font-light opacity-90">Welcome! Have a wonderful day!</p>

    </div>
    <div>
        @if ($adminData)
            <img class=" w-40 h-40 border-2 rounded-full" src="{{ asset($adminData->image) }}" alt="" />
        @endif
        @if ($schoolAdminData)
            <img class="w-40 h-40 border-2 rounded-full" src="{{ asset($schoolAdminData->image) }}" alt="" />
        @endif
        @if ($studentData)
            <img class=" w-40 h-40 border-2 rounded-full" src="{{ asset($studentData->image) }}" alt="" />
        @endif
    </div>

</div>
<div class="row-span-3 grid grid-cols-4 gap-3">
    <div class="col-span-3">
        <div class="grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-3">
            <div
                class="relative mx-2 overflow-hidden rounded-md bg-gradient-to-br from-red-600 to-orange-600 p-9 backdrop-blur-xl lg:mx-0">

                <h1 class="pb-2.5 text-3xl font-light text-white">Balance</h1>
                <div class="mb-4 mt-2 h-2.5 w-full rounded-full bg-gray-200">
                    <div class="h-2.5 rounded-full bg-yellow-400" style="width: 45%"></div>
                </div>
                <div class="flex items-center justify-between text-white">
                    <p>Cash In Hand</p>

                    <p class="font-semibold">&#2547; 0</p>
                </div>
                <div class="flex justify-between text-white">
                    <p>Cash In Bank</p>
                    <p class="font-semibold">&#2547; 0</p>
                </div>
                <span class="absolute -top-7 right-8 rotate-180 opacity-20">
                    <svg width="95px" height="95px" viewBox="0 0 512 512" id="Layer_1" version="1.1"
                        xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">

                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <style type="text/css">
                                .st0 {
                                    fill: #000000;
                                }
                            </style>
                            <g>
                                <path class="st0"
                                    d="M443.7,96.9H229.4c-2-38.7-34.2-69.6-73.4-69.6c-10.5,0-20.7,2.2-30.2,6.5c-25.1,11.3-41.7,35.8-43.2,63.1 H68.3c-17.6,0-31.9,14.3-31.9,31.9v197.7v52.9c0,17.6,14.3,31.9,31.9,31.9h157.1l-8.9,59.3h-15.1c-3.9,0-7,3.1-7,7s3.1,7,7,7h21.2 h67h21.2c3.9,0,7-3.1,7-7s-3.1-7-7-7h-15.1l-8.9-59.3h157.1c17.6,0,31.9-14.3,31.9-31.9V139.8v-11 C475.6,111.3,461.3,96.9,443.7,96.9z M131.5,46.6c7.7-3.5,15.9-5.2,24.5-5.2c32.8,0,59.5,26.7,59.5,59.5c0,1,0,1.9-0.1,2.8 c-1.4,31.8-27.6,56.7-59.4,56.7c-31.9,0-58-24.9-59.4-56.7c0-0.1,0-0.1,0-0.2c0-0.2,0-0.4,0-0.6c0-0.7,0-1.3,0-2 C96.5,77.5,110.2,56.2,131.5,46.6z M68.3,110.9h14.9c0,0.1,0,0.2,0.1,0.3c0.1,0.5,0.2,1,0.2,1.5c0.1,0.6,0.2,1.3,0.3,1.9 c0.1,0.5,0.2,1,0.3,1.5c0.1,0.6,0.3,1.2,0.4,1.9c0.1,0.5,0.3,1,0.4,1.5c0.2,0.6,0.3,1.2,0.5,1.8c0.1,0.5,0.3,1,0.5,1.5 c0.2,0.6,0.4,1.2,0.6,1.8c0.2,0.5,0.3,1,0.5,1.5c0.2,0.6,0.4,1.2,0.7,1.7c0.2,0.5,0.4,1,0.6,1.4c0.2,0.6,0.5,1.1,0.7,1.7 c0.2,0.5,0.4,0.9,0.6,1.4c0.3,0.6,0.5,1.1,0.8,1.7c0.2,0.4,0.5,0.9,0.7,1.3c0.3,0.6,0.6,1.1,0.9,1.6c0.2,0.4,0.5,0.9,0.7,1.3 c0.3,0.5,0.7,1.1,1,1.6c0.3,0.4,0.5,0.8,0.8,1.2c0.4,0.5,0.7,1.1,1.1,1.6c0.3,0.4,0.5,0.8,0.8,1.1c0.4,0.6,0.8,1.1,1.2,1.6 c0.3,0.3,0.5,0.7,0.8,1c0.5,0.6,0.9,1.2,1.4,1.7c0.2,0.3,0.5,0.6,0.7,0.8c0.6,0.7,1.3,1.4,2,2.1c0.1,0.1,0.2,0.2,0.3,0.3 c0.8,0.8,1.6,1.6,2.4,2.4c0.2,0.2,0.4,0.3,0.5,0.5c0.6,0.6,1.3,1.2,1.9,1.8c0.3,0.3,0.6,0.5,0.9,0.7c0.6,0.5,1.1,0.9,1.7,1.4 c0.3,0.3,0.7,0.5,1,0.8c0.5,0.4,1.1,0.8,1.6,1.2c0.4,0.3,0.8,0.5,1.1,0.8c0.5,0.4,1.1,0.7,1.6,1.1c0.4,0.3,0.8,0.5,1.2,0.8 c0.5,0.3,1.1,0.7,1.6,1c0.4,0.3,0.8,0.5,1.3,0.7c0.5,0.3,1.1,0.6,1.6,0.9c0.4,0.2,0.9,0.5,1.3,0.7c0.6,0.3,1.1,0.6,1.7,0.8 c0.5,0.2,0.9,0.4,1.4,0.6c0.6,0.3,1.1,0.5,1.7,0.7c0.5,0.2,0.9,0.4,1.4,0.6c0.6,0.2,1.2,0.4,1.7,0.7c0.5,0.2,1,0.3,1.4,0.5 c0.6,0.2,1.2,0.4,1.8,0.6c0.5,0.2,1,0.3,1.5,0.4c0.6,0.2,1.2,0.3,1.8,0.5c0.5,0.1,1,0.3,1.5,0.4c0.6,0.2,1.3,0.3,1.9,0.4 c0.5,0.1,1,0.2,1.5,0.3c0.7,0.1,1.3,0.2,2,0.3c0.5,0.1,1,0.2,1.5,0.2c0.7,0.1,1.4,0.2,2.1,0.3c0.5,0.1,0.9,0.1,1.4,0.2 c0.8,0.1,1.6,0.1,2.4,0.2c0.4,0,0.8,0.1,1.2,0.1c1.2,0.1,2.4,0.1,3.6,0.1c1.2,0,2.4,0,3.6-0.1c0.4,0,0.8-0.1,1.2-0.1 c0.8,0,1.6-0.1,2.3-0.2c0.5,0,0.9-0.1,1.4-0.2c0.7-0.1,1.4-0.2,2.1-0.3c0.5-0.1,1-0.2,1.5-0.2c0.7-0.1,1.3-0.2,2-0.3 c0.5-0.1,1-0.2,1.5-0.3c0.6-0.1,1.2-0.3,1.9-0.4c0.5-0.1,1-0.3,1.5-0.4c0.6-0.2,1.2-0.3,1.8-0.5c0.5-0.1,1-0.3,1.5-0.5 c0.6-0.2,1.1-0.4,1.7-0.6c0.5-0.2,1-0.4,1.5-0.5c0.6-0.2,1.1-0.4,1.7-0.6c0.5-0.2,1-0.4,1.5-0.6c0.5-0.2,1.1-0.5,1.6-0.7 c0.5-0.2,1-0.5,1.5-0.7c0.5-0.2,1-0.5,1.5-0.7c0.5-0.3,1-0.5,1.5-0.8c0.5-0.3,1-0.5,1.4-0.8c0.5-0.3,1-0.6,1.5-0.9 c0.5-0.3,0.9-0.5,1.3-0.8c0.5-0.3,1-0.6,1.5-1c0.4-0.3,0.8-0.6,1.2-0.8c0.5-0.4,1-0.7,1.5-1.1c0.4-0.3,0.7-0.5,1.1-0.8 c0.5-0.4,1.1-0.8,1.6-1.2c0.3-0.2,0.6-0.5,0.9-0.7c0.6-0.5,1.1-0.9,1.7-1.4c0.1-0.1,0.2-0.2,0.3-0.3c3-2.7,5.8-5.6,8.3-8.7 c0.1-0.1,0.2-0.3,0.3-0.4c0.5-0.7,1.1-1.4,1.6-2c0.1-0.2,0.3-0.4,0.4-0.6c0.5-0.7,1-1.3,1.4-2c0.2-0.2,0.3-0.5,0.5-0.7 c0.4-0.7,0.9-1.4,1.3-2c0.2-0.3,0.3-0.5,0.5-0.8c0.4-0.7,0.8-1.4,1.2-2.1c0.2-0.3,0.3-0.5,0.5-0.8c0.4-0.7,0.7-1.4,1.1-2.1 c0.1-0.3,0.3-0.6,0.4-0.9c0.3-0.7,0.7-1.4,1-2.1c0.1-0.3,0.3-0.6,0.4-0.9c0.3-0.7,0.6-1.4,0.9-2.2c0.1-0.3,0.2-0.6,0.4-1 c0.3-0.7,0.5-1.5,0.8-2.2c0.1-0.3,0.2-0.7,0.3-1c0.2-0.7,0.5-1.5,0.7-2.2c0.1-0.4,0.2-0.7,0.3-1.1c0.2-0.7,0.4-1.5,0.6-2.2 c0.1-0.4,0.2-0.8,0.3-1.2c0.2-0.7,0.3-1.4,0.5-2.2c0.1-0.4,0.1-0.9,0.2-1.3c0.1-0.7,0.2-1.4,0.3-2.1c0-0.1,0-0.1,0-0.2h214.9 c9.9,0,17.9,8,17.9,17.9v8.1l-77,77L354,183.2c-2.7-2.7-7.2-2.7-9.9,0l-90.9,90.9l-37.9-37.9c-2.7-2.7-7.2-2.7-9.9,0l-53.9,53.9 l-35.4-28.1c-2.6-2.1-6.4-2-8.9,0.2l-56.9,49.2V128.9C50.4,119,58.4,110.9,68.3,110.9z M281.4,470.7h-50.7l8.9-59.3h32.9 L281.4,470.7z M461.6,379.4c0,9.9-8,17.9-17.9,17.9H278.5h-44.9H68.3c-9.9,0-17.9-8-17.9-17.9v-49.7l61.7-53.3l35.8,28.4 c2.8,2.2,6.8,2,9.3-0.5l53.3-53.3l37.9,37.9c2.7,2.7,7.2,2.7,9.9,0l90.9-90.9l30.7,30.7c1.3,1.3,3.1,2,4.9,2s3.6-0.7,4.9-2l72-72 V379.4z">
                                </path>
                                <path class="st0"
                                    d="M130.4,127.6c6.5,4.6,13.9,7.5,22,8.4v6.6c0,2.6,2.1,4.6,4.7,4.6c2.6,0,4.6-2,4.6-4.6v-6.4 c13.6-1.3,22.8-9.1,22.8-20.9c0-11.5-7-18-23.2-22.1V72.7c3.6,0.9,7.3,2.5,11,4.7c1.1,0.6,2.1,1,3.2,1c3.3,0,6-2.6,6-5.9 c0-2.6-1.5-4.2-3.2-5.1c-4.9-3.1-10.3-5.1-16.6-5.9v-2.4c0-2.6-2-4.6-4.6-4.6c-2.6,0-4.7,2-4.7,4.6v2.2c-13.4,1.1-22.5,9-22.5,20.5 c0,12.1,7.3,18,22.9,22.1v21.1c-5.9-1.1-10.8-3.5-15.8-7.2c-1-0.7-2.2-1.2-3.5-1.2c-3.3,0-5.9,2.6-5.9,5.9 C127.5,124.7,128.6,126.4,130.4,127.6z M161.2,105.9c8.2,2.6,10.6,5.5,10.6,10.2c0,5.1-3.7,8.6-10.6,9.3V105.9z M142.5,81 c0-4.7,3.4-8.4,10.3-9v19C144.5,88.3,142.5,85.5,142.5,81z">
                                </path>
                            </g>
                        </g>
                    </svg>
                </span>
            </div>
            <div
                class="relative mx-2 overflow-hidden rounded-md bg-gradient-to-tr from-[#1E3A8A] to-[#0054af] p-9 backdrop-blur-xl lg:mx-0">

                <h1 class="pb-2.5 text-3xl font-light text-white">Todays Fee</h1>
                <div class="mb-4 mt-2 h-2.5 w-full rounded-full bg-gray-200">
                    <div class="h-2.5 rounded-full bg-yellow-400" style="width: 65%"></div>
                </div>
                <div class="flex items-center justify-between text-white">
                    <p>Amount</p>
                    <p class="font-semibold">&#2547; {{$todaysFeesCollection}}</p>

                </div>

                <span class="absolute -top-7 right-8 opacity-20">
                    <svg width="86px" height="86px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M2 14C2 10.2288 2 8.34315 3.17157 7.17157C4.34315 6 6.22876 6 10 6H14C17.7712 6 19.6569 6 20.8284 7.17157C22 8.34315 22 10.2288 22 14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14Z"
                                stroke="#000000" stroke-width="1.5"></path>
                            <path
                                d="M16 6C16 4.11438 16 3.17157 15.4142 2.58579C14.8284 2 13.8856 2 12 2C10.1144 2 9.17157 2 8.58579 2.58579C8 3.17157 8 4.11438 8 6"
                                stroke="#000000" stroke-width="1.5"></path>
                            <path
                                d="M12 17.3333C13.1046 17.3333 14 16.5871 14 15.6667C14 14.7462 13.1046 14 12 14C10.8954 14 10 13.2538 10 12.3333C10 11.4129 10.8954 10.6667 12 10.6667M12 17.3333C10.8954 17.3333 10 16.5871 10 15.6667M12 17.3333V18M12 10V10.6667M12 10.6667C13.1046 10.6667 14 11.4129 14 12.3333"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path>
                        </g>
                    </svg>
                </span>
            </div>
            <div
                class="relative mx-2 overflow-hidden rounded-md bg-gradient-to-br from-purple-600 to-purple-900 p-9 backdrop-blur-xl lg:mx-0">
                <h1 class="pb-2.5 text-3xl font-light text-white">Todays Acc Received</h1>
                <div class="mb-4 mt-2 h-2.5 w-full rounded-full bg-gray-200">
                    <div class="h-2.5 rounded-full bg-yellow-400" style="width: 85%"></div>
                </div>
                <div class="flex items-center justify-between text-white">
                    <p>Amount</p>
                    <p class="font-semibold">&#2547; 0</p>
                </div>

                <span class="absolute -top-7 right-8 opacity-20">
                    <svg width="90px" height="90px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill-rule="nonzero"
                                    d="M22 13h-2V7h-8.414l-2-2H4v14h9v2H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h7.414l2 2H21a1 1 0 0 1 1 1v7zm-2 4h3v2h-3v3.5L15 18l5-4.5V17z">
                                </path>
                            </g>
                        </g>
                    </svg>
                </span>
            </div>
            <div
                class="relative mx-2 overflow-hidden rounded-md bg-gradient-to-br from-blue-600 to-violet-600 p-9 backdrop-blur-xl lg:mx-0">
                <h1 class="pb-2.5 text-3xl font-light text-white">Todays Acc Payment</h1>
                <div class="mb-4 mt-2 h-2.5 w-full rounded-full bg-gray-200">
                    <div class="h-2.5 rounded-full bg-yellow-400" style="width: 25%"></div>
                </div>
                <div class="flex items-center justify-between text-white">
                    <p>Amount</p>
                    <p class="font-semibold">&#2547; 0</p>
                </div>

                <span class="absolute -top-4 right-0 opacity-20">
                    <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="100px"
                        viewBox="0 0 32.602 32.602" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path
                                    d="M11.531,17.138l1.153-2.621l10.271-1.677l5.139,6.289v-1.362h4.508v12.16h-4.508v-1.782l-5.66-2.306L8.387,27.618 l-7.442-3.981l0.104-1.36L0,21.226l0.733-4.298l9.119,2.937l7.232-1.992v-0.521L11.531,17.138z M9.67,14.65l-0.232,1.188 c-0.217,1.112-2.236,1.323-4.117,0.96c-1.881-0.367-3.672-1.321-3.455-2.437l0.205-1.044h0.002 c0.263-1.075,2.248-1.277,4.105-0.915c1.777,0.347,3.475,1.219,3.471,2.254L9.67,14.65z M2.932,13.531 c-0.047,0.24,0.861,1.025,2.754,1.395c1.893,0.37,3.031-0.018,3.076-0.258c0.047-0.24-0.859-1.026-2.754-1.396 C4.115,12.904,2.979,13.29,2.932,13.531z M12.371,12.123l-0.979,0.716c-0.914,0.673-2.541-0.541-3.676-2.085 C6.583,9.208,5.912,7.292,6.828,6.621l0.857-0.63l0.002,0.002c0.922-0.614,2.521,0.586,3.639,2.11 c1.072,1.46,1.728,3.251,1.023,4.011L12.371,12.123z M8.176,6.733C7.981,6.878,8.114,8.07,9.256,9.626 c1.141,1.556,2.238,2.041,2.436,1.896c0.198-0.145,0.063-1.338-1.078-2.894C9.473,7.073,8.373,6.588,8.176,6.733z M15.934,10.463 l-1.207-0.094c-1.133-0.088-1.574-2.068-1.426-3.979c0.148-1.91,0.891-3.8,2.023-3.712l1.061,0.083l-0.002,0.002 c1.101,0.136,1.528,2.088,1.381,3.974c-0.139,1.806-0.812,3.591-1.84,3.708L15.934,10.463z M16.272,3.641 c-0.244-0.019-0.922,0.973-1.07,2.896c-0.147,1.923,0.367,3.008,0.609,3.026c0.244,0.02,0.92-0.972,1.07-2.896 C17.03,4.744,16.516,3.66,16.272,3.641z">
                                </path>
                            </g>
                        </g>
                    </svg>
                </span>
            </div>
            <div
                class="relative mx-2 overflow-hidden rounded-md bg-gradient-to-br from-fuchsia-600 to-purple-600 p-9 backdrop-blur-xl lg:mx-0">
                <h1 class="pb-2.5 text-3xl font-light text-white">Students</h1>
                <div class="mb-4 mt-2 h-2.5 w-full rounded-full bg-gray-200">
                    <div class="h-2.5 rounded-full bg-yellow-400" style="width: {{ $totalStudent }}%"></div>
                </div>
                <div class="flex items-center justify-between text-white">
                    <p>Total Students</p>
                    <p class="font-semibold">{{ $totalStudent }}</p>
                </div>

                <span class="absolute -top-5 right-7 opacity-20">
                    <svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.584 491.584" xml:space="preserve"
                        width="95px" height="95px">

                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M309.792,219.584v-38.112L396.952,7.16L382.64,0l-85.792,171.584h-22.112l14.208-28.424L274.632,136l-11.912,23.832 L254,140.936L317.032,6.984l-14.488-6.816l-57.312,121.784L189.056,0.232l-14.528,6.704l90.76,196.648h-18.312L149,0.112 l-14.424,6.936l94.632,196.536h-18.472L108.952,0.008L94.64,7.168l87.152,174.304v38.112h-152v272h432v-272H309.792z M288.848,187.584l-6.928,13.856l-6.392-13.856H288.848z M197.792,213.472l3.056,6.112h89.888l3.056-6.112v30.112 c0,4.416-3.584,8-8,8h-80c-4.416,0-8-3.584-8-8V213.472z M445.792,475.584h-400v-240h136v8c0,13.232,10.768,24,24,24h80 c13.232,0,24-10.768,24-24v-8h136V475.584z">
                                        </path>
                                        <path
                                            d="M77.792,443.584h160v-160h-160V443.584z M125.816,427.584c0.136-8.84,7.352-16,16.224-16h31.504 c8.872,0,16.088,7.16,16.224,16H125.816z M93.792,299.584h128v128h-16.024c-0.136-17.664-14.528-32-32.224-32h-15.752H142.04 c-17.696,0-32.088,14.336-32.224,32H93.792V299.584z">
                                        </path>
                                        <path
                                            d="M197.792,355.584c0-22.056-17.944-40-40-40c-22.056,0-40,17.944-40,40c0,22.056,17.944,40,40,40 C179.848,395.584,197.792,377.64,197.792,355.584z M157.792,379.584c-13.232,0-24-10.768-24-24s10.768-24,24-24s24,10.768,24,24 S171.024,379.584,157.792,379.584z">
                                        </path>
                                        <rect x="269.792" y="283.584" width="144" height="16"></rect>
                                        <rect x="269.792" y="331.584" width="144" height="16"></rect>
                                        <rect x="269.792" y="379.584" width="144" height="16"></rect>
                                        <rect x="397.792" y="427.584" width="16" height="16"></rect>
                                        <rect x="269.792" y="427.584" width="112" height="16"></rect>
                                        <rect x="252.702" y="55.616"
                                            transform="matrix(-0.4472 0.8944 -0.8944 -0.4472 519.6956 -193.9584)"
                                            width="134.164" height="15.999"></rect>

                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </span>
            </div>
            <div
                class="relative mx-2 overflow-hidden rounded-md bg-gradient-to-br from-blue-800 to-indigo-900 p-9 backdrop-blur-xl lg:mx-0">

                <h1 class="pb-2.5 text-3xl font-light text-white">Class</h1>
                <div class="mb-4 mt-2 h-2.5 w-full rounded-full bg-gray-200">
                    <div class="h-2.5 rounded-full bg-yellow-400" style="width: {{ $classData->count() }}%"></div>
                </div>
                <div class="flex items-center justify-between text-white">
                    <p>Total Class</p>
                    <p class="font-semibold">{{ $classData->count() }}</p>
                </div>

                <span class="absolute -top-4 right-7 opacity-20">
                    <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="85px" height="85px"
                        viewBox="0 0 29.936 29.936" xml:space="preserve">

                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <path
                                        d="M29.936,1.153H0v20.045h10.91l-3.76,7.584h2.899l1.288-2.613h6.72l1.287,2.613h2.932l-3.787-7.583h11.445V1.153H29.936z M12.292,24.234l1.496-3.035h1.819l1.496,3.035H12.292z M28.646,19.908H1.29V2.443h27.356V19.908z">

                                    </path>
                                    <rect x="22.631" y="17.149" width="5.191" height="1.859"></rect>
                                </g>
                            </g>
                        </g>
                    </svg>
                </span>
            </div>
            <div
                class="relative mx-2 overflow-hidden rounded-md bg-gradient-to-br from-emerald-600 to-emerald-900 p-9 backdrop-blur-xl lg:mx-0">

                <h1 class="pb-2.5 text-3xl font-light text-white">Section</h1>
                <div class="mb-4 mt-2 h-2.5 w-full rounded-full bg-gray-200">
                    <div class="h-2.5 rounded-full bg-yellow-400" style="width: {{ $sectionData->count() }}%"></div>
                </div>
                <div class="flex items-center justify-between text-white">
                    <p>Total Section</p>
                    <p class="font-semibold">{{ $sectionData->count() }}</p>
                </div>

                <span class="absolute -top-4 right-7 opacity-20">
                    <svg width="96px" height="96px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M5 3H3v2h2V3zm2 4h2v2H7V7zm4 0h2v2h-2V7zm2 12h-2v2h2v-2zm2 0h2v2h-2v-2zm6 0h-2v2h2v-2zM7 11h2v2H7v-2zm14 0h-2v2h2v-2zm-2 4h2v2h-2v-2zM7 19h2v2H7v-2zM19 7h2v2h-2V7zM7 3h2v2H7V3zm2 12H7v2h2v-2zM3 7h2v2H3V7zm14 0h-2v2h2V7zM3 11h2v2H3v-2zm2 4H3v2h2v-2zm6-12h2v2h-2V3zm6 0h-2v2h2V3z"
                                fill="#000000"></path>

                        </g>
                    </svg>
                </span>
            </div>
            <div
                class="relative mx-2 overflow-hidden rounded-md bg-gradient-to-br from-stone-500 to-stone-700 p-9 backdrop-blur-xl lg:mx-0">

                <h1 class="pb-2.5 text-3xl font-light text-white">Groups</h1>
                <div class="mb-4 mt-2 h-2.5 w-full rounded-full bg-gray-200">
                    <div class="h-2.5 rounded-full bg-yellow-400" style="width: {{ $groupData->count() }}%"></div>
                </div>
                <div class="flex items-center justify-between text-white">
                    <p>Groups</p>
                    <p class="font-semibold">{{ $groupData->count() }}</p>
                </div>

                <span class="absolute -top-4 right-7 opacity-20">
                    <svg width="95px" height="95px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M2 20h1v1H1v-2h1zm20 0h-1v1h2v-2h-1zM1 5h1V4h1V3H1zm1 2H1v2h1zm0 4H1v2h1zm20-2h1V7h-1zm0 4h1v-2h-1zM2 15H1v2h1zm20 2h1v-2h-1zM5 4h2V3H5zm6 0V3H9v1zm2 0h2V3h-2zm6-1h-2v1h2zM5 21h2v-1H5zm4 0h2v-1H9zm4 0h2v-1h-2zm4 0h2v-1h-2zm4-17h1v1h1V3h-2zm-1 4v2a1.001 1.001 0 0 1-1 1H5a1.001 1.001 0 0 1-1-1V8a1.001 1.001 0 0 1 1-1h14a1.001 1.001 0 0 1 1 1zm-.999 2H19V8H5v2h14m1 4v2a1.001 1.001 0 0 1-1 1H5a1.001 1.001 0 0 1-1-1v-2a1.001 1.001 0 0 1 1-1h14a1.001 1.001 0 0 1 1 1zm-.999 2H19v-2H5v2h14">

                            </path>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                        </g>
                    </svg>
                </span>
            </div>
            <div
                class="relative mx-2 overflow-hidden rounded-md bg-gradient-to-br from-slate-500 to-slate-800 p-9 backdrop-blur-xl lg:mx-0">

                <h1 class="pb-2.5 text-3xl font-light text-white">Remaining Message</h1>
                <div class="mb-4 mt-2 h-2.5 w-full rounded-full bg-gray-200">
                    <div class="h-2.5 rounded-full bg-yellow-400" style="width: {{ $parsentRemainingSMS}}%"></div>
                </div>
                <div class="flex items-center justify-between text-white">
                    <p>Remaining Message</p>
                    <p class="font-semibold">{{ $remainingSMS}}</p>
                </div>

                <span class="absolute -top-6 right-5 opacity-20">
                    <svg fill="#000000" width="100px" height="100px" viewBox="0 0 32 32"
                        xmlns="http://www.w3.org/2000/svg">

                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title></title>
                            <g data-name="Layer 21" id="Layer_21">
                              <path
                                    d="M27.61,7h-2a1,1,0,0,1,.95,1.32l-5.33,16a1,1,0,0,1-.95.68h2a1,1,0,0,0,.95-.68l5.33-16A1,1,0,0,0,27.61,7Z">
                                </path>
                                <path
                                    d="M13,15a1,1,0,0,1-.5-.13l-7-4a1,1,0,0,1,1-1.74l6.59,3.77L23.66,9.06a1,1,0,0,1,.68,1.88l-11,4A1,1,0,0,1,13,15Z">

                                </path>
                                <path d="M11,23H5a1,1,0,0,1,0-2h6a1,1,0,0,1,0,2Z"></path>
                                <path d="M10,19H3a1,1,0,0,1,0-2h7a1,1,0,0,1,0,2Z"></path>
                                <path d="M7,15H4a1,1,0,0,1,0-2H7a1,1,0,0,1,0,2Z"></path>

                                <path
                                    d="M22.28,26H5a1,1,0,0,1,0-2H22.28L27.61,8H3A1,1,0,0,1,3,6H27.61a2,2,0,0,1,1.9,2.63l-5.33,16A2,2,0,0,1,22.28,26Z">

                                </path>
                            </g>
                        </g>
                    </svg>
                </span>
            </div>
            <div
                class="relative mx-2 overflow-hidden rounded-md bg-gradient-to-br from-slate-500 to-green-800 p-9 backdrop-blur-xl lg:mx-0">

                <h1 class="pb-2.5 text-3xl font-light text-white">Total Send Message</h1>
                <div class="mb-4 mt-2 h-2.5 w-full rounded-full bg-gray-200">
                    <div class="h-2.5 rounded-full bg-white" style="width: {{ $parsentRemainingSMS}}%"></div>
                </div>
                <div class="flex items-center justify-between text-white">
                    <p>Total Send Message</p>
                    <p class="font-semibold">{{ $msgData}}</p>
                </div>

                <span class="absolute -top-6 right-5 opacity-20">
                    <svg fill="#000000" width="100px" height="100px" viewBox="0 0 32 32"
                        xmlns="http://www.w3.org/2000/svg">

                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title></title>
                            <g data-name="Layer 21" id="Layer_21">
                                <path
                                    d="M27.61,7h-2a1,1,0,0,1,.95,1.32l-5.33,16a1,1,0,0,1-.95.68h2a1,1,0,0,0,.95-.68l5.33-16A1,1,0,0,0,27.61,7Z">
                                </path>
                                <path
                                    d="M13,15a1,1,0,0,1-.5-.13l-7-4a1,1,0,0,1,1-1.74l6.59,3.77L23.66,9.06a1,1,0,0,1,.68,1.88l-11,4A1,1,0,0,1,13,15Z">
                                </path>
                                <path d="M11,23H5a1,1,0,0,1,0-2h6a1,1,0,0,1,0,2Z"></path>
                                <path d="M10,19H3a1,1,0,0,1,0-2h7a1,1,0,0,1,0,2Z"></path>
                                <path d="M7,15H4a1,1,0,0,1,0-2H7a1,1,0,0,1,0,2Z"></path>
                                <path
                                    d="M22.28,26H5a1,1,0,0,1,0-2H22.28L27.61,8H3A1,1,0,0,1,3,6H27.61a2,2,0,0,1,1.9,2.63l-5.33,16A2,2,0,0,1,22.28,26Z">
                                </path>
                            </g>
                        </g>
                    </svg>
                </span>
            </div>
        </div>
    </div>
    <div class="col-span-1 grid grid-rows-1">
        <div
            class="relative mx-2 grow overflow-hidden rounded-e-lg rounded-t-lg bg-gradient-to-br from-teal-200 to-teal-500 p-9 text-black lg:mx-0">
            <h1 class="text-3xl font-semibold text-black">Todays Student's Attendance</h1>

            <div class="py-6 ps-2 text-lg">
                <h3>
                    <span class="font-semibold">Present:</span>
                    0
                </h3>
                <h3>
                    <span class="font-semibold">Absent:</span>
                    0
                </h3>
                <h3>
                    <span class="font-semibold">Leave:</span>
                    : 0
                </h3>
            </div>

            <span class="absolute -bottom-2 right-6">
                <svg fill="#000000" width="80px" height="80px" viewBox="0 -2.85 29.69 29.69"
                    xmlns="http://www.w3.org/2000/svg">

                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill-rule: evenodd;
                                }
                            </style>
                        </defs>
                        <path id="users" class="cls-1"
                            d="M1448,302a5,5,0,1,1,5-5A5,5,0,0,1,1448,302Zm0-8a3,3,0,1,0,3,3A3,3,0,0,0,1448,294Zm-8.51,13.32A5.835,5.835,0,0,0,1434,304c-4.51,0-6.32,3.653-6.83,8h-1.99c0.65-5.425,3.21-10,8.82-10a7.6,7.6,0,0,1,6.75,3.65A7.129,7.129,0,0,0,1439.49,307.32ZM1434,300a6,6,0,1,1,6-6A6,6,0,0,1,1434,300Zm0-10a4,4,0,1,0,4,4A4,4,0,0,0,1434,290Zm14,14c4.4,0,6.38,3.668,6.87,8h-1.98c-0.36-3.261-1.66-6-4.89-6s-4.53,2.741-4.89,6h-1.98C1441.62,307.669,1443.6,304,1448,304Z"
                            transform="translate(-1425.19 -288)"></path>
                    </g>
                </svg>
            </span>
        </div>

        <div
            class="relative mt-4 grow overflow-hidden rounded-e-lg rounded-t-lg bg-gradient-to-br from-amber-500 to-pink-500 p-9 backdrop-blur-xl">

            <div class="rounded-md lg:mx-0">
                <h1 class="text-3xl font-semibold">Todays Teacher's Attendance</h1>
            </div>

            <div class="py-6 ps-2 text-lg">
                <h3>
                    <span class="font-semibold">Present:</span>
                    0
                </h3>
                <h3>
                    <span class="font-semibold">Absent:</span>
                    0
                </h3>
                <h3>
                    <span class="font-semibold">Leave:</span>
                    0
                </h3>
            </div>

            <span class="absolute -bottom-3 right-6">

                <svg height="100px" width="100px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 28.054 28.054" xml:space="preserve"
                    fill="#000000">

                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <path style="fill: #000000"
                                d="M27.961,1.867v11.204c0,0.319-0.258,0.578-0.578,0.578H12.144c-0.319,0-0.578-0.259-0.578-0.578 v-0.885l1.156-0.775v1.082h14.082V2.444H12.721v4.229c-0.051,0.039-0.106,0.073-0.154,0.117l-0.162,0.112 c-0.195-0.51-0.492-0.912-0.839-1.242V1.867c0-0.319,0.26-0.578,0.578-0.578h15.239C27.703,1.289,27.961,1.547,27.961,1.867z M14.316,9.461l0.692-0.464h-0.001c0.001-0.004,0.003-0.004,0.005-0.007c0.352-0.349,0.406-0.868,0.188-1.277l5.599-3.799 l-0.254-0.375l-5.646,3.83c-0.177-0.128-0.375-0.209-0.583-0.216c-0.296-0.01-0.597,0.09-0.823,0.317c0,0-0.005,0.006-0.007,0.006 l-0.138,0.096l-1.254,0.856V8.064c-0.233-2.769-3.442-2.728-3.442-2.728h-1.39L6.094,7.258L4.92,5.337H3.587 c-3.621,0.068-3.493,2.727-3.493,2.727v6.206h0.002c0.001,0.016-0.002,0.035-0.002,0.048c0,0.591,0.477,1.066,1.066,1.066 c0.587,0,1.064-0.477,1.064-1.066c0-0.013,0-0.032-0.002-0.048h0.002V8.53H2.89L2.882,26.613c0,0.795,0.646,1.441,1.438,1.441 c0.795,0,1.439-0.646,1.439-1.441v-11.67H6.4v11.683l0.012,0.013c0.01,0.781,0.646,1.415,1.432,1.415 c0.789,0,1.431-0.643,1.431-1.432L9.271,8.5h0.693v1.888c0,0.002,0,0.007,0,0.009c0,0.587,0.477,1.065,1.063,1.065 c0.173,0,0.328-0.049,0.475-0.125l0.005,0.007l1.84-1.234L14.316,9.461z M6.073,4.874c1.346,0,2.437-1.091,2.437-2.437 S7.419,0,6.073,0S3.636,1.092,3.636,2.437S4.727,4.874,6.073,4.874z">

                            </path>
                        </g>
                    </g>
                </svg>
            </span>
        </div>
    </div>
</div>

<div class="mt-4 grid gap-3 md:grid-cols-2">
    <div class="">
        <div class="rounded-e-lg rounded-t-xl border-2 border-[#1E3A8A] bg-gray-200 pb-8">
            <div class="rounded-e-lg rounded-t-lg bg-gradient-to-br from-[#1E3A8A] to-[#0054af] px-6 py-4 lg:mx-0">
                <h1 class="text-xl font-semibold text-white">Semester Exam's Information</h1>
            </div>
            <div class="mt-5 px-6">
                <div>
                    <label for="password" class="mb-1.5 block text-sm font-medium text-gray-900">
                        Academic Year
                    </label>

                    <select name="year" id="date-dropdown"
                        class="block w-full rounded-lg border-0 bg-white p-3.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">

                        <option>Select Year</option>
                    </select>
                </div>
                <div class="mt-5">
                    <label for="email" class="mb-1.5 block text-sm font-medium text-gray-900">Choose Exam</label>
                    <select id="countries" name="category"
                        class="block w-full rounded-lg border-0 bg-white p-3.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">

                        <option selected>Choose Exam</option>
                        <option value="">X</option>
                        <option value="">Y</option>
                    </select>
                </div>
                <div class=""></div>
                <div class="mt-5 text-end">
                    <button type="submit"
                        class="rounded-lg bg-blue-700 px-16 py-3.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">

                        Search
                    </button>
                </div>
            </div>
        </div>
        <div class="text-md mt-5 grid gap-3 font-semibold md:grid-cols-2">
            <div
                class="relative overflow-hidden rounded-md bg-gradient-to-br from-blue-600 to-blue-950 px-8 py-10 text-start text-white">

                <a href="#" class="">
                    <div class="text-xl font-light">
                        <p>Total Class: 0</p>
                    </div>
                </a>

                <img class="absolute -right-48 -top-14 h-40 -rotate-45"
                    src="{{ asset('assets/images/dashboard-welcome-bg.svg') }}" alt="" />
            </div>
            <div
                class="relative overflow-hidden rounded-md bg-gradient-to-br from-blue-600 to-blue-950 px-8 py-10 text-start text-white">

                <a href="#" class="">
                    <div class="text-xl font-light">
                        <p>Total Section: 0</p>
                    </div>
                </a>
               <img class="absolute -right-48 -top-14 h-40 -rotate-45"
                    src="{{ asset('assets/images/dashboard-welcome-bg.svg') }}" alt="" />
            </div>
            <div
                class="relative overflow-hidden rounded-md bg-gradient-to-br from-blue-600 to-blue-950 px-8 py-10 text-start text-white">

                <a href="#" class="">
                    <div class="text-xl font-light">
                        <p>Exam Taken: 0</p>
                    </div>
                </a>
                <img class="absolute -right-48 -top-14 h-40 -rotate-45"
                    src="{{ asset('assets/images/dashboard-welcome-bg.svg') }}" alt="" />
            </div>
            <div
                class="relative overflow-hidden rounded-md bg-gradient-to-br from-blue-600 to-blue-950 px-8 py-10
                <a href="#" class="">
                    <div class="text-xl font-light">
                        <p>Exam not taken: 0</p>
                    </div>
                </a>
                <img class="absolute -right-48 -top-14 h-40 -rotate-45"
                    src="{{ asset('assets/images/dashboard-welcome-bg.svg') }}" alt="" />

            </div>
        </div>
    </div>
    <div class="">
        <div class="rounded-md bg-gradient-to-br from-purple-600 to-purple-900 px-6 py-4">
            <h1 class="text-xl font-semibold text-white">Total Student Pass and Fail</h1>
        </div>
        <div class="text-md mt-3 space-y-1.5">
            <div
                class="relative overflow-hidden rounded-md bg-gradient-to-br from-purple-600 to-purple-900 px-8 py-10 text-start text-white">

                <a href="#" class="">
                    <div class="text-xl font-light">
                        <p>Total Pass: 0</p>
                    </div>
                </a>
                <img class="absolute -right-48 -top-14 h-40 -rotate-45"
                    src="{{ asset('assets/images/dashboard-welcome-bg.svg') }}" alt="" />
            </div>
            <div
                class="relative overflow-hidden rounded-md bg-gradient-to-br from-purple-600 to-purple-900 px-8 py-10 text-start text-white">

                <a href="#" class="">
                    <div class="text-xl font-light">
                        <p>Total Fail: 0</p>
                    </div>
                </a>

                <img class="absolute -right-48 -top-14 h-40 -rotate-45"
                    src="{{ asset('assets/images/dashboard-welcome-bg.svg') }}" alt="" />
            </div>
            <div
                class="relative overflow-hidden rounded-md bg-gradient-to-br from-purple-600 to-purple-900 px-8 py-10 text-start text-white">

                <a href="#" class="">
                    <div class="text-xl font-light">
                        <p>Total Participated: 0</p>
                    </div>
                </a>
                <img class="absolute -right-48 -top-14 h-40 -rotate-45"
                    src="{{ asset('assets/images/dashboard-welcome-bg.svg') }}" alt="" />
            </div>
            <div
                class="relative overflow-hidden rounded-md bg-gradient-to-br from-purple-600 to-purple-900 px-8 py-10 text-start text-white">

                <a href="#" class="">
                    <div class="text-xl font-light">
                        <p>Not Participated: 0</p>
                    </div>
                </a>

                <img class="absolute -right-48 -top-14 h-40 -rotate-45"
                    src="{{ asset('assets/images/dashboard-welcome-bg.svg') }}" alt="" />

            </div>
        </div>
    </div>
</div>
@endsection
