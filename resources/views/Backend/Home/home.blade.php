@extends('Backend.app')
@section('title')
Home
@endsection
@section('Dashboard')
@include('/Message/message')

<div class="m-10">
    <div class="grid grid-cols-2 gap-5 mb-10">
        <div class="col-span-1 p-5 border-2 border-blue-300 border-round-2 rounded-md shadow-2xl text-center">
        <h3 class="text-3xl font-bold">{{$school_info->school_name}}</h3>
                        <p class="text-sm">{{$school_info->address}} <br>

                            Contact No: {{$school_info->mobile_number}}<br>

                            Email: {{$school_info->school_email}}<br>

                            Website: {{$school_info->website}}<br>
                           <div class="flex justify-center"> <img id="background-image" src="{{asset($school_info->logo)}}" alt="" class="h-40" /></div>
        </div>
        <div class="col-span-1 p-5 border-2 border-blue-300 rounded-md shadow-2xl text-center text-2xl">
        @if($schoolAdminData)
        <p>{{ $schoolAdminData->name}}</p>
        <p>{{$schoolAdminData->mobile_number}}</p>
        <div class="flex justify-center ">
        <div class="p-2 bg-gray-200 h-36 w-32 mt-5">
             <img class="h-32 rounded-full object-cover" src="{{ asset($schoolAdminData->image) }}" alt="school amdin photo">
            </div>
        </div>

        @elseif($studentData)
        <p>{{ $studentData->name}}</p>
        <p>{{$studentData->mobile_no}}</p>
        <div class="flex justify-center ">
            <div class="p-2 bg-gray-200 h-36 w-32 mt-5">
            <img class="w-8 h-8 rounded-full object-cover" src="{{ asset($studentData->image) }}" alt="student photo">
        </div>
        </div>

        @elseif($adminData)
        <p> {{ $adminData->first_name}} {{ $adminData->last_name}}</p>
        <p>{{$adminData->phone_number}}</p>
        <div class="flex justify-center ">
            <div class="p-2 bg-gray-200 h-36 w-32 mt-5">
                <img class="h-32 rounded-full object-cover" src="{{ asset($adminData->image) }}" alt="amdin photo">
            </div>
         
        </div>
        @elseif($studentData)
        @endif
        </div>
     
    </div>
    <div class="grid grid-cols-3 gap-5 mb-10">
        <div class="col-span-1 p-5 border-2 border-gray-800 border-round-2 rounded-md shadow-2xl hover:bg-gray-800 transition transform hover:-translate-y-1 bg-gray-800">
            <h1 class="text-2xl font-bold text-white text-center pb-2"><u> NEDUBD Module</u></h1>
            <h1 class="text-xl text-white text-center">Total Module :</h1>
            <h1></h1>
        </div>
        <div class="col-span-1 p-5 border-2 border-yellow-200 border-round-2 rounded-md shadow-2xl hover:bg-yellow-200 transition transform hover:-translate-y-1 bg-yellow-200">
        <h1 class="text-2xl font-bold  text-center pb-2"><u> Active Module</u></h1>
            <h1 class="text-xl text-center">Total Module :</h1>
            <h1></h1>
        </div>
        <div class="col-span-1 p-5 border-2 border-gray-800 border-round-2 rounded-md shadow-2xl hover:bg-gray-800 transition transform hover:-translate-y-1 bg-gray-800">
        <h1 class="text-2xl font-bold text-white text-center pb-2"><u> Use Module</u></h1>
            <h1 class="text-xl text-white text-center">Total Module :</h1>
            <h1></h1>
        </div>
    </div>
    
    <div class="grid grid-cols-2 gap-5 mb-10 h-48">
        <div class="col-span-1 p-5 border-2 border-blue-300 border-round-2 rounded-md shadow-2xl">
            <div class="flex justify-center text-2xl">
            <h1>Principal Speech
            </h1>
            </div>
           
           <h2 class="text-center text-2xl">
                " "
            </h2>
          
            
        </div>
        <div class="col-span-1 p-5 border-2 border-blue-300 rounded-md shadow-2xl">
        <div class="flex justify-center text-2xl">
            <h1>Vice-Principal Speech
            </h1>
            </div>
           
           <h2 class="text-center text-2xl">
                " "
            </h2>
          
            
        </div>
    </div>
       
    
    <div class="grid grid-cols-3 gap-5 mb-10 h-52">
        <div class="col-span-1 p-5 border-2 border-blue-300 border-round-2 rounded-md shadow-2xl hover:bg-sky-700">
        <div class="">
        <div class="flex justify-center pb-2"><i class="far fa-question-circle fa-2x"></i></div>
        <h1 class="text-2xl font-bold flex justify-center "><u>Support</u></h1>
        </div>
        <div class="flex justify-center text-xl pt-5">

            <h1>
                Support Time:
            </h1>
        </div>
        <div class="flex justify-center font-bold text-xl text-rose-700">
            <h1>
                9.00 AM - 6.00 PM
            </h1>
        </div>
        </div>

        <div class="col-span-1 p-5  border-2 border-blue-300 rounded-md shadow-2xl hover:bg-sky-700">
        <div class="">
        <div class="flex justify-center">
        <i class="fas fa-phone-volume fa-2x pb-2"></i>
         </div>
         <h1 class="text-2xl font-bold flex justify-center "><u>Contact</u></h1>
        </div>
        <div class="flex justify-center text-xl pt-5">

        <h1>
            Support Contact:
        </h1>
        </div>
        <div class="flex justify-center font-bold text-lg text-rose-700">
            <h1>
                01745665982
            </h1>
        </div>
        </div>

        <div class="col-span-1 p-5 border-2 border-blue-300 border-round-2 rounded-md shadow-2xl hover:bg-sky-700">
        <div class="">
        <div class="flex justify-center pb-2"><i class="far fa-question-circle fa-2x"></i></div>
        <h1 class="text-2xl font-bold flex justify-center "><u>Support</u></h1>
        </div>
        <div class="flex justify-center text-xl pt-5">

        <h1>
            Support Day:
        </h1>
        </div>
        <div class="flex justify-center text-xl text-rose-700 font-bold ">
            <h1>
                Saturday - thursday
            </h1>
        </div>
        </div>

    </div>

</div>

@endsection