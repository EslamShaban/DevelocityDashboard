<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Company;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function index()
    {

        $sections = Section::orderBy('id', 'DESC')->get();
        return view('backend.admin.sections.index' , compact('sections'));

    }


    public function create()
    {
        $companies = Company::get();
        return view('backend.admin.sections.create' , compact('companies'));

    }


    public function store(SectionRequest $request)
    {
        
        Section::create([
            'name' => $request->name ,
            'company_id' => $request->company_id
        ]);
        toastr()->success('Section created sucessfully');
        return redirect()->route('sections.index');
    }





    public function edit($id)
    {
        $section = Section::findOrfail($id);
        $companies = Company::get();
        return view('backend.admin.sections.edit' , compact('companies' , 'section'));
    }


    public function update(SectionRequest $request, $id)
    {
        $section = Section::findOrfail($id);
        $section->update([
            'name' => $request->name ,
            'company_id' => $request->company_id
        ]);
        toastr()->success('Section updated sucessfully');
        return redirect()->route('sections.index');
    }


    public function destroy($id)
    {
        Section::destroy($id);
        toastr()->success('Section deleted sucessfully');
        return redirect()->route('sections.index');
    }
}
