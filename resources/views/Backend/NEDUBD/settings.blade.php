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

<div
    class=" flex justify-between items-center rounded-md bg-gradient-to-tr from-[#1E3A8A] to-[#0054af] px-10 py-16 text-white">
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
            <img class=" w-72 rounded" src="{{ asset($adminData->image) }}" alt="" />
            <button type="button" onclick="toggleUploadPhoto()"
                class="text-white bg-blue-700 hover:bg-blue-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-2 w-full  focus:outline-none dark:focus:ring-blue-800">Update Info</button>
        @endif
        @if ($schoolAdminData)
            <img class="w-72 rounded" src="{{ asset($schoolAdminData->image) }}" alt="" />
            <button type="button" onclick="toggleUploadPhoto()"
                class="text-white bg-blue-700 hover:bg-blue-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-2 w-full  focus:outline-none dark:focus:ring-blue-800">Update Info</button>
        @endif
        @if ($studentData)
            <img class=" w-72 rounded" src="{{ asset($studentData->image) }}" alt="" />
            <button type="button" onclick="toggleUploadPhoto()"
                class="text-white bg-blue-700 hover:bg-blue-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-2 w-full  focus:outline-none dark:focus:ring-blue-800">Update Info</button>
        @endif
    </div>

</div>

@if ($adminData)
    <div id="uploadPhotoDiv" class="flex justify-center hidden bg-gray-200">
        <form action="{{route('change.profile.picture', [$adminData->role, $adminData->id, $school_code])}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-12 pt-0.5 ">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Picture </label>
                <input name="image" class="hidden" id="user_avatar" type="file" onchange="previewImage(this)">
                <div id="imagePreview" class="upload-box border-2 border-dashed rounded-md mt-2"
                    onclick="triggerFileInput()"><span>Upload Image</span> <svg class="ms-3" width="80px" height="34px"
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
            <div>
                <label  class="block mb-2 text-sm font-medium text-gray-900 ">First name

                </label>
                <input type="text" id="first_name" name="first_name"
                    class="bg-white border-0 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5    "
                    placeholder="Enter first name" />
            </div>
            <div>
                <label  class="block mb-2 text-sm font-medium text-gray-900 ">Last Name

                </label>
                <input type="text" id="last_name" name="last_name"
                    class="bg-white border-0 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5    "
                    placeholder="Enter last name" />
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-3 w-full focus:outline-none dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endif

@if ($schoolAdminData)
    <div id="uploadPhotoDiv" class="flex justify-center hidden  bg-gray-200">
        <form action="{{route('change.profile.picture', [$schoolAdminData->role, $schoolAdminData->id, $school_code])}}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-12 pt-0.5 ">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Picture </label>
                <input name="image" class="hidden" id="user_avatar" type="file" onchange="previewImage(this)">
                <div id="imagePreview" class="upload-box border-2 border-dashed rounded-md mt-2"
                    onclick="triggerFileInput()"><span>Upload Image</span> <svg class="ms-3" width="80px" height="34px"
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

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 ">Name

                </label>
                <input type="text" id="name" name="name"
                    class="bg-white border-0 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5    "
                    placeholder="Enter your name" />
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-3 w-full focus:outline-none dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endif
@if ($studentData)
    <div id="uploadPhotoDiv" class="flex justify-center hidden  bg-gray-200">
        <form action="{{route('change.profile.picture', [$studentData->role, $studentData->id, $school_code])}}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-12 pt-0.5 ">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Picture </label>
                <input name="image" class="hidden" id="user_avatar" type="file" onchange="previewImage(this)">
                <div id="imagePreview" class="upload-box border-2 border-dashed rounded-md mt-2"
                    onclick="triggerFileInput()"><span>Upload Image</span> <svg class="ms-3" width="80px" height="34px"
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
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 ">Name

                </label>
                <input type="text" id="name" name="name"
                    class="bg-white border-0 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5    "
                    placeholder="Enter your name" />
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-3 w-full focus:outline-none dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endif





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

<script>
    function toggleUploadPhoto() {
        const uploadDiv = document.getElementById('uploadPhotoDiv');
        if (uploadDiv.classList.contains('hidden')) {
            uploadDiv.classList.remove('hidden');
        } else {
            uploadDiv.classList.add('hidden');
        }
    }
</script>

@endsection