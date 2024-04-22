 @extends('Backend.app')
@section('title')
    Student Details Information
@endsection
<style>
    tr>td {
        border: 1px solid rgb(204, 202, 202);
    }
    .table_row:hover {
        background: rgb(252, 249, 217);
    }
  
    .active {
        background-image: radial-gradient(circle at bottom right, rgb(52, 33, 141) 0%, rgb(52, 33, 141) 20%,rgb(52, 50, 168) 20%, rgb(52, 50, 168) 40%,rgb(52, 68, 195) 40%, rgb(52, 68, 195) 60%,rgb(52, 85, 221) 60%, rgb(52, 85, 221) 80%,rgb(52, 102, 248) 80%, rgb(52, 102, 248) 100%)!important;
}
.backgroound{
    background-image: radial-gradient(circle at bottom right, rgb(52, 33, 141) 0%, rgb(52, 33, 141) 20%,rgb(52, 50, 168) 20%, rgb(52, 50, 168) 40%,rgb(52, 68, 195) 40%, rgb(52, 68, 195) 60%,rgb(52, 85, 221) 60%, rgb(52, 85, 221) 80%,rgb(52, 102, 248) 80%, rgb(52, 102, 248) 100%);
}
    .tabcontent {
        display: none;
        border-top: none;
    }
</style>

@section('Dashboard')
    @include('Message.message')
      <div class=" ">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-5">
            {{--  left--}}
            <div class="md:col-span-3">
                <div class="bg-green-200 py-2 px-5 backgroound gap-2 flex flex-col justify-center items-center">
                    <img class="w-28 object-cover" src="https://i.pinimg.com/564x/c4/57/bd/c457bd9496170bfa3845b7cee775df65.jpg" alt="">
                    <p class="text-white font-bold">User Name</p>
                </div>
                <div class="bg-white w-full border-2 space-y-2 border-green-200 p-1">
                    <div class="flex justify-between border-b-2">
                        <p>Student Id </p>
                        <p>skjdhjksdhsjhs</p>
                    </div>
                    <div class="flex justify-between border-b-2">
                        <p>Student Id </p>
                        <p>skjdhjksdhsjhs</p>
                    </div>
                    <div class="flex justify-between border-b-2">
                        <p>Student Id </p>
                        <p>skjdhjksdhsjhs</p>
                    </div>
                    <div class="flex justify-between border-b-2">
                        <p>Student Id </p>
                        <p>skjdhjksdhsjhs</p>
                    </div>
                    <div class="flex justify-between border-b-2">
                        <p>Student Id </p>
                        <p>skjdhjksdhsjhs</p>
                    </div>
                    <!-- More student info here -->
                </div>
            </div>

            <div class="md:col-span-9 border border-blue-30 bg-slate-200">

                {{--  button--}}
                <div class="flex p-2 items-center text-white bg-white">
                    <button class="bg-blue-500 hover:bg-blue-400 transition-all w-fit m p-3 tablinks" onclick="openTab(event, 'details')" id="defaultOpen">Student Details</button>

                    <button class="bg-blue-500 hover:bg-blue-400 transition-all w-fit m p-3 tablinks" onclick="openTab(event, 'fees')">Fees</button>

                    <button class="bg-blue-500 hover:bg-blue-400 transition-all w-fit m p-3 tablinks" onclick="openTab(event, 'exam')">Exam</button>

                    <button class="bg-blue-500 hover:bg-blue-400 transition-all w-fit m p-3 tablinks" onclick="openTab(event, 'grand_final')">Grand Final</button>

                    <button class="bg-blue-500 hover:bg-blue-400 transition-all w-fit m p-3 tablinks" onclick="openTab(event, 'attendence')">Attendence</button>
                </div>
                {{--Tab 1  --}}
                <div id="details" class="tabcontent">
                    {{-- info --}}
                    <div class="grid grid-cols-12 w-fit ">
                        <!-- Student details here -->
                        <div class="border p-2 border-white font-bold col-span-12">Student Details</div>

                        <div class="border p-2 border-white col-span-2">Studnet's Name</div>
                        <div class="border p-2 border-white col-span-4"></div>
                        <div class="border p-2 border-white col-span-2">Mobile No</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                    
                        <div class="border p-2 border-white col-span-2">Date of Birth</div>
                        <div class="border p-2 border-white col-span-2">26-9-9999</div>
                        <div class="border p-2 border-white col-span-2">Nationality</div>
                        <div class="border p-2 border-white col-span-2">26-9-9999</div>
                        <div class="border p-2 border-white col-span-2">Blood Group</div>
                        <div class="border p-2 border-white col-span-2">26-9-9999</div>
                    
                        <div class="border p-2 border-white col-span-2">Father's Name</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                        <div class="border p-2 border-white col-span-2">Mother's Name</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                    
                        <div class="border p-2 border-white col-span-2">Father Proffession</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                        <div class="border p-2 border-white col-span-2">Mother Proffession</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                     
                        <div class="border p-2 border-white col-span-2">Father mobile</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                        <div class="border p-2 border-white col-span-2">Mother mobile</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                        <div class="border p-2 border-white col-span-2">Father email</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                        <div class="border p-2 border-white col-span-2">Mother email</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                      
                        <div class="border p-2 border-white font-bold col-span-12">Present Address </div>
                        <div class="border p-2 border-white col-span-12">Village</div>
                        <div class="border p-2 border-white col-span-2">POst Office</div>
                        <div class="border p-2 border-white col-span-4"></div>
                        <div class="border p-2 border-white col-span-2">Post Code</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                        <div class="border p-2 border-white col-span-2">Thana</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                        <div class="border p-2 border-white col-span-2">District</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                    
                    
                        <div class="border p-2 border-white font-bold col-span-12">Permanent Address </div>
                        <div class="border p-2 border-white col-span-12">Village</div>
                        <div class="border p-2 border-white col-span-2">POst Office</div>
                        <div class="border p-2 border-white col-span-4"></div>
                        <div class="border p-2 border-white col-span-2">Post Code</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                        <div class="border p-2 border-white col-span-2">Thana</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                        <div class="border p-2 border-white col-span-2">District</div>
                        <div class="border p-2 border-white col-span-4">26-9-9999</div>
                    </div>
                    {{-- table --}}
                    <div class="flex flex-col overflow-x-auto bg-white">
                        <div class="">
                            <div class="inline-block min-w-full py-2">
                                <div class="">
                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead class="border-b font-medium">
                                            <tr>
                                                <th scope="col" class="min-w-16 max-w-32 p-3">sl</th>
                                                <th scope="col" class="min-w-16 max-w-32 p-3">Exam Name</th>
                                                <th scope="col" class="min-w-16 max-w-32 p-3">Institution Name</th>
                                                <th scope="col" class="min-w-16 max-w-32 p-3">Division</th>
                                                <th scope="col" class="min-w-16 max-w-32 p-3">Roll</th>
                                                <th scope="col" class="min-w-16 max-w-32 p-3">Reg No.</th>
                                                <th scope="col" class="min-w-16 max-w-32 p-3">Gpa</th>
                                                <th scope="col" class="min-w-16 max-w-32 p-3">Year</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b table_row">
                                                <td class="min-w-16 max-w-32 p-3 font-medium">1</td>
                                                <td class="min-w-16 max-w-32 p-3">Cell Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ame.</td>
                                                <td class="min-w-16 max-w-32 p-3">Cell</td>
                                                <td class="min-w-16 max-w-32 p-3">Cell</td>
                                                <td class="min-w-16 max-w-32 p-3">Cell</td>
                                                <td class="min-w-16 max-w-32 p-3">Cell</td>
                                                <td class="min-w-16 max-w-32 p-3">Cell</td>
                                                <td class="min-w-16 max-w-32 p-3">Cell</td>
                                            </tr>
                                            <!-- More rows here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--tab2 --}}
                <div id="fees" class="tabcontent">
                            {{-- table --}}
                            <div class="flex flex-col overflow-x-auto bg-white">
                                <div class="">
                                    <div class="inline-block min-w-full py-2">
                                        <div class="">
                                            <table class="min-w-full text-left text-sm font-light">
                                                <thead class="border-b font-medium">
                                                    <tr>
                                                        <th scope="col" class="min-w-16 max-w-32 p-3">sl</th>
                                                        <th scope="col" class="min-w-16 max-w-32 p-3">Month Name</th>
                                                        <th scope="col" class="min-w-16 max-w-32 p-3">Payslip</th>
                                                        <th scope="col" class="min-w-16 max-w-32 p-3">Payable</th>
                                                        <th scope="col" class="min-w-16 max-w-32 p-3">Discount</th>
                                                        <th scope="col" class="min-w-16 max-w-32 p-3">Fine</th>
                                                        <th scope="col" class="min-w-16 max-w-32 p-3">Recived</th>
                                                        <th scope="col" class="min-w-16 max-w-32 p-3">Due</th>
                                                        <th scope="col" class="min-w-16 max-w-32 p-3">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="border-b table_row">
                                                        <td colspan="3" class="min-w-16 max-w-32 p-3 font-medium text-right">Total</td>
                                                        <td class="min-w-16 max-w-32 p-3">0</td>
                                                        <td class="min-w-16 max-w-32 p-3">0</td>
                                                        <td class="min-w-16 max-w-32 p-3">0</td>
                                                        <td class="min-w-16 max-w-32 p-3">0</td>
                                                        <td class="min-w-16 max-w-32 p-3">0</td>
                                                        <td class="min-w-16 max-w-32 p-3"></td>
                                                    </tr>
                                                    <!-- More rows here -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>

                  {{--tab3 --}}
                  <div id="exam" class="tabcontent">

                    <form class="p-5 flex justify-between items-end gap-10">
                        <div class="inline-block w-full space-y-2"> 
                            <label for="exam_name">Exam Name</label>
                            <select id="exam_name" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500">
                                   <option>Choose an option</option>
                                   <option>Option 1</option>
                                   <option>Option 2</option>
                                   <option>Option 3</option>
                                   <option>Option 4</option>
                            </select>
                        </div>

                        <div class="inline-block w-full space-y-2"> 
                            <label for="year">Academic Year</label>
                            <select id="year" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500">
                                   <option>Choose an option</option>
                                   <option>Option 1</option>
                                   <option>Option 2</option>
                                   <option>Option 3</option>
                                   <option>Option 4</option>
                            </select>
                        </div>
                        
                        <button class=" bg-blue-500 text-white  hover:bg-blue-400 px-4 py-2 pr-8 rounded shadow leading-tight">Search</button>
                    </form>
                </div>

                  {{--tab4 --}}
                  <div id="grand_final" class="tabcontent">
                    <form class="p-5 flex justify-between items-end gap-10">
                        <div class="inline-block w-full space-y-2"> 
                            <label for="exam_name">Exam Name</label>
                            <select id="exam_name" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500">
                                   <option>Choose an option</option>
                                   <option>Option 1</option>
                                   <option>Option 2</option>
                                   <option>Option 3</option>
                                   <option>Option 4</option>
                            </select>
                        </div>
                        <div class="inline-block w-full space-y-2"> 
                            <label for="year">Academic Year</label>
                            <select id="year" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500">
                                   <option>Choose an option</option>
                                   <option>Option 1</option>
                                   <option>Option 2</option>
                                   <option>Option 3</option>
                                   <option>Option 4</option>
                            </select>
                        </div>
                        <button class=" bg-blue-500 text-white  hover:bg-blue-400 px-4 py-2 pr-8 rounded shadow leading-tight">Search</button>
                    </form>
                </div>

                  {{--tab5 --}}
                  <div id="attendence" class="tabcontent">
                    <form class="p-5 flex justify-between items-end gap-10">
                        <div class="inline-block w-full space-y-2"> 
                            <label for="month_name">Month Name</label>
                            <select id="month_name" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500">
                                   <option>Choose an option</option>
                                   <option>Option 1</option>
                                   <option>Option 2</option>
                                   <option>Option 3</option>
                                   <option>Option 4</option>
                            </select>
                        </div>
                        <div class="inline-block w-full space-y-2"> 
                            <label for="year">Academic Year</label>
                            <select id="year" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500">
                                   <option>Choose an option</option>
                                   <option>Option 1</option>
                                   <option>Option 2</option>
                                   <option>Option 3</option>
                                   <option>Option 4</option>
                            </select>
                        </div>
                        <button class=" bg-blue-500 text-white  hover:bg-blue-400 px-4 py-2 pr-8 rounded shadow leading-tight">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   {{-- scripts --}}
    
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
@endsection















{{-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Profile</title>

</head>

<body>
 

</body>

</html> --}}
