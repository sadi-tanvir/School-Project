@extends('Backend.app')
@section('title')
Exam Mark Setup
@endsection
@section('Dashboard')
<div>
    <h3>
        Exam Mark Setup View List
    </h3>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
    <form action="{{route('get.set.class.exam.marks.data',$school_code)}}", method="post">
    @csrf
        <div class="md:flex my-10 ">
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Class :</label>
            </div>
            <div class="mr-5">
                <select id="class" name="class"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option disabled selected>Choose Class</option>
                    @foreach ($classData as $data)
                        <option value="{{$data->class_name}}">{{$data->class_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Group :</label>
            </div>
            <div class="mr-5">
                <select id="group" name="group"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option disabled selected>Choose group</option>
                    @foreach ($groupData as $data)
                        <option value="{{$data->group_name}}">{{$data->group_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Exam :</label>
            </div>
            <div class="mr-5">
                <select id="exam" name="exam"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option disabled selected>Choose Exam</option>
                    @foreach ($classExamData as $data)
                        <option value="{{$data->class_exam_name}}">{{$data->class_exam_name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Year :</label>
            </div>
            <div class="mr-5">
                <select name="year" id='year'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    @foreach ($academicYearData as $data)
                        <option value="{{$data->academic_year_name}}">{{$data->academic_year_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mr-5">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">Search</button>
            </div>
        </div>

</form>
    <div class="">
        <div class=" text-lg font-bold">
            <div class="flex justify-center">
                <h3>
                    EXAM MARK CONFIG REPORT
                </h3>
            </div>

            <table class="w-full text-sm text-left rtl:text-right text-black ">
                <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            SHORT CODE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            TOTAL MARKS
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            Countable Mark
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pass Mark
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            Acceptance
                        </th>
                        <th scope="col" class="px-6 py-3">
                            STATUS
                        </th>
                    </tr>
                </thead>
                <tbody>

                @if(!empty($setClassExamData) && $setClassExamData->count())
                @foreach($setClassExamData->groupBy('subject_name') as $subject => $examData) 
                        <tr class="border-b capitalize text-lg">
                            <td class="px-10">
                                <div class="flex justify-first">
                                <h1>Subject Name</h1>
                            </div>
                            </td>
                        
                            <td class="px-10">
                            <div class="flex justify-first">
                            <h1>{{ $subject }}</h1>
                        </div>
                        </td>                
                        </tr>
                        
                        <tr> 
                        @foreach ($setClassExamData as $data)
                                <td class="">
                                    @if ($subject == $data->subject_name)
                                        {{ $data->short_code }}
                                    @endif

                                </td>
                                <td class="">
                                    @if ($subject == $data->subject_name)
                                        {{ $data->total_mark }}
                                    @endif
                                </td>
                                <td class="">
                                    @if ($subject == $data->subject_name)
                                    {{ $data->countable_mark }}
                                    @endif

                                </td>
                                <td class="">
                                    @if ($subject == $data->subject_name)
                                    {{ $data->pass_mark }}
                                    @endif

                                </td>
                                <td class="">
                                    @if ($subject == $data->subject_name)
                                    {{ $data->acceptance }}
                                    @endif

                                </td>
                                <td class="">
                                    @if ($subject == $data->subject_name)
                                    <form action="{{ route('delete.set.exam.marks', [$data->id, $school_code]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit"><i class="fa-solid fa-trash text-red-500"></i></button>
                                    </form>
                                    @endif

                                </td>
                        </tr>
                    @endforeach
            @endforeach
                @endif
           
                   
                </tbody>
            </table>
        </div>
    </div>
    <br> <br>



</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#class').change(function() {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('set.exam.marks.get-groups', $school_code) }}",
                method: 'post',
                data: {
                    class: class_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('#group').empty();
                    $('#group').append('<option disabled selected value="">Select Group</option>');
                    $.each(result, function(key, value) {
                        $('#group').append('<option value="' + value.group_name + '">' + value.group_name + '</option>');
                    });
                }
            });
        });
    });
      
      
</script>
@endsection
