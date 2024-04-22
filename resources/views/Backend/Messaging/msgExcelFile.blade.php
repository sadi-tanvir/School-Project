@extends('Backend.app')
@section('title')
  Send Message Excel
@endsection
@section('Dashboard')
    @include('/Message/message')
    <style>
        .shadowStyle {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }
    </style>

    <div>
        <h1 class="text-2xl font-bold my-10 mx-5 text-center">Excel File</h1>
    </div>
    <form action="{{route('uploadExcel')}}" method="post" class="p-5 shadowStyle rounded-[8px] border border-slate-300 w-2/5 mx-auto space-y-3" enctype="multipart/form-data">
@csrf
        <div class="">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Excel
                File</label>
            <input name="file"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none  "
                aria-describedby="user_avatar_help" id="user_avatar" type="file">
                <input class="hidden" value="{{$school_code}}" name="school_code" type="text">
        </div>
        <div class="w-full flex justify-end">
        <div class="mt-2">
                    <a href="{{ route('download.contact', $school_code) }}"
                        class="  text-white bg-rose-600 hover:bg-rose-600 focus:ring-4 focus:ring-rose-600 font-medium rounded-lg text-sm px-5 py-2.5 me-2  focus:outline-none ">
                        Blank Excel Download
                    </a>

                </div>
            <button type="submit"
                class="w-1/3  text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">Submit
            </button>
        </div>
    </form>



@endsection