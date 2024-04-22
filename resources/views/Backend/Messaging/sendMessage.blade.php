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

    <div>
        <h1 class="text-2xl font-bold my-10 mx-5 text-center">Send Message</h1>
    </div>
    <div class=" mb-3">
        <form action="{{ route('sendMessage') }}" method="POST"
            class="p-5 shadowStyle rounded-[8px] border border-slate-300 w-3/5 mx-auto space-y-3">
            @csrf
            <div class="place-items-start gap-5">
                <label for="message_dropdown" class="block mb-2 text-sm font-medium whitespace-noWrap">Select Message:</label>
                <select name="message_dropdown" id="message_dropdown" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select a message</option>
                    @foreach($messages as $message)
                        <option value="{{ $message->id }}">{{ $message->message }}</option>
                    @endforeach
                </select>
                <label for="instruction" class="block mb-2 text-sm font-medium whitespace-noWrap">Instruction:</label>
                <textarea name="message" id="instruction" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="write a message"></textarea>
                <input value="{{ $school_code }}" name="school_code" class="hidden" type="text">
            </div>

            <div class="w-full flex justify-end">
                <button type="submit"
                    class="  text-white bg-rose-700 hover:bg-rose-600 focus:ring-0  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Send
                </button>
            </div>
            <div class="">
                <h3 class="text-lg mb-5">
                    All Contact:
                </h3>

                <table class="w-full text-sm text-center rtl:text-right text-black">
                    <thead class="text-center text-white uppercase bg-blue-300 border-b border-blue-200 ">
                        <tr>
                            <th scope="col" class=" text-sm px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class=" text-sm px-6 py-3 bg-blue-500">
                                Name
                            </th>
                            <th scope="col" class=" text-sm px-6 py-3">
                                Contact
                            </th>
                            <th scope="col" class=" text-sm px-6 py-3 bg-blue-500">
                                Action
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $data)
                            <tr id="row_{{ $data->id }}">
                                <td scope="col" class="text-sm px-6 py-3">
                                    <input type="checkbox" name="contact[{{ $data->contact }}]" value="{{ $data->contact }}"
                                        class="row-checkbox" data-row-id="{{ $data->id }}" checked>
                                </td>
                                <td scope="col" class="text-sm px-6 py-3">
                                    {{ $data->name }}
                                </td>
                                <td scope="col" class="text-sm px-6 py-3">
                                    {{ $data->contact }}
                                </td>
                                <td scope="col" class="text-sm px-6 py-3 flex justify-center">
                                    <button class="btn delete-button" data-contact-id="{{ $data->id }}">
                                        <i class="fa fa-trash" aria-hidden="true" style="color:red;"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>



        </form>
    </div>
    <script>
        // Event listener for delete button click
        document.querySelectorAll('.delete-button').forEach(function(button) {
            button.addEventListener('click', function() {
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
    </script>
      <script>
        // Populate instruction textarea when message is selected from dropdown
        document.getElementById('message_dropdown').addEventListener('change', function() {
            var selectedMessage = this.options[this.selectedIndex].text;
            document.getElementById('instruction').value = selectedMessage;
        });
    </script>
@endsection
