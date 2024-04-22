@extends('Backend.app')
@section('title')
    Upload Photo
@endsection
@section('Dashboard')
@include('/Message/message')
    <div>
        <h3>
            Student Basic Info 
        </h3>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
        <div class="md:flex justify-end  ">
            <a href="{{ route('updateStudentBasicInfo', $school_code) }}">
                <button type="button"
                    class=" text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Basic
                    Info
                </button>
            </a>
            <a href="{{ route('studentClassInfo', $school_code) }}">
                <button type="button"
                    class=" text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Class
                    Info
                </button>
            </a>
            <a href="{{ route('StudentPhoto', $school_code) }}">
            <button type="button"
                class=" text-white bg-rose-700 hover:bg-rose-600 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-rose-600 dark:hover:bg-rose-700 focus:outline-none dark:focus:ring-rose-800">photo
                
            </button>
            </a>
            <a href="{{ route('getStudent', $school_code) }}">
                <button type="button"
                    class="  text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                    Student
                </button>
            </a>
        </div>
        <hr>



        <form action="{{route('updatePhoto',$school_code)}}" method="POST">
        @csrf 

            <div class="grid gap-6 mb-6 md:grid-cols-3 mt-2 p-3">
                <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Class
                </label>
                    <select id="" name="class"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Choose class</option>
                    @foreach($classes as $class)
                    <option value="{{$class->class_name}}">{{$class->class_name}}</option>
                    @endforeach
                    </select>
                </div>
    
                <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Group
                </label>
                <select id="" name="group"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose group</option>
                    @foreach($groups as $group)
                    <option value="{{$group->group_name}}">{{$group->group_name}}</option>
                    @endforeach
                </select>
                </div>
                <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Section
                </label>
                <select id="" name="section"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose section</option>
                    @foreach($sections as $section)
                    <option value="{{$section->section_name}}">{{$section->section_name}}</option>
                    @endforeach
                </select>
                </div>
                <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Category
                </label>
                <select id="" name="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
                </div>
    
                <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Academic Year
                </label>
                <select id="" name="academic_year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                    <option disabled selected>Choose Academic Year</option>
                    @foreach($years as $year)
                    <option value="{{$year->academic_year_name}}">{{$year->academic_year_name}}</option>
                    @endforeach

                </select>
                </div>

                
    
              <!-- <div>
              <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search student " />
              </div> -->
              <div>
                    <input class="hidden" name="school_code" value="{{$school_code}}" type="text">
                </div>
    
                <div class="">
                    <button type="submit "
                    class=" w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Search
                </button>
                </div>
            </div>
        </form>
        <table class="w-full text-sm text-left rtl:text-right text-black dark:text-blue-100">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 dark:text-white">
                <tr>
                    
                    <th scope="col" class="px-6 py-3">
                        Student Id
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Roll
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Photo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Upload Photo
                    </th>
                    
                </tr>
            </thead>
            <tbody>
            @if($students != null)
            @if(!is_null($students) && count($students) > 0)
            @foreach ($students as $student)
                <tr>
                    <td class="px-6 py-4">{{ $student->student_id }}</td>
                    <td class="px-6 py-4">{{ $student->student_roll }}</td>
                    <td class="px-6 py-4">{{ $student->name }}</td>
                    <td class="px-6 py-4"><img class="w-16" src="{{asset($student->image)}}" alt="student Image"></td>
                    <td class="px-6 py-4">
             
                    <form id="uploadForm{{ $student->id }}" method="POST" action="{{ route('update.student.image', ['schoolCode' => $school_code, 'id' => $student->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <input type="hidden" name="class" value="{{$student->Class_name}}">
                        <input type="hidden" name="section" value="{{$section->section_name}}">
                        <input type="hidden" name="group" value="{{$group->group_name}}">
                        <input type="hidden" name="year" value="{{$academic_year}}">
                        <input type="hidden" name="category" value="{{$category->category_name}}">
                        <input type="file" name="image" class="imageInput" data-student-id="{{ $student->id }}">
                    </form>
                    </td>
                </tr>
            @endforeach
            @else

    <p>No students found.</p>
            @endif
            @endif


            </tbody>
        </table>
        
    </div>

   
    <script>
    document.querySelectorAll('.imageInput').forEach(function(input) {
        input.addEventListener('change', function() {
            document.getElementById('uploadForm' + this.dataset.studentId).submit();
        });
    });
</script>
@endsection
