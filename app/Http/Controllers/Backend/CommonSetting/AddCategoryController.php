<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddCategory;
use Illuminate\Http\Request;

class AddCategoryController extends Controller
{
    public function add_category($schoolCode)
    {
        //$school_code = '100';
        $categoryData = AddCategory::where('action', 'approved')->where('school_code', $schoolCode)->get();
       
        
        return view('Backend/BasicInfo/CommonSetting/addCategory', compact('categoryData'));
    }
    

    public function store_add_category(Request $request,$schoolCode)
    {

        // dd($request);
        // Validate the incoming request data
        $request->validate([
            'category_name' => 'required|string|max:255',            
            'status' => 'required|string|in:active,in active',
        ]);

       

        // Set the school code
        //$school_code = '100'; // Your school code here

        // Check if any record with the same school_code, category_name, or position already exists
        $existingRecord = AddCategory::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('category_name', $request->category_name);                   
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same category name or position already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $category = new AddCategory();
        $category->category_name = $request->category_name;
        
        $category->status = $request->status;
        // dd($category);
        $category->action = 'approved';
        $category->school_code = $schoolCode;

        // Save the new record
        $category->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'category added successfully!');
    }

    public function delete_add_category($id)
    {
        $category = AddCategory::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'category deleted successfully!');
    }
}
