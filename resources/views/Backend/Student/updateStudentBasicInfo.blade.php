@extends('Backend.app')
@section('title')
    Student BasicInfo
@endsection

@section('Dashboard')
    @include('Message.message')

    <style>
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    </style>
    <div class="gradient-bg relative overflow-hidden rounded-md px-6 py-4 font-semibold text-white">
        <h2 class="">Student Basic Info</h2>
        <span class="absolute -bottom-2 right-3 rotate-3">
            <svg
                fill="#ffffff"
                width="44px"
                height="44px"
                viewBox="0 0 256 256"
                id="Flat"
                xmlns="http://www.w3.org/2000/svg"
            >
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M225.26514,60.20508l-96-32a4.00487,4.00487,0,0,0-2.53028,0l-96,32c-.05713.019-.10815.04809-.16406.06958-.08545.033-.16821.06811-.251.10644a4.04126,4.04126,0,0,0-.415.22535c-.06714.04174-.13575.08007-.20044.12548a3.99,3.99,0,0,0-.47632.39307c-.02027.01953-.0437.0354-.06348.05542a3.97787,3.97787,0,0,0-.44556.53979c-.04077.0586-.07373.12183-.11132.18262a3.99741,3.99741,0,0,0-.23487.43262c-.03613.07837-.06811.15771-.09912.23852a3.96217,3.96217,0,0,0-.144.46412c-.01929.07714-.04126.15234-.05591.2312A3.98077,3.98077,0,0,0,28,64v80a4,4,0,0,0,8,0V69.55005l43.87524,14.625A59.981,59.981,0,0,0,104.272,175.09814a91.80574,91.80574,0,0,0-53.39062,38.71631,3.99985,3.99985,0,1,0,6.70117,4.36914,84.02266,84.02266,0,0,1,140.83447,0,3.99985,3.99985,0,1,0,6.70117-4.36914A91.80619,91.80619,0,0,0,151.728,175.09814a59.981,59.981,0,0,0,24.39673-90.92309l49.14038-16.38013a4.00037,4.00037,0,0,0,0-7.58984ZM180,120A52,52,0,1,1,87.92993,86.85986l38.80493,12.93506a4.00487,4.00487,0,0,0,2.53028,0l38.80493-12.93506A51.85133,51.85133,0,0,1,180,120ZM168.00659,78.44775l-.01294.0044L128,91.7832,44.64893,64,128,36.2168,211.35107,64Z"
                    ></path>
                </g>
            </svg>
        </span>
        <span class="absolute -top-4 right-12 rotate-3 opacity-45">
            <svg
                width="64px"
                height="64px"
                viewBox="0 0 48 48"
                id="Layer_1"
                version="1.1"
                xml:space="preserve"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                fill="#ffffff"
                stroke="#ffffff"
                transform="rotate(45)"
            >
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <style type="text/css">
                        .st0 {
                            fill: #ffffff;
                        }
                    </style>
                    <path
                        class="st0"
                        d="M35.833,11.679l0.292-1.984c0.117-0.766-0.106-1.543-0.612-2.132C35.003,6.97,34.262,6.63,33.48,6.63H14.52 c-0.782,0-1.523,0.34-2.032,0.933c-0.506,0.589-0.729,1.367-0.612,2.13l0.3,2.044c-1.211,0.355-2.327,0.998-3.239,1.91 C7.475,15.108,6.67,17.056,6.67,19.13c0,4.273,3.477,7.75,7.75,7.75h0.914c1.356,2.123,3.479,3.688,5.916,4.365V35.5h-0.5 c-1.587,0-2.895,1.168-3.137,2.688h-0.969c-0.851,0-1.543,0.692-1.543,1.544V41c0,0.276,0.224,0.5,0.5,0.5h16.8 c0.276,0,0.5-0.224,0.5-0.5v-1.269c0-0.852-0.692-1.544-1.543-1.544h-0.969c-0.242-1.519-1.55-2.688-3.137-2.688h-0.5v-4.255 c2.438-0.677,4.562-2.243,5.916-4.365h1.084c2.063,0,4.01-0.805,5.485-2.268c1.46-1.472,2.265-3.418,2.265-5.482 C41.5,15.653,39.142,12.596,35.833,11.679z M7.67,19.13c0-1.807,0.701-3.503,1.974-4.776c0.759-0.76,1.68-1.303,2.679-1.619 l1.482,10.087c0.156,1.081,0.481,2.105,0.955,3.059h-0.34C10.698,25.88,7.67,22.852,7.67,19.13z M31.9,39.731V40.5H16.1v-0.769 c0-0.3,0.244-0.544,0.543-0.544h1.419h11.875h1.419C31.656,39.188,31.9,39.432,31.9,39.731z M29.38,38.188H18.62 c0.227-0.966,1.096-1.688,2.13-1.688h1h4.5h1C28.284,36.5,29.153,37.222,29.38,38.188z M22.25,35.5v-4.037 c0.581,0.099,1.165,0.166,1.75,0.166c0.584,0,1.169-0.067,1.75-0.166V35.5H22.25z M26.137,30.383c-1.407,0.327-2.868,0.327-4.272,0 c-2.432-0.573-4.559-2.126-5.838-4.264c-0.64-1.046-1.054-2.204-1.232-3.442l-1.93-13.133c-0.073-0.478,0.066-0.962,0.382-1.331 C13.565,7.843,14.03,7.63,14.52,7.63h18.96c0.49,0,0.955,0.213,1.273,0.584c0.316,0.368,0.455,0.853,0.382,1.331 c0,0.001,0,0.001,0,0.002l-0.352,2.394c0,0.002-0.002,0.004-0.003,0.006c-0.001,0.004,0.001,0.008,0,0.013l-1.576,10.719 c-0.178,1.237-0.593,2.395-1.234,3.444C30.694,28.257,28.567,29.81,26.137,30.383z M38.528,23.905 c-1.283,1.274-2.98,1.975-4.778,1.975h-0.51c0.475-0.954,0.799-1.978,0.955-3.057l1.488-10.126c2.815,0.84,4.817,3.449,4.817,6.433 C40.5,20.928,39.799,22.625,38.528,23.905z"
                    ></path>
                    <path
                        class="st0"
                        d="M29.605,15.762h-3.919l-1.211-3.727c-0.134-0.412-0.817-0.412-0.951,0l-1.211,3.727h-3.919 c-0.217,0-0.409,0.14-0.476,0.346s0.006,0.432,0.182,0.559l3.17,2.303l-1.211,3.728c-0.067,0.206,0.006,0.432,0.182,0.559 c0.176,0.128,0.412,0.128,0.588,0L24,20.953l3.17,2.303c0.088,0.064,0.191,0.096,0.294,0.096s0.206-0.032,0.294-0.096 c0.175-0.127,0.249-0.353,0.182-0.559l-1.211-3.728l3.17-2.303c0.175-0.127,0.249-0.353,0.182-0.559S29.822,15.762,29.605,15.762z M25.847,18.375c-0.175,0.127-0.249,0.353-0.182,0.559l0.848,2.609l-2.219-1.612c-0.088-0.064-0.191-0.096-0.294-0.096 s-0.206,0.032-0.294,0.096l-2.219,1.612l0.848-2.609c0.067-0.206-0.006-0.432-0.182-0.559l-2.219-1.612h2.743 c0.217,0,0.409-0.14,0.476-0.346L24,13.808l0.848,2.609c0.067,0.206,0.259,0.346,0.476,0.346h2.743L25.847,18.375z"
                    ></path>
                </g>
            </svg>
        </span>
        <span class="absolute -top-2 right-3 rotate-3">
            <svg fill="#ffffff" width="24px" height="24px" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M11.448 10c-.4-.01-.796.065-1.082.345-.287.28-.373.675-.366 1.08.008.404.093.864.25 1.42l4.515 15.986c.088.31.205.575.39.784.184.208.447.35.714.38.532.056.975-.228 1.372-.595l3.144-2.91c.244-.244.468-.174.636-.006l3.252 3.122c.284.272.652.383 1.01.385.357.002.73-.11 1.013-.392l3.306-3.305c.284-.284.396-.655.397-1.016 0-.36-.11-.74-.405-1.02l-3.25-3.123c-.177-.176-.166-.436.013-.615l3.027-3.142c.378-.394.668-.844.607-1.38-.03-.267-.174-.53-.383-.714-.21-.184-.475-.3-.786-.39L12.846 10.25c-.544-.157-.998-.237-1.398-.25zm-.03 1c.26.006.662.068 1.17.216l15.976 4.644c.646.188.362.562.102.822l-3.027 3.144c-.274.284-.387.65-.39 1.01-.002.358.11.74.403 1.02l3.25 3.12c.228.227.095.508-.007.61L25.59 28.89c-.14.164-.466.15-.623-.006l-3.25-3.12c-.285-.273-.655-.382-1.01-.38-.353 0-.716.108-1 .372l-3.145 2.91c-.48.396-.712.325-.83-.093l-4.517-15.987c-.147-.52-.21-.922-.215-1.18 0-.407.198-.407.418-.407zm-6.92 15c-.45 0-.66-.55-.354-.853l2-2c.457-.455 1.165.25.71.707l-2.003 2c-.093.097-.217.146-.353.146zM25.5 4c.45 0 .66.55.356.853l-2 2c-.457.455-1.165-.25-.71-.707l2.003-2c.093-.097.214-.146.35-.146zM4.497 4c-.45 0-.658.55-.353.853l2 2c.457.455 1.165-.25.71-.707l-2.003-2C4.758 4.05 4.634 4 4.498 4zM0 14.5c0-.277.223-.5.5-.5h3c.277 0 .5.223.5.5s-.223.5-.5.5h-3c-.277 0-.5-.223-.5-.5zM14.5 0c.277 0 .5.223.5.5v3c0 .277-.223.5-.5.5s-.5-.223-.5-.5v-3c0-.277.223-.5.5-.5z"
                    ></path>
                </g>
            </svg>
        </span>
    </div>

    <div class="">
        <div class="border-x-2 border-b-2 pt-6 sm:rounded-md">
            <div class="ms-6 inline-block rounded-t-xl border-x border-t px-2 pt-2">
                <div class="items-start justify-start md:flex">
                    <a href="{{ route('updateStudentBasicInfo', $school_code) }}">
                        <button
                            type="button"
                            class="me-2 flex items-center justify-center gap-3 rounded-t-lg bg-rose-700 px-7 py-2.5 pb-4 text-sm font-medium text-white hover:bg-rose-600 focus:outline-none focus:ring-4 focus:ring-rose-300"
                        >
                            <span>Basic Info</span>
                            <span>
                                <svg
                                    width="20px"
                                    height="20px"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M12 17V11"
                                            stroke="#ffffff"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                        ></path>
                                        <circle
                                            cx="1"
                                            cy="1"
                                            r="1"
                                            transform="matrix(1 0 0 -1 11 9)"
                                            fill="#ffffff"
                                        ></circle>
                                        <path
                                            d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8"
                                            stroke="#ffffff"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                        ></path>
                                    </g>
                                </svg>
                            </span>
                        </button>
                    </a>
                    <a href="{{ route('studentClassInfo', $school_code) }}">
                        <button
                            type="button"
                            class="me-2 flex items-center justify-center gap-3 rounded-md bg-blue-700 px-7 py-2.5 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300"
                        >
                            <span>Class Info</span>
                            <span>
                                <svg
                                    width="20px"
                                    height="20px"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M12 17V11"
                                            stroke="#ffffff"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                        ></path>
                                        <circle
                                            cx="1"
                                            cy="1"
                                            r="1"
                                            transform="matrix(1 0 0 -1 11 9)"
                                            fill="#ffffff"
                                        ></circle>
                                        <path
                                            d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8"
                                            stroke="#ffffff"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                        ></path>
                                    </g>
                                </svg>
                            </span>
                        </button>
                    </a>

                    <a href="{{ route('StudentPhoto', $school_code) }}">
                        <button
                            type="button"
                            class="me-2 flex items-center justify-center gap-3 rounded-md bg-blue-700 px-7 py-2.5 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300"
                        >
                            <span>Photo</span>
                            <span>
                                <svg
                                    width="20px"
                                    height="20px"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M21.1935 16.793C20.8437 19.2739 20.6689 20.5143 19.7717 21.2572C18.8745 22 17.5512 22 14.9046 22H9.09536C6.44881 22 5.12553 22 4.22834 21.2572C3.33115 20.5143 3.15626 19.2739 2.80648 16.793L2.38351 13.793C1.93748 10.6294 1.71447 9.04765 2.66232 8.02383C3.61017 7 5.29758 7 8.67239 7H15.3276C18.7024 7 20.3898 7 21.3377 8.02383C22.0865 8.83268 22.1045 9.98979 21.8592 12"
                                            stroke="#ffffff"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                        ></path>
                                        <path
                                            d="M19.5617 7C19.7904 5.69523 18.7863 4.5 17.4617 4.5H6.53788C5.21323 4.5 4.20922 5.69523 4.43784 7"
                                            stroke="#ffffff"
                                            stroke-width="1.5"
                                        ></path>
                                        <path
                                            d="M17.4999 4.5C17.5283 4.24092 17.5425 4.11135 17.5427 4.00435C17.545 2.98072 16.7739 2.12064 15.7561 2.01142C15.6497 2 15.5194 2 15.2588 2H8.74099C8.48035 2 8.35002 2 8.24362 2.01142C7.22584 2.12064 6.45481 2.98072 6.45704 4.00434C6.45727 4.11135 6.47146 4.2409 6.49983 4.5"
                                            stroke="#ffffff"
                                            stroke-width="1.5"
                                        ></path>
                                        <circle
                                            cx="16.5"
                                            cy="11.5"
                                            r="1.5"
                                            stroke="#ffffff"
                                            stroke-width="1.5"
                                        ></circle>
                                        <path
                                            d="M19.9999 20L17.1157 17.8514C16.1856 17.1586 14.8004 17.0896 13.7766 17.6851L13.5098 17.8403C12.7984 18.2542 11.8304 18.1848 11.2156 17.6758L7.37738 14.4989C6.6113 13.8648 5.38245 13.8309 4.5671 14.4214L3.24316 15.3803"
                                            stroke="#ffffff"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                        ></path>
                                    </g>
                                </svg>
                            </span>
                        </button>
                    </a>

                    <a href="{{ route('getStudent', $school_code) }}">
                        <button
                            type="button"
                            class="flex items-center justify-center gap-3 rounded-md bg-blue-700 px-7 py-2.5 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            <span>Add Student</span>
                            <span>
                                <svg
                                    width="20px"
                                    height="20px"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15"
                                            stroke="#ffffff"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                        ></path>
                                        <path
                                            d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8"
                                            stroke="#ffffff"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                        ></path>
                                    </g>
                                </svg>
                            </span>
                        </button>
                    </a>
                </div>
            </div>

            <form class="border-t-2 px-6" action="{{ route('getStudentData', $school_code) }}" method="GET">
                @csrf

                <div class="mb-6 mt-6 grid gap-2 md:grid-cols-8">
                    <div>
                        <select
                            id="class"
                            name="class_name"
                            class="block h-full w-full rounded-md border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option selected>Choose a class</option>
                            @foreach ($classData as $data)
                                <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <select
                            id="group"
                            name="group"
                            class="block h-full w-full rounded-md border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option selected>Choose a Group</option>
                            @foreach ($groupData as $group)
                                <option value="{{ $group->group_name }}">{{ $group->group_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select
                            id="section"
                            name="section"
                            class="block h-full w-full rounded-md border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option selected>Choose a section</option>
                            @foreach ($sectionData as $section)
                                <option value="{{ $section->section_name }}">{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select
                            id="gender"
                            name="gender"
                            class="block h-full w-full rounded-md border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option selected disabled>Selected Gender</option>
                            <option value="Male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div>
                        <select
                            id="section"
                            name="year"
                            class="block h-full w-full rounded-md border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        >
                            @foreach ($Year as $year)
                                <option value="{{ $year->academic_year_name }}">
                                    {{ $year->academic_year_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <select
                            id=""
                            name="session"
                            class="block h-full w-full rounded-md border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        >
                            <option selected>Choose a session</option>
                            @foreach ($Session as $session)
                                <option value="{{ $session->academic_session_name }}">
                                    {{ $session->academic_session_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <input
                        type="text"
                        class="block w-full grow rounded-md border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        placeholder=""
                    />

                    <div class="w-full">
                        <button
                            type="submit"
                            class="mb-2 me-2 flex h-full w-full items-center justify-center gap-3 rounded-md bg-blue-700 px-6 py-3.5 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            <span>Search</span>
                            <span>
                                <svg
                                    width="20px"
                                    height="20px"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                                            stroke="#ffffff"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                    </g>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </form>

            <form action="{{ route('updateStudent', $school_code) }}" method="POST">
                @csrf
                @method('PUT')
                <table class="w-full text-left text-sm text-black rtl:text-right">
                    <thead class="border-b border-blue-400 bg-blue-600 text-xs uppercase text-white">
                        <tr>
                            <th scope="col" class="bg-blue-500 px-3 py-1">
                                {{--
                                    <input type="checkbox" id="select-all-checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 ">
                                --}}
                            </th>
                            <th scope="col" class="px-3 py-1">Roll</th>
                            <th scope="col" class="bg-blue-500 px-3 py-1">Student ID</th>
                            <th scope="col" class="px-3 py-1">Name</th>

                            <th scope="col" class="px-3 py-1">Father Name</th>
                            <th scope="col" class="bg-blue-500 px-3 py-1">Father NID</th>
                            <th scope="col" class="px-3 py-1">Mother Name</th>
                            <th scope="col" class="bg-blue-500 px-3 py-1">Mother NID</th>
                            <th scope="col" class="px-3 py-1">BirthDate</th>
                            <th scope="col" class="bg-blue-500 px-3 py-1">Gender</th>
                            <th scope="col" class="px-3 py-1">Religion</th>
                            <th scope="col" class="bg-blue-500 px-3 py-1">BG</th>
                            <th scope="col" class="px-3 py-1">Mobile</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($student !== null)
                            {{-- @dd($student) <!-- Add this line to inspect the value --> --}}
                            @foreach ($student as $key => $data)
                                <tr>
                                    <td scope="col" class="px-3 py-1">
                                        <input
                                            type="checkbox"
                                            value="{{ $data->id }}"
                                            name="id[]"
                                            class="row-checkbox"
                                            data-row-index="{{ $key }}"
                                        />
                                    </td>
                                    <td scope="col" class="px-3 py-1">
                                        <span class="row-data">{{ $data->student_roll }}</span>
                                        <input
                                            type="text"
                                            name="student_roll[{{ $data->id }}]"
                                            class="form-control row-input hidden px-2 md:h-[20px] md:w-[100px]"
                                            value="{{ $data->student_roll }}"
                                        />
                                    </td>
                                    <td scope="col" class="px-3 py-1">
                                        <span class="row-data">{{ $data->student_id }}</span>
                                        <input
                                            type="text"
                                            name="student_id[{{ $data->id }}]"
                                            class="form-control row-input hidden px-2 md:h-[20px] md:w-[100px]"
                                            value="{{ $data->student_id }}"
                                        />
                                    </td>
                                    <td scope="col" class="px-3 py-1">
                                        <span class="row-data">{{ $data->name }}</span>
                                        <input
                                            type="text"
                                            name="name[{{ $data->id }}]"
                                            class="form-control row-input hidden px-2 md:h-[20px] md:w-[100px]"
                                            value="{{ $data->name }} "
                                        />
                                    </td>

                                    <td scope="col" class="px-3 py-1">
                                        <span class="row-data">{{ $data->father_name }}</span>
                                        <input
                                            type="text"
                                            name="father_name[{{ $data->id }}]"
                                            class="form-control row-input hidden px-2 md:h-[20px] md:w-[100px]"
                                            value="{{ $data->father_name }}"
                                        />
                                    </td>
                                    <td scope="col" class="px-3 py-1">
                                        <span class="row-data">{{ $data->father_nid }}</span>
                                        <input
                                            type="text"
                                            name="father_nid[{{ $data->id }}]"
                                            class="form-control row-input hidden px-2 md:h-[20px] md:w-[100px]"
                                            value="{{ $data->father_nid }}"
                                        />
                                    </td>
                                    <td scope="col" class="px-3 py-1">
                                        <span class="row-data">{{ $data->mother_name }}</span>
                                        <input
                                            type="text"
                                            name="mother_name[{{ $data->id }}]"
                                            class="form-control row-input hidden px-2 md:h-[20px] md:w-[100px]"
                                            value=" {{ $data->mother_name }}"
                                        />
                                    </td>
                                    <td scope="col" class="px-3 py-1">
                                        <span class="row-data">{{ $data->mother_nid }}</span>
                                        <input
                                            type="text"
                                            name="mother_nid[{{ $data->id }}]"
                                            class="form-control row-input hidden px-2 md:h-[30px] md:w-[100px]"
                                            value="{{ $data->mother_nid }}"
                                        />
                                    </td>
                                    <td scope="col" class="px-3 py-1">
                                        <span class="row-data">{{ $data->birth_date }}</span>
                                        <input
                                            type="text"
                                            name="birth_date[{{ $data->id }}]"
                                            class="form-control row-input hidden px-2 md:h-[20px] md:w-[100px]"
                                            value="{{ $data->birth_date }}"
                                        />
                                    </td>
                                    <td scope="col" class="px-3 py-1">
                                        <span class="row-data">{{ $data->gender }}</span>
                                        <input
                                            type="text"
                                            name="gender[{{ $data->id }}]"
                                            class="form-control row-input hidden px-2 md:h-[20px] md:w-[100px]"
                                            value=" {{ $data->gender }}"
                                        />
                                    </td>
                                    <td scope="col" class="px-3 py-1">
                                        <span class="row-data">{{ $data->religious }}</span>
                                        <input
                                            type="text"
                                            name="religious[{{ $data->id }}]"
                                            class="form-control row-input hidden px-2 md:h-[20px] md:w-[100px]"
                                            value=" {{ $data->religious }}"
                                        />
                                    </td>
                                    <td scope="col" class="px-3 py-1">
                                        <span class="row-data">{{ $data->blood_group }}</span>
                                        <input
                                            type="text"
                                            name="blood_group[{{ $data->id }}]"
                                            class="form-control row-input hidden px-2 md:h-[20px] md:w-[100px]"
                                            value="{{ $data->blood_group }}"
                                        />
                                    </td>
                                    <td scope="col" class="px-3 py-1">
                                        <span class="row-data">{{ $data->mobile_no }}</span>
                                        <input
                                            type="text"
                                            name="mobile_no[{{ $data->id }}]"
                                            class="form-control row-input hidden px-2 md:h-[20px] md:w-[100px]"
                                            value=" {{ $data->mobile_no }}"
                                        />
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="mb-4 mt-5 flex justify-end px-4">
                    <button
                        type="submit"
                        class="mb-2 me-2 flex items-center justify-center gap-3 rounded-md bg-blue-700 px-7 py-3.5 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        <span>Update</span>
                        <span>
                            <svg
                                width="20px"
                                height="20px"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M13 3H7C5.89543 3 5 3.89543 5 5V10M13 3L19 9M13 3V8C13 8.55228 13.4477 9 14 9H19M19 9V19C19 20.1046 18.1046 21 17 21H10C7.79086 21 6 19.2091 6 17V17C6 14.7909 7.79086 13 10 13H13M13 13L10 10M13 13L10 16"
                                        stroke="#ffffff"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    ></path>
                                </g>
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Function to toggle between displaying text and input fields
        function toggleRowEditing(rowIndex) {
            var row = document.querySelector('tbody').children[rowIndex];
            var inputs = row.querySelectorAll('.row-input');
            var dataFields = row.querySelectorAll('.row-data');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].classList.toggle('hidden');
                dataFields[i].classList.toggle('hidden');
            }
        }

        // Event listener for checkbox change
        document.querySelectorAll('.row-checkbox').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                var rowIndex = this.getAttribute('data-row-index');
                toggleRowEditing(rowIndex);
            });
        });

        // Event listener for update button click
        document.getElementById('update-btn').addEventListener('click', function () {
            // Handle update logic here
        });

        // Event listener for select all checkbox
        document.getElementById('select-all-checkbox').addEventListener('change', function () {
            var checkboxes = document.querySelectorAll('.row-checkbox');
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = this.checked;
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#class').change(function () {
                var class_name = $(this).val();
                $.ajax({
                    url: '{{ route('basic.info.get-groups', $school_code) }}',
                    method: 'post',
                    data: {
                        class: class_name,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (result) {
                        $('#group').empty();
                        $('#group').append('<option disabled selected value="">Select</option>');
                        $.each(result, function (key, value) {
                            $('#group').append(
                                '<option value="' + value.group_name + '">' + value.group_name + '</option>',
                            );
                        });
                    },
                });
            });
            //section
            $('#class').change(function () {
                var class_name = $(this).val();
                $.ajax({
                    url: '{{ route('basic.info.get-sections', $school_code) }}',
                    method: 'post',
                    data: {
                        class: class_name,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (result) {
                        $('#section').empty();
                        $('#section').append('<option disabled selected value="">Select</option>');
                        $.each(result, function (key, value) {
                            $('#section').append(
                                '<option value="' + value.section_name + '">' + value.section_name + '</option>',
                            );
                        });
                    },
                });
            });
        });
    </script>
@endsection
