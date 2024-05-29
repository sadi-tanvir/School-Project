<nav class="sticky top-0 z-50 w-full gradient-bg shadow-lg ps-3">
  <div class="px-3 py-6 lg:px-6 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end ">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200  ">
          <span class="sr-only">Open sidebar</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
          </svg>
        </button>

        <a href="/dashboard/{{$school_code}}" class="flex ms-2 md:me-24">

          <img src="/logo/NEDUBD-white.png" class="h-8 me-3" alt="NEDUBD LOGO" />
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">NEDUBD</span>
        </a>
      </div>

      <!-- <div>
      

      
        Hello There
      </div> -->
      <div class="h-6 grow ms-10 ">
      <form action="/dashboard/search/{{$school_code}}" method="GET" class="w-full">
      <div class="relative w-1/3 ms-auto -me-3">
        <input type="text" id="id" placeholder="Enter Student id" name="id" class="rounded-full border-0 placeholder-white placeholder:text-sm text-white
                active:outline-none active:ring-0 focus:ring-0 focus:border-white -mt-2 py-2 px-6 w-full bg-white/40 backdrop-blur-md pr-10">
        <span class="absolute inset-y-0 right-0 flex items-center pr-2 -top-2">
        <kbd class="px-2.5 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 backdrop-blur-md  rounded-full dark: bg-white/40 dark:text-gray-100 dark:border-gray-500">Enter</kbd>
        </span>
      </div>
    </form>
      </div>


      <div class="flex items-center">
        @if($schoolAdminData)
        <div class="flex items-center ms-3">
          <div class=" text-white p-2">
            <p>{{$schoolAdminData->mobile_number}}</p>
          </div>
          <div>
            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 " aria-expanded="false" data-dropdown-toggle="dropdown-user">
              <span class="sr-only">Open user menu</span>

              <img class="w-8 h-8 rounded-full object-cover" src="{{ asset($schoolAdminData->image) }}" alt="amdin photo">
            </button>
          </div>
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow " id="dropdown-user">
            <div class="px-4 py-3" role="none">
              <p class="text-sm text-gray-900 " role="">
                {{ $schoolAdminData->name}}
              </p>
              <p class="text-sm font-medium text-gray-900 truncate " role="none">
                {{ $schoolAdminData->email}}
              </p>
            </div>
            <ul class="py-1" role="none">

              <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
              </li>

              <li>
                <a href="{{url('/logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100  " role="menuitem">Sign out</a>
              </li>
            </ul>
          </div>
        </div>

        @elseif($studentData)
        <div class="flex items-center ms-3">
          <div class=" text-white p-2">
            <p>{{$studentData->student_id}}</p>
          </div>
          <div>
            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 " aria-expanded="false" data-dropdown-toggle="dropdown-user">
              <span class="sr-only">Open user menu</span>

              <img class="w-8 h-8 rounded-full object-cover" src="{{ asset($studentData->image) }}" alt="amdin photo">
            </button>
          </div>
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow " id="dropdown-user">
            <div class="px-4 py-3" role="none">
              <p class="text-sm text-gray-900 " role="">
                {{ $studentData->name}}
              </p>
              <p class="text-sm font-medium text-gray-900 truncate " role="none">
                {{ $studentData->email}}
              </p>
            </div>
            <ul class="py-1" role="none">

              <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">Settings</a>
              </li>

              <li>
                <a href="{{url('/logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">Sign out</a>
              </li>
            </ul>
          </div>
        </div>
        @elseif($adminData)
        <div class="flex items-center ms-3">
          <div class=" text-white p-2">
            <!-- <p>{{$adminData->student_id}}</p> -->
          </div>
          <div>
            <button type="button" class="flex items-center text-sm rounded-full focus:ring-0 focus:ring-transparent gap-3" aria-expanded="false" data-dropdown-toggle="dropdown-user">
              <span class="sr-only">Open user menu</span>
             <div class="flex items-center gap-3">
               <div class="">
                 <img class="w-10 h-10 rounded-full" src="{{ asset($adminData->image) }}" alt="amdin photo">
               </div>
                <div class="text-start mb-0.5" role="none">
                   <p class="text-xl text-white " role="">
                     {{ $adminData->first_name}} {{ $adminData->last_name}}
                   </p>
                    <p class="text-xs text-white  truncate -mt-0.5 opacity-75" role="none">
                       {{ $adminData->email}}
                    </p>
                </div>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="m1 1 4 4 4-4" />
                </svg>
             </div>
            </button>
          </div>
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow " id="dropdown-user">
            <div class="px-6 py-3.5" role="none">
            <p class="text-xl font-semibold " role="">
                     {{ $adminData->first_name}} {{ $adminData->last_name}}
                   </p>
                    <p class="text-sm   font-medium truncate -mt-0.5 opacity-75" role="none">
                      Email: {{ $adminData->email}}
                    </p>
            </div>
            <ul class="py-1" role="none">

              <li>
                <a href="#" class="block px-6  py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 e" role="menuitem">Settings</a>
              </li>

              <li>
                <a href="{{url('/logout')}}" class="block px-6  py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 " role="menuitem">Sign out</a>
              </li>
            </ul>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</nav>