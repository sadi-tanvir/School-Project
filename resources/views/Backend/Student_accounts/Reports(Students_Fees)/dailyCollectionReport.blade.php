@extends('Backend.app')
@section('title')
    Income Statement
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

    <div>
        <h1 class="">Income Statement</h1>
    </div>
    <div class=" mt-10">
        <form action="{{ route('DailyCollectionReport.getReports', $school_code) }}"
            class="p-5 shadowStyle rounded-[8px] border border-slate-300 w-2/5 mx-auto space-y-3">
            {{-- date range --}}
            <div class="grid grid-cols-2 place-items-start  gap-5 mb-14">
                <div>
                    <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Date From:</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center mt-3">
                            <input type="date" value="{{ date('Y-m-d') }}" name="date_from" id="date_from"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" />
                        </div>
                    </div>
                </div>
                <div>
                    <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ml-10">To
                        :</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center mt-3">
                            <input type="date" value="{{ date('Y-m-d') }}" name="date_to" id="date_to"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-full"
                                placeholder="" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- class --}}
            <div class="grid grid-cols-4 place-items-start  gap-5">
                <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class
                    :</label>
                <select id="class" name="class"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option selected>Select</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- student id --}}
            <div class="grid grid-cols-4 place-items-start  gap-5">
                <label for="student_roll" class="block mb-2 text-sm font-medium whitespace-noWrap ">Student Roll:
                </label>
                <div class="autocomplete w-full relative  col-span-2">
                    <input type="text" name="student_roll" id="student_roll" placeholder="Search..."
                        class=" w-full py-2 px-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                    <div id="autocomplete-list" class="autocomplete-list hidden"></div>
                </div>
            </div>

            {{-- entry by --}}
            <div class="grid grid-cols-4 place-items-start  gap-5">
                <label for="entry_by" class="block mb-2 text-sm font-medium whitespace-noWrap ">Entry By :
                    :</label>
                <select id="entry_by" name="entry_by"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option selected>Select</option>
                    @foreach ($schoolAdmins as $admin)
                        <option value="{{ $admin->email . '_' .  $admin->name }}">{{ $admin->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="w-full flex justify-end">
                <button type="submit"
                    class="w-1/3  text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">Print
                </button>
            </div>
        </form>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const schoolCode = {!! json_encode($school_code) !!};
        const student_roll = document.getElementById('student_roll');
        const classId = document.getElementById('class');

        // get student information
        classId.addEventListener('change', async (e) => {
            try {
                className = e.target.value;
                const res = await fetch(
                    `/dashboard/DailyCollectionReport/getStudentRoll/${schoolCode}?class_name=${className}`
                )
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                console.log('data', data);
                UpdateStudentRoll(data.student_info);
            } catch (error) {
                console.error('Error:', error);
            }
        });


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
