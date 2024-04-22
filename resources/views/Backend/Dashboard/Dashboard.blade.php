@extends('Backend.app')
@section('title')
    Dashboard
@endsection
@section('Dashboard')
    @include('/Message/message')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-gradient-to-r  from-cyan-500 to-blue-500 p-5 rounded  mx-2 lg:mx-0">
            <h1 class="text-2xl font-bold text-white">Balance</h1>
            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4 mt-2 ">
                <div class="bg-yellow-400 h-2.5 rounded-full" style="width: 45%"></div>
            </div>
            <div class="flex justify-between text-white">
                <p>Cash In Hand</p>
                <p>0</p>
            </div>
            <div class="flex justify-between text-white">
                <p>Cash In Bank</p>
                <p>0</p>
            </div>
        </div>

        <div class="bg-gradient-to-r  from-black to-gray-600 p-5 rounded  mx-2 lg:mx-0">
            <h1 class="text-2xl font-bold text-white">Todays Fee</h1>
            <div class="w-full bg-white rounded-full h-2.5 mb-4 mt-2 ">
                <div class="bg-green-500 h-2.5 rounded-full" style="width: 45%"></div>
            </div>
            <div class="flex justify-between text-white">
                <p>Amount</p>
                <p>0</p>
            </div>

        </div>
        <div class="bg-gradient-to-r  from-blue-500 to-blue-950 p-5 rounded  mx-2 lg:mx-0">
            <h1 class="text-xl font-bold text-white">Todays Acc received</h1>
            <div class="w-full bg-gray-400 rounded-full h-2.5 mb-4 mt-2 ">
                <div class="bg-white h-2.5 rounded-full" style="width: 45%"></div>
            </div>
            <div class="flex justify-between text-white">
                <p>Amount</p>
                <p>0</p>
            </div>

        </div>
        <div class="bg-gradient-to-r  from-emerald-500 to-emerald-900 p-5 rounded  mx-2 lg:mx-0">
            <h1 class="text-xl font-bold text-white">Todays Acc Payment</h1>
            <div class="w-full bg-white rounded-full h-2.5 mb-4 mt-2 ">
                <div class="bg-red-500 h-2.5 rounded-full" style="width: 45%"></div>
            </div>
            <div class="flex justify-between text-white">
                <p>Amount</p>
                <p>0</p>
            </div>

        </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-3 mt-3">
        <div class="bg-gradient-to-r  from-blue-500 to-blue-950 p-5 rounded  mx-2 lg:mx-0">
            <h1 class="text-xl font-bold text-white">Student</h1>
            <div class="w-full bg-gray-400 rounded-full h-2.5 mb-4 mt-2 ">
                <div class="bg-white h-2.5 rounded-full" style="width: {{$totalStudent}}%"></div>
            </div>
            <div class="flex justify-between text-white">
                <p>Total Students</p>
                <p>
               
                   {{$totalStudent}}
                </p>

              



            </div>

        </div>
        <div class="bg-gradient-to-r  from-green-500 to-green-950 p-5 rounded  mx-2 lg:mx-0">
            <h1 class="text-xl font-bold text-white">Class</h1>
            <div class="w-full bg-gray-400 rounded-full h-2.5 mb-4 mt-2 ">
                <div class="bg-blue-500 h-2.5 rounded-full" style="width: {{$classData->count()}}%"></div>
            </div>
            <div class="flex justify-between text-white">
                <p>Total Class</p>
                <p>{{$classData->count()}}</p>
            </div>
        </div>

        <div class="bg-gradient-to-r  from-orange-500 to-orange-950 p-5 rounded  mx-2 lg:mx-0">
            <h1 class="text-xl font-bold text-white">Section</h1>
            <div class="w-full bg-gray-400 rounded-full h-2.5 mb-4 mt-2 ">
                <div class="bg-yellow-500 h-2.5 rounded-full" style="width: {{$sectionData->count()}}%"></div>
            </div>
            <div class="flex justify-between text-white">
                <p>Total Section</p>
                <p>{{$sectionData->count()}}</p>
            </div>
        </div>
        <div class="bg-gradient-to-r  from-green-500 to-green-950 p-5 rounded  mx-2 lg:mx-0">
            <h1 class="text-xl font-bold text-white">Group</h1>
            <div class="w-full bg-white rounded-full h-2.5 mb-4 mt-2 ">
                <div class="bg-blue-500 h-2.5 rounded-full" style="width: {{$groupData->count()}}%"></div>
            </div>
            <div class="flex justify-between text-white">
                <p>Total Group</p>
                <p>{{$groupData->count()}}</p>
            </div>
        </div>
        <div class="bg-gradient-to-r  from-green-500 to-green-950 p-5 rounded  mx-2 lg:mx-0">
            <h1 class="text-xl font-bold text-white">Total Message Send</h1>
            <div class="w-full bg-white rounded-full h-2.5 mb-4 mt-2 ">
                <div class="bg-blue-500 h-2.5 rounded-full" style="width: {{$msgData->count()}}%"></div>
            </div>
            <div class="flex justify-between text-white">
                <p>Total Message</p>
                <p>{{$msgData->count()}}</p>
            </div>
        </div>

    </div>

    <div class="grid gap-2 md:grid-cols-2 mt-2">
        <div class="border shadow-md">
            <div class="bg-gradient-to-r  from-black to-gray-600 p-5 rounded  mx-2 lg:mx-0">
                <h1 class="text-2xl font-bold text-white">Todays Student's Attendance</h1>
            </div>
            <div class="text-md font-semibold grid grid-cols-2 mt-5">
                <div class="flex justify-center">
                    <img src="../logo/graduation.png" alt="" class="h-[80px] w-[80px]">
                    <div class="ml-10">
                        <h3>Present: 0</h3>
                        <h3>Absent: 0</h3>
                        <h3>Leave: 0</h3>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
        <div class="border shadow-md">
            <div class="bg-gradient-to-r  from-black to-gray-600 p-5 rounded  mx-2 lg:mx-0">
                <h1 class="text-2xl font-bold text-white">Todays Teacher's Attendance</h1>


            </div>
            <div class="text-md font-semibold grid grid-cols-2 mt-5">
                <div class="flex justify-center">
                    <img src="../logo/teacher.png" alt="" class="h-[80px] w-[80px]">
                    <div class="ml-10">
                        <h3>Present: 0</h3>
                        <h3>Absent: 0</h3>
                        <h3>Leave: 0</h3>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
    <div class="grid gap-2 md:grid-cols-2 mt-7">
        <div class="border shadow-md ">
            <div class="bg-gradient-to-r  from-black to-gray-600 p-5 rounded  mx-2 lg:mx-0">
                <h1 class="text-2xl font-bold text-white">Semester Exam's Information</h1>

            </div>
            <div class="grid gap-6 md:grid-cols-2 mt-5">
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Academic
                        Year</label>
                    <select name="year" id='date-dropdown'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option>Select Year</option>
                    </select>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Choose
                        Exam</label>
                    <select id="countries" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option selected>Choose Exam</option>
                        <option value="">X</option>
                        <option value="">Y</option>
                    </select>
                </div>

            </div>
            <div class="mt-5">
                <button type="submit"
                    class=" mr-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  ">Search</button>
            </div>
            <div class="text-md font-semibold grid md:grid-cols-2 mt-5">
                <div class="">
                    <a href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-amber-300 ">
                        <div class="flex justify-center">
                            <img src="../logo/graduation2.png" alt="" class="h-[50px] w-[50px]">

                        </div>
                        <div class="flex justify-center">
                            <p>Total Class: 0</p>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-red-200 ">
                        <div class="flex justify-center">
                            <img src="../logo/graduation2.png" alt="" class="h-[50px] w-[50px]">

                        </div>
                        <div class="flex justify-center">
                            <p>Total Section: 0</p>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-amber-300 ">
                        <div class="flex justify-center">
                            <img src="../logo/graduation2.png" alt="" class="h-[50px] w-[50px]">

                        </div>
                        <div class="flex justify-center">
                            <p>Exam Taken: 0</p>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-red-200 ">
                        <div class="flex justify-center">
                            <img src="../logo/graduation2.png" alt="" class="h-[50px] w-[50px]">

                        </div>
                        <div class="flex justify-center">
                            <p>Exam not taken: 0</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="border shadow-md">
            <div class="bg-gradient-to-r  from-black to-gray-600 p-5 rounded  mx-2 lg:mx-0">
                <h1 class="text-2xl font-bold text-white">Total Student Pass and Fail</h1>

            </div>
            <div class="text-md font-semibold grid md:grid-cols-2 mt-5">
                <div class="">
                    <a href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-amber-300 ">
                        <div class="flex justify-center">
                            <img src="../logo/graduation2.png" alt="" class="h-[50px] w-[50px]">

                        </div>
                        <div class="flex justify-center">
                            <p>Total Pass: 0</p>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-red-200 ">
                        <div class="flex justify-center">
                            <img src="../logo/graduation2.png" alt="" class="h-[50px] w-[50px]">

                        </div>
                        <div class="flex justify-center">
                            <p>Total Fail: 0</p>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-amber-300 ">
                        <div class="flex justify-center">
                            <img src="../logo/graduation2.png" alt="" class="h-[50px] w-[50px]">

                        </div>
                        <div class="flex justify-center">
                            <p>Total Participated: 0</p>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-red-200 ">
                        <div class="flex justify-center">
                            <img src="../logo/graduation2.png" alt="" class="h-[50px] w-[50px]">

                        </div>
                        <div class="flex justify-center">
                            <p>Not Participated: 0</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

