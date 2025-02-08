<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class MasterSubcategoryController extends Controller
{
    //
    public function storesubcat(Request $request)
    {
        $validate_data = $request->validate([
            'subcategory_name' => 'unique:sub_categories|max:100',
            'category_id' => 'required|exists:categories,id'
        ]);

        SubCategory::create(  $validate_data);

        return redirect()->back()->with('success', 'Sub Category Added Successfully');
    }

    public function showsubcat($id)
    {
        $subcategory_info = SubCategory::find($id);
        return view('admin.sub_category.edit',compact('subcategory_info'));
    }

    public function updatesubcat(Request $request, $id)
    {
        $subcategory = SubCategory::findOrFail($id);

        $validate_data = $request->validate([
            'subcategory_name' => 'unique:sub_categories|max:100',


        ]);

        $subcategory->update($validate_data);

        return redirect()->back()->with('success', 'Sub Category Updated Successfully');
    }

    public function deletesubcat($id)
    {
        SubCategory::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Sub Category Deleted Successfully');
    }
}
