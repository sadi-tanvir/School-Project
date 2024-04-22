@extends('Backend.app')
@section('title')
    Progress Report
@endsection
@section('Dashboard')
    @include('/Message/message')
    <style>
        .shadowStyle {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }
    </style>

    <div>
        <h1 class="text-2xl font-bold my-5 mx-5 text-center">Progress Report</h1>
    </div>
    <div class=" mb-3">
        <form action="" class="p-5 shadowStyle rounded-[8px] border border-slate-300 w-2/5 mx-auto space-y-3">
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class
                    :</label>
                <select id="class" name="class"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select Class</option>
                    <option value="">Active</option>
                    <option value="">In-Active</option>
                </select>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="group" class="block mb-2 text-sm font-medium whitespace-noWrap ">Group
                    :</label>
                <select id="group" name="group"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select Group</option>
                    <option value="">Active</option>
                    <option value="">In-Active</option>
                </select>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="section" class="block mb-2 text-sm font-medium whitespace-noWrap ">Section
                    :</label>
                <select id="section" name="section"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select section</option>
                    <option value="">Active</option>
                    <option value="">In-Active</option>
                </select>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="roll" class="block mb-2 text-sm font-medium whitespace-noWrap ">Student Roll
                    :</label>
                <input id="roll" placeholder="Enter Student Roll"
                    class="bg-gray-50 placeholder:text-black text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2" type="text">
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="exam_name" class="block mb-2 text-sm font-medium whitespace-noWrap ">Exam Name
                    :</label>
                <select id="exam_name" name="exam_name"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select Exam Name</option>
                    <option value="">Active</option>
                    <option value="">In-Active</option>
                </select>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="merit_status" class="block mb-2 text-sm font-medium whitespace-noWrap ">Merit Status
                    :</label>
                <select id="merit_status" name="merit_status"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select Merit Status</option>
                    <option value="">Active</option>
                    <option value="">In-Active</option>
                </select>
            </div>
            <div class="grid grid-cols-3 place-items-start  gap-5">
                <label for="year" class="block mb-2 text-sm font-medium whitespace-noWrap ">Year
                    :</label>
                <select id="year" name="year"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block w-full p-2.5 col-span-2">
                    <option disabled selected>Select Year</option>
                    <option value="">Active</option>
                    <option value="">In-Active</option>
                </select>
            </div>
            <div class="w-full flex justify-end">
                <button type="submit"
                    class="w-1/3  text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 focus:outline-none">Print
                </button>
            </div>
        </form>
    </div>
@endsection
















{{--   <div class="grid grid-cols-3 place-items-start ">
                <label for="applicaiton_date" class="block mb-2 text-sm font-medium">Applicaiton Date</label>
                <input id="applicaiton_date"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block  p-2.5 w-full col-span-2"
                    type="date">
            </div>
            <div class="grid grid-cols-3 place-items-start ">
                <label for="applicaiton_date" class="block mb-2 text-sm font-medium">Applicaiton Date</label>
                <input id="applicaiton_date"
                    class="bg-gray-50  text-gray-900 text-sm rounded-lg  block p-2.5 w-full col-span-2"
                    type="date">
            </div> --}}

{{--   <div class="w-4/6 mx-auto">
                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 text-xl">CLASS:</label>
                    <select class="select select-primary text-md w-full max-w-xs ">
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

                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 text-xl">GROUP:</label>
                    <select class="select select-primary text-md w-full max-w-xs ">
                        <option disabled selected value="">Select</option>
                        <option value="1">Bangla Version</option>
                        <option value="2">English Version</option>
                        <option value="3">Science</option>
                        <option value="4">Business Study</option>
                        <option value="5">N/A</option>

                    </select>
                </div>
                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 text-xl">SECTION:</label>
                    <select class="select select-primary text-md w-full max-w-xs ">
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

                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 text-xl">STUDENT ROLL:</label>
                    <select class="select select-primary text-md w-full max-w-xs ">
                        <option disabled selected value="">Select</option>
                        <option value="1193">20240006</option>
                        <option value="913">20220645</option>
                        <option value="1264">20240075</option>
                        <option value="1199">20240012</option>
                        <option value="937">20220669</option>
                        <option value="966">20230004</option>
                        <option value="1260">20240071</option>
                        <option value="1257">20240068</option>
                        <option value="1228">20240039</option>
                        <option value="884">20220618</option>
                        <option value="1191">20240004</option>
                        <option value="1187">20230217</option>
                        <option value="961">20220693</option>
                        <option value="912">20220644</option>
                        <option value="1248">20240059</option>
                        <option value="1200">20240013</option>
                        <option value="1223">20240035</option>

                    </select>

                </div>
                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 text-xl">EXAM NAME:</label>
                    <select class="select select-primary text-md w-full max-w-xs ">
                        <option disabled selected value="">Select</option>
                        <option value="1">1st Semester </option>
                        <option value="2">2nd Semester </option>
                        <option value="3">3rd Semester</option>
                        <option value="4">1st Midterm</option>
                        <option value="5">2nd Midterm</option>
                        <option value="6">3rd Midterm</option>

                    </select>
                </div>
                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 text-xl">MERIT STATUS:</label>
                    <select class="select select-primary text-md w-full max-w-xs ">
                        <option disabled selected value="">Select</option>
                        <option value="1">1st Semester</option>
                        <option value="2">2nd Semester</option>
                        <option value="3">3rd Semester</option>
                        <option value="4">1st Midterm</option>
                        <option value="5">2nd Midterm</option>
                        <option value="6">3rd Midterm</option>
                    </select>
                </div>
                <div class="flex justify-between items-center mb-5">
                    <label for="class" class="text-gray-700 text-xl">YEAR:</label>
                    <select class="select select-primary text-md w-full max-w-xs ">
                        <option value="2023">2023</option>
                        <option value="2024" selected="">2024</option>
                        <option value="2025">2025</option>

                    </select>
                </div>
                <div class="row form-group">
                    <div class="offset-md-8 col-md-2" style="">
                        <button style="width: 100%;" class="btn text-2xl btn-primary"
                            id="feesCollectSaved">Print</button>
                    </div>
                </div>
            </div> --}}
