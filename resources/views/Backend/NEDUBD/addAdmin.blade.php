@extends('Backend.app')
@section('title')
Add Admin
@endsection
@section('Dashboard')
@include('/Message/message')


<style>
    .upload-box {
        width: 316px;
        height: 316px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #D1D5DB;
        font-size: 16px;
        cursor: pointer;
    }

    #imagePreview img {
        max-width: 100%;
        max-height: 100%;
        cursor: pointer;
    }

    .border-b-only {
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 2px solid #D1D5DB;
    }
</style>
<div class="gradient-bg py-4 px-6 text-white font-semibold mb-4 rounded-md relative overflow-hidden">
    <h2 class="">Add New Members</h2>
    <span class="absolute right-3 -bottom-2 rotate-3">
        <svg fill="#ffffff" width="44px" height="44px" viewBox="0 0 256 256" id="Flat"
            xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path
                    d="M225.26514,60.20508l-96-32a4.00487,4.00487,0,0,0-2.53028,0l-96,32c-.05713.019-.10815.04809-.16406.06958-.08545.033-.16821.06811-.251.10644a4.04126,4.04126,0,0,0-.415.22535c-.06714.04174-.13575.08007-.20044.12548a3.99,3.99,0,0,0-.47632.39307c-.02027.01953-.0437.0354-.06348.05542a3.97787,3.97787,0,0,0-.44556.53979c-.04077.0586-.07373.12183-.11132.18262a3.99741,3.99741,0,0,0-.23487.43262c-.03613.07837-.06811.15771-.09912.23852a3.96217,3.96217,0,0,0-.144.46412c-.01929.07714-.04126.15234-.05591.2312A3.98077,3.98077,0,0,0,28,64v80a4,4,0,0,0,8,0V69.55005l43.87524,14.625A59.981,59.981,0,0,0,104.272,175.09814a91.80574,91.80574,0,0,0-53.39062,38.71631,3.99985,3.99985,0,1,0,6.70117,4.36914,84.02266,84.02266,0,0,1,140.83447,0,3.99985,3.99985,0,1,0,6.70117-4.36914A91.80619,91.80619,0,0,0,151.728,175.09814a59.981,59.981,0,0,0,24.39673-90.92309l49.14038-16.38013a4.00037,4.00037,0,0,0,0-7.58984ZM180,120A52,52,0,1,1,87.92993,86.85986l38.80493,12.93506a4.00487,4.00487,0,0,0,2.53028,0l38.80493-12.93506A51.85133,51.85133,0,0,1,180,120ZM168.00659,78.44775l-.01294.0044L128,91.7832,44.64893,64,128,36.2168,211.35107,64Z">
                </path>
            </g>
        </svg>
    </span>
    <span class="absolute right-12 -top-4 rotate-3 opacity-45">
        <svg width="64px" height="64px" viewBox="0 0 48 48" id="Layer_1" version="1.1" xml:space="preserve"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff"
            stroke="#ffffff" transform="rotate(45)">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <style type="text/css">
                    .st0 {
                        fill: #ffffff;
                    }
                </style>
                <path class="st0"
                    d="M35.833,11.679l0.292-1.984c0.117-0.766-0.106-1.543-0.612-2.132C35.003,6.97,34.262,6.63,33.48,6.63H14.52 c-0.782,0-1.523,0.34-2.032,0.933c-0.506,0.589-0.729,1.367-0.612,2.13l0.3,2.044c-1.211,0.355-2.327,0.998-3.239,1.91 C7.475,15.108,6.67,17.056,6.67,19.13c0,4.273,3.477,7.75,7.75,7.75h0.914c1.356,2.123,3.479,3.688,5.916,4.365V35.5h-0.5 c-1.587,0-2.895,1.168-3.137,2.688h-0.969c-0.851,0-1.543,0.692-1.543,1.544V41c0,0.276,0.224,0.5,0.5,0.5h16.8 c0.276,0,0.5-0.224,0.5-0.5v-1.269c0-0.852-0.692-1.544-1.543-1.544h-0.969c-0.242-1.519-1.55-2.688-3.137-2.688h-0.5v-4.255 c2.438-0.677,4.562-2.243,5.916-4.365h1.084c2.063,0,4.01-0.805,5.485-2.268c1.46-1.472,2.265-3.418,2.265-5.482 C41.5,15.653,39.142,12.596,35.833,11.679z M7.67,19.13c0-1.807,0.701-3.503,1.974-4.776c0.759-0.76,1.68-1.303,2.679-1.619 l1.482,10.087c0.156,1.081,0.481,2.105,0.955,3.059h-0.34C10.698,25.88,7.67,22.852,7.67,19.13z M31.9,39.731V40.5H16.1v-0.769 c0-0.3,0.244-0.544,0.543-0.544h1.419h11.875h1.419C31.656,39.188,31.9,39.432,31.9,39.731z M29.38,38.188H18.62 c0.227-0.966,1.096-1.688,2.13-1.688h1h4.5h1C28.284,36.5,29.153,37.222,29.38,38.188z M22.25,35.5v-4.037 c0.581,0.099,1.165,0.166,1.75,0.166c0.584,0,1.169-0.067,1.75-0.166V35.5H22.25z M26.137,30.383c-1.407,0.327-2.868,0.327-4.272,0 c-2.432-0.573-4.559-2.126-5.838-4.264c-0.64-1.046-1.054-2.204-1.232-3.442l-1.93-13.133c-0.073-0.478,0.066-0.962,0.382-1.331 C13.565,7.843,14.03,7.63,14.52,7.63h18.96c0.49,0,0.955,0.213,1.273,0.584c0.316,0.368,0.455,0.853,0.382,1.331 c0,0.001,0,0.001,0,0.002l-0.352,2.394c0,0.002-0.002,0.004-0.003,0.006c-0.001,0.004,0.001,0.008,0,0.013l-1.576,10.719 c-0.178,1.237-0.593,2.395-1.234,3.444C30.694,28.257,28.567,29.81,26.137,30.383z M38.528,23.905 c-1.283,1.274-2.98,1.975-4.778,1.975h-0.51c0.475-0.954,0.799-1.978,0.955-3.057l1.488-10.126c2.815,0.84,4.817,3.449,4.817,6.433 C40.5,20.928,39.799,22.625,38.528,23.905z">
                </path>
                <path class="st0"
                    d="M29.605,15.762h-3.919l-1.211-3.727c-0.134-0.412-0.817-0.412-0.951,0l-1.211,3.727h-3.919 c-0.217,0-0.409,0.14-0.476,0.346s0.006,0.432,0.182,0.559l3.17,2.303l-1.211,3.728c-0.067,0.206,0.006,0.432,0.182,0.559 c0.176,0.128,0.412,0.128,0.588,0L24,20.953l3.17,2.303c0.088,0.064,0.191,0.096,0.294,0.096s0.206-0.032,0.294-0.096 c0.175-0.127,0.249-0.353,0.182-0.559l-1.211-3.728l3.17-2.303c0.175-0.127,0.249-0.353,0.182-0.559S29.822,15.762,29.605,15.762z M25.847,18.375c-0.175,0.127-0.249,0.353-0.182,0.559l0.848,2.609l-2.219-1.612c-0.088-0.064-0.191-0.096-0.294-0.096 s-0.206,0.032-0.294,0.096l-2.219,1.612l0.848-2.609c0.067-0.206-0.006-0.432-0.182-0.559l-2.219-1.612h2.743 c0.217,0,0.409-0.14,0.476-0.346L24,13.808l0.848,2.609c0.067,0.206,0.259,0.346,0.476,0.346h2.743L25.847,18.375z">
                </path>
            </g>
        </svg>
    </span>
    <span class="absolute right-3 -top-2 rotate-3">
        <svg fill="#ffffff" width="24px" height="24px" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path
                    d="M11.448 10c-.4-.01-.796.065-1.082.345-.287.28-.373.675-.366 1.08.008.404.093.864.25 1.42l4.515 15.986c.088.31.205.575.39.784.184.208.447.35.714.38.532.056.975-.228 1.372-.595l3.144-2.91c.244-.244.468-.174.636-.006l3.252 3.122c.284.272.652.383 1.01.385.357.002.73-.11 1.013-.392l3.306-3.305c.284-.284.396-.655.397-1.016 0-.36-.11-.74-.405-1.02l-3.25-3.123c-.177-.176-.166-.436.013-.615l3.027-3.142c.378-.394.668-.844.607-1.38-.03-.267-.174-.53-.383-.714-.21-.184-.475-.3-.786-.39L12.846 10.25c-.544-.157-.998-.237-1.398-.25zm-.03 1c.26.006.662.068 1.17.216l15.976 4.644c.646.188.362.562.102.822l-3.027 3.144c-.274.284-.387.65-.39 1.01-.002.358.11.74.403 1.02l3.25 3.12c.228.227.095.508-.007.61L25.59 28.89c-.14.164-.466.15-.623-.006l-3.25-3.12c-.285-.273-.655-.382-1.01-.38-.353 0-.716.108-1 .372l-3.145 2.91c-.48.396-.712.325-.83-.093l-4.517-15.987c-.147-.52-.21-.922-.215-1.18 0-.407.198-.407.418-.407zm-6.92 15c-.45 0-.66-.55-.354-.853l2-2c.457-.455 1.165.25.71.707l-2.003 2c-.093.097-.217.146-.353.146zM25.5 4c.45 0 .66.55.356.853l-2 2c-.457.455-1.165-.25-.71-.707l2.003-2c.093-.097.214-.146.35-.146zM4.497 4c-.45 0-.658.55-.353.853l2 2c.457.455 1.165-.25.71-.707l-2.003-2C4.758 4.05 4.634 4 4.498 4zM0 14.5c0-.277.223-.5.5-.5h3c.277 0 .5.223.5.5s-.223.5-.5.5h-3c-.277 0-.5-.223-.5-.5zM14.5 0c.277 0 .5.223.5.5v3c0 .277-.223.5-.5.5s-.5-.223-.5-.5v-3c0-.277.223-.5.5-.5z">
                </path>
            </g>
        </svg>
    </span>

</div>
<div class="flex justify-center items-center">
    <form class="w-full rounded-md bg-gray-100 border-2 p-5" action="{{route('admin.add')}}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-8">
                <div class="mt-12 pt-0.5 col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Picture </label>
                    <input name="image" class="hidden" id="user_avatar" type="file" onchange="previewImage(this)">
                    <div id="imagePreview" class="upload-box border-2 border-dashed rounded-md mt-2"
                        onclick="triggerFileInput()"><span>Upload Image</span> <svg class="ms-3" width="34px" height="34px"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M12 17L12 10M12 10L15 13M12 10L9 13" stroke="#D1D5DB" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M16 7H12H8" stroke="#D1D5DB" stroke-width="1.5" stroke-linecap="round"></path>
                                <path
                                    d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8"
                                    stroke="#D1D5DB" stroke-width="1.5" stroke-linecap="round"></path>
                            </g>
                        </svg></div>
                </div>
            <div class="col-span-6">


                <div class="grid md:grid-cols-2 md:gap-6  mt-10">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="first_name" id="floating_first_name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="floating_first_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                            name</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="last_name" id="floating_last_name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="floating_last_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                            name</label>
                    </div>
                </div>
                <div class="">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="email" id="floating_email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="floating_email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                            address</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" name="password" id="floating_password"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="floating_password"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" name="repeat_password" id="floating_repeat_password"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="floating_repeat_password"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm
                            password</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="phone_number" id="floating_phone"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="floating_phone"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone
                            number </label>
                    </div>

                    <div class="relative z-0 w-full group">
                        <select name="role"
                            class="bg-transparent border-b border-b-only border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">

                            <option value="N/A">Select Role</option>
                            <option value="super_admin">Super Admin</option>
                            <option value="admin_one">Admin One</option>
                            <option value="admin_two">Admin Two</option>
                            <option value="data_entry_operator">Data Entry Operator</option>
                            <option value="executive">Executive</option>
                            <option value="customer_care">Customer Care</option>
                        </select>
                    </div>
                    <input value="nedubd" name="school_code" class="hidden" type="text">
                    <div class="mt-4 text-end">
                        <button type="submit my-5 mt-6 text-end"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto w-full  px-16 py-3.5 text-center  ">Submit</button>
                    </div>
                </div>
            </div>
        </div>



    </form>
</div>


<!-- all Admin table  -->



<div class="relative overflow-x-auto mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 border-2 rounded-md">
        <thead class="text-sm text-gray-700  bg-gray-50 border-b-2 rounded-md">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 border-s">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 border-s">
                    Mobile Number
                </th>
                <th scope="col" class="px-6 py-3 border-s">
                    Role
                </th>
                <th scope="col" class="px-6 py-3 border-s">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach($admins as $admin)
                <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                    <td class="px-6 py-4 ">
                        {{$admin->first_name}} {{$admin->last_name}}
                    </td>
                    <td class="px-6 py-4 border-s">
                        {{$admin->email}}
                    </td>
                    <td class="px-6 py-4 border-s">
                        {{ $admin->phone_number}}
                    </td>
                    <td class="px-6 py-4 border-s">
                        {{ $admin->role}}
                    </td>
                    <td class="px-6 py-4 border-s">
                        <button>Update</button>
                    </td>
                </tr>
            @endforeach
        </tbody>


</div>
</div>



@endsection
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const input = document.getElementById('user_avatar');
        previewImage(input);
    });

    function previewImage(input) {
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.innerHTML = `<img src="${e.target.result}" class="max-w-full h-auto">`;
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.innerHTML = '<div class="upload-box">Upload Image  <svg class="ms-3" width="34px" height="34px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 17L12 10M12 10L15 13M12 10L9 13" stroke="#D1D5DB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16 7H12H8" stroke="#D1D5DB" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8" stroke="#D1D5DB" stroke-width="1.5" stroke-linecap="round"></path> </g></svg></div>';
        }
    }

    function triggerFileInput() {
        document.getElementById('user_avatar').click();
    }
</script>