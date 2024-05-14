@extends('Backend.app')
@section('title')
    Noipunno Mullaon Print
@endsection

{{-- <p>@repeatDot(100)</p> --}}

@section('Dashboard')
    <div class="w-full min-h-screen bg-neutral-200 mx-auto p-5">
        <div class="w-[70%] h-[80%] bg-white mx-auto px-5 py-12">
            {{-- assessment scale section --}}
            <div class="overflow-hidden space-y-6">


                <div class="flex justify-between w-full">
                    <div class="w-[150px] h-[150px] border flex justify-center items-center font-bold uppercase">
                       Logo
                    </div>

                    <div class="text-center">
                        <h1 class="text-center font-bold text-2xl">Silver Living Grammar School</h1>
                        <h3 class="text-center font-semibold text-xl">Contact No: 01700-00000</h3>
                        <h3 class="text-center font-semibold text-lg">Email: cs.cyberdyne@gmail.com</h3>
                    </div>

                    <div class="w-fit px-7 py-9 border text-center">
                        Student's <br>
                        Photograph <br>
                        (to be glued)
                    </div>
                </div>


                <h2 class="text-xl font-bold text-center my-5">ভর্তির আবেদন পত্র</h2>
                <p class="my-2 font-semibold">ফর্ম নং :</p>

                <div class="grid grid-cols-2 gap-10">
                    <div class="grid grid-cols-6">
                        <p class="font-semibold col-span-2">ভর্তি ইচ্ছুক শ্রেণী</p>
                        <p class=" border-b-2 col-span-4 border-black/40 border-dotted"></p>
                    </div>
                    <div class="grid grid-cols-6">
                        <p class="font-semibold">ভর্তি সন</p>
                        <p class=" border-b-2 col-span-5 border-black/40 border-dotted"></p>
                    </div>
                </div>

                <div class="flex items-center">
                    <p class="font-semibold w-60">শিক্ষার্থীর নাম(বাংলায়)</p>
                    <p class="border-b-2 col-span-9 border-black/40 border-dotted w-full"></p>
                </div>

                <div class="flex items-center space-x-3">
                    <p class="font-semibold w-64">শিক্ষার্থীর নাম(ইংরেজিতে)</p>
                    <p class="border-b-2 col-span-9 border-black/40 border-dotted w-full"></p>
                </div>

                <div class="grid grid-cols-2 gap-10">
                    <div class="flex items-center">
                        <p class="font-semibold w-32">পিতার নাম</p>
                        <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                    </div>
                    <div class="flex items-center">
                        <p class="font-semibold w-16 ml-auto">পেশা</p>
                        <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-10">
                    <div class="flex items-center">
                        <p class="font-semibold w-32">মাতার নাম</p>
                        <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                    </div>
                    <div class="flex items-center">
                        <p class="font-semibold w-16 ml-auto">পেশা</p>
                        <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                    </div>
                </div>

                <div class="my-8 space-y-3">
                    <h1 class="font-semibold text-md mb-1">স্থায়ী ঠিকানা</h1>
                    <div class="grid grid-cols-3 gap-10">
                        <div class="flex items-center">
                            <p class="w-14">গ্রাম</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                        <div class="flex items-center">
                            <p class="w-32 ml-auto">বাড়ির নাম</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                        <div class="flex items-center">
                            <p class="w-24 ml-auto">ডাকঘর</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-10">
                        <div class="flex items-center">
                            <p class="w-36">পোস্ট কোড</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                        <div class="flex items-center">
                            <p class="w-32 ml-auto">উপজেলা</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                        <div class="flex items-center">
                            <p class="w-24 ml-auto">জেলা</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                    </div>
                </div>


                <div class="my-8 space-y-3">
                    <h1 class="font-semibold text-md mb-1">বতর্মান ঠিকানা</h1>
                    <div class="grid grid-cols-3 gap-10">
                        <div class="flex items-center">
                            <p class=" w-14">গ্রাম</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                        <div class="flex items-center">
                            <p class=" w-32 ml-auto">বাড়ির নাম</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                        <div class="flex items-center">
                            <p class=" w-24 ml-auto">ডাকঘর</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-10">
                        <div class="flex items-center">
                            <p class=" w-36">পোস্ট কোড</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                        <div class="flex items-center">
                            <p class=" w-32 ml-auto">উপজেলা</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                        <div class="flex items-center">
                            <p class=" w-24 ml-auto">জেলা</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                    </div>
                </div>



                <div class="flex items-center">
                    <p class="font-semibold w-[460px]">জন্মতারিখ ( জন্ম নিবন্ধন সনদ অনুযায়ী ) </p>
                    <p class="border-b-2 col-span-9 border-black/40 border-dotted w-full"></p>
                </div>

                <div class="flex items-center">
                    <p class="font-semibold w-[420px]">জাতীয় পরিচয়পত্র / জন্মনিবন্ধন নম্বর:</p>
                    <p class="border-b-2 col-span-9 border-black/40 border-dotted w-full"></p>
                </div>

                <div class="grid grid-cols-2 gap-10">
                    <div class="flex items-center">
                        <p class="font-semibold w-32">জাতীয়তা</p>
                        <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                    </div>
                    <div class="flex items-center">
                        <p class="font-semibold w-10 ml-auto">ধর্ম</p>
                        <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                    </div>
                </div>


                <div class="flex items-center">
                    <p class="font-semibold w-[420px]">যোগাযোগের নম্বর (ফোন / মোবাইল ):</p>
                    <p class="border-b-2 col-span-9 border-black/40 border-dotted w-full"></p>
                </div>

                <div class="flex items-center">
                    <p class="font-semibold w-[330px]">আইন অনুযায়ী অভিভাবক নাম:</p>
                    <p class="border-b-2 col-span-9 border-black/40 border-dotted w-full"></p>
                </div>

                <div class="flex items-center">
                    <p class="font-semibold w-[70px]">ঠিকানা:</p>
                    <p class="border-b-2 col-span-9 border-black/40 border-dotted w-full"></p>
                </div>

                <div class="flex items-center">
                    <p class="font-semibold w-[450px]">পূর্ববর্তী অধ্যায়নরত শিক্ষা প্রতিষ্ঠান নাম:</p>
                    <p class="border-b-2 col-span-9 border-black/40 border-dotted w-full"></p>
                </div>

                <p class="font-semibold mt-16">
                    আমি আমার সন্তানের পক্ষে বিদ্যালয়ের নিয়ম কানুন মেনে চলতে সহায়তা করব এবং উপরে উল্লেখিত আমার সন্তানের সকল
                    বিবরণ সত্য বলে অঙ্গীকার করছি। বিদ্যালয়ের নিয়ম বহির্ভুত কোনো কাজের জন্য আমি আমার সন্তানের পক্ষে
                    কর্তৃপক্ষের সিদ্ধান্ত মেনে নিতে বাধ্য থাকব।
                </p>

                <div class="flex justify-between items-center px-20 my-20">
                    <p class="border-t-2 border-black/40 border-dotted p-2">ভর্তির তারিখ</p>
                    <p class="border-t-2 border-black/40 border-dotted p-2">ছাত্রছাত্রীর পক্ষে অভিভাবক স্বাক্ষর</p>
                </div>


                <div class="w-full border border-dotted border-black/40"></div>

                <div class="grid grid-cols-3 mt-0">
                    <div>
                    </div>
                    <div class="ml-auto space-y-2">
                        <p class="px-4 py-2 bg-slate-800 w-fit rounded-lg text-white">প্রবেশ পত্র</p>
                        <p class="font-semibold">(অফিস কর্তৃক পূরণ)</p>
                    </div>
                    <div>
                        <div class="w-fit px-7 py-9 border text-center ml-auto mr-3">
                            Student's <br>
                            Photograph <br>
                            (to be glued)
                        </div>
                    </div>
                </div>

                <div class="space-y-5">
                    <div class="grid grid-cols-2 gap-10">
                        <div class="flex items-center">
                            <p class="font-semibold w-[300px]">ছাত্রছাত্রীর নাম(বাংলা) :</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                        <div class="flex items-center">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-10">
                        <div class="flex items-center">
                            <p class="font-semibold w-32">পিতার নাম : </p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                        <div class="flex items-center">
                            <p class="font-semibold w-32 ml-auto">মাতার নাম :</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-10">
                        <div class="flex items-center">
                            <p class="font-semibold w-[270px]">ভর্তি পরীক্ষার তারিখ : </p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                        <div class="flex items-center">
                            <p class="font-semibold w-32 ml-auto">ভর্তির রোল :</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-10">
                        <div class="flex items-center">
                            <p class="font-semibold w-[260px]">ভর্তি পরীক্ষার সময় : </p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                        <div class="flex items-center">
                            <p class="font-semibold w-16 ml-auto">শ্রেণী :</p>
                            <p class="w-full border-b-2 col-span-4 border-black/40 border-dotted"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
