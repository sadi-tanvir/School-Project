@extends('Backend.app')
@section('title')
    Fees Setup
@endsection


@section('Dashboard')
    <div class="mb-5">
        <h1>Fees Setup</h1>
    </div>
    @include('Shared.alert')

    <div class="w-full text-center mb-10">
        <h1 class="text-xl font-semibold">
            Before searching for data here, ensure that you have added data from <span
                class="text-red-300 font-bold bg-red-50 px-1 rounded">Fees Setting/Add Fee Type</span>
        </h1>
    </div>

    <div class="w-full border mx-auto p-5 space-y-10">
        <form action="{{ route('feesSetup.FeeTypesData.view', $school_code) }}" method="post">
            @csrf
            <div class="grid grid-cols-4 items-center gap-16">
                <div class="">
                    <label for="class_to" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CLASS
                        To</label>
                    <select id="class_to" name="class_to"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select</option>
                        @foreach ($classes as $class)
                            <option {{ $class->class_name === $classTo ? "selected" : ""}} value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <label for="class_from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CLASS From
                        :
                    </label>
                    <select id="class_from" name="class_from"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select</option>
                        @foreach ($classes as $class)
                            <option {{ $class->class_name === $classFrom ? "selected" : ""}} value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="">
                    <label for="group" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">GROUP
                        :</label>
                    <select id="group" name="group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($groups as $group)
                            <option {{ $group->group_name == 'N/A' ? 'selected' : '' }} value="{{ $group->group_name }}">
                                {{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase mt-5">
                        get data
                    </button>
                </div>
            </div>
        </form>




        <form action="{{ route('add_fees_setup', $school_code) }}" method="post">
            @csrf


            <div class="space-y-1">
                <div class="bg-blue-200 text-center rounded-lg">
                    <h1 class="py-1">CLASS WISE FEES SETUP </h1>
                </div>
                <div class="">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        SL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        TYPE NAME
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-blue-500">
                                        AMOUNT
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($fessTypes)
                                    @foreach ($fessTypes as $key => $data)
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $key + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                <input name="fee_type[{{ $data->fee_type_name }}]"
                                                    value="{{ $data->fee_type_name }}" class="hidden" type="text"
                                                    name="" id="">
                                                {{ $data->fee_type_name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <input name="fee_amount[]"
                                                    value="{{ isset($existingFeesInfo[$data->fee_type_name]) ? $existingFeesInfo[$data->fee_type_name] : 0 }}"
                                                    type="text" id="">
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>

                    <input name="class_to" class="hidden" type="text" value="{{ $classTo }}">
                    <input name="group" class="hidden" type="text" value="{{ $groupName }}">
                    <input name="school_code" class="hidden" type="text" value="{{ $school_code }}">
                    <div class="w-full flex justify-center items-center gap-10 mt-20">
                        <button type="submit"
                            class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-20 py-2.5 text-center">
                            Save
                        </button>
                        <button type="button"
                            class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-20 py-2.5 text-center">
                            Close
                        </button>
                        <h1>
                            Total =
                            <input readonly type="number" value="" name="student_roll" id="student_roll"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1"
                                placeholder="" />
                        </h1>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
