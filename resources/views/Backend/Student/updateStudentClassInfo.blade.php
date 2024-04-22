@extends('Backend.app')
@section('title')
    Student ClassInfo
@endsection
@section('Dashboard')
    @include('Message.message')
    <div>
        <h3>
            Student Class Info
        </h3>
    </div>
    di
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
        <div class="md:flex justify-end  ">
            <a href="{{ route('updateStudentBasicInfo', $school_code) }}">
                <button type="button"
                    class=" text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Basic
                    Info
                </button>
            </a>
            <a href="{{ route('studentClassInfo', $school_code) }}">
                <button type="button"
                    class=" text-white bg-rose-700 hover:bg-rose-600 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Class
                    Info
                </button>
            </a>

            <a href="{{route('StudentPhoto',$school_code)}}">
                <button type="button"
                    class=" text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Photo
    
                </button>
            </a>

            <a href="{{ route('getStudent', $school_code) }}">
                <button type="button"
                    class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                    Student
                </button>
            </a>
        </div>
        <hr>
        <form action="{{ route('getStudentClassData', $school_code) }}" method="GET">
            @csrf

            <div class="grid gap-6 mb-6 md:grid-cols-10 mt-2">
                <div>
                <label for="class" class="text-gray-700">Class:</label>
                    <select id="class_name" name="class_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a class</option>
                        @foreach ($classData as $data)
                            <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                <label for="class" class="text-gray-700">Group:</label>
                    <select id="group" name="group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Group</option>
                        @foreach ($groupData as $group)
                            <option value="{{ $group->group_name }}">{{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                <label for="class" class="text-gray-700">Ssection:</label>
                    <select id="section" name="section"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Section</option>
                        @foreach ($sectionData as $section)
                            <option value="{{ $section->section_name }}">{{ $section->section_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                <label for="class" class="text-gray-700">category:</label>
                    <select id="category" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Category</option>
                        @foreach ($categoryData as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                <label for="class" class="text-gray-700">Shift:</label>
                    <select id="shift" name="shift"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Shift</option>
                        @foreach ($shiftData as $shift)
                            <option value="{{ $shift->shift_name }}">{{ $shift->shift_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                <label for="class" class="text-gray-700">Year:</label>
                    <select id="year" name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a year</option>
                        @foreach ($Year as $year)
                            <option value="{{ $year->academic_year_name }}">{{ $year->academic_year_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                <label for="class" class="text-gray-700">Session:</label>
                    <select id="" name="session"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a session</option>
                        @foreach ($Session as $session)
                            <option value="{{ $session->academic_session_name }}">{{ $session->academic_session_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                <label for="class" class="text-gray-700">Status:</label>
                    <select id="" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>

                    </select>
                </div>

                <!-- <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="" /> -->

                <div class="flex justify-end">
                    <button type="submit"
                        class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Search
                    </button>
                </div>
            </div>
        </form>
        <form action="{{ route('updateStudentClass', $school_code) }}" method="POST">
            @csrf
            @method('PUT')
            <table class="w-full text-sm text-left rtl:text-right text-black ">
                <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            <input id="select-all-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                             Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Student ID
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            Roll
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Class
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            Group
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Section
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            Session
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Year
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            Status
                        </th>


                    </tr>


                </thead>
                <tbody>
                    @if ($student !== null)
                        {{-- @dd($student) <!-- Add this line to inspect the value --> --}}
                        @foreach ($student as $key => $data)
                            <tr>
                                <td scope="col" class="px-6 py-3">
                                    <input type="checkbox" value="{{ $data->id }}" name="id[]" class="row-checkbox"
                                        data-row-index="{{ $key }}">
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $data->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $data->student_id }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $data->student_roll }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="row-data">{{ $data->Class_name }}</span>

                                    <select name="Class_name[{{ $data->id }}]"
                                        class="form-control row-input hidden md:w-[120px] md:h-[30px] px-2">
                                        <option value="{{ $data->Class_name }}">{{ $data->Class_name }}</option>
                                        @foreach ($classData as $class)
                                            <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td class="px-6 py-4 ">
                                    <span class="row-data">{{ $data->group }}</span>

                                    <select name="group[{{ $data->id }}]"
                                        class="form-control row-input hidden md:w-[120px] md:h-[30px] px-2">
                                        <option value="{{ $data->group }}">{{ $data->group }}</option>
                                        @foreach ($groupData as $group)
                                            <option value="{{ $group->group_name }}">{{ $group->group_name }}</option>
                                        @endforeach
                                    </select>

                                </td>
                                <td class="px-6 py-4">
                                    <span class="row-data"> {{ $data->section }}</span>
                                    <select name="section[{{ $data->id }}]"
                                        class="form-control row-input hidden md:w-[120px] md:h-[30px] px-2">
                                        <option value="{{ $data->section }}">{{ $data->section }}</option>
                                        @foreach ($sectionData as $section)
                                            <option value="{{ $section->section_name }}">{{ $section->section_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </td>
                                <td class="px-6 py-4 ">
                                    <span class="row-data"> {{ $data->session }}</span>
                                    <select name="session[{{ $data->id }}]"
                                        class="form-control row-input hidden md:w-[120px] md:h-[30px] px-2">
                                        <option value="{{ $data->session }}">{{ $data->session }}</option>
                                        @foreach ($Session as $session)
                                            <option value="{{ $session->academic_session_name }}">
                                                {{ $session->academic_session_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </td>
                                <td class="px-6 py-4">
                                    <span class="row-data"> {{ $data->year }}</span>
                                    <select name="year[{{ $data->id }}]"
                                        class="form-control row-input hidden md:w-[120px] md:h-[30px] px-2">
                                        <option value="{{ $data->year }}">{{ $data->year }}</option>
                                        @foreach ($Year as $year)
                                            <option value="{{ $year->academic_year_name }}">
                                                {{ $year->academic_year_name }}</option>
                                        @endforeach
                                    </select>

                                </td>
                                <td class="px-6 py-4">
                                    <span class="row-data"> {{ $data->status }}</span>
                                    <select name="status[{{ $data->id }}]"
                                        class="form-control row-input hidden md:w-[120px] md:h-[30px] px-2">
                                        <option value="{{ $data->status }}">{{ $data->status }}</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>

                                </td>





                            </tr>
                        @endforeach
                    @endif



                </tbody>

            </table>


            <div class="flex justify-end mt-5">
                <button type="submit"
                    class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2  focus:outline-none" >Update
                </button>
            </div>


            <div class="flex justify-start mt-5 p-2">
                {{-- <input type="checkbox"  class="mr-10"> --}}
                <a  id="delete-btn" class="text-white bg-rose-700 hover:bg-rose-600 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2  focus:outline-none " >Delete</a>
            </div>
        </form>


    </div>

    
    <script>
      // Define a global variable to store selected student IDs
var selectedStudentIds = [];

// Function to toggle between displaying text and input fields
function toggleRowEditing(rowIndex) {
    var row = document.querySelector('tbody').children[rowIndex];
    var inputs = row.querySelectorAll('.row-input');
    var dataFields = row.querySelectorAll('.row-data');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].classList.toggle('hidden');
        dataFields[i].classList.toggle('hidden');
    }
}

// Function to update delete button status
function updateDeleteButtonStatus() {
    var anyChecked = false;
    selectedStudentIds = []; // Clear previously selected IDs
    document.querySelectorAll('.row-checkbox').forEach(function(checkbox) {
        if (checkbox.checked) {
            anyChecked = true;
            selectedStudentIds.push(checkbox.value); // Add selected ID to the array
        }
    });
    var deleteButton = document.getElementById('delete-btn');
    deleteButton.disabled = !anyChecked;
}

// Event listener for checkbox change
document.querySelectorAll('.row-checkbox').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        var rowIndex = this.getAttribute('data-row-index');
        toggleRowEditing(rowIndex);
        updateDeleteButtonStatus();
    });
});

document.getElementById('delete-btn').addEventListener('click', function() {
        var confirmation = confirm("Are you sure you want to delete selected data?");
        if (confirmation) {
            // Construct the URL with selected student IDs
            var deleteUrl = '{{ route("deleteStudent", ["schoolCode" => ":schoolCode", "ids" => ":ids"]) }}';
            deleteUrl = deleteUrl.replace(':schoolCode', '{{ $school_code }}');
            deleteUrl = deleteUrl.replace(':ids', selectedStudentIds.join(','));

            // Create a form dynamically to send a DELETE request
            var form = document.createElement('form');
            form.method = 'POST'; // Use POST method to submit the form
            form.action = deleteUrl;
            form.style.display = 'none'; // Hide the form

            // Add a method spoofing input field for DELETE request
            var methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';

            // Append the method input field to the form
            form.appendChild(methodInput);

            // Add CSRF token input field
            var csrfTokenInput = document.createElement('input');
            csrfTokenInput.type = 'hidden';
            csrfTokenInput.name = '_token';
            csrfTokenInput.value = '{{ csrf_token() }}';

            // Append CSRF token input field to the form
            form.appendChild(csrfTokenInput);

            // Append the form to the body and submit it
            document.body.appendChild(form);
            form.submit();
        }
    });

    </script>
    



@endsection