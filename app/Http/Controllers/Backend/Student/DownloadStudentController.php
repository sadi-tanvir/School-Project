<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use App\Models\AddAcademicYear;
use App\Models\AddCategory;
use App\Models\AddClass;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\AddShift;
use App\Models\Student;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class DownloadStudentController extends Controller
{
    public function viewDownloadStudent($schoolCode)
    {
        $classes = AddClass::where("action", "approved")->where("school_code", $schoolCode)->get();
        $sections = AddSection::where("action", "approved")->where("school_code", $schoolCode)->get();
        $groups = AddGroup::where("action", "approved")->where("school_code", $schoolCode)->get();
        $shifts = AddShift::where("action", "approved")->where("school_code", $schoolCode)->get();
        $sessions = AddAcademicSession::where("action", "approved")->where("school_code", $schoolCode)->get();
        $years = AddAcademicYear::where("action", "approved")->where("school_code", $schoolCode)->get();
        $categories = AddCategory::where("action", "approved")->where("school_code", $schoolCode)->get();
        $shift = AddShift::where("action", "approved")->where("school_code", $schoolCode)->get();
        return view('/Backend/Student/downloadStudent', compact('classes', 'sections', 'groups', 'shifts', 'sessions', 'years', 'categories', 'shift'));
    }

    public function DownloadStudentData(Request $request, $school_code)
    {

        $studentsQuery = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('Class_name', $request->class_name)
            ->where('year', $request->year);

        if ($request->group) {
            $studentsQuery->where('group', $request->group);
        }

        if ($request->section) {
            $studentsQuery->where('section', $request->section);
        }

        if ($request->gender) {
            $studentsQuery->where('gender', $request->gender);
        }

        $students = $studentsQuery->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

         // Set headers
         $sheet->setCellValue('A1', 'Student ID');
         $sheet->setCellValue('B1', 'Student Roll');
         $sheet->setCellValue('C1', 'Student Name');
         $sheet->setCellValue('D1', 'Group');
         $sheet->setCellValue('E1', 'Category');
         $sheet->setCellValue('F1', 'Gender');
         $sheet->setCellValue('G1', 'Date OF Birth');
         $sheet->setCellValue('H1', 'Religious');
         $sheet->setCellValue('I1', 'Father Name');
         $sheet->setCellValue('J1', 'Mother Name');
         $sheet->setCellValue('K1', 'Mobile No');
         $sheet->setCellValue('L1', 'School Code');

         $row = 2;
        foreach ($students as $student) {
            $sheet->setCellValue('A' . $row, $student->student_id);
            $sheet->setCellValue('B' . $row, $student->student_roll);
            $sheet->setCellValue('C' . $row, $student->name);
            $sheet->setCellValue('D' . $row, $student->group);
            $sheet->setCellValue('E' . $row, $student->category);
            $sheet->setCellValue('F' . $row, $student->gender);
            $sheet->setCellValue('G' . $row, $student->birth_date);
            $sheet->setCellValue('H' . $row, $student->religious);
            $sheet->setCellValue('I' . $row, $student->father_name);
            $sheet->setCellValue('J' . $row, $student->mother_name);
            $sheet->setCellValue('K' . $row, $student->mobile_no);
            $sheet->setCellValue('L' . $row, $student->school_code);
            $row++;
        }

        $fileName = 'Student_List.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        return response()->download($fileName)->deleteFileAfterSend(true);

    }
}
