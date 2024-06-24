@extends('Backend.app')
@section('title')
Due Pay Summary
@endsection
@section('Dashboard')
@include('/Message/message')


<style>
    /* table radius  */
    thead th:first-child {
        border-top-left-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
    }

    thead th:last-child {
        border-top-right-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }

    /* hover effect  */
    .btn-hover,
    .btn-hover {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
    }

    .btn-hover::before {
        background: #fff;
        content: '';
        height: 20rem;
        opacity: 0;
        position: absolute;
        top: -50px;
        transform: rotate(15deg);
        width: 40px;
        transition: all 3000ms cubic-bezier(0.19, 1, 0.22, 1);
    }

    .btn-hover::after {
        background: #fff;
        content: '';
        height: 20rem;
        opacity: 0;
        position: absolute;
        top: -50px;
        transform: rotate(15deg);
        transition: all 3000ms cubic-bezier(0.19, 1, 0.22, 1);
        width: 8rem;
    }

    .btn-hover__new::before {
        left: -50%;
    }

    .btn-hover__new::after {
        left: -100%;
    }

    .btn-hover__new:hover::before {
        left: 120%;
        opacity: 0.5s;
    }

    .btn-hover__new:hover::after {
        left: 200%;
        opacity: 0.6;
    }

    .btn-hover span {
        z-index: 20;
    }
</style>

@include('Shared.ContentHeader', ['title' => 'All fees'])

<div class=" mt-10">

    <div class="text-center mb-10">
        <div class="text-xs font-semibold   py-2.5 px-6 rounded-md flex items-center justify-center flex-shrink gap-3">
            <span>
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z"
                            fill="#000000"></path>
                    </g>
                </svg>
            </span>
            <span>
                Before searching for data here, ensure that you have added data from <span class="text-red-700 ">Fees
                    Setting/Add Fee Type</span>
            </span>
        </div>
    </div>

    <form method="GET" action="{{ route('allFeesReport.getData', $school_code) }}"
        class="p-6  rounded-[8px] border-2 bg-gray-200 border-slate-300  mx-auto space-y-3  w-3/6">
        @csrf
        <div class="space-y-3">
            <div class=" place-items-start  gap-5">
                <label for="class" class="block mb-2 text-sm font-medium whitespace-noWrap ">Class
                    :</label>
                <select id="class" name="class"
                    class="col-span-3 bg-white border-0  text-gray-900 text-sm rounded-lg  block w-full p-3.5">
                    <option disabled selected>Select Class</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="place-items-start  gap-5">
                <label for="group" class="block mb-2 text-sm font-medium whitespace-noWrap ">Group
                    :</label>
                <select id="group" name="group"
                    class="col-span-3 bg-white border-0  text-gray-900 text-sm rounded-lg  block w-full p-3.5">
                    <option disabled selected>Select Group</option>
                </select>
            </div>
        </div>

        <div class="w-full flex justify-end mt-2.5">
            <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-0  font-medium rounded-lg text-sm px-3 py-3.5 mb-2 focus:outline-none">Print
            </button>
        </div>
    </form>
</div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const schoolCode = @json($school_code);
        const classSelect = document.getElementById('class');
        const groupId = document.getElementById('group');

        async function getGroups(className) {
            try {
                const res = await fetch(
                    `/dashboard/allFees/getGroups/${schoolCode}?class_name=${className}`
                )
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();
                console.log(data);
                UpdateGroupOption(data);
            } catch (error) {
                console.error('Error:', error);
            }
        }

        // class select event
        classSelect.addEventListener('change', (e) => {
            const classValue = e.target.value;
            const groupSelect = document.getElementById('group');
            getGroups(classValue);
        });

        // update group options
        function UpdateGroupOption(groups) {
            groupId.innerHTML = "";
            const defaultOption = document.createElement('option');
            defaultOption.value = "Select";
            defaultOption.textContent = "Select";
            defaultOption.selected = true;
            groupId.appendChild(defaultOption);
            groups.forEach(group => {
                const groupOption = document.createElement('option');
                groupOption.value = group.group_name;
                groupOption.textContent = group.group_name;
                groupId.appendChild(groupOption);
            });
        };
    })
</script>
