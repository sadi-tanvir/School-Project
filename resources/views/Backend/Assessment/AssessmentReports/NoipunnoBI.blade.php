@extends('Backend.app')
@section('title')
    Noipunno Mullaon Print
@endsection


@section('Dashboard')
    <div class="w-full min-h-screen bg-neutral-200 mx-auto p-5">
        <div class="w-[60%] h-[80%] bg-white mx-auto px-5 py-12">
            {{-- আচরণিক নির্দেশক --}}
            <div class="">
                <div>
                    <h1 class="text-center bg-neutral-200 font-bold text-xl">আচরণিক নির্দেশক</h1>
                    <div class="grid grid-cols-3 gap-7 my-10">
                        <div class="flex flex-col justify-center items-center border border-neutral-700 space-y-3">
                            <div class="mt-3">
                                <h1>অংশগ্রহণ ও যোগাযোগ</h1>
                            </div>
                            <div class="grid grid-cols-7 w-full">
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center border border-neutral-700 space-y-3">
                            <div class="mt-3">
                                <h1>নিষ্ঠা ও সততা</h1>
                            </div>
                            <div class="grid grid-cols-7 w-full">
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center border border-neutral-700 space-y-3">
                            <div class="mt-3">
                                <h1>পারস্পরিক শ্রদ্ধা ও সততা</h1>
                            </div>
                            <div class="grid grid-cols-7 w-full">
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                                <div class="h-9 border border-neutral-700 bg-neutral-500"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- মূল্যায়নের স্কেল --}}
            <div>
                <h1 class="text-center bg-neutral-200 font-bold">মূল্যায়নের স্কেল</h1>
                <div class="grid grid-cols-7 mt-5">
                    <div class="col-span-5">
                        <div class="grid grid-cols-5 items-center">
                            <div class="col-span-3 flex">
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                            </div>
                            <div class="col-span-2">
                                <h4>= ১০০% অনন্য (Upgrading)</h4>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 items-center">
                            <div class="col-span-3 flex">
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                            </div>
                            <div class="col-span-2">
                                <h4>= > ৫০% অর্জনমুখী (Achieving)</h4>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 items-center">
                            <div class="col-span-3 flex">
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                            </div>
                            <div class="col-span-2">
                                <h4>= > ২৫% অগ্রগামী (Advancing)</h4>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 items-center">
                            <div class="col-span-3 flex">
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                            </div>
                            <div class="col-span-2">
                                <h4>= > ০% সক্রিয় (Activating)</h4>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 items-center">
                            <div class="col-span-3 flex">
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                            </div>
                            <div class="col-span-2">
                                <h4>= -২৫% অনুসন্ধানী (Exploring)</h4>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 items-center">
                            <div class="col-span-3 flex">
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                            </div>
                            <div class="col-span-2">
                                <h4>= -৫০% বিকাশমান (Developing)</h4>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 items-center">
                            <div class="col-span-3 flex">
                                <div class="w-12 h-12 border border-neutral-700 bg-neutral-500"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                                <div class="w-12 h-12 border border-neutral-700"></div>
                            </div>
                            <div class="col-span-2">
                                <h4>= -১০০% প্রারম্ভিক (Elementary)</h4>
                            </div>
                        </div>
                    </div>


                    <div class="col-span-2">
                        <h2 class="font-bold text-lg text-center">শ্রেণি শিক্ষকের মন্তব্য:</h2>
                    </div>
                </div>
            </div>

            <!-- remarks section  -->
            <div class="flex justify-between items-center mt-10">
                <div class="w-[40%]">
                    <h1 class="text-center font-semibold text-lg">শিক্ষার্থীর মন্তব্য :</h1>

                    <div class="mt-3">
                        <h4>যে কাজটি সবচেয়ে ভালোভাবে করতে পেরেছি:</h4>
                        <div>
                            <p>@repeatDot(100)</p>
                            <p>@repeatDot(100)</p>
                        </div>
                    </div>
                    <div class="mt-14">
                        <h4>আরো উন্নতির জন্য যা যা করতে চাই:</h4>
                        <div>
                            <p>@repeatDot(100)</p>
                            <p>@repeatDot(100)</p>
                            <p>@repeatDot(100)</p>
                            <p>@repeatDot(100)</p>
                            <p>@repeatDot(100)</p>
                        </div>
                    </div>
                </div>
                <div class="w-[40%]">
                    <h1 class="text-center font-semibold text-lg">অভিভাবকের মন্তব্য:</h1>
                    <div class="mt-3">
                        <h4>আমার সন্তান যে কাজটি সবচেয়ে ভালোভাবে করতে পারে:</h4>
                        <div class="">
                            <span class="text-xs">@repeatDot(120)</span>
                            <span class="text-xs">@repeatDot(120)</span>
                        </div>
                    </div>
                    <div class="mt-14">
                        <h4>আমার সন্তানের উন্নয়নে আমি যা করতে পারি:</h4>
                        <div class="">
                            <span class="text-xs">@repeatDot(120)</span>
                            <span class="text-xs">@repeatDot(120)</span>
                            <span class="text-xs">@repeatDot(120)</span>
                            <span class="text-xs">@repeatDot(120)</span>
                            <span class="text-xs">@repeatDot(120)</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-28 mt-20 ml-auto mr-5">
                <h1 class="border-t-2 border-black text-center">Principal</h1>
            </div>
        </div>
    @endsection
