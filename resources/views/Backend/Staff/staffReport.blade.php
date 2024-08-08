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
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    @endsection
