@extends('Backend.app')
@section('title')
Fees Setup
@endsection


@section('Dashboard')


<style>
    /* table radius  */
    thead th:first-child {
        border-top-left-radius: 0.4rem;
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

@include('Shared.ContentHeader', ['title' => 'Fees Setup'])

@include('Shared.alert')

<div class="text-center mb-10">
    <div class="text-xs font-semibold   py-2.5 px-6 rounded-md flex items-center justify-center flex-shrink gap-3">
        <span>
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z"
                        fill="#000000"></path>
                </g>
            </svg>
        </span>
        <span>
            Before searching for data here, ensure that you have added data from <span class="text-red-700 ">Fees
                Setting/Add Fee Type</span>
        </span>
    </div>
</div>

<div class="w-full border-2 rounded-md mx-auto p-6 space-y-10 border-gray-300 bg-gray-200">
    <form action="{{ route('feesSetup.FeeTypesData.view', $school_code) }}" method="post">
        @csrf
        <div class="grid grid-cols-4 items-center gap-6">
            <div class="">
                <label for="class_to" class="block mb-2 text-sm font-medium text-gray-900 ">Class
                    To</label>
                <select id="class_to" name="class_to"
                    class="bg-white py-3.5 px-2 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 ">
                    <option selected>Select</option>
                    @foreach ($classes as $class)
                    <option {{ $class->class_name === $classTo ? "selected" : ""}} value="{{ $class->class_name }}">{{
                        $class->class_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="">
                <label for="class_from" class="block mb-2 text-sm font-medium text-gray-900 ">Class From
                    :
                </label>
                <select id="class_from" name="class_from"
                    class="bg-white py-3.5 px-2 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 ">
                    <option selected>Select</option>
                    @foreach ($classes as $class)
                    <option {{ $class->class_name === $classFrom ? "selected" : ""}} value="{{ $class->class_name }}">{{
                        $class->class_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="">
                <label for="group" class="block mb-2 text-sm font-medium text-gray-900 ">Group
                    :</label>
                <select id="group" name="group"
                    class="bg-white py-3.5 px-2 border-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 ">
                    @foreach ($groups as $group)
                    @php
                    $selected;
                    if(isset($groupName)){
                    $selected = $groupName;
                    }else {
                    $selected = 'N/A';
                    }
                    @endphp
                    <option {{ $group->group_name == $selected ? "selected" : '' }} value="{{ $group->group_name }}">
                        {{ $group->group_name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit"
                    class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-7 py-3.5 text-center  mt-7">
                    Get Data
                </button>
            </div>
        </div>
    </form>




    <form action="{{ route('add_fees_setup', $school_code) }}" method="post">
        @csrf


        <div class="space-y-1">
            <div class="text-center rounded-lg">
                <h1 class="py-2.5 text-lg">Class wise fees setup </h1>
            </div>
            <div class="">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-sm text-white  bg-blue-600 ">
                            <tr class="grid grid-cols-3">
                                <th scope="col" class="px-6 py-3 bg-blue-500 text-center">
                                    Sl
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Type Name
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500 text-center">
                                    Amount
                                </th>
                            </tr>
                        </thead>
                        <tbody class="py-5">
                            @if ($fessTypes)
                            @foreach ($fessTypes as $key => $data)
                            <tr class="border-b grid grid-cols-3">
                                <th scope="row"
                                    class="px-3 py-1.5 font-medium text-gray-900 whitespace-nowrap text-center">
                                    {{ $key + 1 }}
                                </th>
                                <td class="px-6 py-1.5  text-center">
                                    <input name="fee_type[{{ $data->fee_type_name }}]"
                                        value="{{ $data->fee_type_name }}" class="hidden" type="text" name="" id="">
                                    {{ $data->fee_type_name }}
                                </td>
                                <td class="px-6 py-1.5  text-center">
                                    <input class="rounded-md border-0 bg-white" name="fee_amount[]"
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
                <div class="w-full flex justify-end items-center gap-10 mt-10">
                    <button type="submit"
                        class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-20 py-3.5 text-center">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
