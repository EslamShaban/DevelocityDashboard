<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use ApiResponseTrait;

        
    public function index($id=null)
    {
        $news = News::when($id != null, function($q) use($id){
                $q->where('id', $id);
            })->where('company_id', auth('user-api')->user()->company_id)
              ->orderBy('id', 'DESC')
              ->get();

        if($news){
            return $this->apiResponse(NewsResource::collection($news) , 200 , 'news found');
        }else{
            return $this->apiResponse(false , 404 , 'news not found');
        }
    }

    

}
