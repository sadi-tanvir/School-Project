@extends('Backend.app')
@section('title')
HR/STAFF Report
@endsection
@section('Dashboard')
@include("Shared.ContentHeader", ["title" => "HR/STAFF Report"])

<div class="w-full mx-auto min-h-screen flex flex-col items-center">
    <div id="print-section" class="w-full h-fit bg-white mx-auto py-12">
        <div class="space-y-1">
            <div class="relative shadow-md sm:rounded-lg">
                <table class="w-full text-xs text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-white uppercase bg-blue-600">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3 bg-blue-500">
                                SL
                            </th>
                            <th scope="col" class="px-6 py-3 bg-blue-500">
                                Index
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 bg-blue-500">
                                Mobile
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 bg-blue-500">
                                Designation
                            </th>
                            <th scope="col" class="px-6 py-3 bg-blue-500">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 bg-blue-500">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($staffs)
                            @foreach ($staffs as $key => $staff)
                                <tr class="odd:bg-white even:bg-gray-50 text-center">
                                    <td class="px-6 py-4">
                                        {{$key + 1}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$staff->index ?? "N/A"}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $staff->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $staff->mobile ?? "N/A" }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $staff->email ?? "N/A" }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $staff->designation ?? "N/A" }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset($staff->image) }}" alt="Sign Image" class="w-[80px] h-[80px] rounded-full" />
                                    </td>
                                    <td class="px-6 py-4 flex justify-center items-center space-x-5">
                                        {{-- Delete Staff --}}
                                        <form method="POST"
                                            action="{{route("staff.delete", ["schoolCode" => $school_code, "id" => $staff->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-1 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>

                                        {{-- Update Staff --}}
                                        <form method="GET"
                                            action="{{route("staff.update.form", ["id" => $staff->id, "schoolCode" => $school_code])}}">
                                            <button type="submit" class="px-4 py-1 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
