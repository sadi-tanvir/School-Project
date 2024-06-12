<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Admit Card</title>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>
</head>
<title>Document</title>
</head>

<body>
    <div class="mx-20 mt-5">


        <div id="page" class="grid grid-cols-3 gap-5 ">
            @foreach ($Data as $Data)
                <div class="max-w-lg mx-auto border-2 border-zinc-300 p-4 rounded-lg">
                    <div class="flex justify-between  items-center mb-4"> <img src="{{ asset($Data->image) }}"
                            alt="School Logo" class="w-12 h-12">
                        <div>
                            <h1 class="text-xl font-bold text-center">{{$school_info->school_name}}</h1>
                            <p class="text-center text-sm">{{$school_info->address}}, Contact No:
                                {{$school_info->mobile_number}},
                                Email: {{$school_info->school_email}}, Website: {{$school_info->website}}
                            </p>
                        </div>
                        <img src="{{asset($school_info->logo)}}" alt="School Logo" class="w-12 h-12">
                    </div>
                    <div class="text-center mb-4">
                        <h2 class="text-lg font-semibold">{{$exam_name}} - {{$year}}</h2>
                        <h3 class="text-md font-bold">Exam Seat Plan</h3>
                    </div>
                    <hr class=" mb-4">
                    <div class="flex justify-between gap-4 ">
                        <div>
                            <p><strong>Name</strong> : {{$Data->name}}</p>
                            <p><strong>Student ID</strong> : {{$Data->student_id}}</p>
                            <p><strong>Class</strong> : {{$Data->Class_name}}</p>
                            <p><strong>Section</strong> : {{$Data->section}}</p>
                        </div>
                        <div class="w-20 border-2 border-zinc-300 rounded-lg ">
                            <div class="text-center ">
                                <p class="text-lg font-bold w-full border-b ">ROLL</p>
                                <p class="text-2xl font-bold">{{$Data->roll}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <div class="mt-10 flex justify-center gap-4">
            <div class="">
                <a href="/dashboard/printSeatPlan/{{ $school_code }}">
                    <button type="button"
                        class="flex w-full items-center gap-3 rounded-lg bg-blue-700 px-8 py-3.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 sm:w-auto">
                        <span>
                            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path opacity="0.5"
                                        d="M20 12.75C20.4142 12.75 20.75 12.4142 20.75 12C20.75 11.5858 20.4142 11.25 20 11.25V12.75ZM20 11.25H4V12.75H20V11.25Z"
                                        fill="#ffffff"></path>
                                    <path d="M10 6L4 12L10 18" stroke="#ffffff" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </span>
                        <span>Back</span>
                    </button>
                </a>
            </div>

            <div>
                {{--
                <a
                    href="{{ route('admit-card.download', ['schoolCode' => $Data->school_code, 'class' => $Data->class_name, 'group' => $Data->group, 'section_name' => $Data->section, 'id' => $Data->student_id, 'exam_name' => $exam_name, 'year' => $year]) }}">
                    <button id="" type="button"
                        class="text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Download</button>
                </a>
                --}}

                <button id="btn" type="button"
                    class="flex w-full items-center gap-3 rounded-md bg-rose-700 px-8 py-3.5 text-center text-sm font-medium text-white hover:bg-rose-800 focus:outline-none focus:ring-4 focus:ring-rose-300 sm:w-auto">
                    <span>
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M12.5535 16.5061C12.4114 16.6615 12.2106 16.75 12 16.75C11.7894 16.75 11.5886 16.6615 11.4465 16.5061L7.44648 12.1311C7.16698 11.8254 7.18822 11.351 7.49392 11.0715C7.79963 10.792 8.27402 10.8132 8.55352 11.1189L11.25 14.0682V3C11.25 2.58579 11.5858 2.25 12 2.25C12.4142 2.25 12.75 2.58579 12.75 3V14.0682L15.4465 11.1189C15.726 10.8132 16.2004 10.792 16.5061 11.0715C16.8118 11.351 16.833 11.8254 16.5535 12.1311L12.5535 16.5061Z"
                                    fill="#ffffff"></path>
                                <path
                                    d="M3.75 15C3.75 14.5858 3.41422 14.25 3 14.25C2.58579 14.25 2.25 14.5858 2.25 15V15.0549C2.24998 16.4225 2.24996 17.5248 2.36652 18.3918C2.48754 19.2919 2.74643 20.0497 3.34835 20.6516C3.95027 21.2536 4.70814 21.5125 5.60825 21.6335C6.47522 21.75 7.57754 21.75 8.94513 21.75H15.0549C16.4225 21.75 17.5248 21.75 18.3918 21.6335C19.2919 21.5125 20.0497 21.2536 20.6517 20.6516C21.2536 20.0497 21.5125 19.2919 21.6335 18.3918C21.75 17.5248 21.75 16.4225 21.75 15.0549V15C21.75 14.5858 21.4142 14.25 21 14.25C20.5858 14.25 20.25 14.5858 20.25 15C20.25 16.4354 20.2484 17.4365 20.1469 18.1919C20.0482 18.9257 19.8678 19.3142 19.591 19.591C19.3142 19.8678 18.9257 20.0482 18.1919 20.1469C17.4365 20.2484 16.4354 20.25 15 20.25H9C7.56459 20.25 6.56347 20.2484 5.80812 20.1469C5.07435 20.0482 4.68577 19.8678 4.40901 19.591C4.13225 19.3142 3.9518 18.9257 3.85315 18.1919C3.75159 17.4365 3.75 16.4354 3.75 15Z"
                                    fill="#ffffff"></path>
                            </g>
                        </svg>
                    </span>
                    <span>Download</span>
                </button>
            </div>
        </div>
</body>
<script>
    let btn = document.getElementById('btn');
    let page = document.getElementById('page');

    btn.addEventListener('click', function () {
        html2PDF(page, {
            jsPDF: {
                format: 'a4',
            },
            imageType: 'image/jpeg',
            output: './pdf/generate.pdf',
        });
    });
</script>

</html>