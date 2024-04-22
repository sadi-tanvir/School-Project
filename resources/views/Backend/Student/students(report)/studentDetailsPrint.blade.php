
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>
</head>
<body class="bg-blue-100" >
    <div class=" bg-white w-[1500px] px-[120px] mx-auto" id="page">
        <div class="flex w-full justify-between items-center p-5">
            <div>
                <img src="https://i.pinimg.com/originals/82/c6/5b/82c65b9bb0a75026fc4c82a438b4cc9b.jpg"
                    class="rounded-full w-28 h-28" alt="">
                </div>
            <div class="text-center">
                <h3 class="text-2xl text-blue-400 font-bold">Pallabi Mazedul Islam Model High School</h3>
                <p class="text-sm">13/14,Pallabi, Dhaka - 1216. <br>
                    Contact No: 01309108183 <br>
                    Email: mimodelschool1978@gmail.com <br>
                    Website: http://pmimhs.edu.bd/ <br>
                   <span class="text-red-500"> Print date:14-03-2024</span></p>
                <p class="font-bold font-semi-bold text-center text-xl">Student Information</p>
            </div>
            @foreach ($students as $Data)
            <div>
                <img src="{{ asset($Data->image) }}"
                    class="w-40" alt="">
                </div>
        </div>
        {{-- student info --}} 
      
        <div class="grid grid-cols-12  ">
            <div class="border-t  border-b border-l  border-black p-1.5 col-span-2">ছাত্রের নাম(বাংলায়)</div>
            <div class="border border-black p-1.5 col-span-6"></div>
            <div class="border-t  border-b border-r border-black p-1.5 col-span-2">আইডি নং</div>
            <div class="border-t  border-b border-r  border-black p-1.5 col-span-2">{{$Data->student_id}}</div>
        </div>
        <div class="grid grid-cols-12  ">
            <div class="border-l border-b border-black p-1.5 col-span-2">ছাত্রের নাম(ইঙ্গরেজিতে)</div>
            <div class="border-l border-b border-black p-1.5 col-span-6">{{$Data->name}}</div>
            <div class="border-l border-b border-black p-1.5 col-span-2">মোবাইল নং</div>
            <div class="border-l border-b border-r border-black p-1.5 col-span-2"></div>
        </div>
        {{-- class nd Group Info --}}
        <div class="grid grid-cols-12  ">
            <div class="border-l border-b border-black p-1.5 col-span-2">ক্লাস</div>
            <div class="border-l border-b border-black p-1.5 col-span-5 text-red-600">{{$Data->Class_name}}</div>
            <div class="border-l border-b border-black p-1.5 col-span-1">রোল</div>
            <div class="border-l border-b border-black p-1.5 col-span-1">{{$Data->student_roll}}</div>
            <div class="border-l border-b border-black p-1.5 col-span-1">শাখা</div>
            <div class="border-l border-b border-r border-black p-1.5 col-span-2">{{$Data->section}}</div>
        </div>
        <div class="grid grid-cols-12  ">
            <div class="border-l border-b border-black p-1.5 col-span-2">গ্রুপ</div>
            <div class="border-l border-b border-black p-1.5 col-span-5">{{$Data->group}}</div>
            <div class="border-l border-b border-black p-1.5 col-span-1">বছর</div>
            <div class="border-l border-b border-black p-1.5 col-span-1">{{$Data->year}}</div>
            <div class="border-l border-b border-black p-1.5 col-span-1">সেশন</div>
            <div class="border-l border-b border-r border-black p-1.5 col-span-2">{{$Data->session}}</div>
        </div>
        <div class="grid grid-cols-12 mt-1">
            <div class="border-l border-b border-black p-1.5 col-span-2">জন্ম তারিখ</div>
            <div class="border-l border-b border-black p-1.5 col-span-3">{{$Data->birth_date}}</div>
            <div class="border-l border-b border-black p-1.5 col-span-2">জাতীয়তা</div>
            <div class="border-l border-b border-black p-1.5 col-span-3">{{$Data->nationality}}</div>
            <div class="border-l border-b border-black p-1.5 col-span-1"> রক্তের গ্রুপ</div>
            <div class="border-l border-b border-r border-black p-1.5 col-span-1">{{$Data->	blood_group}}</div>
        </div>
        {{-- guardian Info --}}
        <div class="grid grid-cols-12 mt-1">
            <div class=" border-b border-l border-t  border-black p-1.5 col-span-2"> পিতার নাম </div>
            <div class="border-l border-b border-t  border-black p-1.5 col-span-5">{{$Data->father_name}}</div>
            <div class="border-l border-b border-t border-black p-1.5 col-span-2">মোবাইল</div>
            <div class="border-l border-b border-t border-r border-black p-1.5 col-span-3">{{$Data->father_mobile}}</div>
        </div>
        <div class="grid grid-cols-12">
            <div class="border-l border-b  border-black p-1.5 col-span-2">পেশা</div>
            <div class="border-l border-b  border-black p-1.5 col-span-5">{{$Data->	father_occupation}}</div>
            <div class="border-l border-b  border-black p-1.5 col-span-2">মাসিক আয়</div>
            <div class="border-l border-b  border-r border-black p-1.5 col-span-3"></div>
        </div>
        <div class="grid grid-cols-12">
            <div class="border-l border-b  border-black p-1.5 col-span-2">মাতার নাম</div>
            <div class="border-l border-b  border-black p-1.5 col-span-5">{{$Data->mother_name}}</div>
            <div class="border-l border-b  border-black p-1.5 col-span-2">মোবাইল </div>
            <div class="border-l border-b  border-r border-black p-1.5 col-span-3">{{$Data->mother_number}}</div>
        </div>
        <div class="grid grid-cols-12">
            <div class="border-l border-b  border-black p-1.5 col-span-2">পেশা</div>
            <div class="border-l border-b  border-black p-1.5 col-span-5">{{$Data->	mother_occupation}}</div>
            <div class="border-l border-b  border-black p-1.5 col-span-2">মাসিক আয়</div>
            <div class="border-l border-b  border-r border-black p-1.5 col-span-3"></div>
        </div>
        {{--  Address--}}
        <div class="grid grid-cols-12 mt-1">
            <div class="border border-black p-1.5 col-span-12">বর্তমান ঠিকানা</div>
            <div class="border-b border-l border-black p-1.5 col-span-2">গ্রাম/মহল্লা</div>
            <div class="border-b border-l border-black p-1.5 col-span-3">{{$Data->present_village}}</div>
            <div class="border-b border-l border-black p-1.5 col-span-2">ডাকঘর</div>
            <div class="border-b border-l border-black p-1.5 col-span-3">{{$Data->present_post_office}}</div>
            <div class="border-b border-l border-black p-1.5 col-span-1">পোস্ট কোড</div>
            <div class="border-b border-l border-r border-black p-1.5 col-span-1">{{$Data->present_zip_code}}</div>
            <div class="border-b border-l  border-black p-1.5 col-span-2">থানা</div>
            <div class="border-b border-l  border-black p-1.5 col-span-3">{{$Data->present_police_station}}</div>
            <div class="border-b border-l  border-black p-1.5 col-span-2">জেলা</div>
            <div class="border-b border-l border-r border-black p-1.5 col-span-5">{{$Data->present_district}}</div>
            {{--  --}}
            <div class="border-b border-l border-r border-black p-1.5 col-span-12"> স্থায়ী ঠিকানা</div>
            <div class="border-b border-l border-black p-1.5 col-span-2">গ্রাম/মহল্লা</div>
            <div class="border-b border-l border-black p-1.5 col-span-3">{{$Data->parmanent_village}}</div>
            <div class="border-b border-l border-black p-1.5 col-span-2">ডাকঘর</div>
            <div class="border-b border-l border-black p-1.5 col-span-3">{{$Data->parmanent_post_office}}</div>
            <div class="border-b border-l border-black p-1.5 col-span-1">পোস্ট কোড</div>
            <div class="border-b border-l border-r border-black p-1.5 col-span-1">{{$Data->	parmanent_zip_code}}</div>
            <div class="border-b border-l border-black p-1.5 col-span-2">থানা</div>
            <div class="border-b border-l border-black p-1.5 col-span-3">{{$Data->parmanent_police_station}}</div>
            <div class="border-b border-l border-black p-1.5 col-span-2">জেলা</div>
            <div class="border-b border-l border-r border-black p-1.5 col-span-5">{{$Data->parmanent_district}}</div>
            {{--  --}}
            <div class="border border-black p-1.5 col-span-12 mt-1">পূর্বে যে প্রতিষ্ঠানে অধ্যায়ন করেছে তার নাম: {{$Data->last_school_name}} </div>
            <div class="border-b border-l border-black p-1.5 col-span-2">শ্রেনী</div>
            <div class="border-b border-l border-black p-1.5 col-span-2">{{$Data->last_class_name}}</div>
            <div class="border-b border-l border-black p-1.5 col-span-2">রেজি নং</div>
            <div class="border-b border-l border-black p-1.5 col-span-2"></div>
            <div class="border-b border-l border-black p-1.5 col-span-2">ফলাফল</div>
            <div class="border-b border-l border-r border-black p-1.5 col-span-2">{{$Data->last_result}}</div>
        </div>
        <div class="py-10 mt-20 flex justify-between items-center">
            <div class="border-t border-black pt-2 w-[25%] text-center">ছাত্রের পুর্নাঙ্গ সাক্ষর</div>
            <div class="border-t border-black pt-2 w-[25%] text-center">অভিভাবকের সাক্ষর এবং তারিখ</div>
            <div class="border-t border-black pt-2 w-[25%] text-center">অধ্যক্ষ</div>
        </div>
        @endforeach
    </div>

    <div class="flex justify-center mt-10">
        <div class="mr-10">

            <a href="/dashboard/studentDetails/{{ $school_code }}">
                <button type="button"
                    class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Back</button>
            </a>
        </div>

        <div>
            {{-- <a
                href="{{ route('admit-card.download', ['schoolCode' => $Data->school_code, 'class' => $Data->class_name, 'group' => $Data->group, 'section_name' => $Data->section, 'id' => $Data->student_id, 'exam_name' => $exam_name, 'year' => $year]) }}">
                <button id="" type="button"
                    class="text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Download</button>
            </a> --}}


            <button id="btn" type="button"
                class="text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Download</button>
        </div>

    </div>
</body>

<script>
    let btn = document.getElementById('btn');
    let page = document.getElementById('page');

    btn.addEventListener('click', function() {
        html2PDF(page, {
            jsPDF: {
                format: 'a4',
            },
            imageType: 'image/jpeg',
            output: './pdf/generate.pdf'
        });
    });
</script>

</html>