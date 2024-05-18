<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Class Section Student Total Information</title>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>
    <style>
        td,
        th {
            border: 1px solid rgb(202, 202, 202);
        }
    </style>
</head>

<body>
    <div class=" md:w-[1500px] px-[120px] mx-auto" id="page" >
        <div class=" p-5">
            @foreach($schoolInfo as $schoolData)
            <div class=" flex justify-center ">
                <img src="{{ asset($schoolData->logo) }}" alt="School Logo" class="w-[200px] h-[200px]"/>
            </div>
            <div class="md:flex justify-center  w-full px-5">
                <div class="text-center">
                    <h1 class="text-2xl font-bold ">{{$schoolData->school_name}}</h1>
                    <p class="text-sm ">Contact: {{$schoolData->school_phone}}</p>
                    <p class="text-sm ">Email: {{$schoolData->school_email}}</p>
                    <p class="text-sm ">Website: {{$schoolData->website}}</p>
                    <p class="text-sm ">Print date: {{$date}}</p>
                </div>
                <!-- <div>
                </div> -->
            </div>
            @endforeach
           
        </div>
        <p class="font-bold font-semi-bold text-center text-xl">Student Total Summary</p>
        <div>
            {{-- --}}
        </div>
    
    <!-- <div class="grid grid-cols-12 ">
            <div class="border p-1 col-span-1">class</div>
            <div class="border p-1 col-span-5">1</div>
            <div class="border p-1 col-span-1">class</div>
            <div class="border p-1 col-span-2">1</div>
            <div class="border p-1 col-span-1">class</div>
            <div class="border p-1 col-span-2">1</div>
            <div class="border p-1 col-span-2">Year</div>
            <div class="border p-1 col-span-10">1</div>
        </div> -->

    {{-- --}}
    <div class="flex flex-col overflow-x-auto bg-white">
        <div class="">
       
     
  
            <div class="inline-block min-w-full py-2">
                <div class="">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border font-medium">
                            <tr>
                                <th scope="col" class="min-w-16 max-w-32 p-3">SL</th>
                                <th scope="col" class="min-w-16 max-w-32 p-3">Class</th>
                                <th scope="col" class="min-w-16 max-w-32 p-3">Section</th>
                                <th scope="col" class="min-w-16 max-w-32 p-3">Section Student</th>
                                <th scope="col" class="min-w-16 max-w-32 p-3">Group</th>
                                <th scope="col" class="min-w-16 max-w-32 p-3">Group Student</th>
                                <th scope="col" class="min-w-16 max-w-32 p-3">Class Total Student</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $stu=0;
                            @endphp

                            @if($class===null)
                            @foreach($classes as $key => $class)
                            <tr class="border table_row">
                                <td class="min-w-16 max-w-32 p-3 font-medium">{{ $key + 1 }}</td>
                                <td class="min-w-16 max-w-32 p-3 font-medium">{{ $class->class_name }}</td>
                                @php
                                $sec = $sections->where('class_name', $class->class_name)->where('school_code',$school_code);
                                $groupData = $groups->where('class_name', $class->class_name)->where('school_code',$school_code);
                               
                                $totalStudents = 0;
                                $totalGroup=0;


                                @endphp
                                <td class="min-w-16 max-w-32 p-3 font-medium">
                                    @foreach($sec as $data)
                                    <div>
                                        {{$data->section_name}}
                                    </div>
                                    @endforeach

                                </td>
                                <td class="min-w-16 max-w-32 p-3 font-medium">
                                    @foreach($sec as $data)
                                    <div class="">
                                        @php
                                        $sectionStudents = $students->where('Class_name', $class->class_name)->where('section', $data->section_name);
                                        $sectionStudentCount = $sectionStudents->count();
                                        $totalStudents =$totalStudents+ $sectionStudentCount;
                                        @endphp
                                        {{ $sectionStudentCount }}
                                    </div>
                                    @endforeach
                                </td>
                                <td>
                                @foreach($groupData as $data)
                                    <div>
                                        {{$data->group_name}}
                                    </div>
                                    @endforeach
                                </td>
                                <td>
                                @foreach($groupData as $group)
                                    <div>
                                        @php
                                        $groupStudents = $students->where('Class_name', $class->class_name)->where('group', $group->group_name);
                                        
                                        $groupStudentCount = $groupStudents->count();
                                       
                                        $totalGroup =$totalGroup+ $groupStudentCount;
                                        @endphp
                                        {{ $groupStudentCount }}
                                    </div>
                                    @endforeach
                                </td>
                                <td class="min-w-16 max-w-32 p-3 font-medium">

                                    {{$totalGroup}}

                                </td>

                                @php
                                $stu=$stu+$totalGroup;

                                @endphp

                            </tr>

                            @endforeach
                            @else
                            
                            @foreach($classes as $key => $class)
                            <tr class="border table_row">
                                <td class="min-w-16 max-w-32 p-3 font-medium">{{ $key + 1 }}</td>
                                <td class="min-w-16 max-w-32 p-3 font-medium">{{ $class->class_name }}</td>
                                @php
                                $sec = $sections->where('class_name', $class->class_name)->where('school_code',$school_code);
                                $groupData = $groups->where('class_name', $class->class_name)->where('school_code',$school_code);
                               
                                $totalStudents = 0;
                                $totalGroup=0;


                                @endphp
                                <td class="min-w-16 max-w-32 p-3 font-medium">
                                    @foreach($sec as $data)
                                    <div>
                                        {{$data->section_name}}
                                    </div>
                                    @endforeach

                                </td>
                                <td class="min-w-16 max-w-32 p-3 font-medium">
                                    @foreach($sec as $data)
                                    <div class="">
                                        @php
                                        $sectionStudents = $students->where('Class_name', $class->class_name)->where('section', $data->section_name);
                                        $sectionStudentCount = $sectionStudents->count();
                                        $totalStudents =$totalStudents+ $sectionStudentCount;
                                        @endphp
                                        {{ $sectionStudentCount }}
                                    </div>
                                    @endforeach
                                </td>
                                <td>
                                @foreach($groupData as $data)
                                    <div>
                                        {{$data->group_name}}
                                    </div>
                                    @endforeach
                                </td>
                                <td>
                                @foreach($groupData as $group)
                                    <div>
                                        @php
                                        $groupStudents = $students->where('Class_name', $class->class_name)->where('group', $group->group_name);
                                        
                                        $groupStudentCount = $groupStudents->count();
                                       
                                        $totalGroup =$totalGroup+ $groupStudentCount;
                                        @endphp
                                        {{ $groupStudentCount }}
                                    </div>
                                    @endforeach
                                </td>
                                <td class="min-w-16 max-w-32 p-3 font-medium">

                                    {{$totalGroup}}

                                </td>

                                @php
                                $stu=$stu+$totalGroup;

                                @endphp

                            </tr>

                            @endforeach

                            @endif
                           

                            
                        </tbody>
                    </table>

                    <div class="flex justify-end">
                        <h3 class="mr-5">
                            Total Student:
                        </h3>
                        <input type="text" value="{{$stu}}">
                    </div>
                </div>
            </div>
        </div>

    </div>





    <button id="btn" type="button"
                class="text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Download</button>
    </div>
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
</body>

</html>