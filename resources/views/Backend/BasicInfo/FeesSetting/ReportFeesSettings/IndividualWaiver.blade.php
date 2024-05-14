@extends('Backend.app')
@section('title')
    Individual Waiver
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
    <div class=" mt-10">
        <form method="GET" action="{{ route('individualWaiverReport.getData', $school_code) }}"
            class="p-5 shadowStyle rounded-[8px] border border-slate-300 w-2/5 mx-auto space-y-3">
            @csrf
            <div class="space-y-3">
                <div class="grid grid-cols-4 place-items-start  gap-5">
                    <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class
                        :</label>
                    <select id="class" name="class"
                        class="col-span-3 bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                        <option disabled selected>Select Class</option>
                        @foreach ($classes as $key => $class)
                            <option value="{{ $class }}">{{ $class }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-4 place-items-start  gap-5">
                    <label for="student_id" class="block mb-2 text-sm font-medium whitespace-noWrap ">Student ID: </label>
                    <div class="autocomplete w-full relative col-span-3">
                        <input type="text" name="student_id" id="autocomplete-input" placeholder="Search..."
                            class="w-full py-2 px-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                        <div id="autocomplete-list" class="autocomplete-list hidden"></div>
                    </div>
                </div>


                <div class="grid grid-cols-4 place-items-start  gap-5">
                    <label for="waiver_type" class="block mb-2 text-sm font-medium whitespace-noWrap ">Waiver Type :</label>
                    <select id="waiver_type" name="waiver_type"
                        class="col-span-3 bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                        <option disabled selected>Select</option>
                        @foreach ($waiver_types as $waiver_type)
                            <option value="{{ $waiver_type }}">{{ $waiver_type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="w-full flex justify-end">
                <button type="submit"
                    class="w-1/3  text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">Print
                </button>
            </div>
        </form>
    </div>

    <script>
        var mainData = {!! json_encode($students_id) !!};
        console.log(mainData);
        let data = Object.values(mainData);
        let data2 = Object.keys(mainData);
        console.log(data2);
        const inputField = document.getElementById('autocomplete-input');
        const autocompleteList = document.getElementById('autocomplete-list');

        // Function to show autocomplete suggestions
        function showAutocompleteSuggestions() {
            const inputValue = inputField.value.toLowerCase();
            const filteredData = data.filter(item => item.toLowerCase().includes(inputValue));

            if (filteredData.length > 0) {
                autocompleteList.innerHTML = '';
                filteredData.forEach(item => {
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
            } else {
                autocompleteList.classList.add('hidden');
            }
        }

        // Show all data when the field is clicked
        inputField.addEventListener('click', () => {
            autocompleteList.innerHTML = '';
            data.forEach(item => {
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
    </script>
@endsection
