<?php

namespace App\Http\Controllers\Backend\AdmitCard;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddAdmitCard;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\AddClassWiseSubject;
use App\Models\AddGroup;
use DateTime;

use Illuminate\Http\Request;

class AddAdmitCardController extends Controller
{
    public function add_admit_card(Request $request, $schoolCode)
    {

        // $school_code = '100';
        $selectClassData = null;
        $selectGroupData = null;
        $selectClassExamName = null;
        $selectYear = null;


        if ($request->session()->get('class_name')) {
            // dd($request->session()->get('class_name'));
            $selectClassData = $request->session()->get('class_name');
            $selectGroupData = $request->session()->get('group_name');
            $selectClassExamName = $request->session()->get('class_exam_name');
            $selectYear = $request->session()->get('year');

            // dd($selectClassData, $selectGroupData);

            $classWiseSubjectData = AddClassWiseSubject::where('action', 'approved')
                ->where('school_code', $schoolCode)
                ->where('class_name', $selectClassData)
                ->where('group_name', $selectGroupData)
                ->get();

            // dd($classWiseSubjectData);
        } else {
            $classWiseSubjectData = null;
            // $classWiseSubjectData = AddClassWiseSubject::where('action', 'approved')->where('school_code', $school_code)->get();
        }


        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $yearData = AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $schoolCode)->get();
        // $classWiseSubjectData = AddClassWiseSubject::where('action', 'approved')->where('school_code', $school_code)->get();

        return view(
            'Backend/AdmitCard/setAdmitCard',
            compact(
                'selectClassData',
                'selectGroupData',
                'selectClassExamName',
                'selectYear',
                'classData',
                'groupData',
                'yearData',
                'classExamData',
                'classWiseSubjectData'
            )
        );
    }

    public function store_add_admit_card(Request $request, $schoolCode)
    {
        // dd($request);
        // Validate form data
        $request->validate([
            'class_name' => 'required|string',
            'group_name' => 'required|string',
            'class_exam_name' => 'required|string',
            'year' => 'required|string',
        ]);


        return redirect()->route('add.admit.card', $schoolCode)->with([
            // 'success' => 'Subject setup added successfully!',
            'class_name' => $request->class_name,
            'group_name' => $request->group_name,
            'class_exam_name' => $request->class_exam_name,
            'year' => $request->year
        ]);
    }
    public function update_add_admit_card(Request $request, $schoolCode)
    {
        $data = $request->all();
    
        foreach ($data['selected_subjects'] as $selectedSubject) {
            $decodedData = json_decode($selectedSubject, true);
            $subject_name = $decodedData['subject'];
            $class_name = $decodedData['class_name'];
            $group_name = $decodedData['group_name'];
            $year = $decodedData['year'];
            $class_exam_name = $decodedData['class_exam_name'];
            $date = $decodedData['date'];
            $time = $decodedData['time'];
    
            // Check if the record already exists
            $existingData = AddAdmitCard::where('action', 'approved')
                ->where('school_code', $schoolCode)
                ->where('class_name', $class_name)
                ->where('group_name', $group_name)
                ->where('subject_name', $subject_name)
                ->where('year', $year)
                ->where('class_exam_name', $class_exam_name)
                ->exists();
    
            if ($existingData) {
                // If data exists, update the record
                AddAdmitCard::where('action', 'approved')
                    ->where('school_code', $schoolCode)
                    ->where('class_name', $class_name)
                    ->where('group_name', $group_name)
                    ->where('subject_name', $subject_name)
                    ->where('year', $year)
                    ->where('class_exam_name', $class_exam_name)
                    ->update([
                        'exam_date' => $date,
                        'exam_time' => $time,
                    ]);
            } else {
                // If data doesn't exist, create a new record
                $admitCard = new AddAdmitCard();
                $admitCard->class_name = $class_name;
                $admitCard->group_name = $group_name;
                $admitCard->year = $year;
                $admitCard->class_exam_name = $class_exam_name;
                $admitCard->subject_name = $subject_name;
                $admitCard->exam_date = $date;
                $admitCard->exam_time = $time;
                $admitCard->status = 'active';
                $admitCard->action = 'approved';
                $admitCard->school_code = $schoolCode;
    
                $admitCard->save();
            }
        }
    
        return redirect()->route('add.admit.card', $schoolCode)->with([
            'class_name' => $request->class_name,
            'group_name' => $request->group_name,
            'class_exam_name' => $request->class_exam_name,
            'year' => $request->year
        ])->with('success', 'Admit Crad added successfully!');
    }
    
}
