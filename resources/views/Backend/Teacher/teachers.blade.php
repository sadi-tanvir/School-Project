@extends('Backend.app')
@section('title')
Teacher List
@endsection
@section('Dashboard')
@include('/Message/message')

<div>
    <h1 class="text-4xl font font-semibold text-accent text-center my-5">Teacher List</h1>
</div>
<form action="{{route('teachers',$schoolCode)}}" method="GET" class="md:flex  my-10 justify-center">
  <div class="ml-10 md:ml-0 md:flex ">
    <div class="">
      <input type="text" name="search" class="input input-bordered md:w-full w-[300px] " placeholder="Search">
    </div>
  
    <div class="md:ml-10 ">
      <button class=" btn btn-accent text-white w-[300px] md:w-full mt-5 md:mt-0">
          Search
      </button>
  </div>
  </div>
  
</form>
@if ($adminData || $schoolAdminData )
<div class="flex justify-start ml-10 mb-5">
  <a href="/addteacher">
    <button class=" btn btn-accent text-white ">
        Add teacher
    </button></a>
</div>
@endif
<div class="overflow-x-auto">
  <table class="table border">
    <!-- head -->
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Department</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      @foreach ($teachers as $teacher)
            <tr>

                <th>{{ $teacher->teacher_id }}</th>
                <td>{{ $teacher->firstname }} {{ $teacher->lastname }}</td>
                <td>{{ $teacher->designation }}</td>
                <td class="flex">
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="mr-2"><i class="fa fa-edit" style="color:green;"></i></a>
                    <a href="{{ route('teachers.view', $teacher->id) }}" class="mr-2"><i class="fa fa-eye" style="color:#12c56a;"></i></a>
                    <form action="{{ route('teacher.delete', $teacher->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <i class="fa fa-trash" aria-hidden="true" style="color:red;"></i>
                        </button>
                    </form>
                </td>
            </tr>
       @endforeach
  
    </tbody>
  </table>
</div>

<div class="join my-10 flex justify-end ">
  <button class="join-item btn ">Previous</button>
  <input class="join-item btn btn-square " type="radio" name="options" aria-label="1" checked />
  <input class="join-item btn btn-square " type="radio" name="options" aria-label="2" />
  <input class="join-item btn btn-square" type="radio" name="options" aria-label="3" />
  <input class="join-item btn btn-square " type="radio" name="options" aria-label="4" />
  <button class="join-item btn ">Next</button>
</div>


@endsection