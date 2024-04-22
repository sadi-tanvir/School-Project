@extends('Backend.app')
@section('title')
Academic Transcript
@endsection
@section('Dashboard')
@include('/Message/message')
<div>
    <h1 class="text-4xl font font-bold my-5 mx-5 text-accent">Academic Transcript</h1>
</div>





<div class=" mb-3 card">
    <div class="card-body min-h-500 border border-primary w-4/6 mx-auto">
        <div class="w-4/6 mx-auto">
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
                <label for="class" class="text-gray-700 text-xl">YEAR:</label>
                <select class="select select-primary text-md w-full max-w-xs ">
                    <option value="2023">2023</option>
                    <option value="2024" selected="">2024</option>
                    <option value="2025">2025</option>

                </select>
            </div>
            <div class="row form-group">
                <div class="offset-md-8 col-md-2" style="">
                    <button style="width: 100%;" class="btn text-2xl btn-primary" id="feesCollectSaved">Print</button>
                </div>
            </div>



        </div>
    </div>
</div>




@endsection