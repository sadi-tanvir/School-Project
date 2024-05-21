<?php

namespace App\Http\Controllers\Backend\ExamResult;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddClassWiseShift;
use App\Models\AddClassWiseSubject;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\AddShift;
use App\Models\AddSubject;
use App\Models\ExamMarkInput;
use App\Models\ExamPublish;
use App\Models\GradeSetup;
use App\Models\SchoolInfo;
use App\Models\SetClassExamMark;
use App\Models\SetShortCode;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class MarkInputController extends Controller
{

    public function exam_marks($school_code)
    {
        $student = null;
        $markInputData = null;
        $markInputs = null;
        $selectedYear = null;
        $selectedExamName = null;
        $selectedShiftName = null;
        $selectedSectionName = null;
        $selectedClassName = null;
        $selectedGroupName = null;
        $selectedSubjectName = null;
        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $shiftData = AddShift::where('action', 'approved')->where('school_code', $school_code)->get();
        $subjectData = AddSubject::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        $gradeSetupData = null;
        return view('/Backend/ExamResult/exam_marks', compact('classData', 'groupData', 'sectionData', 'shiftData', 'subjectData', 'classExamData', 'academicYearData', 'student', 'gradeSetupData', 'markInputData', 'markInputs', 'selectedSubjectName', 'selectedGroupName', 'selectedClassName', 'selectedSectionName', 'selectedShiftName', 'selectedExamName', 'selectedYear'));
    }


    public function getGroups(Request $request, $school_code)
    {
        $class = $request->class;
        $groups = AddClassWiseGroup::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($groups);
    }

    public function getSections(Request $request, $school_code)
    {
        $class = $request->class;
        $sections = AddClassWiseSection::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($sections);
    }

    public function getShifts(Request $request, $school_code)
    {
        $class = $request->class;
        $shifts = AddClassWiseShift::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($shifts);
    }
    public function classExam(Request $request, $school_code)
    {
        $class = $request->class;
        $exams = SetShortCode::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($exams);
    }
    public function subject(Request $request, $school_code)
    {
        $class = $request->class;
        $subjects = AddClassWiseSubject::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($subjects);
    }

    public function finData(Request $request, $school_code)
    {
        $selectedClassName = $request->input('class_name');
        $selectedGroupName = $request->input('group');
        $selectedSectionName = $request->input('section');
        $selectedShiftName = $request->input('shift');
        $selectedSubjectName = $request->input('subject');
        $selectedExamName = $request->input('exam');
        $selectedYear = $request->input('year');

        $data = ExamPublish::where('action', 'approved')
            ->where('school_code', $school_code)
            ->where('Class_name', $selectedClassName)
            ->where('exam_name', $selectedExamName)
            ->where('year', $selectedYear)
            ->exists();
        if ($data) {
            return redirect()->back()->with('error', 'Exam already published');
        }

        $markInputs = null;
        $markInputData = ExamMarkInput::where('school_code', $school_code)->where('action', 'approved')->where('class_name', $selectedClassName)->where('group', $selectedGroupName)->where('section', $selectedSectionName)->where('subject', $selectedSubjectName)->where('year', $selectedYear)->exists();


        if ($markInputData) {
            $markInputs = ExamMarkInput::where('school_code', $school_code)->where('action', 'approved')->where('class_name', $selectedClassName)->where('group', $selectedGroupName)->where('section', $selectedSectionName)->where('year', $selectedYear)->where('subject', $selectedSubjectName)->get();
        }

        // dd($markInputs);
        $student = Student::where('school_code', $school_code)->where('Class_name', $selectedClassName)->where('group', $selectedGroupName)->where('section', $selectedSectionName)->where('shift', $selectedShiftName)->where('year', $selectedYear)->get();
        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $shiftData = AddShift::where('action', 'approved')->where('school_code', $school_code)->get();
        $subjectData = AddSubject::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        $shortCode = SetClassExamMark::where('class_name', $selectedClassName)->where('school_code', $school_code)->where('subject_name', $selectedSubjectName)->where('exam_name', $selectedExamName)->get();

        $gradeSetupData = GradeSetup::where('school_code', $school_code)->where('class_exam_name', $selectedExamName)->where('academic_year_name', $selectedYear)->where('class_name', $selectedClassName)->get();
        //dd($gradeSetupData);
        $gradeSetupData = $gradeSetupData->toJson();

        // dd($markInputData);


        return view('/Backend/ExamResult/exam_marks', compact('classData', 'selectedYear', 'selectedClassName', 'selectedShiftName', 'selectedSectionName', 'selectedExamName', 'selectedGroupName', 'groupData', 'sectionData', 'shiftData', 'subjectData', 'classExamData', 'academicYearData', 'student', 'shortCode', 'selectedSubjectName', 'gradeSetupData', 'markInputData', 'markInputs'));
    }

    public function marksInput(Request $request)
    {
        $exam = $request->input('exam');
        $year = $request->input('year');
        $shift = $request->input('shift');
        $section = $request->input('section');
        $group = $request->input('group');
        $class_name = $request->input('class');
        $subject = $request->input('subject');
        $school_code = $request->input('school_code');
        $key = $request->input('key');

        foreach ($key as $id) {
            $marks = new ExamMarkInput();
            $marks->name = $request->name[$id];
            $marks->student_id = $request->student_id[$id];
            $marks->student_roll = $request->student_roll[$id];
            $marks->class_name = $class_name;
            $marks->subject = $subject;
            $marks->exam_name = $exam;
            $marks->shift = $shift;
            $marks->section = $section;
            $marks->group = $group;
            $marks->year = $year;
            $marks->school_code = $school_code;
            $marks->full_marks = $request->full_marks[$id];
            $shortMarks = [];
            foreach ($request->short_marks as $shortCode => $marksArray) {
                $shortMarks[$shortCode] = $marksArray[$id];
            }
            $marks->short_marks = json_encode($shortMarks);
            $marks->total_marks = $request->total_marks[$id];
            $marks->grade = $request->grade[$id];
            $marks->gpa = $request->gpa[$id];
            if (isset($request->status[$id])) {
                $marks->status = $request->status[$id];
            } else {
                $marks->status = 'present';
            }
            $marks->save();

        }
        return redirect()->back()->with('success', 'Exam Marks Input Successfully');
    }

    public function updateMarkInput(Request $request)
    {
        $exam = $request->input('exam');
        $year = $request->input('year');
        $shift = $request->input('shift');
        $section = $request->input('section');
        $group = $request->input('group');
        $class_name = $request->input('class');
        $subject = $request->input('subject');
        $school_code = $request->input('school_code');
        $keys = $request->input('key');

        foreach ($keys as $key) {
            $name = $request->input("name.$key");
            $student_id = $request->input("student_id.$key");
            $student_roll = $request->input("student_roll.$key");
            $full_marks = $request->input("full_marks.$key");
            $total_marks = $request->input("total_marks.$key");
            $grade = $request->input("grade.$key");
            $gpa = $request->input("gpa.$key");
            $status = $request->input("status.$key", 'present');


            $shortMarks = [];
            foreach ($request->short_marks as $shortCode => $marksArray) {
                $shortMarks[$shortCode] = $marksArray[$key];
            }

            ExamMarkInput::where('id', $key)->update([
                'name' => $name,
                'student_id' => $student_id,
                'student_roll' => $student_roll,
                'full_marks' => $full_marks,
                'total_marks' => $total_marks,
                'grade' => $grade,
                'gpa' => $gpa,
                'status' => $status,
                'short_marks' => json_encode($shortMarks),
            ]);
        }
        return redirect()->back()->with('success', 'Updated Successfully');
    }



    public function printBlankExam(Request $request, $school_code)
    {
        $selectedClassName = $request->input('class_name');
        $selectedGroupName = $request->input('group');
        $selectedSectionName = $request->input('section');
        $selectedShiftName = $request->input('shift');
        $selectedSubjectName = $request->input('subject');
        $selectedExamName = $request->input('exam');
        $selectedYear = $request->input('year');
        $fullMarks = $request->input('full_marks');
        $totalMarks = $request->input('total_mark');
        $passMarks = $request->input('pass_mark');
        $schoolInfo = SchoolInfo::where('school_code', $school_code)->get();

        $students = Student::where('school_code', $school_code)->where('Class_name', $selectedClassName)
            ->where('group', $selectedGroupName)
            ->where('section', $selectedSectionName)
            ->where('shift', $selectedShiftName)
            ->where('year', $selectedYear)
            ->get();
        $date = date('d-m-Y');
        $shortCodes = SetClassExamMark::where('class_name', $selectedClassName)->where('school_code', $school_code)->where('subject_name', $selectedSubjectName)->where('exam_name', $selectedExamName)->get();

        return view('/Backend/ExamResult/exam_marks_print', compact('selectedClassName', 'selectedGroupName', 'selectedSectionName', 'selectedShiftName', 'selectedSubjectName', 'selectedExamName', 'selectedYear', 'shortCodes', 'fullMarks', 'totalMarks', 'passMarks', 'students', 'schoolInfo', 'date'));

    }



    public function downloadExcel(Request $request)
    {
       
        $selectedClassName = $request->input('class_name');
        $selectedGroupName = $request->input('group');
        $selectedSectionName = $request->input('section');
        $selectedShiftName = $request->input('shift');
        $selectedSubjectName = $request->input('subject');
        $selectedExamName = $request->input('exam');
        $selectedYear = $request->input('year');
        $shortCodes = $request->input('shortCode');
        $fullMarks = $request->input('full_marks');
        $totalMarks = $request->input('total_mark');
        $passMarks = $request->input('pass_mark');
        $school_code = $request->input('school_code');
    
        if (
            $shortCodes === null || empty($shortCodes) ||
            $totalMarks === null || empty($totalMarks) ||
            $passMarks === null || empty($passMarks)
        ) {
            return response()->json(['error' => 'Short codes, total marks, or pass marks are missing or empty.']);
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'SL');
        $sheet->setCellValue('B1', 'Student Name');
        $sheet->setCellValue('C1', 'Student ID');
        $sheet->setCellValue('D1', 'Student Roll');
        $sheet->setCellValue('E1', 'Full Marks');
        $sheet->setCellValue('F1', 'T.Marks');


        $columnIndex = 7;
        foreach ($shortCodes as $index => $code) {
            $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex);
            $sheet->setCellValue($columnLetter . '1', $code . '=' . $totalMarks[$index] . '/' . $passMarks[$index]);
            $columnIndex++;
        }
        $students = Student::where('Class_name', $selectedClassName)
            ->where('group', $selectedGroupName)
            ->where('section', $selectedSectionName)
            ->where('shift', $selectedShiftName)
            ->where('year', $selectedYear)
            ->get();
        $row = 2;
        foreach ($students as $key => $student) {
            $sheet->setCellValue('A' . $row, $key + 1);
            $sheet->setCellValue('B' . $row, $student->name);
            $sheet->setCellValue('C' . $row, $student->student_id);
            $sheet->setCellValue('D' . $row, $student->student_id);
            $sheet->setCellValue('E' . $row, $fullMarks);
            $columnIndex = 7;
            foreach ($shortCodes as $index => $code) {
                $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex);
                $studentMarks = '';
                $sheet->setCellValue($columnLetter . $row, $studentMarks);
                $columnIndex++;
            }
            $row++;
        }
        $fileName = 'Mark_input.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        return response()->download($fileName)->deleteFileAfterSend(true);
    }

    public function full_marks_print(Request $request, $school_code)
    {

        $selectedClassName = $request->input('class_name');
        $selectedGroupName = $request->input('group');
        $selectedSectionName = $request->input('section');
        $selectedShiftName = $request->input('shift');
        $selectedSubjectName = $request->input('subject');
        $selectedExamName = $request->input('exam');
        $selectedYear = $request->input('year');
        $schoolInfo = SchoolInfo::where('school_code', $school_code)->get();
        $date = date('d-m-Y');




        $marks = ExamMarkInput::where('school_code', $school_code)->where('action', 'approved')->where('class_name', $selectedClassName)->where('group', $selectedGroupName)->where('section', $selectedSectionName)->where('year', $selectedYear)->where('subject', $selectedSubjectName)->get();
        $shortCode = SetClassExamMark::where('class_name', $selectedClassName)->where('school_code', $school_code)->where('subject_name', $selectedSubjectName)->where('exam_name', $selectedExamName)->get();

        // dd($marks);
        return view('/Backend/ExamResult/full_marks_print', compact('marks', 'schoolInfo', 'date', 'shortCode', 'selectedClassName', 'selectedGroupName', 'selectedSectionName', 'selectedShiftName', 'selectedSubjectName', 'selectedYear', 'selectedExamName'));
    }

    public function mark_input_excel_uplaod(Request $request)
    {
        $selectedClassName = $request->input('class_name');
        $selectedGroupName = $request->input('group');
        $selectedSectionName = $request->input('section');
        $selectedShiftName = $request->input('shift');
        $selectedSubjectName = $request->input('subject');
        $selectedExamName = $request->input('exam');
        $selectedYear = $request->input('year');
        $school_code = $request->input('school_code');
        if (!$selectedClassName) {
            return redirect()->back()->with('error', 'No class selected');
        }
        if (!$selectedGroupName) {
            return redirect()->back()->with('error', 'No group selected');
        }
        if (!$selectedSectionName) {
            return redirect()->back()->with('error', 'No section selected');
        }
        if (!$selectedShiftName) {
            return redirect()->back()->with('error', 'No shift selected');
        }
        if (!$selectedSubjectName) {
            return redirect()->back()->with('error', 'No Subject selected');
        }
        if (!$selectedExamName) {
            return redirect()->back()->with('error', 'No Exam selected');
        }
        if (!$selectedYear) {
            return redirect()->back()->with('error', 'No Year selected');
        }

        $students = [];
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move(storage_path('app/uploads'), $file->getClientOriginalName());
            $filePath = storage_path('app/uploads/') . $file->getClientOriginalName();
            $students = $this->readExcel($filePath);
        }


       
        $grades = GradeSetup::where('school_code', $school_code)->where('action', 'approved')->where('class_name', $selectedClassName)->where('academic_year_name', $selectedYear)->where('class_exam_name', $selectedExamName)->get();

        $markInputData = ExamMarkInput::where('school_code', $school_code)->where('action', 'approved')->where('class_name', $selectedClassName)->where('group', $selectedGroupName)->where('section', $selectedSectionName)->where('subject', $selectedSubjectName)->where('year', $selectedYear)->exists();

        if ($markInputData) {
            foreach ($students as $data) {
                $existingMarkInput = ExamMarkInput::where('school_code', $school_code)
                    ->where('class_name', $selectedClassName)
                    ->where('group', $selectedGroupName)
                    ->where('section', $selectedSectionName)
                    ->where('subject', $selectedSubjectName)
                    ->where('year', $selectedYear)
                    ->where('student_id', $data[3])
                    ->first();

                if ($existingMarkInput) {
                    $existingMarkInput->name = $data[1];
                    $existingMarkInput->student_roll = $data[3];
                    $existingMarkInput->full_marks = $data[4];
                    $shortcodeMarks = [];
                    $totalMarks=0;
                    $tmarks=0;
                    $shortCodeData = SetClassExamMark::where('class_name', $selectedClassName)
                        ->where('school_code', $school_code)
                        ->where('subject_name', $selectedSubjectName)
                        ->where('exam_name', $selectedExamName)
                        ->where('academic_year_name', $selectedYear)
                        ->get();

                        if ($shortCodeData) {
                            // dd($shortCodeData);
                            foreach ($shortCodeData as $index => $code) {
                                // dd($index);
                                if (isset($data[6 + $index])) {
                                    $shortcodeMark = $data[6 + $index];
                                    $passMark = $code->pass_mark;
                                    $FullMark = $code->total_mark;
                                    $acceptance = $code->acceptance;
                                    $totalMarks += $shortcodeMark * $acceptance;
                                    $tmarks += $shortcodeMark;
                                    $shortcodeMarks[$code->short_code] = $shortcodeMark;
                                }
                            }
        
                            foreach ($shortCodeData as $index => $code) {
                                if (isset($data[6 + $index])) {
                                    $shortcodeMark = $data[6 + $index];
                                    $passMark = $code->pass_mark;
                                    $FullMark = $code->total_mark;
                                    // dd($shortcodeMark);
                                    if ($shortcodeMark < $passMark) {
                                        $existingMarkInput->grade = "F";
                                        $existingMarkInput->gpa = 0;
                                        break;
                                    } else if ($shortcodeMark > $FullMark) {
                                        $existingMarkInput->grade = "F";
                                        $existingMarkInput->gpa = 0;
                                        break;
                                    } else {
                                        $grade = '';
                                        $gpa = null;
                                        foreach ($grades as $gradeSetup) {
                                            // dd($totalMarks);
                                            if ($totalMarks >= $gradeSetup->mark_point_1st && $totalMarks <= $gradeSetup->mark_point_2nd) {
                                                $existingMarkInput->grade = $gradeSetup->latter_grade;
                                                $existingMarkInput->gpa = $gradeSetup->grade_point;
                                                break;
                                            }
                                        }
                                    }
                                }
                            }
        
                        } else {
                            return back()->with('error', 'Shortcode data not found for the specified criteria.');
                        }
                    $existingMarkInput->total_marks = $tmarks;
                    $existingMarkInput->save();
                }
                return redirect()->back()->with('success', 'Mark inputed Successfully');
            }
        } else {
            foreach ($students as $data) {
                $markInput = new ExamMarkInput();
                $markInput->school_code = $school_code;
                $markInput->class_name = $selectedClassName;
                $markInput->section = $selectedSectionName;
                $markInput->group = $selectedGroupName;
                $markInput->shift = $selectedShiftName;
                $markInput->exam_name = $selectedExamName;
                $markInput->subject = $selectedSubjectName;
                $markInput->year = $selectedYear;
                $markInput->name = $data[1];
                $markInput->student_id = $data[2];
                $markInput->student_roll = $data[3];
                $markInput->full_marks = $data[4];
                
                $markInput->status = "present";
                $shortcodeMarks = [];
                $totalMarks = 0;
                $tmarks=0;

                $shortCodeData = SetClassExamMark::where('class_name', $selectedClassName)
                    ->where('school_code', $school_code)
                    ->where('subject_name', $selectedSubjectName)
                    ->where('exam_name', $selectedExamName)
                    ->where('academic_year_name', $selectedYear)
                    ->get();
                $grades = GradeSetup::where('school_code', $school_code)
                    ->where('action', 'approved')
                    ->where('class_name', $selectedClassName)
                    ->where('academic_year_name', $selectedYear)
                    ->where('class_exam_name', $selectedExamName)
                    ->get();

                if ($shortCodeData) {
                    // dd($shortCodeData);
                    foreach ($shortCodeData as $index => $code) {
                        // dd($code);
                        if (isset($data[6 + $index])) {
                            $shortcodeMark = $data[6 + $index];
                            $passMark = $code->pass_mark;
                            $FullMark = $code->total_mark;
                            $acceptance = $code->acceptance;
                            $totalMarks += $shortcodeMark * $acceptance;
                            $tmarks += $shortcodeMark;
                            $shortcodeMarks[$code->short_code] = $shortcodeMark;
                        }
                    }

                    foreach ($shortCodeData as $index => $code) {
                        if (isset($data[6 + $index])) {
                            $shortcodeMark = $data[6 + $index];
                            $passMark = $code->pass_mark;
                            $FullMark = $code->total_mark;
                            // dd($shortcodeMark);
                            if ($shortcodeMark < $passMark) {
                                $markInput->grade = "F";
                                $markInput->gpa = 0;
                                break;
                            } else if ($shortcodeMark > $FullMark) {
                                $markInput->grade = "F";
                                $markInput->gpa = 0;
                                break;
                            } else {
                                $grade = '';
                                $gpa = null;
                                foreach ($grades as $gradeSetup) {
                                    // dd($totalMarks);
                                    if ($totalMarks >= $gradeSetup->mark_point_1st && $totalMarks <= $gradeSetup->mark_point_2nd) {
                                        $markInput->grade = $gradeSetup->latter_grade;
                                        $markInput->gpa = $gradeSetup->grade_point;
                                        break;

                                    }
                                }
                            }
                        }
                    }

                } else {
                    return back()->with('error', 'Shortcode data not found for the specified criteria.');
                }
                $markInput->total_marks = $tmarks;
                $markInput->short_marks = json_encode($shortcodeMarks);
                // dd($markInput);
                $markInput->save();


            }
            return redirect()->back()->with('success', 'Mark inputed Successfully');

        }
        return back()->with('error', 'Failed to upload Excel file.');


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


}

