<?php

namespace App\Http\Controllers\Backend\Assessment\BasicSetting;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddClassWiseSubject;
use App\Models\ParadarsitaSuchok;
use Illuminate\Http\Request;

class ParadarsitaSuchokController extends Controller
{
    public function ParadarsitaSuchokView(Request $request, $school_code)
    {
        $classes = AddClass::where('school_code', $school_code)
            ->where('action', 'approved')
            ->get();
        return view("Backend.Assessment.BasicSetting.ParadarsitaSuchok", compact('classes'));
    }


    // get class wise subjects
    public function GetSubjects(Request $request, $school_code)
    {
        $class = $request->input("class_name");
        $subjects = AddClassWiseSubject::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where("class_name", $class)
            ->get();
        return response()->json([
            "subjects" => $subjects
        ]);
    }

    // store data
    public function StoreParadarsitaSuchok(Request $request, $school_code)
    {
        $class = $request->input("class");
        $segment = $request->input("segment");
        $subject = $request->input("subject");
        $suchok_name = $request->input("suchok_name");
        $suchok_value = $request->input("suchok_value");
        $suchok_matra_rectengle = $request->input("suchok_matra_rectengle");
        $suchok_matra_circle = $request->input("suchok_matra_circle");
        $suchok_matra_triangle = $request->input("suchok_matra_triangle");

        if (!$class || !$segment || !$subject || !$suchok_name || !$suchok_value || !$suchok_matra_rectengle || !$suchok_matra_circle || !$suchok_matra_triangle) {
            return redirect()->back()->with('error', 'Provide All the necessary information');
        } else {
            $paradarsitaSuchok = new ParadarsitaSuchok();
            $paradarsitaSuchok->class = $class;
            $paradarsitaSuchok->segment = $segment;
            $paradarsitaSuchok->subject = $subject;
            $paradarsitaSuchok->suchok_name = $suchok_name;
            $paradarsitaSuchok->suchok_value = $suchok_value;
            $paradarsitaSuchok->suchok_matra_rectengle = $suchok_matra_rectengle;
            $paradarsitaSuchok->suchok_matra_circle = $suchok_matra_circle;
            $paradarsitaSuchok->suchok_matra_triangle = $suchok_matra_triangle;
            $paradarsitaSuchok->save();
            return redirect()->back()->with('success', 'Suchok Added Successfully.');
        }
    }
}
