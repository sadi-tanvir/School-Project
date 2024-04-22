@extends('Backend.app')
@section('title')
    Add Leave Type
@endsection
<style>
    .shadowStyle {
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        border: 1px solid #888;
        width: 30%;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
@section('Dashboard')
    <div class="py-5">
        <h3 class="text-slate-500 text-center font-bold text-2xl">
            Leave Type
    </div>
    <div class="border p-5 space-y-5 rounded-[10px]">
        <p class="text-xl font-bold">Leave Types</p>
        <div class="">
            <button id="openModalBtn"
                class=" text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 h-10">Add
                Leave Type
            </button>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="flex justify-between p-3 bg-purple-50 w-full">
                        <p class="text-xl font-bold">NEW LEAVE TYPE ENTRY FORM</p>
                        <span class="close text-3xl">&times;</span>
                    </div>
                    <div class="p-3">
                        <form class="space-y-3" action="">
                            <div class="grid grid-cols-3 gap-5">
                                <label for="leave_type"
                                    class="block mb-2 text-sm font-medium whitespace-noWrap text-right">Leave Type
                                    Name :</label>
                                <input id="leave_type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 col-span-2 "
                                    type="text" placeholder="Enter Leave Type">
                            </div>
                            <div class="grid grid-cols-3  gap-5">
                                <label for="short_code"
                                    class="block mb-2 text-sm font-medium whitespace-noWrap text-right">Short Code
                                    :</label>
                                <input id="short_code"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 col-span-2"
                                    type="text" placeholder="Enter Leave Type">
                            </div>
                            <div class="grid grid-cols-3  gap-5">
                                <label for="total_days"
                                    class="block mb-2 text-sm font-medium whitespace-noWrap text-right">Total Days
                                    :</label>
                                <input id="total_days"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 col-span-2"
                                    type="text" placeholder="Enter Leave Type">
                            </div>
                            <div class="grid grid-cols-3  gap-5">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium whitespace-noWrap text-right">Status
                                    :</label>
                                <select id="status" name="period"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 col-span-2">
                                    <option disabled selected>Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">In-Active</option>
                                </select>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class=" text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 h-10">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- table --}}
        <table class="w-full text-sm text-left rtl:text-right text-black">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 d">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        SL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Short Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Days
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- table data --}}
            </tbody>
        </table>
    </div>
    </div>



{{-- modal Function --}}
    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("openModalBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
