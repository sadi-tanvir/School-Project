<?php

namespace App\Http\Controllers\Backend\GrandFinal;

use App\Http\Controllers\Controller;
use App\Models\AddBoardExam;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\GrandFinal;
use Illuminate\Http\Request;

class GrandFinalListController extends Controller
{
    public function grandFinalList($schoolCode)
    {
        $existingData=null;
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        return view('/Backend/Grand_Final/grandFinalList', compact('classData','existingData'));
    }

    public function viewGrandFinal(Request $request, $schoolCode)
    {
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $existingData = GrandFinal::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $request->Class_name)
            ->get();

        if ($existingData->isNotEmpty()) {
            return view('/Backend/Grand_Final/grandFinalList', compact('existingData','classData'));
        }
        else{
            return redirect()->route('grandFinalList',$schoolCode)->with([
                'error' => 'No data found!',
            ]);
        
        }
        

    }
}
