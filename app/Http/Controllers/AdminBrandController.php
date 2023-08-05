<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class AdminBrandController extends Controller
{
    public function index()
    {
        $data = Brand::all();
        return view('admin.brands.index', compact('data'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Brand::create($input);
        $pgname='brand';
        return redirect()->back()->with('message','Brand Added Successfully');
    }

    public function update(Request $request,$id)
    {
        $data = Brand::find($id);
        $input = $request->all();
        $data->update($input);
        return redirect()->back()->with('message','Brand edited successfully');
    }

    public function delete($id)
    {
        $data = Brand::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('message','Brand deleted successfully');
    }
}
