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
        $class = $request->input('class');
        $idOption = $request->input('stu_id');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move(storage_path('app/uploads'), $file->getClientOriginalName());
            $filePath = storage_path('app/uploads/') . $file->getClientOriginalName();
            $students = $this->readExcel($filePath);
        }
        // dd($students);

        foreach ($students as $studentData) {
            if ($idOption == 'with_id') {
                $studentId = $studentData[0]; 
            } else if ($idOption == 'generate_id') {
                $studentId = $this->generateUniqueStudentId();
            }

            if (
                is_null($studentData[1]) || // student_roll
                is_null($studentData[2]) || // first_name
                is_null($studentData[3]) || // group
                is_null($studentData[4]) || // category
                is_null($studentData[5]) || // gender
                is_null($studentData[7]) || // religious
                is_null($studentData[8]) || // father_name
                is_null($studentData[9]) || // mother_name
                is_null($studentData[10])   // father_mobile
            ) {
                continue; // Skip this student if any essential field is null
            }
            
            $student = new Student();
            $student->name = $studentData[2];
            $student->student_roll = $studentData[1];
            $student->group = $studentData[3];
            $student->category = $studentData[4];
            $student->gender = $studentData[5];
            $student->birth_date = $studentData[6]??null;
            $student->religious = $studentData[7];
            $student->father_name = $studentData[8];
            $student->mother_name = $studentData[9];
            $student->mobile_no = $studentData[10];
            $student->nedubd_student_id = $this->generateUniqueStudentId();
            $student->nationality = $studentData['nationality']?? null;
            $student->blood_group = $studentData['blood_group']?? null;
            $student->session = $studentData['session']?? null;
            $student->image = $studentData['image']?? null;
            $student->father_occupation = $studentData['father_occupation']?? null;
            $student->father_mobile = $studentData['father_mobile']?? null;
            $student->father_nid= $studentData['father_nid	']?? null;
            $student->father_birth_date	= $studentData['father_birth_date']?? null;
            $student->mother_number	= $studentData['mother_number']?? null;
            $student->mother_occupation	= $studentData['mother_occupation']?? null;
            $student->mother_nid= $studentData['mother_nid']?? null;
            $student->mother_birth_date= $studentData['mother_birth_date']?? null;
            $student->mother_income= $studentData['mother_income']?? null;
            $student->present_village= $studentData['present_village']?? null;
            $student->present_post_office= $studentData['present_post_office']?? null;
            $student->present_country= $studentData['present_country']?? null;
            $student->present_zip_code= $studentData['present_zip_code']?? null;
            $student->present_district= $studentData['present_district']?? null;
            $student->present_police_station= $studentData['present_police_station']?? null;
            $student->parmanent_village	= $studentData['parmanent_village	']?? null;
            $student->parmanent_post_office	= $studentData['parmanent_post_office']?? null;
            $student->parmanent_country	= $studentData['parmanent_country']?? null;
            $student->parmanent_zip_code	= $studentData['parmanent_zip_code']?? null;
            $student->parmanent_district	= $studentData['parmanent_district']?? null;
            $student->parmanent_police_station	= $studentData['parmanent_police_station']?? null;
            $student->guardian_name	= $studentData['guardian_name']?? null;
            $student->guardian_address	= $studentData['guardian_address']?? null;
            $student->last_school_name	= $studentData['last_school_name']?? null;
            $student->last_class_name	= $studentData['last_class_name']?? null;
            $student->last_result= $studentData['last_result']?? null;
            $student->last_passing_year= $studentData['last_passing_year']?? null;
            $student->email= $studentData['email']?? null;
            $student->password=Hash::make( $studentData['password']?? 12345);
            $student->school_code= $studentData[11];
            $student->action= "approved";
            $student->role= "student";
            $student->admission_date = $studentData['admission_date']?? null;
            $student->Class_name = $class ?? null;
            $student->section = $request->input('section')?? null;
            $student->shift = $request->input('shift')?? null;
            $student->category = $request->input('category')?? null;
            $student->year = $request->input('year')?? null;
            $student->status = $studentData['status']?? 'active';
            $student->student_id = $studentId;
            $student->save();
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
    
        // Check if the generated ID already exists
        $existingStudent = Student::where('nedubd_student_id', $newStudentId)->first();
        if ($existingStudent) {
            // If it exists, increment the ID until a unique one is found
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
    // dd($data);
    return $data;
}



}
