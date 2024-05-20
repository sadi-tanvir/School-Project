@extends('Backend.app')
@section('title')
    Class Section Total Student
@endsection



@section('Dashboard')
    @include('Message.message')
    <div class="py-5">
        <h3 class="text-xl font-bold text-center ">
            Class Section Total Student
        </h3>
    </div>
    <div class="">
        <div class="md:mx-52 border-2 p-10 bg-blue-950">
            <form action="{{ route('classSectionStdTotalDownload', $school_code) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid md:grid-cols-3 mb-5 ">
                    <div class=" ">
                        <label for="class" class="block mb-2 text-lg font-medium text-white "> CLASS :
                        </label>
                    </div>
                    <div class="col-span-2">
                        <select id="countries" name="class"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected></option>
                            @foreach($classes as $class)
                                <option >{{$class->class_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="grid md:grid-cols-3 mb-5">
                    <div class=" ">
                        <label for="year" class="block mb-2 text-lg font-medium text-white "> Academic Year
                        </label>
                    </div>
                    <div class="col-span-2">
                        <select id="countries" name="year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:border-blue-500 block w-full p-2.5 ">
                           
                            @foreach($year as $data)
                                  <option >{{$data->academic_year_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class=" flex justify-end">
                    <button type="submit"
                        class="text-white bg-rose-600 hover:bg-rose-800 focus:ring-0 focus:outline-none F font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Print</button>
                </div>
            </form>
        </div>
    </div>
@endsection
