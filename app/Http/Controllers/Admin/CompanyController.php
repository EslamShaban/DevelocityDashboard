<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Section;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::orderBy('id', 'DESC')->get();
        return view('backend.admin.companies.index' , compact('companies'));
    }


    public function create()
    {
        return view('backend.admin.companies.create');
    }


    public function store(CompanyRequest $request)
    {
         Company::create([
            'name' => $request->name ,
            'lat'=> $request->lat ,
            'lng' => $request->lng ,
            'location' => $request->location ,
         ]);
         toastr()->success('Company Created sucessfully');
         return redirect()->route('companies.index');
    }

    public function edit($id)
    {
        $company = Company::findOrfail($id);
        return view('backend.admin.companies.edit' , compact('company'));
    }


    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrfail($id);
        $company->update([
            'name' => $request->name ,
            'lat'=> $request->lat ,
            'lng' => $request->lng ,
            'location' => $request->location ,
         ]);
         toastr()->success('Company updated sucessfully');
         return redirect()->route('companies.index');
    }


    public function destroy($id)
    {
        $company = Section::where('company_id' , $id)->first();
        if($company){
            toastr()->error('This item cannot be deleted because it has already been used');
            return redirect()->route('companies.index');
        }else{
            Company::destroy($id);
            toastr()->success('Company updated sucessfully');
             return redirect()->route('companies.index');
        }

    }
}
