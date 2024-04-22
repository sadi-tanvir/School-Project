@extends('Backend.app')
@section('title')
Grand Final 
@endsection
@section('Dashboard')
@include('/Message/message')
    <div>
        <h3>
            Exam Mark Setup Grand Final List
        </h3>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
        <form action="{{route('viewGrandFinal',$school_code)}}" method="POST">
            @csrf
        <div class="md:flex my-10 ml-5">
            <div class="mr-5">
                <label for="session" class="block mb-2 font-medium text-gray-900 ">Class Name:</label>
            </div>
            <div class="mr-5 ">
                <select id="countries" name="Class_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 ">
                        <option selected> Class Name:</option>
                       @foreach ($classData as $Data )
                           <option> {{$Data->class_name}} </option>
                       @endforeach
                    </select>
            </div>
            
            <div class="mr-5">
                <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto md:px-20 py-2.5 text-center  ">Search</button>
            </div>
           

        </div>

    </form>
    @if ($existingData!=null)
        
   
    <div class="">

        <div class=" text-lg font-bold">
           <div class="flex justify-center">
            <h3>
                GRAND FINAL REPORT
            </h3>
           </div>
         
        <table class="w-full  rtl:text-right text-black  text-center">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Exam NAme
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Percentage
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Serial Mark
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($existingData as $data )
                    
             
                <tr class=" border-b border-blue-400  md:h-[150px]">
                    <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
                     {{$data->class_exam_name}}
                    </th>
                    <td class="px-6 py-4">
                       {{$data->percentage}}
                    </td>
                    <td class="px-6 py-4">
                       {{$data->serial}}
                    </td>
                   
                    
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
    </div>
    @endif
    <br> <br>
         

        
    </div>
@endsection

