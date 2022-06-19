<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\SubCategory;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredAdminController extends Controller
{

    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $cities = City::all();

        return view('auth.register-admin' , compact('categories' , 'subcategories' , 'cities') );
    }


    public function store(CompanyRequest $request)
    {
        $file_name = '';

        $icon = '';
        $url ='http://wagabaty.bakhsh786.com/Attachments/company/cover/';
        $ur2 ='http://wagabaty.bakhsh786.com/Attachments/company/icon/';

        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $file_name = $image->getClientOriginalName();
        }

        if ($request->hasFile('icon')) {
            $img = $request->file('icon');
            $icon = $img->getClientOriginalName();
        }

        $company = Company::create([
            'name' => ['ar' => $request->name , 'en' => $request->name_en],
             'desc' => ['ar' => $request->desc , 'en' => $request->desc_en] ,
             'admin_name' => $request->admin_name ,
             'email' => $request->email ,
             'password' => Hash::make($request->password) ,
             'icon' => $ur2 . $icon,
             'cover' => $url . $file_name ,
             'lat'=> $request->lat ,
             'lng' => $request->lng ,
             'lcoation' => $request->lcoation ,
             'city_id' => $request->city_id ,
             'category_id'  => $request->category_id  ,
             'subcategory_id' => $request->subcategory_id ,
             'email_verified_at' => now() ,
             'remember_token' => Str::random(10)  ,
        ]);

        if ($request->hasFile('cover')) {
            // move cover
            $request->cover->move(public_path('Attachments/company/cover/'), $file_name);
        }

        if ($request->hasFile('icon')) {
            // move cover
            $request->icon->move(public_path('Attachments/company/icon'), $icon);
        }

        event(new Registered($company));

        auth('admin-company')->login($company);

        return redirect(RouteServiceProvider::ADMINCOMPANY);


    }

    public function getSubCategory($id)
    {
        $subcategory = SubCategory::where('category_id' , $id)->pluck('name' , 'id');

        return $subcategory;
    }



}
