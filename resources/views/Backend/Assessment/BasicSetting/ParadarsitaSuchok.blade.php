@extends('Backend.app')
@section('title')
Paradarsita Suchok
@endsection


@section('Dashboard')
@include('Message.message')
@include('Shared.ContentHeader', ['title' => 'পারদর্শিতার সূচক গঠন'])
<div class="w-full mx-auto p-5 space-y-10">
    {{-- first section --}}
    <form action="{{route("paradarsita_suchoks.store", $school_code)}}" method="POST">
        @csrf
        {{-- left section --}}
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
                        <label for="segment" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">বিভাগ:</label>
                        <select id="segment" name="segment"
                            class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                            <option disabled selected>Select</option>
                            <option value="PI">PI</option>
                            <option value="BI">BI</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="subject" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">বিষয়:</label>
                        <select id="subject" name="subject"
                            class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                            <option disabled selected>Select</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="py-5 px-2 space-y-3 flex flex-col">
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="suchok_name" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">পারদর্শিতা
                            সূচক নাম :</label>
                        <input type="text" value="" name="suchok_name" id="suchok_name"
                            class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="" />
                    </div>
                    <div class="grid grid-cols-4 space-x-5 items-center">
                        <label for="suchok_value" class="ml-auto mb-2 text-sm font-medium text-gray-900 ">পারদর্শিতা
                            সূচক মান :</label>
                        <input type="text" value="" name="suchok_value" id="suchok_value"
                            class="col-span-3 bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                            placeholder="" />
                    </div>
                </div>
            </div>
        </div>

        {{-- right section --}}
        <div class="w-full space-y-5">
            <div class="flex justify-around items-center gap-10">
                <textarea id="suchok_matra_rectengle" name="suchok_matra_rectengle" rows="4"
                    class="col-span-3 block p-2.5 w-5/6 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Rectengle"></textarea>
                <textarea id="suchok_matra_circle" name="suchok_matra_circle" rows="4"
                    class="col-span-3 block p-2.5 w-5/6 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Circle"></textarea>
                <textarea id="suchok_matra_triangle" name="suchok_matra_triangle" rows="4"
                    class="col-span-3 block p-2.5 w-5/6 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Triangle"></textarea>
            </div>
            <div class="w-full flex justify-center items-center">
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
                    `/dashboard/assessment/basicSetting/paradarsitaSuchok/getSubjects/${schoolCode}?class_name=${e.target.value}`
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
