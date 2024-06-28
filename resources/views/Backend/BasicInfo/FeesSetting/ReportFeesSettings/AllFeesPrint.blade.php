@extends('Backend.app')
@section('title')
All Fees Print
@endsection


@section('Dashboard')

@include('Shared.ContentHeader', ['title' => 'All Fees Print'])

{{-- alert message --}}
@include('Shared.alert')

<div class="w-full space-y-10">
    <div class="space-y-1">
        <div class="">
            <div class="relative overflow-x-auto sm:rounded-lg">
                <div class="relative overflow-x-auto border-2 border-blue-600 sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-white uppercase bg-blue-600">
                            <tr class="text-center">
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    CLASS
                                </th>
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    Fee Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fee Amount
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($feesData)
                            @foreach ($feesData as $feeData)
                            <tr class="odd:bg-white even:bg-gray-50 text-center">
                                <td class="px-6 py-4">
                                    1
                                </td>
                                <td class="px-6 py-4">
                                    {{ $class }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $feeData->fee_type }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $feeData->fee_amount }}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            <tr class="odd:bg-white even:bg-gray-50 border-b text-center">
                                <td scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                                </td>
                                <td scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                                </td>
                                <td class="px-6 py-4 text-end font-bold  text-lg">

                                </td>
                                <td class=" py-4 font-bold text-lg">
                                    Total <span class="mx-5">=</span>
                                    {{$totalAmount}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
