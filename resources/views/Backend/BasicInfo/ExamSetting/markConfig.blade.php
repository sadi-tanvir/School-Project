@extends('Backend.app')
@section('title')
Exam Mark Setup
@endsection
@section('Dashboard')
@include('Message.message')
<div>
    <h3>
        Mark Config view
    </h3>
</div>

<form action="{{ route('getMarkConfig', $school_code) }}" method="POST">
    @csrf
    <div class="lg:grid grid-cols-8 gap-8">
        <!-- Class Name -->
        <div class="col-span-1">
            <div class="">
                <label for="class" class="text-gray-700">Class:</label>
                <select id="class" name="class_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected value="">Select</option>
                    @foreach ($classData as $data)
                        <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Group -->
        <div class="col-span-1">
            <div class="">
                <label for="group" class="text-gray-700">Group:</label>
                <select id="group" name="group"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected>Select</option>
                    @foreach ($groupData as $data)
                        <option value="{{ $data->group_name }}">{{ $data->group_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Exam -->
        <div class="col-span-1">
            <div class="">
                <label for="class" class="text-gray-700">Exam:</label>

                <select id="exam" name="exam"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <option disabled selected>Select</option>
                    @foreach ($classExamData as $data)
                        <option value="{{ $data->class_exam_name }}">{{ $data->class_exam_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Year -->
        <div class="col-span-1">
            <div class="">
                <label for="class" class="text-gray-700">Year:</label>
                <select name="year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected value="">Select</option>
                    @foreach ($academicYearData as $data)
                        <option value="{{ $data->academic_year_name }}">{{ $data->academic_year_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-span-1">
            <div class="">
                <button type="submit"
                    class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-green-800 mt-5">Find</button>
            </div>
        </div>

    </div>
</form>

<div>
    <div class="mt-10">
        <h1 class="text-xl text-center font-semibold bg-blue-300 p-2">Exam Mark Config Report</h1>
    </div>
</div>


<div class="md:mx-20">
    @if ($shortCodeData)
        <table class="text-sm text-center rtl:text-right text-black  w-full">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Short code
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Total Marks
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Countable Marks
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pass Marks
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acceptance
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>



                @foreach ($shortCodeData->groupBy('subject_name') as $shortCode => $code)
                    <tr class="border-b capitalize text-lg">
                        <td class="px-10">
                            <div class="flex justify-first">
                                <h1>Subject Name</h1>
                            </div>
                        </td>

                        <td class="px-10">
                            <div class="flex justify-first">
                                <h1>{{ $shortCode }}</h1>
                            </div>
                        </td>


                    </tr>

                    <tr>
                        @foreach ($shortCodeData as $data)
                                <td class="mt-2">
                                    @if ($shortCode == $data->subject_name)
                                        {{ $data->short_code }}
                                    @endif

                                </td>
                                <td class="mt-2">
                                    @if ($shortCode == $data->subject_name)
                                        {{ $data->total_mark }}
                                    @endif
                                </td>
                                <td class="mt-2">
                                    @if ($shortCode == $data->subject_name)
                                        {{ $data->countable_mark }}
                                    @endif

                                </td>
                                <td class="mt-2">
                                    @if ($shortCode == $data->subject_name)
                                        {{ $data->pass_mark }}
                                    @endif

                                </td>
                                <td class="mt-2">
                                    @if ($shortCode == $data->subject_name)
                                        {{ $data->acceptance }}
                                    @endif

                                </td>
                                <td class=" mt-2">
                                    @if ($shortCode == $data->subject_name)
                                        <div class="flex">
                                        <a href="{{route('view.update.form',[$school_code, $data->id])}}" class="text-green-500 text-xl"><i class="fa-solid fa-pen-to-square"></i> </a>
                                            <form action="{{route('delete.exam.marks', $data->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 mx-2 text-xl"><i class="fa-solid fa-trash"></i></button>
                                            </form>

                                           
                                        </div>

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




<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#class').change(function () {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('exam-marks.get-groups', $school_code) }}",
                method: 'post',
                data: {
                    class: class_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    $('#group').empty();
                    $('#group').append('<option disabled selected value="">Select</option>');
                    $.each(result, function (key, value) {
                        $('#group').append('<option value="' + value.group_name + '">' + value.group_name + '</option>');
                    });
                }
            });
        });
    });
    $('#class').change(function () {
        var class_name = $(this).val();
        $.ajax({
            url: "{{ route('exam-marks.get-exams', $school_code) }}",
            method: 'post',
            data: {
                class: class_name,
                _token: '{{ csrf_token() }}'
            },
            success: function (result) {
                $('#exam').empty();
                $('#exam').append('<option disabled selected value="">Select</option>');
                $.each(result, function (key, value) {
                    $('#exam').append('<option value="' + value.class_exam_name + '">' + value.class_exam_name + '</option>');
                });
            }
        });
    });

</script>
@endsection