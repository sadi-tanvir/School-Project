@extends('Backend.app')
@section('title')
Transfer to Account
@endsection
@section('Dashboard')
    @include('/Message/message')
    <style>
        .shadowStyle {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }
    </style>

    <div>
        <h1 class="">Transfer to Account</h1>
    </div>
    <div class=" mt-10">
        <form action="" class="p-5 shadowStyle rounded-[8px] border border-slate-300 w-2/5 mx-auto space-y-3">
          
            <div class="grid grid-cols-4 place-items-start  gap-5">
                <label for="section" class="block mb-2 text-sm font-medium whitespace-noWrap ">Voucher Number :
                    :</label>
               <input type="text" class="col-span-3">
            </div>
           
            <div class="w-full flex justify-end">
                <button type="submit"
                    class="w-1/3  text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">Print
                </button>
            </div>
        </form>
    </div>
@endsection











