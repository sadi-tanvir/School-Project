@extends('Backend.app')
@section('title')
    Upload Photo
@endsection
@section('Dashboard')
    <div>
        <h3>
            Student Image Upload
        </h3>
    </div>

    <div class="text-center font-bold text-2xl mt-10">
        <h3>Student Information</h3>
    </div>
<div class="mx-10 border mt-10">



    <div class="grid md:grid-cols-2 mx-32 md:mt-10">
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
                Picture</label>
            <input name="image"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="user_avatar_help" id="user_avatar" type="file" required>

        </div>
        <div class="mt-6 md:ml-20">
            <button type="submit"
                class="px-10  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Submit
            </button>



        </div>

    </div>
</div>
@endsection
