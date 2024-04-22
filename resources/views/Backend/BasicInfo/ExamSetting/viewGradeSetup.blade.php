@extends('Backend.app')
@section('title')
    Grade
@endsection
@section('Dashboard')

    @include('Message.message')
    <div>
        <h3>
            Exam Grade Setup View List
        </h3>
    </div>

    <form action="{{ route('getGradeSetup',$school_code) }}" method="POST">
        @csrf
        <div class="md:flex my-10 ">
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Exam Name :</label>
            </div>
            <div class="mr-5">
                <select id="class_exam_name" name="class_exam_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose a exam</option>
                    @foreach ($classExamData as $data)
                        <option value="{{ $data->class_exam_name }}">{{ $data->class_exam_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Year :</label>
            </div>
            <div class="mr-5">
                <select id="academic_year_name" name="academic_year_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose year</option>
                    @foreach ($academicYearData as $data)
                        <option value="{{ $data->academic_year_name }}">{{ $data->academic_year_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">GET
                    DATA</button>
            </div>

        </div>
    </form>
<div class="md:mx-20">
    @if ($gradeSetupData)
    <table class="text-sm text-center rtl:text-right text-black  w-full">
        <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Letter
                </th>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    Grade
                </th>
                <th scope="col" class="px-6 py-3">
                    Range
                </th>
            </tr>
        </thead>
        <tbody>



            @foreach ($gradeSetupData->groupBy('class_name') as $class => $classGrades)
            <tr class="border-b capitalize text-lg">
                        <td class="px-10">
                            <div class="flex justify-first">
                            <h1>Class Name</h1>
                        </div>
                        </td>
                    
                        <td class="px-10">
                        <div class="flex justify-first">
                        <h1>{{ $class }}</h1>
                    </div>
                    </td>

                
            </tr>

            <tr> 
                    @foreach ($gradeSetupData as $data)
                        <td class="">
                            @if ($class == $data->class_name)
                                {{ $data->latter_grade }}
                            @endif

                        </td>
                        <td class="">
                            @if ($class == $data->class_name)
                                {{ $data->grade_point }}
                            @endif
                        </td>
                        <td class="">
                            @if ($class == $data->class_name)
                            {{ $data->mark_point_1st }} - {{ $data->mark_point_2nd }}
                            @endif

                        </td>


                </tr>
            @endforeach

            {{-- @endforeach --}}
@endforeach
</tbody>
</table>
@endif
</div>
   



@endsection
