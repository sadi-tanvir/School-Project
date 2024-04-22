<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Admit Card</title>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>
<style>
    th,td{
        border: 1px solid rgb(195, 195, 195);
    }
</style>
</head>

<body>

    <div id="page" class="max-w-[1100px] mx-auto ">
        <div class="flex w-full justify-between items-center p-5  ">
            <div><img src="https://cdn.pixabay.com/photo/2023/01/13/17/44/red-7716610_640.png"
                    class="rounded-full w-28 h-28" alt=""></div>
            <div class="text-center">
                <h3 class="text-xl">Pallabi Mazedul Islam Model High School</h3>
                <p class="text-sm">13/14,Pallabi, Dhaka - 1216. <br>

                    Contact No: 01309108183 <br>

                    Email: mimodelschool1978@gmail.com <br>

                    Website: http://pmimhs.edu.bd/ <br>

                    Print date:14-03-2024</p>
                <p class="text-purple-500 font-bold font-semi-bold text-center">Student List</p>
            </div>
            <div><img src="https://cdn.pixabay.com/photo/2023/01/13/17/44/red-7716610_640.png"
                    class="rounded-full w-28 h-28" alt=""></div>
        </div>
        <div class="flex justify-center w-full p-5">
            @if($students != null)
            @if(!is_null($students) && count($students) > 0)
        <div id="page" class="mx-10">
        
        
            <table class="w-full text-sm text-left rtl:text-right text-black " >
                <thead class="text-lg uppercase  border">
                    <tr>
                    
        
                        <th scope="col" class="px-6 py-3">
                        Student ID</th>
                        <th scope="col" class="px-6 py-3">
                        Name</th>
                        <th scope="col" class="px-6 py-3">
                        Roll</th>
                        <th scope="col" class="px-6 py-3">
                        Mobile</th>
                        @foreach ($col as $column)
        
                        <th scope="col" class="px-6 py-3">
                        {{ $column }}</th>
        
                        @endforeach
                    
                    </tr>
        
                </thead>
        
                <tbody>
        
                    @foreach ($students as $student)
        
                        <tr class="border">
                        
                            <td class="px-6 py-4">{{$student->student_id}}</td>
                            <td class="px-6 py-4">{{$student->name}}</td>
                            <td class="px-6 py-4">{{$student->roll}}</td>
                            <td class="px-6 py-4">{{$student->father_mobile}}</td>
                            @foreach ($col as $column)
                @if ($column == 'image') <!-- Assuming 'image' is the column name for the image field -->
                    <td class="px-6 py-4"><img src="{{ asset('path_to_your_images_folder/' . $student->$column) }}" alt="Student Image"></td>
                @else
                    <td class="px-6 py-4">{{ $student->$column }}</td>
                @endif
            @endforeach
                        </tr>
        
                    @endforeach
        
                </tbody>
        
            </table>
        
        @else
        
            <p>No students found.</p>
        
        @endif
        @endif
        
        </div>
        </div>
      
    </div>

    <div class="flex justify-center mt-10">
        <div class="mr-10">

            <a href="/dashboard/studentListWithPhoto/{{ $school_code }}">
                <button type="button"
                    class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Back</button>
            </a>
        </div>

        <div>

            <button id="btn" type="button"
                class="text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Download</button>
        </div>

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
