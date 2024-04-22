<nav class="fixed top-0 z-50 w-full gradient-bg shadow-lg">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
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
      <div class="flex items-center">
        @if($schoolAdminData)
          <div class="flex items-center ms-3">
            <div class=" text-white p-2"> <p>{{$schoolAdminData->mobile_number}}</p></div>
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 " aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
               
                <img class="w-8 h-8 rounded-full" src="{{ asset($schoolAdminData->image) }}" alt="amdin photo">
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
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" >Settings</a>
                </li>
               
                <li>
                  <a href="{{url('/logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100  " role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
          
        @elseif($studentData)
          <div class="flex items-center ms-3">
            <div class=" text-white p-2"> <p>{{$studentData->student_id}}</p></div>
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 " aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
               
                <img class="w-8 h-8 rounded-full" src="{{ asset($studentData->image) }}" alt="amdin photo">
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
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 " aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
               
                <img class="w-8 h-8 rounded-full" src="{{ asset($adminData->image) }}" alt="amdin photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow " id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 " role="">
                 {{ $adminData->first_name}} {{ $adminData->last_name}}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate " role="none">
                  {{ $adminData->email}}
                </p>
              </div>
              <ul class="py-1" role="none">
                
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 e" role="menuitem">Settings</a>
                </li>
               
                <li>
                  <a href="{{url('/logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        @endif
        </div>
    </div>
  </div>
</nav>