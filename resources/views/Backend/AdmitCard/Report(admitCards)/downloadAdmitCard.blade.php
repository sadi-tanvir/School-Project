<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admit Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <style>
        .page-break {
            page-break-after: always;
        }

        .admit-card-container {
            width: calc(100% - 40px);
            margin: 20px;
            box-sizing: border-box;
            padding: 20px;
            border: 1px solid #1E3A8A;
        }

        #content {
            padding: 20px; /* Padding for the full print page */
        }

        #background-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            opacity: 0.1;
            width: 25%;
            height: auto;
        }
    </style>

</head>

<body>
    <div class=" mx-auto min-h-screen" id="content">
        @foreach ($Datas as $Data)
            <div class=" page-break mt-10">
                <div id="admit-card" class="relative mx-auto  max-w-[900px] border-4 border-[#1E3A8A] h-fit">
                    {{-- <img id="background-image" src="{{ asset($school_info->logo) }}" alt="" /> --}}
                    <div class="">
                        <div class="flex w-full items-start justify-between border px-2">
                            <div>
                                <img src="{{ asset($school_info->logo) }}" class="h-auto w-20" alt="" />
                            </div>
                            <div class="col-span-3 text-center">
                                <h3 class="text-md font-bold">{{ $school_info->school_name }}</h3>
                                <p class="text-xs">{{ $school_info->address }} <br>
                                    Contact No: {{ $school_info->mobile_number }}<br>
                                    Email: {{ $school_info->school_email }}<br>
                                    Website: {{ $school_info->website }}<br>
                                    Print date:{{ $date }}</p>
                                <p class="text-purple-600  font-semibold text-center pb-1">Admit Card</p>

                            </div>
                            <div class="mt-3">
                                <img src="{{ asset($Data->image) }}" class="h-auto max-h-auto w-20" alt="" />
                            </div>
                        </div>


                        <div class="flex w-full justify-between  py-2 px-7 text-[9px]">
                            <div class="text-left">
                                <div class="grid grid-cols-3 gap-5 text-black ">
                                    <p class="font-semibold col-span-1 ">Student Name</p>
                                    <p class="space-x-2 col-span-2">
                                        <span>:</span>
                                        <span>{{ $Data->name }}</span>
                                    </p>
                                </div>
                                <div class="grid grid-cols-3 gap-5">
                                    <p class="font-semibold col-span-1">Class</p>
                                    <p class="space-x-2 col-span-2">
                                        <span>:</span>
                                        <span>{{ $Data->Class_name }}</span>
                                    </p>
                                </div>
                                <div class="grid grid-cols-3 gap-5">
                                    <p class="font-semibold col-span-1">Roll</p>
                                    <p class="space-x-2 col-span-2">
                                        <span>:</span>
                                        <span>{{ $Data->student_roll }}</span>
                                    </p>
                                </div>
                                <div class="grid grid-cols-3 gap-5">
                                    <p class="font-semibold col-span-1">Group</p>
                                    <p class="space-x-2 col-span-2">
                                        <span>:</span>
                                        <span>{{ $Data->group }}</span>
                                    </p>
                                </div>
                                <div class="grid grid-cols-3 gap-5">
                                    <p class="font-semibold col-span-1">Section</p>
                                    <p class="space-x-2 col-span-2">
                                        <span>:</span>
                                        <span>{{ $Data->section }}</span>
                                    </p>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <div class="grid grid-cols-3 gap-5">
                                        <p class="font-semibold col-span-1">Student ID</p>
                                        <p class="space-x-2 col-span-2">
                                            <span>:</span>
                                            <span>{{ $Data->student_id }}</span>
                                        </p>
                                    </div>
                                    <div class="grid grid-cols-3 gap-5">
                                        <p class="font-semibold col-span-1">Exam Name</p>
                                        <p class="space-x-2 col-span-2">
                                            <span>:</span>
                                            <span>{{ $exam_name }}</span>
                                        </p>
                                    </div>
                                    <div class="grid grid-cols-3 gap-5">
                                        <p class="font-semibold col-span-1">Year</p>
                                        <p class="space-x-2 col-span-2">
                                            <span>:</span>
                                            <span>{{ $year }}</span>
                                        </p>
                                    </div>
                                    <div class="grid grid-cols-3 gap-5">
                                        <p class="font-semibold col-span-1">Father Name</p>
                                        <p class="space-x-2 col-span-2">
                                            <span>:</span>
                                            <span>{{ $Data->father_name }}</span>
                                        </p>
                                    </div>
                                    <div class="grid grid-cols-3 gap-5">
                                        <p class="font-semibold col-span-1">Mobile No</p>
                                        <p class="space-x-2 col-span-2">
                                            <span>:</span>
                                            <span>{{ $Data->father_mobile }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="px-7 space-y-3">
                            <div class="">
                                @if ($subject != null)
                                    <div class="text-center">
                                        <h3 class="font-semibold text-white text-sm w-full bg-[#1E3A8A]">
                                            Exam Routine
                                        </h3>
                                        <div class="flex ">
                                            <!-- Left Table -->
                                            <table class="w-1/2 text-[12px] text-center rtl:text-right text-black">
                                                <thead class="bg-blue-400 border-b border-black text-white">
                                                    <tr class="text-[8px]">
                                                        <th scope="col" class="p-1">Subject</th>
                                                        <th scope="col" class="p-1">Exam Date</th>
                                                        <th scope="col" class="p-1">Exam Day</th>
                                                        <th scope="col" class="p-1">Start Time</th>
                                                        <th scope="col" class="p-1">End Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($subject as $key => $info)
                                                        @if ($key % 2 == 0)
                                                            <tr class="border-x-2 border-y-2 text-[8px]">
                                                                {{-- <td class="px-6 p-1 border-r-2">{{ $key + 1 }} --}}
                                                                </td>
                                                                <td class="p-1 border-r-2">
                                                                    {{ $info->subject_name }}</td>
                                                                <td class="p-1 border-r-2">{{ $info->exam_date }}
                                                                </td>
                                                                <td class="p-1 border-r-2">
                                                                    {{ \Carbon\Carbon::parse($info->exam_date)->format('l') }}
                                                                </td>
                                                                <td class="p-1 border-r-2">
                                                                    {{ $info->start_time }}</td>
                                                                <td class="p-1 border-r-2">{{ $info->end_time }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <!-- Right Table -->
                                            <table class="w-1/2 text-[12px] text-center rtl:text-right text-black">
                                                <thead class="bg-blue-400 border-b border-black text-white">
                                                    <tr class="text-[8px]">
                                                        <th scope="col" class="p-1">Subject</th>
                                                        <th scope="col" class="p-1">Exam Date</th>
                                                        <th scope="col" class="p-1">Exam Day</th>
                                                        <th scope="col" class="p-1">Start Time</th>
                                                        <th scope="col" class="p-1">End Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($subject as $key => $info)
                                                        @if ($key % 2 != 0)
                                                            <tr class="border-x-2 border-y-2 text-[8px]">
                                                                {{-- <td class="p-1 border-r-2">{{ $key + 1 }} --}}
                                                                </td>
                                                                <td class="p-1 border-r-2">
                                                                    {{ $info->subject_name }}</td>
                                                                <td class="p-1 border-r-2">{{ $info->exam_date }}
                                                                </td>
                                                                <td class="p-1 border-r-2">
                                                                    {{ \Carbon\Carbon::parse($info->exam_date)->format('l') }}
                                                                </td>
                                                                <td class="p-1 border-r-2">
                                                                    {{ $info->start_time }}</td>
                                                                <td class="p-1 border-r-2">{{ $info->end_time }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                @endif
                            </div>
                            <div>
                                @if ($admit != null)
                                    <div class="flex justify-between ">
                                        <div>
                                            <p
                                                class="text-sm mb-1 font-semibold text-white w-2/4 p-1  bg-[#1E3A8A] text-center">
                                                Instruction</p>
                                            @foreach ($admit as $item)
                                                <p class="mx-2.5">
                                                    <li class="text-[9px]">{{ $item->instruction }}</li>
                                                </p>
                                            @endforeach
                                        </div>
                                        <div>
                                            @php
                                                $results = [
                                                    'ID' => $Data->student_id,
                                                    'Name' => $Data->name,
                                                    'Roll' => $Data->student_roll,
                                                    'Class' => $Data->Class_name,
                                                    'Section' => $Data->section,
                                                    'Group' => $Data->group,
                                                ];
                                                $resultJson = json_encode($results);
                                                echo QrCode::size(50)->generate($resultJson);
                                            @endphp
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @php
                            $leftSignatures = [];
                            $centerSignatures = [];
                            $rightSignatures = [];
                        @endphp
                        @foreach ($setSignature as $sign)
                            @foreach ($signatures as $position)
                                @if ($position->sign == $sign->signature_name)
                                    @if ($sign->positions == 'left')
                                        @php
                                            $leftSignatures[] = $position;
                                        @endphp
                                    @elseif($sign->positions == 'center')
                                        @php
                                            $centerSignatures[] = $position;
                                        @endphp
                                    @elseif($sign->positions == 'right')
                                        @php
                                            $rightSignatures[] = $position;
                                        @endphp
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                        <div class="flex justify-between px-7 pt-5 pb-1">
                            <div class="">
                                @foreach ($leftSignatures as $left)
                                    @if ($left->image != null)
                                        <img class="w-20 h-10 object-cover mx-auto pb-1"
                                            src="{{ asset($left->image) }}" alt="Signature">
                                        <div class="border-t border-dashed border-t-black px-5 pt-1.5 text-xs">
                                            {{ $left->sign }}
                                        </div>
                                    @else
                                        <div class="w-20 h-10 object-cover mx-auto pb-1"></div>
                                        <div class="border-t border-dashed border-t-black px-5 pt-1.5 text-xs">
                                            {{ $left->sign }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="">
                                @foreach ($centerSignatures as $center)
                                    @if ($center->image != null)
                                        <img class="w-20 h-10 object-cover mx-auto pb-1"
                                            src="{{ asset($center->image) }}" alt="Signature">
                                        <div class="border-t border-dashed border-t-black px-5 pt-1.5 text-xs">
                                            {{ $center->sign }}
                                        </div>
                                    @else
                                        <div class="w-20 h-10 object-cover mx-auto pb-1"></div>
                                        <div class="border-t border-dashed border-t-black px-5 pt-1.5 text-xs">
                                            {{ $center->sign }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="">
                                @foreach ($rightSignatures as $right)
                                    @if ($right->image != null)
                                        <img class="w-20 h-10 object-cover mx-auto pb-1"
                                            src="{{ asset($right->image) }}" alt="Signature">
                                        <div class="border-t border-dashed border-t-black px-5 pt-1.5 text-xs ">
                                            {{ $right->sign }}
                                        </div>
                                    @else
                                        <div class="w-20 h-10 object-cover mx-auto pb-1"></div>
                                        <div class="border-t border-dashed border-t-black px-5 pt-1.5 text-xs ">
                                            {{ $right->sign }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

 <div class="flex justify-center pb-10">
    <button
    class="flex w-full items-center gap-3 rounded-md bg-rose-700 px-8 py-3.5 text-center text-sm font-medium text-white hover:bg-rose-800 focus:outline-none focus:ring-4 focus:ring-rose-300 sm:w-auto"
    id="download">Download as PDF</button>
 </div>

        <script>
            document.getElementById('download').addEventListener('click', () => {
                const element = document.getElementById('content');
                const sections = element.querySelectorAll('.page-break');
                const pageHeight = 841.89; // A4 size in points (1 point = 1/72 inch)
                const margin = 20; // Margin between admit cards
                const padding = 40; // Padding for full print page
    
                let currentY = padding; // Start with padding
    
                sections.forEach((section, index) => {
                    const sectionHeight = section.clientHeight + margin;
    
                    if (currentY + sectionHeight > pageHeight - padding && index !== 0) {
                        section.classList.add('page-break');
                        currentY = padding; // Reset currentY for new page with padding
                    } else {
                        currentY += sectionHeight;
                        section.classList.remove('page-break');
                    }
                });
    
                const opt = {
                    margin: 0.5,
                    filename: 'admit-cards.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'pt', format: 'a4', orientation: 'portrait' },
                    pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
                };
    
                html2pdf().set(opt).from(element).save();
            });
        </script>


`       
</body>

</html>
