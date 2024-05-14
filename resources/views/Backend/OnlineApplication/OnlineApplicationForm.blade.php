@extends('Backend.app')
@section('title')
    Paradarsita Suchok Excel
@endsection


@section('Dashboard')
    <div class="w-full mx-auto p-5 space-y-10">
        <div class="w-full flex justify-center items-center">
            <div class="text-center space-y-2">
                <h1 class="text-xl font-bold">Silver Living Grammar School</h1>
                <h3 class="text-md font-bold">ভর্তির আবেদন পত্র</h3>
                <p class="text-red-500">( সকল তথ্য অবশ্যই ইংরেজিতে রেজিস্ট্রেশন পত্র/ সনদপত্র অনুযায়ী পূরণ করতে হবে )</p>
            </div>
        </div>

        {{-- Student Information section --}}
        <div class="shadow border p-5">
            <h2 class="font-semibold">শিক্ষাথীর ভর্তি বিবরণ</h2>
            <div class="grid grid-cols-4">
                {{-- 1st row column - 1 --}}
                <div class="">
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="flex flex-col ">
                            <label for="name_of_student" class="mb-2 text-sm font-medium text-gray-900 ">ছাত্রের নাম
                                (বাংলায়)
                                <span class="text-red-500">*</span></label>
                            <input type="text" value="" name="name_of_student" id="name_of_student"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="flex flex-col">
                            <label for="class" class="mb-2 text-sm font-medium text-gray-900 ">ভর্তি ইচ্ছুক শ্রেণী
                                <span class="text-red-500">*</span></label>
                            <select id="class" name="class"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div class="flex flex-col ">
                            <label for="date_of_birth" class="mb-2 text-sm font-medium text-gray-900 ">জন্ম তারিখ:</label>
                            <input type="date" value="" name="date_of_birth" id="date_of_birth"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="flex flex-col">
                            <label for="gender" class="mb-2 text-sm font-medium text-gray-900 ">লিঙ্গ:</label>
                            <select id="gender" name="gender"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="session" class="mb-2 text-sm font-medium text-gray-900 ">সেশন:</label>
                            <select id="session" name="session"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- 1st row column - 2 --}}
                <div class="">
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="flex flex-col ">
                            <label for="name_of_student" class="mb-2 text-sm font-medium text-gray-900 ">ছাত্রের নাম
                                (ইংরেজিতে)
                                <span class="text-red-500">*</span></label>
                            <input type="number" value="" name="name_of_student" id="name_of_student"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="flex flex-col">
                            <label for="class" class="mb-2 text-sm font-medium text-gray-900 ">গ্রূপ:
                                <span class="text-red-500">*</span></label>
                            <select id="class" name="class"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div class="flex flex-col ">
                            <div class="flex items-center mb-px">
                                <input id="default-checkbox" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">জন্মনিবন্ধনপত্র
                                    নম্বর</label>
                            </div>
                            <input type="text" value="" name="birth_certificate" id="birth_certificate"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="flex flex-col">
                            <label for="religion" class="mb-2 text-sm font-medium text-gray-900 ">ধর্ম:</label>
                            <select id="religion" name="religion"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="session" class="mb-2 text-sm font-medium text-gray-900 ">একাডেমিক বছর:
                                <span class="text-red-500">*</span>
                            </label>
                            <select id="session" name="session"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- 1st row column - 3 --}}
                <div class="">
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="flex flex-col ">
                            <label for="mobile_number" class="mb-2 text-sm font-medium text-gray-900 ">মোবাইল নং:
                                <span class="text-red-500">*</span></label>
                            <input type="number" value="" name="mobile_number" id="mobile_number"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="flex flex-col">
                            <label for="section" class="mb-2 text-sm font-medium text-gray-900 ">সেকশন:</label>
                            <select id="section" name="section"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div class="flex flex-col ">
                            <label for="nationality" class="mb-2 text-sm font-medium text-gray-900 ">জাতীয়তা:</label>
                            <input type="string" value="Bangladeshi" name="nationality" id="nationality"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="flex flex-col ">
                            <label for="date_of_birth" class="mb-2 text-sm font-medium text-gray-900 ">ভর্তির তারিখ:
                            </label>
                            <input type="date" value="<?php echo date('Y-m-d'); ?>" name="date_of_birth" id="date_of_birth"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="flex flex-col">
                            <label for="section" class="mb-2 text-sm font-medium text-gray-900 ">রক্তের গ্রূপ:</label>
                            <select id="section" name="section"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                                <option selected>Select</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- 1st row column - 4 --}}
                <div class="">
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="flex flex-col ">
                            <img class="w-20 rounded-full mb-2 ml-2"
                                src="https://pgr-studio.co.uk/wp-content/uploads/2022/04/Blank-avatar.png" alt="photo">
                            <label for="mobile_number" class="mb-2 text-sm font-medium text-gray-900 ">শিক্ষার্থীর ছবি:
                                <span class="text-red-500">*</span></label>
                            <input
                                class="w-5/6 block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="excel_file" type="file">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Parents section --}}
        <div class="shadow border p-5">
            <h2 class="font-semibold">পিতা-মাতার বিবরণ</h2>
            <div class="grid grid-cols-4">
                {{-- 1st row column - 1 --}}
                <div class="">
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="flex flex-col ">
                            <label for="parents_mobile" class=" text-sm font-medium text-gray-900 ">পিতার নাম: <span
                                    class="text-red-500">*</span></label>
                            <input type="text" value="" name="parents_mobile" id="parents_mobile"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="flex flex-col ">
                            <label for="parents_mobile2" class=" text-sm font-medium text-gray-900 ">মাতার নাম:<span
                                    class="text-red-500">*</span></label>
                            <input type="text" value="" name="parents_mobile2" id="parents_mobile2"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                    </div>
                </div>

                {{-- 1st row column - 2 --}}
                <div class="">
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="flex flex-col ">
                            <label for="parents_mobile" class=" text-sm font-medium text-gray-900 ">মোবাইল নং:</label>
                            <input type="number" value="" name="parents_mobile" id="parents_mobile"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="flex flex-col ">
                            <label for="parents_mobile2" class=" text-sm font-medium text-gray-900 ">মোবাইল
                                নং:</label>
                            <input type="number" value="" name="parents_mobile2" id="parents_mobile2"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                    </div>
                </div>

                {{-- 1st row column - 3 --}}
                <div class="">
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="flex flex-col ">
                            <label for="parents_mobile" class=" text-sm font-medium text-gray-900 ">পেশা:</label>
                            <input type="text" value="" name="parents_mobile" id="parents_mobile"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="flex flex-col ">
                            <label for="parents_mobile2" class=" text-sm font-medium text-gray-900 ">পেশা:</label>
                            <input type="text" value="" name="parents_mobile2" id="parents_mobile2"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                    </div>
                </div>

                {{-- 1st row column - 4 --}}
                <div class="">
                    <div class="py-5 px-2 space-y-3 flex flex-col">
                        <div class="flex flex-col ">
                            <label for="parents_mobile" class=" text-sm font-medium text-gray-900 ">বাৎসরিক আয়:</label>
                            <input type="text" value="" name="parents_mobile" id="parents_mobile"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                        <div class="flex flex-col ">
                            <label for="parents_mobile2" class=" text-sm font-medium text-gray-900 ">বাৎসরিক আয়:</label>
                            <input type="text" value="" name="parents_mobile2" id="parents_mobile2"
                                class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                                placeholder="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- Current Address Section --}}
        <div class="shadow border p-5">
            {{-- present address  --}}
            <div>
                <h2 class="font-semibold">বর্তমান ঠিকানাঃ</h2>
                <div class="w-full py-5 px-2  grid grid-cols-6">
                    <div class="flex flex-col ">
                        <label for="village" class=" text-sm font-medium text-gray-900 ">গ্রাম:</label>
                        <input type="text" value="" name="village" id="village"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="parents_mobile2" class=" text-sm font-medium text-gray-900 ">বাড়ির নাম:<span
                                class="text-red-500">*</span></label>
                        <input type="text" value="" name="parents_mobile2" id="parents_mobile2"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="post_office" class=" text-sm font-medium text-gray-900 ">পোস্ট অফিস:</label>
                        <input type="text" value="" name="post_office" id="post_office"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="post_office" class=" text-sm font-medium text-gray-900 ">পোস্ট কোড:</label>
                        <input type="text" value="" name="post_office" id="post_office"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col">
                        <label for="class" class="text-sm font-medium text-gray-900 ">জেলা:</label>
                        <select id="class" name="class"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                            <option selected>Select</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="class" class="text-sm font-medium text-gray-900 ">থানা:</label>
                        <select id="class" name="class"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                            <option selected>Select</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                </div>
            </div>

            <div>
                <div class="flex space-x-5">
                    <h2 class="font-semibold">স্থায়ী ঠিকানাঃ</h2>
                    <div class="flex items-center">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Same as</label>
                    </div>
                </div>
                {{-- present address  --}}
                <div class="w-full py-5 px-2  grid grid-cols-6">
                    <div class="flex flex-col ">
                        <label for="village" class=" text-sm font-medium text-gray-900 ">গ্রাম:</label>
                        <input type="text" value="" name="village" id="village"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="parents_mobile2" class=" text-sm font-medium text-gray-900 ">বাড়ির নাম:<span
                                class="text-red-500">*</span></label>
                        <input type="text" value="" name="parents_mobile2" id="parents_mobile2"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="post_office" class=" text-sm font-medium text-gray-900 ">পোস্ট অফিস:</label>
                        <input type="text" value="" name="post_office" id="post_office"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="post_office" class=" text-sm font-medium text-gray-900 ">পোস্ট কোড:</label>
                        <input type="text" value="" name="post_office" id="post_office"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col">
                        <label for="class" class="text-sm font-medium text-gray-900 ">জেলা:</label>
                        <select id="class" name="class"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                            <option selected>Select</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="class" class="text-sm font-medium text-gray-900 ">থানা:</label>
                        <select id="class" name="class"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6">
                            <option selected>Select</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>


        {{-- Current Address Section --}}
        <div class="shadow border p-5">
            {{-- present address  --}}
            <div>
                <h2 class="font-semibold">আইনানুযায়ী অভিভাবকের নাম ও ঠিকানা (পিতা জীবিত না থাকলে)</h2>
                <div class="w-full py-5 px-2  grid grid-cols-6">
                    <div class="flex flex-col ">
                        <label for="village" class=" text-sm font-medium text-gray-900 ">অভিভাবকের নাম:</label>
                        <input type="text" value="" name="village" id="village"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="parents_mobile2" class=" text-sm font-medium text-gray-900 ">ঠিকানা:</label>
                        <input type="text" value="" name="parents_mobile2" id="parents_mobile2"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                </div>
            </div>
        </div>


        {{-- Current Address Section --}}
        <div class="shadow border p-5">
            {{-- present address  --}}
            <div>
                <h2 class="font-semibold">সর্বশেষ শিক্ষার বিবরণ</h2>
                <div class="w-full py-5 px-2  grid grid-cols-7">
                    <div class="flex flex-col col-span-2">
                        <label for="village" class=" text-sm font-medium text-gray-900">সর্বশেষ শিক্ষা প্রতিষ্ঠানের
                            নাম:</label>
                        <input type="text" value="" name="village" id="village"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col col-span-2">
                        <label for="parents_mobile2" class=" text-sm font-medium text-gray-900 ">সর্বশেষ অধ্যায়নরত
                            শ্রেণী:</label>
                        <input type="text" value="" name="parents_mobile2" id="parents_mobile2"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="parents_mobile2" class=" text-sm font-medium text-gray-900 ">রেজি. নং:</label>
                        <input type="text" value="" name="parents_mobile2" id="parents_mobile2"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="parents_mobile2" class=" text-sm font-medium text-gray-900 ">ফলাফল:</label>
                        <input type="text" value="" name="parents_mobile2" id="parents_mobile2"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="parents_mobile2" class=" text-sm font-medium text-gray-900 ">পাশের বছর:</label>
                        <input type="text" value="" name="parents_mobile2" id="parents_mobile2"
                            class="bg-gray-50 border border-gray-300 px-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 block w-5/6"
                            placeholder="" />
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full flex justify-center items-center gap-5">
            <a href="{{ route('blankApplicationForm.view', $school_code) }}"
                class="text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-12 py-2.5 text-center">
                Download Blank Application Form
            </a>
            <button type="button"
                class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-20 py-2.5 text-center">
                Print
            </button>
            <button type="button"
                class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 text-center">
                Edit
            </button>
            <button type="button"
                class="text-white bg-gradient-to-br from-green-600 to-green-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-12 py-2.5 text-center">
                Submit
            </button>
        </div>
    </div>
@endsection
