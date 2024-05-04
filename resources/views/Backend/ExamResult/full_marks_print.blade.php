<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Full Marks Print</title>
<style>
  td, th, ._grid {
    border: 1px solid lightblue;
    padding : 4px;
  }

.button-56 {
  align-items: center;
  background-color: blue;
  border: 2px solid white;
  border-radius: 8px;
  box-sizing: border-box;
  color: white;
  cursor: pointer;
  display: flex;
  font-family: Inter,sans-serif;
  font-size: 16px;
  height: 48px;
  justify-content: center;
  line-height: 24px;
  max-width: 100%;
  padding: 0 25px;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-56:after {
  background-color: #0080ff;
  border-radius: 8px;
  content: "";
  display: block;
  height: 48px;
  left: 0;
  width: 100%;
  position: absolute;
  top: -2px;
  transform: translate(8px, 8px);
  transition: transform .2s ease-out;
  z-index: -1;
}

.button-56:hover:after {
  transform: translate(0, 0);
}

.button-56:active {
  background-color: #ffdeda;
  outline: 0;
}

.button-56:hover {
  outline: 0;
}

@media (min-width: 768px) {
  .button-56 {
    padding: 0 40px;
  }
}
</style>
    <script src="https://cdn.tailwindcss.com"></script>
    
    
</head>
<body class="bg-white dark:bg-zinc-800">

<div class="flex justify-between">
  <button id="downloadBtn" class="button-56 lg:mx-32 mt-5" role="button">Download As PDF</button>
  <button id="downloadPrint" class="button-56 lg:mx-32 mt-5" role="button">Print</button>
</div>
<div id="content" class="container mx-auto px-4 py-8 space-y-10">
  
  @foreach($schoolInfo as $schoolData)
       <div class="flex items-center justify-between  w-full px-5">
            <div>
                <img src="{{asset($schoolData->logo)}}" alt="School Logo" class="pr-4 w-32" />
            </div>
                <div class="text-center">
                    <h1 class="text-2xl font-bold ">{{$schoolData->school_name}}</h1>
                    <p class="text-sm ">Contact: {{$schoolData->school_phone}}</p>
                    <p class="text-sm ">Email: {{$schoolData->school_email}}</p>
                    <p class="text-sm ">Website: {{$schoolData->website}}</p>
                    <p class="text-sm ">Print date: {{$date}}</p>
            </div>
        <div>
        </div>
       </div>
  @endforeach
       
       <div>
      <div class="grid grid-cols-12 ">
         <div class="col-span-1 _grid">Class</div>
        <div class="col-span-5 _grid">{{$selectedClassName}}</div>
     <div class="col-span-1 _grid">Subject</div>
        <div class="col-span-5 _grid">{{$selectedSubjectName}}</div>
     <div class="col-span-1 _grid">Group</div>
        <div class="col-span-3 _grid">{{$selectedGroupName}}</div>
        <div class="col-span-1 _grid">Section</div>
        <div class="col-span-3 _grid">{{$selectedSectionName}}</div>
        <div class="col-span-1 _grid">Exam</div>
        <div class="col-span-3 _grid">{{$selectedExamName}}</div>
    </div>
    
    
    <div class="overflow-x-auto">
      <table class="min-w-full ">
        <thead class="">
          <tr>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">
              SL
            </th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm ">
              Student Name
            </th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm ">
              Student ID
            </th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm ">
              Roll
            </th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm ">
              Full Mark
            </th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm ">
              T. Marks
            </th>
            @foreach($shortCode as $code)
            <th class="text-left py-3 px-4  font-semibold text-sm ">
              {{$code->short_code}}={{$code->total_mark}}/{{$code->pass_mark}}
            </th>
            @endforeach
          </tr>
        </thead>
        <tbody class="text-zinc-700 ">
            @foreach($marks as $key => $mark)
            <tr >
            <td class="text-left py-3 px-4">{{$key+1}}</td>
            <td class="text-left py-3 px-4">{{$mark->name}}</td>
            <td class="text-left py-3 px-4">{{$mark->student_id}}</td>
            <td class="text-left py-3 px-4">{{$mark->student_roll}}</td>
            <td class="text-left py-3 px-4">{{$mark->full_marks}}</td>
            <td class="text-left py-3 px-4">{{$mark->total_marks}}</td>
            @php
    $shortMarkss = json_decode($mark->short_marks, true); // Decode JSON into an associative array
@endphp

@foreach($shortMarkss as $short)
    <td class="text-left py-3 px-4">{{$short}}</td>
@endforeach
            
            </tr>
            @endforeach
         
        </tbody>
      </table>
    </div>
  </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
    document.getElementById("downloadBtn").addEventListener("click", function() {
        var source = document.getElementById('content');

        html2pdf().from(source).save("Marks.pdf");
    });

    document.getElementById("downloadPrint").addEventListener("click", function() {
        window.print();
    });
</script>
</body>
</html>