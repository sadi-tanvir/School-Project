@extends('Backend.app')
@section('title')
    Student Short List Information
@endsection
@section('Dashboard')

@include('Message.message')
    <div>
        <h3>
            Student Short List Information
        </h3>
    </div>
<form method="POST" action="{{route('viewStudentShortList')}}">
@csrf
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10 border-2 md:p-5">


        <div class="grid gap-6 mb-6 md:grid-cols-4 mt-2">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Class
                </label>
                <select id="" name="class"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                    <option disabled selected>Choose class</option>
                    @foreach($classes as $class)
                    <option value="{{$class->class_name}}">{{$class->class_name}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Group
                </label>
                <select id="" name="group"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose group</option>
                    @foreach($groups as $group)
                    <option value="{{$group->group_name}}">{{$group->group_name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Section
                </label>
                <select id="" name="section"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose section</option>
                    @foreach($sections as $section)
                    <option value="{{$section->section_name}}">{{$section->section_name}}</option>
                    @endforeach
                </select>
            </div>


            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Category
                </label>
                <select id="" name="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>

            <!-- <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Hall Name
                </label>
                <select id="" name="hall_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option selected>Choose a Hall Name</option>
                    <option >x</option>
                    <option >y</option>
                    <option >z</option>
                </select>
            </div> -->

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Blood Group
                </label>
                <select id="" name="blood_group"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose blood</option>
                    <option >A+</option>
                        <option >A-</option>
                        <option >O+</option>
                        <option >O-</option>
                        <option >B+</option>
                        <option >B-</option>
                        <option >AB+</option>
                        <option >AB-</option>
                </select>
            </div>


            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Gender
                </label>
                <select id="" name="gender"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose Gender</option>
                    <option>Male</option>
                    <option>Female</option>

                </select>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Religion
                </label>
                <select id="" name="religion"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose religion</option>
                        <option >Islam</option>
                        <option >Hindu</option>
                        <option >Buddhism</option>
                        <option >Christian</option>

                </select>
            </div>
            <!-- <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Students Status
                </label>
                <select id="" name="student_status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option >active</option>
                    <option >In active</option>

                </select>
            </div> -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Academic Year
                </label>
                <select id="" name="academic_year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose Academic Year</option>
                    @foreach($years as $year)
                    <option value="{{$year->academic_year_name}}">{{$year->academic_year_name}}</option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar"> Status
                </label>
                <select id="" name="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose Status</option>
                    <option >new</option>
                    <option >old</option>

                </select>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar"> From Date
                </label>
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-autohide type="text" name="from_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5      "
                        placeholder="Select date">
                </div>

            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar"> To Date
                </label>
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-autohide type="text" name="to_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5      "
                        placeholder="Select date">
                </div>

                <div>
                    <input class="hidden" name="school_code" value="{{$school_code}}" type="text">
                </div>

            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4  ">
            @foreach($columns as $column)
            <div class="">
                <input id="{{$column}}" value="{{$column}}" type="checkbox"  name="columns[{{$column}}]"
                    class="group-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                <label for="{{$column}}" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">{{$column}}</label>

            </div>
            @endforeach
        </div>
        <div class="md:flex justify-end mr-10 mt-10">
            <div class="">
          
                <button type="button" id="btn"
                    class="  text-white bg-rose-600 hover:bg-rose-600 focus:ring-4 focus:ring-rose-600 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2   focus:outline-none ">PDF
                    Download
                </button>
            
            </div>
            <div class="">
                <button type="submit"
                    class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">
                    View Report
                </button>
            </div>
        </div>
    </div>
@if($students != null)
    @if(!is_null($students) && count($students) > 0)
<div id="page" class="mx-10">


    <table class="w-full text-sm text-left rtl:text-right text-black " >
        <thead class="text-lg text-white uppercase bg-blue-600 border-b border-blue-400 ">
            <tr>
            

                @foreach ($col as $column)

                <th scope="col" class="px-6 py-3 bg-blue-500">
                {{ $column }}</th>

                @endforeach
            
            </tr>

        </thead>

        <tbody>

            @foreach ($students as $student)

                <tr>
                
                    @foreach ($col as $column)

                    <td class="px-6 py-4">{{ $student->$column }}</td>

                    @endforeach
                    
                </tr>

            @endforeach

        </tbody>

    </table>

@else

    <p>No students found.</p>

@endif
@endif

</div>


    <div class="md:flex justify-start ml-10 mt-10">
        <div class="">
            <button type="button"
                class="  text-white bg-rose-600 hover:bg-rose-600 focus:ring-4 focus:ring-rose-600 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2   focus:outline-none ">
                Download excel
            </button>
        </div>
        <div class="">
            <button type="button"
                class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">
                Report Print
            </button>
        </div>
    </div>

</form>

<script>
        let btn = document.getElementById('btn');
        let page = document.getElementById('page');

        btn.addEventListener('click', function() {
            html2PDF(page, {
                jsPDF: {
                    format: 'a4',
                },
                imageType: 'image/jpeg',
                output: './pdf/generate.pdf'
            });
        });
</script>




@endsection
