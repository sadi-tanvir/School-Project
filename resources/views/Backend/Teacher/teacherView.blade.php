@extends('Backend.app')
@section('title')
View Teacher
@endsection
@section('Dashboard')
@include('/Message/message')

<div class="mx-20 my-10">
    <h1 class="text-center text-2xl text-accent">Teacher Information</h1>
<div class="border my-5 mx-5">
    <div class="flex justify-center py-2">
        <img src="{{ asset('assets/images/' . $teacher->image) }}" alt="teacher Image" class="w-[300px]"/>
    </div>
    <div class="flex justify-around">
      <div>
        <h3 class="text-2xl mt-5 ml-5 text-accent">Personal Info: </h3>
        <h3 class="text-lg mt-5 ml-5">Name: {{$teacher->firstname}} {{$teacher->lastname}} </h3>
        <h3 class="text-lg mt-5 ml-5">Id: {{$teacher->teacher_id}}</h3>
        <h3 class="text-lg mt-5 ml-5">Designation: {{$teacher->designation}}</h3>
        <h3 class="text-lg mt-5 ml-5">Section: {{$teacher->section}}</h3>
        <h3 class="text-lg mt-5 ml-5">Birthdate: {{$teacher->birth_date}}</h3>
        <h3 class="text-lg mt-5 ml-5">Gender: {{$teacher->gender}}</h3>
      </div>
      <div>
        <h3 class="text-2xl mt-5 ml-5 text-accent">Contact Info: </h3>
        <h3 class="text-lg mt-5 ml-5">Gmail: {{$teacher->email}}</h3>
        <h3 class="text-lg mt-5 ml-5">Mobile No: {{$teacher->mobile}}</h3>
        <h3 class="text-lg mt-5 ml-5">NID: {{$teacher->nid}}</h3>
      </div>
    </div>
    <div class="flex justify-around">
      <div>

          <h3 class="text-2xl mt-5 ml-5 text-accent">Permanent Address: </h3>
          <h3 class="text-lg mt-5 ml-5">Street: {{$teacher->parmanent_address}}</h3>
          <h3 class="text-lg mt-5 ml-5">City: {{$teacher->parmanent_city}}</h3>
          <h3 class="text-lg mt-5 ml-5">State: {{$teacher->parmanent_state}}</h3>
          <h3 class="text-lg mt-5 ml-5">Country: {{$teacher->parmanent_country}}</h3>
          <h3 class="text-lg mt-5 ml-5">Zip Code: {{$teacher->parmanent_address}}</h3>
      </div>
      <div>

          <h3 class="text-2xl mt-5 ml-5 text-accent">Present Address: </h3>
          <h3 class="text-lg mt-5 ml-5">Street: {{$teacher->present_address}}</h3>
          <h3 class="text-lg mt-5 ml-5">City: {{$teacher->present_city}}</h3>
          <h3 class="text-lg mt-5 ml-5">State: {{$teacher->present_state}}</h3>
          <h3 class="text-lg mt-5 ml-5">Country: {{$teacher->present_country}}</h3>
          <h3 class="text-lg mt-5 ml-5">Zip Code: {{$teacher->present_zip_code}}</h3>
      </div>
    </div>
  
  {{-- <h3 class="text-lg mt-5 ml-5">Password: </h3> --}}
</div>
</div>

@endsection