<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddClassWiseSubject;
use App\Models\AddGroup;
use App\Models\AddSubject;
use App\Models\SubjectSetup;
use Illuminate\Http\Request;

class AddSubjectSetupController extends Controller
{
    public function add_subject_setup(Request $request,$schoolCode)
    {

        //$school_code = '100';
        $selectedClassName = null;
        $selectedGroupName = null;
        $classWiseSubjectData = null;

        if ($request->has('class_name')) {
            $selectedClassName = $request->input('class_name');
            $selectedGroupName = $request->input('group_name');
            // dd($selectedGroupName);
            $classWiseSubjectData = AddClassWiseSubject::where('action', 'approved')
                ->where('school_code', $schoolCode)
                ->where('class_name', $selectedClassName)
                ->where('group_name', $selectedGroupName)
                ->get();
        } elseif ($request->session()->get('class_name')) {
                    //  dd($request);
            $selectedClassName = $request->session()->get('class_name');
            $selectedGroupName = $request->session()->get('group_name');
            // dd($selectedGroupName, $selectedClassName);
            $classWiseSubjectData = AddClassWiseSubject::where('action', 'approved')
                ->where('school_code', $schoolCode)
                ->where('class_name', $selectedClassName)
                ->where('group_name', $selectedGroupName)
                ->get();
            // dd($classWiseSubjectData);
        } else {
            $classWiseSubjectData = null;
            // $classWiseSubjectData = AddClassWiseSubject::where('action', 'approved')->where('school_code', $school_code)->get();
        }

        // dd($classWiseSubjectData);
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $subjectData = AddSubject::where('action', 'approved')->where('school_code', $schoolCode)->get();

        return view('Backend/BasicInfo/CommonSetting/addSubjectSetup', compact('classWiseSubjectData', 'selectedClassName', 'selectedGroupName', 'classData', 'groupData', 'subjectData'));
    }

    public function store_add_subject_setup(Request $request,$schoolCode)
    {
        // dd($request);
        // Validate form data
        $request->validate([
            'class_name' => 'required|string',
            'group_name' => 'required|string',
        ]);

        //$school_code = '100';
        $generateId = AddClassWiseSubject::count() + 1;
        $generatedId = sprintf('%02d', $generateId);
        $subjectNames = $request->subject_name;

        if ($subjectNames === null) {
            return redirect()->route('add.subject.setup',$schoolCode)->with([
                'error' => 'Please select subject name!',
                'class_name' => $request->class_name,
                'group_name' => $request->group_name
            ]);
        }
        // dd($subjectNames);
        $existingData = AddClassWiseSubject::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $request->class_name)
            ->where('group_name', $request->group_name)
            ->where('subject_name', $request->subject_name)
            ->get();

        if ($existingData->isNotEmpty()) {
            return redirect()->route('add.subject.setup',$schoolCode)->with([
                'error' => 'All Ready Added',
                'class_name' => $request->class_name,
                'group_name' => $request->group_name
            ]);
        }


        // dd($existingData);

        if (is_array($subjectNames)) {
            

            foreach ($subjectNames as $subject) {
                
                $addClassSubject = new AddClassWiseSubject();
                $addClassSubject->class_name = $request->class_name;
                $addClassSubject->subject_name = $subject;
                $addClassSubject->subject_type = 'select';
                $addClassSubject->group_name = $request->group_name;
                $addClassSubject->subject_serial = $generatedId;
                $addClassSubject->status = 'active';
                $addClassSubject->subject_marge = '0';
                $addClassSubject->action = 'approved';

                $addClassSubject->school_code = $schoolCode;

                $addClassSubject->save();
            }
          
        } else {
            // Handle the case when only a single subject is received
            $addClassSubject = new AddClassWiseSubject();
            $addClassSubject->class_name = $request->class_name;
            $addClassSubject->subject_name = $subjectNames;
            $addClassSubject->subject_type = 'select';
            $addClassSubject->group_name = $request->group_name;
            $addClassSubject->subject_serial = $generatedId;
            $addClassSubject->status = 'active';
            $addClassSubject->subject_marge = '0';
            $addClassSubject->action = 'approved';

            $addClassSubject->school_code = $schoolCode;


            $addClassSubject->save();
        }

        return redirect()->route('add.subject.setup',$schoolCode)->with([
            'success' => 'Subject setup added successfully!',
            'class_name' => $request->class_name,
            'group_name' => $request->group_name
        ]);
    }

    public function updateSubjectSetup(Request $request,$schoolCode)
    {
        // dd($request);
        foreach ($request->id as $id) {
            $resulf = AddClassWiseSubject::where('id', $id)
                ->update([
                    'subject_type' => $request->subject_type[$id],
                    'subject_marge' => $request->subject_marge[$id],
                ]);
        }

        // dd($resulf);

        if ($resulf) {
            return redirect()->route('add.subject.setup',$schoolCode)->with([
                'success' => 'Subject update added successfully!',
                'class_name' => $request->class_name,
                'group_name' => $request->group_name
            ]);
        }
    }
}
