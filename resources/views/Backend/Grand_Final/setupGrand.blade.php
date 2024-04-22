@extends('Backend.app')
@section('title')
    Exam Mark Setup Grand Final
@endsection
@section('Dashboard')
    @include('/Message/message')
    <div>
        <h1 class="ml-5 font font-semibold text-accent  my-10"> Exam Mark Setup Grand Final
        </h1>
    </div>
    <form action="{{route('store.grandfinal',$school_code)}} "  method="POST">
        @csrf
        @method('PUT')
    <div class="md:flex mx-10">
        
        <div class="flex border justify-center mr-5 md:mr-32 mb-5 md:mb-0">
            <div class="mx-10 my-10 ">
                <h3 class="mb-5">Select Class</h3>
                @foreach ($classData as $data)
                    <div>
                        <!-- <input id="subject_name" type="checkbox" value="{{ $data->class_name }}" name="subject_name[]" class="shift-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  "> -->
                        <input id="subject_name" type="checkbox" value="{{ $data->class_name }}" name="class_name[]"
                            class="group-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                        <label for="subject_name"
                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">{{ $data->class_name }}</label>
                    </div>
                @endforeach

            </div>
        </div>

        <div>
            <div class="flex justify-center text-md font-bold">
                <h2>
                    EXAM WISE GRAND FINAL SETTING</h2>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-black ">

                <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            SL
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            EXAM NAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PERCENTAGE
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            EXAM SERIAL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>



                    </tr>

                </thead>
                <tbody>
                    @foreach ($examName as $key => $data)
    <tr class=" border-b border-blue-400">
        <td class="px-6 py-4">
            {{ $key + 1 }}
        </td>
        <td class="px-6 py-4">
            {{ $data->class_exam_name }}
           <div class="hidden">
            <input type="text" id="percentage" name="class_exam_name[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     " value=" {{ $data->class_exam_name }}" />
           </div>
      


        </td>
        <!-- ... other columns ... -->
        <td class="px-6 py-4">
            <input type="text" id="percentage" name="percentage[{{ $key }}]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     " value="0" />
        </td>
        <td class="px-6 py-4">
            <input type="text" id="Exam_serial" name="serial[{{ $key }}]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     " value="0" />
        </td>
        <td class="px-6 py-4">
            <input id="laravel-checkbox" type="checkbox" value="active" name="status[{{ $key }}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
        </td>
    </tr>
@endforeach



                </tbody>
            </table>
        </div>
        <br><br>

    </div>

    <div class="grid md:grid-cols-3 sticky z-56 mt-10">
        <div class="mr-10 md:flex justify-center">
            <a href="{{url('dashboard/grandFinalList',$school_code)}}">
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">View</button>
            </a>
        </div>
        <div class="mr-10">
            <button type="submit"
                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">save</button>
        </div>

        <div class="ml-32">
            <h3>Total Percent = <div class="border-2"></div>
            </h3>
        </div>

    </div>
</form>
@endsection
