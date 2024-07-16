<?php

namespace App\Http\Controllers\Backend\Assessment\BasicSetting;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddClassWiseSubject;
use App\Models\ParadarsitaSuchok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ParadarsitaSuchokExcelController extends Controller
{
    public function ParadarsitaSuchokExcelView(Request $request, $school_code)
    {
        $classes = AddClass::where('school_code', $school_code)
            ->where('action', 'approved')
            ->get();
        return view("Backend.Assessment.BasicSetting.ParadarsitaSuchokExcel", compact('classes'));
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

    // download a blank excel file
    public function DownloadBlankExcel()
    {
        $filePath = public_path('Assessment-add.xlsx');
        return Response::download($filePath, 'Assessment-add.xlsx', [], 'inline');
    }


    // Upload Excel file
    public function UploadExcelFile(Request $request, $school_code)
    {
        $class = $request->input("class");
        $segment = $request->input("segment");
        $subject = $request->input("subject");

        if (!$request->hasFile('file') || !$class || !$segment || !$subject) {
            return redirect()->back()->with('error', 'Provide All the necessary information');
        }

        $paradarshitaSuchoks = [];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move(storage_path('app/uploads'), $file->getClientOriginalName());
            $filePath = storage_path('app/uploads') . '/' . $file->getClientOriginalName();
            $paradarshitaSuchoks = $this->readExcel($filePath);
        }

        foreach ($paradarshitaSuchoks as $suchok) {
            $paradarsitaSuchok = new ParadarsitaSuchok();
            $paradarsitaSuchok->class = $class;
            $paradarsitaSuchok->segment = $segment;
            $paradarsitaSuchok->subject = $subject;
            $paradarsitaSuchok->suchok_name = $suchok[0];
            $paradarsitaSuchok->suchok_value = $suchok[1];
            $paradarsitaSuchok->suchok_matra_rectengle = $suchok[2];
            $paradarsitaSuchok->suchok_matra_circle = $suchok[3];
            $paradarsitaSuchok->suchok_matra_triangle = $suchok[4];
            $paradarsitaSuchok->save();
        }

        return redirect()->back()->with('success', 'Suchok Added Successfully.');
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
