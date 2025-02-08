<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    //

    public function index(){
        $categories = Category::all();

        return view('admin.sub_category.create', compact('categories'));
    }

    public function manage(){
        $subcategories = SubCategory::all();
        return view('admin.sub_category.manage',compact('subcategories'));
    }

    
}
