@extends('Backend.app')
@section('title')
    Others Fee Collection
@endsection
@section('Dashboard')
<style>
        .shadowStyle {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }
    </style>
    <div>
        <h3>
            Others Fee Collection
        </h3>
    </div>
    <div class="shadowStyle rounded-[8px] border border-slate-300 m-5">
    <div class="grid grid-cols-5 gap-6 mx-10 mt-10 ">
        <div class="col-span-2 border-r-2 border-gray">
            <div class="grid md:grid-cols-3  mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900 ">Class :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="class"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose Class</option>
                        <option>x</option>
                        <option>y</option>
                        <option>z</option>
                    </select>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900 ">Student ID :
                    </label>
                </div>
                <div class="">
                    <select id="countries" name="id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Select</option>
                        <option>x</option>
                        <option>y</option>
                        <option>z</option>
                    </select>
                </div>
            </div>
            <div class="text-center m-5">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Load
                    Data</button>
            </div>

            <div class="mr-10">
            <table class="w-full  rtl:text-right text-black ">
                <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            SL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Month
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            PaySlip
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Amount
                        </th>

                    </tr>
                </thead>
                <tbody>

                    <tr class=" border-b border-blue-400">
                        <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">

                        </th>
                        <td class="px-6 py-4">

                        </td>
                        <td class="px-6 py-4">

                        </td>
                        <td class="px-6 py-4">

                        </td>

                    </tr>




                </tbody>
            </table>
        </div>
        <div class="mt-20 text-center">
            <h3>
               Total= <input type="text"></input>
            </h3>
        </div>
        </div>
        

        <div class="col-span-3 ">
            <div class="grid grid-cols-2">
                <div>

                </div>
                <div>
                <div class="grid grid-cols-2 ">
                <div class="grid md:grid-cols-3 mb-5">
                    
                    <div class="col-span-2">
                        <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900 ">S.ID :
                        </label>
                    </div>
                    <div class="">
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                </div>
                <div class="grid md:grid-cols-3 mb-5 ml-5">
                    <div class=" ">
                        <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900 ">Roll :
                        </label>
                    </div>
                    <div class="col-span-2">
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900 ">Name :
                    </label>
                </div>
                <div class="col-span-2">
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900 ">Class :
                    </label>
                </div>
                <div class="col-span-2">
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
            </div>
            <div class="grid md:grid-cols-3 mb-5">
                <div class=" ">
                    <label for="last_name" class="block mb-2 text-lg font-medium text-gray-900 ">Month :
                    </label>
                </div>
                <div class="col-span-2">
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
            </div>
                </div>

            </div>

            <div class="md:ml-20">

            <table class="w-full   rtl:text-right text-black ">
                <thead class="text-xs text-white uppercase bg-orange-500 border-b border-orange-500 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-orange-500">
                            SL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            HEAD NAME
                        </th>
                        <th scope="col" class="px-6 py-3 bg-orange-500">
                            Charged Amount
                        </th>

                    </tr>
                </thead>
                <tbody>

                    <tr class=" border-b border-orange-400">
                        <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">

                        </th>
                        <td class="px-6 py-4">

                        </td>
                        <td class="px-6 py-4">

                        </td>


                    </tr>



                </tbody>
            </table>
        </div>

        <div class="text-end mt-20">
        <h3>
            
Charged Amount: <input type="text"></input>
        </h3>
        <h3 class="mt-5 mb-5">
        Charged By: <input type="text"></input>
        </h3>
        <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  w-full sm:w-auto px-10 py-2.5 text-center ">Save
                    </button>
        </div>
        </div>
    </div>
    </div>
    
@endsection



