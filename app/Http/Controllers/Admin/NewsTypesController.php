<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewsTypesRequest;
use App\Models\News_Type;
class NewsTypesController extends Controller
{
     
    public function index()
    {
               
        $news_types = News_Type::orderBy('id', 'DESC')->get();
        return view('backend.admin.news_types.index' , compact('news_types'));
    }


    public function create()
    {
        return view('backend.admin.news_types.create');
    }


    public function store(NewsTypesRequest $request)
    {
                
        News_Type::create($request->all());

        toastr()->success('News Type created sucessfully');
        return redirect()->route('news_types.index');

    }


    public function edit($id)
    {
        $news_type = News_Type::find($id);
        return view('backend.admin.news_types.edit', compact('news_type'));
    }


    public function update(NewsTypesRequest $request, $id)
    {
                
        $news_type = News_Type::findOrfail($id);

                
        $news_type->update($request->all());

        toastr()->success('News Type updated sucessfully');
        return redirect()->route('news_types.index');
    }


    public function destroy($id)
    {

        $news_type = News_Type::findOrfail($id)->delete();

        toastr()->success('News Type has been deleted successfully!');
        return redirect()->route('news_types.index');
    }
}
