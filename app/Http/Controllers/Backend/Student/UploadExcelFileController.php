<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddCategory;
use App\Models\AddClass;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\AddShift;
use App\Models\Student;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddClassWiseShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;

class UploadExcelFileController extends Controller
{
    public function uploadExelFile($school_code)
    {
        $classes = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groups = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sections = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $shifts = AddShift::where('action', 'approved')->where('school_code', $school_code)->get();
        $categories = AddCategory::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYears = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        return view('Backend.Student.uploadExxelFile', compact('classes', 'groups', 'shifts', 'categories', 'academicYears', 'sections'));
    }

    public function downloadDemo()
    {
        $filePath = public_path('demo.xlsx');

        return Response::download($filePath, 'demo.xlsx', [], 'inline');
    }



    public function uploadExcel(Request $request)
    {


        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        // dd($request);
        $students = [];

        $file = $request->file('file');
        $idOption = $request->input('stu_id');
        $school_code = $request->school_code;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move(storage_path('app/uploads'), $file->getClientOriginalName());
            $filePath = storage_path('app/uploads/') . $file->getClientOriginalName();
            $students = $this->readExcel($filePath);
        }

        


        foreach ($students as $KEY=> $studentData) {
            // dd($studentData);
           
            if ($idOption == 'with_id') {
                $studentId = $studentData[0];
            } else if ($idOption == 'generate_id') {
                $studentId = $this->generateUniqueStudentId();
            }
            $existingID = Student::where('school_code',$school_code)->where('student_id', $studentId)->exists();

            if ($existingID) {
                return redirect()->back()->with('error', "student id already exists ");
            } else {
                // Create and save the student
                $student = new Student();
                $student->student_id = $studentId;
                $student->name = $studentData[2];
                $student->student_roll = $studentData[1];
                $student->group = $request->input('group');
                $student->category = $request->input('category');
                $student->gender = $studentData[5];
                $student->birth_date = $studentData[6] ?? null;
                $student->religious = $studentData[7] ?? null;
                $student->father_name = $studentData[8] ?? null;
                $student->mother_name = $studentData[9] ?? null;
                $student->mobile_no = $studentData[10] ?? null;
                $student->nedubd_student_id = $this->generateUniqueStudentId();
                $student->nationality = $studentData[11] ?? null;
                $student->blood_group = $studentData[12] ?? null;
                $student->session = $studentData[13] ?? null;
                $student->image = $studentData[14] ?? null;
                $student->father_occupation = $studentData[15] ?? null;
                $student->father_mobile = $studentData[16] ?? null;
                $student->father_nid = $studentData[17] ?? null;
                $student->father_birth_date = $studentData[18] ?? null;
                $student->mother_number = $studentData[19] ?? null;
                $student->mother_occupation = $studentData[20] ?? null;
                $student->mother_nid = $studentData[21] ?? null;
                $student->mother_birth_date = $studentData[22] ?? null;
                $student->mother_income = $studentData[23] ?? null;
                $student->present_village = $studentData[24] ?? null;
                $student->present_post_office = $studentData[25] ?? null;
                $student->present_country = $studentData[26] ?? null;
                $student->present_zip_code = $studentData[27] ?? null;
                $student->present_district = $studentData[28] ?? null;
                $student->present_police_station = $studentData[29] ?? null;
                $student->parmanent_village = $studentData[30] ?? null;
                $student->parmanent_post_office = $studentData[31] ?? null;
                $student->parmanent_country = $studentData[32] ?? null;
                $student->parmanent_zip_code = $studentData[33] ?? null;
                $student->parmanent_district = $studentData[34] ?? null;
                $student->parmanent_police_station = $studentData[35] ?? null;
                $student->guardian_name = $studentData[36] ?? null;
                $student->guardian_address = $studentData[37] ?? null;
                $student->last_school_name = $studentData[38] ?? null;
                $student->last_class_name = $studentData[39] ?? null;
                $student->last_result = $studentData[40] ?? null;
                $student->last_passing_year = $studentData[41] ?? null;
                $student->email = $studentData[42] ?? null;
                $student->password = Hash::make($studentData[43] ?? 12345);
                $student->school_code = $school_code;
                $student->action = "approved";
                $student->role = "student";
                $student->admission_date = $studentData[44] ?? null;
                $student->Class_name = $request->input('class_name') ?? null;
                $student->section = $request->input('section') ?? null;
                $student->shift = $request->input('shift') ?? null;
                $student->category = $request->input('category') ?? null;
                $student->year = $request->input('year') ?? null;
                $student->status = $studentData[45] ?? 'active';

                // Save the student
              
                $student->save();
            }
        }

        return redirect()->back()->with('success', "student Uploaded successfully");

    }

    private function generateUniqueStudentId()
    {
        $lastStudent = Student::latest()->first();
        $currentYear = date('Y');
        $newId = 1;

        if ($lastStudent) {
            $lastId = intval(substr($lastStudent->nedubd_student_id, -4));
            $newId = $lastId + 1;
        }

        $newStudentId = 'STU' . $currentYear . str_pad($newId, 4, '0', STR_PAD_LEFT);

        $existingStudent = Student::where('nedubd_student_id', $newStudentId)->first();
        if ($existingStudent) {
            do {
                $newId++;
                $newStudentId = 'STU' . $currentYear . str_pad($newId, 4, '0', STR_PAD_LEFT);
                $existingStudent = Student::where('nedubd_student_id', $newStudentId)->first();
            } while ($existingStudent);
        }

        return $newStudentId;
    }
    private function readExcel($filePath)
    {
        $data = [];
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        foreach ($worksheet->getRowIterator() as $row) {
            $rowData = [];
            foreach ($row->getCellIterator() as $cell) {
                $rowData[] = $cell->getValue();
            }
            $data[] = $rowData;
        }
        array_shift($data);
        return $data;
    }

    public function uploadGroups(Request $request, $school_code)
    {
        $class = $request->class;

        $groups = AddClassWiseGroup::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($groups);
    }

    public function uploadSections(Request $request, $school_code)
    {
        $class = $request->class;
        $sections = AddClassWiseSection::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($sections);
    }

    public function uploadShifts(Request $request, $school_code)
    {
        $class = $request->class;
        $shifts = AddClassWiseShift::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($shifts);
    }

}
