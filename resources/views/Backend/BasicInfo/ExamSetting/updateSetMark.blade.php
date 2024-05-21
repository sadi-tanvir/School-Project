@extends('Backend.app')
@section('title')
update Mark
@endsection
@section('Dashboard')
@include('Message.message')
<div>
    <h3>
        Update Mark Config view
    </h3>
</div>



<div>
    <div class="mt-10">
        <h1 class="text-xl text-center font-semibold bg-blue-300 p-2">Update Exam Mark Config Report</h1>
    </div>
</div>

<div class="md:mx-20">
    <form action="{{route('update-marks')}}" method="POST">
        @csrf
        @method ('PUT')
        <table class="text-sm text-center rtl:text-right text-black  w-full">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Short code
                    </th>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Total Marks
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Countable Marks
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pass Marks
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acceptance
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="mt-2"><input class="w-[200px] rounded-xl hidden" name="short_code"
                            value="{{ $data->short_code }}" type="text">{{ $data->short_code }}</td>
                    <td class="mt-2"><input class="w-[200px] rounded-xl" name="total_mark"
                            value="{{ $data->total_mark }}" type="text"></td>
                    <td class="mt-2"><input class="w-[200px] rounded-xl" name="countable_mark"
                            value="{{ $data->countable_mark }}" type="text"></td>
                    <td class="mt-2"><input class="w-[200px] rounded-xl" name="pass_mark" value="{{ $data->pass_mark }}"
                            type="text"></td>
                    <td class="mt-2"><input class="w-[200px] rounded-xl" name="acceptance"
                            value="{{ $data->acceptance }}" type="text"></td>

                </tr>
            </tbody>
        </table>
        <div class="mt-5 flex justify-end">
            <input name="id" value="{{$data->id}}" class="hidden" type="text">
            <button type="submit" class="px-5 py-2 bg-blue-500 hover:bg-blue-600 rounded-xl text-white">Update
                Code</button>
        </div>
    </form>

</div>





@endsection