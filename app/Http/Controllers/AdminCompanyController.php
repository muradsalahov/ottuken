<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class AdminCompanyController extends Controller
{
    public function index()
    {  
        $data = Company::all();
        return view('admin.company.index',compact('data'));
    }

    public function create()
    {
        $pgname = 'company';
        return view('admin.company.create',compact('pgname'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if($file = $request->file('photo')){
            $etc =  substr(($file->getClientOriginalName()), -4);
            $name = time() . $request->company_name.$etc;
            $file->move(public_path() . '/assets_admin/company_image', $name);
            $input['photo'] = $name;
        }
        if($file = $request->file('favicon')){
            $etc =  substr(($file->getClientOriginalName()), -4);
            $name = time() . '_favicon_' . $request->company_name.$etc;
            $file->move(public_path() . '/assets_admin/company_image', $name);
            $input['favicon'] = $name;
        }
        Company::create($input);
        $pgname='company';
        return redirect()->back()->with('message','Company Added Successfully');
    }

    public function edit($id)
    {
        $data = Company::find($id);
        $pgname='company';
        return view('admin.company.edit', compact('pgname','data'));
    }
    public function update(Request $request,$id)
    {
        $data = Company::find($id);
        $input = $request->all();
        if($file = $request->file('photo')){
            if (file_exists(public_path() . '/assets_admin/company_image/' . $data->photo)) {
                unlink(public_path() . "/assets_admin/company_image/" . $data->photo);
            }
            $etc =  substr(($file->getClientOriginalName()), -4);
            $name = time() . $data->company_name.$etc;
            $file->move(public_path() . '/assets_admin/company_image', $name);
            $input['photo'] = $name;
        }
        if($file = $request->file('favicon')){
            if (file_exists(public_path() . '/assets_admin/company_image/' . $data->favicon)) {
                unlink(public_path() . "/assets_admin/company_image/" . $data->favicon);
            }
            $etc =  substr(($file->getClientOriginalName()), -4);
            $name = time() . '_favicon_' . $data->company_name.$etc;
            $file->move(public_path() . '/assets_admin/company_image', $name);
            $input['favicon'] = $name;
        }
        $data->update($input);
        return redirect()->back()->with('message','Company edited successfully');
    }

    public function delete($id)
    {
        $data = Company::findOrFail($id);
        if (file_exists(public_path() . '/assets_admin/company_image/' . $data->photo)) {
            unlink(public_path() . "/assets_admin/company_image/" . $data->photo);
        }
        if (file_exists(public_path() . '/assets_admin/company_image/' . $data->favicon)) {
            unlink(public_path() . "/assets_admin/company_image/" . $data->favicon);
        }
        $data->delete();
        return redirect()->back()->with('message','Company deleted successfully');
    }
}
