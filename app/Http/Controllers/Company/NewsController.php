<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
                        
        $news = News::where('company_id', auth('admin-company')->user()->company_id)->orderBy('id', 'DESC')->get();
        return view('backend.company.news.index', compact('news'));

    }

    public function show($id)
    {
        $new = News::where(['id'=>$id, 'company_id' =>auth('admin-company')->user()->company_id])->first();

        return $new ? view('backend.company.news.show', compact('new')) : abort(404);;

    }
}
