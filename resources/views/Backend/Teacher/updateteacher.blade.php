@extends('Backend.app')
@section('title')
Update Teacher
@endsection
@section('Dashboard')
@include('/Message/message')

<div class="mx-10 mt-10">
    <h1 class="text-2xl text-accent">Update Teachers Information</h1>
    <div class="">
        <form action="{{ route('teachers.update', $teachers->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- $teachers information --}}
            <div class="md:flex">
                <div class="mt-5 w-[400px] mr-32">
                    <label>First Name:</label>
                    <span class="text-red-500">*</span>
                    <input type="text" name="firstname" placeholder="Enter The First Name" value="{{$teachers->firstname}}" class="input input-bordered w-full " />
                </div>
                <div class="mt-5 w-[400px]">
                    <label>Last Name:</label>
                    <span class="text-red-500">*</span>
                    <input type="text" name="lastname" placeholder="Enter The Last Name" value="{{$teachers->lastname}}" class="input input-bordered w-full " />
                </div>
            </div>


            <div class="md:flex">
                <div class="mt-5 w-[400px] mr-32">
                    <label>Birhdate:</label>
                    <span class="text-red-500">*</span>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input value="{{$teachers->birth_date}}"  datepicker datepicker-autohide name="birth_date" type="text"
                            class="input input-bordered block w-full ps-10 p-2.5 "
                            placeholder="Select birthdate">
                    </div>
                </div>
                <div class="mt-5 w-[400px]">
                    <label>Id:</label>
                    <span class="text-red-500">*</span>
                    <input type="text" name="teacher_id" placeholder="Enter The teachers Id" value="{{$teachers->teacher_id}}" class="input input-bordered w-full " />
                </div>
            </div>

            <div class="md:flex">
                <div class="mt-5 w-[200px] mr-32">
                    <label>Designation:</label>
                    <span class="text-red-500">*</span>
                    <select id="designation" name="designation" value="{{$teachers->designation}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option>{{$teachers->designation}}</option>
                        <option>Assistant teachers </option>
                        <option>teachers</option>
                    </select>
                </div>
                <div class="mt-5 w-[200px] mr-32">
                    <label>Section:</label>
                    <span class="text-red-500">*</span>
                    <select value="{{$teachers->section}}" id="Section" name="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option>{{$teachers->section}}</option>
                        <option>Permanent</option>
                        <option>Provition</option>
                      </select>
                </div>
                <div class="mt-5 w-[200px]">
                    <div class="relative max-w-sm">
                        <label>Joining date:</label>
                    <span class="text-red-500">*</span>
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                           <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" name="joindate" value="{{$teachers->joindate}}" class="input input-bordered block w-full ps-10 p-2.5 " placeholder="Select joining date">
                      </div>
                </div>
            </div>
            <div class="md:flex mt-5">
                
                <div class="mt-5 w-[400px] ">
                    <label>Gender:</label>
                    <span class="text-red-500">*</span><br>
                    <select name="gender" value="{{$teachers->gender}}" class="select select-accent w-full max-w-xs">
                        <option >{{$teachers->gender}}</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                
            </div>
            {{-- Present Address --}}
            <h1 class="text-2xl text-accent mt-10">Present Address <span class="text-red-500">*</span></h1>

            <div class="mt-5">
                <input type="text"  name="present_address" placeholder="Enter Street address" value="{{$teachers->present_address}}" class="input input-bordered w-full " />
            </div>
            
            <div class="md:flex">
                <div class="mt-5 w-[400px] mr-32">
                    <input type="text" name="present_city" placeholder="Enter The City" value="{{$teachers->present_city}}" class="input input-bordered w-full " />
                </div>
                <div class="mt-5 w-[400px]">
                    <input type="text" name="present_state" placeholder="Enter The State" value="{{$teachers->present_state}}" class="input input-bordered w-full " />
                </div>
            </div> 
            <div class="md:flex">
                <div class="mt-5 w-[400px] mr-32">
                    <input type="text" name="present_country" placeholder="Enter The Country" value="{{$teachers->present_country}}" class="input input-bordered w-full " />
                </div>
                <div class="mt-5 w-[400px]">
                    <input type="text" name="present_zip_code" placeholder="Enter The Zip Code" value="{{$teachers->present_zip_code}}" class="input input-bordered w-full " />
                </div>
            </div>

            {{-- Permanent address --}}
            <h1 class="text-2xl text-accent mt-10">Permanent Address <span class="text-red-500">*</span></h1>

            <div class="mt-5">
                <input type="text" name="parmanent_address" placeholder="Enter Street address" value="{{$teachers->parmanent_address}}" class="input input-bordered w-full " />
            </div>
            
            <div class="md:flex">
                <div class="mt-5 w-[400px] mr-32">
                    <input type="text" name="parmanent_city" placeholder="Enter The City" value="{{$teachers->parmanent_city}}" class="input input-bordered w-full " />
                </div>
                <div class="mt-5 w-[400px]">
                    <input type="text" name="parmanent_state" placeholder="Enter The State" value="{{$teachers->parmanent_state}}" class="input input-bordered w-full " />
                </div>
            </div> 
            <div class="md:flex">
                <div class="mt-5 w-[400px] mr-32">
                    <input type="text" name="parmanent_country" placeholder="Enter The Country" value="{{$teachers->parmanent_country}}" class="input input-bordered w-full " />
                </div>
                <div class="mt-5 w-[400px]">
                    <input type="text" name="parmanent_zip_code" placeholder="Enter The Zip Code" value="{{$teachers->parmanent_zip_code}}" class="input input-bordered w-full " />
                </div>
            </div>

            <h1 class="text-2xl text-accent mt-10">Contact Information</h1>
            <div class="mt-5 md:flex">
                <div class="mt-5 w-[400px] mr-32">
                    <label>Gmail:</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input name="email" value="{{$teachers->email}}" type="text" id="email-address-icon"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                            placeholder="name@flowbite.com">
                    </div>
                </div>
                
                <div class="mt-5 w-[400px]">
                    <label>Mobile No:</label>
                    <span class="text-red-500">*</span>
                        <input type="tel" name="mobile" name="phone" id="floating_phone" value="{{$teachers->mobile}}" placeholder="Enter The mobile number" class="input input-bordered w-full " />
                </div>
                

            </div>
            <div class="mt-5 md:flex ">
              <div class="mt-5 w-[400px]">
                <label>NID:</label>
                    <span class="text-red-500">*</span>
                <input type="text" name="nid" placeholder="Enter nid" value="{{$teachers->nid}}" class="input input-bordered w-full" />

              </div>
            </div>
            <div class="my-5 flex justify-end ">
                <button type="submit" class=" btn btn-accent btn-outline text-white ">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection