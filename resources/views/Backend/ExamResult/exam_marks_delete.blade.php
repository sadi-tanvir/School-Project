@extends('Backend.app')
@section('title')
Exam Marks Delete
@endsection
@section('Dashboard')
@include('/Message/message')
<div>
    <h1 class="text-4xl font font-bold my-5 mx-5 text-accent">Exam Marks Delete</h1>
</div>



<div>
    <div class=" mb-10">
        <div class="card-body p-2">
            <div class="grid grid-cols-7 gap-4">
                <!-- Class Name -->
                <div class="col-span-1">
                    <div class="">
                        <label for="class" class="text-gray-700">Class Name:</label>
                        <input type="hidden" name="classExcelLoad" id="classExcelLoad" value="">
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
                    </div>
                </div>
                <!-- Group -->
                <div class="col-span-1">
                    <div class="">
                        <label for="class" class="text-gray-700">Group Name: </label>
                        <input type="hidden" name="classExcelLoad" id="classExcelLoad" value="">

                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

                            <option disabled selected value="">Select</option>
                            <option value="1">Bangla Version</option>
                            <option value="2">English Version</option>
                            <option value="3">Science</option>
                            <option value="4">Business Study</option>
                            <option value="5">N/A</option>
                        </select>
                    </div>
                </div>
                <!-- Section -->
                <div class="col-span-1">
                    <div class="">
                        <label for="class" class="text-gray-700">Section:</label>
                        <input type="hidden" name="classExcelLoad" id="classExcelLoad" value="">

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
                            <option value="14"> Day Crimson</option>
                            <option value="15">Morning Crimson</option>
                        </select>
                    </div>
                </div>
                <!-- Subject -->
                <div class="col-span-1">
                    <div class="">
                        <label for="class" class="text-gray-700">Subject Name:</label>
                        <input type="hidden" name="classExcelLoad" id="classExcelLoad" value="">

                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

                            <option disabled selected value="">Select</option>

                        </select>
                    </div>
                </div>

                <!-- Exam -->
                <div class="col-span-1">
                    <div class="">
                        <label for="class" class="text-gray-700">Exam Name:</label>
                        <input type="hidden" name="classExcelLoad" id="classExcelLoad" value="">

                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

                            <option disabled selected value="">Select</option>
                            <option value="1">1st Semester </option>
                            <option value="2">2nd Semester </option>
                            <option value="3">3rd Semester</option>
                            <option value="4">1st Midterm</option>
                            <option value="5">2nd Midterm</option>
                            <option value="6">3rd Midterm</option>

                        </select>
                    </div>
                </div>
                <!-- Year -->
                <div class="col-span-1">
                    <div class="">
                        <label for="class" class="text-gray-700">Year:</label>
                        <input type="hidden" name="classExcelLoad" id="classExcelLoad" value="">

                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">

                            <option disabled selected value="">Select</option>
                            <option value="2023">2023</option>
                            <option value="2024" selected>2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>
                </div>




                <div class="col-span-1">
                    <div class="">
                        <button class="btn btn-primary mt-5" onclick="exam_marks_input_search()">Find</button>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>


<div>
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between ">
        <form onsubmit="return confirmdelete()" action="https://digiedubd.com/151/exam/Exam_Process/exam_marks_delete_process" id="form1" role="form" name="allVoucherEntryForm" method="post" enctype="multipart/form-data" style="width: 100%;">

            <table id="table" class="table bg-gray-200 w-full mb-0">
                <thead class="theight">
                    <tr id="maintr" class="bg-lightgrey">
                        <th class="text-center w-1/12" style="padding-top:5px;"><input type="checkbox" id="select_all_ck" class="form-control h-5 w-auto mx-auto"></th>
                        <th class="text-center w-1/12">SL</th>
                        <th class="text-center w-2/12">Student Name</th>
                        <th class="text-center w-3/12">Student ID</th>
                        <th class="text-center w-2/12">Class</th>
                        <th class="text-center w-1/12">Roll</th>
                        <th class="text-center w-2/12">Subject</th>
                        <th class="text-center w-2/12">Full Mark</th>
                        <th class="text-center w-2/12">T. Marks</th>
                    </tr>
                </thead>

                <tbody id="voucher_container" class="theight">

                </tbody>
            </table>
            <div class="flex justify-end">
                <label class="w-10/12 text-right" style="padding: 0;" for="item_name">Total Student = </label>
                <div class="w-2/12 text-left" style="padding: 0 0 10px 0;">
                    <input type="text" name="total_items" id="total_items" class="bg-red-200 w-full text-left" readonly="readonly">
                </div>
            </div>
            <div class="flex justify-center mt-4">
                <div class="sm:w-9/12 sm:offset-w-1">
                    <div class="flex flex-row items-start justify-between">
                        <div class="sm:w-6/12"> </div>
                        <div class="sm:w-3/12">
                            <input class="btn bg-red-400 text-white text-xl w-full" type="submit" value="Delete">
                        </div>
                        <div class="sm:w-3/12"> </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


</div>


@endsection