<style>
    .scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .scrollbar::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px rgb(255, 255, 255);
        border-radius: 10px;
    }

    .scrollbar::-webkit-scrollbar-thumb {
        background: #124076;
        border-radius: 10px;
    }

    .scrollbar::-webkit-scrollbar-thumb:hover {
        background: #0766AD;
    }

    /*
    .accordion {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .accordion li {
        margin-bottom: 1px;
    }

    .accordion li button {
        width: 100%;
        text-align: left;
        padding: 10px;
        border: none;
        cursor: pointer;
        outline: none;
    }


    .accordion li .content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .accordion li.active .content {
        max-height: 200px;
    } */

    .clicked {
        background: rgb(255, 255, 255, 0.2) !important;
        padding: 10px auto;
    }

    .dropdown ul {
        overflow: hidden;
        transition: all 1s ease;
    }
</style>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0 duration-1000"
    aria-label="logo-sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto scrollbar gradient-bg">
        <ul class="space-y-2  font-medium ">



            <li class="">
                <a href="/dashboard/{{ $school_code }}" class=" flex items-center p-2 rounded-lg text-white group">
                    <span class="ms-3 text-white ">Dashboard</span>
                </a>
            </li>
            <!-- dashboard  -->
            <li>
                <a href="/dashboard/{{ $school_code }}" class="flex items-center p-2 text-white  group">
                    <svg class="w-5 h-5 text-white transition duration-75  " aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="#ffffff" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-white ">Dashboard</span>

                </a>
            </li>


            @if ($adminData)
                <!-- NeduBd Member Add complete nedubd -->
                <li class="dropdown">
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition-all duration-700 rounded-lg group hover:bg-slate-100/20"
                        aria-controls="dropdown-nedubd" data-collapse-toggle="dropdown-nedubd">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#FFFFFF" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">NEDUBD</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>


                    </button>
                    <ul id="dropdown-nedubd" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/dashboard/addAdmin/{{ $school_code }}"
                                class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Create
                                New Member</a>
                        </li>
                        <li>
                            <a href="/dashboard/addSchoolInfo/{{ $school_code }}"
                                class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                School Info</a>
                        </li>
                        <li>
                            <a href="/dashboard/addSchoolAdmin/{{ $school_code }}"
                                class="flex items-center w-full p-2 text-white  transition  rounded-lg pl-11 group ">Add
                                School Admin</a>
                        </li>
                    </ul>
                </li>
            @endif




            <!-- online Application  -->
            <li class="dropdown">
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-slate-100/20"
                    aria-controls="dropdown-online-examination" data-collapse-toggle="dropdown-online-examination">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#ffffff" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>

                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Online Application
                    </span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>

                </button>
                <ul id="dropdown-online-examination" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">List
                            Of Application</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Report
                            Applicant</a>
                    </li>

                </ul>
            </li>

            <!-- Student route  -->
            <li class="dropdown">
                <button
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group cursor-pointer hover:bg-slate-100/20"
                    aria-controls="dropdown-student" data-collapse-toggle="dropdown-student">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="#ffffff" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>

                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Student</span>

                    <svg class="w-3 h-3 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>


                <ul id="dropdown-student" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('AddStudentForm', $school_code) }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                            New Student </a>
                    </li>
                    <li>
                        <a href="{{ route('updateStudentBasicInfo', $school_code) }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Update
                            Student Basic Info</a>
                    </li>
                    <li>
                        <a href="{{ route('studentProfileUpdate', $school_code) }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Student
                            Profile Update</a>
                    </li>
                    <li>
                        <a href="{{ route('uploadExelFile', $school_code) }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            Exel File</a>
                    </li>
                    <li>
                        <a href="{{ route('uploadPhoto', $school_code) }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            Photo</a>
                    </li>
                    <li>
                        <a href="{{ route('migrateStudent', $school_code) }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Migrate
                            Student</a>
                    </li>
                    <li class="dropdown">
                        <p class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group cursor-pointer"
                            aria-controls="dropdown-student_report" data-collapse-toggle="dropdown-student_report">
                            <svg class="w-5 h-5 text-white transition duration-75 " xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 256 256">
                                <rect fill="none" />
                                <line x1="32" y1="64" x2="32" y2="144" fill="none"
                                    stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="8" />
                                <path d="M54.2,216a88.1,88.1,0,0,1,147.6,0" fill="none" stroke="#ffffff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="8" />
                                <polygon points="224 64 128 96 32 64 128 32 224 64" fill="none" stroke="#ffffff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="8" />
                                <path d="M169.3,82.2a56,56,0,1,1-82.6,0" fill="none" stroke="#ffffff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="8" />
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Reports
                                Students</span>

                            <svg class="w-3 h-3 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>

                        </p>
                        <ul id="dropdown-student_report" class="hidden py-2 space-y-2">
                            <li>
                                <a href="/dashboard/studentDetails/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                                    Student Details</a>
                            </li>
                            <li>
                                <a href="/dashboard/studentShortList/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                                    Student Short List </a>
                            </li>
                            <li>
                                <a href="/dashboard/studentListWithPhoto/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                                    Student List With Photo</a>
                            </li>
                            <li>
                                <a href="/dashboard/e_sifLists/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                                    E-SIF List </a>
                            </li>
                            <li>
                                <a href="/dashboard/studentProfile/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                                    Student Proile </a>
                            </li>
                            <li>
                                <a href="/dashboard/religionWiseStudentSummary/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                                    Religion Wise Studetn Summary</a>
                            </li>

                            <li>
                                <a href="/dashboard/studentIdCard/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                                    Student ID Card</a>
                            </li>
                            <li>
                                <a href="/dashboard/listOfMigrateStudent/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                                    List Of Migrate Student</a>
                            </li>
                            <li>
                                <a href="/dashboard/admissionSummary/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                                    Admission Summary</a>
                            </li>
                            <li>
                                <a href="/dashboard/classSectionSTdTotal/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                                    Class Section Std Total</a>
                            </li>
                            <li>
                                <a href="/dashboard/transferCertificate/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Transfer
                                    Certificate</a>
                            </li>
                            <li>
                                <a href="/dashboard/testimonial/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Testimonial</a>
                            </li>

                            <li>
                                <a href="/dashboard/transferCertificateList/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Transfer
                                    Certificate List</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            {{-- Admit Card --}}
            <li class="dropdown">
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-slate-100/20"
                    aria-controls="dropdown-admit-card" data-collapse-toggle="dropdown-admit-card">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#ffffff" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z" />
                    </svg>

                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Admit Card
                    </span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>

                </button>
                <ul id="dropdown-admit-card" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/dashboard/setAdmitCard/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Set
                            Admit Card
                        </a>
                    </li>
                    <li class="dropdown">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-slate-100/20"
                            aria-controls="dropdown-report-card" data-collapse-toggle="dropdown-report-card">

                            <span
                                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Reports(Admit
                                Cards)
                            </span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>

                        </button>
                        <ul id="dropdown-report-card" class="hidden py-2 space-y-2">
                            <li>
                                <a href="/dashboard/printAdmitCard/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Print
                                    Admit Card
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/printSeatPlan/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Print
                                    Seat Plan</a>
                            </li>

                            <li>
                                <a href="/dashboard/AddAdmitInstruction/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Admit Instruction</a>
                            </li>
                            <li>
                                <a href="/dashboard/ExamBlankSheet/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                                    Exam Blank Sheet</a>
                            </li>



                        </ul>
                    </li>

                </ul>

            </li>

            {{-- exam and Result --}}
            <li class="dropdown">
                <button
                    class="flex items-center w-full p-2 text-base text-gray-900 transition-all duration-700 rounded-lg group cursor-pointer hover:bg-slate-100/20"
                    aria-controls="dropdown-exam" data-collapse-toggle="dropdown-exam">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ffffff">
                        <path d="M12 3V5H3V3H12ZM16 19V21H3V19H16ZM22 11V13H3V11H22Z"></path>
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Exam &
                        Result</span>

                    <svg class="w-3 h-3 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>

                </button>
                <ul id="dropdown-exam" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/dashboard/marksInput/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                            Marks Input </a>
                    </li>
                    <li>
                        <a href="/dashboard/exam_process/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                            Exam Process </a>
                    </li>
                    <li>
                        <a href="/dashboard/exam_excel/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                            Exam Excel </a>
                    </li>
                    <li>
                        <a href="/dashboard/update_exam_process/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Update
                            Exam Process</a>
                    </li>
                    <li>
                        <a href="/dashboard/student_exam_excel/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Student
                            Exam Excel</a>
                    </li>
                    <li>
                        <a href="/dashboard/exam_marks_delete/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Student
                            exam Marks Delete</a>
                    </li>
                    <li>
                        <a href="/dashboard/exam_sms/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            Exam SMS</a>
                    </li>

                    <!-- grand final  -->
                    <li class="dropdown">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-slate-100/20"
                            aria-controls="dropdown-grand" data-collapse-toggle="dropdown-grand">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="#ffffff">
                                <path
                                    d="M20.0834 15.1999L21.2855 15.9212C21.5223 16.0633 21.599 16.3704 21.457 16.6072C21.4147 16.6776 21.3559 16.7365 21.2855 16.7787L12.5145 22.0412C12.1979 22.2313 11.8022 22.2313 11.4856 22.0412L2.71463 16.7787C2.47784 16.6366 2.40106 16.3295 2.54313 16.0927C2.58536 16.0223 2.64425 15.9634 2.71463 15.9212L3.91672 15.1999L12.0001 20.0499L20.0834 15.1999ZM20.0834 10.4999L21.2855 11.2212C21.5223 11.3633 21.599 11.6704 21.457 11.9072C21.4147 11.9776 21.3559 12.0365 21.2855 12.0787L12.0001 17.6499L2.71463 12.0787C2.47784 11.9366 2.40106 11.6295 2.54313 11.3927C2.58536 11.3223 2.64425 11.2634 2.71463 11.2212L3.91672 10.4999L12.0001 15.3499L20.0834 10.4999ZM12.5145 1.30864L21.2855 6.5712C21.5223 6.71327 21.599 7.0204 21.457 7.25719C21.4147 7.32757 21.3559 7.38647 21.2855 7.42869L12.0001 12.9999L2.71463 7.42869C2.47784 7.28662 2.40106 6.97949 2.54313 6.7427C2.58536 6.67232 2.64425 6.61343 2.71463 6.5712L11.4856 1.30864C11.8022 1.11864 12.1979 1.11864 12.5145 1.30864ZM12.0001 3.33233L5.88735 6.99995L12.0001 10.6676L18.1128 6.99995L12.0001 3.33233Z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right   whitespace-nowrap text-white ">Grand
                                Final</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>

                        </button>
                        <ul id="dropdown-grand" class="hidden py-2 space-y-2">
                            <li>
                                <a href="/dashboard/grand_exam_setup/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Setup Grand </a>
                            </li>
                            <li>
                                <a href="/dashboard/grand_exam_final_process"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Update
                                    Grand Final Process</a>
                            </li>
                            <li>
                                <a href="/dashboard/grand_exam_progress_report"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Student
                                    Grand Progress Report</a>
                            </li>
                            <li>
                                <a href="/dashboard/grand_merit_list"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                                    Grand Merit List</a>
                            </li>
                            <li>
                                <a href="/dashboard/grand_fail_list"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                                    Grand Fail List</a>
                            </li>
                            <li>
                                <a href="/dashboard/grand_result_pass_fail_percentage"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                                    Grand Pass/Fail Percentage</a>
                            </li>
                        </ul>
                    </li>


                    {{-- Report exam and result  --}}
                    <li class="dropdown">
                        <button
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group cursor-pointer hover:bg-slate-100/20"
                            aria-controls="dropdown-report" data-collapse-toggle="dropdown-report">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="#ffffff">
                                <path
                                    d="M20 22H4C3.44772 22 3 21.5523 3 21V3C3 2.44772 3.44772 2 4 2H20C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22ZM19 20V4H5V20H19ZM7 6H11V10H7V6ZM7 12H17V14H7V12ZM7 16H17V18H7V16ZM13 7H17V9H13V7Z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">
                                Reports(Exams &
                                Result) </span>

                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <ul id="dropdown-report" class="hidden py-2 space-y-2">
                            <li>
                                <a href="/dashboard/progressReport/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Single Mark Sheet </a>
                            </li>
                            <li>
                                <a href="/dashboard/grandFinal/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Update
                                    Grand Final</a>
                            </li>
                            <li>
                                <a href="/dashboard/tebular-format1/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Student
                                    Tabulation [Format-1]</a>
                            </li>
                            <li>
                                <a href="/dashboard/tebular-format2/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                                    Tabulation [Format-2]</a>
                            </li>
                            <li>
                                <a href="/dashboard/tebular-format3/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                                    Tabulation [Format-3]</a>
                            </li>
                            <li>
                                <a href="/dashboard/meritList/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                                    Merit List</a>
                            </li>
                            <li>
                                <a href="/dashboard/meritClass/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                                    Merit List</a>
                            </li>
                            <li>
                                <a href="/dashboard/exam-failList/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                                    Fail List Summary</a>
                            </li>
                            <li>
                                <a href="/dashboard/unassignedSubject/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                                    List of Unassigned Subject</a>
                            </li>
                            <li>
                                <a href="/dashboard/passFailPercentage/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                                    List of Pass/Fail Percentage</a>
                            </li>
                            <li>
                                <a href="/dashboard/gradeInfo/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                                    List of Grade Info</a>
                            </li>
                        </ul>
                    </li>




                </ul>
            </li>

            
                    {{-- Message --}}

                    <li class="dropdown">
                        <button
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group cursor-pointer hover:bg-slate-100/20"
                            aria-controls="dropdown-message" data-collapse-toggle="dropdown-message">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="#ffffff">
                                <path
                                    d="M20 22H4C3.44772 22 3 21.5523 3 21V3C3 2.44772 3.44772 2 4 2H20C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22ZM19 20V4H5V20H19ZM7 6H11V10H7V6ZM7 12H17V14H7V12ZM7 16H17V18H7V16ZM13 7H17V9H13V7Z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">
                               Messaging </span>

                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <ul id="dropdown-message" class="hidden py-2 space-y-2">
                            <li>
                                <a href="/dashboard/contact/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add Contact </a>
                            </li>
                            <li>
                                <a href="{{route('addMsg',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add Message </a>
                            </li>
                            <li>
                                <a href="/dashboard/message/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Send Message</a>
                            </li>
                            <li>
                                <a href="/dashboard/excelmsg/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload Excel</a>
                            </li>
                        </ul>
                    </li>    
            <!-- student accounts  -->

            <li class="dropdown">
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-slate-100/20"
                    aria-controls="dropdown-student-Accounts" data-collapse-toggle="dropdown-student-Accounts">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ffffff">
                        <path
                            d="M3 4.99509C3 3.89323 3.89262 3 4.99509 3H19.0049C20.1068 3 21 3.89262 21 4.99509V19.0049C21 20.1068 20.1074 21 19.0049 21H4.99509C3.89323 21 3 20.1074 3 19.0049V4.99509ZM5 5V19H19V5H5ZM7.97216 18.1808C7.35347 17.9129 6.76719 17.5843 6.22083 17.2024C7.46773 15.2753 9.63602 14 12.1022 14C14.5015 14 16.6189 15.2071 17.8801 17.0472C17.3438 17.4436 16.7664 17.7877 16.1555 18.0718C15.2472 16.8166 13.77 16 12.1022 16C10.3865 16 8.87271 16.8641 7.97216 18.1808ZM12 13C10.067 13 8.5 11.433 8.5 9.5C8.5 7.567 10.067 6 12 6C13.933 6 15.5 7.567 15.5 9.5C15.5 11.433 13.933 13 12 13ZM12 11C12.8284 11 13.5 10.3284 13.5 9.5C13.5 8.67157 12.8284 8 12 8C11.1716 8 10.5 8.67157 10.5 9.5C10.5 10.3284 11.1716 11 12 11Z">
                        </path>
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Student
                        Accounts</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>

                </button>

                <ul id="dropdown-student-Accounts" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                            Pay Slip Collection</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Quick
                            Collection</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Print
                            Unpaid Payslip </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Collect
                            Unpaid PaySlip</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Delete
                            Payslip</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">New
                            STD Add PaySlip</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">New/Old
                            STD Add payslip</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Generate
                            Payslip</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Edit
                            Generated Payslip</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Generate
                            Multiple Payslip</a>
                    </li>
                    <!-- others  -->
                    <li class="dropdown">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-slate-100/20"
                            aria-controls="dropdown-student-others" data-collapse-toggle="dropdown-student-others">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 "
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"
                                viewBox="0 0 18 21">
                                <path
                                    d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Others
                            </span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-student-others" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{route('feeCollection',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Form
                                    Fee</a>
                            </li>
                            <li>
                                <a href="{{route('donation',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Donation
                                </a>
                            </li>
                            <li>
                                <a href="{{route('addFineFail',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Fine/Fail/Absent
                                    Fess</a>
                            </li>
                            <li>
                                <a href="{{route('othersFee',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Others
                                    Fee</a>
                            </li>
                        </ul>
                    </li>
                    <!-- reports student fees  -->
                    <li class="dropdown">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-slate-100/20"
                            aria-controls="dropdown-student-reports" data-collapse-toggle="dropdown-student-reports">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 "
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"
                                viewBox="0 0 18 21">
                                <path
                                    d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Reports
                                (STD FEES) </span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-student-reports" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{route('DailyCollectionReport',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Daily
                                    Collection reports</a>
                            </li>
                            <li>
                                <a href="{{route('geneTransferInquiri',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Gene.
                                    Transfer Inquiry </a>
                            </li>
                            <li>
                                <a href="{{route('DuepaySummary',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Deu/Pay
                                    Summary</a>
                            </li>
                            <li>
                                <a href="{{route('headwiseSummary',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Head
                                    wise Summary</a>
                            </li>
                            <li>
                                <a href="{{route('othTransInquiry',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Oth.
                                    Trans Inquiry</a>
                            </li>
                            <li>
                                <a href="{{route('transferToAccounts',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Transfer
                                    to Accounts</a>
                            </li>
                            <li>
                                <a href="{{route('paidInvoice',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Paid
                                    Invoice</a>
                            </li>
                            <li>
                                <a href="{{route('ListOfdueOrPay',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">List
                                    Of Due/Pay</a>
                            </li>

                            <li>
                                <a href="{{route('listOfHeadWise',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">List
                                    of Head wise </a>
                            </li>
                            <li>
                                <a href="{{route('listOfSpecialDiscount',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">List
                                    Of Special Discount</a>
                            </li>
                            <li>
                                <a href="{{route('listOfMonthWiseFees',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">List
                                    Of Month wise Fees</a>
                            </li>
                            <li>
                                <a href="{{route('listOfFineOrFailOrAbsent',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">List
                                    Of Fine / Fail/Absent</a>
                            </li>
                            <li>
                                <a href="{{route('listOfDonation',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">List
                                    Of Donation</a>
                            </li>
                            <li>
                                <a href="{{route('listOfFormFees',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">List
                                    Of Form Fees</a>
                            </li>
                            <li>
                                <a href="{{route('monthlyPaidDetails',$school_code)}}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Monthly
                                    Paid Details</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <!-- Student Attendence  -->
            <li class="dropdown">
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-slate-100/20"
                    aria-controls="dropdown-student-Attendence" data-collapse-toggle="dropdown-student-Attendence">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ffffff">
                        <path
                            d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM8 13V15H6V13H8ZM13 13V15H11V13H13ZM18 13V15H16V13H18ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z">
                        </path>
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Student
                        Attendence </span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>

                </button>
                <ul id="dropdown-student-Attendence" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                            STD Attendence</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Leave
                            Entry Form </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                            Leave Type </a>
                    </li>


                    <!-- reports of student attendence  -->
                    <li class="dropdown">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group "
                            aria-controls="dropdown-student-Reports" data-collapse-toggle="dropdown-student-Reports">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 "
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"
                                viewBox="0 0 18 21">
                                <path
                                    d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Reports
                                (STD Attendence) </span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-student-Reports" class="hidden py-2 space-y-2">
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                                    Attendence Report</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Attendence
                                    Blank report </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Date
                                    Wise Report</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">List
                                    Of Leave Report</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Section
                                    Wise Summary</a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </li>

            <!-- grand final  -->
            <li class="dropdown">
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-slate-100/20"
                    aria-controls="dropdown-grand" data-collapse-toggle="dropdown-grand">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ffffff">
                        <path
                            d="M20.0834 15.1999L21.2855 15.9212C21.5223 16.0633 21.599 16.3704 21.457 16.6072C21.4147 16.6776 21.3559 16.7365 21.2855 16.7787L12.5145 22.0412C12.1979 22.2313 11.8022 22.2313 11.4856 22.0412L2.71463 16.7787C2.47784 16.6366 2.40106 16.3295 2.54313 16.0927C2.58536 16.0223 2.64425 15.9634 2.71463 15.9212L3.91672 15.1999L12.0001 20.0499L20.0834 15.1999ZM20.0834 10.4999L21.2855 11.2212C21.5223 11.3633 21.599 11.6704 21.457 11.9072C21.4147 11.9776 21.3559 12.0365 21.2855 12.0787L12.0001 17.6499L2.71463 12.0787C2.47784 11.9366 2.40106 11.6295 2.54313 11.3927C2.58536 11.3223 2.64425 11.2634 2.71463 11.2212L3.91672 10.4999L12.0001 15.3499L20.0834 10.4999ZM12.5145 1.30864L21.2855 6.5712C21.5223 6.71327 21.599 7.0204 21.457 7.25719C21.4147 7.32757 21.3559 7.38647 21.2855 7.42869L12.0001 12.9999L2.71463 7.42869C2.47784 7.28662 2.40106 6.97949 2.54313 6.7427C2.58536 6.67232 2.64425 6.61343 2.71463 6.5712L11.4856 1.30864C11.8022 1.11864 12.1979 1.11864 12.5145 1.30864ZM12.0001 3.33233L5.88735 6.99995L12.0001 10.6676L18.1128 6.99995L12.0001 3.33233Z">
                        </path>
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right   whitespace-nowrap text-white ">Grand
                        Final</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>

                </button>
                <ul id="dropdown-grand" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/dashboard/grand_exam_setup/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                            Setup Grand </a>
                    </li>
                    <li>
                        <a href="/dashboard/grand_exam_final_process"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Update
                            Grand Final Process</a>
                    </li>
                    <li>
                        <a href="/dashboard/grand_exam_progress_report"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Student
                            Grand Progress Report</a>
                    </li>
                    <li>
                        <a href="/dashboard/grand_merit_list"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            Grand Merit List</a>
                    </li>
                    <li>
                        <a href="/dashboard/grand_fail_list"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            Grand Fail List</a>
                    </li>
                    <li>
                        <a href="/dashboard/grand_result_pass_fail_percentage"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            Grand Pass/Fail Percentage</a>
                    </li>
                </ul>
            </li>


            {{-- teacher --}}

            <li class="dropdown">
                <button
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group cursor-pointer hover:bg-slate-100/20"
                    aria-controls="dropdown-teacher" data-collapse-toggle="dropdown-teacher">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="#ffffff" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>

                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Teachers</span>

                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <ul id="dropdown-teacher" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/dashboard/add-teacher"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                            Teacher </a>
                    </li>
                    <li>
                        <a href="/dashboard/grandFinal"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Teacher
                            List</a>
                    </li>
                    <li>
                        <a href="/dashboard/tebular-format1"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Student
                            Tabulation [Format-1]</a>
                    </li>
                    <li>
                        <a href="/dashboard/tebular-format2"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            Tabulation [Format-2]</a>
                    </li>
                    <li>
                        <a href="/dashboard/tebular-format3"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            Tabulation [Format-3]</a>
                    </li>
                    <li>
                        <a href="/dashboard/meritList"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            Merit List</a>
                    </li>
                    <li>
                        <a href="/dashboard/meritClass"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            Merit List</a>
                    </li>
                    <li>
                        <a href="/dashboard/exam-failList"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            Fail List Summary</a>
                    </li>
                    <li>
                        <a href="/dashboard/unassignedSubject"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            List of Unassigned Subject</a>
                    </li>
                    <li>
                        <a href="/dashboard/passFailPercentage"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            List of Pass/Fail Percentage</a>
                    </li>
                    <li>
                        <a href="/dashboard/gradeInfo"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Upload
                            List of Grade Info</a>
                    </li>
                </ul>
            </li>



            <!-- Basic Setting -->
            <li class="dropdown">
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-slate-100/20"
                    aria-controls="dropdown-basic-setting" data-collapse-toggle="dropdown-basic-setting">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#ffffff" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                    </svg>

                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Basic Setting
                    </span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>

                </button>
                <ul id="dropdown-basic-setting" class="hidden py-2 space-y-2">
                    <li class="dropdown">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group "
                            aria-controls="dropdown-common-setting" data-collapse-toggle="dropdown-common-setting">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="#ffffff">
                                <path
                                    d="M6.17071 18C6.58254 16.8348 7.69378 16 9 16C10.3062 16 11.4175 16.8348 11.8293 18H22V20H11.8293C11.4175 21.1652 10.3062 22 9 22C7.69378 22 6.58254 21.1652 6.17071 20H2V18H6.17071ZM12.1707 11C12.5825 9.83481 13.6938 9 15 9C16.3062 9 17.4175 9.83481 17.8293 11H22V13H17.8293C17.4175 14.1652 16.3062 15 15 15C13.6938 15 12.5825 14.1652 12.1707 13H2V11H12.1707ZM6.17071 4C6.58254 2.83481 7.69378 2 9 2C10.3062 2 11.4175 2.83481 11.8293 4H22V6H11.8293C11.4175 7.16519 10.3062 8 9 8C7.69378 8 6.58254 7.16519 6.17071 6H2V4H6.17071ZM9 6C9.55228 6 10 5.55228 10 5C10 4.44772 9.55228 4 9 4C8.44772 4 8 4.44772 8 5C8 5.55228 8.44772 6 9 6ZM15 13C15.5523 13 16 12.5523 16 12C16 11.4477 15.5523 11 15 11C14.4477 11 14 11.4477 14 12C14 12.5523 14.4477 13 15 13ZM9 20C9.55228 20 10 19.5523 10 19C10 18.4477 9.55228 18 9 18C8.44772 18 8 18.4477 8 19C8 19.5523 8.44772 20 9 20Z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Common
                                Settings</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>

                        </button>
                        <ul id="dropdown-common-setting" class="hidden py-2 space-y-2">
                            <li>
                                <a href="/dashboard/addInstituteInfo"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Institute Info</a>
                            </li>
                            <li>
                                <a href="/dashboard/addSubjectSetup/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Class Subject Setting</a>
                            </li>
                            <li>
                                <a href="/dashboard/addClass/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Class</a>
                            </li>
                            <li>
                                <a href="/dashboard/addSection/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Section</a>
                            </li>
                            <li>
                                <a href="/dashboard/addShift/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    shift</a>
                            </li>
                            <li>
                                <a href="/dashboard/addGroup/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Group</a>
                            </li>
                            <li>
                                <a href="/dashboard/addSubject/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Subject</a>
                            </li>
                            <li>
                                <a href="/dashboard/addAcademicSession/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Academic Session</a>
                            </li>
                            <li>
                                <a href="/dashboard/addAcademicYear/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Academic Year</a>
                            </li>
                            <li>
                                <a href="/dashboard/addBoardExam/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Board Exam</a>
                            </li>
                            <li>
                                <a href="/dashboard/addCategory/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Category</a>
                            </li>
                            <li>
                                <a href="/dashboard/addClassExam/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Class Exam</a>
                            </li>
                            <li>
                                <a href="/dashboard/addClassWiseGroup/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Class wise Group</a>
                            </li>
                            <li>
                                <a href="/dashboard/addClassWiseSection/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Class wise Section</a>
                            </li>
                            <li>
                                <a href="/dashboard/addClassWiseShift/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Class wise Shift</a>
                            </li>
                            <li>
                                <a href="/dashboard/addPeriod/{{ $school_code }}"
                                    class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                                    Period</a>
                            </li>


                        </ul>
                    </li>

                </ul>

            </li>

            <!-- Exam Setting -->
            <li class="dropdown">
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-slate-100/20"
                    aria-controls="dropdown-exam-setting" data-collapse-toggle="dropdown-exam-setting">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#ffffff" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>

                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white ">Exam
                        Setting</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>

                </button>
                <ul id="dropdown-exam-setting" class="hidden py-2 space-y-2">

                    <li>
                        <a href="/dashboard/addGradePoint/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                            Grade Point</a>
                    </li>
                    <li>
                        <a href="/dashboard/addShortCode/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Add
                            Short Code</a>
                    </li>
                    <li>
                        <a href="/dashboard/setShortCode/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Set
                            Short Code</a>
                    </li>
                    <li>
                        <a href="{{ route('get.exam.marks', $school_code) }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Set
                            Exam Marks</a>
                    </li>
                    <li>
                        <a href="/dashboard/setForthSubject/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Set
                            4th Subject</a>
                    </li>
                    <li>
                        <a href="/dashboard/AddReportName/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                            Add Report Name</a>
                    </li>
                    <li>
                        <a href="/dashboard/AddSignature/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">
                            Add Signature</a>
                    </li>
                    <li>
                        <a href="/dashboard/setGradeSetup/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Grade
                            Setup</a>
                    </li>
                    <li>
                        <a href="/dashboard/GrandFinal/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Grand
                            Final
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/SetSignature/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Set
                            Signature
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/ExamPublish/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Exam
                            Publish
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/SequentialExam/{{ $school_code }}"
                            class="flex items-center w-full p-2 text-white  transition duration-75 rounded-lg pl-11 group  hover:bg-slate-100/20 ">Sequential
                            Wise Exam
                        </a>
                    </li>
                </ul>


            </li>
            <!-- collapsible submenus -->
        </ul>
    </div>
</aside>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const clickedLink = localStorage.getItem("clickedLink");
        if (clickedLink) {
            const clickedElement = document.querySelector(`a[href="${clickedLink}"]`);
            if (clickedElement) {
                clickedElement.classList.add("clicked");
                const parentDropdown = clickedElement.closest(".dropdown");
                if (parentDropdown) {
                    parentDropdown.querySelector("ul").classList.remove("hidden");
                }
            }
        }

        function clearLocalStorage() {
            localStorage.removeItem("clickedLink");
        }
        const dropdownLinks = document.querySelectorAll("#logo-sidebar .dropdown a");
        dropdownLinks.forEach(function(link) {
            link.addEventListener("click", function(event) {
                dropdownLinks.forEach(function(link) {
                    link.classList.remove("clicked");
                });
                event.target.classList.add("clicked");
                localStorage.setItem("clickedLink", event.target.getAttribute("href"));
                // Clearing local storage after 2min
                setTimeout(clearLocalStorage, 120000);
            });
        });
        setTimeout(function() {
            if (localStorage.getItem("clickedLink")) {
                clearLocalStorage();
            }
        }, 120000);
    });
    // 120000
</script>



<script>
    function toggleFAQ(button) {
        const content = button.nextElementSibling;
        button.setAttribute("aria-expanded", button.getAttribute("aria-expanded") === "false" ? "true" : "false");
        content.style.maxHeight = button.getAttribute("aria-expanded") === "true" ? content.scrollHeight + "px" : "0";
    }
</script>
