<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\Company;
use App\Models\News_Type;

use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
     
    public function index()
    {
               
        $news = News::orderBy('id', 'DESC')->get();
        return view('backend.admin.news.index' , compact('news'));
    }


    public function create()
    {
        $companies = Company::all();
        $news_types = News_Type::all();
        return view('backend.admin.news.create', compact('companies', 'news_types'));

    }


    public function store(NewsRequest $request)
    {
                
        $request_data = $request->all();

        if ($request->hasFile('img')) {
            $image_name = $request->file('img')->getClientOriginalName();
            $request->img->move(public_path('/Attachments/news/'), $image_name);
            $request_data['img']   = $image_name;
        }
                
        News::create($request_data);

        toastr()->success('News created sucessfully');
        return redirect()->route('news.index');

    }


    public function edit($id)
    {
        $news = News::find($id);
        $companies = Company::all();
        $news_types = News_Type::all();
        return view('backend.admin.news.edit', compact('news','companies', 'news_types'));
    }


    public function update(NewsRequest $request, $id)
    {
                
        $news = News::findOrfail($id);

        $request_data = $request->all();

        if ($request->hasFile('img')) {

            Storage::disk('news')->delete('/'.$news->img);

            $image_name = $request->file('img')->getClientOriginalName();
            $request->img->move(public_path('/Attachments/news/'), $image_name);
            $request_data['img']   = $image_name;
        }
                
        $news->update($request_data);

        toastr()->success('News updated sucessfully');
        return redirect()->route('news.index');
    }


    public function destroy($id)
    {

        $news = News::findOrfail($id);

        if (!empty($news->img)) {

            Storage::disk('news')->delete('/'.$news->img);
        }

        $news->delete();

        toastr()->success('News has been deleted successfully!');
        return redirect()->route('news.index');
    }
}
