<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminSubCategoryController extends Controller
{
    public function index()
    {
        /*$data = SubCategory::join('categories','categories.id','=','sub_categories.category_id')
                ->select('sub_categories.*', 'categories.category_name as category_name')
                ->get();*/
        /*$data = DB::table('sub_categories')
            ->select('sub_categories.*', 'categories.category_name as category_name')
            ->join('categories', 'categories.id', '=', 'sub_categories.category_id')
            ->get();*/
        $data =  SubCategory::with('category')->get();
        /*dd($data);*/
        $data_category = Category::all();
        return view('admin.subcategory.index',compact('data','data_category'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        SubCategory::create($input);
        $pgname='subcategory';
        return redirect()->back()->with('message','SubCategory Added Successfully');
    }

    public function update(Request $request,$id)
    {
        $data = SubCategory::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        return redirect()->back()->with('message','SubCategory edited successfully');
    }

    public function delete($id)
    {
        $data = SubCategory::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('message','SubCategory deleted successfully');
    }
}
