<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admission Summary</title>
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
                <p class="font-bold font-semi-bold text-center text-xl">Admission Summary</p>
            </div>
            <div>{{--  --}}</div>
        </div>
        <div class="flex flex-col overflow-x-auto bg-white">
            <div class="">
                <div class="inline-block min-w-full py-2">
                    <div class="">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium">
                                <tr>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">sl</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Class</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Old Student</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">New Student</th>
                                    <th scope="col" class="min-w-16 max-w-32 p-3">Total Student</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b table_row">
                                    <td colspan="2" class="min-w-16 max-w-32 p-3 font-medium text-right">Total</td>
                                    <td class="min-w-16 max-w-32 p-3">0</td>
                                    <td class="min-w-16 max-w-32 p-3">0</td>
                                    <td class="min-w-16 max-w-32 p-3">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
