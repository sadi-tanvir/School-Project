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
        td,th {
            border : 1px solid rgb(202, 202, 202);
        }
    </style> 
</head>

<body >
    <div class=" w-[1500px] px-[120px] mx-auto">
        <div class="flex w-full justify-between items-center p-5">
            <div>
                <img src="https://i.pinimg.com/originals/82/c6/5b/82c65b9bb0a75026fc4c82a438b4cc9b.jpg"
                    class="rounded-full w-28 h-28" alt="">
            </div>
            <div class="text-center">
                <h3 class="text-2xl text-blue-400 font-bold">Pallabi Mazedul Islam Model High School</h3>
                <p class="text-sm">13/14, Pallabi, Dhaka - 1216. <br>
                    Contact No: 01309108183 <br>
                    Email: mimodelschool1978@gmail.com <br>
                    Website: <a href="http://pmimhs.edu.bd/" class="text-blue-500">pmimhs.edu.bd</a> <br>
                    <span class="text-red-500"> Print date:14-03-2024</span>
                </p>
                <p class="font-bold font-semi-bold text-center text-xl">Student Information</p>
            </div>
            <div>
                {{--  --}}
            </div>
        </div>
        <div class="grid grid-cols-12 ">
            <div class="border p-1 col-span-1">class</div>
            <div class="border p-1 col-span-5">1</div>
            <div class="border p-1 col-span-1">class</div>
            <div class="border p-1 col-span-2">1</div>
            <div class="border p-1 col-span-1">class</div>
            <div class="border p-1 col-span-2">1</div>
            <div class="border p-1 col-span-2">Year</div>
            <div class="border p-1 col-span-10">1</div>
        </div>

        {{--  --}}
        <div class="flex flex-col overflow-x-auto bg-white">
            <div class="">
                <div class="inline-block min-w-full py-2">
                    <div class="">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border font-medium">
                                <tr>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Class</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Total Student</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Male</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Female</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Islam</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Hinduism</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Buddhism</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Christian</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Active</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Inactive</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border table_row">
                                    <td class="min-w-16 max-w-32 p-3 font-medium">1</td>
                                    <td class="min-w-16 max-w-32 p-3">Cell Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ame.</td>
                                    <td class="min-w-16 max-w-32 p-3">Cell</td>
                                    <td class="min-w-16 max-w-32 p-3">Cell</td>
                                    <td class="min-w-16 max-w-32 p-3">Cell</td>
                                    <td class="min-w-16 max-w-32 p-3">Cell</td>
                                    <td class="min-w-16 max-w-32 p-3">Cell</td>
                                    <td class="min-w-16 max-w-32 p-3">Cell</td>
                                    <td class="min-w-16 max-w-32 p-3">Cell</td>
                                    <td class="min-w-16 max-w-32 p-3">Cell</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <button id="btn" type="button"
                class="text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Download</button>
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

