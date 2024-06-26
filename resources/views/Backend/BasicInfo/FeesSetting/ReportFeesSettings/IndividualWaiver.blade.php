@extends('Backend.app')
@section('title')
Individual Waiver
@endsection
@section('Dashboard')
@include('/Message/message')
<style>
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

    thead th:first-child {
        border-top-left-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
    }

    thead th:last-child {
        border-top-right-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }

    /* hover effect  */
    .btn-hover,
    .btn-hover {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
    }

    .btn-hover::before {
        background: #fff;
        content: '';
        height: 20rem;
        opacity: 0;
        position: absolute;
        top: -50px;
        transform: rotate(15deg);
        width: 40px;
        transition: all 3000ms cubic-bezier(0.19, 1, 0.22, 1);
    }

    .btn-hover::after {
        background: #fff;
        content: '';
        height: 20rem;
        opacity: 0;
        position: absolute;
        top: -50px;
        transform: rotate(15deg);
        transition: all 3000ms cubic-bezier(0.19, 1, 0.22, 1);
        width: 8rem;
    }

    .btn-hover__new::before {
        left: -50%;
    }

    .btn-hover__new::after {
        left: -100%;
    }

    .btn-hover__new:hover::before {
        left: 120%;
        opacity: 0.5s;
    }

    .btn-hover__new:hover::after {
        left: 200%;
        opacity: 0.6;
    }

    .btn-hover span {
        z-index: 20;
    }
</style>

@include('Shared.ContentHeader', ['title' => 'Individual Waiver'])

<div class="mt-10">
    <form method="GET" action="{{ route('individualWaiverReport.getData', $school_code) }}"
        class="p-6 rounded-[8px] border-2 bg-gray-200 border-slate-300 mx-auto space-y-3 w-3/6">
        @csrf
        <div class="space-y-3">
            <div class=" place-items-start  gap-5">
                <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class
                    :</label>
                <select id="class" name="class"
                    class="col-span-3 bg-white border-0 text-gray-900 text-sm rounded-lg  block w-full p-3.5">
                    <option selected>Select</option>
                    @foreach ($classes as $key => $class)
                    <option value="{{ $class }}">{{ $class }}</option>
                    @endforeach
                </select>
            </div>

            <div class=" place-items-start  gap-5">
                <label for="student_id" class="block mb-2 text-sm font-medium whitespace-noWrap ">Student ID: </label>
                <div class="autocomplete w-full relative col-span-3">
                    <input type="text" name="student_id" id="student_id" placeholder="Search..."
                        class="w-full py-3 px-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                    <div id="autocomplete-list" class="autocomplete-list hidden"></div>
                </div>
            </div>


            <div class=" place-items-start  gap-5">
                <label for="waiver_type" class="block mb-2 text-sm font-medium whitespace-noWrap ">Waiver Type :</label>
                <select id="waiver_type" name="waiver_type"
                    class="col-span-3 bg-white border-0 text-gray-900 text-sm rounded-lg  block w-full p-3.5">
                    <option selected>Select</option>
                </select>
            </div>
        </div>

        <div class="w-full flex justify-end">
            <button type="submit"
                class="w-full  text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-3.5 me-2 mb-2 focus:outline-none">Print
            </button>
        </div>
    </form>
</div>


<script>
    var mainData = {!! json_encode($students_id) !!};
            var schoolCode = @json($school_code);
            /* console.log(mainData);
            let data = Object.values(mainData);
            let data2 = Object.keys(mainData);
            console.log(data2); */
            const classId = document.getElementById('class');
            const waiver_type = document.getElementById('waiver_type');


            // get student information using class, group, and section
            async function getStudentInformation(class_name, group_name, section_name) {
                try {
                    const res = await fetch(
                        `/dashboard/individualWaiver/getStudentInfo/${schoolCode}?class_name=${class_name}`
                    )
                    if (!res.ok) throw new Error('Network response was not ok');
                    const data = await res.json();
                    console.log(data);
                    UpdateStudentRoll(data.student_info);
                    UpdateWaiverTypeOption(data.waiver_types);
                } catch (error) {
                    console.error('Error:', error);
                }
            }

            classId.addEventListener('change', function (e) {
                getStudentInformation(e.target.value)
            })


            // update group options
        function UpdateWaiverTypeOption(waiverTypes) {
            console.log(waiverTypes);
            waiver_type.innerHTML = "";
            const defaultOption = document.createElement('option');
            defaultOption.value = "Select";
            defaultOption.textContent = "Select";
            defaultOption.selected = true;
            waiver_type.appendChild(defaultOption);
            waiverTypes.forEach(waiverType => {
                const groupOption = document.createElement('option');
                groupOption.value = waiverType;
                groupOption.textContent = waiverType;
                waiver_type.appendChild(groupOption);
            });
        };


           // update student roll
           function UpdateStudentRoll(students) {
               const inputField = document.getElementById('student_id');
               const autocompleteList = document.getElementById('autocomplete-list');
               students = Object.values(students);
               console.log('from students', Object.values(students));
               inputField.value = "";
                // Function to show autocomplete suggestions
                function showAutocompleteSuggestions() {
                    const inputValue = inputField.value.toLowerCase();
                    const filteredData = students.filter(item =>
                        (item && item.toLowerCase().includes(inputValue))
                    );

                    if (filteredData.length > 0) {
                        autocompleteList.innerHTML = '';
                        filteredData.forEach(item => {
                            const listItem = document.createElement('div');
                            listItem.textContent = item;
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
                        listItem.textContent = item;
                        listItem.classList.add('autocomplete-list-item');
                        listItem.addEventListener('click', () => {
                            inputField.value = item;
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
</script>
@endsection
