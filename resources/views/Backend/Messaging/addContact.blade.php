@extends('Backend.app')
@section('title')
   Add Contact
@endsection
@section('Dashboard')
    @include('/Message/message')
    <style>
        .shadowStyle {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }
    </style>

    <div>
        <h1 class="text-2xl font-bold my-10 mx-5 text-center">Add Contact Information</h1>
    </div>
    <div class=" mb-3">
        <form action="{{route('addContact')}}" method="POST" class="p-5 shadowStyle rounded-[8px] border border-slate-300 w-2/5 mx-auto space-y-3">
            @csrf
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Name
                    :</label>
                    <input type="text"  name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                    placeholder="Enter the name"  required/>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="group" class="block mb-2 text-sm font-medium whitespace-noWrap ">Contact
                    :</label>
                    <input type="text"  name="contact" id="contact"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                    placeholder="Enter the contact" required />
            </div>
            <div class="hidden">
                <label for="group" class="block mb-2 text-sm font-medium whitespace-noWrap ">School Code
                    :</label>
                    <input type="text" value="{{$school_code}}"  name="school_code" id="code"

                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                    placeholder="Enter the code" />
            </div>
           
            
            <div class="w-full flex justify-end">
                
                <button type="submit"
                    class="w-1/3  text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">Submit
                </button>
            </div>
        </form>
    </div>
@endsection















