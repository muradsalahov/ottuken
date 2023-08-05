<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $data = Category::orderBy('categories.level', 'asc')->get();
        return view('admin.category.index',compact('data'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Category::create($input);
        $pgname='category';
        return redirect()->back()->with('message','Category Added Successfully');
    }

    public function update(Request $request,$id)
    {
        $data = Category::find($id);
        $input = $request->all();
        $data->update($input);
        return redirect()->back()->with('message','Category edited successfully');
    }

    public function delete($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('message','Category deleted successfully');
    }

    public function getSubcategories(Request $request)
    {
        $category_id = $request->input('category_id');
        $subcategories = SubCategory::where('category_id', $category_id)->get();
        $subcategories = $subcategories->pluck('subcategory_name', 'id');
        return response()->json($subcategories);
    }
}
