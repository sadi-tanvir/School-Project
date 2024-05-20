@extends('Backend.app')
@section('title')
Student BasicInfo
@endsection
@section('Dashboard')
@include('Message.message')
<div>
    <h3>
        Student Basic Info
    </h3>
</div>
<div class="  shadow-md sm:rounded-lg  md:my-10">
    <div class="md:flex justify-end  ">

        <a href="{{ route('updateStudentBasicInfo', $school_code) }}">
            <button type="button"
                class=" text-white bg-rose-700 hover:bg-rose-600 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-rose-600 dark:hover:bg-rose-700 focus:outline-none dark:focus:ring-rose-800">Basic
                Info
            </button>
        </a>
        <a href="{{ route('studentClassInfo', $school_code) }}">

            <button type="button"
                class=" text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Class
                Info
            </button>
        </a>
        <a href="{{ route('StudentPhoto', $school_code) }}">
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
    <form action="{{ route('getStudentData', $school_code) }}" method="GET">
        @csrf

        <div class="grid gap-6 mb-6 md:grid-cols-8 mt-2">
            <div>
                <select id="class" name="class_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a class</option>
                    @foreach ($classData as $data)
                        <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <select id="group" name="group"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a Group</option>
                    @foreach ($groupData as $group)
                        <option value="{{ $group->group_name }}">{{ $group->group_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select id="section" name="section"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a section</option>
                    @foreach ($sectionData as $section)
                        <option value="{{ $section->section_name }}">{{ $section->section_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select id="gender" name="gender"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected disabled>Selected Gender</option>
                    <option value="Male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div>
                <select id="section" name="year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    @foreach ($Year as $year)
                        <option value="{{ $year->academic_year_name }}">{{ $year->academic_year_name }}</option>
                    @endforeach
                </select>
            </div>



            <div>
                <select id="" name="session"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <option selected>Choose a session</option>
                    @foreach ($Session as $session)
                        <option value="{{ $session->academic_session_name }}">{{ $session->academic_session_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="" />

            <div class="flex justify-end">
                <button type="submit"
                    class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Search
                </button>

            </div>
        </div>
    </form>

    <form action="{{ route('updateStudent', $school_code) }}" method="POST">
        @csrf
        @method('PUT')
        <table class="w-full text-sm text-left rtl:text-right text-black ">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                <tr>
                    <th scope="col" class="px-3 py-1 bg-blue-500">
                        {{-- <input type="checkbox" id="select-all-checkbox"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 ">
                        --}}
                    </th>
                    <th scope="col" class="px-3 py-1">
                        Roll
                    </th>
                    <th scope="col" class="px-3 py-1 bg-blue-500">
                        Student ID
                    </th>
                    <th scope="col" class="px-3 py-1">
                        Name
                    </th>

                    <th scope="col" class="px-3 py-1">
                        Father Name
                    </th>
                    <th scope="col" class="px-3 py-1  bg-blue-500">
                        Father NID
                    </th>
                    <th scope="col" class="px-3 py-1">
                        Mother Name
                    </th>
                    <th scope="col" class="px-3 py-1  bg-blue-500">
                        Mother NID
                    </th>
                    <th scope="col" class="px-3 py-1">
                        BirthDate
                    </th>
                    <th scope="col" class="px-3 py-1  bg-blue-500">
                        Gender
                    </th>
                    <th scope="col" class="px-3 py-1">
                        Religion
                    </th>
                    <th scope="col" class="px-3 py-1  bg-blue-500">
                        BG
                    </th>
                    <th scope="col" class="px-3 py-1">
                        Mobile
                    </th>

                </tr>
            </thead>

            <tbody>
                @if ($student !== null)
                    {{-- @dd($student) <!-- Add this line to inspect the value --> --}}
                    @foreach ($student as $key => $data)
                        <tr>
                            <td scope="col" class="px-3 py-1">
                                <input type="checkbox" value="{{ $data->id }}" name="id[]" class="row-checkbox"
                                    data-row-index="{{ $key }}">

                            </td>
                            <td scope="col" class="px-3 py-1">
                                <span class="row-data">{{ $data->student_roll }}</span>
                                <input type="text" name="student_roll[{{ $data->id }}]"
                                    class="form-control row-input hidden md:w-[100px] md:h-[20px] px-2"
                                    value="{{ $data->student_roll }}">
                            </td>
                            <td scope="col" class="px-3 py-1">
                                <span class="row-data">{{ $data->student_id }}</span>
                                <input type="text" name="student_id[{{ $data->id }}]"
                                    class="form-control row-input hidden md:w-[100px] md:h-[20px] px-2"
                                    value="{{ $data->student_id }}">
                            </td>
                            <td scope="col" class="px-3 py-1">
                                <span class="row-data">{{ $data->name }} </span>
                                <input type="text" name="name[{{ $data->id }}]"
                                    class="form-control row-input hidden md:w-[100px] md:h-[20px] px-2"
                                    value="{{ $data->name }} ">
                            </td>

                            <td scope="col" class="px-3 py-1">
                                <span class="row-data">{{ $data->father_name }}</span>
                                <input type="text" name="father_name[{{ $data->id }}]"
                                    class="form-control row-input hidden md:w-[100px] md:h-[20px] px-2"
                                    value="{{ $data->father_name }}">
                            </td>
                            <td scope="col" class="px-3 py-1">
                                <span class="row-data">{{ $data->father_nid }}</span>
                                <input type="text" name="father_nid[{{ $data->id }}]"
                                    class="form-control row-input hidden md:w-[100px] md:h-[20px] px-2"
                                    value="{{ $data->father_nid }}">
                            </td>
                            <td scope="col" class="px-3 py-1">
                                <span class="row-data">{{ $data->mother_name }}</span>
                                <input type="text" name="mother_name[{{ $data->id }}]"
                                    class="form-control row-input hidden md:w-[100px] md:h-[20px] px-2"
                                    value=" {{ $data->mother_name }}">
                            </td>
                            <td scope="col" class="px-3 py-1">
                                <span class="row-data">{{ $data->mother_nid }}</span>
                                <input type="text" name="mother_nid[{{ $data->id }}]"
                                    class="form-control row-input hidden md:w-[100px] md:h-[30px] px-2"
                                    value="{{ $data->mother_nid }}">
                            </td>
                            <td scope="col" class="px-3 py-1">
                                <span class="row-data">{{ $data->birth_date }}</span>
                                <input type="text" name="birth_date[{{ $data->id }}]"
                                    class="form-control row-input hidden md:w-[100px] md:h-[20px] px-2"
                                    value="{{ $data->birth_date }}">
                            </td>
                            <td scope="col" class="px-3 py-1">
                                <span class="row-data"> {{ $data->gender }}</span>
                                <input type="text" name="gender[{{ $data->id }}]"
                                    class="form-control row-input hidden md:w-[100px] md:h-[20px] px-2"
                                    value=" {{ $data->gender }}">
                            </td>
                            <td scope="col" class="px-3 py-1">
                                <span class="row-data">{{ $data->religious }}</span>
                                <input type="text" name="religious[{{ $data->id }}]"
                                    class="form-control row-input hidden md:w-[100px] md:h-[20px] px-2"
                                    value=" {{ $data->religious }}">
                            </td>
                            <td scope="col" class="px-3 py-1">
                                <span class="row-data">{{ $data->blood_group }}</span>
                                <input type="text" name="blood_group[{{ $data->id }}]"
                                    class="form-control row-input hidden md:w-[100px] md:h-[20px] px-2"
                                    value="{{ $data->blood_group }}">
                            </td>
                            <td scope="col" class="px-3 py-1">
                                <span class="row-data">{{ $data->mobile_no }}</span>
                                <input type="text" name="mobile_no[{{ $data->id }}]"
                                    class="form-control row-input hidden md:w-[100px] md:h-[20px] px-2"
                                    value=" {{ $data->mobile_no }}">
                            </td>

                        </tr>
                    @endforeach
                @endif



            </tbody>
        </table>
        <div class="flex justify-end mt-5">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update
            </button>
        </div>
    </form>

</div>


<script>
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

    // Event listener for checkbox change
    document.querySelectorAll('.row-checkbox').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            var rowIndex = this.getAttribute('data-row-index');
            toggleRowEditing(rowIndex);
        });
    });

    // Event listener for update button click
    document.getElementById('update-btn').addEventListener('click', function () {
        // Handle update logic here
    });

    // Event listener for select all checkbox
    document.getElementById('select-all-checkbox').addEventListener('change', function () {
        var checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = this.checked;
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#class').change(function () {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('basic.info.get-groups', $school_code) }}",
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
        //section
        $('#class').change(function () {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('basic.info.get-sections', $school_code) }}",
                method: 'post',
                data: {
                    class: class_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    $('#section').empty();
                    $('#section').append('<option disabled selected value="">Select</option>');
                    $.each(result, function (key, value) {
                        $('#section').append('<option value="' + value.section_name + '">' + value.section_name + '</option>');
                    });
                }
            });
        });

    });
</script>


@endsection