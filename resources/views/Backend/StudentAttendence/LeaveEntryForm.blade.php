@extends('Backend.app')
@section('title')
    Student leave Form
@endsection
<style>
    .shadowStyle {
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }
</style>
@section('Dashboard')
    <div>
        <h3 class="text-slate-500 text-center font-bold text-2xl">
            Student Leave Information
        </h3>
    </div>
    <div class=" overflow-x-auto shadowStyle mx-10 md:my-10 p-5">
        <div class="flex gap-10">
            <form class="w-full bg-slate-100 p-3 rounded-[10px]" action="">
                <p class="text-slate-500 font-bold ">Apply For Leave</p>
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-2">
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium">Class</label>
                        <select id="" name="section"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose a section</option>
                            <option value="">x</option>
                            <option value="">y</option>
                            <option value="">z</option>
                        </select>
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium">Class</label>
                        <select id="" name="year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose a year</option>
                            <option value="">x</option>
                            <option value="">y</option>
                            <option value="">z</option>
                        </select>
                    </div>

                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium">Class</label>
                        <select id="" name="session"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose a session</option>
                            <option value="">x</option>
                            <option value="">y</option>
                            <option value="">z</option>
                        </select>
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium">Class</label>
                        <select id="" name="session"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose a session</option>
                            <option value="">x</option>
                            <option value="">y</option>
                            <option value="">z</option>
                        </select>
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium">Class</label>
                        <select id="" name="session"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose a session</option>
                            <option value="">x</option>
                            <option value="">y</option>
                            <option value="">z</option>
                        </select>
                    </div>
                    <div>
                        <label for="applicaiton_date" class="block mb-2 text-sm font-medium">Applicaiton Date</label>
                        <input id="applicaiton_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 w-full"
                            type="date">
                    </div>
                    <div>
                        <label for="leave_start_date" class="block mb-2 text-sm font-medium">Leave Start Date</label>
                        <input id="leave_start_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 w-full"
                            type="date">
                    </div>
                    <div>
                        <label for="leave_end_date" class="block mb-2 text-sm font-medium">Leave end Date</label>
                        <input id="leave_end_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 w-full"
                            type="date" />
                    </div>
                    <div>
                        <label for="duration" class="block mb-2 text-sm font-medium">Leave Duration</label>
                        <input id="duration"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 w-full"
                            type="text" placeholder="10days" />
                    </div>
                    {{-- <div>
                    <label for="notes" class="block mb-2 text-sm font-medium">Notes</label>
                    <textarea autocomplete="off" id="notes"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 w-full"
                        placeholder="Short Notes/Absecne Notes " />
                </div> --}}
                </div>
                <div class="flex justify-end mt-5">
                    <button type="button"
                        class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 focus:outline-none">Cancel
                    </button>
                    <button type="submit"
                        class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 focus:outline-none">Save
                    </button>
                </div>
            </form>
            {{--  --}}

            <div class=" w-full space-y-5 bg-slate-100 p-3 rounded-[10px]">
                <p class="text-slate-500 font-bold ">Student Information</p>
                <div class="grid grid-cols-3 gap-10">
                    <p>Photo</p>
                    <img class="w-20 h-20 object-cover object-center"
                        src="https://images.pexels.com/photos/2647053/pexels-photo-2647053.jpeg?auto=compress&cs=tinysrgb&w=600"
                        alt="title">
                </div>
                <div class="grid grid-cols-3 gap-10">
                    <p>Student Name</p>
                    <p>: Rafin da Bolda</p>
                </div>
                <div class="grid grid-cols-3 gap-10">
                    <p>Student id</p>
                    <p>: 420</p>
                </div>
                <div class="grid grid-cols-3 gap-10">
                    <p>Class</p>
                    <p>: Play</p>
                </div>
                <div class="grid grid-cols-3 gap-10">
                    <p>Roll</p>
                    <p>: Play</p>
                </div>
                <div class="grid grid-cols-3 gap-10">
                    <p>Group</p>
                    <p>: Play</p>
                </div>
                <div class="grid grid-cols-3 gap-10">
                    <p>Section</p>
                    <p>: Play</p>
                </div>
            </div>
        </div>
    </div>

    <div class="border p-5 space-y-5 rounded-[10px]">
        <p >Student leave Lists</p>
        <table class="w-full text-sm text-left rtl:text-right text-black">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 d">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        SL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Leave Date
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Class
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        From
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        to
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Days
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Type
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Statsu
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Action
                    </th>

                </tr>
            </thead>
            <tbody>




            </tbody>
        </table>
    </div>

    </div>
@endsection
