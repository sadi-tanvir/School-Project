@extends('Backend.app')
@section('title')
Due Pay Summary
@endsection
@section('Dashboard')
@include('/Message/message')
<style>
    .shadowStyle {
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }

    /* Custom styles */
    .autocomplete {
        position: relative;
    }

    .autocomplete input {
        padding-right: 2.5rem;
    }

    .autocomplete .autocomplete-list {
        position: absolute;
        z-index: 10;
        width: calc(100% - 1rem);
        max-height: 200px;
        overflow-y: auto;
        background-color: #fff;
        border: 1px solid #d1d5db;
        border-radius: 0.25rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .autocomplete .autocomplete-list-item {
        padding: 0.5rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .autocomplete .autocomplete-list-item:hover {
        background-color: #f3f4f6;
    }

</style>

{{-- <div>
    <h1 class="">Due Pay Summary</h1>
</div> --}}

<div class=" mt-10">
    <form action="{{route("DuepaySummary.info", $school_code)}}" method="GET" class="p-5 shadowStyle rounded-[8px] border border-slate-300 w-2/5 mx-auto space-y-3">
        {{-- @csrf --}}
        {{-- class --}}
        <div class="grid grid-cols-4 place-items-start  gap-5">
            <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class:</label>
            <select id="class" name="class" class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                <option selected>Select</option>
                @foreach ($classes as $class)
                <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>

        {{-- group --}}
        <div class="grid grid-cols-4 place-items-start  gap-5">
            <label for="group" class="block mb-2 text-sm font-medium whitespace-noWrap ">Group :</label>
            <select id="group" name="group" class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                <option selected>Select </option>
            </select>
        </div>

        {{-- section --}}
        <div class="grid grid-cols-4 place-items-start  gap-5">
            <label for="section" class="block mb-2 text-sm font-medium whitespace-noWrap ">Section :</label>
            <select id="section" name="section" class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                <option selected>Select </option>
            </select>
        </div>

        {{-- Student Roll --}}
        <div class="grid grid-cols-4 place-items-start  gap-5">
            <label for="student_roll" class="block mb-2 text-sm font-medium whitespace-noWrap ">Student Roll:</label>
            <div class="col-span-3  autocomplete w-full relative">
                <input type="text" name="student_roll" id="student_roll" placeholder="Search..." class="w-full py-2 px-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                <div id="autocomplete-list" class="autocomplete-list hidden"></div>
            </div>
        </div>

        {{-- status --}}
        <div class="grid grid-cols-4 place-items-start  gap-5">
            <label for="payment_status" class="block mb-2 text-sm font-medium whitespace-noWrap ">Status :</label>
            <select id="payment_status" name="payment_status" class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-3">
                <option disabled selected>Select </option>
                <option value="paid">paid</option>
                <option value="unpaid">unpaid</option>
            </select>
        </div>

        <div class="w-full flex justify-center">
            <button type="submit" class="w-1/3  text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">
                Print
            </button>
        </div>
    </form>
</div>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const schoolCode = @json($school_code);
        const classId = document.getElementById('class');
        const groupId = document.getElementById('group');
        const sectionId = document.getElementById('section');
        const year = document.getElementById('year');


        // get class wise Groups
        async function getClassWiseGroupsAndSections(class_name) {
            try {
                const res = await fetch(
                    `/dashboard/DuepaySummary/getGroupsAndSections/${schoolCode}?class_name=${class_name}`
                )
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                UpdateGroupOption(data.groups);
                UpdateSectionOption(data.sections);
                UpdateStudentRoll(data.student_info);
            } catch (error) {
                console.error('Error:', error);
            }
        }
        classId.addEventListener('change', function(event) {
            const classValue = event.target.value;
            getClassWiseGroupsAndSections(classValue);
        });


        // get student information using class, group, and section
        async function getStudentInformation(class_name, group_name, section_name) {
            try {
                const res = await fetch(
                    `/dashboard/DuepaySummary/getStudentInfo/${schoolCode}?class_name=${class_name}&group_name=${group_name}&section_name=${section_name}`
                )
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                UpdateStudentRoll(data.student_info);
            } catch (error) {
                console.error('Error:', error);
            }
        }

        // get student information using student group
        groupId.addEventListener('change', function(event) {
            const groupValue = event.target.value;
            getStudentInformation(classId.value, groupValue, sectionId.value);
        });

        // get student information using student section
        sectionId.addEventListener('change', function(event) {
            const sectionValue = event.target.value;
            console.log('sectionFromSectionId', sectionValue);
            getStudentInformation(classId.value, groupId.value, sectionValue);
        });

        // update group options
        function UpdateGroupOption(groups) {
            console.log(groups);
            groupId.innerHTML = "";
            const defaultOption = document.createElement('option');
            defaultOption.value = "Select";
            defaultOption.textContent = "Select";
            defaultOption.slected = true;
            groupId.appendChild(defaultOption);
            groups.forEach(group => {
                const groupOption = document.createElement('option');
                groupOption.value = group.group_name;
                groupOption.textContent = group.group_name;
                groupId.appendChild(groupOption);
            });
        };


        // update section options
        function UpdateSectionOption(sections) {
            sectionId.innerHTML = "";
            const defaultOption = document.createElement('option');
            defaultOption.value = "Select";
            defaultOption.textContent = "Select";
            defaultOption.slected = true;
            sectionId.appendChild(defaultOption);
            sections.forEach(section => {
                const sectionOption = document.createElement('option');
                sectionOption.value = section.section_name;
                sectionOption.textContent = section.section_name;
                sectionId.appendChild(sectionOption);
            });
        };


        // update student roll
        function UpdateStudentRoll(students) {
            const inputField = document.getElementById('student_roll');
            const autocompleteList = document.getElementById('autocomplete-list');
            inputField.value = "";
            // Function to show autocomplete suggestions
            function showAutocompleteSuggestions() {
                const inputValue = inputField.value.toLowerCase();
                const filteredData = students.filter(item =>
                    (item.name && item.name.toLowerCase().includes(inputValue)) ||
                    (item.student_roll && item.student_roll.toLowerCase().includes(inputValue)) ||
                    (item.student_id && item.student_id.toLowerCase().includes(inputValue))
                );

                if (filteredData.length > 0) {
                    autocompleteList.innerHTML = '';
                    filteredData.forEach(item => {
                        const listItem = document.createElement('div');
                        listItem.textContent = item.student_roll + " - " + item.name;
                        listItem.classList.add('autocomplete-list-item');
                        listItem.addEventListener('click', () => {
                            inputField.value = item.student_id;
                            autocompleteList.classList.add('hidden');
                        });
                        autocompleteList.appendChild(listItem);
                    });
                    autocompleteList.classList.remove('hidden');
                } else {
                    autocompleteList.classList.add('hidden');
                }
            }

            // Show all data when the field is clicked
            inputField.addEventListener('click', () => {
                autocompleteList.innerHTML = '';
                students.forEach(item => {
                    const listItem = document.createElement('div');
                    listItem.textContent = item.student_roll + " - " + item.name;
                    listItem.classList.add('autocomplete-list-item');
                    listItem.addEventListener('click', () => {
                        inputField.value = item.student_id;
                        autocompleteList.classList.add('hidden');
                    });
                    autocompleteList.appendChild(listItem);
                });
                autocompleteList.classList.remove('hidden');
            });

            // Event listener for input field
            inputField.addEventListener('input', showAutocompleteSuggestions);

            // Hide autocomplete list on click outside
            document.addEventListener('click', (event) => {
                if (!autocompleteList.contains(event.target) && event.target !== inputField) {
                    autocompleteList.classList.add('hidden');
                }
            });
        };
    });

</script>
