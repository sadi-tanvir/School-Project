@extends('Backend.app')
@section('title')
    Exam
@endsection
@section('Dashboard')
    <div>
        <h3>
            Exam Publish and Close View List
        </h3>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
        <form action="">
        <div class="md:flex my-10 ">
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Class Name :</label>
            </div>
            <div class="mr-10">
                <select id="countries" name="Class_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                        <option selected>Choose a class</option>
                        @foreach($classes as $class)
                        <option >{{$class->class_name}}</option>
                        @endforeach
                        
                    </select>
            </div>
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Exam Name :</label>
            </div>
            <div class="mr-10">
                <select id="countries" name="exam_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                <option selected>Choose Exam Name</option>
                @foreach($exam as $exam)
            <option >{{$exam->class_exam_name}}</option>
            @endforeach
            </select>
            </div>
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Year :</label>
            </div>
            <div class="mr-5">
                <select name="year" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                <option>Select Year</option>
                @foreach($years as $year)
                <option >{{$year->academic_year_name}}</option>
                @endforeach
                
            </select>
            </div>
            <div>
                <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  "> Search</button>
            </div>

        </div>

    </form>
  

        <div class=" text-lg font-bold">
           <div class="flex justify-center">
            <h3>
                EXAM Publish CONFIG REPORT
            </h3>
           </div>
         
        <table class="w-full text-sm text-left rtl:text-right text-black ">

            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        SL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Class Name
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Exam Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Year
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
                @foreach($Data as $key=> $data)
                <tr class=" border-b border-blue-400">
                    <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
                        {{$key + 1}}
                    </th>
                    <td class="px-6 py-4">
                        {{$data->Class_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$data->exam_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$data->year}}
                    </td>
                    <td class="px-6 py-4 ">
                        @if($data->status == 'active')
                        <span class="text-green-500">Active</span>
                        @else
                        <span class="text-red-500">Inactive</span>
                        @endif
                    </td>

                    <td class="px-6 py-4 ">
                        <div class="flex justify-center">
                            <a href="" class="mr-2"><i class="fa fa-edit" style="color:green;"></i></a>
                            <form method="POST" action="{{ url('dashboard/delete_exam', $data->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn ">
                                    <a href=""><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i></a>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
               @endforeach



            </tbody>
        </table>
    </div>
    <br> <br>
         

        
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        let $dateDropdown = $('#date-dropdown');

        let currentYear = new Date().getFullYear();
        let earliestYear = 1970;

        while (currentYear >= earliestYear) {
            let $dateOption = $('<option>');
            $dateOption.text(currentYear);
            $dateOption.val(currentYear);
            $dateDropdown.append($dateOption);
            currentYear -= 1;
        }
    });
</script>
