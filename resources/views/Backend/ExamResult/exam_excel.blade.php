@extends('Backend.app')
@section('title')
Excel Import Student Exam data
@endsection
@section('Dashboard')

<!-- Message -->
@include('/Message/message')


<div>
    <h1 class="">Excel Import Student Exam data</h1>
</div>


<div class=" md:mt-20 mb-3 card">
    <div class="card-body min-h-500 border border-primary w-4/6 mx-auto p-5">
        <div class="grid grid-cols-3 gap-10 w-5/6 mx-auto">
            <div class="mr-5">

                <select id="class_name" name="class_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">

                    <option disabled selected>Choose a class</option>
                    
                </select>
            </div>
            <!-- <div>

                <label for="class" class="text-gray-700 text-xl">Class:</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

                    <option disabled selected value="">Select</option>
                    <option value="1">Play</option>
                    <option value="2">Nursery</option>
                    <option value="3">KG</option>
                    <option value="4">One</option>
                    <option value="5">Two</option>
                    <option value="6">Three</option>
                    <option value="7">Four</option>
                    <option value="8">Five</option>
                    <option value="9">Six</option>
                    <option value="10">Seven</option>
                    <option value="11">Eight</option>
                    <option value="12">Nine</option>
                    <option value="13">Ten</option>
                    <option value="14">all inactive</option>
                    <option value="15">Pre Play</option>
                </select>
            </div> -->

            <div>

                <label for="class" class="text-gray-700 text-xl">Group:</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

                    <option disabled selected value="">Select</option>
                    <option value="1">Bangla Version</option>
                    <option value="2">English Version</option>
                    <option value="3">Science</option>
                    <option value="4">Business Study</option>
                    <option value="5">N/A</option>

                </select>
            </div>
            <div>

                <label for="class" class="text-gray-700 text-xl">Section:</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

                    <option disabled selected value="">Select</option>
                    <option value="1">N/A</option>
                    <option value="2">Morning</option>
                    <option value="3">Day</option>
                    <option value="4">Lotus Play Mor</option>
                    <option value="5">Lotus Play Day</option>
                    <option value="6">Rose Play Day</option>
                    <option value="7">Rose Play Mor</option>
                    <option value="8">Maloti Mor Nur</option>
                    <option value="9">Sunflower Day Nur</option>
                    <option value="10">Lily KG Mor</option>
                    <option value="11">Bela Day KG</option>
                    <option value="12">Bokul One</option>
                    <option value="13">Day Daffodil</option>
                    <option value="14">Day Crimson</option>
                    <option value="15">Morning Crimson</option>

                </select>
            </div>
            <div>

                <label for="class" class="text-gray-700 text-xl">YEAR:</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

                    <option value="2023">2023</option>
                    <option value="2024" selected="">2024</option>
                    <option value="2025">2025</option>

                </select>
            </div>



            <div>

                <label for="class" class="text-gray-700 text-xl">Subject:</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

                    <option disabled selected value="">Select</option>


                </select>
            </div>
            <div>

                <label for="class" class="text-gray-700 text-xl">Exam:</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

                    <option disabled selected value="">Select</option>


                </select>
            </div>
            <div>
                <label for="class" class="text-gray-700 font-bold">Excel File: <span class="text-red-500">*</span></label>
                <input type="file" class="file-input border-2 file-input-primary w-full max-w-xs" />
            </div>


            <div>
                <button type="submit" name="submit" style="width: 100%;" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Submit</button>
            </div>




        </div>
        <div class="flex justify-end">
           <div>
            <button type="submit" name="submit" style="width: 100%;" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  ">Submit</button>
           </div>
        </div>
    </div>
</div>





@endsection