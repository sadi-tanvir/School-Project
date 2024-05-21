<?php

namespace App\Http\Controllers\Backend\Student;

use App\Models\AddClassWiseShift;
use App\Models\AddGroup;
use App\Models\AddSection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use App\Models\AddAcademicYear;
use App\Models\AddCategory;
use App\Models\AddClass;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddShift;
use App\Models\Student;
use Illuminate\Http\Request;

class UpdateStudentClassInfoController extends Controller
{
    public function studentClassInfo(Request $request , $schoolCode){
        $student = null;
        //dd($studentData);
        $Year = AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $Session = AddAcademicSession::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $shiftData=AddShift::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $categoryData=AddCategory::where('action', 'approved')->where('school_code', $schoolCode)->get();
        return view('Backend.Student.updateStudentClassInfo', compact('classData', 'groupData', 'sectionData', 'Year', 'Session', 'student','shiftData','categoryData'));
   
    }
    public function getStudentClassData(Request $request, $schoolCode)
    {
        $student = [];
        $selectedClassName = $request->input('class_name');
        $selectedGroupName = $request->input('group');
        $selectedSectionName = $request->input('section');
        $selectedYear = $request->input('year');
        
        $selectedShift = $request->input('shift');
       
        $selectedGender= $request->input('gender');

        if($selectedClassName && $selectedGroupName && $selectedSectionName &&  $selectedYear  &&  $selectedShift   &&  $selectedGender ){
            $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->where('group', $selectedGroupName)
            ->where('section', $selectedSectionName)
            ->where('year', $selectedYear)
            ->where('shift', $selectedShift)
            ->where('gender',$selectedGender)
            ->get();
        }
        else if($selectedClassName && $selectedGroupName && $selectedSectionName &&  $selectedYear  &&  $selectedGender  ){
            $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->where('group', $selectedGroupName)
            ->where('section', $selectedSectionName)
            ->where('year', $selectedYear)
            ->where('shift', $selectedShift)
            ->where('gender',$selectedGender)
            ->get();
        }
        else if($selectedClassName && $selectedGroupName && $selectedSectionName  &&  $selectedGender  ){
            $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->where('group', $selectedGroupName)
            ->where('section', $selectedSectionName)
            ->where('gender',$selectedGender)
            ->where('year', $selectedYear)
            ->get();
        }
        else if($selectedClassName && $selectedGroupName  &&  $selectedGender ){
            $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->where('group', $selectedGroupName)
            ->where('gender',$selectedGender)
            ->where('year', $selectedYear)
            ->get();
        }
        else if($selectedClassName  &&  $selectedGender ){
            $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->where('gender',$selectedGender)
            ->where('year', $selectedYear)
            ->get();
        }
        else if($selectedClassName && $selectedGroupName   ){
            $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->where('group', $selectedGroupName)
            ->where('year', $selectedYear)
            ->get();
        }
        else if($selectedClassName  ){
            $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->where('year', $selectedYear)
            ->get();
        }
        

        
        //dd($student);


        $Year = AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $Session = AddAcademicSession::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $groupData = AddClassWiseGroup::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $sectionData = AddClassWiseSection::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $shiftData=AddShift::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $categoryData=AddCategory::where('action', 'approved')->where('school_code', $schoolCode)->get();

        if ($student->isNotEmpty()) {
            return view('Backend.Student.updateStudentClassInfo', compact('classData', 'groupData', 'sectionData', 'Year', 'Session','shiftData','categoryData', 'student'))->with([
                'success' => 'Subject update added successfully!',
    
            ]);
          
        }

        

        return redirect()->route('studentClassInfo',$schoolCode)->with('error','Student Data Not Found');
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

    public function updateStudentClass(Request $request,$schoolCode)
    {

        // dd($request);
        if($request->id !== null){

            foreach ($request->id as $id) {
                $resulf = Student::where('id', $id)
                    ->update([
                        'Class_name' => $request->Class_name[$id],
                        'group' => $request->group[$id],
                        'section' => $request->section[$id],
                        'session' => $request->session[$id],
                        'year' => $request->year[$id],
                        'status' => $request->status[$id],
                    ]);
                    return redirect()->route('studentClassInfo',$schoolCode)->with([
                        'success' => 'Student update successfully!',
                    ]);
            }
    
            
        }
        return redirect()->route('studentClassInfo',$schoolCode)->with([
            'error' => 'No data selected!' ]);

    }

    public function delete( $schoolCode, $ids)
    {
       
if (!$ids){
    return redirect()->route('studentClassInfo', $schoolCode)->with('error', 'No students selected for deletion');
}
        // Perform the deletion logic
        if (!empty($ids)) {
            $idArray = explode(',', $ids);

        // Delete the students
        Student::whereIn('id', $idArray)->delete();
            return redirect()->route('studentClassInfo', $schoolCode)->with('success', 'Students deleted successfully');
        } 
        else {
            // Handle if no IDs are selected
            return redirect()->route('studentClassInfo', $schoolCode)->with('error', 'No students selected for deletion');
        }
    }
}
