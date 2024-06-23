@extends('Backend.app')
@section('title')
Send Message
@endsection
@section('Dashboard')
@include('/Message/message')
<style>
    .shadowStyle {
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }
</style>

<div class="bg-gray-200">
    <p class="text-xl p-1">Send SMS</p>
</div>
<div class="bg-white shadow-lg p-5 ">
    <div>
        <h4 class="text-2xl  font-semibold font-sans text-center">SMS Information</h4>
        <form action="{{route('getContact')}}" method="post" class="flex justify-center">
            @csrf
            <div class="md:flex justify-center items-center">
                <div class="place-items-start gap-5">
                    <label for="message_dropdown" class="block mb-2 text-sm font-medium whitespace-noWrap">Select
                        Message:</label>
                    <select name="message_dropdown" id="message_dropdown"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select a message</option>
                        @foreach($messages as $message)
                            <option value="{{ $message->id }}">{{ $message->message }}</option>
                        @endforeach
                    </select>
                    <label for="instruction"
                        class="block mb-2 text-sm font-medium whitespace-noWrap">Instruction:</label>
                    <textarea readOnly name="message" id="instruction" rows="4"

                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="write a message"></textarea>
                    <input value="{{ $school_code }}" name="school_code" class="hidden" type="text">
                </div>

                <div>


                    <input name="school_code" class="hidden" value="{{$school_code}}" type="text">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 p-5">
                        <div class="">
                            <label for="class" class="text-gray-700">Class:</label>
                            <select id="class" name="class_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected value="">Select class</option>
                                @foreach ($classes as $data)
                                    <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="section" class="text-gray-700">Section:</label>
                            <select id="section" name="section_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected value="">Select Section</option>
                                @foreach ($sections as $data)
                                    <option value="{{ $data->section_name }}">{{ $data->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="group" class="text-gray-700">Group:</label>
                            <select id="group" name="group_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected value="">Select group</option>
                                @foreach ($groups as $data)
                                    <option value="{{ $data->group_name }}">{{ $data->group_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="shift" class="text-gray-700">shift:</label>
                            <select id="shift" name="shift_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected value="">Select Shift</option>
                                @foreach ($shifts as $data)
                                    <option value="{{ $data->shift_name }}">{{ $data->shift_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="Category" class="text-gray-700">Category:</label>
                            <select id="Category" name="category_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected value="">Select Category</option>
                                @foreach ($categories as $data)
                                    <option value="{{ $data->category_name }}">{{ $data->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="Session" class="text-gray-700">Session:</label>
                            <select id="Session" name="session_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected value="">Select Session</option>
                                @foreach ($sessions as $data)
                                    <option value="{{ $data->academic_session_name }}">{{ $data->academic_session_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="">
                            <label for="Year" class="text-gray-700">Year:</label>
                            <select id="Year" name="year_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($years as $data)
                                    <option value="{{ $data->academic_year_name }}">{{ $data->academic_year_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <button type="submit"
                                class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2     dark:focus:ring-green-800 mt-5">Find</button>
                        </div>
                    </div>


                </div>
            </div>
        </form>



        <div class=" mb-3 mt-5">
            <form action="{{ route('sendMessage') }}" method="POST" class="p-5 ">
                @csrf
                <div class="">
                    <h3 class="text-lg mb-5">
                        All Contact:
                    </h3>

                    <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
                        <thead class="text-center text-white uppercase bg-blue-300 border-b border-blue-200 ">
                            <tr>
                                <th scope="col" class="text-sm px-6 py-3">
                                    <input type="checkbox" id="select-all-contacts">
                                </th>

                                <th scope="col" class=" text-sm px-6 py-3 bg-blue-500">
                                    Name
                                </th>
                                <th scope="col" class=" text-sm px-6 py-3 bg-blue-500">
                                    Contact
                                </th>
                                <th scope="col" class=" text-sm px-6 py-3 bg-blue-500">
                                    Class
                                </th>
                                <th scope="col" class=" text-sm px-6 py-3 bg-blue-500">
                                    Roll
                                </th>
                                <th scope="col" class=" text-sm px-6 py-3 bg-blue-500">
                                    Student ID
                                </th>
                                <th scope="col" class=" text-sm px-6 py-3">
                                    Contact
                                </th>
                                <th scope="col" class=" text-sm px-6 py-3">
                                    Section
                                </th>
                                <th scope="col" class=" text-sm px-6 py-3 bg-blue-500">
                                    Send SMS
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($students !== null)
                                @foreach ($students as $key => $data)
                                    <tr id="row_{{ $data->id }}" class="border-b">
                                        <td scope="col" class="text-sm px-6 py-3">
                                            <input type="checkbox" name="contact[{{ $data->mobile_no }}]"
                                                value="{{ $data->mobile_no }}" class="row-checkbox"
                                                data-row-id="{{ $data->id }}">
                                        </td>
                                        <td scope="col" class="text-sm px-6 py-3">
                                            {{ $key + 1 }}
                                        </td>
                                        <td scope="col" class="text-sm px-6 py-3">
                                            {{ $data->name }}
                                        </td>
                                        <td scope="col" class="text-sm px-6 py-3">
                                            {{ $data->Class_name }}
                                        </td>
                                        <td scope="col" class="text-sm px-6 py-3">
                                            {{ $data->student_roll }}
                                        </td>
                                        <td scope="col" class="text-sm px-6 py-3">
                                            {{ $data->student_id }}
                                        </td>
                                        <td scope="col" class="text-sm px-6 py-3">
                                            {{ $data->mobile_no }}
                                        </td>
                                        <td scope="col" class="text-sm px-6 py-3">
                                            {{ $data->section }}
                                        </td>
                                        <td scope="col" class="text-sm px-6 py-3 flex justify-center">
                                            <input readonly name="message" value="{{$sms}}" class="rounded-xl" type="text">
                                            <input value="{{$school_code}}" name="school_code" class="hidden" type="text">
                                            @foreach ($messageCount as $count)

                                                <input type="text" name="smsCount" class="hidden" value="{{$count->message_count}}">
                                            @endforeach

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @foreach ($contacts as $data)
                                    <tr id="row_{{ $data->id }}">

                                        <td scope="col" class="text-sm px-6 py-3">
                                            <input type="checkbox" name="contact[{{ $data->contact }}]"
                                                value="{{ $data->contact }}" class="row-checkbox" data-row-id="{{ $data->id }}">


                                        </td>
                                        <td scope="col" class="text-sm px-6 py-3">
                                            {{ $data->name }}
                                        </td>
                                        <td scope="col" class="text-sm px-6 py-3">
                                            {{ $data->contact }}
                                        </td>

                                        
                                        <td>
                                            <input class="rowMessage" readonly name="message" class="rounded-xl" type="text">
                                        </td>
                                        <td scope="col" class="text-sm px-6 py-3 flex justify-center">
                                            <button class="btn delete-button" data-contact-id="{{ $data->id }}">
                                                <i class="fa fa-trash" aria-hidden="true" style="color:red;"></i>
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="w-full flex justify-end">
                    <button type="submit"
                        class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Send
                    </button>
                    <a href="{{route('dashboard.index', $school_code)}}"
                        class="  text-white bg-red-700 hover:bg-red-600 focus:ring-0  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Close
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Event listener for delete button click
    document.querySelectorAll('.delete-button').forEach(function (button) {
        button.addEventListener('click', function () {
            var contactId = this.getAttribute('data-contact-id');
            var confirmation = confirm("Are you sure you want to delete this contact?");
            if (confirmation) {
                deleteContact(contactId);
            }
        });
    });

    // Function to delete contact via AJAX
    function deleteContact(contactId) {
        fetch('/dashboard/delete_contact/' + contactId, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Error deleting contact');
                }
            })
            .then(data => {
                // Remove the row from the table
                var row = document.getElementById('row_' + contactId);
                row.parentNode.removeChild(row);
                alert(data.message); // Show success message
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error deleting contact');
            });
    }




    // Function to delete all selected contacts via AJAX

    function deleteSelectedContacts() {
        var selectedContacts = [];
        var checkedCheckboxes = document.querySelectorAll('.row-checkbox:checked');

        // Check if any checkboxes are checked
        if (checkedCheckboxes.length === 0) {
            alert("Please select data to delete.");
            return;
        }

        // Add selected contact IDs to the array
        checkedCheckboxes.forEach(function (checkbox) {
            selectedContacts.push(checkbox.getAttribute('data-row-id'));
        });

        fetch('/dashboard/delete_selected_contacts', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                selectedContacts: selectedContacts
            })
        })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Error deleting selected contacts');
                }
            })
            .then(data => {
                // Remove the selected rows from the table
                selectedContacts.forEach(function (contactId) {
                    var row = document.getElementById('row_' + contactId);
                    row.parentNode.removeChild(row);
                });
                alert(data.message); // Show success message
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error deleting selected contacts');
            });
    }

    // Event listener for delete all button click
    document.getElementById('deleteAllButton').addEventListener('click', function () {
        var confirmation = confirm("Are you sure you want to delete selected contacts?");
        if (confirmation) {
            deleteSelectedContacts();
        }
    });
</script>
</script>
<script>
    // Populate instruction textarea when message is selected from dropdown
    document.getElementById('message_dropdown').addEventListener('change', function () {
        var selectedMessage = this.options[this.selectedIndex].text;
        document.getElementById('instruction').value = selectedMessage;

        var contacts = document.querySelectorAll('.rowMessage');
        contacts.forEach(function (contact) {
            contact.value = selectedMessage;
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Select the header checkbox
        var selectAllCheckbox = document.getElementById('select-all-contacts');

        // Select all row checkboxes
        var rowCheckboxes = document.querySelectorAll('.row-checkbox');

        // Add event listener to the header checkbox
        selectAllCheckbox.addEventListener('change', function () {
            var isChecked = this.checked;

            // Loop through each row checkbox and set its checked status
            rowCheckboxes.forEach(function (checkbox) {
                checkbox.checked = isChecked;
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#class').change(function () {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('messages.get-groups', $school_code) }}",
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
            console.log(class_name);
            $.ajax({
                url: "{{ route('messages.get-sections', $school_code) }}",
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
        //shift
        $('#class').change(function () {
            var class_name = $(this).val();
            $.ajax({
                url: "{{ route('messages.get-shifts', $school_code) }}",
                method: 'post',
                data: {
                    class: class_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    $('#shift').empty();
                    $('#shift').append('<option disabled selected value="">Select</option>');
                    $.each(result, function (key, value) {
                        $('#shift').append('<option value="' + value.shift_name + '">' + value.shift_name + '</option>');
                    });
                }
            });
        });
    });
</script>


@endsection