@extends('Backend.app')
@section('title')
Add Year
@endsection
@section('Dashboard')

@include('Message.message')

<div>
    <h3>
        Academic Year
    </h3>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
    <div class="grid gap-6 mb-6 md:grid-cols-4 ">
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class=" md:mr-20 text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Add
            New</button>
        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            NEW YEAR ENTRY FORM
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form action="{{ url('dashboard/addAcademicYear',$school_code) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="academic_year_name" class="block mb-2 text-sm font-medium text-gray-900 ">Academic Year :</label>
                                <input type="text" name="academic_year_name" id="academic_year_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="enter year" required />
                            </div>

                            <div class="flex justify-between">
                                <div class="flex items-start mt-2">
                                    <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                        <!-- <option selected="">Select status</option> -->
                                        <option value="active">Active</option>
                                        <option value="in active">In active</option>

                                    </select>
                                </div>
                            </div>
                            <div class="hidden">
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">School Code 
                                </label>
                                <input type="text" value="{{$school_code}}" name="school_code" id="last_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                    placeholder="Enter The Police Station Name" />
                            </div>
                            <div class="flex justify-center ">
                                <button type="submit" class=" mr-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  ">Save</button>
                                <button type="button" data-modal-hide="authentication-modal" class="end-2.5  text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Close</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="" />
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-black ">
        <thead class="text-lg text-white uppercase bg-blue-600 border-b border-blue-400 ">
            <tr>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    SL
                </th>
                <th scope="col" class="px-6 py-3">
                    Academic Year
                </th>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($academicYearData as $key=> $data)
            <tr class=" border-b capitalize text-lg">
                <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
                    {{$key + 1}}
                </th>
                <td class="px-6 py-4">
                    {{$data->academic_year_name}}
                </td>

                <td class="px-6 py-4 ">
                    @if($data->status == 'active')
                    <span class="text-green-500">Active</span>
                    @else
                    <span class="text-red-500">Inactive</span>
                    @endif
                </td>


                <td class="px-6 py-4  text-xl flex justify-center">

                    <a class="mr-2 edit-button"><i class="fa fa-edit" style="color:green;"></i></a>

                    <form method="POST" action="{{ url('dashboard/delete_academic_Year', $data->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn ">
                            <a href=""><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i></a>
                        </button>
                    </form>


                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection