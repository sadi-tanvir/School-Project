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

<body>
    <div id="page" class="p-5">

        <div class="relative mx-auto mt-20 max-w-[1100px] border-4 border-[#1E3A8A]">
            <div class="pb-5">
                <div class="flex justify-center">
                    <img id="background-image" src="{{ asset($school_info->logo) }}" alt=""
                        class="h-[100px] w-[100px]" />
                </div>
                <div class="flex justify-center">
                    <h3 class="text-3xl font-bold">{{ $school_info->school_name }}</h3>
                </div>
                <div class="flex justify-center">
                    <p class="text-sm">{{ $school_info->address }} <br>
                </div>
                <div class="flex justify-center">
                    Contact No: {{ $school_info->mobile_number }}<br>
                </div>
                <div class="flex justify-center">
                    Email: {{ $school_info->school_email }}<br>
                </div>
                <div class="flex justify-center">
                    Website: {{ $school_info->website }}<br>
                </div>
                <div class="flex justify-center">
                    Print date:{{ $date }}</p>
                </div>
            </div>

            <div class="flex justify-center p-10 ">
                <table class="w-full text-sm text-center rtl:text-right text-black">
                    <thead class=" text-white  bg-blue-600 border-b border-blue-400 ">
                        <tr>
                            <th cope="col" class="px-2 py-2 bg-blue-500">Student ID</th>
                            <th class="px-2 py-2">Student Roll</th>
                            <th cope="col" class="px-2 py-2 bg-blue-500">Student Name</th>
                            <th class="px-2 py-2"> Class</th>
                            <th cope="col" class="px-2 py-2 bg-blue-500"> Group</th>
                            <th class="px-2 py-2"> Section</th>
                            <th cope="col" class="px-2 py-2 bg-blue-500">Father Name</th>
                            <th class="px-2 py-2">Mother Name</th>
                            <th class="px-2 py-2">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $info)
                            <tr class=" border-x-2 border-y-2">
                                <td class="px-6 py-4 border-r-2">{{ $info->student_id }}</td>
                                <td class="px-6 py-4 border-r-2">{{ $info->student_roll }}</td>
                                <td class="px-6 py-4 border-r-2">{{ $info->name }}</td>
                                <td class="px-6 py-4 border-r-2">{{ $info->Class_name }}</td>
                                <td class="px-6 py-4 border-r-2">{{ $info->group }}</td>
                                <td class="px-6 py-4 border-r-2">{{ $info->section }}</td>
                                <td class="px-6 py-4 border-r-2">{{ $info->father_name }}</td>
                                <td class="px-6 py-4 border-r-2">{{ $info->mother_name }}</td>
                                <td class="px-6 py-4 border-r-2">
                                    <img id="background-image" src="{{asset($info->image)}}" alt=""
                                    class="h-[100px] w-[100px]" /></td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>

        </div>

    </div>
    <div class="flex justify-center px-20">
        <a href="{{route('siblings',$school_code)}}">
        <button class="flex w-full items-center gap-3 rounded-md bg-blue-700 px-8 py-3.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 sm:w-auto mr-10">
           Back
        </button>
    </a>


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
            output: './pdf/generate.pdf',
        });
    });
</script>

</html>
