@extends('Backend.app')
@section('title')
Paradarsita Suchok Excel
@endsection


@section('Dashboard')
@include('Message.message')

<div>
    @include('Shared.ContentHeader', ['title' => 'পারদর্শিতার সূচক গঠন'])
    <form action="{{route("paradarsitaSuchokExcel.upload", $school_code)}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="w-full mx-auto p-5 space-y-10">

            {{-- first section --}}

            <div class="grid grid-cols-2">
                <div class="">
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="class" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">শ্রেণি:</label>
                            <select id="class" name="class"
                                class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                                <option disabled selected>Select</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="class" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">বিভাগ:</label>
                            <select id="segment" name="segment"
                                class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                                <option disabled selected>Select</option>
                                <option value="PI">PI</option>
                                <option value="BI">BI</option>
                            </select>
                        </div>
                    </div>
                </div>


                {{-- left section --}}
                <div class="">
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="class" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">বিষয়:</label>
                            <select id="subject" name="subject"
                                class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                                <option disabled selected>Select</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-4 space-x-5 items-center">
                            <label for="excel_file" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">এক্সেল ফাইল
                                :</label>
                            <input name="file"
                                class="col-span-3 w-full block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none  dark:border-gray-600 "
                                id="excel_file" type="file">
                        </div>
                    </div>
                </div>

            </div>

            <div class="w-full flex justify-center items-center gap-5">
                <!-- <form action="{{route("paradarsitaSuchokExcel.download", $school_code)}}" method="GET"> -->
                <a href="{{route("paradarsitaSuchokExcel.download", $school_code)}}"
                    class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-28 py-2.5 text-center">
                    Blank Excel Download
                </a>
                <!-- </form> -->
                <button type="submit"
                    class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-28 py-2.5 text-center">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const schoolCode = @json($school_code);
        const classId = document.getElementById('class');
        const subjectId = document.getElementById('subject');

        // get subjects
        classId.addEventListener("change", async (e) => {
            try {
                const res = await fetch(
                    `/dashboard/assessment/basicSetting/paradarsitaSuchokExcel/getSubjects/${schoolCode}?class_name=${e.target.value}`
                );
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                console.log('from suchok', data);
                UpdateSubjectOption(data.subjects);
            } catch (error) {
                console.error('Error:', error);
            }
        })


        // update section options
        function UpdateSubjectOption(subjects) {
            subjectId.innerHTML = "";
            const defaultOption = document.createElement('option');
            defaultOption.value = "Select";
            defaultOption.textContent = "Select";
            defaultOption.selected = true;
            subjectId.appendChild(defaultOption);
            subjects.forEach(subject => {
                const subjectOption = document.createElement('option');
                subjectOption.value = subject.subject_name;
                subjectOption.textContent = subject.subject_name;
                subjectId.appendChild(subjectOption);
            });
        };
    })
</script>
