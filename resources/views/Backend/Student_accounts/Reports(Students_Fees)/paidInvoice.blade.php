@extends('Backend.app')
@section('title')
    Paid Invoice
@endsection
@section('Dashboard')
@include('/Message/message')
<style>
    .shadowStyle {
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }
</style>

@include('Shared.ContentHeader', ['title' => 'Paid Invoice'])

<div class="mt-10 p-5 shadowStyle rounded-[8px] border border-slate-300 w-2/5 mx-auto space-y-3">
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="voucher-id-tab"
                    data-tabs-target="#voucherId" type="button" role="tab" aria-controls="voucherId"
                    aria-selected="false">Voucher ID</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="collect-date-tab" data-tabs-target="#collectDate" type="button" role="tab"
                    aria-controls="collectDate" aria-selected="false">Collect Date</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="student-id-tab" data-tabs-target="#studentId" type="button" role="tab"
                    aria-controls="studentId" aria-selected="false">Student Id</button>
            </li>
            <li class="me-2" role="presentation">
                <div class="inline-block p-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300">
                    <select id="print_page" name="print_page"
                        class="bg-gray-50  text-gray-500 text-sm rounded-lg  block w-32 p-2 text-center border-gray-200">
                        <option disabled selected>Select</option>
                        <option {{ $schoolInfo->number_of_print_page == 1 ? 'selected' : '' }}
                            value="1">
                            One Page</option>
                        <option {{ $schoolInfo->number_of_print_page == 2 ? 'selected' : '' }}
                            value="2">
                            Two Page</option>
                        <option {{ $schoolInfo->number_of_print_page == 3 ? 'selected' : '' }}
                            value="3">
                            Three Page</option>
                    </select>
                </div>
            </li>
        </ul>
    </div>
    <div id="default-tab-content">
        {{-- voucher id --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="voucherId" role="tabpanel"
            aria-labelledby="voucher-id-tab">
            <form action="{{route('printPaidInvoice.voucherId', $school_code)}}" method="GET" class="space-y-5">
                <input name="voucher_id" type="text" placeholder="#V66769AA8D6ADC"
                    class="col-span-3 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <div class="w-full flex justify-center">
                    <button type="submit"
                        class="w-1/3 text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">Print</button>
                </div>
            </form>
        </div>

        {{-- collect date --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="collectDate" role="tabpanel"
            aria-labelledby="date-tab">
            <form action="{{route('printPaidInvoice.collectDate', $school_code)}}" method="GET" class="space-y-5">
                <div>
                    <label for="date_from" class="text-sm font-medium text-gray-700">Date From</label>
                    <input name="date_from" id="date_from" type="date"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-3.5 w-full"
                    value="<?php echo date('Y-m-d'); ?>" />
                </div>

                <div>
                    <label for="date_to" class="text-sm font-medium text-gray-700">Date To</label>
                    <input name="date_to" id="date_to" type="date"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-3.5 w-full"
                    value="<?php echo date('Y-m-d'); ?>" />
                </div>

                <div class="w-full flex justify-center">
                    <button type="submit"
                        class="w-1/3 text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">Print</button>
                </div>
            </form>
        </div>

        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="studentId" role="tabpanel"
            aria-labelledby="student-id-tab">
            <form action="{{route('printPaidInvoice.studentId', $school_code)}}" method="GET" class="space-y-5">
                <input name="student_id" type="text" placeholder="Student Id"
                    class="col-span-3 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <div class="w-full flex justify-center">
                    <button type="submit"
                        class="w-1/3 text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">Print</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var schoolCode = @json($school_code);
         // update print page
         const print_page = document.getElementById('print_page');
        print_page.addEventListener('change', async (event) => {
            const printPage = event.target.value;
            const res = await fetch(
                `/dashboard/studentAccounts/paySlipCollection/updatePrintPage/${schoolCode}?printPage=${printPage}`
            )
            if (!res.ok) throw new Error('Network response was not ok');
            const data = await res.json();
        })
    });
</script>
