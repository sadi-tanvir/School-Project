@extends('Backend.app')
@section('title')
Exam Progress Report Process
@endsection
@section('Dashboard')
@include('/Message/message')
<div>
    <h1 class="text-4xl font font-bold my-5 mx-5 text-accent">Exam Progress Report Process</h1>
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