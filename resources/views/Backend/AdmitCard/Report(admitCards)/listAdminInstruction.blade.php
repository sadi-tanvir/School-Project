@extends('Backend.app')
@section('title')
Instruction List
@endsection
@section('Dashboard')
    <div>
        <h3>
            Instruction List
        </h3>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 md:my-10">
        <div class="grid gap-6 mb-6 md:grid-cols-4 ">
            <button type="button"
                class=" md:mr-20 text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{url('/dashboard/AddAdmitInstruction')}}">Add New</a>
                </button>

           
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-black ">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        SL
                    </th>
                   
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Instructions
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    
                    <th scope="col" class="px-6 py-3 bg-blue-500">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Data as $key=>$data )
                    
               
                <tr class=" border-b border-blue-400">
                    <th scope="row" class="px-6 py-4 font-medium  text-black whitespace-nowrap ">
                      {{$key +1}}
                    </th>
                    <td class="px-6 py-4">
                     {{$data->instruction}}
                    </td>
                    <td class="px-6 py-4 ">
                     {{$data->status}}
                    </td>
                  
                    

                    <td class="px-6 py-4 ">
                        <div class="flex justify-center">
                            <a href="" class="mr-2"><i class="fa fa-edit" style="color:green;"></i></a>
                            <form method="POST" action="{{ url('dashboard/delete_instruction', $data->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn ">
                                    <a href=""><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i></a>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
@endsection
