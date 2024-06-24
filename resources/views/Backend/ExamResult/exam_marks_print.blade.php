<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blank Page Print</title>
  <style>
    td,
    th,
    ._grid {
      border: 1px solid lightblue;
      padding: 4px;
    }
  </style>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white dark:bg-zinc-800">
  <div class="container mx-auto px-4 py-8 space-y-10">
    <div>

    
    <div class="flex items-center justify-between  w-full px-5">
      <div>
      <img src="{{asset($schoolInfo->logo)}}" alt="School Logo" class="pr-4 w-32" />
      </div>
      <div class="text-center">
      <h1 class="text-2xl font-bold ">{{$schoolInfo->school_name}}</h1>
      <p class="text-sm ">Contact: {{$schoolInfo->school_phone}}</p>
      <p class="text-sm ">Email: {{$schoolInfo->school_email}}</p>
      <p class="text-sm ">Website: {{$schoolInfo->website}}</p>
      <p class="text-sm ">Print date: {{$date}}</p>
      </div>
      <div>
      <form action="{{ route('downloadExcel.mark') }}" method="POST">
        @csrf
        <input type="text" class="hidden " value="{{$selectedSubjectName}}" name="subject">
        <input type="text" class="hidden " value="{{$selectedGroupName}}" name="group">
        <input type="text" class="hidden " value="{{$selectedClassName}}" name="class_name">
        <input type="text" class="hidden" value="{{$selectedSectionName}}" name="section">
        <input type="text" class="hidden " value="{{$selectedShiftName}}" name="shift">
        <input type="text" class="hidden " value="{{$selectedExamName}}" name="exam">
        <input type="text" class="hidden" value="{{$selectedYear}}" name="year">
        <input type="text" class="hidden" value="{{$school_code}}" name="school_code">
        @foreach($shortCodes as $code)
      <input type="text" class="hidden" value="{{$code->short_code}}" name="shortCode[]">
      <input type="text" class="hidden" value="{{$code->total_mark}}" name="total_mark[]">
      <input type="text" class="hidden" value="{{$code->pass_mark}}" name="pass_mark[]">
    @endforeach
        <input type="text" class="hidden" name="full_marks" value="{{$fullMarks}}">
        <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center      ">Export</button>
      </form>
      </div>
    </div>

    </div>

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
              @foreach($shortCodes as $code)
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm ">
          {{$code->short_code}}={{$code->total_mark}}/{{$code->pass_mark}}
        </th>
      @endforeach
            </tr>
          </thead>
          <tbody class="text-zinc-700 ">
            @foreach($students as $key => $student)
        <tr>
        <td class="text-left py-3 px-4">{{$key + 1}}</td>
        <td class="text-left py-3 px-4">{{$student->name}}</td>
        <td class="text-left py-3 px-4">{{$student->student_id}}</td>
        <td class="text-left py-3 px-4">{{$student->student_roll}}</td>
        <td class="text-left py-3 px-4">{{$fullMarks}}</td>
        <td class="text-left py-3 px-4"></td>
        @foreach($shortCodes as $code)
      <td class="text-left py-3 px-4"></td>
    @endforeach

        </tr>
      @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>