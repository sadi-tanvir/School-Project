@extends('Backend.app')
@section('title')
Suject Setup
@endsection
@section('Dashboard')

@include('Message.message')

<div>
    <h3>
        Class By Subject Setup
    </h3>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">

    <form id="dataForm" method="POST" action="{{ route('store.subject.setup',$school_code) }}">
        @csrf
        @method('PUT')
        <div class="grid md:grid-cols-6 gap-4 my-10 ">
            <div class="mr-5 md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Class Name
                    :</label>
            </div>
            <div class="mr-5">
                <select id="class" name="class_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <!-- <option disabled selected>Choose a class</option> -->
                    @if ($selectedClassName === null)
                    <option disabled selected>Choose a class</option>
                    @elseif($selectedClassName)
                    <option value="{{ $selectedClassName }}" selected>{{ $selectedClassName }}</option>
                    @endif


                    @foreach ($classData as $data)
                    <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mr-5 md:flex justify-end">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Group Name
                    :</label>
            </div>
            <div class="mr-5">
                <select id="group" name="group_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    @if ($selectedGroupName === null)
                    <option disabled selected>Choose a group</option>
                    @elseif($selectedGroupName)
                    <option value="{{ $selectedGroupName }}" selected>{{ $selectedGroupName }}</option>
                    @endif
                    @foreach ($groupData as $data)
                    <option value="{{ $data->group_name }}">{{ $data->group_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="hidden">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">School Code
                </label>
                <input type="text" value="{{$school_code}}" name="school_code" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     " placeholder="Enter The Police Station Name" />
            </div>
            <div>
                <button onclick="submitForm()" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">GET
                    DATA</button>
            </div>

        </div>
        <div>
            <div>
                <div class="grid gap-6 mb-6 py-5 md:grid-cols-3 items-center ps-4 border border-gray-200 rounded  mx-20">

                    @foreach ($subjectData as $data)
                    <div>
                        <!-- <input id="subject_name" type="checkbox" value="{{ $data->subject_name }}" name="subject_name[]" class="shift-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  "> -->
                        <input id="subject_name" type="checkbox" value="{{ $data->subject_name }}" name="subject_name[]" class="group-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2  ">
                        <label for="subject_name" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">{{ $data->subject_name }}</label>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>

    </form>







    <div class="flex justify-center text-lg font-bold">
        <h3>
            CLASS WISE SUBJECT SETTING
        </h3>
    </div>
    <form action="{{ route('update.setSubject',$school_code) }}" method="POST">

        @csrf
        @method('PUT')
        <table class="w-full text-sm text-left rtl:text-right text-black ">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        SL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subject Name
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Subject Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subject Serial
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Subject Marge
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($classWiseSubjectData !== null)
                @foreach ($classWiseSubjectData as $key => $data)
                <tr id="row-{{ $data->id }}" class="border-b capitalize text-lg" data-serial="{{ $data->subject_serial }}">
                    <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
                        {{ $key + 1 }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $data->subject_name }}
                        <input class="hidden" value="{{ $data->id }}" type="text" name="id[]" id="">
                        <input class="hidden" value="{{ $data->class_name }}" type="text" name="class_name" id="">
                        <input class="hidden" value="{{ $data->group_name }}" type="text" name="group_name" id="">
                        <input class="hidden" value="{{ $data->school_code }}" type="text" name="school_code" id="">
                    </td>

                    <td class="px-6 py-4">
                        <select name="subject_type[{{ $data->id }}]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                            <option class="capitalize" value="{{ $data->subject_type }}">
                                {{ $data->subject_type }}
                            </option>
                            <option value="select">Select</option>
                            <option value="choosable">Choosable</option>
                            <option value="uncountable">Uncountable</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="number" name="subject_serial[{{ $data->id }}]" class="serial-input" value="{{ $data->subject_serial }}">
                    </td>
                    <td class="px-6 py-4 ">

                        <input type="text" id="subject_marge" name="subject_marge[{{ $data->id }}]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     " value="{{ $data->subject_marge }}" />
                    </td>

                    <td class="px-6 py-4  text-xl flex justify-center">


                        <!-- <a class="mr-2 edit-button"><i class="fa fa-edit" style="color:green;"></i></a> -->

                        <form method="POST" action="">
                            {{-- @csrf
                        @method('DELETE') --}}
                            <button class="btn ">
                                <a href=""><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i></a>
                            </button>
                        </form>



                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

        <br><br>
        <div class="grid md:grid-cols-3 ">
            <div class="mr-10 md:flex justify-center">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  ">Save</button>
            </div>
            <div class="mr-10">
                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Close</button>
            </div>

            <div class="ml-32">
                <h3>Total =
                    @if ($classWiseSubjectData !== null)
                    {{ $classWiseSubjectData->count() }}
                    @endif
                    <div class=" border-2"></div>

                </h3>
            </div>

        </div>
    </form>
</div>



<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Attach click event listener to all delete buttons
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default button action

                var rowId = this.getAttribute('data-id');
                console.log(rowId);
                var routeUrl = '/dashboard/delete_class_wise_subject/' + rowId;
                console.log(routeUrl);
                if (confirm('Are you sure you want to delete this subject?')) {

                    axios.delete(routeUrl)
                        .then(function(response) {
                            if (response.data.success) {
                                var row = document.getElementById('row-' + rowId);
                                if (row) {
                                    row.parentNode.removeChild(row);
                                } else {
                                    console.error('Row not found: ' + 'row-' + rowId);
                                }
                            } else {
                                alert('Error: ' + response.data.message);
                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                            alert('An error occurred while deleting the subject.');
                        });
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.shift-checkbox');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                document.getElementById('dataForm').submit();
            });
        });
    });
</script>

<script>
    // Generate the route URL and store it in a JavaScript variable
    var routeUrl = "{{ route('add.subject.setup', $school_code) }}";

    function submitForm() {
        // Get the selected values
        var className = document.getElementById('class_name').value;
        var groupName = document.getElementById('group_name').value;
        var subjectName = document.getElementById('subject_name').value;

        // Prepare form data
        var formData = {
            class_name: className,
            group_name: groupName,
            subject_name: subjectName
        };

        // Send an AJAX request using Axios
        axios.post(routeUrl, formData)
            .then(function(response) {
                // Handle success response
                console.log(response.data);
            })
            .catch(function(error) {
                // Handle error response
                console.log(error);
            });
    }
</script>

<script>
    function sortTable() {
        var tbody = document.querySelector('tbody');
        var rows = Array.from(tbody.querySelectorAll('tr'));

        rows.sort(function(a, b) {
            var serialA = parseInt(a.getAttribute('data-serial'));
            var serialB = parseInt(b.getAttribute('data-serial'));
            return serialA - serialB;
        });

        rows.forEach(function(row) {
            tbody.appendChild(row);
        });
    }
</script>
<script>
    // Call sortTable function after DOMContentLoaded
    document.addEventListener('DOMContentLoaded', function() {
        sortTable();
    });
</script>




@endsection