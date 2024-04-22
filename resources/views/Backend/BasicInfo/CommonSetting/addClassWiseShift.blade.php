@extends('Backend.app')
@section('title')
SectionData
@endsection
@section('Dashboard')

@include('Message.message')


<div>
    <h3>
        Class Setting/Shift
    </h3>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
    <form id="dataForm" method="POST" action="{{ route('add.class.wise.shift',$school_code) }}">
        @csrf
        <div class="flex my-10 ">
            <div class="mr-5">
                <label for="session" class="block mb-2 text-sm font-medium text-gray-900 ">Class Name :</label>
            </div>
            <div class="mr-5">
                <select id="class_name" name="class_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " onchange="saveSelectedValue()">
                    @if($selectedClassName=== null)
                    <option disabled selected>Choose a class</option>
                    @elseif($selectedClassName )
                    <option disabled selected>{{$selectedClassName}}</option>
                    @endif

                    @foreach($classData as $data)
                    <option value="{{ $data->class_name }}">{{ $data->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="hidden">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">School Code 
                </label>
                <input type="text" value="{{$school_code}}" name="school_code" id="last_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Enter The Police Station Name" />
            </div>
            <div>
                <button type="button" onclick="getData()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">GET DATA</button>
            </div>

        </div>
        <div>
            <div class="grid gap-6 mb-6 py-5 md:grid-cols-3 items-center ps-4 border border-gray-200 rounded  mx-20">
                @foreach($shiftData as $data)
                <div>
                    <input id="shift_{{ $data->shift_name }}" type="checkbox" value="{{ $data->shift_name }}" name="shift_name" class="shift-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 ">
                    <label for="shift_{{ $data->shift_name }}" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">{{ $data->shift_name }}</label>
                </div>
                @endforeach
            </div>
        </div>

    </form>

    <script>
        // Function to save the selected value in local storage
        function saveSelectedValue() {
            var selectedClass = document.getElementById('class_name').value;
            console.log('data', selectedClass)
            localStorage.setItem('selectedClass', selectedClass);
        }

        // Function to submit the form
        function getData() {
            var selectedClass = document.getElementById('class_name').value;

            // Fetching the route URL based on its name
            var routeUrl = "{{ route('add.class.wise.shift',$school_code) }}";

            // Create a form element
            var form = document.createElement('form');
            form.setAttribute('method', 'GET');
            form.setAttribute('action', routeUrl);

            // Create an input element to hold the selected class name
            var input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'class_name');
            input.setAttribute('value', selectedClass);

            // Append the input element to the form
            form.appendChild(input);

            // Append the form to the document body and submit it
            document.body.appendChild(form);
            form.submit();
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.shift-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('click', function() {
                    document.getElementById('dataForm').submit();
                });
            });
        });
    </script>

    <div class="flex justify-center text-lg font-bold">
        <h3>
            Class Wise Shift Setting
        </h3>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-black ">
        <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
            <tr>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    SL
                </th>
                <th scope="col" class="px-6 py-3">
                    Class Name
                </th>
                <th scope="col" class="px-6 py-3 bg-blue-500">
                    Shift Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($classWiseShiftData as $key=> $data)
            <tr class=" border-b capitalize text-lg">
                <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
                    {{$key + 1}}
                </th>
                <td class="px-6 py-4">
                    {{$data->class_name}}
                </td>
                <td class="px-6 py-4 ">
                    {{$data->shift_name}}
                </td>
                <td class="px-6 py-4  text-xl flex justify-center">
                    <a class="mr-2 edit-button"><i class="fa fa-edit" style="color:green;"></i></a>
                    <form method="POST" action="{{ url('dashboard/delete_class_wise_shift', $data->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn ">
                            <a href=""><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i></a>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex justify-end mr-32">
    <h3>Total = {{$classWiseShiftData->count()}}</h3>
    </div>
</div>
@endsection