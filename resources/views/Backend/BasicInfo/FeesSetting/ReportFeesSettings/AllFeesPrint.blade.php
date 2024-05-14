@extends('Backend.app')
@section('title')
    All Fees Print
@endsection


@section('Dashboard')
    <div class="mb-2">
        <h1>All Fees Print</h1>
    </div>

    {{-- alert message --}}
    @include('Shared.alert')

    <div class="w-full border mx-auto p-5 space-y-10">
        <div class="space-y-1">
            <div class="">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="text-center">
                                <th scope="col" class="px-6 py-3 bg-blue-500">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    CLASS
                                </th>
                                @if ($feesData)
                                    @foreach ($feesData as $key => $feeData)
                                        <th scope="col"
                                            class="px-6 py-3 {{ $key % 2 === 0 ? 'bg-blue-500' : '' }} ">
                                            {{ $feeData->fee_type }}
                                        </th>
                                    @endforeach
                                @endif
                                <th scope="col" class="px-6 py-3 ">
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center content-center">
                            <td class="px-6 py-4">
                                1
                            </td>
                            <td class="px-6 py-4">
                                {{ $class }}
                            </td>
                            @if ($feesData)
                                @foreach ($feesData as $feeData)
                                    <td class="px-6 py-4">
                                        <input class="py-0 border-0 text-center" type="number" name="amount_{{ $feeData->fee_amount }}"
                                            value="{{ $feeData->fee_amount }}">
                                    </td>
                                @endforeach
                            @endif
                            <td class="px-6 py-4">
                                <input readonly class="py-0 border-0 text-center" type="number" value="{{ $totalAmount }}"
                                    name="total_amount">
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
